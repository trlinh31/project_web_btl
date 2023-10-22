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
    require_once("./classes/product.php");
    $keywords = $_GET["search"];
    $productController = new Product();
    $products = $productController->getProductsByName($keywords);
    ?>
    <section class="mb-5" id="products__discounted">
      <div class="container">
        <h6 class="fw-bold text-uppercase pb-2">Đã tìm thấy: <?= !empty($products) ? count($products) : 0 ?> sản phẩm</h6>
        <div class="row row-gap-4">
          <?php
          if (!empty($products)) :
            foreach ($products as $item) :
          ?>
              <div class="col-lg-3">
                <div class="card overflow-hidden">
                  <div class="card-body position-relative">
                    <img src="./assets/images/<?= $item["image"] ?>" class="card-img-top" loading="lazy" alt="..." />
                    <h5 class="card-title">
                      <a href="product_detail.php?id=<?= $item["id"] ?>" class="text-decoration-none text-muted">
                        <div class="pro__name">
                          <small><?= $item["name"] ?></small>
                        </div>
                      </a>
                    </h5>
                    <div class="position-absolute top-0 start-0 <?= $item["discount"] == 0 ? 'd-none' : '' ?>">
                      <span class="badge rounded bg-danger ms-2 mt-2">-<?= $item["discount"] ?>%</span>
                    </div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <h6 class="m-0">
                      <?= number_format($item["price"] - ($item["price"] * $item["discount"] / 100), 0, '', '.') ?>đ
                      <small class="fw-light text-decoration-line-through <?= $item["discount"] == 0 ? 'd-none' : '' ?>" style="font-size: 12px;opacity: 0.6">
                        <?= number_format($item["price"], 0, '', '.') ?>
                      </small>
                    </h6>
                    <a href="#" class="btn btn-primary" title="Thêm vào giỏ hàng">
                      <i class="fa-solid fa-cart-shopping"></i>
                    </a>
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
</body>

</html>