<?php
    require "libs/elem.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $album_name;?></title>
    <link rel="icon" href="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-vinyl-music-kiranshastry-lineal-kiranshastry.png"/> 
    <link rel="stylesheet" href="css/element_style.css">
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
                $username = getUserById($uid, $users);
                echo "$username";
            ?>
            <a href="#"><img class="logout_icon" alt="" src="https://img.icons8.com/ios/50/000000/exit.png"/></a>
            <form method="GET"><input id="logout_b" type="submit" name="logout" value="Log out"></form>
        </div>
    </header>
    <article>
        <?php
            if (getAlbumById($data, $_GET['id']) != null) {
                include '1.php';
            } else {
                include '2.php';
            }
        ?>
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
                <li><a href="main.php">My albums</a></li>
                <li><a href="index.php">Main page</a></li>
            </ul>
        </div>
        <div class="footer_container"></div>
    </footer>
    <script src="static/js/element.js"></script>
</body>
</html> 
