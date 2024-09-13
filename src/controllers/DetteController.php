<?php

namespace App\Controllers;
use App\Models\DetteModel;
use App\Models\PaiementModel;
use App\Core\Controller;

class DetteController extends Controller{
    private DetteModel $detteModel;
    private PaiementModel $paiementModel;

public function __construct(){
    $this ->detteModel=new DetteModel;
    $this ->paiementModel=new PaiementModel;
    $this->load();
}

public function load(){

    if (isset($_REQUEST["action"])) {
        if ($_REQUEST["action"]=="dette") {
            $this->FindDetteNonSolde();
        }
        elseif ($_REQUEST["action"]=="addDette") {
            $this->AddDette();
        }
        elseif ($_REQUEST["action"]=="SaveDette") {
            // var_dump($_POST);
            // die;
            $newDette=[
                'numerod' => 'DT'. rand(100, 999),
                'dated' => date("Y-m-d"),
                'montantd' => $_POST["montant"],
                'etat' => "Non soldé",
                'idcl' =>  $_SESSION["client"]->idcl

            ];
            $this->detteModel->insertDette($newDette); 
            header("Location:".WEBROOT."/?controller=dette&action=dette");
            exit;
            //  var_dump($newDette);
            // die;
            // $this->SaveDette();
        }
        elseif ($_REQUEST["action"]=="detail") {
            $this->DetailDette();
        }
    }
    else{
        $this->FindDetteNonSolde();
    }

}

private function FindDetteNonSolde(){

    $datas=$this->detteModel->FindDetteNonSolde();
    // echo "<pre>";
    // var_dump($datas);
    // echo "</pre>";
    // die;

    if (isset($_POST["telSearch"])) {
        $datas=$this->detteModel->FindDetteByTel($_POST["telSearch"]);
        // var_dump($datas);
        // die; 
        
    }
    // parent::rendorView("dette/liste.dette",["datas"=>$datas]);
    
    if (isset($_POST["dateSearch"])) {
        $datas=$this->detteModel->FindDetteByDate($_POST["dateSearch"]);
        // var_dump($datas);
        // die;
    }
    
    parent::rendorView("dette/liste.dette",["datas"=>$datas]);

}

private function AddDette() {
    // $_SESSION["client"] = [];

    // Recherche du client par téléphone
    if (isset($_POST["tel"])) {
        $client = $this->detteModel->FindClientByTel($_POST["tel"]);
        if ($client) {
            $_SESSION["client"] = $client;
            // var_dump($_SESSION["client"]);
            // die;
            $_SESSION["tabArticle"] = [];
        }
    }
    
    // Recherche de l'article par référence
    if (isset($_POST["ref"])) {
        $article = $this->detteModel->FindArticleByRef($_POST["ref"]);
        if ($article) {
            $_SESSION["article"] = $article;
            // var_dump($_SESSION["client"]);
            // die;   
        }
    }

    // Ajout ou mise à jour de la quantité de l'article
    if (isset($_POST["qte"])) {
        $idA = $_SESSION["article"]->idA;
        $qte = $_POST["qte"];
        $articleExistant = false;

        // Parcourir les articles déjà dans la session pour voir si l'article existe déjà
        foreach ($_SESSION["tabArticle"] as &$article) {
            if ($article["idA"] == $idA) {
                // Si l'article existe déjà, augmenter la quantité et le total
                $article["qte"] += $qte;
                $article["total"] = $article["qte"] * $article["prixU"];
                $articleExistant = true;
                break;
            }
        }

        // Si l'article n'existe pas déjà, on l'ajoute comme un nouvel article
        if (!$articleExistant) {
            $nd = [
                "idA" => $idA,
                "libelle" => $_SESSION["article"]->libelle,
                "qte" => $qte,
                "prixU" => $_SESSION["article"]->prixU,
                "total" => $qte * $_SESSION["article"]->prixU
            ];
            array_push($_SESSION["tabArticle"], $nd);
        }
    }

    parent::rendorView("dette/ajout.Dette");
}

private function  SaveDette(){
  
    if (isset($_SESSION['client']) && isset($_SESSION['tabArticle']) && !empty($_SESSION['tabArticle'])) {
        $montantTotal = array_sum(array_column($_SESSION['tabArticle'], 'montant'));
        
        $client = $_SESSION['client'];
        // var_dump($client);
        // die;
        $idcl = $this->detteModel->getClientIdByTelephone($_SESSION['client']['telephone']);

        if ($idcl) {
            $numerod = 'DT'. rand(100, 999);
            $this->detteModel->insertDette($numerod, date('Y-m-d'), $montantTotal, 'Non soldé', $idcl );         
            }
            unset($_SESSION['tabArticle']);
            unset($_SESSION['client']);


            // Rediriger vers la page de liste des dettes
            header("Location:".WEBROOT."/?controller=dette&action=dette");

            // header('Location: index.php?controller=dette&action=dette');
            exit;
    }


}

private function DetailDette(){
       $paiement=$this ->paiementModel->FindPayementByIdDette($_REQUEST['idd']);
    //     echo "<pre>";
    //     var_dump($datas);
    //     echo "</pre>";
    //     die;
    parent::rendorView("dette/detail.Dette",["datas"=>$this ->detteModel->FindDetailDetteByClient(intval($_REQUEST['idcl'])),$datas=$this->detteModel->DetailDette(),"paiements"=>$paiement]);

}


}