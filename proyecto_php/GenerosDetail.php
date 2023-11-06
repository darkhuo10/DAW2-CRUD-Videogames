<?php
require_once "_php/_DAO.php";
$id = $_REQUEST["id"];
$genero = DAO::selectGeneroById($id);
$videojuegos = DAO::selectAllVideojuegosByGenero($id);
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name= "description" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de los géneros</title>
    <link rel="stylesheet" href="css/Crud.css">
    <script src="js/Common.js"></script>
</head>
<body>
    <header>
        <h1>Información de los géneros</h1>
    </header>
    <main>
        <p>Nombre: <?=$genero->getNombre()?></p>
        <p>Descripción: <?=$genero->getDescripcion()?></p>
        <h2>Videojuegos del género</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Desarrollador</th>
            </tr>
            <?php foreach ($videojuegos as $videojuego) { ?>
                <tr>
                    <td><?=$videojuego->getNombre()?></td>
                    <td><?=$videojuego->getDesarrollador()->getNombre()?></td>
                </tr>
            <?php } ?>
        </table><br><br>
        <a href="GenerosIndex.php" class="back"><img src="img/back_icon.png" alt="Volver"></a>
    </main>
</body>
</html>