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
      <div class="content">
        <div class="statistics text-center">
          <div class="row">
            <div class="col-sm-6">
              <div class="statistic">
                <?php
                  // Get The Number Of Books
                  $query = "SELECT id FROM books";
                  $result = mysqli_query($con, $query);
                  $bookNum = mysqli_num_rows($result);
                  echo '<h3>' . $bookNum . '</h3>';
                ?>
                <p>عدد الكتب</p>
                <img src="images/dash-book.png" alt="Books Number" width="80" height="80">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="statistic">
                <?php
                  // Get The Number Of Categories
                  $query = "SELECT id FROM categories";
                  $result = mysqli_query($con, $query);
                  $catNum = mysqli_num_rows($result);
                  echo '<h3>' . $catNum . '</h3>';
                ?>
                <p>عدد التصنيفات</p>
                <img src="images/dash-cat.png" alt="Categories Number" width="80" height="80">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
    include 'include/footer.php';
  }
?>
