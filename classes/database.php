<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "noi_that");
class Database
{
  private $conn = null;
  public function __construct()
  {
    $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($this->conn->connect_error) {
      die("Kết nối cơ sở dữ liệu thất bại");
    }
    $this->conn->set_charset("utf8");
  }
  public function __destruct()
  {
    if ($this->conn) {
      $this->conn->close();
    }
  }
  public function insert($table, $data = [], $types)
  {
    $table_col_values = implode(',', array_keys($data));
    $question_mark = implode(',', array_fill(0, count($data), '?'));
    $values = array_values($data);
    $sql = "INSERT INTO $table($table_col_values) VALUES ($question_mark)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
  }
  public function getAllProducts($id)
  {
    $data = array();
    $sql = "SELECT * FROM products";
    if (!empty($id)) {
      $sql .= " WHERE category_id = ?";
    }
    $stmt = $this->conn->prepare($sql);
    if (!empty($id)) {
      $stmt->bind_param("i", $id);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }
  public function getProductDetail($id)
  {
    $sql = "SELECT products.*, categories.id AS category_id, categories.name AS category_name FROM products 
    INNER JOIN categories 
    ON categories.id = products.category_id WHERE products.id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }
  public function getNewProducts()
  {
    $data = array();
    $offset = 0;
    $limit = 4;
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT ?,?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }
  public function getDiscountedProduct()
  {
    $data = array();
    $sql = "SELECT * FROM products WHERE discount > 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }
  public function getAllCategories()
  {
    $data = array();
    $sql = "SELECT * FROM categories";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }
  public function getAllComments($id)
  {
    $data = array();
    $sql = "SELECT * FROM product_comments WHERE product_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }
  public function getProductsByCategoryAndFilter($id, $filter)
  {
    $data = array();
    $sql = "SELECT products.* FROM products INNER JOIN categories ON 
    categories.id = products.category_id WHERE products.category_id = ?";
    if (!empty($filter)) {
      $sql .= "  ORDER BY products.price - (products.price * products.discount / 100) " . strtoupper($filter);
    }
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }
  public function getProductsByName($keywords)
  {
    $data = array();
    $sql = "SELECT * FROM products WHERE name LIKE '%" . $keywords . "%'";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    if ($result->num_rows > 0) {
      return $data;
    }
    return 0;
  }
  public function handleSubmitContact($data)
  {
    $this->insert("contacts", $data, "sssss");
  }

  public function checkLogin($username)
  {
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      return true;
    }
    return false;
  }
  public function checkUserExist($username, $email)
  {
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      return true;
    }
    return false;
  }
  public function insertUser($data)
  {
    $this->insert("users", $data, "ssssss");
  }
  public function getUserInformation($username)
  {
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }
  public function handleSubmitComment($data)
  {
    $this->insert("product_comments", $data, "isss");
  }
  public function insertOrderDetail($data)
  {
    $this->insert("orders_detail", $data, "ii");
  }
  public function selectMaxOrderId($id)
  {
    $sql = "SELECT max(id) FROM orders_detail WHERE user_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc()["max(id)"];
  }
  public function insertOrderProduct($data)
  {
    $this->insert("order_product", $data, "iii");
  }
  public function viewOrderDetail($id)
  {
    $data = array();
    $sql = "SELECT * FROM `order_product` 
    INNER JOIN orders_detail ON orders_detail.id = order_product.order_id 
    INNER JOIN products ON products.id = order_product.product_id 
    WHERE orders_detail.user_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }
}
