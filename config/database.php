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
  }
  public function __destruct()
  {
    if ($this->conn) {
      $this->conn->close();
    }
  }
  public function getAll($sql)
  {
    $data = array();
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }
  public function getRecord($sql, $id)
  {
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }
  public function getAllWithId($sql, $id)
  {
    $data = array();
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
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
}
