<?php
// index.php
$action = isset($_GET['action']) ? $_GET['action'] : '';

require_once '../../controllers/librosController.php';

$controller = new LibroController();

switch ($action) {
    case 'mostrar':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $libro = $controller->mostrarLibro($id);
            include '../../views/pages/option.php';
        }
        break;
    default:
        $libros = $controller->mostrarTodos();
        include '../../views/pages/libros.php';
        break;
}
