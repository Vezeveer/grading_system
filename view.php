<?php

include('configs/dbconnect.php');

// write query for all pizzas
$sql = 'SELECT firstName, lastName FROM students ORDER BY entryCreated';

// get the result set (set of rows)
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free the $result from memory (good practise)
mysqli_free_result($result);

// close connection
mysqli_close($conn);
?>


<?php foreach ($students as $student) : ?>
  <h6><?php echo htmlspecialchars($student['firstName']); ?></h6>
<?php endforeach; ?>