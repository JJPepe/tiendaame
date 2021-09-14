<?php
    session_start();
    session_destroy();

    echo "
            <html>
                <head>

                <!--Fuente de texto externa Allura-->
                <link href=\"https://fonts.googleapis.com/css2?family=Allura&display=swap\" rel=\"stylesheet\">

                    <link rel=\"STYLESHEET\" type=\"text/css\" href=\"../css/estilos.css\">
                    <link href=\"../CSS/style.css\" rel=\"stylesheet\">
                </head>
                
                <body>

                    <header> 
                        <div class=\"barramenu\">              
                            <div class=\"imagenlogo\">
                                <img src=\"../imagenes/logo.png\">
                            </div>  
                        </div> 
                    </header>

                    <hr>

                    <center>
                        <div class=\"contenido\">

                            <div class=\"espacio\"><!--Espacio--></div>
                            
                            <div class=\"formulario contenedorForm\">
                                <div class=\"actualizarAdmin\">
                                    <label class=\"mensajesOKsql\">
                                    <h1>¡Gracias por visitarnos!</h1>
                                    <h2>Vuelve pronto...</h2>
                                    <label>
                                </div>
                            </div>
                        </div>
                    <center>
                </body>
            </html>";

    header("Refresh:3; ../html/index.html");
    exit();
?>