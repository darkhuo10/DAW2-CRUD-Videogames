<?php
require_once "_php/_DAO.php";
$videojuegos = DAO::selectAllVideojuegos();
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
    <title>Videojuegos</title>
</head>
<body>
    <header>
        <h1>Videojuegos</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Favorito</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php foreach ($videojuegos as $videojuego) { ?>
                <tr>
                    <td><a href="VideojuegosDetail.php?id=<?=$videojuego->getId()?>"><?=$videojuego->getNombre()?></a></td>

                    <td>
                    <?php if ($videojuego->getFavorito() == 1) { ?>
                        <a href='VideojuegosSetFavorito.php?id=<?=$videojuego->getId()?>&setFavValue=0'><img src="img/favourite_icon.png" alt="Favorito"></a>
                    <?php } else { ?>
                        <a href='VideojuegosSetFavorito.php?id=<?=$videojuego->getId()?>&setFavValue=1'><img src="img/not_favourite_icon.png" alt="No favorito"></a>
                    <?php } ?>
                    </td>
                    <td><a href="VideojuegosEdit.php?id=<?=$videojuego->getId()?>"><img src="img/edit_icon.png" alt="Editar"></a></td>
                    <td><a href="VideojuegosDelete.php?id=<?=$videojuego->getId()?>"><img src="img/delete_icon.png" alt="Eliminar"></a></td>
                </tr>
            <?php } ?>
        </table><br><br>
        <div class="div-buttons">
            <button id="videojuegos-crear">Nuevo videojuego</button>
            <a href="index.html" class="back"><img src="img/back_icon.png" alt="Volver"></a>
        </div>
    </main>
    <script>
        <?php if ($code == 1) {?>
        notifyUser("Se han actualizado los datos del videojuego")
        <?php } else if ($code == 2) {?>
        notifyUser("Se ha añadido el videojuego a la base de datos")
        <?php } else if ($code == 3) {?>
        notifyUser("Se ha eliminado el videojuego a la base de datos")
        <?php } ?>
    </script>
</body>
</html>