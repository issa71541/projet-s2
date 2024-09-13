<?php
require_once("../src/models/LoginModel.php");
require_once("../src/core/Controller.php");

class ErreurController extends Controller {

public function __construct(){

    $this->load();
}

public function load(){
    $this->showPage();

}

private function showPage(){

echo"Error";
}

} 