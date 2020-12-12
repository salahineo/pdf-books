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

    <!-- Fetch categoryName form database -->
    <?php
    // Get Id Value Form Get Request Method
    if(isset($_GET['id'])) {
      // Store ID Value
      $id = $_GET['id'];
      // Get This Record From DB To Show It
      $query = "SELECT * FROM categories WHERE id = '$id'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($result);
    }
    ?>

    <!-- Edit category -->
    <?php
    // Check Request Method For POST -> (Update)
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // Store Input Value
      $categoryName = $_POST['category'];
      // Check Input Value
      if(empty($categoryName)) {
        echo "<div class='alert alert-danger mt-4'>" . "الرجاء ملء الحقل أدناه" . "</div>";
      } else {
        $query = "UPDATE categories SET categoryName='$categoryName' WHERE id = '$id'";
        $edit = mysqli_query($con, $query);
        header("Location: categories.php");
        exit();
      }
    }
    ?>

    <div class="container-fluid">
      <div class="edit-cat">
        <form action="?id=<?php echo $row['id']; ?>" method="POST">
          <div class="form-group">
            <label for="cat">تعديل التصنيف</label>
            <input type="text" class="form-control" id="cat" value="<?php echo $row['categoryName']; ?>"
                   name="category">
          </div>
          <button class="btn btn-success">تعديل</button>
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
