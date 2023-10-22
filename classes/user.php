<?php
require_once(__DIR__ . "/../config/database.php");
class User
{
  private $database = null;
  public function __construct()
  {
    $this->database = new Database();
  }
  public function handleSubmitContact($data)
  {
    $result = $this->database->insert("contacts", $data, "sssss");
  }
  public function checkUserExist($username, $email)
  {
    $sql = "SELECT * FROM users WHERE username = ? AND email = ?";
    $result = $this->database->check($sql, $username, $email);
    if ($result) {
      return true;
    }
    return false;
  }
  public function checkLogin($username, $password)
  {
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $result = $this->database->check($sql, $username, $password);
    if ($result) {
      return true;
    }
    return false;
  }
  public function handleSubmitRegister($data)
  {
    $this->database->insert("users", $data, "ssssss");
  }
  public function getUser($username)
  {
    $sql = "SELECT * FROM users WHERE username = ?";
    $result = $this->database->getRecordByUsername($sql, $username);
    return $result;
  }
}
