<?php

namespace App\Controllers;
use App\Models\ClientModel;
use App\Core\Controller;


class ClientController extends Controller {
    private ClientModel $clientModel;


    public function __construct() {
        $this->clientModel = new ClientModel();
        $this->load();

    }

    public function load(){

        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"]=="client") {
            $this->FindAllClient();
            }
            elseif ($_REQUEST["action"]=="detailClient") {
                $this->FindDetailClientId();
            }
            elseif ($_REQUEST["action"]=="ajoutClient") {
                $this->AddClient();
            }
            elseif ($_REQUEST["action"]=="SaveClient") {
                $this->SaveClient();
                
                    // $data=[
                    //     'nom' =>$_POST["nom"],
                    //     'prenom' => $_POST["nom"],
                    //     'email' => $_POST["email"],
                    //     'telephone'=>$_POST["telephone"],
                    //     'adresse'=>$_POST["adresse"],
                    //     'image'=>$_FILES['image']['name']

                    // ];

                    // var_dump($data);
                    // die;

             
                // $this->detteModel->AjoutClient($data); 
                // header("Location:".WEBROOT."/?controller=client&action=client");
                // exit;
            }
            
        }

    }

    private function FindAllClient(){

        $datas=$this->clientModel->FindAllClient();
        if (isset($_POST["telSearch"])) {
            $datas=$this->clientModel->FindClientByTel($_POST["telSearch"]);
        }
 
        if (isset($_POST["etat"])) {
            var_dump("ok");
            die;
                $etat=isset($_REQUEST['etat'])?$_REQUEST['etat']:"All";
                $datas=$this->clientModel->FindAllClient($etat);
                $etats=$this->clientModel->findAllCategorie();
           
        }
      
        parent::rendorView("client/liste.client",["datas"=>$datas]);
    }

    private function FindDetailClientId(){
    
        parent::rendorView("client/detail.client",["datas"=>$this ->clientModel->FindDetailClientId(intval($_REQUEST['idcl']))]);
    
    }

    private function AddClient(){

        parent::rendorView("client/Ajout.Client");
    }

    private function SaveClient(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $data = [
                'nom' => $_POST["nom"],
                'prenom' => $_POST["prenom"],
                'email' => $_POST["email"],
                'telephone' => $_POST["telephone"],
                'adresse' => $_POST["adresse"]
            ];
             var_dump($data);
            die;
            parent::rendorView("client/Ajout.Client");
    }
}



}