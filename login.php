<?php

    session_start();
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

   <div class="container-fluid">
        <div class="jumbotron">
            <h1 class="text-center">Inicio de Sesión</h1>
            
            <form action="php/procesar_login.php" method="post">

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="pass">Contraseña: </label>
                    <input type="password" class="form-control" id="pass" name="pass">
                </div>
            
                <div class="container-fluid text-center">
                    <button id="enviar" type="submit" class="btn btn-default text-center" name="enviar">
                        Iniciar Sesión
                    </button>
                </div>

            </form>

        </div>

        <div class="jumbotron">
            <p>
                ¿No tenés una cuenta?
                <a class="registro" onclick="cargarDoc(this)" href="#">Registrate acá</a>
            </p>
        </div>

    </div>
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>



</script>
</html>