<?php
require_once __DIR__ . '/../config/database.php';

class TaskController{
  private $conn;

  public function __construct() {
    $database = new Database();
    $this->conn = $database->getConnection();
  }

  public function addTask() {
    if($_SERVER["REQUEST_METHOD"] == "POST") {

      $user_id = $_SESSION['user_id'] ?? null;
      
      $title = $_POST['title']; // tiêu đề
      $description = $_POST['description']; // mô tả
      $category = '1'; // danh mục ??
      $priority = $_POST['priority']; // mức độ ưu tiên
      $due_date = $_POST['due_date']; // ngày đáo hạn
      $attachments = null;

      $query = "INSERT INTO tasks (user_id, title, description, priority, due_date) VALUES (:user_id, :title, :description, :priority, :due_date)";

      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':user_id', $user_id);
      $stmt->bindParam(':title', $title);
      $stmt->bindParam(':description', $description);
      $stmt->bindParam(':priority', $priority);
      $stmt->bindParam(':due_date', $due_date);
      $isSuccess = $stmt->execute();

      if(!$isSuccess) {
        echo '<script>alert("Thêm danh mục không thành công do lỗi!");</script>';
        echo '<script>history.back();</script>';
        exit();
      }
      echo '<script>
          alert("Thêm danh mục thành công!");
          window.location.href = "main.php";
        </script>';
    }
    else {
      echo '<script>alert("Thêm danh mục không thành công do lỗi!")</script>';
      echo '<script>history.back();</script>';
      exit();
    }
  }

  public function updateTask($task_id, $title, $description, $priority, $due_date) {
    $query = "UPDATE tasks 
              SET title = :title, description = :description, priority = :priority, due_date = :due_date
              WHERE task_id = :task_id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':task_id', $task_id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':priority', $priority);
    $stmt->bindParam(':due_date', $due_date);
    return $stmt->execute();
  }

  public function deleteTask($task_id) {
    $query = "DELETE from tasks WHERE task_id = :task_id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':task_id', $task_id);
    return $stmt->execute();
  }

  public function getUserTasks($user_id) {
    $query = "SELECT * FROM tasks WHERE user_id = :user_id ORDER BY due_date ASC";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function index(){
    require_once __DIR__ . '/../main.php';
  }
}