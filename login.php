<?php
include 'configs/dbconnect.php';

$username = '';
$password = '';

?>


<div class="login-form">
  <form action="options.php" method="POST">
    <h2 class="text-center">Admin Log in</h2>
    <div class="form-group">
      <input type="text" class="form-control" value="<?php echo htmlspecialchars($username) ?>" placeholder="Username" required="required">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" value="<?php echo htmlspecialchars($password) ?>" placeholder="Password" required="required">
    </div>
    <div class="form-group">
      <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">
    </div>
    <!--
    <div class="clearfix">
      <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
      <a href="#" class="pull-right">Forgot Password?</a>
    </div>
-->
  </form>
  <!--
  <p class="text-center"><a href="#">Create an Account</a></p>
-->
</div>