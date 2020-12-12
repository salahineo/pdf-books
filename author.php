<?php
  include 'layout/include/header.php';

  if(isset($_GET['author'])) {
    // Get Author Name From Get Request
    $bookAuthor = $_GET['author'];
  }
?>

<!-- Start Author Books -->
<div class="books">
  <div class="container">
    <div class="author-info bg-secondary text-white p-2 mb-3">
      <span>جميع كتب</span>
      <span><?php echo $bookAuthor ?></span>
    </div>
    <div class="row">
      <?php
        $query = "SELECT * FROM books WHERE bookAuthor = '$bookAuthor'";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="col-md-6 col-lg-4">
            <div class="card text-center">
              <div class="img-cover">
                <img src="uploads\bookCovers/<?php echo $row['bookCover']; ?>" alt="Book Cover" class="card-img-top">
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
      ?>
    </div>
  </div>
</div>
<!-- End Author Books -->

<?php
  include 'layout/include/footer.php';
?>
