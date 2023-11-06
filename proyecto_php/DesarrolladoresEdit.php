<?php
require_once "_php/_DAO.php";
$id = $_REQUEST["id"];
$code = $_REQUEST["messageCode"] ?? -1;

$desarrollador = DAO::selectDesarrolladorById($id);
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name= "description" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar desarrollador</title>
    <link rel="stylesheet" href="css/Crud.css">
    <script src="js/Common.js"></script>
</head>
<body>
    <header>
        <h1>Editar desarrollador</h1>
    </header>
    <main>
        <form method='post' action='DesarrolladoresUpdate.php'>
            <input type='hidden' name='id' value='<?=$id?>'>
            <label for="nombre">Nombre: </label>
            <input type='text' id='nombre' name='nombre' value='<?=$desarrollador->getNombre()?>' placeholder="Nombre"><br>

            <label for='pais'>País: </label>
            <input type='text' id='pais' name='pais' value='<?=$desarrollador->getPais()?>' placeholder="País"><br>
            <div class="div-buttons">
                <input type="submit" name='actualizar' value="Guardar">
                <a href="DesarrolladoresIndex.php" class="back"><img src="img/back_icon.png" alt="Volver"></a>
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