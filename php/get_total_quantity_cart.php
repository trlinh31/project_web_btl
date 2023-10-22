<?php
session_start();
if (isset($_GET["request"]) && $_GET["request"] == "get_total_quantity_cart") {
  if (isset($_SESSION["cart"])) {
    $cart_qty = count($_SESSION["cart"]);
    echo $cart_qty;
  } else {
    echo "0";
  }
}
