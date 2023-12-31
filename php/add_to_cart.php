<?php
session_start();
require_once(__DIR__ . "/../classes/database.php");
$db = new Database();
$id = $_POST["id"];
$product_detail = $db->getProductDetail($id);
if (!isset($_SESSION["cart"][$id])) {
  $_SESSION["cart"][$id]["id"] = $product_detail["id"];
  $_SESSION["cart"][$id]["name"] = $product_detail["name"];
  $_SESSION["cart"][$id]["quantity"] = 1;
  $_SESSION["cart"][$id]["price"] = $product_detail["price"] - ($product_detail["price"] * $product_detail["discount"] / 100);
  $_SESSION["cart"][$id]["image"] = $product_detail["image"];
  echo "Đã thêm sản phẩm vào giỏ hàng thành công !";
} else {
  $_SESSION["cart"][$id]["quantity"] += 1;
  echo "Sản phẩm đã có trong giỏ hàng !";
}
