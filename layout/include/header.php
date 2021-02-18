<?php
  session_start();
  require_once('dashboard/include/connection.php');
?>
<!DOCTYPE html>
<html lang="ar">

<head>
  <!-- Start Meta -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Mohamed Salah">
  <meta name="description" content="موقع تحميل كتب عربية مجانا">
  <meta name="keywords" content="كتب, كتب عربية, تحميل كتب, كتب مجانا, كتب عربية مجانا">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- End Meta -->

  <!-- Start Title -->
  <title>PDF كتب</title>
  <!-- End Title -->

  <!-- Start CSS -->
  <link rel="stylesheet" href="layout/css/bootstrap.min.css">
  <link rel="stylesheet" href="layout/css/bootstrap-rtl.css">
  <link rel="stylesheet" href="layout/css/custom.css">
  <link rel="stylesheet" href="layout/boxicons/css/boxicons.min.css">
  <!-- End CSS -->

  <!-- favicon -->
  <link rel="icon" href="layout/images/book.ico">
</head>

<body>

  <!-- Start navbar -->
  <nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
      <a href="index.php" class="navbar-brand">كتب PDF</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="contact.php" class="nav-link">تواصل معنا</a>
          </li>
          <?php
            // Show Dashboard Button If There Is A Session
            if(isset($_SESSION['adminInfo'])) {
              ?>
              <a href="dashboard/dashboard.php" target="_blank" class="dashboard-btn">لوحة التحكم</a>
              <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End navbar -->
