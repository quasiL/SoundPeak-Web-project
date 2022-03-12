<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soundpeak - Registration</title>
    <link rel="icon" href="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-vinyl-music-kiranshastry-lineal-kiranshastry.png"/> 
    <link rel="stylesheet" href="css/registration2_style.css">
</head>
  <body>
    <header>
      <div class="header_container">
          <a href="index.php"><img alt="" src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/000000/external-vinyl-music-kiranshastry-solid-kiranshastry.png"/></a>
          <a href="index.php"><span>Sound</span></a>
          <a href="index.php"><span id="peak">peak</span></a>
      </div>
      <div class="header_container">
          <a href="index.php"><img id="logout_icon" alt="" src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/000000/external-back-arrow-basic-ui-elements-flatart-icons-outline-flatarticons-1.png"/></a>
          <a id="logout_a" href="index.php">Back to main page</a>
      </div>
  </header>
  <article>
    <div class="reg">
      <form id="reg_form" action="#" method="POST">
        <h1>Sign Up:</h1>
        <div class="tab">
          <label>First Name</label>
          <input type="text" name="name">
          <label>Last Name</label>
          <input type="text" name="name">
        </div>
        <div class="tab">
          <label>E-mail</label>
          <input type="text" name="name">
          <label>Phone</label>
          <input type="text" name="name">
        </div>
        <div class="tab">
          <label>City</label>
          <input type="text" name="name">
          <label>State</label>
          <input type="text" name="name">
        </div>
        <div class="tab">
          <label>Username</label>
          <input type="text" name="name">
          <label>Password</label>
          <input type="password" name="name">
        </div>
        <p id="error_status"></p>
        <div class="button">
          <button type="button">Submit</button>
        </div>
      </form>
    </div>
  </article>
  <script src="static/js/registration.js"></script>
  </body>
</html>