<?php
require_once("../../controllers/librosController.php");

session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit();
}

// Verificar si se ha enviado el formulario de compra
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comprar'])) {
    $libro_id = $_POST['libro_id'];
    $user_id = $_SESSION['user_id']; // Obtener el ID de usuario de la sesión

    // Crear una instancia del controlador de libros
    $libroController = new LibroController();

    // Llamar a la función para comprar el libro, pasando el ID del usuario
    $mensaje = $libroController->comprarLibro($libro_id, $user_id);

    // Redirigir al usuario a otra página con el mensaje resultante
    header("Location: ../../views/pages/libros.php");
    exit();
} else {
    // Si no se envió un formulario válido de compra, redirigir al usuario a otra parte de tu aplicación
    $e->getMessage();
    // header("Location: ../../index.php");
    exit();
}
