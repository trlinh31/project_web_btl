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
    $id = $_GET["id"];
    $db = new Database();
    ?>
    <section class="mb-5">
      <div class="container">
        <div class="row align-items-end mb-3">
          <div class="col-3">
            <form action="" method="get">
              <input type="hidden" name="id" value="<?= $id ?>">
              <select name="filter" class="form-select shadow-none" style="width: max-content;" onchange="this.form.submit()">
                <option value="">Sắp xếp theo</option>
                <option value="asc" <?= isset($_GET["filter"]) && $_GET["filter"] == "asc" ? "selected" : "" ?>>Giá: Từ thấp đến cao</option>
                <option value="desc" <?= isset($_GET["filter"]) && $_GET["filter"] == "desc" ? "selected" : ""  ?>>Giá: Từ cao đến thấp</option>
              </select>
            </form>
          </div>
        </div>
        <div class="row row-gap-4">
          <?php
          $products = isset($_GET["filter"]) ? $db->getProductsByCategoryAndFilter($id, $_GET["filter"]) : $db->getAllProducts($id);
          foreach ($products as $p) :
          ?>
            <div class="col-lg-3">
              <div class="card shadow overflow-hidden">
                <div class="card-body position-relative">
                  <div class="position-absolute top-0 start-0 <?= $p["discount"] == 0 ? 'd-none' : '' ?>">
                    <span class="badge rounded bg-danger ms-2 mt-2">-<?= $p["discount"] ?>%</span>
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
          <?php endforeach; ?>
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