<?php
require_once("../../controllers/librosController.php");

session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit();
}

// 

$libros_json = file_get_contents('../../assets/json/libros.json');

// Decodifica el JSON a un array asociativo
$datos = json_decode($libros_json, true);

// Verifica si se pudo decodificar correctamente el JSON
if ($datos === null) {
    die("Error al decodificar el JSON");
}
$libros = $datos['libros'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litzy</title>
    <link rel="stylesheet" href="styles/libros.css">
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
                <li><a href="lista.php">Ver lista</a></li>
                <li><a href="../auth/login.php">Publicar libro</a></li>
            </ul>
        </nav>
        <div class="actions-btns">
            <a href="../auth/login.php" class="btn-login">Acceso</a>
            <a href="../auth/register.php" class="btn-register">Inscribirse</a>
        </div>
    </header>
    <!--  -->

    <main>
        <?php foreach ($libros as $libro) : ?>
            <div class="box-books">
                <a style="cursor: pointer;"><img width="150px" height="200px" src="<?php echo $libro['portada'] ?>" alt=""></a>
                <div class="text-content">
                    <h2><?php
                        $titulo = $libro['titulo'];
                        if (strlen($titulo) > 15) {
                            $titulo = substr($titulo, 0, 15) . '...';
                        }
                        echo $titulo;
                        ?></h2>
                    <p><?php echo $libro['estrellas']; ?> ⭐</p>
                </div>
            </div>
        <?php endforeach; ?>
    </main>

    <!--  -->
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

    main {
        display: grid;
        padding: 30px;
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        column-gap: 70px;
        place-items: center;
        row-gap: 20px;
    }

    main .box-books img {
        cursor: pointer;
        border-radius: 5px;
    }

    main .text-content h2 {
        font-size: 14px;
        color: #F6B606;
    }

    main .text-content p {
        font-size: 13px;
        font-weight: 600;
    }

    main .box-books .no-found-book {
        display: none;
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
    }

    /* Mayor tamaño */
    @media (min-width: 768px) {}

    ::selection {
        background-color: #f6b60670;
    }
</style>