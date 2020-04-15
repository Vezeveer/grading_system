<?php

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



<div class="container">
  <h2>Students</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Date of Birth</th>
        <th>Entry Created</th>
        <th>ID</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($students as $student) : ?>
        <tr>
          <td><?php echo htmlspecialchars($student['firstName']); ?></td>
          <td><?php echo htmlspecialchars($student['lastName']); ?></td>
          <td><?php echo htmlspecialchars($student['dob']); ?></td>
          <td><?php echo htmlspecialchars($student['entryCreated']); ?></td>
          <td><?php echo htmlspecialchars($student['student_id']); ?></td>
          <td>
            <div class="row">
              <div class="col-md-6"><?php echo "<a href=delete.php?delete=true&id=" . $student['id'] . " onClick=\"return confirm('are you sure you want to delete??');\">delete</a>" ?></div>
              <div class="col-md-6"><?php echo "<a href=\"modify.php?
              id=" . $student['id'] . "&
              firstName=" . $student['firstName'] . "&
              lastName=" . $student['lastName'] . "\"
              >modify</a>" ?></div>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>