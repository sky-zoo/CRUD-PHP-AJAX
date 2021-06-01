<?php
    session_start();
    include_once "../constantes.php";

    if(isset($_SESSION)){
        session_unset();
        session_destroy();

        header("Location: ". URL_PAGINA);
        exit();
        
    }else{
        header("Location: " . URL_PAGINA);
        exit();
    }

    


?>