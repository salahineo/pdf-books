<?php
  session_start();
  include 'include/connection.php';
  // check if session isset
  if(isset($_SESSION['adminInfo'])){
  header('Location:dashboard.php');
  exit();
} else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Start Title -->
  <title>تسجيل الدخول</title>
  <!-- End Title -->

  <!-- Start CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-rtl.css">
  <link rel="stylesheet" href="css/custom.css">
  <!-- End CSS -->

  <!-- favicon -->
  <link rel="icon" href="images/book.ico">
</head>

<body>

  <div class="login">
    <?php
      // Store Inputs Values
      if(isset($_POST['log'])) {
        $adminInfo = $_POST['adminInfo'];
        $adminPass = $_POST['password'];

        // check if inputs are not empty
        if(empty($adminInfo) || empty($adminPass)) {
          // Show An Error
          echo "<div class='alert alert-danger'>" . "الرجاء مل الحقول أدناه" . "</div>";
        } else {
          // check if values are matching the database
          $query = "SELECT * FROM admin WHERE (adminName='$adminInfo' OR adminEmail='$adminInfo') AND adminPass='$adminPass'";
          $result = mysqli_query($con, $query);
          $row = mysqli_num_rows($result);
          // If There Is A Result
          if($row > 0) {
            // Save The Session, Then Go To Dashboard
            $_SESSION['adminInfo'] = $adminInfo;
            header('Location:dashboard.php');
            exit();
          } else {
            // Show An Error
            echo "<div class='alert alert-danger'>" . "البيانات غير متطابقة الرجاء المحاولة مرة أخرى" . "</div>";
          }
        }
      }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <h5>تسجيل الدخول</h5>
      <div class="form-group">
        <label for="mail"> إسم المستخدم أو البريد الإلكتروني</label>
        <input type="text" class="form-control" id="mail" name="adminInfo"/>
      </div>
      <div class="form-group">
        <label for="pass">كلمة السر</label>
        <input type="password" class="form-control" id="pass" name="password"/>
      </div>
      <button class="btn btn-success" name="log">تسجيل الدخول</button>
    </form>
  </div>

  <?php
    include 'include/footer.php';
    }
  ?>
