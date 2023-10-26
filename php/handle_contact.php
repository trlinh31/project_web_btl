<?php
session_start();
require_once(__DIR__ . "/../classes/database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_SESSION["user"])) {
    $full_name = $_SESSION["user"]["full_name"];
    $phone = $_SESSION["user"]["phone"];
    $email = $_SESSION["user"]["email"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $db = new Database();
    $db->handleSubmitContact([
      'full_name' => $full_name,
      'phone' => $phone,
      'email' => $email,
      'title' => $title,
      'content' => $content,
    ]);
    $_SESSION["notification"] = "Đã gửi thành công ! Chúng tôi sẽ trả lời bạn trong thời gian sớm nhất";
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {
    $_SESSION["notification"] = "Vui lòng đăng nhập";
    header("Location: {$_SERVER['HTTP_REFERER']}");
  }
}
