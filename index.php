<?php
include("config/connect.php");

session_start();
if (isset($_SESSION['user_id'])) {
    //Si ya está en sesión
    header("Location: views/pages/home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litzy</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Paytone+One&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <nav>
            <div class="name-logo">
                <h1>Litzy</h1>
            </div>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="views/pages/lista.php">Ver lista</a></li>
                <li><a href="views/auth/login.php">Publicar libro</a></li>
            </ul>
        </nav>
        <div class="actions-btns">
            <a href="views/auth/login.php" class="btn-login">Acceso</a>
            <a href="views/auth/register.php" class="btn-register">Inscribirse</a>
        </div>
    </header>
    <!--  -->
    
    <main class="container">
        <img src="./assets/imgs/libros/cien_anios_de_soledad.jpg" alt="">
        <img src="./assets/imgs/libros/1984.jpg" alt="">
        <img src="./assets/imgs/libros/el_senior_de_los_anillos.jpg" alt="">
        <img src="./assets/imgs/libros/orgullo_y_prejuicio.jpg" alt="">
        <img src="./assets/imgs/libros/harry_potter_y_la_piedra_folosofica.jpg" alt="">
        <img src="./assets/imgs/libros/el_amor_en_los_tiempos_del_colera.jpg" alt="">
        <img src="./assets/imgs/libros/cronica_de_una_muerte_anunciada.jpg" alt="">
        <img src="./assets/imgs/libros/matar_a_un_ruisenior.jpg" alt="">
        <img src="./assets/imgs/libros/don_quijote_de_la_mancha.jpg" alt="">
        <img src="./assets/imgs/libros/los_miserables.jpg" alt="">
    </main>

    <!--  -->
    <footer>
        <div class="logo-litzy">
            <img width="120px" src="./assets/imgs/litzy-bg.png" alt="">
        </div>
        <nav>
            <ul>
                <li><a href="views/auth/login.php"><span>&gt;</span> Acceder</a></li>
                <li><a href="views/auth/register.php"><span>&gt;</span> Inscribirse</a></li>
                <li><a href="#"><span>&gt;</span> Términos y Condiciones</a></li>
            </ul>
        </nav>
    </footer>

</body>

</html>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Open Sans', sans-serif;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style: none;
    }

    header {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 10px 3px #b8b8b8;
    }

    header .name-logo h1 {
        font-family: 'Paytone One', sans-serif;
        font-size: 35px;
        margin-top: -20px;
    }

    header .name-logo h1:hover {
        color: #F6B606;
        cursor: pointer;
    }

    header nav {
        align-items: center;
        flex-wrap: wrap;
        display: flex;
        gap: 30px;
    }

    header nav ul {
        display: flex;
        gap: 30px;
    }

    header nav ul li a {
        color: #000;
        font-weight: 600;

    }

    .container {
        display: flex;
        flex-wrap: wrap;
        padding: 30px;
        justify-content: center;
        gap: 30px;
    }

    .container img {
        width: 200px;
        height: 300px;
        border-radius: 10px;
    }

    .actions-btns {
        display: flex;
        align-items: center;
        gap: 15px;
        font-weight: 600;
    }

    .actions-btns .btn-login {
        color: #000;
    }

    .actions-btns .btn-register {
        background-color: #F6B606;
        color: #fff;
        padding: 7px 10px;
        border-radius: 50px;
    }

    /*  */

    /*  */
    footer {
        display: flex;
        /*  */
        background-color: #fff;
        align-items: center;
        padding: 10px;
        justify-content: space-around;
        width: 100%;
        box-shadow: 0px 0px 10px 3px #b8b8b8;
    }

    footer nav ul {
        display: flex;
        flex-direction: column;
    }

    footer nav ul li a span {
        color: #b8b8b8;
    }

    footer nav ul li a {
        color: #000;
        font-weight: 600;
    }

    footer nav ul li a:hover {
        color: #F6B606;
    }

    /*  */

    /* Menor tamaño */
    @media (max-width: 768px) {
        header {
            justify-content: left;
            gap: 20px;
        }
    }

    /* Mayor tamaño */
    @media (min-width: 768px) {}
</style>