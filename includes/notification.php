<?php
if (isset($_SESSION["notification"])) {
?>
  <div class="container">
    <div class="alert alert-primary alert-dismissible fade show mb-2" role="alert">
      <strong><?= $_SESSION["notification"] ?></strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php
  unset($_SESSION["notification"]);
}
?>