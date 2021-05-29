<?php

function conectarBBDD(){
    try{

        $valores = require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD AJAX PHP/config.php";

        $opciones = [PDO::ATTR_EMULATE_PREPARES => false,
                     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

        $configuracionConexion = "mysql:host=" . $valores["nombreServidor"].
                                 ";dbname=" . $valores["nombreBBDD"] . "";

        $conexion = new PDO($configuracionConexion, $valores["nombreUsuario"], $valores["pass"], $opciones);

        return $conexion;

    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }
}

?>