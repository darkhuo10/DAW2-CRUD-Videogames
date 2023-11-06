<?php
require_once "_php/_DAO.php";
require_once "_php/_Redirect.php";
$id = $_REQUEST["id"];
$correcto = DAO::deleteVideojuegoById($id);
if ($correcto) redirectTo("VideojuegosIndex.php?messageCode=3");