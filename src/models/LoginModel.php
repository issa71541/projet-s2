<?php
namespace App\Models;
use App\Core\Model;

class LoginModel extends Model{

    public function connexion(string $email, string $mdp)
    { 
        $sql = "select * from boutiquier where email Like '$email' And mdp   Like '$mdp' ";
        return $this->executeSelect($sql,true);
    }


}