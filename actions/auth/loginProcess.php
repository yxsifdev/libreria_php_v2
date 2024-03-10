<?php
session_start();
include_once '../../controllers/userController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $controller = new UserController();
    $logged_in = $controller->login($email, $password);

    if ($logged_in) {
        // Redirigir a la página de inicio
        header("Location: ../../views/pages/home.php");
        exit;
    } else {
        // Las credenciales son incorrectas, redirigir al formulario de inicio de sesión con un mensaje de error
        $_SESSION['error'] = "Correo o contraseña incorrectos";
        header("Location: ../../views/auth/login.php");
        exit;
    }
}
