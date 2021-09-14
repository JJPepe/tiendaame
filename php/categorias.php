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
            $categoria = $_POST['categoria'];
            //echo $nombre;

            if($categoria=="")
            {
                header("Location: ../php/index.php");
            }

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

        $consultaCategoria = "SELECT * FROM articulo_producto WHERE categoria='$categoria'";
        $resultadoCategoria = mysqli_query($conexion, $consultaCategoria);

    ?>   

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../imagenes/logoYireh.png" />

    <!--–Texto de la pestaña en el navegador--->
    <title>YIREH | CATEGORIAS</title>

    <!--–Fuente de texto externa Open Sans Condensed--->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&display=swap" rel="stylesheet">

    <!--–Fuente de texto externa Nunito--->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;700&display=swap" rel="stylesheet">
    
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

    <!--Barra indicadora de Genero-->
    <section class="seccionNombreGenero">
        <h1><?php echo $categoria; ?></h1>
    </section>

    <!--–CONTENIDO--->
    <main>
        <div class="contenedorArticulos">
                
        
            <div class="subcontenedorArticulosCategorias">
            <?php
                    while($filasCategoria=mysqli_fetch_array($resultadoCategoria))
                    {
                ?>
            
                <div class="articulo">
                

                    <div class="fraccionArticuloImg">
                        <img src="../../PaginaAdmin/<?php echo $filasCategoria['imgUrl']?>"  width="200" height="100%" alt="Imagen Representativa" class="imgArticulo">
                    </div>
    
                    <div class="fraccionArticulo">
                        
                        <!--Nombre del Articulo (Blusa, Pantalon, Falda...)-->
                        <div class="tipo-ropa">
                            <h2 class="nombre-articulo"><?php echo $filasCategoria['tipoRopa']?></h2>
                            <h3 class="sub-categoria-articulo"><?php echo $filasCategoria['subcategoria']?></h3>
                            <h3 class="categoria-articulo"><?php echo $filasCategoria['categoria']?></h3>
                        </div>

                        <!--Precio del Articulo-->
                        <div>
                            <!--Titulo Fijo-->
                            <h3 class="precio-articulo">Precio:</h3>

                            <di class="precios">

                                <!--Precio Final del Articulo-->
                                <?php
                                    if($filasCategoria['precio']==$filasCategoria['Pdescuento'])
                                    {
                                        $precioReal=$filasCategoria['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total-original\">$$precioReal</h3>";
                                    }
                                    else
                                    {
                                        $precioReal=$filasCategoria['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total\">$$precioReal</h3>";
                                    }
                                ?>

                                <!--Precio del Articulo-->
                                <?php
                                    if($filasCategoria['precio']==$filasCategoria['Pdescuento'])
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $precio=$filasCategoria['precio'];
                                        echo"
                                        <h3 class=\"precio-real\">$$precio</h3>";
                                    }
                                ?>

                                <!--Descuento-->
                                <?php
                                    if($filasCategoria['descuento']==0 || $filasCategoria['descuento']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $des=$filasCategoria['descuento']*100;
                                        echo"
                                        <h3 class=\"precio-descuento\">$des%</h3>";
                                    }
                                ?>
                                
                                
                                <!--Descuento por temporada-->
                                <?php
                                    if($filasCategoria['desTemp']==0 || $filasCategoria['desTemp']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasCategoria['desTemp']*100;
                                        echo"
                                        <h3 class=\"precio-descuento\">$desTemporada%</h3>";
                                    }
                                ?>

                            </di>

                        </div>

                        <!--Descripción del Articulo-->
                        <div>
                            <!--Titulo Fijo-->
                            <h3 class="descripcion-articulo">Descripción:</h3>
                            <p class="descripcion"><?php echo $filasCategoria['descripcion']?></p>
                        </div>

                        <!--Tallas disponibles-->
                        <div>
                            <!--Titulo Fijo-->
                            <h3 class="talla-articulo">Talla:</h3>

                            <di class="tallas">
                                <label><input type="radio" name="talla" value="1">ECH</label>
                                <label><input type="radio" name="talla" value="2">CH</label>
                                <label><input type="radio" name="talla" value="3">M</label>
                                <label><input type="radio" name="talla" value="4">G</label>
                                <label><input type="radio" name="talla" value="5">EG</label>
                            </di>
                        </div>

                        <!--Colores disponibles-->
                        <div class="div-color-articulo">
                            <!--Titulo Fijo-->
                            <h3 class="color-articulo">Color:</h3>
                            <p class="color"><?php echo $filasCategoria['color']?></p>

                        </div>

                        <!--Añadir el articulo al carrito-->
                        <div>

                            <form class="añadirCarrito" action="carrito.php" method="POST">
                                <button type="submit" name="pagina" value="<?php echo $filasCategoria['ropaID']?>">
                                    <a>Añadir al carrito</a>
                                </button>
                            </form>

                        </div>
                    </div>                    
                </div>

            
                <!-- TERMINA EL WHILE -->
            <?php                
                }
            ?>
            </div>
            

        </div>
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