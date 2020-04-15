<?php
session_start();
if ($_SESSION['Active'] == false) {
  header("location:login.php");
  exit;
}

include('configs/dbconnect.php');

if (!isset($_POST['submit'])) {
  // write query
  $sql = "SELECT * FROM students WHERE id=$_GET[id]";
  $sql2 = "SELECT * FROM year1sem1 WHERE student_id=$_GET[student_id]";
  // get the result set (set of rows)
  $result = mysqli_query($conn, $sql);
  $result2 = mysqli_query($conn, $sql2);

  // fetch the resulting rows as an array
  $grades = mysqli_fetch_all($result2, MYSQLI_ASSOC);
  $students = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // free the $result from memory
  mysqli_free_result($result);
  mysqli_free_result($result2);
}


if (isset($_POST['submit'])) {

  // escape sql chars
  $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

  $lecture_independant_learning = mysqli_real_escape_string($conn, $_POST['lecture_independant_learning']);
  $lecture_major_exam = mysqli_real_escape_string($conn, $_POST['lecture_major_exam']);

  $quiz_grade = $_POST['lecture_quiz'] + 0; //plus 0 to convert to integer
  $attendance = $_POST['lecture_attendance'] + 0;

  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = "UPDATE students SET firstName='$firstName', lastName='$lastName' WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
  } else {
    echo 'query error: ' . mysqli_error($conn);
  }
}

// close connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

<?php include 'globals/header.php' ?>

<div class="jumbotron">

  <?php
  //set arrays as single row
  $student = $students[0];
  $grade = $grades[0];
  ?>

  <div class="container">
    <h2><?php echo $_GET['firstName'] . " " . $_GET['lastName'] ?></h2>
    <form <?php echo "action=modify.php?id=" . $student['id'] ?> method="POST">
      <table class="table">
        <tbody>
          <tr>
            <td>
              <label>First Name:</label>
              <input <?php echo "value=" . $student['firstName'] ?> type="text" name="firstName" placeholder="first name" required="required">
              <br />
              <label>Last Name:</label>
              <input <?php echo "value=" . $student['lastName'] ?> type="text" name="lastName" placeholder="last name" required="required">
              <br />

              <label>Birth Date:</label>
              <input <?php echo "value=" . $student['dob'] ?> type="text" name="dob" placeholder="YYYY-MM-DD" required="required">
              <br />

              <label>Student ID:</label>
              <input <?php echo "value=" . $student['student_id'] ?> type="text" name="student_id" placeholder="student id" required="required">
            </td>
          </tr>
          <tr>
            <td>
              <div>
                <h2>Prelims</h2>
                <div class="container">
                  <h3>Lecture Grade</h3>
                  <div class="row">
                    <div class="col-md-3">
                      <h3>Quiz</h3>
                      <div class="row">
                        <label class="col-md-4">GRADE:</label>
                        <input <?php echo "value=" . $grade['lecture_quiz'] ?> class="col-md-8" type="text" name="lecture_quiz" id="lecture_quiz" required="required">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <h3>Attendance</h3>

                      <div class="row">
                        <label class="col-md-4">GRADE:</label>
                        <input <?php echo "value=" . $grade['lecture_attendance'] ?> class="col-md-8" type="text" name="lecture_attendance" id="lecture_attendance" required="required">

                      </div>
                    </div>
                    <div class="col-md-3">
                      <h3>Independent Learning</h3>
                      <div class="row">
                        <label class="col-md-3">GRADE:</label>
                        <input <?php echo "value=" . $grade['lecture_independant_learning'] ?> class="col-md-8" type="text" name="lecture_independant_learning" id="lecture_independant_learning" required="required">

                      </div>
                    </div>
                    <div class="col-md-3">
                      <h3>Major Exam</h3>
                      <div class="row">
                        <label class="col-md-3">GRADE:</label>
                        <input <?php echo "value=" . $grade['lecture_major_exam'] ?> class="col-md-8" type="text" name="lecture_major_exam" id="lecture_major_exam" required="required">

                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="center">
                <input type="submit" name="submit" value="Submit" class="bg-primary btn brand z-depth-0">
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>

</div>

<?php include 'globals/footer.php' ?>

</html>