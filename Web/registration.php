<?php
// validation.php obsahuje jen validační funkce, reg.php obsahuje hlavní kód s voláním těchto funkcí podle podmínek 
    require 'libs/validation.php';
    require 'libs/reg.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soundpeak - Registration</title>
    <link rel="icon" href="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-vinyl-music-kiranshastry-lineal-kiranshastry.png"/> 
    <link rel="stylesheet" href="css/registration_style.css">
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
    <div id="server_error">
      <?php
      // $isFormSent je true pokud formulář byl odeslán. Zbytek proměnných závisí na typu chyby (reg.php)
/*         if ($isFormSent) {
          if (!$validFirstName) {echo "Server error: Your First Name is incorrect. Try again.";}
          if (!$validLastName) {echo "Server error: Your Last Name is incorrect. Try again.";}
          if (!$validEmail) {echo "Server error: Your Email is incorrect. Try again.";}
          if (!$validPhone) {echo "Server error: Your Phone is incorrect. Try again.";}
          if (!$validCity) {echo "Server error: City field is incorrect. Try again.";}
          if (!$validState) {echo "Server error: State field is incorrect. Try again.";}
          if (!$validUsername) {echo "Server error: Your username is incorrect. Try again.";}
          if (!$validPassword) {echo "Server error: Your password is incorrect. The password must be at least 8 characters long and contain numbers and letters. Try again.";}
          if (!$validUsername2) {echo "Server error: Username is already taken. Try again.";}
        } */
      ?>
    </div>
    <div class="reg">
      <form id="reg_form" action="#" method="POST">
        <h1>Sign Up: (* Required fields)</h1>
        <div class="tab">
          <?php
            if ($isFormSent) {
              if (!$validFirstName) {
                echo "<label>First Name* (Your First Name is incorrect)</label>";
              } else {echo "<label>First Name*</label>";}
            } else {echo "<label>First Name*</label>";}
          ?>
          <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstNameValue); ?>">
          <?php
            if ($isFormSent) {
              if (!$validLastName) {
                echo "<label>Last Name* (Your Last Name is incorrect)</label>";
              } else {echo "<label>Last Name*</label>";}
            } else {echo "<label>Last Name*</label>";}
          ?>
          <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastNameValue); ?>">
        </div>
        <div class="tab">
          <?php
            if ($isFormSent) {
              if (!$validEmail) {
                echo "<label>E-mail* (Your Email is incorrect)</label>";
              } else {echo "<label>E-mail*</label>";}
            } else {echo "<label>E-mail*</label>";}
          ?>
          <input type="text" name="mail" value="<?php echo htmlspecialchars($emailValue); ?>">
          <?php
            if ($isFormSent) {
              if (!$validPhone) {
                echo "<label>Phone* (Your Phone is incorrect)</label>";
              } else {echo "<label>Phone*</label>";}
            } else {echo "<label>Phone*</label>";}
          ?>
          <input type="text" name="phone" value="<?php echo htmlspecialchars($phoneValue); ?>">
        </div>
        <div class="tab">
          <?php
            if ($isFormSent) {
              if (!$validCity) {
                echo "<label>City (City field is incorrect)</label>";
              } else {echo "<label>City</label>";}
            } else {echo "<label>City</label>";}
          ?>
          <input type="text" name="city" value="<?php echo htmlspecialchars($cityValue); ?>">
          <?php
            if ($isFormSent) {
              if (!$validState) {
                echo "<label>State (State field is incorrect)</label>";
              } else {echo "<label>State</label>";}
            } else {echo "<label>State</label>";}
          ?>
          <input type="text" name="state" value="<?php echo htmlspecialchars($stateValue); ?>">
        </div>
        <div class="tab">
          <?php
            if ($isFormSent) {
              if (!$validUsername2) {echo "<label>Username* (Username is already taken)</label>";}
              if (!$validUsername) {
                echo "<label>Username* (Your username is incorrect)</label>";
              } else {echo "<label>Username*</label>";}
            } else {echo "<label>Username*</label>";}
          ?>
          <input type="text" name="username" value="<?php echo htmlspecialchars($usernameValue); ?>">
          <?php
            if ($isFormSent) {
              if (!$validPassword) {
                echo "<label>Password* (Your password is incorrect)</label>";
              } else {echo "<label>Password*</label>";}
            } else {echo "<label>Password*</label>";}
          ?>
          <input type="password" name="password" value="<?php echo htmlspecialchars($passwordValue); ?>">
        </div>
        <p id="error_status"></p>
        <div class="button">
          <button type="button" id="prevBtn">Previous</button>
          <button type="button" id="nextBtn">Next</button>
        </div>
        <div class="status">
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
        </div>
      </form>
    </div>
  </article>
  <script src="static/js/registration.js"></script>
  </body>
</html>