<?php
require_once("../../models/userModel.php");

class UserController
{
    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function login($email, $password)
    {
        // Verificar las credenciales en el modelo
        return $this->model->checkLogin($email, $password);
    }

    public function register($nombre, $apellido, $email, $password, $rol)
    {
        // Crear una nueva cuenta en el modelo
        return $this->model->insertar($nombre, $apellido, $email, $password, $rol);
    }
    public function checkEmailExists($email)
    {
        // Verificar si el correo electrónico ya está registrado en el modelo
        return $this->model->checkEmailExists($email);
    }

    public function mostrarTablaCompra($id_usuario)
    {
        return $this->model->obtenerDatosTablaCompra($id_usuario);
    }
    public function mostrarTablaAlquiler($id_usuario)
    {
        return $this->model->obtenerDatosTablaAlquiler($id_usuario);
    }
    public function devolverLibro($id_alquiler)
    {
        if (!$this->model->existeAlquiler($id_alquiler)) {
            // Si no existen, no hacer nada
            return;
        }
        // Llamar al método del modelo para eliminar el alquiler
        $this->model->eliminarAlquiler($id_alquiler);

        // Llamar al método del modelo para actualizar la cantidad disponible del libro
        // $this->model->sumarCantidadDisponible($id_libro);
    }
}
