<?php
require_once(__DIR__ . "/../config/database.php");
class Comment
{
  private $database = null;
  public function __construct()
  {
    $this->database = new Database();
  }
  public function getAllComments($product_id)
  {
    $sql = "SELECT * FROM product_comments WHERE product_id = ?";
    $result = $this->database->getAllWithId($sql, $product_id);
    return $result;
  }
  public function handleSubmitComment($data)
  {
    $this->database->insert("product_comments", $data, "isss");
  }
}
