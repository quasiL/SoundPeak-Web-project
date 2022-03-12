<?php
// Funkce kontroluje řetězec podle minimální a maximální velikosti 
    function checkLength($value = "", $min, $max) {
        return !(mb_strlen($value) < $min || mb_strlen($value) > $max);
    }

// Funkce kontroluje písmena a čísla v řetězci 
    function checkSymbols($value) {
        return (preg_match("/^[a-zA-Z0-9\-_]+$/", $value));
    }

// Funkce kontroluje e-mail pomocí funkce php 
    function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

// Funkce kontroluje heslo na současnou přítomnost čísel a písmen v něm 
    function validatePassword($password) {
        if (preg_match('/[A-z]+/', $password))
            if (preg_match('/[0-9]+/', $password))
                return true;
            else
                return false;
        else
            return false;
    }

// Funkce kontroluje telefonní číslo na přítomnost čísel a nepřítomnost písmen 
    function validatePhone($phone) {
        if (preg_match('/[0-9]+/', $phone))
            if (preg_match('/[A-z]+/', $phone))
                return false;
            else
                return true;
        else
            return false;
    }