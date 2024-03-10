<?php
require_once("../../controllers/librosController.php");

session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit();
}

// Verificar si se ha enviado el formulario de alquiler
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['alquilar'])) {
    $libro_id = $_POST['libro_id'];
    $fecha_devolucion = $_POST['fecha_devolucion'];
    $user_id = $_SESSION['user_id']; // Obtener el ID de usuario de la sesión

    // Crear una instancia del controlador de libros
    $libroController = new LibroController();

    // Llamar a la función para alquilar el libro, pasando el ID del usuario y la fecha de devolución
    $mensaje = $libroController->alquilarLibro($libro_id, $user_id, $fecha_devolucion);

    // Redirigir al usuario a otra página con el mensaje resultante
    header("Location: ../../views/pages/libros.php");
    exit();
} else {
    // Si no se envió un formulario válido de alquiler, redirigir al usuario a otra parte de tu aplicación
    header("Location: ../../index.php");
    exit();
}
