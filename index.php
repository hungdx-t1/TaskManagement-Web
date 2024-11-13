<?php
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/TaskController.php';
require_once __DIR__ . '/controllers/CategoryController.php';

session_start();

$authController = new AuthController();
$taskController = new TaskController();
$categoryController = new CategoryController();

function authMiddleware() {
  if (!isset($_SESSION['user_id'])) {
      $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
      header('Location: ' . $baseUrl . '/login');
      exit();
  }
}

function checkIfAuthenticated() {
  if (isset($_SESSION['user_id'])) {
      $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
      header('Location: ' . $baseUrl . '/');
      exit();
  }
}

$request = $_SERVER['REQUEST_URI'];
$request = strtok($request, '?');
$script_name = $_SERVER['SCRIPT_NAME'];
$base_path = dirname($script_name);
$request = str_replace($base_path, '', $request);

if ($request === '' || $request === '/') {
  $request = '/';
}

switch ($request) {
  case '/':
    authMiddleware();
    $taskController->index();
    break;
  case '/login':
    checkIfAuthenticated();
    $authController->loginIndex();
    break;
  case '/login/post':
    $authController->login();
    break;
  case '/register':
    checkIfAuthenticated();
    $authController->registerIndex();
    break;
  case '/register/post':
    $authController->register();
    break;
  case '/logout':
    $authController->logout();
    break;
  default:
      http_response_code(404);
      break;
  case '/addCategory':
    $categoryController->addCategory();
    break;
  case '/addTask':
    $taskController->addTask();
    break;
}