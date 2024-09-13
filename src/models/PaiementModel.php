<?php

namespace App\Models;
use App\Core\Model;

class PaiementModel extends Model{

    public function FindPayementByIdDette(int $id){
        $sql = "SELECT * FROM paiement WHERE idd = '$id'";
        return $this->executeSelect($sql);

    }

    public function Addpay(array $data)
    {
        $sql = "INSERT INTO paiement (referencep, datep, montantpay, idd) VALUES (:referencep, :datep, :montantpay, :idd)";
        $pdo = new \PDO('mysql:host=localhost;dbname=boutique_bd', 'boutiq', 'pass');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        return $pdo->lastInsertId();
    }


// public function updateReference($id, $referencep)
// {
//     $sql = "UPDATE paiement SET referencep = :referencep WHERE id = :id";
//     $stmt = $this->pdo->prepare($sql);
//     $stmt->execute([
//         ':referencep' => $referencep,
//         ':id' => $id
//     ]);
// }



    




}
