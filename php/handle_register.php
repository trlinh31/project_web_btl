<?php
session_start();
require_once(__DIR__ . "/../classes/database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $db = new Database();
  $full_name = $_POST["full_name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];
  $password = $_POST["password"];
  $passwordHash = password_hash($password, PASSWORD_DEFAULT);
  $confirm = $_POST["confirm"];
  if ($db->checkUserExist($username, $email)) {
    $_SESSION["notification"] = "Tên tài khoản hoặc email đã tồn tại";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
  } else {
    $db->insertUser([
      "full_name" => $full_name,
      "username" => $username,
      "password" => $passwordHash,
      "email" => $email,
      "phone" => $phone,
      "address" => $address
    ]);
    $_SESSION["user"]["full_name"] = $full_name;
    $_SESSION["user"]["email"] = $email;
    $_SESSION["user"]["phone"] = $phone;
    header("Location: ../index.php");
    exit();
  }
}
