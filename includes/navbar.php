<nav class="navbar navbar-inverse" style="border-radius: 0 !important;">

    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo URL_PAGINA;?>">
                Inicio
            </a>
            
        </div>

        

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <?php

                    if(isset($_SESSION["usuario"])){
                        echo '<li>
                                <p class="navbar-text">¡Hola '. $_SESSION["usuario"] .'!</p>
                              </li>

                              <li>
                                <a href="'. URL_PAGINA .'pagina_crear_nota.php">
                                    Crear nota
                                </a>
                              </li>

                              <li>
                                <a href="'. URL_PAGINA .'php/cerrar_sesion.php">
                                    Cerrar sesión
                                </a>
                              </li>';
                    }else{

                        echo '<li>
                                <a href="'. URL_PAGINA .'registro.php">
                                    Registrate
                                </a>
                              </li>

                              <li>
                                <a href="' URL_PAGINA'>login.php">
                                    Iniciar Sesion
                                </a>
                              </li>';
                        
                    }
                
                ?>

            </ul>
        </div>

    </div>

</nav>