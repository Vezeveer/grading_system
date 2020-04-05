<?php

?>

<head>
  <title>Grades DB</title>
  <!--
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
-->
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
          <li class="active"><a href="#">Home</a></li>
          <li><a href="create.php">Add Student</a></li>
          <li><a href="#">Delete</a></li>
          <li><a href="#">Modify</a></li>
          <li><a class="bg-success" href="logout.php" role="button">Log out</a></li>
        <?php endif ?>
      </ul>
    </div>
  </nav>