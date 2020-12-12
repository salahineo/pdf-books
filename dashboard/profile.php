<?php
  session_start();
  include 'include/connection.php';
  include 'include/header.php';
  if(!isset($_SESSION['adminInfo'])) {
    header('Location:index.php');
    exit();
  } else {
    ?>

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->

    <div class="container-fluid">
      <?php
        // Get Admin Info
        $query = "SELECT * FROM admin";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

        // If There Is An Edit
        if(isset($_POST['edit'])) {
          // Store Input Value
          $adminName = $_POST['adminName'];
          $adminEmail = $_POST['adminEmail'];
          $adminPass = $_POST['adminPass'];

          // Update DB Info
          $query = "UPDATE admin SET
                    adminName = '$adminName',
                    adminEmail = '$adminEmail',
                    adminPass = '$adminPass'
                    WHERE id = '1'";
          $res = mysqli_query($con, $query);

          // Refresh The Page For New Info
          header("REFRESH:0");
          exit();
        }
      ?>
      <div class="profile">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group">
            <label for="name">الإسم</label>
            <input type="text" class="form-control" id="name" value="<?php echo $row['adminName']; ?>" name="adminName">
          </div>
          <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="text" class="form-control" id="email" value="<?php echo $row['adminEmail']; ?>"
                   name="adminEmail">
          </div>
          <div class="form-group">
            <label for="pass">كلمة السر</label>
            <input type="text" class="form-control" id="pass" value="<?php echo $row['adminPass']; ?>" name="adminPass">
          </div>
          <button class="btn btn-success" name="edit">تعديل البيانات</button>
        </form>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
    include 'include/footer.php';
  }
?>
