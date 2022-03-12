<?php
    require "libs/_users.php";

// validace jména a hesla
    if (isset($_POST['login'])) {
        $username = isset($_POST['username']) ? $_POST['username'] : false;
        $password = isset($_POST['password']) ? $_POST['password'] : false;

        if ($username && $password) {
            $user = getUserByUsername($username, $users);

            if ($user) {
                if (password_verify($password, $user['passwordHash'])) {
                    session_start();
                    $_SESSION['uid'] = $user['id'];
                    header('Location: main.php');     
                } else {
                    $note = "(Invalid username or password)";
                }   
            } else {
                $note = "(Invalid username or password)";
            }
        } else {
            $note = "(Invalid username or password)";
        }
    }  
?>