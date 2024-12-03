<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_management";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra xem có nhận được category_id từ POST không
if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];

    // Truy vấn để lấy tên danh mục trước khi xóa
    $get_category_name_sql = "SELECT category_name FROM categories WHERE category_id = ?";
    $get_stmt = $conn->prepare($get_category_name_sql);

    if ($get_stmt === false) {
        die("Lỗi trong việc chuẩn bị câu truy vấn: " . $conn->error);
    }

    $get_stmt->bind_param("i", $category_id);
    $get_stmt->execute();
    $get_stmt->bind_result($category_name);

    if ($get_stmt->fetch()) {
        // Nếu tìm thấy tên danh mục, tiến hành xóa
        $get_stmt->close();

        // Câu lệnh SQL xóa danh mục
        $delete_sql = "DELETE FROM categories WHERE category_id = ?";
        $stmt = $conn->prepare($delete_sql);

        if ($stmt === false) {
            die("Lỗi trong việc chuẩn bị câu truy vấn: " . $conn->error);
        }

        $stmt->bind_param("i", $category_id);

        if ($stmt->execute()) {
            // Lưu log với tên danh mục
            $userId = $_SESSION['user_id'];
            $action = "Xóa danh mục: " . $category_name;

            $log_sql = "INSERT INTO activity_logs(user_id, action) VALUES (?, ?)";
            $log_stmt = $conn->prepare($log_sql);

            if ($log_stmt === false) {
                die("Lỗi trong việc chuẩn bị câu truy vấn log: " . $conn->error);
            }

            $log_stmt->bind_param("is", $userId, $action);
            $log_stmt->execute();

            echo "<script>alert('Xóa danh mục thành công!'); window.location.href='main.php';</script>";
        } else {
            echo "Lỗi khi xóa danh mục: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Không tìm thấy danh mục với ID: " . $category_id;
    }

} else {
    echo "Không có danh mục để xóa.";
}

// Đóng kết nối
$conn->close();
?>
