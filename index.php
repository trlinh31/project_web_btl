<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/fonts/css/all.min.css" />
  <link rel="stylesheet" href="./lib/aos/css/aos.css" />
  <link rel="stylesheet" href="./lib/boostrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/css/app.css" />
  <title>Nhóm 2 | Bán hàng nội thất</title>
</head>

<body>
  <div id="root">
    <?php
    include_once("./includes/header.php");
    include_once("./includes/notification.php");
    include_once("./includes/banner.php");
    include_once("./includes/messenger.php");
    ?>
    <section class="py-5 mb-5 bg-body-tertiary">
      <div class="container">
        <div class="row">
          <div class="small__banner col-4 position-relative">
            <img src="./assets/images/sofa_banner.jpg" class="position-relative object-fit-cover h-100" width="100%" loading="lazy" alt="" />
            <div class="position-absolute top-0 end-0 me-4 mt-4">
              <h1 class="text-white">SOFA</h1>
            </div>
          </div>
          <div class="small__banner col-4 position-relative">
            <img src="./assets/images/ghe_an_banner.jpg" class="position-relative object-fit-cover h-100" width="100%" loading="lazy" alt="" />
            <div class="position-absolute top-0 end-0 me-4 mt-4">
              <h1 class="text-white">Ghế Ăn</h1>
            </div>
          </div>
          <div class="small__banner col-4 position-relative">
            <img src="./assets/images/giuong_banner.jpg" class="position-relative object-fit-cover h-100" width="100%" loading="lazy" alt="" />
            <div class="position-absolute top-0 end-0 me-4 mt-4">
              <h1 class="text-white">Giường</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="mb-5">
      <div class="container">
        <h1 class="fw-bold text-uppercase pb-3">Sản phẩm mới</h1>
        <div class="row row-gap-4">
          <?php
          require_once("./classes/database.php");
          $db = new Database();
          $products = $db->getNewProducts();
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
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <section class="mb-5">
      <div class="container">
        <h1 class="fw-bold text-uppercase pb-3">Sản phẩm giảm giá</h1>
        <div class="row row-gap-4">
          <?php
          $products = $db->getDiscountedProduct();
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
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <section class="section__wrapper">
      <div class="section__block">
        <div class="section-block__item shadow-lg" data-aos="fade-up">
          <i class="fa-solid fa-magnifying-glass text-primary"></i>
          <p>Tìm sản phẩm</p>
        </div>
        <span>
          <i class="fa-solid fa-arrow-right"></i>
        </span>
        <div class="section-block__item shadow-lg" data-aos="fade-up" data-aos-delay="100">
          <i class="fa-regular fa-rectangle-list text-danger"></i>
          <p>Chọn sản phẩm</p>
        </div>
        <span>
          <i class="fa-solid fa-arrow-right"></i>
        </span>
        <div class="section-block__item shadow-lg" data-aos="fade-up" data-aos-delay="200">
          <i class="fa-solid fa-cart-plus text-success"></i>
          <p>Thêm vào giỏ hàng</p>
        </div>
        <span>
          <i class="fa-solid fa-arrow-right"></i>
        </span>
        <div class="section-block__item shadow-lg" data-aos="fade-up" data-aos-delay="300">
          <i class="fa-regular fa-money-bill-1 text-warning"></i>
          <p>Thanh toán khi nhận hàng</p>
        </div>
      </div>
    </section>
    <?php
    include_once("./includes/footer.php");
    ?>
  </div>
  <script src="./lib/boostrap/js/bootstrap.bundle.min.js"></script>
  <script src="./lib/aos/js/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="./lib/jquery/jquery-3.7.1.min.js"></script>
  <script src="./assets/js/main.js"></script>
  <script src="./assets/js/validator.js"></script>
</body>

</html>