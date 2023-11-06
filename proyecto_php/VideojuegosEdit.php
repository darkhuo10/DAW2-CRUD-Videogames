<?php
require_once "_php/_DAO.php";
$id = $_REQUEST["id"];
$code = $_REQUEST["messageCode"] ?? -1;

$videojuego = DAO::selectVideojuegoById($id);
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
    <title>Editar videojuego</title>
    <link rel="stylesheet" href="css/Crud.css">
    <script src="js/Common.js"></script>
</head>
<body>
    <header>
        <h1>Editar videojuego</h1>
    </header>
    <main>
        <form method='post' action='VideojuegosUpdate.php'>
            <input type='hidden' name='id' value='<?=$id?>'>
            <label for="nombre">Nombre: </label>
            <input type='text' id='nombre' name='nombre' value='<?=$videojuego->getNombre()?>' placeholder="Nombre"><br>
            <label for='descripcion'>Descripción: </label>
            <input type='text' id='descripcion' name='descripcion' value='<?=$videojuego->getDescripcion()?>' placeholder="Descripción"><br>
            <label for="favorito">Favorito:</label>
            <input type="checkbox" id="favorito" name="favorito" value="1" <?php if ($videojuego->getFavorito() == 1) echo 'checked'; ?>><br>
            <label for="idDesarrollador">Desarrollador: </label>
            <select name="idDesarrollador" id="idDesarrollador">
                <?php foreach ($desarrolladores as $desarrollador) { ?>
                    <option value="<?=$desarrollador->getId()?>" <?php if ($desarrollador->getId() == $videojuego->getIdDesarrollador()) echo 'selected'; ?>>
                        <?=$desarrollador->getNombre()?>
                    </option>
                <?php } ?>
            </select><br>
            <label for="idGenero">Género: </label>
            <select name="idGenero" id="idGenero">
                <?php foreach ($generos as $genero) { ?>
                    <option value="<?=$genero->getId()?>" <?php if ($genero->getId() == $videojuego->getIdGenero()) echo 'selected'; ?>>
                        <?=$genero->getNombre()?>
                    </option>
                <?php } ?>
            </select><br>
            <div class="div-buttons">
                <input type="submit" name='actualizar' value="Guardar">
                <a href="VideojuegosIndex.php" class="back"><img src="img/back_icon.png" alt="Volver"></a>
            </div>
        </form>
    </main>
    <script>
        <?php if ($code == 4) {?>
        notifyUser("No has modificado ningún campo")
        <?php } ?>
    </script>
</body>
</html>