<?php
require_once __DIR__ . '/../config/database.php';

class CategoryController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function addCategory() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $categoryName = $_POST['categoryName'];

            $userId = $_SESSION['user_id'] ?? null;

            $sql = "INSERT INTO categories(user_id, category_name) VALUES (:user_id, :name)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':name', $categoryName);
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

    public function updateCategory($id, $name) {
        $sql = "UPDATE categories SET category_name = :name WHERE category_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE category_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getListCategories($user_id) {
        $sql = "SELECT * FROM categories WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}