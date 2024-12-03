<?php
require_once '../config/database.php';
require_once '../controllers/LoginController.php';
// Incluir otros controladores según sea necesario

$controller = $_GET['controller'] ?? 'login';
$action = $_GET['action'] ?? 'showLoginForm';

switch ($controller) {
    case 'login':
        $loginController = new LoginController();
        if ($action == 'login') {
            $loginController->login();
        } else {
            $loginController->showLoginForm();
        }
        break;
    // Manejar otros controladores
}
?>
