<!DOCTYPE html>

<html lang="en">

<head>

    <!-- PARA VALIDAR LA SESION ACTIVA -->
    <?php
    require 'conexion.php';
    session_start();
    $_SESSION['username'] = $usuario;
    $datos = $_SESSION['id'];

    echo $datos;    
       

    if(!isset($usuario))
    {        
        header("location: ../html/index.html"); // REGRESA AL LOGIN SI LA SESION NO ESTA ACTIVA
    }
    else
    {
        $q = "SELECT * FROM cliente WHERE clienteID='$datos' and estadoReg='1'";
        $consulta = mysqli_query($conexion,$q);
        $array = mysqli_fetch_array($consulta);
        $nombre = $array['nombre'];
        //echo $nombre;
    }

    ?>

    

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--–Texto de la pestaña en el navegador--->
    <title>YIREH | INICIO</title>

    <!--–Fuente de texto externa Open Sans Condensed--->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&display=swap" rel="stylesheet">

    <!--–Hoja de estilos css--->
    <link rel="STYLESHEET" type="text/css" href="../css/estilos.css">

</head>


<body>
    
    <!--–Encabezado de la pagina--->
    <header id="encabezado">
        <img src="../imagenes/logo.png" width="230" height="77" alt="YIREH">  
    </header>
    
    <!--–Sección para la leyenda--->
    <section id="seccionLeyenda">
        <h2 id="leyenda">TIENDA DE ROPA DE ALTA CALIDAD</h2>
    </section>

    <!--–Barra de navegación, contiene los enlaces para las otras paginas--->
    <nav id="barraNavegacion">

        <div id="navizquierda">
            <!--–Pagina inicio--->
            <a href="index.php" class="enlacesnav">
                <img src="../imagenes/inicio.png" width="16" height="16" class="icono">INICIO</a>
                
            <!--–Pagina hombre--->
            <a href="hombre.php" class="enlacesnav">
                <img src="../imagenes/hombre.png" width="16" height="16" class="icono">HOMBRE</a>

            <!--–Pagina mujer--->
            <a href="mujer.php" class="enlacesnav">
                <img src="../imagenes/mujer.png" width="16" height="16" class="icono">MUJER</a>

            <!--–Pagina nosotros--->
            <a href="nosotros.php" class="enlacesnav">
                <img src="../imagenes/nosotros.png" width="16" height="16" class="icono">NOSOTROS</a>
            
            <!--–Pagina contacto--->
            <a href="contacto.php" class="enlacesnav">
                <img src="../imagenes/contacto.png" width="16" height="16" class="icono">CONTACTO</a>
        </div>

        <div id="navcentro">
            <!--–Espacio--->
        </div>

        <div id="navderecha">
            <!--–Formulario de registro / nuevo cliente--->
            <!--–<a href="registro.html" class="registro">
                <img src="../imagenes/registro.png" width="16" height="16" class="icono">REGISTRARSE
            </a>--->

            <!--–Formulario para inicio de sesión--->
            <!--–<a href="iniciosesion.html" class="iniciosesion">
                <img src="../imagenes/inicio.png" width="16" height="16" class="icono">INICIAR SESIÓN</a>--->
            
            <form class="formBotones" action="registro.php" method="POST">
                <button class="registroBoton" type="submit" name="pagina" value="index.html">
                    <img src="../imagenes/registro.png" width="16" height="16" class="icono">Hola <?php echo $nombre?></a>
                </button>
            </form>

            <form class="formBotones" action="../php/salir.php" method="POST">
                <button class="registroBoton" type="submit" name="pagina" value="index.html">
                    <img src="../imagenes/inicio.png" width="16" height="16" class="icono">CERRAR SESIÓN</a>
                </button>
            </form>
            
        </div>

    </nav>

    <!--–CONTENIDO--->
    <main>
        CONTENIDOOOOOOOOOOOOOOOOOOOOOO
    </main>

    <!--–Pie de pagina / navegador final--->
    <footer id="pie">

        <!--–Primera división--->
        <div class="pieizq">

            <!--–Logotipo--->
            <img src="../imagenes/logo.png" width="230" height="77" alt="YIREH">

            <!--–Leyenda--->
            <h2 id="pieleyenda">TIENDA DE ROPA DE ALTA CALIDAD</h2>
        </div>

        <!--–Segunda división--->
        <div id="piecentro">  
            <h3 class="pietextocentro">UBICACIÓN</h3>

            <img src="../imagenes/ubicacion.png" width="16" height="16">

            <p class="pieparrafo">FRANCISCO VILLA 25, LOS REYES
                <br>TULTITLÁN, ESTADO DE MÉXICO 54900</p>
        </div>

        <!--–Tercera división--->
        <div id="piederecho">

            <!--–Enlace a la pagina CONTACTO--->
            <a href="../html/contacto.html" class="enlacesnav">
                <h3 class="pietextoderecho">CONTÁCTANOS</h3></a>

            <p class="pieparrafo">TEL: ## ## ## ## ##</p>

            <!--–Iconos que redirigen a los medios de contacto--->
            <div id="contactosIconos">
                <a href="#"><img src="../imagenes/whatsapp.png" width="24" height="24" class="icono"/></a>
                <a href="#"><img src="../imagenes/facebook.png" width="24" height="24" class="icono"/></a>
                <a href="#"><img src="../imagenes/messenger.png" width="24" height="24" class="icono"/></a>
                <a href="#"><img src="../imagenes/instagram.png" width="24" height="24" class="icono"/></a>  
            </div>
        </div>
    </footer>
    
</body>

</html>