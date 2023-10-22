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
    $productController = new Product();
    $id = $_GET["id"];
    $category = $productController->getCategory($id);
    ?>
    <section class="mb-5" id="products__discounted">
      <div class="container">
        <div class="row align-items-end mb-3">
          <div class="col-9">
            <h1 class="fw-bold text-uppercase m-0"><?= $category["name"] ?></h1>
          </div>
          <div class="col-3">
            <form action="" method="get">
              <input type="hidden" name="id" value="<?= $category["id"] ?>">
              <select name="filter" class="form-select shadow-none" onchange="this.form.submit()">
                <option value="">Sắp xếp theo</option>
                <option value="asc" <?= isset($_GET["filter"]) && $_GET["filter"] == "asc" ? "selected" : "" ?>>Giá: Từ thấp đến cao</option>
                <option value="desc" <?= isset($_GET["filter"]) && $_GET["filter"] == "desc" ? "selected" : ""  ?>>Giá: Từ cao đến thấp</option>
              </select>
            </form>
          </div>
        </div>
        <div class="row row-gap-4">
          <?php
          $products = isset($_GET["filter"]) ? $productController->getProductsByCategoryAndFilter($id, $_GET["filter"]) : $productController->getProductsByCategory($id);
          foreach ($products as $item) :
          ?>
            <div class="col-lg-3">
              <div class="card overflow-hidden">
                <div class="card-body position-relative">
                  <img src="./assets/images/<?= $item["image"] ?>" class="card-img-top" height="181" loading="lazy" alt="..." />
                  <h5 class="card-title">
                    <a href="product_detail.php?id=<?= $item["id"] ?>" class="text-decoration-none text-muted">
                      <div class="line__clamp">
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
                  <button class="add-to-cart btn btn-primary" data-id="<?= $item["id"] ?>" title="Thêm vào giỏ hàng">
                    <i class="fa-solid fa-cart-shopping"></i>
                  </button>
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
</body>

</html>