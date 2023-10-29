<?php
session_start();
require_once(__DIR__ . "/../classes/database.php");
if (isset($_SESSION["user"])) {
  $total = 0;
  foreach ($_SESSION["cart"] as $item) {
    $total += $item["price"] * $item["quantity"];
  }
  $user_id = $_SESSION["user"]["id"];
  $db = new Database();
  $db->insertOrderDetail([
    "user_id" => $user_id,
    "total" => $total
  ]);
  $order_id = $db->selectMaxOrderId($user_id);
  foreach ($_SESSION["cart"] as $key => $item) {
    $quantity = $item["quantity"];
    $db->insertOrderProduct([
      "order_id" => $order_id,
      "product_id" => $key,
      "quantity" => $quantity
    ]);
  }
  unset($_SESSION["cart"]);
  $_SESSION["notification"] = "Đã đặt đơn hàng thành công";
  header("Location: ../view_order.php");
} else {
  $_SESSION["notification"] = "Vui lòng đăng nhập để hoàn tất đơn hàng";
  header("Location: ../index.php");
}
