<?php
require_once "_php/_DAO.php";
$videojuegos = DAO::selectAllFavouriteVideojuegos();
$code = $_REQUEST["messageCode"] ?? -1;
$id = $_REQUEST["id"] ?? -1;
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name= "description" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Crud.css">
    <script src="js/Common.js"></script>
    <script src="js/Videojuegos.js"></script>
    <title></title>
</head>
<body>
    <header>
        <h1>Videojuegos</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Desarrollador</th>
                <th>Género</th>
            </tr>
            <?php foreach ($videojuegos as $videojuego) { ?>
                <tr>
                    <td><?=$videojuego->getNombre()?></td>
                    <td><?=$videojuego->getDesarrollador()->getNombre()?></td>
                    <td><?=$videojuego->getGenero()->getNombre()?></td>
                </tr>
            <?php } ?>
        </table><br><br>
        <div class="div-buttons">
            <a href="index.html" class="back"><img src="img/back_icon.png" alt="Volver"></a>
        </div>
    </main>
</body>
</html>