CREATE TABLE IF NOT EXISTS `usuarios` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(50) NOT NULL,
    `apellido` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` CHAR(8) NOT NULL,
    `rol` VARCHAR(20) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cantidad_total INT NOT NULL,
    cantidad_disponible INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    genero VARCHAR(100),
    descripcion TEXT,
    disponible BOOLEAN DEFAULT true
) ENGINE=InnoDB;

CREATE TABLE compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_libro INT NOT NULL,
    fecha_compra DATE NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_libro) REFERENCES libros(id)
) ENGINE=InnoDB;

CREATE TABLE alquileres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_libro INT NOT NULL,
    fecha_alquiler DATE NOT NULL,
    fecha_devolucion DATE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_libro) REFERENCES libros(id)
) ENGINE=InnoDB;


INSERT INTO libros (cantidad_total, cantidad_disponible, titulo, autor, genero, descripcion, disponible)
VALUES 
(100, 100, 'Cien años de soledad', 'Gabriel García Márquez', 'Realismo mágico, novela histórica, literatura latinoamericana', '"Cien años de soledad" es una obra maestra del realismo mágico que narra la historia de la familia Buendía a lo largo de varias generaciones en el ficticio pueblo de Macondo. Esta novela épica explora temas de amor, soledad, poder y destino a través de un lenguaje deslumbrante y una narrativa envolvente.', true),
(100, 100, '1984', 'George Orwell', 'Distopía, ficción política, literatura clásica', '"1984" es una novela distópica que presenta un mundo totalitario donde el gobierno controla todos los aspectos de la vida de sus ciudadanos. Winston Smith, el protagonista, lucha contra la opresión del régimen y la manipulación de la verdad en un mundo dominado por el Gran Hermano.', true),
(100, 100, 'El señor de los anillos', 'J.R.R. Tolkien', 'Fantasía épica, literatura clásica, aventura', '"El señor de los anillos" es una trilogía que sigue las aventuras de Frodo Bolsón y su misión para destruir el Anillo Único, que puede conceder un poder inmenso a su portador y que el Señor Oscuro Sauron busca recuperar para sumir a la Tierra Media en la oscuridad.', true),
(100, 100, 'Orgullo y prejuicio', 'Jane Austen', 'Novela romántica, literatura clásica, comedia de costumbres', '"Orgullo y prejuicio" es una novela que sigue la historia de Elizabeth Bennet y su relación con el orgulloso y reservado Sr. Darcy. Ambientada en la Inglaterra rural del siglo XIX, la novela de Austen explora temas de matrimonio, clase social y el poder del amor verdadero.', true),
(100, 100, 'Harry Potter y la piedra filosofal', 'J.K. Rowling', 'Fantasía, literatura juvenil, aventura', '"Harry Potter y la piedra filosofal" es el primer libro de la famosa serie de J.K. Rowling que sigue las aventuras del joven mago Harry Potter mientras asiste a la escuela de magia Hogwarts. La historia comienza con la llegada de Harry al mundo de la magia y su descubrimiento de su destino como el "Niño que vivió".', true),
(100, 100, 'El amor en los tiempos del cólera', 'Gabriel García Márquez', 'Realismo mágico, novela romántica, literatura latinoamericana', '"El amor en los tiempos del cólera" es una historia de amor épica que sigue la vida de Florentino Ariza y Fermina Daza a lo largo de más de cincuenta años. Ambientada en Colombia, esta novela de García Márquez explora los temas del amor, la pasión y la perseverancia en medio de una epidemia de cólera.', true),
(100, 100, 'Crónica de una muerte anunciada', 'Gabriel García Márquez', 'Realismo mágico, novela corta, literatura latinoamericana', '"Crónica de una muerte anunciada" narra la historia de un asesinato en un pueblo caribeño donde todos saben que va a ocurrir, pero nadie hace nada para evitarlo. Con una estructura narrativa no lineal, esta novela corta de García Márquez explora la naturaleza de la culpa, la violencia y el destino.', true),
(100, 100, 'Matar a un ruiseñor', 'Harper Lee', 'Ficción clásica, novela judicial, literatura estadounidense', '"Matar a un ruiseñor" es una novela clásica que aborda temas de raza, injusticia y moralidad en el sur de Estados Unidos durante la Gran Depresión. La historia está narrada por Scout Finch, una niña que observa cómo su padre, el abogado Atticus Finch, defiende a un hombre negro acusado falsamente de violar a una mujer blanca.', true),
(100, 100, 'Don Quijote de la Mancha', 'Miguel de Cervantes', 'Novela de caballería, sátira, literatura clásica', '"Don Quijote de la Mancha" es una obra maestra de la literatura universal que sigue las aventuras del caballero Don Quijote y su fiel escudero Sancho Panza. La novela de Cervantes es una sátira de las novelas de caballería de la época y una reflexión sobre la realidad y la fantasía.', true),
(100, 100, 'Los miserables', 'Victor Hugo', 'Novela histórica, drama, literatura clásica', '"Los miserables" es una épica novela que sigue la vida de varios personajes durante un período tumultuoso de la historia francesa. La historia principal gira en torno a Jean Valjean, un exconvicto que busca redención, y su enfrentamiento con el implacable inspector Javert. La novela de Hugo aborda temas de justicia social, redención y el poder del amor.', true);