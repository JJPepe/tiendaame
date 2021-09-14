<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../imagenes/logoYireh.png" />

    <!--–Texto de la pestaña en el navegador--->
    <title>YIREH | HOMBRE</title>

    <!--–Fuente de texto externa Open Sans Condensed--->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&display=swap" rel="stylesheet">

    <!--–Fuente de texto externa Nunito--->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;700&display=swap" rel="stylesheet">
    
    <!--–Hoja de estilos css--->
    <link rel="STYLESHEET" type="text/css" href="../css/estilos.css">

    <?php

        require 'conexion.php';

        $categoria = $_POST['categoria'];
        $consultaCategoria = "SELECT * FROM articulo_producto WHERE categoria='$categoria'";
        $resultadoCategoria = mysqli_query($conexion, $consultaCategoria);

    ?>

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
            <a href="../html/index.html" class="enlacesnav">
                <img src="../imagenes/inicio.png" width="16" height="16" class="icono">INICIO</a>
                
            <!--–Pagina hombre--->
            <a href="../html/hombre.php" class="enlacesnav">
                <img src="../imagenes/hombre.png" width="16" height="16" class="icono">HOMBRE</a>

            <!--–Pagina mujer--->
            <a href="../html/mujer.php" class="enlacesnav">
                <img src="../imagenes/mujer.png" width="16" height="16" class="icono">MUJER</a>

            <!--–Pagina nosotros--->
            <a href="../html/nosotros.html" class="enlacesnav">
                <img src="../imagenes/nosotros.png" width="16" height="16" class="icono">NOSOTROS</a>
            
            <!--–Pagina contacto--->
            <a href="../html/contacto.html" class="enlacesnav">
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
            
            <form class="formBotones" action="../php/registro.php" method="POST">
                <button class="registroBoton" type="submit" name="pagina" value="../php/hombre.php">
                    <img src="../imagenes/registro.png" width="16" height="16" class="icono">REGISTRARSE</a>
                </button>
            </form>

            <form class="formBotones" action="../php/login.php" method="POST">
                <button class="registroBoton" type="submit" name="pagina" value="../php/hombre.php">
                    <img src="../imagenes/login.png" width="16" height="16" class="icono">INICIAR SESIÓN</a>
                </button>
            </form>
            
        </div>

    </nav>

    <section class="seccionNombreGenero">
        <h1><?php echo $categoria;?></h1>
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

                            <form class="añadirCarrito" action="login.php" method="POST">
                                <button type="submit" name="pagina" value="index.php">
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