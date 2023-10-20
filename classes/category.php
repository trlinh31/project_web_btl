<?php
require_once(__DIR__ . "/../config/database.php");
class Category
{
  private $database = null;
  public function __construct()
  {
    $this->database = new Database();
  }
  public function getAllCategories()
  {
    $sql = "SELECT * FROM categories";
    $result = $this->database->getAll($sql);
    return $result;
  }
}
