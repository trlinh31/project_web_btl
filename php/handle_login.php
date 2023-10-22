<?php
session_start();
require_once(__DIR__ . "/../classes/user.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userController = new User();
  $username = $_POST["username"];
  $password = $_POST["password"];
  if ($userController->checkLogin($username, $password)) {
    $user = $userController->getUser($username);
    $_SESSION["user"]["name"] = $user["full_name"];
    header("Location: /web_btl/index.php");
  } else {
    echo "0";
  }
}
