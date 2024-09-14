<?php

namespace App\Models;
use App\Core\Model;

class ClientModel extends Model{

    public function FindAllClient()
    { 
        $sql = "SELECT c.photo AS Image,c.nom,c.prenom, c.telephone,c.email,c.adresse,cat.libelleC
        FROM client c JOIN categorie cat ON c.idC = cat.idC;";
        return $this->executeSelect($sql);
    }

    public function FindClientByTel($tel)
    { 
        $sql = "SELECT c.photo AS Image,c.nom,c.prenom, c.telephone,c.email,c.adresse,cat.libelleC
        FROM client c JOIN categorie cat ON c.idC = cat.idC
        where c.telephone ='$tel' ";
        return $this->executeSelect($sql);

    }

    public function findAllCategorie(){
        $sql="SELECT idC,libelleC FROM `categorie`";
        return $this->executeSelect($sql);

    }



    public function FindDetailClientId(int $idcl){

    $sql = "SELECT cl.idcl,cl.photo,cl.nom,cl.prenom,cl.email,cl.telephone,cl.adresse,d.idd,
    d.numero AS numero_dette,d.dated AS date_dette,d.montantd AS montant_det,p.idp,p.referencep AS reference_paiement,
    p.datep AS date_paiement,p.montantpay AS montant_paiement,
    SUM(p.montantpay) AS verse, (d.montantd - SUM(p.montantpay)) AS restant 
    FROM client cl JOIN dette d ON cl.idcl = d.idcl LEFT JOIN paiement p ON d.idd = p.idd
    WHERE cl.idcl = '$idcl'";
    return $this->executeSelect($sql,true);

    }

    
   

    public function SaveClient(array $data): void
    {
        $sql = "INSERT INTO client (prenom, nom, email, telephone,adresse,photo, idC ) VALUES (:prenom, :nom, :email, :telephone, :adresse, :photo, idC)";
        $pdo = new \PDO('mysql:host=localhost;dbname=boutique_bd', 'root', '');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    }


   
    


}
