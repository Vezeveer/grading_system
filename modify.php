<?php
session_start();
if ($_SESSION['Active'] == false) {
  header("location:login.php");
  exit;
}

include('configs/dbconnect.php');

// write query
$sql = 'SELECT firstName, lastName, dob, entryCreated, student_id, id FROM students ORDER BY entryCreated';

// get the result set (set of rows)
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free the $result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

<?php include 'globals/header.php' ?>

<div class="jumbotron">

  <div class="container">
    <h2><?php echo $_GET['firstName'] . " " . $_GET['lastName'] ?></h2>
    <table class="table">

      <tbody>
        <tr>
          <td>firstname</td>
          <td>
            sdf
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</div>

<?php include 'globals/footer.php' ?>

</html>