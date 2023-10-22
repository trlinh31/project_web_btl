<?php
session_start();
if (isset($_GET["id"])) {
  $id = $_GET["id"];
}
if (isset($_GET["quantity"])) {
  $qty = $_GET["quantity"];
}
$action = $_GET["action"];
if ($action == "update_qty") {
  if ($qty == 0) {
    unset($_SESSION["cart"][$id]);
  } else {
    $_SESSION["cart"][$id]["quantity"] = $qty;
  }
} elseif ($action == "delete") {
  unset($_SESSION["cart"][$id]);
}
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
