<?php

include('configs/dbconnect.php');

if (isset($_GET['delete'])) {

  $id_to_delete = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = "DELETE FROM students WHERE id = $id_to_delete";

  if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
  } else {
    echo 'query error: ' . mysqli_error($conn);
  }
}
