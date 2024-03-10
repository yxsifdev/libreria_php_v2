<?php
// devolver_libro.php
require_once("../../controllers/userController.php");

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['devolver'])) {
    $controller = new UserController();
    $id_alquiler = $_POST['id_alquiler'];
    // $id_libro = $_POST['id_libro'];
    $controller->devolverLibro($id_alquiler);
}

header("Location: ../../views/user/perfil.php");
exit();
