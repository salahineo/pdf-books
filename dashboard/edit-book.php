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
    // Store The Id From Get Request
    $id = $_GET['id'];
    // Get Info Of The Current Book ID
    $query = "SELECT * FROM books WHERE id = $id";
    $res = mysqli_query($con, $query);
    $main = mysqli_fetch_assoc($res);

    // On POST Request -> (Edit)
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Store Input Value
      $bookTitle = $_POST['bookTitle'];
      $bookAuthor = $_POST['authorName'];
      $bookCat = $_POST['bookCat'];
      $bookContent = $_POST['bookContent'];
      // Book Cover
      $imageName = $_FILES['bookCover']['name'];
      $imageTmp = $_FILES['bookCover']['tmp_name'];
      // Book file
      $bookName = $_FILES['book']['name'];
      $bookTmp = $_FILES['book']['tmp_name'];

      if(empty($bookTitle) || empty($bookAuthor) || empty($bookCat) || empty($bookContent)) {
        $error = "<div class='alert alert-danger'>" . "الرجاء ملء الحقول أدناه" . "</div>";
      } elseif(empty($imageName)) {
        $error = "<div class='alert alert-danger'>" . "الرجاء إختيار صورة مناسبة" . "</div>";
      } elseif(empty($bookName)) {
        $error = "<div class='alert alert-danger'>" . "الرجاء إختيار ملف الكتاب" . "</div>";
      } else {
        // Book cover
        $bookCover = rand(0, 1000) . "_" . $imageName;
        move_uploaded_file($imageTmp, "../uploads/bookCovers/" . $bookCover);
        // Book cover
        $book = rand(0, 1000) . "_" . $bookName;
        move_uploaded_file($bookTmp, "../uploads/books/" . $book);
        $query = "UPDATE books SET 
                  bookTitle   = '$bookTitle',
                  bookAuthor  = '$bookAuthor',
                  bookCat     = '$bookCat',
                  bookCover   = '$bookCover',
                  book        = '$book',
                  bookContent = '$bookContent'
                  WHERE id    = '$id'";
        $res = mysqli_query($con, $query);
        if(isset($res)) {
          header("REFRESH:0");
        }
      }
    }
    ?>

    <div class="container-fluid">
      <!-- Start new book -->
      <div class="new-book">
        <?php
          // Check Error Or Success Message
          if(isset($error)) {
            echo $error;
          }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="title">عنوان الكتاب</label>
            <input type="text" id="title" class="form-control" name="bookTitle"
                   value="<?php echo $main['bookTitle']; ?>">
          </div>
          <div class="form-group">
            <label for="author">إسم الكاتب</label>
            <input type="text" id="author" class="form-control" name="authorName"
                   value="<?php echo $main['bookAuthor']; ?>">
          </div>
          <div class="form-group">
            <label for="title">التصنيف</label>
            <select class="form-control" name="bookCat">
              <?php
                $query = "SELECT categoryName FROM categories";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <option <?php if($main['bookCat'] == $row['categoryName']) {
                    echo 'selected';
                  } ?>><?php echo $row['categoryName']; ?></option>
                  <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="img">غلاف الكتاب</label>
            <div class="info mb-2">الملف الحالي: <?php echo $main['bookCover']; ?></div>
            <input type="file" class="form-control" name="bookCover">
          </div>
          <div class="form-group">
            <label for="img">ملف الكتاب</label>
            <div class="info mb-2">الملف الحالي: <?php echo $main['book']; ?></div>
            <input type="file" class="form-control" name="book">
          </div>
          <div class="form-group">
            <label for="img">نبذة عن الكتاب</label>
            <textarea name="bookContent" id="" cols="30" rows="10"
                      class="form-control"><?php echo $main['bookContent']; ?></textarea>
          </div>
          <button class="btn btn-success">تعديل الكتاب</button>
        </form>
      </div>
      <!-- End new book -->
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
