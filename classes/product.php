<?php
require_once(__DIR__ . "/../config/database.php");
class Product
{
  private $database = null;
  public function __construct()
  {
    $this->database = new Database();
  }
  public function getAllProducts()
  {
    $sql = "SELECT * FROM products";
    $result = $this->database->getAll($sql);
    return $result;
  }
  public function getDiscountedProducts()
  {
    $sql = "SELECT * FROM products WHERE discount > 0";
    $result = $this->database->getAll($sql);
    return $result;
  }
  public function getDetailProduct($id)
  {
    $sql = "SELECT products.*, categories.name AS category_name FROM products INNER JOIN categories ON 
    categories.id = products.category_id WHERE products.id = ?";
    $result = $this->database->getRecord($sql, $id);
    return $result;
  }
}
