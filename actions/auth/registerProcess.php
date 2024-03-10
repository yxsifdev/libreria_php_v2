<?php
session_start();
include_once '../../controllers/userController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = 'user';

    $controller = new UserController();
    $userExists = $controller->checkEmailExists($email);
    if ($userExists) {
        $_SESSION['error'] = "El correo electrónico ya está registrado.";
        header("Location: ../../views/auth/register.php");
        exit;
    }

    // Verificar si la contraseña tiene al menos 8 caracteres
    if (strlen($password) < 8) {
        $_SESSION['error'] = "La contraseña debe tener al menos 8 caracteres.";
        header("Location: ../../views/auth/register.php");
        exit;
    }
    $registro = $controller->register($nombre, $apellido, $email, $password, $rol);

    if ($registro) {
        // Registro exitoso, redirigir a la página de inicio de sesión
        header("Location: ../../views/auth/login.php");
        exit;
    } else {
        // Error en el registro, redirigir al formulario de registro con un mensaje de error
        $_SESSION['error'] = "Error en el registro. Por favor, inténtalo de nuevo.";
        header("Location: ../../views/auth/register.php");
        exit;
    }
}
