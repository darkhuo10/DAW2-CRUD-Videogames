<?php
require_once "_php/_DAO.php";
require_once "_php/_Redirect.php";
$videojuego = new Videojuego($_REQUEST["id"],$_REQUEST["idGenero"], $_REQUEST["idDesarrollador"], $_REQUEST["favorito"],
    $_REQUEST["nombre"], $_REQUEST["descripcion"]);
$correcto = DAO::updateVideojuego($videojuego);
if ($correcto) {
    redirectTo("VideojuegosIndex.php?messageCode=1");
} else {
    redirectTo("VideojuegosEdit.php?messageCode=4&id=" . $videojuego->getId());
}