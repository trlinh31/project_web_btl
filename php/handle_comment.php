<?php
require_once(__DIR__ . "/../classes/product.php");
if (isset($_POST["request"]) && $_POST["request"] == "post_comment") {
  $customer_name = $_POST["customer_name"];
  $customer_phone = $_POST["customer_name"];
  $customer_comment = $_POST["customer_comment"];
  $product_id = $_POST["product_id"];
  $productController = new Product();
  $productController->handleSubmitComment([
    'product_id' => $product_id,
    'customer_name' => $customer_name,
    'customer_phone' => $customer_phone,
    'customer_comment' => $customer_comment
  ]);
  header("Location: {$_SERVER['HTTP_REFERER']}");
}
