<?php

namespace App\Core;

class Validator
{
    public static array $errors = [];

    public static function validate(): bool
    {
        return count(self::$errors) == 0;
    }

    // regle de validation
    // champ obligatoire

    public static function isEmpty(string $nameField, string $sms = 'Le champ est obligatoire'): bool
    {
        if (empty($_REQUEST[$nameField])) {
            self::$errors[$nameField] = $sms;

            return true;
        }

        return false;
    }
    // Email

    public static function isEmail(string $nameField): bool
    {
        if (filter_var($_REQUEST[$nameField], FILTER_VALIDATE_EMAIL) == false) {
            self::$errors[$nameField] = "Cette valeur n'est pas un email";

            return true;
        }

        return false;
    }
}
