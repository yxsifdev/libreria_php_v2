<?php
// models/LibroModel.php

class LibroModel
{
    private $connection;

    public function __construct()
    {
        require_once("../../config/connect.php");
        $db = new DB();
        $this->connection = $db->connection();
    }

    public function publishBook($titulo, $autor, $genero, $descripcion, $cantidad_total, $cantidad_disponible)
    {
        try {
            $query = "INSERT INTO libros (titulo, autor, genero, descripcion, cantidad_total, cantidad_disponible) VALUES (:titulo, :autor, :genero, :descripcion, :cantidad_total, :cantidad_disponible)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':autor', $autor);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':cantidad_total', $cantidad_total);
            $stmt->bindParam(':cantidad_disponible', $cantidad_disponible);
            $stmt->execute();
    
            return "¡Libro publicado con éxito!";
        } catch (PDOException $e) {
            return "Error al publicar el libro";
        }
    }
    

    public function getAllLibros()
    {
        $query = "SELECT * FROM libros";
        $stmt = $this->connection->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLibroById($id)
    {
        $query = "SELECT * FROM libros WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function comprarLibro($idLibro, $idUsuario)
    {
        try {
            // Comienza una transacción
            $this->connection->beginTransaction();

            // Actualiza la disponibilidad del libro
            $query = "UPDATE libros SET cantidad_disponible = cantidad_disponible - 1 WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $idLibro);
            $stmt->execute();

            // Inserta un registro en la tabla de alquileres
            $query = "INSERT INTO compras (id_libro, id_usuario, fecha_compra) VALUES (:id_libro, :id_usuario, NOW())";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id_libro', $idLibro);
            $stmt->bindParam(':id_usuario', $idUsuario);
            $stmt->execute();

            // Confirma la transacción
            $this->connection->commit();

            return "¡Compra realizada con éxito para el libro con ID: $idLibro!";
        } catch (PDOException $e) {
            // En caso de error, revierte la transacción
            $this->connection->rollback();
            return "Error al procesar la compra del libro con ID: $idLibro";
        }
    }

    public function alquilarLibro($idLibro, $idUsuario, $fechaDevolucion)
    {
        try {
            // Comienza una transacción
            $this->connection->beginTransaction();

            // Actualiza la disponibilidad del libro
            $query = "UPDATE libros SET cantidad_disponible = cantidad_disponible - 1 WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $idLibro);
            $stmt->execute();

            // Inserta un registro en la tabla de alquileres
            $query = "INSERT INTO alquileres (id_libro, id_usuario, fecha_alquiler, fecha_devolucion) VALUES (:id_libro, :id_usuario, NOW(), :fecha_devolucion)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id_libro', $idLibro);
            $stmt->bindParam(':id_usuario', $idUsuario);
            $stmt->bindParam(':fecha_devolucion', $fechaDevolucion);
            $stmt->execute();

            // Confirma la transacción
            $this->connection->commit();

            return "¡Alquiler realizado con éxito para el libro con ID: $idLibro!";
        } catch (PDOException $e) {
            // En caso de error, revierte la transacción
            $this->connection->rollback();
            return "Error al procesar el alquiler del libro con ID: $idLibro";
        }
    }
}
