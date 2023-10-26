<?php
session_start();
require_once(__DIR__ . "/../classes/database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $customer_name = $_POST["customer_name"];
  $customer_phone = $_POST["customer_name"];
  $customer_comment = $_POST["customer_comment"];
  $product_id = $_POST["product_id"];
  $productController = new Database();
  $productController->handleSubmitComment([
    'product_id' => $product_id,
    'customer_name' => $customer_name,
    'customer_phone' => $customer_phone,
    'customer_comment' => $customer_comment
  ]);
  $_SESSION["notification"] = "Đã gửi bình luận thành công";
  header("Location: {$_SERVER['HTTP_REFERER']}");
}
