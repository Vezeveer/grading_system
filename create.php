<?php
include('configs/dbconnect.php');

$firstName = '';
$lastName = '';
$dob = '';
$student_id = '';

if (isset($_POST['submit'])) {

  // check firstName
  $firstName = $_POST['firstName']; // add regex here to check name
  // check lastName, dob, studentid, etc

  // escape sql chars
  $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

  // create sql
  $sql = "INSERT INTO students(firstName, lastName, dob, student_id)
      VALUES('$firstName','$lastName','$dob','$student_id')";

  // save to db and check
  if (mysqli_query($conn, $sql)) {
    // success
    header('Location: view.php');
  } else {
    echo 'query error: ' . mysqli_error($conn);
  }
} // end POST check

?>

<!DOCTYPE html>
<html>

<?php include 'globals/header.php' ?>

<section>
  <h4>Add a student</h4>
  <form action="create.php" method="POST">
    <label>First Name:</label>
    <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName) ?>" placeholder="first name" required="required">

    <label>Last Name:</label>
    <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName) ?>" placeholder="last name" required="required">

    <label>Birth Date:</label>
    <input type="text" name="dob" value="<?php echo htmlspecialchars($dob) ?>" placeholder="YYYY-MM-DD" required="required">

    <label>Student ID:</label>
    <input type="text" name="student_id" value="<?php echo htmlspecialchars($student_id) ?>" placeholder="student id" required="required">

    <div>
      <h2>Prelims</h2>
      <div>
        <div>
          <h3>Quiz</h3>
          <label>Q1</label>
          <input type="text" name="quiz1" value="<?php echo htmlspecialchars($quiz1) ?>" placeholder="-" required="required">

          <label>Q2</label>
          <input type="text" name="quiz2" value="<?php echo htmlspecialchars($quiz2) ?>" placeholder="-" required="required">

          <label>Q3</label>
          <input type="text" name="quiz3" value="<?php echo htmlspecialchars($quiz3) ?>" placeholder="-" required="required">
        </div>
        <div>
          <h3>Attendance</h3>

        </div>
        <div>
          <h3>Independent Learning</h3>

        </div>
      </div>
      <div>
        <h3>Major Exam</h3>

      </div>
    </div>

    <div class="center">
      <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
    </div>
  </form>
</section>

<?php include 'globals/footer.php' ?>

</html>