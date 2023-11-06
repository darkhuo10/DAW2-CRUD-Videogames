<?php
require_once "_php/_DAO.php";
$desarrolladores = DAO::selectAllDesarrolladores();
$generos = DAO::selectAllGeneros();

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name= "description" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/Crud.css">
</head>
<body>
    <header>
        <h1>Videojuego</h1>
    </header>
    <main>
        <form method='post' action='VideojuegosStore.php'>
            <label for="nombre">Nombre: </label>
            <input type='text' id='nombre' name='nombre' value='' placeholder="Nombre"><br>
            <label for='descripcion'>Descripción: </label>
            <input type='text' id='descripcion' name='descripcion' value='' placeholder="Descripción"><br>
            <label for="favorito">Favorito:</label>
            <input type="checkbox" id="favorito" name="favorito" value="1"><br>
            <label for="idDesarrollador">Desarrollador: </label>
            <select name="idDesarrollador" id="idDesarrollador">
                <?php foreach ($desarrolladores as $desarrollador) { ?>
                    <option value="<?=$desarrollador->getId()?>"><?=$desarrollador->getNombre()?></option>
                <?php } ?>
            </select><br>
            <label for="idGenero">Género: </label>
            <select name="idGenero" id="idGenero">
                <?php foreach ($generos as $genero) { ?>
                    <option value="<?=$genero->getId()?>"><?=$genero->getNombre()?></option>
                <?php } ?>
            </select><br><br>
            <div class="div-buttons">
                <input type="submit" name='actualizar' value="Guardar">
                <a href="VideojuegosIndex.php" class="back"><img src="img/back_icon.png" alt="Volver"></a>
            </div>
        </form>
    </main>
</body>
</html>