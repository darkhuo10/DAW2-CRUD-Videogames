<?php
require_once "_php/_DAO.php";
$generos = DAO::selectAllGeneros();
$code = $_REQUEST["messageCode"] ?? -1;
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
    <script src="js/Generos.js"></script>
    <title>Géneros</title>
</head>
<body>
    <header>
        <h1>Géneros</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <?php foreach ($generos as $genero) { ?>
                <tr>
                    <td><a href="GenerosDetail.php?id=<?=$genero->getId()?>"><?=$genero->getNombre()?></a></td>
                    <td><a href="GenerosEdit.php?id=<?=$genero->getId()?>"><img src="img/edit_icon.png" alt="Editar"></a></td>
                    <td><a href="GenerosDelete.php?id=<?=$genero->getId()?>"><img src="img/delete_icon.png" alt="Eliminar"></a></td>
                </tr>
            <?php } ?>
        </table><br><br>
        <div class="div-buttons">
            <button id="generos-crear">Nuevo género</button>
            <a href="index.html" class="back"><img src="img/back_icon.png" alt="Volver"></a>
        </div>
    </main>
    <script>
        <?php if ($code == 1) {?>
        notifyUser("Se han actualizado los datos del género")
        <?php } else if ($code == 2) {?>
        notifyUser("Se ha añadido el género a la base de datos")
        <?php } else if ($code == 3) {?>
        notifyUser("Se ha eliminado el género a la base de datos")
        <?php } ?>
    </script>
</body>
</html>