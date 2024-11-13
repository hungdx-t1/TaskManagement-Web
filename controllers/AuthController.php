<?php
require_once __DIR__ . '/../config/database.php';

class AuthController {
  private $conn;

  public function __construct() {
    $database = new Database();
    $this->conn = $database->getConnection();
  }

  public function redirect($url){
    $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
    header('Location: ' . $baseUrl . $url);
    exit();
  }

  public function loginIndex(){
    require_once __DIR__ . '/../login.php';
  }

  public function registerIndex(){
    require_once __DIR__ . '/../register.php';
  }

  public function register() {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $isUserExist = $this->checkUserExist($username, $email);

    if ($isUserExist) {
      echo '<script>alert("Tên đăng nhập hoặc email đã tồn tại!")</script>';
      echo '<script>history.back();</script>';
      exit();
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, password_hash, email) VALUES (:username, :password, :email)";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':email', $email);
    $isSuccess = $stmt->execute();

    if (!$isSuccess) {
      echo '<script>alert("Đăng ký thất bại!")</script>';
      echo '<script>history.back();</script>';
      exit();
    } 

    echo '<script>alert("Đăng ký thành công!")</script>';
    $this->redirect('/login');
  }

  public function login(){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $this->findByUsername($username);

    if(!$user){
      echo '<script>alert("Tên đăng nhập không tồn tại!")</script>';
      echo '<script>history.back();</script>';
      exit();
    }

    $password_hash = $user['password_hash'];

    if(password_verify($password, $password_hash)){
      $_SESSION['user_id'] = $user['user_id'];

      $this->redirect('/');
    }

    echo '<script>alert("Mật khẩu không trùng khớp!")</script>';
    echo '<script>history.back();</script>';
  }

  public function logout(){
    session_unset();
    session_destroy();
    $this->redirect('/login');
  }

  public function checkUserExist($username, $email) {
    $sql = "SELECT * FROM users WHERE username = :username OR email = :email";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      return true;
    } 
    return false;
  }

  public function findByUsername($username) {
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return $result;
    }
    return null;
  }
} 