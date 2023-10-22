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
    include_once("./includes/messenger.php");
    ?>
    <section class="container bg-white shadow rounded-4 p-0 overflow-hidden pe-4">
      <div class="row">
        <div class="col-lg-6">
          <img src="./assets/images/banner_large_5.jpg" class="object-fit-cover" width="100%" height="600" alt="" />
        </div>
        <div class="col-lg-6">
          <h1 class="text-uppercase pt-3">Liên hệ</h1>
          <p>Nếu bạn có bất kì thắc mắc nào hãy gửi cho chúng tôi.</p>
          <form action="./php/handle_contact.php" method="post">
            <div class="row mb-3">
              <div class="col-6">
                <label for="full_name" class="form-label">Họ và tên:</label>
                <input type="text" class="form-control" name="full_name" required />
              </div>
              <div class="col-6">
                <label for="phone" class="form-label">Số điện thoại:</label>
                <input type="text" class="form-control" name="phone" required />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <label for="subject" class="form-label">Chủ đề:</label>
                <input type="text" class="form-control" name="subject" required />
              </div>
              <div class="col-6">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" name="email" required />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <label for="content" class="form-label">Vấn đề mà bạn gặp phải:</label>
                <textarea id="content" class="form-control" name="content" rows="3"></textarea>
              </div>
            </div>
            <div class="d-flex column-gap-3">
              <input type="hidden" name="request" value="post_contact">
              <button type="submit" class="btn btn-primary px-5">Gửi</button>
              <button type="reset" class="btn btn-outline-primary">Nhập lại</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <?php include_once("./includes/footer.php"); ?>
  </div>
  <script src="./lib/boostrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/main.js"></script>
</body>

</html>