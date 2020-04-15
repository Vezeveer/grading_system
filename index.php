<?php
session_start();
if ($_SESSION['Active'] == false) {
  header("location:login.php");
  exit;
}
?>

<!DOCTYPE html>
<html>

<?php include 'globals/header.php' ?>

<div class="jumbotron">

  <?php include 'students.php' ?>

</div>

<?php include 'globals/footer.php' ?>

</html>