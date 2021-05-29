<?php

    if(isset($_POST["enviar"])){

        var_dump($_POST);

        require_once "funciones.php";

        $conexion = conectarBBDD();
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        $query = "SELECT * FROM usuarios WHERE email = ?";
        $consulta = $conexion->prepare($query);

        $consulta->execute([$email]);
        $resultado = $consulta->fetch();
        echo "RESULTADO: ";
        var_dump($resultado);

        // if(count($resultado) > 0 &&){

        // }

    }

?>