<?php

    if(isset($_POST["enviar"])){
        include_once "../constantes.php";
        require_once "funciones.php";

        $conexion = conectarBBDD();

        $query = "INSERT INTO usuarios(usuario, pass, email) VALUES(?, ?, ?);";
        $consulta = $conexion->prepare($query);


        $nombreUsuario = $_POST["usuario"];
        $email = $_POST["email"];
        $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

        $consulta->execute([$nombreUsuario, $pass, $email]);

        header("Location: ". URL_PAGINA ."login.php");
        exit();
    }else{
        header("Location: ". URL_PAGINA);
        exit();
    }




?>