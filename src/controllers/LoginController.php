<?php

namespace App\Controllers;
// namespace App\Core;
use App\Models\LoginModel;
use App\Core\Controller;
use App\Core\Session;
use App\Core\Validator;

class LoginController extends Controller {
    private LoginModel $loginModel;

public function __construct(){
    parent::__construct();
    // Session::open();
    $this->layout="connexion"; 
    $this ->loginModel = new LoginModel;
    $this->load();

}

public function load(){
    if (isset($_REQUEST["action"])) {
        if ($_REQUEST["action"]=="login") {
            $this->login();
        }
        elseif ($_REQUEST["action"]=="show-form"){
            $this->showForm();
        }
        elseif ($_REQUEST["action"]=="logout"){
            Session::close();
            header("Location:".WEBROOT."/?controller=login&action=show-form");

        }
    }
    else{
        $this->showForm();
    }

}

public function showForm(){
    parent::rendorView("login/login");
}

private function login(){
    if(!Validator::isEmpty("login","login est obligatoire")){
        Validator::isEmail("login");
    }
        Validator::isEmail("login");
    
    Validator::isEmpty("mdp","");
    // var_dump(Validator::validate());
    // die;
    if (Validator::validate()) {

    $connect=$this->loginModel->connexion($_POST["login"],$_POST["mdp"]);
        // var_dump($connect);
        // die;
    if ($connect!=false) {
        Session::setObject("userConnect",$connect);
        header("Location:".WEBROOT."/?controller=dashboard&action=dash");
        exit;
    } 
    else {
        // Authentification échouée
        parent::rendorView("login/login",["errors"=>["connect"=>"login ou password incorrect"]]);
        
    }
}   else{
    parent::rendorView("login/login",["errors"=>Validator::$errors]);
}

}















// public function redirectAfterConnect(){

//             $this->redirectToRoute([
//                 "controller"=>"dette",
//                 "action"=>""
//             ]);
//             var_dump("ok");
//             header("Location:".WEBROOT."/controller=dette&action=dette");
//         exit;

// }

// private function login(){
//     if(!Validator::isEmpty("email","login est obligatoire")){
//         Validator::isEmail("email");
//     }
//     Validator::isEmpty("mdp","");
//     if (Validator::validate()) {
//         $connect= $this->loginModel->connexion($_POST["email"],$_POST["pwd"]);
//         var_dump("ok");
//         die;
//         if ($connect!=false) {
//             Session::setObject("userConnect",$connect);
//             $this->redirectAfterConnect();
//             // var_dump(Autorisation::getRole());
//             // var_dump(Autorisation::hasRole("Client"));

//         }else{
//             #Erreur not Exit
//             parent::rendorView("login/login",["errors"=>["connect"=>"login ou password incorrect"]]);

//         }
//     }else{
//         parent::rendorView("login/login",["errors"=>Validator::$errors]);

//     }

//     // var_dump($connect);
//     // parent::rendorView("login/login");
//     // $datas = $this ->demandeModel-> findAllWithClient();
//     // require_once("../views/demande/liste.demande.html.php");

// }

}