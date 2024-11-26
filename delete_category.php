<?php
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

    // Câu lệnh SQL xóa danh mục
    $sql = "DELETE FROM categories WHERE category_id = ?";

    // Sử dụng prepared statement để tránh SQL injection
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Lỗi trong việc chuẩn bị câu truy vấn: " . $conn->error);
    }

    // Gắn giá trị vào câu lệnh SQL
    $stmt->bind_param("i", $category_id);

    // Thực thi câu lệnh
    if ($stmt->execute()) {
        echo "<script>alert('Xóa danh mục thành công!'); window.location.href='main.php';</script>";
    } else {
        echo "Lỗi khi xóa danh mục: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Không có category_id để xóa.";
}

// Đóng kết nối
$conn->close();
?>
