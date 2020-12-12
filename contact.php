<?php
  include 'layout/include/header.php';

  // Get Form Data Through POST Request
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    if(empty($name) || empty($email) || empty($subject) || empty($message)) {
      $error = "<div class='mb-3 d-inline-block alert alert-danger'>" . "الرجاء ملء الحقول أدناه" . "</div>";
    } else {
      $query = "INSERT INTO messages(name,email,subject,message) VALUES('$name','$email','$subject','$message')";
      $res = mysqli_query($con, $query);
      if(isset($res)) {
        $success = "<div class='mb-3 d-inline-block alert alert-success'>" . "تم ارسال الرسالة بنجاح" . "</div>";
      }
    }
  }
?>

<!-- Start Contact -->
<div class="contact-us container">
  <h3 class="text-center my-5">تواصل معنا</h3>
  <div class="contact mb-5">
    <?php
      // Check Error Or Success Message
      if(isset($error)) {
        echo $error;
      } elseif(isset($success)) {
        echo $success;
      }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="form-row">
        <div class="col-md-6 form-group">
          <input type="text" name="name" class="form-control" id="name" placeholder="الاسم">
        </div>
        <div class="col-md-6 form-group">
          <input type="email" class="form-control" name="email" id="email" placeholder="الايميل">
        </div>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="subject" id="subject" placeholder="عنوان الرسالة">
      </div>
      <div class="form-group">
        <textarea class="form-control" name="message" id="message" rows="5" placeholder="الرسالة"></textarea>
      </div>
      <div class="text-center">
        <button class="btn btn-primary" type="submit">ارسال الرسالة</button>
      </div>
    </form>
  </div>
</div>
<!-- End Contact -->

<!-- Start Footer -->
<?php
  include 'layout/include/footer.php';
?>
