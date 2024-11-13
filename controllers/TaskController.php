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

      if(!$user_id) {
        echo '<script>alert("Phiên đăng nhập đã hết hạn!");</script>';
        echo '<script>history.back();</script>';
        exit();
      }

      try {
        // 1. Thêm task vào bảng tasks
        $query = "INSERT INTO tasks (user_id, title, description, priority, due_date) VALUES (:user_id, :title, :description, :priority, :due_date)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':priority', $priority);
        $stmt->bindParam(':due_date', $due_date);
        $stmt->execute();

        // Lấy task_id sau khi thực thi câu lệnh vừa thêm
        $task_id = $this->conn->lastInsertId();

        // 2. Thêm task có đề cập category vào bảng task_in_category
        $query = "INSERT INTO task_categories VALUES (:task_id, :category_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':task_id', $task_id);
        $stmt->bindParam(':category_id', $category);
        $stmt->execute();

        // 3. Xử lý file đính kèm
        if(!empty($_FILES['attachment']["name"])) {
          $targetDir = "uploads/";
          $fileName = basename($_FILES['attachment']["name"]);
          $targetFilePath = $targetDir . $fileName;

          // Di chuyển file upload vào
          if(move_uploaded_file($_FILES['attachment']["tmp_name"], $targetFilePath)) {
            // thêm file đính kèm vào bảng attachments
            $query = "INSERT INTO attachments(task_id, file_path) VALUES (:task_id, :file_path)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':task_id', $task_id);
            $stmt->bindParam(':file_path', $targetFilePath);
            $stmt->execute();
          } else {
            echo "<script>alert('Lỗi khi tải file đính kèm.';</script>";
            exit();
          }
        }
        
        echo '<script>
          alert("Thêm công việc thành công!");
          windows.location.href = "main.php";
        </script>';

      } catch (PDOException $e) {
          echo "<script>alert('Lỗi: ". $e->getMessage(). "'); history.back();</script>";
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