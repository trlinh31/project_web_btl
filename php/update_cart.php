<?php
session_start();
if (isset($_GET["action"])) {
  $action = $_GET["action"];
  if ($action == "delete_all") {
    unset($_SESSION["cart"]);
  } elseif ($action == "delete") {
    $id = $_GET["id"];
    unset($_SESSION["cart"][$id]);
  } elseif ($action == "update_qty") {
    $id = $_GET["id"];
    $qty = $_GET["quantity"];
    if ($qty == 0) {
      unset($_SESSION["cart"][$id]);
    } else {
      $_SESSION['cart'][$id]['quantity'] =  $qty;
    }
  }
  header("Location: {$_SERVER['HTTP_REFERER']}");
}
