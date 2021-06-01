<?php
    session_start();

    if(count($_SESSION) == 0){
        header("Location: http://localhost/CRUD%20AJAX%20PHP/");
        exit();
    }

    require_once "funciones.php";

    $conexion = conectarBBDD();

    $query = "SELECT * FROM tareas WHERE id_usuario = ?";
    $consulta = $conexion->prepare($query);
    $consulta->execute([$_SESSION["id"]]);

    $resultados = $consulta->fetchAll();
    $datosJSON = array();
    foreach ($resultados as $resultado) {
        $datosJSON[] = array(
            "id"=>$resultado["id"],
            "titulo"=>$resultado["titulo"],
            "descripcion"=>$resultado["descripcion"]
        );
    }
    $jsonString = json_encode($datosJSON);
    echo $jsonString;
?>