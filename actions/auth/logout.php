<?php
// Iniciar la sesión
session_start();

// Destruir la sesión
session_destroy();

if (!isset($_SESSION['user_id'])) {
    // Si el usuario no ha iniciado sesión, redirigir a index.php
    header("Location: ../../views/error404.php");
    exit();
}

// Eliminar las cookies (establecer el tiempo de expiración en el pasado)
setcookie('user_id', '', time() - 3600, '/');
setcookie('user_nombre', '', time() - 3600, '/');

// Redirigir a la página de inicio (por ejemplo, index.php)
header("Location: ../../index.php");
exit();
