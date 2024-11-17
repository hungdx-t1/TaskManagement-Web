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

// Kiểm tra xem có phải yêu cầu POST không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $taskId = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $dueDate = $_POST['dueDate'];

    // Chuẩn bị câu truy vấn cập nhật
    $stmt = $conn->prepare("UPDATE tasks SET title = ?, description = ?, priority = ?, due_date = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $title, $description, $priority, $dueDate, $taskId);

    // Thực thi và trả về kết quả
    if ($stmt->execute()) {
        echo "<script>
                alert('Đã cập nhật công việc thành công!');
                window.location.href = 'main.php';
              </script>";
    } else {
        echo "<script>
                alert('Lỗi khi cập nhật công việc: " . $stmt->error . "');
                window.location.href = 'main.php';
              </script>";
    }

    $stmt->close();
}
$conn->close();
?>
