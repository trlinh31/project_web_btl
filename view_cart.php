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
    $total = 0;
    ?>
    <div class="container">
      <h1 class="text-uppercase pb-4">Giỏ hàng</h1>
      <div class="row">
        <div class="col-8">
          <table class="table">
            <caption>Số sản phẩm: <?= isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : "0" ?></caption>
            <thead>
              <tr>
                <td>STT</td>
                <td>Ảnh sản phẩm</td>
                <td>Tên sản phẩm</td>
                <td>Số lượng</td>
                <td>Thành tiền</td>
                <td>Xoá sản phẩm</td>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_SESSION["cart"])) :
                $i = 1;
                foreach ($_SESSION["cart"] as $p) :
                  $total += $p["price"] * $p["quantity"];
              ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td>
                      <img src="./assets/images/<?= $p["image"] ?>" class="object-fit-cover" width="100px" height="100" alt="">
                    </td>
                    <td>
                      <div class="line__clamp" style="max-width: 158px;">
                        <?= $p["name"] ?>
                      </div>
                    </td>
                    <td>
                      <form action="./php/update_cart.php" method="get">
                        <input type="hidden" name="action" value="update_qty">
                        <input type="hidden" name="id" value="<?= $p["id"] ?>">
                        <input type="number" name="quantity" value="<?= $p["quantity"] ?>" class="form-control shadow-none" style="width: 55px;" onchange="this.form.submit()">
                      </form>
                    </td>
                    <td>
                      <p style="width: 100px;"><?= number_format($p["price"] * $p["quantity"], 0, '', '.') ?>đ</p>
                    </td>
                    <td>
                      <a href="./php/update_cart.php?action=delete&id=<?= $p["id"] ?>" class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                      </a>
                    </td>
                  </tr>
              <?php $i++;
                endforeach;
              endif; ?>
            </tbody>
          </table>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body p-4">
              <h5 class="card-title text-uppercase pb-3">Đơn hàng</h5>
              <div class="card">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>Thành tiền:</span>
                    <strong><?= number_format($total, 0, '', '.') ?>đ</strong>
                  </li>
                  <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>Phí giao hàng:</span>
                    <strong>0đ</strong>
                  </li>
                  <li class="list-group-item d-flex align-items-center justify-content-between">
                    <strong>Tổng cộng:</strong>
                    <strong><?= number_format($total, 0, '', '.') ?>đ</strong>
                  </li>
                </ul>
              </div>
              <div class="d-flex align-items-center justify-content-between mt-4">
                <a href="index.php" class="btn btn-danger text-uppercase">Tiếp tục mua hàng</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    include_once("./includes/footer.php");
    ?>
  </div>
  <script src="./lib/boostrap/js/bootstrap.bundle.min.js"></script>
  <script src="./lib/jquery/jquery-3.7.1.min.js"></script>
  <script src="./assets/js/main.js"></script>
  <script src="./assets/js/validator.js"></script>
</body>

</html>