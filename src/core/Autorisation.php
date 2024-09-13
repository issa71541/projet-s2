<?php
namespace App\Core;

class Autorisation{

    public static function isConnect():bool{
        return Session::keyExist("userConnect");
    
    }

    public static function hasRole(string $roleName):bool{
        return self::getRole()==$roleName;
    
    }

    public static function getRole(string $key="libp"):string{
        return Session::get("userConnect")[$key];
    
    }



}