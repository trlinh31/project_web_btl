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
    $keywords = $_GET["search"];
    $db = new Database();
    $products = $db->getProductsByName($keywords);
    ?>
    <section class="mb-5" style="min-height: 50vh;">
      <div class="container">
        <p class="pb-3">Kết quả tìm kiếm: <?= !empty($products) ? count($products) : 0 ?> sản phẩm</p>
        <div class="row row-gap-4">
          <?php
          if (!empty($products)) :
            foreach ($products as $p) :
          ?>
              <div class="col-lg-3">
                <div class="card shadow overflow-hidden">
                  <div class="card-body position-relative">
                    <div class="position-absolute top-0 start-0 <?= $p["discount"] == 0 ? 'd-none' : '' ?>">
                      <span class="badge rounded-0 bg-danger ms-2 mt-2">-<?= $p["discount"] ?>%</span>
                    </div>
                    <img src="./assets/images/<?= $p["image"] ?>" class="card-img-top" height="181" loading="lazy" alt="..." />
                    <p class="card-title">
                      <a href="product_detail.php?id=<?= $p["id"] ?>" class="fw-bold text-decoration-none text-muted">
                        <div class="line__clamp text-center">
                          <small><?= $p["name"] ?></small>
                        </div>
                      </a>
                    </p>
                    <div class="text-center pt-2">
                      <h6 style="height: 40px;">
                        <span class="text-danger"><?= number_format($p["price"] - ($p["price"] * $p["discount"] / 100), 0, '', '.') ?>đ</span>
                        <p class="fw-light text-decoration-line-through <?= $p["discount"] == 0 ? 'd-none' : '' ?>" style="font-size: 12px;opacity: 0.6">
                          <?= number_format($p["price"], 0, '', '.') ?>
                        </p>
                      </h6>
                    </div>
                    <div class="d-grid">
                      <button class="add-to-cart btn btn-primary" data-id="<?= $p["id"] ?>" title="Thêm vào giỏ hàng">
                        Thêm vào giỏ
                      </button>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            endforeach;
          endif; ?>
        </div>
      </div>
    </section>
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