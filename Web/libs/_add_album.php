<?php
    require "libs/_fromDB.php";
    session_start();
    $uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : null;
    //if (isset($_GET['logout'])) {
        //session_unset();
        //session_destroy();
        //header('Location: index.php');
    //}
    if (!$uid) {
       header('Location: index.php');
    }
    define('DBFILE2', 'db/new_albums.json');
    $new_albums = file_get_contents(DBFILE2);
    $new_albums = json_decode($new_albums, JSON_OBJECT_AS_ARRAY);

    $llink = "";
    $bname = "";
    if (isset($_POST['album_s'])) {
      foreach($new_albums['albums'] as $item) {
        if ($item['album_name'] == $_POST['album_s']) {
            $llink = $item['link'];
            $bname = $item['band_name'];
        }
      }
      addAlbum($data, $_SESSION['uid'], $llink, $_POST['album_s'], $bname);
    }
?>