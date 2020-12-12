<?php
  include 'layout/include/header.php';
?>
<!-- Start Banner  -->
<div class="banar">
  <div class="overlay"></div>
  <div class="lib-info text-center">
    <h4>حمّل عشرات الكتب مجاناً </h4>
    <p>من أجل نشر المعرفة والثقافة، وغرس حب القراءة بين المتحدثين باللغة العربية</p>
  </div>
</div>
<!-- End Banner -->

<!-- Start Books -->
<div class="books">
  <div class="container">
    <div class="row">
      <?php
        // Check For Page Get Request
        if(isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        // Limit For Books In The Main Page
        $limit = 9;
        $start = ($page - 1) * $limit;
        $query = "SELECT * FROM books ORDER BY id DESC LIMIT $start, $limit";
        $result = mysqli_query($con, $query);
        // Loop Through Books
        if(mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-6 col-lg-4">
              <div class="card text-center">
                <div class="img-cover">
                  <img src="uploads/bookCovers/<?php echo $row['bookCover']; ?>" alt="Book Cover" class="card-img-top">
                </div>
                <div class="card-body">
                  <h4 class="card-title">
                    <a
                      href="book.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['bookCat']; ?>"><?php echo $row['bookTitle']; ?></a>
                  </h4>
                  <p class="card-text"><?php echo mb_substr($row['bookContent'], 0, 150, "UTF-8") . ' ...'; ?></p>
                  <a href="book.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['bookCat']; ?>">
                    <button class="custom-btn">تحميل الكتاب</button>
                  </a>
                </div>
              </div>
            </div>
            <?php
          }
        } else {
          ?>
          <div class="text-center">لاتوجد أي كتب</div>
          <?php
        }
      ?>
    </div>
    <!-- Start pagination -->
    <?php
      // Calculate The Pagination Limits
      $query = "SELECT * FROM books";
      $result = mysqli_query($con, $query);
      $total_cat = mysqli_num_rows($result);
      $total_pages = ceil($total_cat / $limit);
    ?>
    <ul class="pagination justify-content-center">
      <li class="page-item <?php if(($page - 1) == 0) {
        echo 'disabled';
      } ?>"><a class="page-link" href="index.php?page=<?php if(($page - 1) > 0) {
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
          } ?>"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php
        }
      ?>
      <li class="page-item  <?php if(($page + 1) == $total_pages + 1) {
        echo 'disabled';
      } ?>"><a class="page-link" href="index.php?page=<?php
          if(($page + 1) < $total_pages) {
            echo $page + 1;
          } elseif(($page + 1) >= $total_pages) {
            echo $total_pages;
          }
        ?>">التالي</a></li>
    </ul>
    <!-- End pagination -->
  </div>
</div>
<!-- End Books -->

<?php
  include 'layout/include/footer.php';
?>
