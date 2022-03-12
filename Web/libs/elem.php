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

// to je získání všech informací o albu pro zobrazení. 
    $album = getAlbumById($data, $_GET['id']);

    if ($album != false) {
        $album_name = $album['album_name'];
        $band_name = $album['band_name'];
        $link = $album['link'];

        $rating_check = checkRating($data2, $uid, $album_name);

        
    // toto je stav tlačítka 'Odeslat' nebo 'Upravit' 
        $check_for_value = checkValue($uid, $album_name);
        if ($check_for_value) {
            $vnote = "Send";
        } else {
            $vnote = "Edit";
        }

    // poslat recenzi na album 
        if (isset($_POST['send'])) {
            $message = htmlspecialchars($_POST['message']);
            if ($message != '') {
                $check = addReview($uid, $album_name, $message);
                if ($check == null) {
                    $note = "(You have already submitted your review. Now you can only edit it.)";
                    editReview($uid, $album_name, $message);
                } else {
                    $note = "(Your review has been sent.)";
                }
            } else {
                $note = "(You didn't write anything!)";
            }
        }

    // ohodnotit album 
        if (isset($_POST['rate'])) {
            addRating($uid, $album_name, $_POST['rating']);
        } 
    }
?>