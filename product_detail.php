<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/fonts/css/all.min.css" />
  <link rel="stylesheet" href="./lib/boostrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/css/app.css" />
  <title>Nhóm 4 | Bán hàng nội thất</title>
</head>

<body>
  <div id="root">
    <?php
    session_start();
    include_once("./includes/header.php");
    include_once("./includes/messenger.php");
    require_once("./classes/product.php");
    $product_id = $_GET["id"];
    $productController = new Product();
    $product = $productController->getDetailProduct($product_id);
    if (isset($_SESSION["msg"])) {
      echo '
      <script>
        toastBootstrap.show()
      </script>';
    }
    ?>

    <div class="toast-container position-fixed top-0 end-0 p-3">
      <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <img src="..." class="rounded me-2" alt="...">
          <strong class="me-auto">Bootstrap</strong>
          <small>11 mins ago</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Hello, world! This is a toast message.
        </div>
      </div>
    </div>
    <section class="container">
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="#"><?= $product["category_name"] ?></a></li>
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
              <small class="fw-light fs-6 text-decoration-line-through px-2" style="opacity: 0.6">
                <?= number_format($product["price"], 0, '', '.') ?>
              </small>
              <span class="badge bg-danger">-<?= $product["discount"] ?>%</span>
            </h5>
          </div>
          <p>Danh mục sản phẩm: Sofa</p>
          <p>
            <strong>Mô tả:</strong>
            <?= $product["description"] ?>
          </p>
          <div class="d-flex column-gap-3">
            <form action="#" method="post">
              <input type="hidden" name="product__id" />
              <button type="submit" class="btn btn-primary text-uppercase rounded-0">
                Mua ngay
              </button>
            </form>
            <form action="#" method="post">
              <input type="hidden" name="product__id" />
              <button type="submit" class="btn btn-outline-primary text-uppercase rounded-0">
                Thêm vào giỏ hàng
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="bg-white p-3 rounded-4">
        <h1 class="text-uppercase pb-3">Bình luận</h1>
        <form action="./php/handle_comment.php" method="post">
          <div class="row w-50 mb-3">
            <div class="col-md-6">
              <input type="text" class="form-control" name="customer_name" placeholder="Họ và tên" required />
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="customer_phone" placeholder="Số điện thoại" />
            </div>
          </div>
          <div class="row w-50 mb-3">
            <div class="col-12">
              <textarea class="form-control" name="customer_comment" rows="3" placeholder="Mời bạn bình luận cảm xúc về sản phẩm.." required></textarea>
            </div>
          </div>
          <input type="hidden" name="request" value="post_comment">
          <input type="hidden" name="product_id" value="<?= $product_id ?>">
          <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
        </form>
        <hr />
        <ul>
          <?php
          require_once("./classes/comment.php");
          $commentController = new Comment();
          $comments = $commentController->getAllComments($product_id);
          foreach ($comments as $comment) :
          ?>
            <li>
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
    <footer class="text-center bg-white text-lg-start text-muted mt-5">
      <div class="container text-center text-md-start pt-3">
        <div class="row mt-3">
          <div class="col-3 mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Nhóm 4</h6>
            <p>Đề tài: <strong>Xây dựng Website bán nội thất</strong></p>
          </div>
          <div class="col-4 mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Danh sách thành viên - Ngày sinh</h6>
            <p>Nguyễn Trần Ngọc Linh - 31/01/2002</p>
            <p>Bùi Đức Lương - 21/06/2002</p>
            <p>Lê Thành Long - 14/11/2002</p>
          </div>
          <div class="col-5 mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Nhiệm vụ</h6>
            <p>
              Đảm nhiệm vị trí <strong>Frontend</strong> và <strong>Backend</strong> ở phía người
              dùng
            </p>
            <p>Đảm nhiệm vị trí <strong>Frontend</strong> ở phía Admin và viết báo cáo</p>
            <p>
              Đảm nhiệm vị trí <strong>Backend</strong> ở phía Admin và thiết kế cơ sở dữ liệu
            </p>
          </div>
        </div>
      </div>
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05)">
        © 2023 Copyright:
        <strong>Linh Tran</strong>
      </div>
    </footer>
  </div>
  <script src="./lib/boostrap/js/bootstrap.bundle.min.js"></script>
  <script>
    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
  </script>
</body>

</html>