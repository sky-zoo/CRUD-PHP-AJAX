<?php

    session_start();

    if(count($_SESSION) == 0){
        header("Location: http://localhost/CRUD%20AJAX%20PHP/notas.php");
        exit();
    }

    require_once "php/funciones.php";
    require_once "constantes.php";

    $conexion = conectarBBDD();
    $query = "SELECT * FROM tareas WHERE id = ?";
    
    $consulta = $conexion->prepare($query);
    $consulta->execute([$_GET["id"]]);

    $resultado = $consulta->fetch();

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

   <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="jumbotron">
                    <h1 class="text-center">Editar Nota</h1>
                    
                    <form action="php/editar_nota.php?id=<?php echo $resultado["id"]; ?>" method="post">

                        

                        <div class="form-group">
                            <label for="titulo">Titulo: </label>
                            <input type="text" value="<?php echo $resultado["titulo"] ; ?>" class="form-control" id="titulo" name="titulo">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción: </label>
                            <textarea name="descripcion" style="resize: none;" class="form-control" id="descripcion" rows="15"><?php echo $resultado["descripcion"] ?></textarea>
                        </div>
                    
                        <div class="container-fluid text-center">
                            <button id="enviar" type="submit" class="btn btn-default text-center" name="enviar">
                                Actualizar Nota
                            </button>
                        </div>

                    </form>

                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>

    </div>
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>