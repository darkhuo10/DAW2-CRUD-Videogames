<?php
require_once "_php/_DAO.php";
$id = $_REQUEST["id"];
$videojuego = DAO::selectVideojuegoById($id);
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name= "description" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del videojuego</title>
    <link rel="stylesheet" href="css/Crud.css">
    <script src="js/Common.js"></script>
</head>
<body>
    <header>
        <h1>Información del videojuego</h1>
    </header>
    <main>
        <p>Nombre: <?=$videojuego->getNombre()?></p>
        <p>Descripción: <?=$videojuego->getDescripcion()?></p>
        <p>Desarrollador: <?=$videojuego->getDesarrollador()->getNombre()?></p>
        <p>Género: <?=$videojuego->getGenero()->getNombre()?></p>
        <p>Favorito: <?=$videojuego->getFavorito() == 1 ? '<img src="img/favourite_icon.png" alt="Favorito">' : '<img src="img/not_favourite_icon.png" alt="No favorito">' ?></p>
        <div id="videojuegos-fav"></div>
        <a href="VideojuegosIndex.php" class="back"><img src="img/back_icon.png" alt="Volver"></a>
    </main>
</body>
</html>