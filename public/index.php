<?php
define("ROOT", "C:/Users/HP/Desktop/Php");
define('WEBROOT', 'http://localhost:8002');
require_once ROOT."/vendor/autoload.php";

if (session_status()==PHP_SESSION_NONE) {
    session_start();
}

use App\Controllers\ {
    DetteController,
    LoginController,
    
    ClientController,
    PaiementController,
    DashboardController

};

if (isset($_REQUEST['controller'])) {
    $controller = $_REQUEST['controller'];
    if ($controller == 'dette') {
        $controller = new DetteController();
        // $controller->index();
    }
    elseif ($controller == 'client') {
        $controller = new ClientController();
    }
    // elseif ($controller == 'js') {
    //     $controller = new ClientJSController();
    // }
    elseif ($controller == 'paiement') {
        $controller = new PaiementController();
        // $controller->index();
    }
    elseif ($controller == 'login') {
        $controller = new LoginController();
        // $controller->index();
    }
    elseif ($controller == 'dashboard') {
        $controller = new DashboardController();
        // $controller->index();
    }
}
else {

    $controller = new LoginController();
    // $controller = new DetteController();
    // $controller->index();
}