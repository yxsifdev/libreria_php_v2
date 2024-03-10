<?php
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

    <main>
        <section class="container">
            <div class="formulario">
                <h2 class="title">Publicar libro</h2>
                <form action="../../actions/libros/publicarProcess.php" method="post">
                    <div class="form-content">
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input required type="text" name="titulo" placeholder="Titulo del libro">
                            <label for="autor">Autor</label>
                            <input required type="text" name="autor" placeholder="Autor del libro">
                            <label for="genero">Género</label>
                            <input required type="text" name="genero" placeholder="Género del libro">
                            <label for="portada">Portada</label>
                            <input type="text" name="portada" placeholder="Portada del libro">
                            <!-- <label for="canT">Cantidad total</label> -->
                            <!-- <input required type="number" name="canT" placeholder="Cantidad total"> -->
                            <div class="btn-submit">
                                <button>Publicar libro <i class="fi fi-rs-paper-plane"></i></button>
                            </div>
                        </div>
                        <div class="form-description">
                            <label for="descripcion">Descripción</label>
                            <textarea placeholder="Descripción" name="descripcion" cols="30" rows="10">Este libro es...</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- <textarea style="resize: none;" name="" id="" cols="30" rows="10"></textarea> -->

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