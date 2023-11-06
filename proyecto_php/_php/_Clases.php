<?php

trait Identificable
{
    protected int $id;
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}
class Desarrollador implements JsonSerializable
{
    use Identificable;
    private string $nombre, $pais;

    public function __construct(int $id,string $nombre, string $pais)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->pais = $pais;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getPais(): string
    {
        return $this->pais;
    }

    public function setPais(string $pais): void
    {
        $this->pais = $pais;
    }


    public function jsonSerialize()
    {
        return [
            "id_desarrollador"=> $this->id,
            "nombre_desarrollador"=> $this->nombre,
            "pais_desarrollador"=> $this->pais,
        ];
    }
}


class Genero implements JsonSerializable
{
    use Identificable;
    private string $nombre, $descripcion;

    public function __construct(int $id, string $nombre, string $descripcion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }


    public function jsonSerialize()
    {
        return [
            "id_genero"=> $this->id,
            "nombre_genero"=> $this->nombre,
            "descripcion_genero"=> $this->descripcion,
        ];
    }
}


class Videojuego implements JsonSerializable
{
    use Identificable;
    private int $idGenero, $idDesarrollador, $favorito;
    private string $nombre, $descripcion;
    private ?Genero $genero = null;
    private ?Desarrollador $desarrollador = null;


    public function __construct(int $id, int $idGenero, int $idDesarrollador, int $favorito, string $nombre, string $descripcion)
    {
        $this->id = $id;
        $this->idGenero = $idGenero;
        $this->idDesarrollador = $idDesarrollador;
        $this->favorito = $favorito;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIdGenero(): int
    {
        return $this->idGenero;
    }

    public function setIdGenero(int $idGenero): void
    {
        $this->idGenero = $idGenero;
    }

    public function getIdDesarrollador(): int
    {
        return $this->idDesarrollador;
    }

    public function setIdDesarrollador(int $idDesarrollador): void
    {
        $this->idDesarrollador = $idDesarrollador;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getFavorito(): int
    {
        return $this->favorito;
    }

    public function setFavorito(int $favorito): void
    {
        $this->favorito = $favorito;
    }


    public function getDesarrollador() :Desarrollador
    {
        if ($this->desarrollador == null) {
            $desarrollador = DAO::selectDesarrolladorById($this->idDesarrollador);
        }
        return $desarrollador;
    }
    public function getGenero() :Genero
    {
        if ($this->genero == null) {
            $genero = DAO::selectGeneroById($this->getIdGenero());
        }
        return $genero;
    }

    public function jsonSerialize()
    {
        return [
            "id"=> $this->id,
            "nombre"=> $this->nombre,
            "descripcion"=> $this->descripcion,
            "idGenero"=> $this->genero != null ? $this->genero : $this->idGenero,
            "idDesarrollador"=> $this->desarrollador != null ? $this->desarrollador : $this->idDesarrollador,
        ];
    }
}