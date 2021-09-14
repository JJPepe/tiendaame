<!DOCTYPE html>

<html lang="en">

<head>

    <?php
        require '../php/conexion.php';

        $consultaRopa1 = "SELECT * FROM articulo_producto  WHERE ropaID='1'";
        $resultadoRopa1 = mysqli_query($conexion, $consultaRopa1);
        $filasRopa1 = mysqli_fetch_array($resultadoRopa1); 
        
        $consultaRopa2 = "SELECT * FROM articulo_producto  WHERE ropaID='2'";
        $resultadoRopa2 = mysqli_query($conexion, $consultaRopa2);
        $filasRopa2 = mysqli_fetch_array($resultadoRopa2); 

        $consultaRopa3 = "SELECT * FROM articulo_producto  WHERE ropaID='3'";
        $resultadoRopa3 = mysqli_query($conexion, $consultaRopa3);
        $filasRopa3 = mysqli_fetch_array($resultadoRopa3); 

        $consultaRopa4 = "SELECT * FROM articulo_producto  WHERE ropaID='4'";
        $resultadoRopa4 = mysqli_query($conexion, $consultaRopa4);
        $filasRopa4 = mysqli_fetch_array($resultadoRopa4); 

        $consultaRopa5 = "SELECT * FROM articulo_producto  WHERE ropaID='5'";
        $resultadoRopa5 = mysqli_query($conexion, $consultaRopa5);
        $filasRopa5 = mysqli_fetch_array($resultadoRopa5); 
        
        $consultaRopa6 = "SELECT * FROM articulo_producto  WHERE ropaID='6'";
        $resultadoRopa6 = mysqli_query($conexion, $consultaRopa6);
        $filasRopa6 = mysqli_fetch_array($resultadoRopa6); 

        $consultaRopa7 = "SELECT * FROM articulo_producto  WHERE ropaID='7'";
        $resultadoRopa7 = mysqli_query($conexion, $consultaRopa7);
        $filasRopa7 = mysqli_fetch_array($resultadoRopa7); 

        $consultaRopa8 = "SELECT * FROM articulo_producto  WHERE ropaID='8'";
        $resultadoRopa8 = mysqli_query($conexion, $consultaRopa8);
        $filasRopa8 = mysqli_fetch_array($resultadoRopa8); 

    ?>   

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
            <a href="index.html" class="enlacesnav">
                <img src="../imagenes/inicio.png" width="16" height="16" class="icono">INICIO</a>
                
            <!--–Pagina hombre--->
            <a href="hombre.php" class="enlacesnav">
                <img src="../imagenes/hombre.png" width="16" height="16" class="icono">HOMBRE</a>

            <!--–Pagina mujer--->
            <a href="mujer.php" class="enlacesnav">
                <img src="../imagenes/mujer.png" width="16" height="16" class="icono">MUJER</a>

            <!--–Pagina nosotros--->
            <a href="nosotros.html" class="enlacesnav">
                <img src="../imagenes/nosotros.png" width="16" height="16" class="icono">NOSOTROS</a>
            
            <!--–Pagina contacto--->
            <a href="contacto.html" class="enlacesnav">
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
        <h1>Hombre</h1>
    </section>

    <!--–CONTENIDO--->
    <main>
        <div class="contenedorArticulos">

            <div class="sub-contenedorArticulos">

                <div class="articulo">

                    <div class="fraccionArticuloImg">
                        <img src="../../PaginaAdmin/<?php echo $filasRopa1['imgUrl']?>"  width="200" height="100%" alt="Imagen Representativa" class="imgArticulo">
                    </div>
    
                    <div class="fraccionArticulo">
                        
                        <!--Nombre del Articulo (Blusa, Pantalon, Falda...)-->
                        <div class="tipo-ropa">
                            <h2 class="nombre-articulo"><?php echo $filasRopa1['tipoRopa']?></h2>
                            <h3 class="sub-categoria-articulo"><?php echo $filasRopa1['subcategoria']?></h3>
                            <h3 class="categoria-articulo"><?php echo $filasRopa1['categoria']?></h3>
                        </div>

                        <!--Precio del Articulo-->
                        <div>
                            <!--Titulo Fijo-->
                            <h3 class="precio-articulo">Precio:</h3>

                            <di class="precios">

                                <!--Precio Final del Articulo-->
                                <?php
                                    if($filasRopa1['precio']==$filasRopa1['Pdescuento'])
                                    {
                                        $precioReal=$filasRopa1['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total-original\">$$precioReal</h3>";
                                    }
                                    else
                                    {
                                        $precioReal=$filasRopa1['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total\">$$precioReal</h3>";
                                    }
                                ?>

                                <!--Precio del Articulo-->
                                <?php
                                    if($filasRopa1['precio']==$filasRopa1['Pdescuento'])
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $precio=$filasRopa1['precio'];
                                        echo"
                                        <h3 class=\"precio-real\">$$precio</h3>";
                                    }
                                ?>

                                <!--Descuento-->
                                <?php
                                    if($filasRopa1['descuento']==0 || $filasRopa1['descuento']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $des=$filasRopa1['descuento']*100;
                                        echo"
                                        <h3 class=\"precio-descuento\">$des%</h3>";
                                    }
                                ?>
                                
                                
                                <!--Descuento por temporada-->
                                <?php
                                    if($filasRopa1['desTemp']==0 || $filasRopa1['desTemp']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasRopa1['desTemp']*100;
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
                            <p class="descripcion"><?php echo $filasRopa1['descripcion']?></p>
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
                            <p class="color"><?php echo $filasRopa1['color']?></p>

                        </div>

                        <!--Añadir el articulo al carrito-->
                        <div>

                            <form class="añadirCarrito" action="../php/login.php" method="POST">
                                <button type="submit" name="pagina" value="index.php">
                                    <a>Añadir al carrito</a>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="articulo">

                    <div class="fraccionArticuloImg">
                        <img src="../../PaginaAdmin/<?php echo $filasRopa2['imgUrl']?>"  width="200" height="100%" alt="Imagen Representativa" class="imgArticulo">
                    </div>
    
                    <div class="fraccionArticulo">
                        
                        <!--Nombre del Articulo (Blusa, Pantalon, Falda...)-->
                        <div class="tipo-ropa">
                            <h2 class="nombre-articulo"><?php echo $filasRopa2['tipoRopa']?></h2>
                            <h3 class="sub-categoria-articulo"><?php echo $filasRopa2['subcategoria']?></h3>
                            <h3 class="categoria-articulo"><?php echo $filasRopa2['categoria']?></h3>
                        </div>

                        <!--Precio del Articulo-->
                        <div>
                            <!--Titulo Fijo-->
                            <h3 class="precio-articulo">Precio:</h3>

                            <di class="precios">

                                <!--Precio Final del Articulo-->
                                <?php
                                    if($filasRopa2['precio']==$filasRopa2['Pdescuento'])
                                    {
                                        $precioReal=$filasRopa2['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total-original\">$$precioReal</h3>";
                                    }
                                    else
                                    {
                                        $precioReal=$filasRopa2['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total\">$$precioReal</h3>";
                                    }
                                ?>

                                <!--Precio del Articulo-->
                                <?php
                                    if($filasRopa2['precio']==$filasRopa2['Pdescuento'])
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $precio=$filasRopa2['precio'];
                                        echo"
                                        <h3 class=\"precio-real\">$$precio</h3>";
                                    }
                                ?>

                                <!--Descuento-->
                                <?php
                                    if($filasRopa2['descuento']==0 || $filasRopa2['descuento']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasRopa2['descuento']*100;
                                        echo"
                                        <h3 class=\"precio-descuento\">$desTemporada%</h3>";
                                    }
                                ?>
                                
                                <!--Descuento por temporada-->
                                <?php
                                    if($filasRopa2['desTemp']==0 || $filasRopa2['desTemp']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasRopa2['desTemp']*100;
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
                            <p class="descripcion"><?php echo $filasRopa2['descripcion']?></p>
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
                            <p class="color"><?php echo $filasRopa2['color']?></p>

                        </div>

                        <!--Añadir el articulo al carrito-->
                        <div>

                            <form class="añadirCarrito" action="../php/login.php" method="POST">
                                <button type="submit" name="pagina" value="index.php">
                                    <a>Añadir al carrito</a>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

            <div class="sub-contenedorArticulos">

                <div class="articulo">

                    <div class="fraccionArticuloImg">
                        <img src="../../PaginaAdmin/<?php echo $filasRopa3['imgUrl']?>"  width="200" height="100%" alt="Imagen Representativa" class="imgArticulo">
                    </div>
    
                    <div class="fraccionArticulo">
                        
                        <!--Nombre del Articulo (Blusa, Pantalon, Falda...)-->
                        <div class="tipo-ropa">
                            <h2 class="nombre-articulo"><?php echo $filasRopa3['tipoRopa']?></h2>
                            <h3 class="sub-categoria-articulo"><?php echo $filasRopa3['subcategoria']?></h3>
                            <h3 class="categoria-articulo"><?php echo $filasRopa3['categoria']?></h3>
                        </div>

                        <!--Precio del Articulo-->
                        <div>
                            <!--Titulo Fijo-->
                            <h3 class="precio-articulo">Precio:</h3>

                            <di class="precios">

                                <!--Precio Final del Articulo-->
                                <?php
                                    if($filasRopa3['precio']==$filasRopa3['Pdescuento'])
                                    {
                                        $precioReal=$filasRopa3['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total-original\">$$precioReal</h3>";
                                    }
                                    else
                                    {
                                        $precioReal=$filasRopa3['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total\">$$precioReal</h3>";
                                    }
                                ?>

                                <!--Precio del Articulo-->
                                <?php
                                    if($filasRopa3['precio']==$filasRopa3['Pdescuento'])
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $precio=$filasRopa3['precio'];
                                        echo"
                                        <h3 class=\"precio-real\">$$precio</h3>";
                                    }
                                ?>

                                <!--Descuento-->
                                <?php
                                    if($filasRopa3['descuento']==0 || $filasRopa3['descuento']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasRopa3['descuento']*100;
                                        echo"
                                        <h3 class=\"precio-descuento\">$desTemporada%</h3>";
                                    }
                                ?>
                                
                                
                                <!--Descuento por temporada-->
                                <?php
                                    if($filasRopa3['desTemp']==0 || $filasRopa3['desTemp']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasRopa3['desTemp']*100;
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
                            <p class="descripcion"><?php echo $filasRopa3['descripcion']?></p>
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
                            <p class="color"><?php echo $filasRopa3['color']?></p>

                        </div>

                        <!--Añadir el articulo al carrito-->
                        <div>

                            <form class="añadirCarrito" action="../php/login.php" method="POST">
                                <button type="submit" name="pagina" value="index.php">
                                    <a>Añadir al carrito</a>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="articulo">

                    <div class="fraccionArticuloImg">
                        <img src="../../PaginaAdmin/<?php echo $filasRopa4['imgUrl']?>"  width="200" height="100%" alt="Imagen Representativa" class="imgArticulo">
                    </div>
    
                    <div class="fraccionArticulo">
                        
                        <!--Nombre del Articulo (Blusa, Pantalon, Falda...)-->
                        <div class="tipo-ropa">
                            <h2 class="nombre-articulo"><?php echo $filasRopa4['tipoRopa']?></h2>
                            <h3 class="sub-categoria-articulo"><?php echo $filasRopa4['subcategoria']?></h3>
                            <h3 class="categoria-articulo"><?php echo $filasRopa4['categoria']?></h3>
                        </div>

                        <!--Precio del Articulo-->
                        <div>
                            <!--Titulo Fijo-->
                            <h3 class="precio-articulo">Precio:</h3>

                            <di class="precios">

                                <!--Precio Final del Articulo-->
                                <?php
                                    if($filasRopa4['precio']==$filasRopa4['Pdescuento'])
                                    {
                                        $precioReal=$filasRopa4['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total-original\">$$precioReal</h3>";
                                    }
                                    else
                                    {
                                        $precioReal=$filasRopa4['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total\">$$precioReal</h3>";
                                    }
                                ?>

                                <!--Precio del Articulo-->
                                <?php
                                    if($filasRopa4['precio']==$filasRopa4['Pdescuento'])
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $precio=$filasRopa4['precio'];
                                        echo"
                                        <h3 class=\"precio-real\">$$precio</h3>";
                                    }
                                ?>

                                <!--Descuento-->
                                <?php
                                    if($filasRopa4['descuento']==0 || $filasRopa4['descuento']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasRopa4['descuento']*100;
                                        echo"
                                        <h3 class=\"precio-descuento\">$desTemporada%</h3>";
                                    }
                                ?>                                
                                
                                <!--Descuento por temporada-->
                                <?php
                                    if($filasRopa4['desTemp']==0 || $filasRopa4['desTemp']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasRopa4['desTemp']*100;
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
                            <p class="descripcion"><?php echo $filasRopa4['descripcion']?></p>
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
                            <p class="color"><?php echo $filasRopa4['color']?></p>

                        </div>

                        <!--Añadir el articulo al carrito-->
                        <div>

                            <form class="añadirCarrito" action="../php/login.php" method="POST">
                                <button type="submit" name="pagina" value="index.php">
                                    <a>Añadir al carrito</a>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            
            <div class="sub-contenedorArticulos">

                <div class="articulo">

                    <div class="fraccionArticuloImg">
                        <img src="../../PaginaAdmin/<?php echo $filasRopa5['imgUrl']?>"  width="200" height="100%" alt="Imagen Representativa" class="imgArticulo">
                    </div>

                    <div class="fraccionArticulo">
                        
                        <!--Nombre del Articulo (Blusa, Pantalon, Falda...)-->
                        <div class="tipo-ropa">
                            <h2 class="nombre-articulo"><?php echo $filasRopa5['tipoRopa']?></h2>
                            <h3 class="sub-categoria-articulo"><?php echo $filasRopa5['subcategoria']?></h3>
                            <h3 class="categoria-articulo"><?php echo $filasRopa5['categoria']?></h3>
                        </div>

                        <!--Precio del Articulo-->
                        <div>
                            <!--Titulo Fijo-->
                            <h3 class="precio-articulo">Precio:</h3>

                            <di class="precios">

                                <!--Precio Final del Articulo-->
                                <?php
                                    if($filasRopa5['precio']==$filasRopa5['Pdescuento'])
                                    {
                                        $precioReal=$filasRopa5['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total-original\">$$precioReal</h3>";
                                    }
                                    else
                                    {
                                        $precioReal=$filasRopa5['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total\">$$precioReal</h3>";
                                    }
                                ?>

                                <!--Precio del Articulo-->
                                <?php
                                    if($filasRopa5['precio']==$filasRopa5['Pdescuento'])
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $precio=$filasRopa5['precio'];
                                        echo"
                                        <h3 class=\"precio-real\">$$precio</h3>";
                                    }
                                ?>

                                <!--Descuento-->
                                <?php
                                    if($filasRopa5['descuento']==0 || $filasRopa5['descuento']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $des=$filasRopa5['descuento']*100;
                                        echo"
                                        <h3 class=\"precio-descuento\">$des%</h3>";
                                    }
                                ?>
                                
                                
                                <!--Descuento por temporada-->
                                <?php
                                    if($filasRopa5['desTemp']==0 || $filasRopa5['desTemp']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasRopa5['desTemp']*100;
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
                            <p class="descripcion"><?php echo $filasRopa5['descripcion']?></p>
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
                            <p class="color"><?php echo $filasRopa5['color']?></p>

                        </div>

                        <!--Añadir el articulo al carrito-->
                        <div>

                            <form class="añadirCarrito" action="../php/login.php" method="POST">
                                <button type="submit" name="pagina" value="index.php">
                                    <a>Añadir al carrito</a>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="articulo">

                    <div class="fraccionArticuloImg">
                        <img src="../../PaginaAdmin/<?php echo $filasRopa6['imgUrl']?>"  width="200" height="100%" alt="Imagen Representativa" class="imgArticulo">
                    </div>

                    <div class="fraccionArticulo">
                        
                        <!--Nombre del Articulo (Blusa, Pantalon, Falda...)-->
                        <div class="tipo-ropa">
                            <h2 class="nombre-articulo"><?php echo $filasRopa6['tipoRopa']?></h2>
                            <h3 class="sub-categoria-articulo"><?php echo $filasRopa6['subcategoria']?></h3>
                            <h3 class="categoria-articulo"><?php echo $filasRopa6['categoria']?></h3>
                        </div>

                        <!--Precio del Articulo-->
                        <div>
                            <!--Titulo Fijo-->
                            <h3 class="precio-articulo">Precio:</h3>

                            <di class="precios">

                                <!--Precio Final del Articulo-->
                                <?php
                                    if($filasRopa6['precio']==$filasRopa6['Pdescuento'])
                                    {
                                        $precioReal=$filasRopa6['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total-original\">$$precioReal</h3>";
                                    }
                                    else
                                    {
                                        $precioReal=$filasRopa6['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total\">$$precioReal</h3>";
                                    }
                                ?>

                                <!--Precio del Articulo-->
                                <?php
                                    if($filasRopa6['precio']==$filasRopa6['Pdescuento'])
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $precio=$filasRopa6['precio'];
                                        echo"
                                        <h3 class=\"precio-real\">$$precio</h3>";
                                    }
                                ?>

                                <!--Descuento-->
                                <?php
                                    if($filasRopa6['descuento']==0 || $filasRopa6['descuento']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasRopa6['descuento']*100;
                                        echo"
                                        <h3 class=\"precio-descuento\">$desTemporada%</h3>";
                                    }
                                ?>
                                
                                <!--Descuento por temporada-->
                                <?php
                                    if($filasRopa6['desTemp']==0 || $filasRopa6['desTemp']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasRopa6['desTemp']*100;
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
                            <p class="descripcion"><?php echo $filasRopa6['descripcion']?></p>
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
                            <p class="color"><?php echo $filasRopa6['color']?></p>

                        </div>

                        <!--Añadir el articulo al carrito-->
                        <div>

                            <form class="añadirCarrito" action="../php/login.php" method="POST">
                                <button type="submit" name="pagina" value="index.php">
                                    <a>Añadir al carrito</a>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

            <div class="sub-contenedorArticulos">

                <div class="articulo">

                    <div class="fraccionArticuloImg">
                        <img src="../../PaginaAdmin/<?php echo $filasRopa7['imgUrl']?>"  width="200" height="100%" alt="Imagen Representativa" class="imgArticulo">
                    </div>

                    <div class="fraccionArticulo">
                        
                        <!--Nombre del Articulo (Blusa, Pantalon, Falda...)-->
                        <div class="tipo-ropa">
                            <h2 class="nombre-articulo"><?php echo $filasRopa7['tipoRopa']?></h2>
                            <h3 class="sub-categoria-articulo"><?php echo $filasRopa7['subcategoria']?></h3>
                            <h3 class="categoria-articulo"><?php echo $filasRopa7['categoria']?></h3>
                        </div>

                        <!--Precio del Articulo-->
                        <div>
                            <!--Titulo Fijo-->
                            <h3 class="precio-articulo">Precio:</h3>

                            <di class="precios">

                                <!--Precio Final del Articulo-->
                                <?php
                                    if($filasRopa7['precio']==$filasRopa7['Pdescuento'])
                                    {
                                        $precioReal=$filasRopa7['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total-original\">$$precioReal</h3>";
                                    }
                                    else
                                    {
                                        $precioReal=$filasRopa7['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total\">$$precioReal</h3>";
                                    }
                                ?>

                                <!--Precio del Articulo-->
                                <?php
                                    if($filasRopa7['precio']==$filasRopa7['Pdescuento'])
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $precio=$filasRopa7['precio'];
                                        echo"
                                        <h3 class=\"precio-real\">$$precio</h3>";
                                    }
                                ?>

                                <!--Descuento-->
                                <?php
                                    if($filasRopa7['descuento']==0 || $filasRopa7['descuento']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $des=$filasRopa7['descuento']*100;
                                        echo"
                                        <h3 class=\"precio-descuento\">$des%</h3>";
                                    }
                                ?>
                                
                                
                                <!--Descuento por temporada-->
                                <?php
                                    if($filasRopa7['desTemp']==0 || $filasRopa7['desTemp']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasRopa7['desTemp']*100;
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
                            <p class="descripcion"><?php echo $filasRopa7['descripcion']?></p>
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
                            <p class="color"><?php echo $filasRopa7['color']?></p>

                        </div>

                        <!--Añadir el articulo al carrito-->
                        <div>

                            <form class="añadirCarrito" action="../php/login.php" method="POST">
                                <button type="submit" name="pagina" value="index.php">
                                    <a>Añadir al carrito</a>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="articulo">

                    <div class="fraccionArticuloImg">
                        <img src="../../PaginaAdmin/<?php echo $filasRopa8['imgUrl']?>"  width="200" height="100%" alt="Imagen Representativa" class="imgArticulo">
                    </div>

                    <div class="fraccionArticulo">
                        
                        <!--Nombre del Articulo (Blusa, Pantalon, Falda...)-->
                        <div class="tipo-ropa">
                            <h2 class="nombre-articulo"><?php echo $filasRopa8['tipoRopa']?></h2>
                            <h3 class="sub-categoria-articulo"><?php echo $filasRopa8['subcategoria']?></h3>
                            <h3 class="categoria-articulo"><?php echo $filasRopa8['categoria']?></h3>
                        </div>

                        <!--Precio del Articulo-->
                        <div>
                            <!--Titulo Fijo-->
                            <h3 class="precio-articulo">Precio:</h3>

                            <di class="precios">

                                <!--Precio Final del Articulo-->
                                <?php
                                    if($filasRopa8['precio']==$filasRopa8['Pdescuento'])
                                    {
                                        $precioReal=$filasRopa8['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total-original\">$$precioReal</h3>";
                                    }
                                    else
                                    {
                                        $precioReal=$filasRopa8['Pdescuento'];
                                        echo"
                                        <h3 class=\"precio-total\">$$precioReal</h3>";
                                    }
                                ?>

                                <!--Precio del Articulo-->
                                <?php
                                    if($filasRopa8['precio']==$filasRopa8['Pdescuento'])
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $precio=$filasRopa8['precio'];
                                        echo"
                                        <h3 class=\"precio-real\">$$precio</h3>";
                                    }
                                ?>

                                <!--Descuento-->
                                <?php
                                    if($filasRopa8['descuento']==0 || $filasRopa8['descuento']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasRopa8['descuento']*100;
                                        echo"
                                        <h3 class=\"precio-descuento\">$desTemporada%</h3>";
                                    }
                                ?>
                                
                                <!--Descuento por temporada-->
                                <?php
                                    if($filasRopa8['desTemp']==0 || $filasRopa8['desTemp']==null)
                                    {
                                        echo"
                                        <h3 class=\"sin-precio-des\"></h3>";
                                    }
                                    else
                                    {
                                        $desTemporada=$filasRopa8['desTemp']*100;
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
                            <p class="descripcion"><?php echo $filasRopa8['descripcion']?></p>
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
                            <p class="color"><?php echo $filasRopa8['color']?></p>

                        </div>

                        <!--Añadir el articulo al carrito-->
                        <div>

                            <form class="añadirCarrito" action="../php/login.php" method="POST">
                                <button type="submit" name="pagina" value="index.php">
                                    <a>Añadir al carrito</a>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

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