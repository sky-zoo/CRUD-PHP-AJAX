<?php

    session_start();

    if(count($_SESSION) == 0){
        header("Location: http://localhost/CRUD%20AJAX%20PHP/");
        exit();
    }
    require_once "funciones.php";

    $conexion = conectarBBDD();
    $query = "DELETE FROM tareas WHERE id = ?";

    $consulta = $conexion->prepare($query);
    $consulta->execute([$_GET["id"]]);

    header("Location: http://localhost/CRUD%20AJAX%20PHP/");
    exit();

?>