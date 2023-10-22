<header class="py-3">
  <div class="container pb-3">
    <div class="row w-100 align-items-center gx-0">
      <div class="col-lg-3">
        <a href="index.php" class="navbar-brand">Interior<span>.</span></a>
      </div>
      <div class="col-lg-6 d-none d-lg-block">
        <form action="search.php" method="get">
          <div class="input-group">
            <input type="search" class="form-control border-0" name="search" placeholder="Nhập tên sản phẩm cần tìm..." autocomplete="off" required />
            <div class="input-group-text bg-primary">
              <button type="submit" class="btn btn-primary bg-primary border-0">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-3 text-end d-none d-lg-block">
        <div class="list-inline mt-3">
          <?php
          session_start();
          if (isset($_SESSION["user"])) {
          ?>
            <a href="./php/handle_logout.php" class="list-inline-item fs-6" title="Đăng xuất"><?= $_SESSION["user"]["name"] ?></a>
          <?php } else { ?>
            <a href="#" class="list-inline-item" data-bs-toggle="modal" data-bs-target="#userModal">
              <i class="fa-solid fa-user"></i>
            </a>
          <?php } ?>
          <a href="view_cart.php" class="list-inline-item position-relative">
            <i class="fa-solid fa-bag-shopping"></i>
            <span class="cart__qty position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-light">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item me-4">
            <a class="nav-link px-0" href="index.php">Trang chủ</a>
          </li>
          <li class="nav-item me-4 dropdown">
            <a class="nav-link px-0 dropdown-toggle" href="#" aria-expanded="false">
              Danh mục sản phẩm
            </a>
            <ul class="dropdown-menu shadow">
              <?php
              require_once("./classes/product.php");
              $productController = new Product();
              $categories = $productController->getAllCategories();
              foreach ($categories as $item) :
              ?>
                <li><a class="dropdown-item" href="category.php?id=<?= $item["id"] ?>"><?= $item["name"] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link px-0" href="contact.php">Liên hệ</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="userModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Đăng Nhập</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="./php/handle_login.php" onsubmit="return validateFormLogin();" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Tên đăng nhập:</label>
              <input type="text" name="username" id="username" class="form-control rounded" />
              <span class="username__message text-danger"></span>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Mật khẩu:</label>
              <input type="password" name="password" id="password" class="form-control rounded" />
              <span class="password__message text-danger"></span>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="show_pass" onclick="showPassword()">
                <label class="form-check-label" for="show_pass">
                  Hiển thị mật khẩu
                </label>
              </div>
              <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-center">
          <p>Bạn chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
        </div>
      </div>
    </div>
  </div>
</header>