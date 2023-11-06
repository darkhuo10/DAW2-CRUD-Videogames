<?php
require_once "_php/_DAO.php";
require_once "_php/_Redirect.php";
$id = $_REQUEST["id"];
$favNewValue = $_REQUEST["setFavValue"];
$correcto = DAO::setFavorito($id, $favNewValue);
if ($correcto) redirectTo("VideojuegosIndex.php");