<?php
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

// Kiểm tra yêu cầu POST và lấy ID công việc
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $taskId = $_POST['id'];

    // Chuẩn bị câu truy vấn để xóa công việc
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $taskId);

    // Thực thi và trả về kết quả
    if ($stmt->execute()) {
        echo "<script>
                alert('Đã xóa công việc thành công!');
                window.location.href = 'main.php';
              </script>";
    } else {
        echo "<script>
                alert('Lỗi khi xóa công việc: " . $stmt->error . "');
                window.location.href = 'main.php';  
              </script>";
    }

    $stmt->close();
}
$conn->close();
?>
