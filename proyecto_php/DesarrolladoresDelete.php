<?php
require_once "_php/_DAO.php";
require_once "_php/_Redirect.php";
$id = $_REQUEST["id"];
$correcto = DAO::deleteDesarrolladorById($id);
if ($correcto) redirectTo("DesarrolladoresIndex.php?messageCode=3");