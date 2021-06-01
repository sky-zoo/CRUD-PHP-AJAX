<?php
    session_start();

    if(count($_SESSION) == 0){
        header("Location: ". URL_PAGINA);
        exit();
    }

    require_once "funciones.php";

    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $id_usuario = $_SESSION["id"];

    $conexion = conectarBBDD();
    $query = "INSERT INTO tareas(titulo, descripcion, id_usuario) VALUES(?, ?, ?);";

    $consulta = $conexion->prepare($query);
    $consulta->execute([$titulo, $descripcion, $id_usuario]);

    header("Location: ". URL_PAGINA);
    exit();

?>