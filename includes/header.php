<header class="py-3">
  <div class="container pb-3">
    <div class="row w-100 align-items-center gx-0">
      <div class="col-lg-3">
        <a href="index.php" class="navbar-brand">Interior<span>.</span></a>
      </div>
      <div class="col-lg-6 d-none d-lg-block">
        <form action="#" method="get">
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
          <a href="#" class="list-inline-item pe-2" data-bs-toggle="modal" data-bs-target="#userModal">
            <i class="fa-solid fa-user"></i>
          </a>
          <a href="view_cart.html" class="list-inline-item position-relative">
            <i class="fa-solid fa-bag-shopping"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
              0
            </span>
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
              require_once("./classes/category.php");
              $categoryController = new Category();
              $categories = $categoryController->getAllCategories();
              foreach ($categories as $item) :
              ?>
                <li><a class="dropdown-item" href="#"><?= $item["name"] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link px-0" href="#products__discounted">Sản phẩm giảm giá</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link px-0" href="contact.html">Liên hệ</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Đăng Nhập</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="#" method="post">
            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" name="email" id="email" class="form-control rounded" placeholder="example@gmail.com" required />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Mật khẩu:</label>
              <input type="password" name="password" id="password" class="form-control rounded" required />
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
          </form>
        </div>
        <div class="modal-footer justify-content-center">
          <p>Bạn chưa có tài khoản? <a href="register.html">Đăng ký</a></p>
        </div>
      </div>
    </div>
  </div>
</header>