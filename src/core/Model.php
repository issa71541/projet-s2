<?php

namespace App\Core;

abstract class  Model
{

    public function findAll()
    { 
        $calledClass=get_called_class();
        $table=str_replace("Model","",$calledClass);
        $sql = "select * from $table";
        return $this->executeSelect($sql);
    }

    public function findById(int $id)
    { 
        $calledClass=get_called_class();
        $table=str_replace("Model","",$calledClass); //donne la table
        $sql = "select * from $table where id=$id";
        return $this->executeSelect($sql,true); //single(fetch)
    }

   
    protected function executeSelect(string $sql, bool $single = false, array $params = []): mixed
{
    // Préparer la requête avec la connexion PDO
    $stmt = $this->openConnexion()->prepare($sql);
    
    // Exécuter la requête avec les paramètres fournis
    $stmt->execute($params);
    
    // Définir le mode de récupération des résultats
    $calledClass = get_called_class();
    $stmt->setFetchMode(\PDO::FETCH_CLASS, $calledClass);
    
    // Si $single est false, on retourne plusieurs résultats
    if (!$single) {
        return $stmt->fetchAll();  // Retourne tous les résultats
    }
    
    // Si $single est true, on retourne un seul résultat
    return $stmt->fetch();  // Retourne un seul résultat
}


  
    protected function openConnexion()
    {
        return new \PDO(
            'mysql:host=localhost;dbname=boutique_bd;charset=utf8',
            'root',
            ''
        );
    }

    function dd($data){
        echo "<pre>";
            var_dump($data);
            die();  
        echo "</pre>";
    }


}
