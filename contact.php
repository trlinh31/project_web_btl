<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/fonts/css/all.min.css" />
  <link rel="stylesheet" href="./lib/boostrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/css/app.css" />
  <title>Nhóm 2 | Bán hàng nội thất</title>
</head>

<body>
  <div id="root">
    <?php
    include_once("./includes/header.php");
    include_once("./includes/notification.php");
    include_once("./includes/messenger.php");
    ?>
    <section class="container bg-white shadow-lg p-0 overflow-hidden pe-4">
      <div class="row">
        <div class="col-lg-6">
          <img src="./assets/images/banner_large_5.jpg" class="object-fit-cover" width="100%" height="600" alt="" />
        </div>
        <div class="col-lg-6">
          <div class="mb-5">
            <h1 class="text-primary text-uppercase pt-3">Liên hệ</h1>
            <small>Nếu bạn có bất kì thắc mắc nào hãy gửi cho chúng tôi.</small>
          </div>
          <form action="./php/handle_contact.php" method="post" onsubmit="return validateFormContact()">
            <div class="row mb-3">
              <div class="form-group col-12">
                <label for="title" class="form-label">Tiêu đề:</label>
                <input type="text" class="form-control" id="title" name="title" />
              </div>
            </div>
            <div class="row mb-5">
              <div class="form-group col-12">
                <label for="content" class="form-label">Vấn đề mà bạn gặp phải:</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
              </div>
            </div>
            <div class="d-flex column-gap-3">
              <button type="submit" class="btn btn-primary px-5 rounded-0">Gửi</button>
              <button type="reset" class="btn btn-outline-primary rounded-0">Nhập lại</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <?php include_once("./includes/footer.php"); ?>
  </div>
  <script src="./lib/boostrap/js/bootstrap.bundle.min.js"></script>
  <script src="./lib/jquery/jquery-3.7.1.min.js"></script>
  <script src="./assets/js/main.js"></script>
  <script src="./assets/js/validator.js"></script>
</body>

</html>