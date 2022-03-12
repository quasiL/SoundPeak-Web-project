<?php
// tohle je soubor, který pracuje s 'databází' users.json, která ukládá uživatelská data ('databázové dotazy')
    define('DBFILE8', 'db/users.json');
    $users = file_get_contents(DBFILE8);
    $users = json_decode($users, JSON_OBJECT_AS_ARRAY);

// funkce pro vyhledání objektu uživatele podle jména (objekt obsahuje všechny údaje, které uživatel uvedl při registraci)
    function getUserByUsername ($username, $users) {
        foreach ($users['users'] as $user) {
            if ($user['username'] == $username) {
                return $user;
            }
        }
        return null;
    }

// funkce pro vyhledání uživatelského jména podle ID uživatele  
    function getUserById($uid, $users) {
        foreach ($users['users'] as $user) {
            if ($user['id'] == $uid) {
                return $user['username'];
            }
        }
        return null;
    }
?>