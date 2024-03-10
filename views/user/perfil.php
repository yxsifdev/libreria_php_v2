<?php
// index.php
require_once("../../controllers/userController.php");

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit();
}

$controller = new UserController();
$id_usuario = $_SESSION['user_id'];
$compras = $controller->mostrarTablaCompra($id_usuario);
$alquileres = $controller->mostrarTablaAlquiler($id_usuario);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario <?php echo $_SESSION['user_id']; ?></title>
    <link rel="stylesheet" href="styles/perfil.css">
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
                <li><a href="../pages/home.php">Inicio</a></li>
                <li><a href="../pages/libros.php">Ver lista</a></li>
                <li><a href="../pages/publicar.php">Publicar libro</a></li>
            </ul>
        </nav>
        <div class="actions-btns">
            <a href="perfil.php?id=<?php echo $_SESSION['user_id']; ?>" class="btn-username"><?php echo $_SESSION['user_name'] ?></a>
            <a href="../../actions/auth/logout.php" class="btn-logout">Cerrar sesión</a>
        </div>
    </header>
    <!--  -->

    <section class="profile">
        <div class="content">
            <h2>ID</h2>
            <p><?php echo $_SESSION['user_id'] ?></p>
        </div>
        <div class="content">
            <h2>Email</h2>
            <p><?php echo $_SESSION['user_email'] ?></p>
        </div>
        <div class="content">
            <h2>Nombre</h2>
            <p><?php echo $_SESSION['user_name'] ?></p>
        </div>
        <div class="content">
            <h2>Apellido</h2>
            <p><?php echo $_SESSION['user_lastname'] ?></p>
        </div>
        <div class="content">
            <h2>Rol</h2>
            <p><?php echo $_SESSION['rol'] ?></p>
        </div>
    </section>

    <!--  -->

    <main>
        <h1 style="text-align: center;">Libros alquilados</h1>
        <br>
        <section class="logs-alquileres">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Id usuario</th>
                        <th>Id libro</th>
                        <th>Fecha de alquiler</th>
                        <th>Fecha de devolución</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alquileres as $fila) : ?>
                        <tr>
                            <td><?php echo $fila['id']; ?></td>
                            <td><?php echo $fila['id_usuario']; ?></td>
                            <td><?php echo $fila['id_libro']; ?></td>
                            <td><?php echo $fila['fecha_alquiler']; ?></td>
                            <td><?php echo $fila['fecha_devolucion']; ?></td>
                            <!-- Mostrar más columnas según la estructura de tu tabla -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="form-devolver">
                <h1>Devolver libro</h1>
                <form action="../../actions/libros/devolver.php" method="post">
                    <input required type="number" name="id_alquiler" placeholder="Id alquiler">
                    <!-- <input required type="number" name="id_libro" placeholder="Id libro"> -->
                    <button type="submit" name="devolver">Devolver</button>
                </form>
            </div>
        </section>
        <br>
        <h1 style="text-align: center;">Libros comprados</h1>
        <br>
        <section class="logs-compras">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Id usuario</th>
                        <th>Id libro</th>
                        <th>Fecha de compra</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compras as $fila) : ?>
                        <tr>
                            <td><?php echo $fila['id']; ?></td>
                            <td><?php echo $fila['id_usuario']; ?></td>
                            <td><?php echo $fila['id_libro']; ?></td>
                            <td><?php echo $fila['fecha_compra']; ?></td>
                            <!-- Mostrar más columnas según la estructura de tu tabla -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
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
        flex-direction: column;
        padding: 50px;
    }

    .logs-alquileres {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
    }

    .logs-alquileres table {
        justify-content: center;
        background-color: #fff;
        box-shadow: 0px 0px 10px 1px #aeaeae;
        padding: 20px 30px;
        cursor: pointer;
        border-radius: 10px;
    }

    .logs-alquileres table thead tr th {
        border-radius: 5px;
        background-color: #F6B606;
        padding: 10px;
    }

    .logs-alquileres table tbody tr td {
        border-radius: 5px;
        text-align: center;
        background: #f6b60670;
        padding: 5px 10px;
    }

    .logs-alquileres table tbody tr :hover {
        background-color: rgba(160, 117, 0, 0.603);
        color: #fff;
    }

    /*  */

    .form-devolver {
        display: flex;
        flex-direction: column;
        box-shadow: 0px 0px 10px 1px #aeaeae;
        align-items: center;
        padding: 20px 30px;
        background-color: #fff;
        gap: 30px;
        border-radius: 10px;
    }

    .form-devolver h1 {
        font-size: 30px;
    }

    .form-devolver form {
        display: flex;
        gap: 20px;
        flex-direction: column;
    }

    .form-devolver form input {
        border: none;
        outline: 1px solid #aeaeae;
        border-radius: 5px;
        padding: 5px 10px;
    }

    .form-devolver form input:focus {
        outline-color: #57F287;
    }

    .form-devolver form button {
        background-color: red;
        color: #fff;
        border: none;
        font-weight: 600;
        font-size: 15px;
        padding: 10px;
        border-radius: 5px;
    }

    /*  */

    .logs-compras {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .logs-compras table {
        justify-content: center;
        background-color: #fff;
        box-shadow: 0px 0px 10px 1px #aeaeae;
        padding: 20px 30px;
        cursor: pointer;
        border-radius: 10px;
    }

    .logs-compras table thead tr th {
        border-radius: 5px;
        background-color: #F6B606;
        padding: 10px;
    }

    .logs-compras table tbody tr td {
        border-radius: 5px;
        text-align: center;
        background: #f6b60670;
        padding: 5px 10px;
    }

    .logs-compras table tbody tr :hover {
        background-color: rgba(160, 117, 0, 0.603);
        color: #fff;
    }

    /*  */

    .profile {
        display: flex;
        justify-content: center;
        gap: 30px;
        padding: 30px;
        box-shadow: 0px 0px 10px 3px #b8b8b8;
        margin-top: 30px;
        background-color: #fff;
    }

    /*  */
    footer {
        display: flex;
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