<?php
require_once(__DIR__ . "/../classes/user.php");
if (isset($_POST["request"]) && $_POST["request"] == "post_contact") {
  $full_name = $_POST["full_name"];
  $phone = $_POST["phone"];
  $subject = $_POST["subject"];
  $email = $_POST["email"];
  $content = $_POST["content"];
  $userController = new User();
  $userController->handleSubmitContact([
    'full_name' => $full_name,
    'phone' => $phone,
    'email' => $email,
    'subject' => $subject,
    'content' => $content,
  ]);
  header("Location: {$_SERVER['HTTP_REFERER']}");
}
