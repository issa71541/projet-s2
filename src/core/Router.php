<?php 

// namespace App\Core;
// use App\Core\Controller\{
//     ErreurController,
//     LoginController,

// };

// class Router 
// {
//     public static function run(){
//             if (isset($_REQUEST["controller"])) {
//                 $controllerClass = ucfirst($_REQUEST["controller"]) . "Controller";
//                 $fileController="../src/controllers/$controllerClass.php";
//                 if (file_exists($fileController)) {
//                     require_once $fileController;
//                     $class = new $controllerClass();
//                 }else{
//                     require_once "../src/controllers/ErreurController.php";
//                     $class = new ErreurController();
//                 }
//             }   
        
//         else{
//             require_once "../src/controllers/LoginController.php";
//             $class = new LoginController();
//         }
//     }
// }