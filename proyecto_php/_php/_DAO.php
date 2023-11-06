<?php
require_once "_Clases.php";
class DAO
{
    private static ?PDO $connection = null;
    private static function getDBConnection() : PDO
    {
        $server = "localhost";
        $user = "root";
        $password = "";
        $db = "videojuegos";
        $options = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        try{
            $pdo = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $password, $options);
        }catch (Exception $exception){
            error_log("Error al establecer la conexión: ". $exception->getMessage());
            exit("Error al establecer la conexión: ". $exception->getMessage());
        }
        return $pdo;
    }

    private static function connect()
    {
        if (self::$connection == null) {
            self::$connection = self::getDBConnection();
        }
    }

    private static function select(string $sql, array $params) :array
    {
        self::connect();
        $select = self::$connection->prepare($sql);
        $select->execute($params);
        $rs = $select->fetchAll();
        return $rs;
    }

    private static function insert(string $sql, array $params) :?int
    {
        self::connect();
        $insert = self::$connection->prepare($sql);
        return $insert->execute($params) ? self::$connection->lastInsertId() : null;
    }

    private static function updateDelete(string $sql, array $params) :?int
    {
        self::connect();
        $sentence = self::$connection->prepare($sql);
        return $sentence->execute($params) ? $sentence->rowCount() : null;
    }


    /* Desarrollador */
    private static function createDesarrolladorFromRow (array $row) :Desarrollador
    {
        return new Desarrollador((int)$row["id"], $row["nombre"], $row["pais"]);
    }

    public static function selectDesarrolladorById(int $id) :?Desarrollador
    {
        $rs = self::select("SELECT * FROM desarrolladores WHERE id = ?", [$id]);
        if($rs) {
            $row = $rs[0];
            $dev = self::createDesarrolladorFromRow($row);
            return $dev;
        } else {
            return null;
        }
    }

    public static function selectAllDesarrolladores() :array
    {
        $rs = self::select("SELECT * FROM desarrolladores", []);
        $devs = [];
        foreach ($rs as $row) {
            $dev = self::createDesarrolladorFromRow($row);
            array_push($devs, $dev);
        }
        return $devs;
    }

    public static function insertDesarrollador(string $nomrbe, string $pais) :?Desarrollador
    {
        $autoId = self::insert("INSERT INTO desarrolladores (nombre, pais) VALUES (?, ?)",
            [$nomrbe, $pais]);
        return $autoId != null ? self::selectDesarrolladorById($autoId) : null;
    }

    public static function updateDesarrollador(Desarrollador $desarrollador) :?Desarrollador
    {
        $updatedRows = self::updateDelete("UPDATE desarrolladores SET nombre = ?, pais = ? WHERE id = ?",
        [$desarrollador->getNombre(), $desarrollador->getPais(), $desarrollador->getId()]);
        return  $updatedRows != null ? $desarrollador : null;
    }

    public static function deleteDesarrolladorById(int $id) :bool
    {
        $deletedRows = self::updateDelete("DELETE FROM desarrolladores WHERE id = ?", [$id]);
        return ($deletedRows == 1);
    }


    /* Genero */
    private static function createGeneroFromRow (array $row) :Genero
    {
        return new Genero((int)$row["id"], $row["nombre"], $row["descripcion"]);
    }

    public static function selectGeneroById(int $id) :?Genero
    {
        $rs = self::select("SELECT * FROM generos WHERE id = ?", [$id]);
        if($rs) {
            $row = $rs[0];
            $genero = self::createGeneroFromRow($row);
            return $genero;
        } else {
            return null;
        }
    }

    public static function selectAllGeneros() :array
    {
        $rs = self::select("SELECT * FROM generos", []);
        $generos = [];
        foreach ($rs as $row) {
            $genero = self::createGeneroFromRow($row);
            array_push($generos, $genero);
        }
        return $generos;
    }

    public static function insertGenero(string $nombre, string $descripcion) :?Genero
    {
        $autoId = self::insert("INSERT INTO generos (nombre, descripcion) VALUES (?, ?)",
            [$nombre, $descripcion]);
        return $autoId != null ? self::selectGeneroById($autoId) : null;
    }

    public static function updateGenero(Genero $genero) :?Genero
    {
        $updatedRows = self::updateDelete("UPDATE generos SET nombre = ?, descripcion = ? WHERE id = ?",
            [$genero->getNombre(), $genero->getDescripcion(), $genero->getId()]);
        return  $updatedRows != null ? $genero : null;
    }

    public static function deleteGeneroById(int $id) :bool
    {
        $deletedRows = self::updateDelete("DELETE FROM generos WHERE id = ?", [$id]);
        return ($deletedRows == 1);
    }


    /* Videojuego */
    private static function createVideojuegoFromRow (array $row) :Videojuego
    {
        return new Videojuego((int)$row["id"],$row["idGenero"], $row["idDesarrollador"], $row["favorito"], $row["nombre"], $row["descripcion"]);
    }

    public static function selectVideojuegoById(int $id) :?Videojuego
    {
        $rs = self::select("SELECT * FROM videojuegos WHERE id = ?", [$id]);
        if($rs) {
            $row = $rs[0];
            $juego = self::createVideojuegoFromRow($row);
            return $juego;
        } else {
            return null;
        }
    }

    public static function selectAllVideojuegos() :array
    {
        $rs = self::select("SELECT * FROM videojuegos", []);
        $juegos = [];
        foreach ($rs as $row) {
            $juego = self::createVideojuegoFromRow($row);
            array_push($juegos, $juego);
        }
        return $juegos;
    }

    public static function insertVideojuego(string $nombre, string $descipcion, int $idGenero, int $idDesarrollador, int $favorito) : ?Videojuego
    {
        $autoId = self::insert("INSERT INTO videojuegos (nombre, descripcion, favorito, idGenero, idDesarrollador) VALUES (?, ?, ?, ?, ?)",
            [$nombre, $descipcion, $favorito, $idGenero, $idDesarrollador]);
        return $autoId != null ? self::selectVideojuegoById($autoId) : null;
    }

    public static function updateVideojuego(Videojuego $videojuego) :?Videojuego
    {
        $updatedRows = self::updateDelete("UPDATE videojuegos SET nombre = ?, descripcion = ?, favorito = ?, idGenero = ?, idDesarrollador = ? WHERE id = ?",
            [$videojuego->getNombre(), $videojuego->getDescripcion(), $videojuego->getFavorito(), $videojuego->getIdGenero(), $videojuego->getIdDesarrollador(), $videojuego->getId()]);
        return  $updatedRows != null ? $videojuego : null;
    }

    public static function deleteVideojuegoById(int $id) :bool
    {
        $deletedRows = self::updateDelete("DELETE FROM videojuegos WHERE id = ?", [$id]);
        return ($deletedRows == 1);
    }


    /* Select Filtrados (desarrollador, género y favorito) */
    public static function selectAllVideojuegosByDesarrollador(int $idDesarrollador) :array
    {
        $rs = self::select("SELECT * FROM videojuegos WHERE idDesarrollador = ?", [$idDesarrollador]);
        $juegos = [];
        foreach ($rs as $row) {
            $juego = self::createVideojuegoFromRow($row);
            array_push($juegos, $juego);
        }
        return $juegos;
    }

    public static function selectAllVideojuegosByGenero(int $idGenero) :array
    {
        $rs = self::select("SELECT * FROM videojuegos WHERE idGenero = ?", [$idGenero]);
        $juegos = [];
        foreach ($rs as $row) {
            $juego = self::createVideojuegoFromRow($row);
            array_push($juegos, $juego);
        }
        return $juegos;
    }

    public static function selectAllFavouriteVideojuegos() : array
    {
        $rs = self::select("SELECT * FROM videojuegos WHERE favorito = 1", []);
        $juegos = [];
        foreach ($rs as $row) {
            $juego = self::createVideojuegoFromRow($row);
            array_push($juegos, $juego);
        }
        return $juegos;
    }


    /* Set favorito */
    public static function setFavorito(int $id, int $fav): ?int
    {
        return self::updateDelete("UPDATE videojuegos SET favorito = ? WHERE id = ?", [$fav, $id]);
    }

}