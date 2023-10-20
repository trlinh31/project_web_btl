<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/fonts/css/all.min.css" />
  <link rel="stylesheet" href="./lib/aos/css/aos.css" />
  <link rel="stylesheet" href="./lib/boostrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/css/app.css" />
  <title>Nhóm 4 | Bán hàng nội thất</title>
</head>

<body>
  <div id="root">
    <?php
    include_once("./includes/header.php");
    include_once("./includes/slider.php");
    include_once("./includes/messenger.php");
    ?>
    <section class="mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4 position-relative">
            <img src="./assets/images/sofa_banner.jpg" class="object-fit-cover h-100 rounded-5 shadow" width="100%" loading="lazy" alt="" />
            <div class="position-absolute top-50 start-50 translate-middle">
              <h1 class="text-white">SOFA</h1>
            </div>
          </div>
          <div class="col-md-4 position-relative">
            <img src="./assets/images/ban_an_banner.jpg" class="object-fit-cover h-100 rounded-5 shadow" width="100%" loading="lazy" alt="" />
            <div class="position-absolute top-50 start-50 translate-middle">
              <h1 class="text-white">Bàn Ăn</h1>
            </div>
          </div>
          <div class="col-md-4 position-relative">
            <img src="./assets/images/giuong_banner.jpg" class="object-fit-cover h-100 rounded-5 shadow" width="100%" loading="lazy" alt="" />
            <div class="position-absolute top-50 start-50 translate-middle">
              <h1 class="text-white">Giường</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="mb-5" id="products__discounted">
      <div class="container">
        <h1 class="fw-bold text-uppercase pb-2">Sản phẩm giảm giá</h1>
        <div class="row row-gap-4">
          <?php
          require_once("./classes/product.php");
          $productController = new Product();
          $products = $productController->getDiscountedProducts();
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
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <section class="hero__wrapper">
      <div class="hero__block">
        <div class="hero-block__item shadow-lg" data-aos="fade-up">
          <i class="fa-solid fa-magnifying-glass text-primary"></i>
          <p>Tìm sản phẩm</p>
        </div>
        <span>
          <i class="fa-solid fa-arrow-right"></i>
        </span>
        <div class="hero-block__item shadow-lg" data-aos="fade-up" data-aos-delay="100">
          <i class="fa-regular fa-rectangle-list text-danger"></i>
          <p>Chọn sản phẩm</p>
        </div>
        <span>
          <i class="fa-solid fa-arrow-right"></i>
        </span>
        <div class="hero-block__item shadow-lg" data-aos="fade-up" data-aos-delay="200">
          <i class="fa-solid fa-cart-plus text-success"></i>
          <p>Thêm vào giỏ hàng</p>
        </div>
        <span>
          <i class="fa-solid fa-arrow-right"></i>
        </span>
        <div class="hero-block__item shadow-lg" data-aos="fade-up" data-aos-delay="300">
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
</body>

</html>