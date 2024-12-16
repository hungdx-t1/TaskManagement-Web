<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Thông tin kết nối tới cơ sở dữ liệu
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

// Kiểm tra xem có phải yêu cầu POST không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $dueDate = $_POST['dueDate'];
    $category = $_POST['category'];
    $id = $_POST['taskId'];
    $isDone = ($_POST['isDone'] === 'yes') ? 1 : 0; // Chuyển đổi 'yes' thành 1 và 'no' thành 0

    $userId = $_SESSION['user_id'] ?? null;

    if ($id) {
        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
            // Đọc file ảnh dưới dạng nhị phân
            $image = file_get_contents($_FILES['attachment']['tmp_name']);
            $stmt = $conn->prepare("UPDATE tasks SET user_id = ?, title = ?, description = ?, priority = ?, image = ?, due_date = ?, category = ?, isDone = ? WHERE task_id = ?");
            $stmt->bind_param("issssssii", $userId, $title, $description, $priority, $image, $dueDate, $category, $isDone, $id);
        } else {
            $stmt = $conn->prepare("UPDATE tasks SET user_id = ?, title = ?, description = ?, priority = ?, due_date = ?, category = ?, isDone = ? WHERE task_id = ?");
            $stmt->bind_param("isssssii", $userId, $title, $description, $priority, $dueDate, $category, $isDone, $id);
        }

        if ($stmt->execute()) {

            // Lưu log
            $action = "Sửa công việc: " . $title;
            $log_sql = "INSERT INTO activity_logs(user_id, action) VALUES (?, ?)";
            $log_stmt = $conn->prepare($log_sql);
            $log_stmt->bind_param('is', $userId, $action); // 'i' là integer, 's' là string
            $log_stmt->execute();

            echo "<script>
                    alert('Cập nhật công việc thành công!');
                    window.location.href = 'main.php';
                </script>";
            exit();
        } else {
            echo "<script>
                    alert('Cập nhật công việc thất bại!');
                    window.location.href = 'main.php';
                </script>";
            exit();
        }
    } else {
        // Khởi tạo biến ảnh
        $image = null;
        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
            // Đọc file ảnh dưới dạng nhị phân
            $image = file_get_contents($_FILES['attachment']['tmp_name']);
        }

        // Thêm dữ liệu vào cơ sở dữ liệu
        $stmt = $conn->prepare("INSERT INTO tasks (user_id, title, description, priority, due_date, image, category, isDone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssssi", $userId, $title, $description, $priority, $dueDate, $image, $category, $isDone);


        if ($stmt->execute()) {

            $action = "Thêm công việc: " . $title;
            $log_sql = "INSERT INTO activity_logs(user_id, action) VALUES (?, ?)";
            $log_stmt = $conn->prepare($log_sql);
            $log_stmt->bind_param('is', $userId, $action); // 'i' là integer, 's' là string
            $log_stmt->execute();

            echo "<script>
                    alert('Thêm công việc thành công!');
                    window.location.href = 'main.php';
                </script>";
            exit();
        } else {
            echo "<script>
                    alert('Thêm công việc thất bại!');
                    window.location.href = 'main.php';
                </script>";
            exit();
        }
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>