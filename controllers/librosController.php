<?php
// controllers/LibroController.php

require_once("../../models/librosModel.php");

class LibroController
{
    private $model;

    public function __construct()
    {
        $this->model = new LibroModel();
    }

    public function publicarLibro($titulo, $autor, $genero, $descripcion, $cantidad_total, $cantidad_disponible)
    {
        return $this->model->publishBook($titulo, $autor, $genero, $descripcion, $cantidad_total, $cantidad_disponible);
    }



    public function mostrarTodos()
    {
        return $this->model->getAllLibros();
    }

    public function mostrarLibro($id)
    {
        return $this->model->getLibroById($id);
    }
    public function comprarLibro($idLibro, $idUsuario)
    {
        return $this->model->comprarLibro($idLibro, $idUsuario);
    }


    public function alquilarLibro($idLibro, $idUsuario, $fechaDevolucion)
    {
        return $this->model->alquilarLibro($idLibro, $idUsuario, $fechaDevolucion);
    }
}
