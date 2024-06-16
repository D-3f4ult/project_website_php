<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <style>
    .error-message {
      color: red;
      font-size: 14px;
      margin-top: 5px;
    }
  </style>
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

<title>watchlucury</title>
</head>
<body>
<?php
session_start();

$error_message = "";
if (isset($_GET["error"])) {
    $error_code = $_GET["error"];
    if ($error_code === "login_failed") {
        $error_message = "Invalid username or password. Please try again.";
    } elseif ($error_code === "username_not_found") {
        $error_message = "Username not found. Please check your username and try again.";
    } else {
        $error_message = "An unknown error occurred.";
    }
}


$signup_error_message = "";
if (isset($_GET["signup_error"])) {
  $error_code = $_GET["signup_error"];
  if ($error_code === "username_exists") {
      $signup_error_message = "Username already exists. Please choose a different username.";
  } elseif ($error_code === "email_exists") {
      $signup_error_message = "Email already exists. Please use a different email address.";
  } elseif ($error_code === "invalid_email_format") {
      $signup_error_message = "Invalid email format. Please enter a valid email address.";
  } else {
      $signup_error_message = "An unknown error occurred during signup.";
  }
}
?>

<section class="user">
  <div class="user_options-container">
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title">Don't have an account?</h2>
        <p class="user_unregistered-text">Banjo tote bag bicycle rights, High Life sartorial cray craft beer whatever street art fap.</p>
        <button class="user_unregistered-signup" id="signup-button">Sign up</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">Have an account?</h2>
        <p class="user_registered-text">Banjo tote bag bicycle rights, High Life sartorial cray craft beer whatever street art fap.</p>
        <button class="user_registered-login" id="login-button">Login</button>
      </div>
    </div>

    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Login</h2>
        <form method="post" class="forms_form" action="login.php">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <label for="username">Username:</label>
              <input type="text" name="username" placeholder="Username" class="forms_field-input" required autofocus />
            </div>
            <div class="forms_field">
              <label for="password">Password:</label>
              <input type="password" name="password" placeholder="Password" class="forms_field-input" required />
            </div>
            
          </fieldset>
          
          <div class="forms_buttons">
            
            <button type="button" class="forms_buttons-forgot">Forgot password?</button>
            
            <input type="submit" value="Log In" class="forms_buttons-action">
        </form>
      </div>
      <?php if (!empty($error_message)): ?>
    <div class="error-message"><?php echo $error_message; ?></div>
  <?php endif; ?>
          </div>




      <div class="user_forms-signup">
        <h2 class="forms_title">Sign Up</h2>
        <form method="post" class="forms_form" action="signup.php">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" name="username" placeholder="Username" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="email" name="email" placeholder="Email" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="password" name="password" placeholder="Password" class="forms_field-input" required />
            </div>
          </fieldset>
          <?php if (!empty($signup_error_message)): ?>
    <div class="error-message"><?php echo $signup_error_message; ?></div>
  <?php endif; ?>
          <div class="forms_buttons">
            <input type="submit" value="Sign up" class="forms_buttons-action">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<script src="js/login.js"></script>

</body>
</html>
