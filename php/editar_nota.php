<?php

    session_start();

    if(count($_SESSION) == 0){
        header("Location: ". URL_PAGINA);
        exit();
    }

    require_once "funciones.php";

    $conexion = conectarBBDD();
    $query = "UPDATE tareas SET titulo = ?, descripcion = ? WHERE id = ?";

    $consulta = $conexion->prepare($query);
    $consulta->execute([$_POST["titulo"], $_POST["descripcion"], $_GET["id"] ]);


    header("Location: ". URL_PAGINA);
    exit();

?>