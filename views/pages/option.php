<?php
require_once("../../controllers/librosController.php");

$controller = new LibroController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $libro = $controller->mostrarLibro($id);
} else {
    $libro = null;
}
// 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litzy</title>
    <link rel="stylesheet" href="styles/publicar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Paytone+One&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>
</head>

<body>

    <header>
        <nav>
            <div class="name-logo">
                <h1>Litzy</h1>
            </div>
            <ul>
                <li><a href="home.php">Inicio</a></li>
                <li><a href="libros.php">Ver lista</a></li>
                <li><a href="publicar.php">Publicar libro</a></li>
            </ul>
        </nav>
        <div class="actions-btns">
            <a href="../user/perfil.php?id=<?php echo $_SESSION['user_id']; ?>" class="btn-username"><?php
                                                                                                        $nombre = $_SESSION['user_name'];
                                                                                                        if (strlen($nombre) > 20) {
                                                                                                            $nombre = substr($nombre, 0, 20) . '...';
                                                                                                        }
                                                                                                        echo $nombre;
                                                                                                        ?></a>
            <a href="../../actions/auth/logout.php" class="btn-logout">Cerrar sesión</a>
        </div>
    </header>

    <!--  -->

    <main style="border-radius: 10px;padding: 30px;margin: 30px; background-color: #fff; box-shadow: 0px 0px 10px 1px gray">
        <?php if (!empty($libro)) : ?>
            <h2 style="color: #F6B606">Información del libro (<?php echo $libro['id']; ?>)</h2>
            <br>
            <h4 style="color: #F6B606">Título:</h4>
            <p><?php echo $libro['titulo']; ?></p>
            <h4 style="color: #F6B606">Autor:</h4>
            <p><?php echo $libro['autor']; ?></p>
            <h4 style="color: #F6B606">Genero:</h4>
            <p><?php echo $libro['genero']; ?></p>
            <h4 style="color: #F6B606">Descripción:</h4>
            <p><?php echo $libro['descripcion']; ?></p>
            <h4 style="color: #F6B606">Titulo:</h4>
            <p><?php echo $libro['genero']; ?></p>
            <br>
            <form action="../../actions/libros/comprarProcess.php" method="post">
                <input type="hidden" name="libro_id" value="<?php echo $libro['id']; ?>">
                <input style="background-color: #F6B606; color: #fff; border-radius: 5px; padding: 5px 10px; border: none; cursor: pointer ;font-size: 16px; font-weight: 500;" type="submit" name="comprar" value="Comprar">
            </form>
            <br>
            <a style="background-color: #F6B606; color: #fff; border-radius: 5px; padding: 5px 10px; font-weight: 500;" href="alquilar.php?id=<?php echo $libro['id']; ?>">Alquilar</a>
        <?php else : ?>
            <p>Libro no encontrado.</p>
        <?php endif; ?>
    </main>

    <!--  -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer>
        <div class="logo-litzy">
            <img width="120px" src="../../assets/imgs/litzy-bg.png" alt="">
        </div>
        <nav>
            <ul>
                <li><a href="libros.php"><span>&gt;</span> Ver lista</a></li>
                <li><a href="publicar.php"><span>&gt;</span> Publicar libro</a></li>
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
        position: sticky;
        top: 0;
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

    .actions-btns {
        display: flex;
        align-items: center;
        gap: 15px;
        font-weight: 600;
    }

    .actions-btns .btn-username {
        color: #000;
    }

    .actions-btns .btn-logout {
        background-color: #F6B606;
        color: #fff;
        padding: 7px 10px;
        border-radius: 50px;
    }

    /*  */

    .container {
        display: flex;
        justify-content: center;
        padding: 0px 50px;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .formulario {
        display: flex;
        flex-direction: column;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 1px #aeaeae;
        padding: 30px 40px;
        background-color: #fff;
    }

    .formulario .title {
        text-align: center;
    }

    .formulario form {
        display: flex;
        flex-direction: column;
    }

    .formulario form .form-content {
        display: flex;
        flex-wrap: wrap;
        gap: 50px;
    }

    .form-content .form-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .form-content .form-group label {
        font-size: 15px;
        font-weight: 600;
    }

    .form-content .form-group input {
        outline: 1px solid #C6C6C6;
        border-radius: 5px;
        padding: 5px 20px 5px 10px;
        border: none;
    }

    .form-content .form-group input::placeholder {
        color: #C6C6C6;
    }

    .form-content .form-group input:focus {
        outline-color: #57F287;
    }

    .form-content .form-description label {
        font-size: 15px;
        font-weight: 600;
    }

    .form-content .form-description textarea {
        outline: 1px solid #C6C6C6;
        border-radius: 5px;
        resize: horizontal;
        max-width: 500px;
        min-width: 300px;
        height: 100%;
        padding: 5px 20px 5px 10px;
        border: 0;
    }

    .form-content .form-description textarea::placeholder {
        color: #C6C6C6;
    }

    .form-content .form-description textarea:focus {
        outline-color: #57F287;
    }

    .form-description {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .formulario .btn-submit {
        display: flex;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .formulario .btn-submit button {
        font-size: 18px;
        font-weight: 700;
        color: #fff;
        background: transparent;
        border: none;
        background-color: #F6B606;
        padding: 10px;
        border-radius: 10px;
        width: 100%;
    }

    .formulario .btn-submit button,
    .formulario .btn-submit i {
        align-items: center;
        justify-content: space-between;
        padding: 5px 20px;
        display: flex;
    }

    .formulario .btn-submit i {
        font-size: 25px;
    }

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
            top: auto;
        }

        .form-content .form-description textarea {
            resize: none;
        }
    }

    /* Mayor tamaño */
    @media (min-width: 768px) {}

    ::selection {
        background-color: #f6b60670;
    }
</style>