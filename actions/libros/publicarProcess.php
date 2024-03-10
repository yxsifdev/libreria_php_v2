<?php
require_once("../../controllers/librosController.php");
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$descripcion = $_POST['descripcion'];
$cantidad_total = 100;
$cantidad_disponible = 100;

if ($cantidad_total > 100) {
    $cantidad_total = 100;
}

if ($cantidad_disponible > 100) {
    $cantidad_disponible = 100;
}

$obj = new LibroController();
$obj->publicarLibro($titulo, $autor, $genero, $descripcion, $cantidad_total, $cantidad_disponible);

// 

$jsonFile = '../../assets/json/libros.json';
$jsonData = file_get_contents($jsonFile);
$data = json_decode($jsonData, true);

$highestId = 0;
if(isset($data['libros']) && is_array($data['libros'])){
    foreach($data['libros'] as $book){
        if(isset($book['id']) && $book['id'] > $highestId) {
            $highestId = $book['id'];
        }
    }
}

$newBookId = $highestId +1;

$newBook = [
    'id' => $newBookId,
    'cantidad_total' => $cantidad_total,
    'cantidad_disponible' => $cantidad_total,
    'titulo' => $titulo,
    'autor' => $autor,
    'genero' => $genero,
    'descripcion' => $genero,
    'disponible' => 1,
    'estrellas' => "4.6/5",
    'portada' => $_POST ['portada'] ? $_POST['portada'] : "../../assets/imgs/libros/book-not-found.webp"
];

$data['libros'][] = $newBook;

$newJsonData = json_encode($data, JSON_PRETTY_PRINT);

file_put_contents($jsonFile, $newJsonData);

header("Location: ../../views/pages/libros.php");
exit();
