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

    <!-- Start Delete Book -->
    <?php
    // Get Id From Get Request
    if(isset($_GET['id'])) {
      // Store ID Value
      $id = $_GET['id'];
      // Delete This ID Record
      $query = "DELETE FROM books WHERE id = '$id'";
      $delete = mysqli_query($con, $query);
    }
    ?>
    <!-- End Delete book -->

    <div class="container-fluid">
      <div class="show-books">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">الرقم</th>
              <th scope="col">عنوان الكتاب</th>
              <th scope="col">المؤلف</th>
              <th scope="col">التصنيف</th>
              <th scope="col">تاريخ الإضافة</th>
              <th scope="col">الإجراء</th>
            </tr>
          </thead>
          <tbody>
            <!-- Fetch categories from database -->
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
              $query = "SELECT * FROM books ORDER BY id DESC LIMIT $start, $limit";
              $res = mysqli_query($con, $query);
              // Calculate The Virtual ID
              $virtualID = ($page - 1) * $limit;
              while($row = mysqli_fetch_assoc($res)) {
                $virtualID++;
                ?>

                <tr>
                  <td><?php echo $virtualID; ?></td>
                  <td><?php echo $row['bookTitle']; ?></td>
                  <td><?php echo $row['bookAuthor']; ?></td>
                  <td><?php echo $row['bookCat']; ?></td>
                  <td><?php echo $row['bookDate']; ?></td>
                  <td>
                    <a href="edit-book.php?id=<?php echo $row['id']; ?>" class="btn btn-success">تعديل</a>
                    <a href="?id=<?php echo $row['id']; ?>" class="btn btn-success confirm">حذف</a>
                  </td>
                </tr>
                <?php
              }
            ?>
          </tbody>
        </table>
        <!-- Start pagination -->
        <?php
          $query = "SELECT * FROM books";
          $result = mysqli_query($con, $query);
          $total_cat = mysqli_num_rows($result);
          $total_pages = ceil($total_cat / $limit);
        ?>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item <?php if(($page - 1) == 0) {
              echo 'disabled';
            } ?>"><a class="page-link" href="books.php?page=<?php if(($page - 1) > 0) {
                echo $page - 1;
              } else {
                echo 1;
              }
              ?>">السابق</a></li>
            <?php
              for($i = 1; $i <= $total_pages; $i++) {
                ?>
                <li class="page-item <?php if($page == $i) {
                  echo 'active';
                } ?>"><a class="page-link" href="books.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php
              }
            ?>
            <li class="page-item  <?php if(($page + 1) == $total_pages + 1) {
              echo 'disabled';
            } ?>"><a class="page-link" href="books.php?page=<?php
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
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
    include 'include/footer.php';
    ?>


    <?php
  }
?>
