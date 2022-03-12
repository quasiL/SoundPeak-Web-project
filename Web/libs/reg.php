<?php
    require 'libs/_users.php';
    $isFormSent = count($_POST) > 0;

    $firstNameValue = '';
    $lastNameValue = '';
    $emailValue = '';
    $phoneValue = '';
    $cityValue = '';
    $stateValue = '';
    $usernameValue = '';
    $passwordValue = '';

    if ($isFormSent) {
        $firstNameValue = $_POST['firstName'];
        $lastNameValue = $_POST['lastName'];
        $emailValue = $_POST['mail'];
        $phoneValue = $_POST['phone'];
        $cityValue = $_POST['city'];
        $stateValue = $_POST['state'];
        $usernameValue = $_POST['username'];
        $passwordValue = $_POST['password'];

// Volání validačných funkce, pro volitelná pole 'země' a 'město' byly vytvořeny samostatné podmínky  
        $validFirstName = checkLength($firstNameValue, 2, 12) && checkSymbols($firstNameValue);
        $validLastName = checkLength($lastNameValue, 2, 12) && checkSymbols($lastNameValue);
        $validEmail = validateEmail($emailValue);
        $validPhone = validatePhone($phoneValue) && checkLength($phoneValue, 7, 13);
        if ($cityValue != "") {
            $validCity = checkLength($cityValue, 2, 15) && checkSymbols($cityValue);
        } else {
            $validCity = true;
        }
        if ($stateValue != "") {
            $validState = checkLength($stateValue, 2, 15) && checkSymbols($stateValue);
        } else {
            $validState = true;
        }
        $validUsername = checkLength($usernameValue, 3, 12) && checkSymbols($usernameValue);
        $validUsername2 = getUserByUsername($usernameValue, $users) == null;
        $validPassword = validatePassword($passwordValue) && checkLength($passwordValue, 8, 20);

        $valid = $validFirstName && $validLastName && $validEmail && $validPhone && $validCity && $validState && $validUsername && $validUsername2 && $validPassword;

// Pokud bylo ověření úspěšné, přidavame do 'databáze' nového uživatele a přesměrujeme ho na přihlašovací stránku 
        if ($valid) {
            define('DBFILE', 'db/users.json');
            $db = file_get_contents(DBFILE);
            $db = json_decode($db, JSON_OBJECT_AS_ARRAY);
            $newUser = array(
              'id' => uniqid(),
              'firstName' => $firstNameValue,
              'lastName' => $lastNameValue,
              'email' => $emailValue,
              'phone' => $phoneValue,
              'city' => $cityValue,
              'state' => $stateValue,
              'username' => $usernameValue,
              'passwordHash' => password_hash($passwordValue, PASSWORD_DEFAULT)  
            );
            array_push($db['users'], $newUser);
            $encodedDb = json_encode($db);
            file_put_contents(DBFILE, $encodedDb);
            
            header('Location: index.php');
        }
    }
?>