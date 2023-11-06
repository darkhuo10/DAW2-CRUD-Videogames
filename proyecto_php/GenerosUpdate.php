<?php
require_once "_php/_DAO.php";
require_once "_php/_Redirect.php";
$genero = new Genero($_REQUEST["id"],$_REQUEST["nombre"], $_REQUEST["descripcion"]);
$correcto = DAO::updateGenero($genero);
if ($correcto) {
    redirectTo("GenerosIndex.php?messageCode=1");
} else {
    redirectTo("GenerosEdit.php?messageCode=4&id=" . $genero->getId());
}