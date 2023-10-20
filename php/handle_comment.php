<?php
require_once(__DIR__ . "/../classes/comment.php");
if (isset($_POST["request"]) && isset($_POST["request"]) == "post_comment") {
  $customer_name = $_POST["customer_name"];
  $customer_phone = $_POST["customer_name"];
  $customer_comment = $_POST["customer_comment"];
  $product_id = $_POST["product_id"];
  $commentController = new Comment();
  $commentController->handleSubmitComment([
    'product_id' => $product_id,
    'customer_name' => $customer_name,
    'customer_phone' => $customer_phone,
    'customer_comment' => $customer_comment
  ]);
  $_SESSION["msg"] = "Ok";
  header("Location: {$_SERVER['HTTP_REFERER']}");
}
