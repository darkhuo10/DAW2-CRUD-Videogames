<?php
require_once "_php/_DAO.php";
require_once "_php/_Redirect.php";
$desarrollador = new Desarrollador($_REQUEST["id"],$_REQUEST["nombre"], $_REQUEST["pais"]);
$correcto = DAO::updateDesarrollador($desarrollador);
if ($correcto) {
    redirectTo("DesarrolladoresIndex.php?messageCode=1");
} else {
    redirectTo("DesarrolladoresEdit.php?messageCode=4&id=" . $desarrollador->getId());
}