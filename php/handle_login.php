<?php
session_start();
require_once(__DIR__ . "/../classes/database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $db = new Database();
  $username = $_POST["username"];
  $password = $_POST["password"];
  if ($db->checkLogin($username, $password)) {
    $user = $db->getUserInformation($username, $password);
    $_SESSION["user"]["full_name"] = $user["full_name"];
    $_SESSION["user"]["email"] = $user["email"];
    $_SESSION["user"]["phone"] = $user["phone"];
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {
    $_SESSION["notification"] = "Vui lòng kiểm tra lại tên đăng nhập hoặc mật khẩu";
    header("Location: {$_SERVER['HTTP_REFERER']}");
  }
}
