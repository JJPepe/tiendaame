<!DOCTYPE html>

<html lang="en">

<head>

    <!-- PARA VALIDAR LA SESION ACTIVA -->
    <?php
        require 'conexion.php';
        session_start();
        //$_SESSION['username'] = $usuario;
        
        
        // OBTENEMOS LA VARIABLE
        //$datos = $_GET['clienteID'];
        $datos = $_SESSION['id'];


        if(!isset($datos))
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

            //CONSULTA DEL NUMERO DE ARTICULOS QUE SE ENCUENTRAN EN EL CARRITO
            $q2 = "SELECT COUNT(*) FROM DETALLECARRITO WHERE CLIENTEFK='$datos' AND pedido='NOCONFIRMADO' AND ESTADOREG='1'";
            $consultaArticulosCarrito = mysqli_query($conexion,$q2);
            $arrayArticulosCarrito = mysqli_fetch_array($consultaArticulosCarrito);
            $articulosCarrito = $arrayArticulosCarrito['COUNT(*)'];

            if($articulosCarrito == null)
            {
                $articulosCarrito = 0;
            }

        }

    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../imagenes/logoYireh.png" />

    <!--–Texto de la pestaña en el navegador--->
    <title>YIREH | CONTACTO</title>

    <!--–Fuente de texto externa Open Sans Condensed--->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&display=swap" rel="stylesheet">

    <!--–Fuente de texto externa Nunito--->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;700&display=swap" rel="stylesheet">
    
    <!--–Hoja de estilos css--->
    <link rel="STYLESHEET" type="text/css" href="../css/estilos.css">

    <script src="https://use.fontawesome.com/41e79267a0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.css" integrity="sha512-whyb3qZrPEJNH+Z7P4YpD27cQ4C44kFZxqrmlNVxNB13HZlB0qJ0Xv1LKshWjGjZGtPAf+W/J+aEck5FmCf/kw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

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
            <!--–Pagina que muestra los datos del cliente--->
        </div>

        <div id="navderecha">
            <!--–Formulario de registro / nuevo cliente--->
            <!--–<a href="registro.html" class="registro">
                <img src="../imagenes/registro.png" width="16" height="16" class="icono">REGISTRARSE
            </a>--->

            <!--–Formulario para inicio de sesión--->
            <!--–<a href="iniciosesion.html" class="iniciosesion">
                <img src="../imagenes/inicio.png" width="16" height="16" class="icono">INICIAR SESIÓN</a>--->

            <div class="datosBoton">

                <!--–Pagina que muestra los datos del cliente--->
                <form class="formBotones" action="datosCliente.php" method="POST">
                    <button class="registroBoton" type="submit" name="pagina" value="index.html">
                        <img src="../imagenes/usuario.png" width="16" height="16" class="icono"><?php echo $nombre?></a>
                    </button>
                </form>

                <!--–Pagina que muestra el carrito del cliente--->
                <form class="formBotones" action="carrito.php" method="POST">
                    <button class="carritoBoton" type="submit" name="pagina" value="index.html">
                        <!--
                        <img src="../imagenes/usuario.png" width="16" height="16" class="icono">-->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="#4F4F4F" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <circle cx="6" cy="19" r="2" />
                            <circle cx="17" cy="19" r="2" />
                            <path d="M17 17h-11v-14h-2" />
                            <path d="M6 5l14 1l-1 7h-13" />
                        </svg><?php echo " ($articulosCarrito)"?></a>
                    </button>
                </form>
            </div>

            <form class="formBotones" action="../php/salir.php" method="POST">
                <button class="registroBoton" type="submit" name="pagina" value="index.html">
                    <img src="../imagenes/logout.png" width="16" height="16" class="icono">CERRAR SESIÓN</a>
                </button>
            </form>
            
        </div>

    </nav>

    <!--–CONTENIDO--->
    <main>
        <section>

            <div>

                <div class="fraccionContacto">
                    <div>
                        <h1 class="titulo animate__animated animate__fadeIn">
                            ¡CONTÁCTENOS POR LOS SIGUENTES MEDIOS!
                        </h1>
                    </div>
    
                    <div>
                        <p class="text">
                            Tenemos un equipo que está dedicado a satisfacer tus necesidades y que te contestará a tus dudas con la mayor brevedad posible.
                        </p>
                    </div>
                
                    <div class=" center-xs margin-top  animate__animated animate__rubberBand">
                        <a href="https://www.facebook.com/YIREH-Shop-100556108446045/"><i id="fb" class="fa fa-facebook-square fa-5x " aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/_yirehshop_/"><i id="inst" class="fa fa-instagram fa-5x " aria-hidden="true"></i></a>
                        <a href="https://web.whatsapp.com/send?phone=5215532117044&text=Hola%20quiero%20hacer%20un%20pedido%20de%20ropa..."><i id="wsp" class="fa fa-whatsapp fa-5x " aria-hidden="true" ></i></a> 
                    </div>
                </div>

                <section class="divmain">
                    <div class="line"></div>
                </section>

                <div class="animate__animated animate__fadeInBottomRight">

                    <div class="espacio2 ">

                        <div class="fraccionUbicacion">

                            <div class="fraccionUbicacion2">
                                
                                <div>
                                    <h1 class="titulo2">UBICACIÓN DE LA TIENDA</h1>
                                </div>

                                <i  class="fa fa-map-marker fa-4x market" aria-hidden="true"></i>
                            </div>
                                
                            <p class="text2 animate__animated animate__fadeInRight">
                                Francisco Villa 25
                                <br> Francisco Villa 25, Los Reyes
                                <br>CP: 54900 Tultitlán de Mariano Escobedo
                                <br>Estado de México
                            </p>
                        </div>
                    </div>
                    
                    <div class="animate__animated animate__fadeInBottomLeft">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3757.634773985487!2d-99.17134078561472!3d19.642906039013248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f5eac7f022ab%3A0xf24f53b1ff6a16da!2sFrancisco%20Villa%2025%2C%20Los%20Reyes%2C%2054900%20Tultitl%C3%A1n%20de%20Mariano%20Escobedo%2C%20M%C3%A9x.!5e0!3m2!1ses!2smx!4v1626999805875!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

        </section>

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

            <p class="pieparrafo">TEL: 55 3211 7044</p>

            <!--–Iconos que redirigen a los medios de contacto--->
            <div id="contactosIconos">
                <a href="https://web.whatsapp.com/send?phone=5215532117044&text=Hola%20quiero%20hacer%20un%20pedido%20de%20ropa..."><img src="../imagenes/whatsapp.png" width="24" height="24" class="icono"/></a>
                <a href="https://www.facebook.com/YIREH-Shop-100556108446045/"><img src="../imagenes/facebook.png" width="24" height="24" class="icono"/></a>
                <a href="https://www.instagram.com/_yirehshop_/"><img src="../imagenes/instagram.png" width="24" height="24" class="icono"/></a>  
            </div>
        </div>
    </footer>
    
</body>

</html>