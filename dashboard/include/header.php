<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Start Meta -->
  <meta charset="UTF-8">
  <meta name="author" content="Mohamed Salah">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- End Meta -->

  <!-- Start Title -->
  <title>لوحة التحكم</title>
  <!-- End Title -->

  <!-- Start CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-rtl.css">
  <link rel="stylesheet" href="css/custom.css">
  <!-- End CSS -->

  <!-- Favicon -->
  <link rel="icon" href="images/book.ico">
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading bg-success">لوحة التحكم</div>
      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item list-group-item-action bg-light">نظرة عامة</a>
        <a href="profile.php" class="list-group-item list-group-item-action bg-light">البروفايل</a>
        <a href="categories.php" class="list-group-item list-group-item-action bg-light">التصنيفات</a>
        <a href="#" class="list-group-item list-group-item-action bg-light" data-toggle="collapse" data-target="#menu">الكتب</a>
        <!-- Collapse menu -->
        <ul class="collapse sub-menu" id="menu">
          <a href="new-book.php" class="list-group-item list-group-item-action bg-success ">كتاب جديد</a>
          <a href="books.php" class="list-group-item list-group-item-action bg-success">كل الكتب</a>
        </ul>
        <a href="messages.php" class="list-group-item list-group-item-action bg-light">رسائل المستخدمين</a>
      </div>
    </div>

    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-success" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="../index.php" target="_blank">عرض الموقع <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                <?php
                  // Show Admin Name
                  $query = "SELECT adminName FROM admin";
                  $result = mysqli_query($con, $query);
                  $row = mysqli_fetch_assoc($result);
                  echo $row['adminName'];
                ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php">تسجيل الخروج</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
