<?php

?>

<head>
  <title>Grades DB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="css/login.css" rel="stylesheet" type="text/css" />

</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">GradeSystem</a>
      </div>
      <ul class="nav navbar-nav">
        <?php
        if (isset($_SESSION['Active'])) : ?>
          <li <?php if ($_SERVER['REQUEST_URI'] == "/projectGrades/grading_system/index.php") : ?> class="active" <?php endif ?>><a href="index.php">Home</a></li>
          <li <?php if ($_SERVER['REQUEST_URI'] == "/projectGrades/grading_system/create.php") : ?> class="active" <?php endif ?>><a href="create.php">Add Student</a></li>
          <li><a class="bg-success" href="logout.php" role="button">Log out</a></li>
        <?php endif ?>
      </ul>
    </div>
  </nav>