DROP DATABASE IF EXISTS videojuegos;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE videojuegos CHARACTER SET utf8 COLLATE utf8_general_ci;
USE videojuegos;

CREATE TABLE desarrolladores (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  pais varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL, /* El pais en el que se ecnuetra ubicado */
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO desarrolladores VALUES (1, 'LunosDev', 'España'),
                                   (2, 'Guinxu', 'España'),
                                   (3, 'Nintendo', 'Japón'),
                                   (4, 'Riot Games', 'Estados Unidos'),
                                   (5, 'Ubisoft', 'Japón');

-- --------------------------------------------------------

CREATE TABLE generos (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  descripcion text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO generos VALUES (1, 'Acción', 'Se trata de un género caracterizado por el frenetismo y una gran inmersión. Implican realizar alguna acción repetitiva como pulsar mucho ciertas combinaciones de botones para realizar un movimiento. Debido a esto, suelen exigir una alta concentración.'),
                           (2, 'Aventura', 'Este es uno de los tipos de videojuegos más importante ya que los peligros y las grandes hazañas están presentes en cada esquina. El protagonista del juego debe atravesar extensos niveles repletos de muchos enemigos y valerse de diferentes ítems para lograr sus objetivos. Suelen tener un buen argumento y una duración moderada.'),
                           (3, 'Arcade', 'Se trata de juegos sencillos que manejan elementos de poca complejidad como una aventura, laberintos o plataformas. Es necesario atravesar diferentes pantallas para avanzar. Su ritmo facilita adaptarse rápido al juego por primera vez. No suelen ser demasiado largos. Sin embargo, están diseñados para contar con una amplia rejugabilidad.'),
                           (4, 'Deportes', 'Tal y como indica su nombre, se trata de juegos basados en deportes reales como fútbol, boxeo, golf, tenis o baloncesto, entre otros. Suelen exigir habilidad y precisión.'),
                           (5, 'Estrategia', 'Estos juegos suelen manejar conceptos bélicos y de rol. Están diseñados para que el objetivo sea vencer al enemigo mediante una estrategia. Implican concentración e inteligencia.'),
                           (6, 'Simulación', 'En este género se pueden encontrar videojuegos muy variados, pues se basan en simular algún elemento de la vida real como la conducción de un coche, un avión, un tren, el trabajo de un cirujano o incluso la vida de un animal.'),
                           (7, 'Juegos de mesa', 'Se trata de los clásicos juegos de mesa de toda la vida, pero en una versión digital que se puede jugar en una consola o PC.'),
                           (8, 'Juegos musicales', 'Se trata de juegos que involucran la interacción con alguna melodía. En algunos casos involucran periféricos especiales que imitan instrumentos musicales o alfombras para bailar pisando botones.'),
                           (9, 'Puzzle', 'Se trata de juegos en los cuales se deben resolver puzzles para superar los distintos niveles.'),
                           (10, 'Otros', 'Videojuegos que no encajan en las categorías existentes actualmente.');

-- --------------------------------------------------------

CREATE TABLE videojuegos (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  descripcion text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  favorito tinyint(1) NOT NULL DEFAULT 0,
  idGenero int(11) NOT NULL,
  idDesarrollador int(11) NOT NULL,
  PRIMARY KEY(id),
  KEY fk_genero (idGenero),
  KEY fk_desarrollador(idDesarrollador)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO videojuegos VALUES
                (1, 'Skating Hazard', 'Es un juego sencillo y vertiginoso creado para la 3ª edición del gamejam "Madrid Crea". En este juego, el jugador patina por las calles alrededor de la estación de metro Sol, evitando a la gente y consiguiendo puntos al esquivarlos en el último momento. ', 0, 3, 1),
                (2, 'History Learning Tool 2020', 'Es un juego desarrollado como parte de un GameJam en el Student Gamedev Hackathon, organizado por UpSync y Core. A pesar de su apariencia, se trata de un juego. Con el tema "2020 EL JUEGO", el juego fue creado utilizando el motor de juego Core, que utiliza Lua. En este juego, el jugador se encuentra con una pista de obstáculos sencilla inspirada en varios eventos destacados de 2020, y se incorpora un toque de humor para hacer que el aprendizaje de la historia sea más entretenido.', 1, 9, 1),
                (3, 'FlatWorld', 'Es un juego en el cual se puede explorar un mundo lleno de magia, puzles y enemigos, cuyo protagonista es el más débil de los personajes.', 1, 2, 2),
                (4, 'No More Shoping', 'Es un juego en el que el jugador debe recorrer los pasillos de un supermercado comprando todos los porductos de la lista. Pero a medidad que compra productos, su familia añade más a la lista. El jugador debe comprar todos los productos para que la lista no se haga demasiado larga o explotará de la ira.', 0, 3, 2),
                (5, 'The Legend of Zelda: Tears of the Kingdom', 'Es un videojuego  de la serie The Legend of Zelda, desarrollado por Nintendo en colaboración con Monolith Soft y publicado por Nintendo para la consola Nintendo Switch.', 1, 2, 3),
                (6, 'Paper Mario: Sticker Star', 'Es la cuarta entrega de la serie Paper Mario y parte de la franquicia más grande de Mario; es el primer juego de la serie lanzado en una consola portátil (Nintendo 3DS).', 1, 9, 3),
                (7, 'League of Legends', 'Es un videojuego multijugador de arena de batalla en línea desarrollado y publicado por Riot Games. Inspirándose en Defense of the Ancients, un mapa personalizado para Warcraft III, los fundadores de Riot buscaron desarrollar un juego independiente del mismo género.', 0, 10, 4),
                (8, 'Valorant', 'Es un hero shooter en primera persona multijugador gratuito desarrollado y publicado por Riot Games.', 0, 1, 4),
                (9, 'Far Cry 3', 'Es un juego de acción y supervivencia en el trópico, creado por Ubisoft Montreal. El juego pone al jugador en el papel de Jason Brody, un turista varado en una misteriosa isla tropical aislado de la civilización. ', 0, 1, 5);

-- --------------------------------------------------------
ALTER TABLE videojuegos
  ADD CONSTRAINT fk_genero FOREIGN KEY (idGenero) REFERENCES generos (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT fk_desarrollador FOREIGN KEY (idDesarrollador) REFERENCES desarrolladores (id) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;