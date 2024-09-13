<?php

namespace App\Core;

class Session 
{

    public static function open():void{
        if (session_id()==="") {
            session_start(); // $_SESSION
        }  
    }

    public static function keyExist(string $key):bool{
        return isset($_SESSION[$key]);
    }

    public static function set(string $key,mixed $value):void{
        $_SESSION[$key]=$value;
    }

        //convertion objet en json pour la session
    public static function setObject(string $key,mixed $value):void{
        $_SESSION[$key]=json_decode(json_encode($value),true);
    }

    public static function get(string $key):mixed{
        if(!self::keyExist($key)) return false;
        return $_SESSION[$key];
    }

    public static function close():void{
        unset($_SESSION["userConnect"]);
        session_destroy();
    }


}