<?php
require_once "_php/_DAO.php";
require_once "_php/_Redirect.php";
$id = $_REQUEST["id"];
$correcto = DAO::deleteGeneroById($id);
if ($correcto) redirectTo("GenerosIndex.php?messageCode=3");