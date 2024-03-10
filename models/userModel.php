<?php

class UserModel
{
    private $connection;

    public function __construct()
    {
        require_once("../../config/connect.php");
        $db = new DB();
        $this->connection = $db->connection();
    }

    public function checkLogin($email, $password)
    {
        // Comprobar las credenciales en la base de datos
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Iniciar sesión
            session_start();
            $_SESSION['loggedin'] = true;
            // También puedes guardar otros datos del usuario en la sesión si es necesario
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['nombre'];
            $_SESSION['user_lastname'] = $user['apellido'];
            $_SESSION['rol'] = $user['rol'];
            return true;
        } else {
            return false;
        }
    }

    public function checkEmailExists($email)
    {
        try {
            $stmt = $this->connection->prepare("SELECT COUNT(email) FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count > 0; // Devuelve true si el correo electrónico existe, de lo contrario devuelve false
        } catch (PDOException $e) {
            return false; // En caso de error, devuelve false
        }
    }

    public function insertar($nombre, $apellido, $email, $password, $rol)
    {
        // Hashear la contraseña antes de guardarla en la base de datos
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stament = $this->connection->prepare("INSERT INTO usuarios (nombre, apellido, email, password, rol) VALUES (:nombre, :apellido, :email, :password, :rol)");
            $stament->bindParam(":nombre", $nombre);
            $stament->bindParam(":apellido", $apellido);
            $stament->bindParam(":email", $email);
            $stament->bindParam(":password", $hashedPassword); // Guardar la contraseña hasheada
            $stament->bindParam(":rol", $rol); // Guardar la contraseña hasheada
            return ($stament->execute()) ? $this->connection->lastInsertId() : false;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function obtenerDatosTablaCompra($id_usuario)
    {
        $stament = $this->connection->prepare("SELECT * FROM compras WHERE id_usuario = :id_usuario");
        $stament->bindParam(":id_usuario", $id_usuario);
        $stament->execute();
        return $stament->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerDatosTablaALquiler($id_usuario)
    {
        $stament = $this->connection->prepare("SELECT * FROM alquileres WHERE id_usuario = :id_usuario");
        $stament->bindParam(":id_usuario", $id_usuario);
        $stament->execute();
        return $stament->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarAlquiler($id_alquiler)
    {
        $query = "DELETE FROM alquileres WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id_alquiler);
        $stmt->execute();
    }

    // public function sumarCantidadDisponible($id_libro)
    // {
    //     $query = "UPDATE libros SET cantidad_disponible = cantidad_disponible + 1 WHERE id = :id";
    //     $stmt = $this->connection->prepare($query);
    //     $stmt->bindParam(':id', $id_libro);
    //     $stmt->execute();
    // }

    public function existeAlquiler($id_alquiler)
    {
        $query = "SELECT (id) FROM alquileres WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id_alquiler);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

    // public function existeLibro($id_libro)
    // {
    //     $query = "SELECT (id) FROM libros WHERE id = :id";
    //     $stmt = $this->connection->prepare($query);
    //     $stmt->bindParam(':id', $id_libro);
    //     $stmt->execute();
    //     $count = $stmt->fetchColumn();
    //     return $count > 0;
    // }
}
