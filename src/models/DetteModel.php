<?php

namespace App\Models;
use App\Core\Model;

class DetteModel extends Model{

    public function FindDetteNonSolde()
    { 
        $sql = "select d.*, cl.*, IFNULL(SUM(p.montantpay), 0) AS verse, (d.montantd - IFNULL(SUM(p.montantpay), 0)) AS restant 
            FROM dette d JOIN  client cl ON d.idcl = cl.idcl LEFT JOIN  paiement p ON d.idd = p.idd 
            GROUP BY d.idd, cl.idcl HAVING restant > 0
            ORDER BY d.dated DESC";
        return $this->executeSelect($sql);
    }

    public function AddDette(string $numerod, string $dated, float $montantd, string $etatd, int $idcl)
    { 
        $sql = "INSERT INTO dette (numero, dated, montantd, etat, idcl ) VALUES (:numero, dated, montantd, etat, idcl )";
        $pdo = new \PDO('mysql:host=localhost;dbname=boutique_bd', 'root', '');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        return $pdo->lastInsertId();
    }


    public function DetailDette()
    { 
        $sql = "SELECT 
                    cl.idcl, cl.nom, cl.prenom, cl.email, cl.telephone, cl.adresse, 
                    d.idd, d.numerod AS numero_dette, d.dated AS date_dette, d.montantd AS montant_det, 
                    a.idA, a.libelle, a.prixU AS prix_unitaire, a.qtestock AS quantite_stock, 
                    ad.qtecmd, 
                    p.idp, p.referencep AS reference_paiement, p.datep AS date_paiement, p.montantpay AS montant_paiement 
                FROM client cl
                JOIN dette d ON cl.idcl = d.idcl
                LEFT JOIN artDette ad ON d.idd = ad.idd
                LEFT JOIN article a ON ad.idA = a.idA
                LEFT JOIN paiement p ON d.idd = p.idd";
        
        return $this->executeSelect($sql);
    }
    
    public function FindDetteByTel(string $tel)
    {
        $sql = "SELECT 
                    d.idd, 
                    cl.nom, 
                    cl.prenom, 
                    cl.email, 
                    cl.telephone, 
                    d.numerod, 
                    d.dated, 
                    d.montantd AS montantd, 
                    IFNULL(SUM(p.montantpay), 0) AS verse, 
                    (d.montantd - IFNULL(SUM(p.montantpay), 0)) AS restant 
                FROM dette d 
                JOIN client cl ON d.idcl = cl.idcl 
                LEFT JOIN paiement p ON d.idd = p.idd 
                WHERE cl.telephone = :telephone 
                GROUP BY d.idd, cl.idcl 
                HAVING restant > 0";
        
        $params = ['telephone' => $tel];
        return $this->executeSelect($sql, true, $params);
    }
    

    public function FindClientByTel(string $tel)
    { 
        $sql = "SELECT * From client where telephone ='$tel'";
        return $this->executeSelect($sql,true);
    }




    public function FindDetteByDate(string $date)
    { 
        $sql = "SELECT d.idd, cl.nom, cl.prenom, cl.email, cl.telephone, d.numerod, d.dated, d.montantd AS montantd, 
        SUM(p.montantpay) AS verse, (d.montantd - SUM(p.montantpay)) AS restant 
        FROM dette d JOIN client cl ON d.idcl = cl.idcl LEFT JOIN paiement p ON d.idd = p.idd GROUP BY d.idd, cl.idcl 
        HAVING restant > 0 AND d.dated = '$date';";
        return $this->executeSelect($sql);
    }

    public function FindDetailDetteByClient(int $idcl)
    { 
        $sql = "SELECT
    cl.idcl,
    cl.nom,
    cl.prenom,
    cl.email,
    cl.telephone,
    cl.adresse,
    d.idd,
    d.numerod AS numero_dette,
    d.dated AS date_dette,
    d.montantd AS montant_det,
    a.idA,
    a.libelle,
    a.prixU AS prix_unitaire,
    a.qtestock AS quantite_stock,
    p.idp,
    p.referencep AS reference_paiement,
    p.datep AS date_paiement,
    p.montantpay AS montant_paiement
FROM
    client cl
    JOIN dette d ON cl.idcl = d.idcl
    LEFT JOIN artDette ad ON d.idd = ad.idd
    LEFT JOIN article a ON ad.idA = a.idA
    LEFT JOIN paiement p ON d.idd = p.idd
WHERE cl.idcl = '$idcl'";
        return $this->executeSelect($sql);
    }

    public function FindArticleByRef(string $ref){ 
        $sql = "SELECT * FROM article WHERE refA = '$ref' ";
        return $this->executeSelect($sql,true);
    }

    public function FindArticleByDetteId(int $idd){ 
        $sql = "SELECT 
    article.idA, 
    article.libelle, 
    article.prixU, 
    article.qtestock, 
    article.refA, 
    artDette.qtecmd, 
    artDette.prixAchat
FROM 
    artDette
JOIN 
    article ON artDette.idA = article.idA
JOIN 
    dette ON artDette.idd = dette.idd
WHERE 
    dette.idd = '$idd';";
        return $this->executeSelect($sql,true);
    }


    public function insertDette(array $data): void
    {
        $sql = "INSERT INTO dette (numerod, dated, montantd, etat, idcl ) VALUES (:numerod, :dated, :montantd, :etat, :idcl)";
        $pdo = new \PDO('mysql:host=localhost;dbname=boutique_bd', 'root', '');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    }



    // public function getClientIdByTelephone(string $telephone)
    // {
    //     $sql = "SELECT idcl FROM client WHERE telephone = :telephone";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute(['telephone' => $telephone]);
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return $result ? (int)$result['idcl'] : null;
    // }








}
