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

    <?php
    // Check Request Method If Get -> (Delete)
    if(isset($_GET['id'])) {
      // Store Id Value
      $id = $_GET['id'];
      // Delete With This ID
      $query = "DELETE FROM categories WHERE id = '$id'";
      $delete = mysqli_query($con, $query);
    }

    // Check Request Method If POST -> (Insert)
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // Store Input Value
      $category = $_POST['category'];
      // Check Input Value
      if(empty($category)) {
        // Set Error Message
        $catErro = "<div class='alert alert-danger'>" . "الرجاء ملء الحقل أدناه" . "</div>";
      } else {
        // Trigger Insert Query
        $query = "INSERT INTO categories(categoryName) VALUES('$category')";
        $result = mysqli_query($con, $query);
        if(isset($result)) {
          $catSuccess = "<div class='alert alert-success'>" . "تم إضافة التصنيف بنجاح" . "</div>";
        }
      }
    }

    ?>

    <div class="container-fluid">
      <!-- Start categories section -->
      <div class="categories">
        <?php
          // Display Error Or Success Message
          if(isset($catErro)) {
            echo $catErro;
          }
          if(isset($catSuccess)) {
            echo $catSuccess;
          }
        ?>
        <div class="add-cat">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
              <label for="cat">إضافة تصنيف :</label>
              <input type="text" id="cat" class="form-control" name="category">
            </div>
            <button class="btn btn-success">إضافة</button>
          </form>
        </div>
        <div class="show-cat">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">الرقم</th>
                <th scope="col">عنوان التصنيف</th>
                <th scope="col">تاريخ الإضافة</th>
                <th scope="col">الإجراء</th>
              </tr>
            </thead>
            <tbody>
              <!-- Fetch Categories From DB -->
              <?php
                // Check Page Get Variable
                if(isset($_GET['page'])) {
                  // If Exist Assign It To Variable
                  $page = $_GET['page'];
                } else {
                  // If Not Exist Assign It To 1
                  $page = 1;
                }
                // Set Start & Limit For Pagination
                $limit = 4;
                $start = ($page - 1) * $limit;
                // Display Un DESC Order
                $query = "SELECT * FROM categories ORDER BY id DESC LIMIT $start, $limit";
                $res = mysqli_query($con, $query);
                // Calculate The Virtual ID
                $virtualID = ($page - 1) * $limit;
                while($row = mysqli_fetch_assoc($res)) {
                  $virtualID++;
                  ?>
                  <tr>
                    <td><?php echo $virtualID; ?></td>
                    <td><?php echo $row['categoryName']; ?></td>
                    <td><?php echo $row['categoryDate']; ?></td>
                    <td>
                      <a href="edit-cat.php?id=<?php echo $row['id']; ?>" class="btn btn-success">تعديل</a>
                      <a href="?id=<?php echo $row['id']; ?>" class="btn btn-success confirm">حذف</a>
                    </td>
                  </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
          <!-- Start Pagination -->
          <?php
            // Get Number Or Rows & Number Of Pages
            $query = "SELECT * FROM categories";
            $result = mysqli_query($con, $query);
            $total_cat = mysqli_num_rows($result);
            $total_pages = ceil($total_cat / $limit);
          ?>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item <?php if(($page - 1) === 0) {
                echo 'disabled';
              } ?>">
                <a class="page-link" href="categories.php?page=<?php if(($page - 1) > 0) {
                  echo $page - 1;
                } else {
                  echo 1;
                } ?>">السابق</a>
              </li>
              <?php
                for($i = 1; $i <= $total_pages; $i++) {
                  ?>
                  <li class="page-item <?php if($page == $i) {
                    echo 'active';
                  } ?>"><a class="page-link" href="categories.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php
                }
              ?>
              <li class="page-item  <?php if(($page + 1) == ($total_pages + 1)) {
                echo 'disabled';
              } ?>"><a class="page-link" href="categories.php?page=<?php
                  if(($page + 1) < $total_pages) {
                    echo $page + 1;
                  } elseif(($page + 1) >= $total_pages) {
                    echo $total_pages;
                  }
                ?>">التالي</a></li>
            </ul>
          </nav>
          <!-- End pagination -->
        </div>
      </div>
      <!-- End categories section -->
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
    include 'include/footer.php';
  }
?>
