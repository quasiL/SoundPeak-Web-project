<?php
    require "libs/_main.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soundpeak - My albums</title>
    <link rel="icon" href="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-vinyl-music-kiranshastry-lineal-kiranshastry.png"/> 
    <link rel="stylesheet" href="css/main_style.css">
</head>
<body>
    <header>
        <div class="header_container">
            <a href="main.php"><img alt="" src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/000000/external-vinyl-music-kiranshastry-solid-kiranshastry.png"/></a>
            <a href="main.php"><span>Sound</span></a>
            <a href="main.php"><span id="peak">peak</span></a>
        </div>
        <div class="header_container">
            <a href="#"><img class="logout_icon" alt="" src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-user-interface-kiranshastry-lineal-kiranshastry-1.png"/></a>
            <?php
            // toto je zobrazení uživatelského jména nahoře 
                $username = getUserById($uid, $users);
                echo "$username";
            ?>
            <a href="#"><img class="logout_icon" alt="" src="https://img.icons8.com/ios/50/000000/exit.png"/></a>
            <form method="GET"><input id="logout_b" type="submit" name="logout" value="Log out"></form>
        </div>
    </header>
    <article>
        <h1>Menu</h1>
        <div id="mp_menu">
        </div>
        <div id="mp_list">
            <div class="list_container"><a href="add_album.php" class="plus"></a></div>
            <?php
            // stránkovaní
            	$limit = 9;
                $items = getItem($data, $uid);
                if ($items) {
                    $total = count($items);
                } else {
                    $total = 0;
                }
                if ($total > 0) {
                    $pages = ceil($total/$limit);
                    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
                        'options' => array(
                        'default'   => 1,
                        'min_range' => 1,
                        ),
                    )));
                    $offset = ($page - 1) * $limit;
                    $sorting = true;
                // $_SESSION['sorting'] odpovídá za pořadí řazení alb uživatele
                    $albums = getAlbumsByUidPaging($data, $uid, $limit, $offset, $sorting);
                // toto je zobrazení alb na stránce. Obrázek je odkaz pro přechod do alba. Pro uložení ID alba je potřeba skryté pole 
                    foreach ($albums as $album) {
                        $Link = $album['link'];
                        $Album = $album['album_name'];
                        $Band = $album['band_name'];
                        $Id = $album['id'];
                        //echo "<form action=\"#\" method=\"GET\">";
                        echo "<div class=\"list_container\">";
                        echo "<input name=\"id\" type=\"image\" src=\"$Link\" alt=\"\">";
                        echo "<a href=\"http://wa.toad.cz/~khairart/Navrh/element.php?id=$Id\"><span>$Album</span></a>";
                        echo "<span>$Band</span>";
                        echo "<input type=\"hidden\" name=\"id\" value=\"$Id\">";
                        echo "</div>";
                    }
                // stránkování 
                    if ($page > 1) {
                        $prevlink = '<a href="?page=1">&laquo;</a> <a href="?page='.($page-1).'">&lsaquo;</a>';
                    } else {
                        $prevlink = "&laquo; &lsaquo;";
                    }
                    $links = "";
                    for ($i=0; $i < $pages; $i++) {
                        if ($i == $page-1 ) {
                            $links .= " ".($i+1)." ";
                        } else {
                            $links .= " <a href=\"?page=".($i+1)."\">".($i+1)."</a> ";
                        }
                    }
                    if ($page < $pages) {
                        $nextlink = '<a href="?page='.($page+1).'">&rsaquo;</a> <a href="?page='.$pages.'">&raquo;</a>';
                    } else {
                        $nextlink = "&rsaquo; &raquo;";
                    }
                }
            ?>
        </div>
        <div class="pages">
            <?php   
            if ($total > 0) {
                echo "$prevlink $links $nextlink"; 
            }
            ?>
        </div>
    </article>
    <footer>
        <div class="footer_container">
            <div class="footer_item">
                <a href="#"><img id="footer_icon" alt="" src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/000000/external-vinyl-music-kiranshastry-solid-kiranshastry.png"/></a>
                <a href="#"><span>Soundpeak</span></a>
            </div>
            <div class="footer_item">
                <p>Soundpeak is a training project created to showcase my web development skills.
                    This work is licensed under a <a class="underline_link" target="_blank" rel="license" href="http://creativecommons.org/licenses/by/3.0/deed.en_US">Creative Commons Attribution 3.0 Unported License.</a>
                    <br>Album covers taken from <a class="underline_link" target="_blank" href="http://discogs.com">www.discogs.com.</a>
                </p>
            </div>
            <div class="footer_item"><p>&copy; 2021 Artur Khairullin</p></div>
            <div class="footer_item">
                <img alt ="" src="https://img.icons8.com/ios/50/000000/new-post.png"/>
                <a class="underline_link" href="mailto:khairart@fel.cvut.cz"><p>khairart@fel.cvut.cz</p></a>
            </div>
            <div class="footer_item">
                <a href="https://twitter.com" target="_blank"><img class="social" alt ="" src="https://img.icons8.com/ios/50/000000/twitter--v1.png"/></a>
                <a href="https://instagram.com" target="_blank"><img class="social" alt ="" src="https://img.icons8.com/ios/50/000000/instagram-new--v1.png"/></a>
                <a href="https://youtube.com" target="_blank"><img class="social" alt ="" src="https://img.icons8.com/ios/50/000000/youtube-play--v1.png"/></a>
                <a href="https://facebook.com" target="_blank"><img class="social" alt ="" src="https://img.icons8.com/ios/50/000000/facebook--v1.png"/></a>
            </div>
        </div>
        <div class="footer_container">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="index.php">Main page</a></li>
            </ul>
        </div>
        <div class="footer_container">
            <h2>Contact Me</h2>
            <form action="#" method="POST" enctype="multipart/form-data">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Your email address" value="<?= isset($_POST['send'])?htmlspecialchars($email):''?>">
                <label for="message">Message: <?= isset($_POST['send'])?htmlspecialchars($note):''?></label>
                <textarea id="message" name="message" placeholder="Write something..."><?= isset($_POST['send'])?htmlspecialchars($message):''?></textarea>
                <input type="submit" name="send" value="Send">
            </form>
        </div>
    </footer>
    <script src="static/js/main.js"></script>
</body>
</html> 