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
    require_once("./classes/database.php");
    $db = new Database();
    ?>
    <div class="container mt-3" style="min-height: 350px;">
      <h3 class="text-uppercase text-center pb-5">Chi tiết đơn hàng</h3>
      <?php
      if (isset($_SESSION["user"])) :
      ?>
        <table class="table">
          <thead>
            <tr>
              <td>Ảnh sản phẩm</td>
              <td>Tên sản phẩm</td>
              <td>Số lượng</td>
              <td>Thành tiền</td>
            </tr>
          </thead>
          <tbody>
            <?php
            $order_detail = $db->viewOrderDetail($_SESSION["user"]["id"]);
            $total = 0;
            foreach ($order_detail as $p) :
              $total += ($p["price"] - ($p["price"] * $p["discount"] / 100)) * $p["quantity"];
            ?>
              <tr>
                <td><img src="./assets/images/<?= $p["image"] ?>" class="object-fit-cover" width="150" height="100" alt=""></td>
                <td>
                  <?= $p["name"] ?>
                </td>
                <td>
                  <input type="number" value="<?= $p["quantity"] ?>" class="form-control shadow-none" style="width: 60px;" readonly>
                </td>
                <td>
                  <?= number_format(($p["price"] - ($p["price"] * $p["discount"] / 100)) * $p["quantity"], 0, '', '.') ?>đ
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <h5 class="pt-3">Tổng tiền đơn hàng: <?= number_format($total, 0, '', '.') ?>đ</h5>
      <?php
      endif; ?>
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