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

    protected function executeSelect(string $sql,bool $single=false):mixed{
        $calledClass=get_called_class();
        $result = $this->openConnexion()->query($sql);
        $result->setFetchMode(\PDO::FETCH_CLASS,$calledClass);
        // $pdo-> setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        // $pdo-> setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        if(!$single){
        return $result->fetchAll();
            }
        return $result->fetch();
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
