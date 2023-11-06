<?php
require_once "_php/_DAO.php";
require_once "_php/_Redirect.php";
$exists = isset($_REQUEST["id"]);
if (!$exists) {
    $genero = DAO::insertGenero($_REQUEST["nombre"], $_REQUEST["descripcion"]);
} else {
    $genero = new Genero($_REQUEST["id"], $_REQUEST["nomrbe"], $_REQUEST["descripcion"]);
    $genero = DAO::updateGenero($genero);
}
redirectTo("GenerosIndex.php?messageCode=2");