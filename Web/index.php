<?php
    require "libs/_index.php";  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soundpeak - Welcome</title>
    <link rel="icon" href="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-vinyl-music-kiranshastry-lineal-kiranshastry.png"/> 
    <link rel="stylesheet" href="css/index_style.css">
</head>
<body>
    <header>
        <div class="header_container">
            <a href="#"><img alt="" src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/000000/external-vinyl-music-kiranshastry-solid-kiranshastry.png"/></a>
            <a href="#"><span>Sound</span></a>
            <a href="#"><span id="peak">peak</span></a>
        </div>
        <div class="header_container">
            <a href="#"><img class="logout_icon" alt="" src="https://img.icons8.com/pastel-glyph/64/000000/add-user-male--v2.png"/></a>
            <a class="logout_a" href="registration.php">Sign Up</a>
            <a href="#"><img class="logout_icon" alt="" src="https://img.icons8.com/ios/50/000000/import.png"/></a>
            <a class="logout_a" href="#">Log in</a>
        </div>
    </header>
    <article>     
        <div>
            <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
            <img alt="" src="static/images/1.gif" class="background" />
        </div>
        <div id="login_form">
            <form action="#" method="POST">
                <span id="cancel"></span>
                <div class="container">
                    <span>Login Form</span>
                </div>
                <div class="container">
                    <label>Username <?= isset($_POST['login'])?$note:''?></label>
                    <input autofocus type="text" placeholder="Enter Username" name="username" required>
                    <label>Password <?= isset($_POST['login'])?$note:''?></label>
                    <input type="password" placeholder="Enter Password" name="password" required>
                </div>
                <div class="container">
                    <input type="checkbox" checked name="remember"> 
                    <label>Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>

                <div class="container">
                    <button type="submit" name="login">Login</button> 
                </div>

                <div class="container">
                    <label>Are you new? </label><a href="registration.php">Sign Up</a>
                </div>
            </form>
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
                <li><a href="registration2.php">Sign Up</a></li>
                <li><a href="index.php">Log in</a></li>
            </ul>
        </div>
        <div class="footer_container"></div>
    </footer>
    <script src="static/js/index.js"></script>
</body>
</html>