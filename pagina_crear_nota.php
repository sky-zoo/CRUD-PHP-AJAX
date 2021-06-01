<?php

    session_start();
    
    if(count($_SESSION) == 0){
        header("Location: http://localhost/CRUD%20AJAX%20PHP/");
        exit();
    }

    require_once "constantes.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <title><?php echo TITULO; ?></title>
</head>
<body>

    <?php
    
        require_once RUTA_NAVBAR;
    
    ?>

    <div class="container">
        <div class="jumbotron text-center">
            <h1>Crear Tarea</h1>
        </div>
        <div class="jumbotron">
            
            <form action="php/crear_nota.php" method="post">
                <div class="form-group">
                    <label for="titulo">Titulo de la nota: </label>
                    <input type="text" id="titulo" class="form-control" name="titulo">
                </div>

                <div class="form-group">
                    <label for="descripcion">Escribí tu nota</label>
                    <textarea name="descripcion" style="resize: none;" class="form-control" id="descripcion" rows="15"></textarea>
                </div>

                <div class="container-fluid text-center">
                    <button name="enviar" type="submit" class="btn btn-default">
                        Crear nota
                    </button>
                </div>

            </form>
        </div>
    </div>
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>