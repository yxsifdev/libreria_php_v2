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
    <link rel="stylesheet" href="styles/alquilar.css">
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
                <li><a href="">Inicio</a></li>
                <li><a href="">Ver lista</a></li>
                <li><a href="">Publicar libro</a></li>
            </ul>
        </nav>
        <div class="actions-btns">
            <a href="" class="btn-username">Usuario</a>
            <a href="" class="btn-logout">Cerrar sesión</a>
        </div>
    </header>
    <!--  -->

    <main>
        <?php if (!empty($libro)) : ?>
            <section>
                <h1>Seleccionar fecha de devolución</h1>
                <form action="../../actions/libros/alquilarProcess.php" method="post">
                    <input type="hidden" name="libro_id" value="<?php echo $_GET['id']; ?>">
                    <label for="fecha_devolucion">Fecha de devolución:</label>
                    <input required id="fecha_devolucion" name="fecha_devolucion" type="date">
                    <button type="submit" name="alquilar">Alquilar</button>
                </form>
            </section>
        <?php else : ?>
            <p>Libro no encontrado.</p>
        <?php endif; ?>
    </main>

    <!--  -->
    <footer>
        <div class="logo-litzy">
            <img width="120px" src="images/litzy-bg.png" alt="">
        </div>
        <nav>
            <ul>
                <li><a href=""><span>&gt;</span> Acceder</a></li>
                <li><a href=""><span>&gt;</span> Inscribirse</a></li>
                <li><a href=""><span>&gt;</span> Términos y Condiciones</a></li>
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

    main {
        display: flex;
        padding: 20px;
        justify-content: center;
    }

    main section {
        display: flex;
        flex-direction: column;
        background-color: #fff;
        box-shadow: 0px 0px 10px 1px #aeaeae;
        border-radius: 10px;
        padding: 20px 40px;
        gap: 30px;
    }

    section form label {
        font-weight: 600;
        margin-right: 10px;
    }

    section form input {
        padding: 5px 10px;
        border-radius: 5px;
        color: #b8b8b8;
        background: none;
        border: none;
        outline: 1px solid #aeaeae;
        margin-right: 10px;
    }

    section form input:focus {
        outline-color: #57F287;
    }

    section form button {
        border: none;
        padding: 10px 30px;
        border-radius: 5px;
        font-weight: 700;
        color: #fff;
        background-color: #F6B606;
    }


    /*  */
    footer {
        display: flex;
        background-color: #fff;
        align-items: center;
        padding: 10px;
        justify-content: space-around;
        bottom: 0;
        position: fixed;
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
    @media (max-width: 768px) {}

    /* Mayor tamaño */
    @media (min-width: 768px) {}

    ::selection {
        background-color: #f6b60670;
    }
</style>