<?php

    session_start();
    
    if(count($_SESSION) == 0){
        header("Location: ". URL_PAGINA);
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
<body onload="mostrarNotas()">
    <!-- IMPLEMENTAR UN DETECTOR DE SI UN MAIL YA ESTA EN USO CON AJAX -->
    <?php
    
        require_once RUTA_NAVBAR;
    
    ?>

    <div class="container">
        <div class="jumbotron text-center">
            <h1>Tus Tareas</h1>
        </div>

        <div class="jumbotron">
            <div id="tabla" class="container">
            </div>
        </div>
    </div>
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>

    
    
    const borrar = (elemento)=>{
        let xhr = new XMLHttpRequest();
        let id = elemento.getAttribute("id");
        
        xhr.onreadystatechange = function(){

            if(this.readyState == 4 && this.status == 200){
                mostrarNotas();
            }

        }        

        xhr.open("POST", `php/borrar_nota.php?id=${id}` , true);
        xhr.send();

    }

    
    const mostrarNotas = ()=>{

        let xhr = new XMLHttpRequest();
        let tabla = document.getElementById("tabla");

        let notas;

        xhr.onreadystatechange = function(){
            
            if(this.readyState == 4 && this.status == 200){
                notas = JSON.parse(this.responseText);
                let numeroFila = 0;
                

                if(notas.length == 0){
                    tabla.innerHTML = `<h2 class="text-center">No tenés ninguna tarea todavía</h2>`;
                
                }else{

                    tabla.innerHTML = "";
                    
                    for(let i = 0; i < notas.length; i++){

                        if(i % 4 == 0){
                            // Si no hay una fila, entonces creo una
                            numeroFila++;
                            tabla.innerHTML += `<div id=${numeroFila} class="row">
                                                    <div class="col-md-3">
                                                        <div class="panel panel-primary">

                                                            <div id="titulo" class="panel-heading text-center" style="word-wrap: break-word;">
                                                                
                                                            </div>
                                    
                                                            <div id="descripcion" class="panel-body text-justify" style="word-wrap: break-word;">
                                                                
                                                            </div>

                                                            <div>
                                                        
                                                                <div class="text-center bg-info">
                                                                    <a href="pagina_editar_nota.php?id=${notas[i]["id"]}">Editar</a>
                                                                </div>

                                                                <div class="text-center bg-danger">
                                                                    <a id=${notas[i]["id"]} onclick="borrar(this)">Borrar</a>
                                                                </div>
                                                        
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>`;
                            let contenedorTitulo = document.getElementById("titulo");
                            let contenedorDescripcion = document.getElementById("descripcion");

                            contenedorTitulo.textContent = notas[i]["titulo"];
                            contenedorDescripcion.textContent = notas[i]["descripcion"];                                                

                        }else{
                            // Si hay una fila, entonces relleno las filas poniendo notas
                            let filaAInsertar = document.getElementById(`${numeroFila}`);
                            filaAInsertar.innerHTML += `<div class="col-md-3">
                                                            <div class="panel panel-primary">
                                                                <div id="titulo" class="panel-heading text-center" style="word-wrap: break-word;">
                                                                    
                                                                </div>
                                            
                                                                <div id="descripcion" class="panel-body text-justify" style="word-wrap: break-word;">
                                                                    
                                                                </div>

                                                                <div>
                                                                
                                                                    <div class="text-center bg-info">
                                                                        <a href="pagina_editar_nota.php?id=${notas[i]["id"]}">Editar</a>
                                                                    </div>

                                                                    <div class="text-center bg-danger">
                                                                        <a id=${notas[i]["id"]} onclick="borrar(this)">Borrar</a>
                                                                    </div>
                                                            
                                                                </div>

                                                            </div>
                                                        </div>`;
                            let contenedorTitulo = document.getElementById("titulo");
                            let contenedorDescripcion = document.getElementById("descripcion");


                            contenedorTitulo.textContent = notas[i]["titulo"];
                            contenedorDescripcion.textContent = notas[i]["descripcion"];


                        }

                    }

                }
                
            }

        }

        xhr.open("GET", "php/mostrar_notas.php", true);
        xhr.send();
    }

</script>
</html>