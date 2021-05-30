<?php
    session_start();
    if(isset($_SESSION)){
        session_unset();
        session_destroy();

        header("Location: http://localhost/CRUD%20AJAX%20PHP/");
        exit();
        
    }else{
        header("Location: http://localhost/CRUD%20AJAX%20PHP/");
        exit();
    }

    


?>