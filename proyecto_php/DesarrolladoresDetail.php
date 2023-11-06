<?php
require_once "_php/_DAO.php";
$id = $_REQUEST["id"];
$desarrollador = DAO::selectDesarrolladorById($id);
$videojuegos = DAO::selectAllVideojuegosByDesarrollador($id);
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name= "description" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información sobre el desarrollador</title>
    <link rel="stylesheet" href="css/Crud.css">
    <script src="js/Common.js"></script>
</head>
<body>
    <header>
        <h1>Información sobre el desarrollador</h1>
    </header>
    <main>
        <p>Nombre: <?=$desarrollador->getNombre()?></p>
        <p>País: <?=$desarrollador->getPais()?></p>
        <h2>Videojuegos desarrollados</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Género</th>
            </tr>
            <?php foreach ($videojuegos as $videojuego) { ?>
                <tr>
                    <td><?=$videojuego->getNombre()?></td>
                    <td><?=$videojuego->getGenero()->getNombre()?></td>
                </tr>
            <?php } ?>
        </table><br><br>
        <a href="DesarrolladoresIndex.php" class="back"><img src="img/back_icon.png" alt="Volver"></a>
    </main>
</body>
</html>