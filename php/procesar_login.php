<?php

    if(isset($_POST["enviar"])){

        require_once "funciones.php";

        $conexion = conectarBBDD();
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        $query = "SELECT * FROM usuarios WHERE email = ?";
        $consulta = $conexion->prepare($query);

        $consulta->execute([$email]);
        $resultado = $consulta->fetch();

        if(password_verify($pass, $resultado["pass"])){
            session_start();
            $_SESSION["usuario"] = $resultado["usuario"];
            $_SESSION["id"] = $resultado["id"];
            header("Location: http://localhost/CRUD%20AJAX%20PHP/notas.php");
            exit();

        }
        else if($resultado == false){
            header("Location: http://localhost/CRUD%20AJAX%20PHP/login.php");
            exit();
        }
        else{
            header("Location: http://localhost/CRUD%20AJAX%20PHP/login.php");
            exit();
        }

        

    }else{
        header("Location: http://localhost/CRUD%20AJAX%20PHP/");
        exit();
    }

?>