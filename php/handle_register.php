<?php
require_once(__DIR__ . "/../classes/user.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userController = new User();
  $full_name = $_POST["full_name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];
  $password = $_POST["password"];
  $confirm = $_POST["confirm"];
  if ($password != $confirm) {
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
  }
  if ($userController->checkUserExist($username, $email)) {
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
  }
  $userController->handleSubmitRegister([
    "full_name" => $full_name,
    "username" => $username,
    "password" => $password,
    "email" => $email,
    "phone" => $phone,
    "address" => $address
  ]);
  header("Location: /web_btl/index.php");
}
