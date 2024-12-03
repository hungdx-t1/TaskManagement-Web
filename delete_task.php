<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Kết nối tới cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['id'])) {
    $taskId = $_POST['id'];

    $get_task_title_sql = "SELECT title FROM tasks WHERE task_id = ?";
    $get_stmt = $conn->prepare($get_task_title_sql);

    if ($get_stmt === false) {
        die("Lỗi trong việc chuẩn bị câu truy vấn: " . $conn->error);
    }

    $get_stmt->bind_param("i", $taskId);
    $get_stmt->execute();
    $get_stmt->bind_result($title);

    if($get_stmt->fetch()) {
        $get_stmt->close();

        $delete_sql = "DELETE FROM tasks WHERE task_id = ?";
        $stmt = $conn->prepare($delete_sql);
        if ($stmt === false) {
            die("Lỗi trong việc chuẩn bị câu truy vấn: " . $conn->error);
        }

        $stmt->bind_param("i", $taskId);

        if ($stmt->execute()) {
            // Lưu log với tên danh mục
            $userId = $_SESSION['user_id'];
            $action = "Xóa công việc: " . $title;

            $log_sql = "INSERT INTO activity_logs(user_id, action) VALUES (?, ?)";
            $log_stmt = $conn->prepare($log_sql);

            if ($log_stmt === false) {
                die("Lỗi trong việc chuẩn bị câu truy vấn log: " . $conn->error);
            }

            $log_stmt->bind_param("is", $userId, $action);
            $log_stmt->execute();

            echo "<script>alert('Xóa công việc thành công!'); window.location.href='main.php';</script>";
        } else {
            echo "Lỗi khi xóa công việc: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    echo "Không có công việc để xóa.";
}

$conn->close();
?>
