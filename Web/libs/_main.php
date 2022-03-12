<?php
// _users.php pracuje s 'databází' users.json, která ukládá uživatelská data, které byly zadány při registraci ('databázové dotazy')
// _fromDB.php je soubor, který simuluje dotazy na zbytek 'databázových tabulek' (alba, hodnocení atd.) 
    require "libs/_fromDB.php";
    require "libs/_users.php";

// spuštění session
    session_start();
    $uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : null;


// log out, přesměrujeme uživatele na přihlašovací stránku a ukončeme session
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header('Location: index.php');
    }
    if (!$uid) {
       header('Location: index.php');
    }

// každé album má své vlastní ID (každý uživatel má své vlastní UID ). Toto je přechod na stránku s albem 
    if (isset($_GET['id'])) {
        $_SESSION['id'] = $_GET['id'];
        header('Location: element.php');
    }
    
// toto je odeslání zprávy vývojáři webu. Zprávy se zapisují do 'databáze'. 
// Po odeslání následuje 15 sekundová prodleva, během které uživatel nemůže odesílat zprávy
// všechna pole formuláře musí být vyplněna 
    if (isset($_POST['send'])) {
        $email = $_POST['email'];
        $message = $_POST['message'];
        if ($email != '' && $message != '') {
            $check = addEmail($uid, $email, $message);
            if ($check == null) {
                $note = "(You will be able to send the next message in only 15 seconds!)";
            } else {
                $note = "(Your message has been sent. Thanks!)";
            }
        } else {
            $note = "Empty fields!";
        }
    }
?>