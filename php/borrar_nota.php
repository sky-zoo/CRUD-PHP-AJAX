<?php

    session_start();
    include_once "../constantes.php";

    if(count($_SESSION) == 0){
        header("Location: ". URL_PAGINA);
        exit();
    }
    require_once "funciones.php";

    $conexion = conectarBBDD();
    $query = "DELETE FROM tareas WHERE id = ?";

    $consulta = $conexion->prepare($query);
    $consulta->execute([$_GET["id"]]);

    header("Location: ". URL_PAGINA);
    exit();

?>