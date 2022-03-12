<?php
  require "libs/_add_album.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soundpeak - Add album</title>
    <link rel="icon" href="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-vinyl-music-kiranshastry-lineal-kiranshastry.png"/> 
    <link rel="stylesheet" href="css/add_album_style.css">
</head>
  <body>
    <header>
      <div class="header_container">
          <a href="main.php"><img alt="" src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/000000/external-vinyl-music-kiranshastry-solid-kiranshastry.png"/></a>
          <a href="main.php"><span>Sound</span></a>
          <a href="main.php"><span id="peak">peak</span></a>
      </div>
      <div class="header_container">
          <a href="main.php"><img id="logout_icon" alt="" src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/000000/external-back-arrow-basic-ui-elements-flatart-icons-outline-flatarticons-1.png"/></a>
          <a id="logout_a" href="main.php">Back to main page</a>
      </div>
  </header>
  <article>
    <div class="reg">
      <form id="reg_form" action="#" method="POST">
        <h1>Add new album</h1>
        <select name=album_s size=1>
        <?php
          foreach ($new_albums["albums"] as $item) {
              $Link = $item['link'];
              $Album = $item['album_name'];
              $Band = $item['band_name'];
              echo "<option>";
              echo $Album;
              echo "</option>";
          }
        ?>
        </select>
        <div><input class="add" type="submit" name="add" value="Submit"></div>
      </form>
    </div>
  </article>
  </body>
</html>