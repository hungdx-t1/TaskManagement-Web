<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
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
$sql="select * from users where username='$username' and password_harsh='$password'";
$result=$conn->query($sql);
if($result->num_rows==1){
	$_SESSION['username'] = $username;
	header('Location:main.php');
}
else if($result1->num_rows==0)
header('Location:login.php');
mysqli_close($conn);
?>