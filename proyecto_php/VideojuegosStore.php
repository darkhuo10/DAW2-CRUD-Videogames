<?php
require_once "_php/_DAO.php";
require_once "_php/_Redirect.php";
$exists = isset($_REQUEST["id"]);
if (!$exists) {
    $videojuego = DAO::insertVideojuego($_REQUEST["nombre"], $_REQUEST["descripcion"], $_REQUEST["idGenero"], $_REQUEST["idDesarrollador"], (int)$_REQUEST["favorito"]);
} else {
    $videojuego = new Videojuego($_REQUEST["id"], $_REQUEST["idGenero"], $_REQUEST["idDesarrollador"], (int)$_REQUEST["favorito"], $_REQUEST["nombre"], $_REQUEST["descripcion"]);
    $videojuego = DAO::updateVideojuego($videojuego);
}
redirectTo("VideojuegosIndex.php?messageCode=2");