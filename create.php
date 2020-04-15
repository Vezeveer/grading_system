<?php
session_start();
include('configs/dbconnect.php');

if (isset($_POST['submit'])) {

  // check firstName
  $firstName = $_POST['firstName']; // add regex here to check name
  // check lastName, dob, studentid, etc

  // escape sql chars
  $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

  $sessions = mysqli_real_escape_string($conn, $_POST['sessions']);
  $present = mysqli_real_escape_string($conn, $_POST['present']);
  $lecture_independant_learning = mysqli_real_escape_string($conn, $_POST['lecture_independant_learning']);
  $lecture_major_exam = mysqli_real_escape_string($conn, $_POST['lecture_major_exam']);

  $quiz1 = mysqli_real_escape_string($conn, $_POST['quiz1']) + 0;
  $quiz2 = mysqli_real_escape_string($conn, $_POST['quiz2']) + 0;
  $quiz3 = mysqli_real_escape_string($conn, $_POST['quiz3']) + 0;

  $quiz_grade = round(($quiz1 + $quiz2 + $quiz3) / 3);
  $attendance = round(($present / $sessions) * 100);

  // create sql
  $sql = "INSERT INTO students(firstName, lastName, dob, student_id)
      VALUES('$firstName','$lastName','$dob','$student_id');";
  $sql .= "INSERT INTO year1sem1(student_id, lecture_quiz, lecture_attendance, lecture_independant_learning, lecture_major_exam)
      VALUES('$student_id','$quiz_grade','$attendance','$lecture_independant_learning','$lecture_major_exam')";

  // save to db and check
  if (mysqli_multi_query($conn, $sql)) {
    // success
    header('Location: index.php');
  } else {
    echo 'query error: ' . mysqli_error($conn);
  }
} // end POST check

?>

<!DOCTYPE html>
<html>

<?php include 'globals/header.php' ?>

<section class="jumbotron">
  <div class="container">
    <h2>Add a student</h2>
    <form action="create.php" method="POST">
      <table class="table">
        <tbody>
          <tr>
            <td>
              <label>First Name:</label>
              <input type="text" name="firstName" placeholder="first name" required="required">
              <br />
              <label>Last Name:</label>
              <input type="text" name="lastName" placeholder="last name" required="required">
              <br />

              <label>Birth Date:</label>
              <input type="text" name="dob" placeholder="YYYY-MM-DD" required="required">
              <br />

              <label>Student ID:</label>
              <input type="text" name="student_id" placeholder="student id" required="required">
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
                        <label class="col-md-3">Q1</label>
                        <input class="col-md-9" type="text" name="quiz1" id="quiz1" placeholder="-" required="required">
                      </div>
                      <div class="row">
                        <label class="col-md-3">Q2</label>
                        <input class="col-md-9" type="text" name="quiz2" id="quiz2" placeholder="-" required="required">
                      </div>
                      <div class="row">
                        <label class="col-md-3">Q3</label>
                        <input class="col-md-9" type="text" name="quiz3" id="quiz3" placeholder="-" required="required">
                      </div>
                      <div class="row">
                        <label class="col-md-4">GRADE:</label>

                        <div class="col-md-4" id="quiz_output"></div>
                        <button class="col-md-4" onclick="calcQuiz()" type="button">calc</button>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <h3>Attendance</h3>
                      <div class="row">
                        <label class="col-md-3">Sessions</label>
                        <input class="col-md-9" type="text" name="sessions" id="lecture_sessions" placeholder="-" required="required">
                      </div>
                      <div class="row">
                        <label class="col-md-3">Present</label>
                        <input class="col-md-9" type="text" name="present" id="lecture_present" placeholder="-" required="required">
                      </div>
                      <div class="row">
                        <label class="col-md-4">GRADE:</label>
                        <div class="col-md-4" id="attend_output"></div>
                        <button class="col-md-4" onclick="calcAttendance()" type="button">calc</button>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <h3>Independent Learning</h3>
                      <div class="row">
                        <label class="col-md-3">GRADE:</label>
                        <input class="col-md-9" type="text" name="lecture_independant_learning" id="independent_learning" placeholder="-" required="required">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <h3>Major Exam</h3>
                      <div class="row">
                        <label class="col-md-3">GRADE:</label>
                        <input class="col-md-9" type="text" name="lecture_major_exam" id="independent_learning" placeholder="-" required="required">
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
</section>

<?php include 'globals/footer.php' ?>

</html>