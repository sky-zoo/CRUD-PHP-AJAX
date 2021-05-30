<?php

    session_start();
    
    if(count($_SESSION) == 0){
        header("Location: http://localhost/CRUD%20AJAX%20PHP/");
        exit();
    }
    require_once "php/funciones.php";
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
    <!-- IMPLEMENTAR UN DETECTOR DE SI UN MAIL YA ESTA EN USO CON AJAX -->
    <?php
    
        require_once RUTA_NAVBAR;
    
    ?>

    <div class="container">
        <div class="jumbotron text-center">
            <h1>Tus Tareas</h1>
        </div>

        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <?php

                        $conexion = conectarBBDD();

                        $query = "SELECT * FROM tareas WHERE id_usuario = ?";
                        $consulta = $conexion->prepare($query);
                        $consulta->execute( [$_SESSION["id"] ]);
                        $resultados = $consulta->fetchAll();

                        if(count($resultados) == 0){
                            echo '<h2 class="text-center">No tenés ninguna tarea todavía.</h2>';
                        }else{

                            for($i = 0; $i < count($resultados); $i++){
                                if($i != 0 && $i % 4 == 0){
                                    // Si la nota es multiplo de 4, hace esto
                                    echo '</div>
                                        <div class="row">
                                            <div class="col-md-3">
    
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading" style="word-wrap: break-word;">
                                                        ' . $resultados[$i]["titulo"] . '
                                                    </div>
                            
                                                    <div class="panel-body text-justify" style="word-wrap: break-word;">
                                                        ' . $resultados[$i]["descripcion"] . '
                                                    </div>
    
                                                    <div>
                                                
                                                        <div class="text-center bg-info">
                                                            <a href="pagina_editar_nota.php?id='. $resultados[$i]["id"] .'">Editar</a>
                                                        </div>
    
                                                        <div class="text-center bg-danger">
                                                            <a href="php/borrar_nota.php?id='. $resultados[$i]["id"] .'">Borrar</a>
                                                        </div>
                                                
                                                    </div>
                            
                                                </div>
    
                                            </div>
                                        ';
                                }else{
                                    echo '<div class="col-md-3">
    
                                            <div class="panel panel-primary">
                                                <div class="panel-heading" style="word-wrap: break-word;">
                                                    ' . $resultados[$i]["titulo"] . '
                                                </div>
                        
                                                <div class="panel-body" style="word-wrap: break-word;">
                                                    ' . $resultados[$i]["descripcion"] . '
                                                </div>
                        
                                                <div>
                                                
                                                    <div class="text-center bg-info">
                                                        <a href="pagina_editar_nota.php?id='. $resultados[$i]["id"] .'">Editar</a>
                                                    </div>
    
                                                    <div class="text-center bg-danger">
                                                        <a href="php/borrar_nota.php?id='. $resultados[$i]["id"] .'">Borrar</a>
                                                    </div>
                                                
                                                </div>
                                            </div>
    
                                        </div>';
                                }
                            }

                        }

                    ?>
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