<?php
// Incluir los archivos necesarios
require_once '../config/database.php';
require_once '../controllers/AutorController.php';
// Incluir otros controladores aquí...

// Crear instancia de la base de datos
$database = new Database();
$db = $database->getConnection();

// Obtener la acción de la URL
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Obtener el controlador de la URL (por defecto, usaremos AutorController)
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Autor';

// Crear la instancia del controlador
$controllerName = $controller . 'Controller';
$controllerInstance = new $controllerName();

// Llamar a la acción correspondiente
switch($action) {
    case 'index':
        $controllerInstance->index();
        break;
    case 'create':
        $controllerInstance->create();
        break;
    case 'edit':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controllerInstance->edit($id);
        break;
    case 'delete':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controllerInstance->delete($id);
        break;
    default:
        echo "404 - Página no encontrada";
        break;
}
