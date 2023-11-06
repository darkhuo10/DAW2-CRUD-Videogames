<?php
require_once "_php/_DAO.php";
require_once "_php/_Redirect.php";
$exists = isset($_REQUEST["id"]);
if (!$exists) {
    $desarrollador = DAO::insertDesarrollador($_REQUEST["nombre"],$_REQUEST["pais"]);
} else {
    $desarrollador = new Desarrollador($_REQUEST["id"], $_REQUEST["nomrbe"], $_REQUEST["descripcion"]);
    $desarrollador = DAO::updateDesarrollador($desarrollador);
}
redirectTo("DesarrolladoresIndex.php?messageCode=2");