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
    $product_id = $_GET["id"];
    $db = new Database();
    $product = $db->getProductDetail($product_id);
    ?>
    <section class="container">
      <nav aria-label="breadcrumb" class="my-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="category.php?id=<?= $product["category_id"] ?>"><?= $product["category_name"] ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?= $product["name"] ?></li>
        </ol>
      </nav>
      <div class="row mb-3">
        <div class="col-md-6">
          <img src="./assets/images/<?= $product["image"] ?>" class="object-fit-cover" width="80%" height="300" alt="" />
        </div>
        <div class="col-md-6">
          <h1 class="pb-3"><?= $product["name"] ?></h1>
          <div class="d-flex align-items-center justify-content-between pb-3">
            <h5>
              <?= number_format($product["price"] - ($product["price"] * $product["discount"] / 100), 0, '', '.') ?>đ
              <small class="fw-light fs-6 text-decoration-line-through px-2 <?= $product["discount"] == 0 ? 'd-none' : '' ?>" style="opacity: 0.6">
                <?= number_format($product["price"], 0, '', '.') ?>
              </small>
              <span class="badge rounded-0 bg-danger <?= $product["discount"] == 0 ? 'd-none' : '' ?>">-<?= $product["discount"] ?>%</span>
            </h5>
          </div>
          <div class="mb-3">
            <p>Danh mục sản phẩm: <?= $product["category_name"] ?></p>
          </div>
          <div class="mb-3">
            <p>
              <strong>Mô tả:</strong>
              <?= $product["description"] ?>
            </p>
          </div>
          <div class="d-flex column-gap-3">
            <button class="add-to-cart btn btn-primary rounded-0" data-id="<?= $product["id"] ?>" title="Thêm vào giỏ hàng">
              Thêm vào giỏ
            </button>
          </div>
        </div>
      </div>
      <div class="bg-white p-3 rounded-4">
        <h1 class="text-uppercase pb-3">Bình luận</h1>
        <form action="./php/handle_comment.php" method="post" onsubmit="return validateFormComment()">
          <div class="row w-50 mb-3">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Họ và tên" />
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Số điện thoại" />
            </div>
          </div>
          <div class="row w-50 mb-3">
            <div class="form-group col-12">
              <textarea class="form-control" name="customer_comment" id="customer_comment" rows="3" placeholder="Mời bạn bình luận cảm xúc về sản phẩm.."></textarea>
            </div>
          </div>
          <input type="hidden" name="request" value="post_comment">
          <input type="hidden" name="product_id" value="<?= $product_id ?>">
          <button type="submit" class="btn btn-primary rounded-0">Gửi đánh giá</button>
        </form>
        <hr />
        <ul>
          <?php
          $comments = $db->getAllComments($product_id);
          foreach ($comments as $comment) :
          ?>
            <li class="mb-3">
              <h6>
                <i class="fa-regular fa-circle-user pe-1"></i>
                <?= $comment["customer_name"] ?>
              </h6>
              <p class="ps-4" style="opacity: 0.8;">
                <?= $comment["customer_comment"] ?>
              </p>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>
    <?php include_once("./includes/footer.php"); ?>
  </div>
  <script src="./lib/boostrap/js/bootstrap.bundle.min.js"></script>
  <script src="./lib/jquery/jquery-3.7.1.min.js"></script>
  <script src="./assets/js/main.js"></script>
  <script src="./assets/js/validator.js"></script>
</body>

</html>