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

    <div class="container">
        <div class="jumbotron">
            <h1>Lista de Tareas</h1>
            <p>
                Para guardar tus tareas,
                <a class="registro" href="#" onclick="cargarDoc(this)">
                registrate
                </a> o
                
                <a class="login" href="#" onclick="cargarDoc(this)">
                iniciá sesión
                </a>
                .
            </p>
        </div>
    </div>
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    const cargarDoc = (elemento)=>{
        let xhr = new XMLHttpRequest();
        let ruta = elemento.getAttribute("class");
        // console.log(ruta)
        xhr.onreadystatechange = function(){

            if(this.readyState == 4 && this.status == 200){
                document.body.innerHTML = this.responseText;
            }

        }

        

        xhr.open("GET", `${ruta}.php` , true);
        xhr.send();

    }
</script>
</html>