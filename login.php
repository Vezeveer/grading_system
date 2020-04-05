<?php
require_once('configs/cfg.php');

session_start();
?>

<!DOCTYPE html>
<html>

<?php include 'globals/header.php' ?>

<div class="container">
  <form action="" method="post" name="Login_Form" class="form-signin">
    <h2 class="form-signin-heading">Admin sign in</h2>
    <label for="inputUsername" class="sr-only">Username</label>
    <input name="Username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button name="Submit" value="Login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    <?php

    /* Check if login form has been submitted */
    if (isset($_POST['Submit'])) {

      // Rudimentary hash check
      $result = password_verify($_POST['Password'], $Password);

      /* Check if form's username and password matches */
      if (($_POST['Username'] == $Username) && ($result === true)) {

        /* Success: Set session variables and redirect to protected page */
        $_SESSION['Username'] = $Username;

        $_SESSION['Active'] = true;
        header("location:index.php");
        exit;
      } else {
    ?>
        <!-- Show an error alert -->
        &nbsp;
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Warning!</strong> Incorrect information.
        </div>
    <?php
      }
    }
    ?>

  </form>
</div>

<?php include 'globals/footer.php' ?>

</html>