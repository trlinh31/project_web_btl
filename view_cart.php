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
    session_start();
    include_once("./includes/header.php");
    include_once("./includes/messenger.php");
    $total = 0;
    ?>
    <div class="container">
      <h1 class="text-uppercase">Giỏ hàng</h1>
      <div class="row">
        <div class="col-md-8">
          <hr />
          <?php
          if (!empty($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $item) :
              $total += $item["price"] * $item["quantity"];
          ?>
              <div class="row align-items-center">
                <div class="col-2 pe-3">
                  <img src="./assets/images/<?= $item["image"] ?>" height="100" alt="" />
                </div>
                <div class="col-4">
                  <div class="line__clamp fw-bold">
                    <?= $item["name"] ?>
                  </div>
                  <p class="m-0"><?= number_format($item["price"], 0, '', '.') ?>đ</p>
                </div>
                <div class="col-2">
                  <form action="./php/update_cart.php" method="get">
                    <input type="hidden" name="action" value="update_qty">
                    <input type="hidden" name="id" value="<?= $item["id"] ?>">
                    <input type="number" class="form-control" min=0 value="<?= $item["quantity"] ?>" name="quantity" style="width: 70px" onchange="this.form.submit()" />
                  </form>
                </div>
                <div class="col-3">
                  <h3><?= number_format($item["price"] * $item["quantity"], 0, '', '.') ?>đ</h3>
                </div>
                <div class="col-1">
                  <a href="./php/update_cart.php?action=delete&id=<?= $item["id"] ?>" class="btn btn-danger btn-sm">
                    <i class="fa-solid fa-trash-can"></i>
                  </a>
                </div>
              </div>
              <hr />
          <?php
            endforeach;
          } ?>
        </div>
        <div class="col-md-4">
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
                <a href="index.php" class="btn btn-outline-primary text-uppercase">
                  Tiếp tục mua hàng
                </a>
                <a href="#" class="btn btn-danger text-uppercase"> Mua hàng </a>
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
</body>

</html>