<?php
session_start();
if (isset($_SESSION['user_id'])) {
    //Si ya está en sesión
    header("Location: ../error404.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litzy</title>
    <link rel="stylesheet" href="styles/acceder.css">
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
                <li><a href="../../index.php">Inicio</a></li>
                <li><a href="../pages/lista.php">Ver lista</a></li>
                <li><a href="">Publicar libro</a></li>
            </ul>
        </nav>
        <div class="actions-btns">
            <a href="login.php" class="btn-login">Acceso</a>
            <a href="register.php" class="btn-register">Inscribirse</a>
        </div>
    </header>
    <!--  -->

    <div class="box-acceder">
        <div class="card-acceder">
            <h1>Acceder</h1>
            <?php
            if (isset($_SESSION['error'])) {
                echo "<p>{$_SESSION['error']}</p><br>";
                unset($_SESSION['error']);
            }
            ?>
            <div class="form-acceder">
                <form action="../../actions/auth/loginProcess.php" method="post">
                    <input type="email" name="email" placeholder="nombre@gmail.com">
                    <input type="password" name="password" placeholder="contraseña">
                    <button type="submit" name="loginProcess">Acceder</button>
                </form>
                <!--  -->
                <div class="no-login">
                    <p>Si no tienes una cuenta <a href="register.php">inscribete aquí</a></p>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
    <footer>
        <div class="logo-litzy">
            <img width="120px" src="../../assets/imgs/litzy-bg.png" alt="">
        </div>
        <nav>
            <ul>
                <li><a href="login.php"><span>&gt;</span> Acceder</a></li>
                <li><a href="register.php"><span>&gt;</span> Inscribirse</a></li>
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

    .box-acceder {
        display: flex;
        padding: 50px;
        justify-content: center;
    }

    .card-acceder {
        display: flex;
        flex-direction: column;
        background-color: #fff;
        box-shadow: 0px 0px 10px 3px #b8b8b8;
        padding: 35px 50px;
        align-items: center;
        border-radius: 5px;
    }

    .form-acceder form {
        display: flex;
        flex-direction: column;
    }

    .card-acceder h1 {
        margin-bottom: 25px;
    }

    .form-acceder form input {
        padding: 10px 100px 10px 5%;
        border-radius: 5px;
        margin-bottom: 30px;
        font-family: 'Open Sans', sans-serif;
        border: 0;
        outline: 1px solid #A6A6A6;
        font-size: 16px;
    }

    .form-acceder form input::placeholder {
        font-size: 16px;
        color: #999;
    }

    .form-acceder form input:focus {
        outline: 1px solid #57F287;
    }

    .form-acceder form button {
        background-color: #F6B606;
        border: 0;
        font-family: 'Open Sans', sans-serif;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        font-size: 20px;
        margin-bottom: 30px;
        padding: 10px;
        border-radius: 5px;
    }

    .form-acceder .no-login p {
        font-size: 13px;
        text-align: center;
        font-weight: 600;
    }

    .form-acceder .no-login p a {
        color: #F6B606;
        font-weight: 700;
    }

    /*  */
    footer {
        display: flex;
        /*  */
        align-items: center;
        padding: 10px;
        background-color: #fff;
        justify-content: space-around;
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