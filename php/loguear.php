<?php
    require 'conexion.php';
    session_start();

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $pagina = $_POST['pagina'];


    $q = "SELECT COUNT(*) as contar FROM cuenta WHERE correo ='$usuario' and password='$clave' and estadoReg='1'";
    $consulta = mysqli_query($conexion,$q);
    $array = mysqli_fetch_array($consulta);

    $q2 = "SELECT cli.clienteID, cli.nombre FROM CLIENTE cli
    INNER JOIN cuenta cu
    ON cli.cuentaFK = cuentaID
    WHERE cu.correo = '$usuario'";

    $consulta = mysqli_query($conexion,$q2);
    $array2 = mysqli_fetch_array($consulta);

    $id = $array2['clienteID'];
    $_SESSION['id'] = $id;

    //echo $id;

    if($array['contar'==0])
    {
        $_SESSION['username'] = $usuario;

        echo "
            <html>
                <head>

                    <link rel=\"icon\" href=\"../imagenes/logoYireh.png\" />

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
                                        <label class=\"mensajesOKsql\"><h1>Bienvenido</h1><label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <center>
                </body>
            </html>";

        header("refresh:3; ./$pagina"); // COLOCAR LA PAGINA A LA QUE QUIERE REDIRIGIR
    }
    else
    {
        echo "
            <html>
                <head>

                    <link rel=\"icon\" href=\"../imagenes/logoYireh.png\" />
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
                                    <label class=\"mensajesOKsql\"><h1>Usuario o contraseña Incorrectos</h1><label>
                                </div>
                            </div>
                        <div>
                    <center>
                </body>
            </html>"; 
        header("refresh:3; ../html/index.html");       
    }

?>