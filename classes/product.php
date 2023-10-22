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
    $sql = "SELECT products.*, categories.id AS category_id, categories.name AS category_name FROM products INNER JOIN categories ON 
    categories.id = products.category_id WHERE products.id = ?";
    $result = $this->database->getRecord($sql, $id);
    return $result;
  }
  public function getProductNew()
  {
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT ?,?";
    $result = $this->database->getAllWithLimit($sql, 0, 4);
    return $result;
  }
  public function getProductsByCategory($id)
  {
    $sql = "SELECT products.* FROM products INNER JOIN categories ON 
    categories.id = products.category_id WHERE products.category_id = ?";
    $result = $this->database->getAllById($sql, $id);
    return $result;
  }
  public function getProductsByCategoryAndFilter($id, $filter)
  {
    $sql = "SELECT products.* FROM products INNER JOIN categories ON 
    categories.id = products.category_id WHERE products.category_id = ?";
    if (!empty($filter)) {
      $sql .= "  ORDER BY products.price - (products.price * products.discount / 100) " . strtoupper($filter);
    }
    $result = $this->database->getAllById($sql, $id);
    return $result;
  }
  public function getAllComments($product_id)
  {
    $sql = "SELECT * FROM product_comments WHERE product_id = ?";
    $result = $this->database->getAllById($sql, $product_id);
    return $result;
  }
  public function handleSubmitComment($data)
  {
    $result = $this->database->insert("product_comments", $data, "isss");
  }
  public function getProductsByName($keywords)
  {
    $result = $this->database->search($keywords);
    return $result;
  }
  public function getAllCategories()
  {
    $sql = "SELECT * FROM categories";
    $result = $this->database->getAll($sql);
    return $result;
  }
  public function getCategory($id)
  {
    $sql = "SELECT * FROM categories WHERE id = ?";
    $result = $this->database->getRecord($sql, $id);
    return $result;
  }
}
