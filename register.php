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
    <div class="form-wrapper">
      <div class="bg-white p-4 shadow" style="width: 500px; height: max-content;">
        <h1 class="text-primary">Đăng Ký</h1>
        <hr />
        <?php include_once("./includes/notification.php"); ?>
        <form action="./php/handle_register.php" method="post" onsubmit="return validateFormRegister()">
          <div class="form-group mb-3">
            <label for="full_name" class="form-label">Tên tài khoản<sup class="text-danger">*</sup></label>
            <input type="text" name="full_name" id="full_name" class="form-control" />
          </div>
          <div class="form-group mb-3">
            <label for="username" class="form-label">Tên đăng nhập<sup class="text-danger">*</sup></label>
            <input type="text" name="username" id="username" class="form-control" />
          </div>
          <div class="form-group mb-3">
            <label for="email" class="form-label">Email<sup class="text-danger">*</sup></label>
            <input type="text" name="email" id="email" class="form-control" placeholder="example@gmail.com" />
          </div>
          <div class="row mb-3">
            <div class="form-group col-6">
              <label for="phone" class="form-label">Số điện thoại<sup class="text-danger">*</sup></label>
              <input type="text" name="phone" id="phone" class="form-control" />
            </div>
            <div class="form-group col-6">
              <label for="address" class="form-label">Địa chỉ<sup class="text-danger">*</sup></label>
              <input type="text" name="address" id="address" class="form-control" />
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="password" class="form-label">Mật khẩu<sup class="text-danger">*</sup></label>
            <input type="password" name="password" id="password" class="form-control" />
          </div>
          <div class="form-group mb-3">
            <label for="confirm" class="form-label">Nhập lại mật khẩu<sup class="text-danger">*</sup></label>
            <input type="password" name="confirm" id="confirm" class="form-control" />
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <button type="submit" class="btn btn-primary rounded-0">Đăng ký</button>
            <p class="mb-0">Bạn đã có tài khoản? <a href="index.php">Trở về trang chủ</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="./lib/boostrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/validator.js"></script>
</body>

</html>