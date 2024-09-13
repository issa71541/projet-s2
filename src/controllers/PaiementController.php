<?php

namespace App\Controllers;
use App\Models\PaiementModel;
use App\Core\Controller;

class PaiementController extends Controller{
    private PaiementModel $paiementModel;

public function __construct(){
    $this ->paiementModel=new PaiementModel;
    $this->load();
}


public function load(){
    if (isset($_REQUEST["action"])) {
        if ($_REQUEST["action"]=="paiement") {
            $data = [
                'montantpay' => $_REQUEST['montantpay'],
                'datep' => date("Y-m-d"),
                'idd' => $_REQUEST['idd'],
                'referencep'=>self::genererNumeroPAY()
            ];
            // var_dump($data);
            // die;
            $this->paiementModel->Addpay($data);
        }
}
        // parent::rendorView("dette/ajout.Dette",["datas"=>$datas]);
        header("Location:".WEBROOT."/?controller=dette&action=detail&idcl=".$_REQUEST['idcl']."&idd=".$_REQUEST['idd']);
        exit;


}
public function genererNumeroPAY()
    {
        $n = mt_rand(0, 9999999999);
        return 'P' . str_pad($n, 5, '0', STR_PAD_LEFT);
    }







// public function load()
// {
//     if (isset($_REQUEST["action"])) {
//         if ($_REQUEST["action"] == "paiement") {
//             // Récupérer les données du formulaire
//             $data = [
//                 'montantpay' => $_REQUEST['montantpay'],
//                 'datep' => date("Y-m-d"),
//                 'idd' => $_REQUEST['idd'],
//             ];
           

//             // Insérer les données et récupérer l'ID de la dernière insertion
//             $lastId = $this->paiementModel->Addpay($data);
//             var_dump($lastId);
//             die;
//             if ($lastId) {
//                 // Générer la référence basée sur l'ID de la dernière insertion
//                 $referencep = 'P' . str_pad($lastId, 5, '0', STR_PAD_LEFT);
//                 $data['referencep'] = $referencep;
              

//                 // Mettre à jour l'enregistrement avec la référence générée
//                 $this->paiementModel->updateReference($lastId, $referencep);
//             }

//             parent::rendorView("dette/ajout.Dette",["datas"=>$datas]);
//         }
//     }
// }




public function Addpay(){









    // $datas=$this->paiementModel->FindPayementByIdDette();
    // if ($dette) {
    //     $montantDu = $dette['montantd'] - $dette['montantpay'];
    //       // Vérifier si le montant payé est inférieur ou égal au montant dû
    //         if ($montant > $montantDu) {
    //         // Montant payé dépasse le montant dû, retournez un message d'erreur
    //         return "Le montant payé ($montant) dépasse le montant dû ($montantDu). Veuillez entrer un montant inférieur.";
    //     }
    //      // Calculer les nouveaux montants
    //         $newMontantPaye = $dette['montantpay'] + $montant;
    //         $newMontantDu = $dette['montantd'] - $newMontantPaye;

    //     // Générer la référence du paiement
    //         $lastId = $conn->lastInsertId();
    //         $reference = 'P' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);

    //     // Insertion du paiement dans la table paiement
    //         $sqlInsert = "INSERT INTO paiement (referencep, datep, montantpay, idd) VALUES (:referencep, :datep, :montantpay, :idd)";
    //         $stmtInsert = $conn->prepare($sqlInsert);
    //         $stmtInsert->execute([
    //                 ':referencep' => $reference,
    //                 ':datep' => date('Y-m-d'),
    //                 ':montantpay' => $montant,
    //                 ':idd' => $_POST['idd']
    //             ]);

    //        // Mise à jour de la dette
    //             $sqlUpdate = "UPDATE dette SET montantpay = :montantpay, montantd = :montantd WHERE idd = :idd";
    //             $stmtUpdate = $conn->prepare($sqlUpdate);
    //             $stmtUpdate->execute([
    //                 ':montantpay' => $newMontantPaye,
    //                 ':montantd' => $newMontantDu,
    //                 ':idd' => $_POST['idd']
    //             ]);
    //         // $this->compteModel->addCompte($data);
    //         $result = $paiementModel->addPaiement($montant, $idd);
    //     }
    //     parent::rendorView("dette/detail.dette",["datas"=>$result]);


}




}