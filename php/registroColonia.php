<!DOCTYPE html>
<html lang="es">
<head> 
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META http-equiv="cache-control" content="no-cache">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preload" href="./CSS/style.css" as="style">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/estilos.css" rel="stylesheet">
    <title>Detalle Cliente</title>
</head>

<body>
    <header> 

        <div class="barramenu">              
            <div class="imagenlogo">
                <img src="../imagenes/logo.png">
            </div>  
        </div> 

    </header>

    <hr>

         

    <main>
                
        <div class="mainAdm-contenedor">
        
        

        <!-- CONSULTA EN PHP -->
        <?php

            include 'conexion.php';

            $nombre = $_POST['actualizarNombre'];
            $aPaterno = $_POST['actualizaraPaterno'];
            $aMaterno = $_POST['actualizaraMaterno'];
            $telefono = $_POST['actualizarTelefono'];
            $correo = $_POST['actualizarCorreo'];
            $calle = $_POST['actualizarCalle'];
            $noInt = $_POST['actualizarNoInt'];
            $noExt = $_POST['actualizarNoExt'];
            $estadoID = $_POST['actualizarEstado'];
            $clave = $_POST['actualizarClave'];
            $municipioID = $_POST['actualizarMunicipio'];

            $consultaEstado = "SELECT * FROM ESTADO WHERE estadoID='$estadoID'";
            $resultadoEstado = mysqli_query($conexion,$consultaEstado);
            $filasEstado = mysqli_fetch_array($resultadoEstado);

            $consultaMunicipio = "SELECT * FROM MUNICIPIO WHERE municipioID='$municipioID' ORDER BY MUNICIPIO";
            $resultadoMunicipio = mysqli_query($conexion,$consultaMunicipio);
            $filasMunicipio = mysqli_fetch_array($resultadoMunicipio);

            $consultaColonia = "SELECT * FROM COLONIA WHERE municipioFK='$municipioID' ORDER BY COLONIA";
            $resultadoColonia = mysqli_query($conexion,$consultaColonia);

              
        ?>

                  
        <!-- RENGLONES QUE SE LLENARAN AUTOMATICAMENTE -->
                        <!-- Eliminar -->                
            
            <div class="elPapu">            
                <form action="nuevoCliente.php" method="POST">
                    <h3>
                        Nuevo usuario
                    </h3>
                    <br>

                    

                    <!-- DATOS NOMBRE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                            Nombre:
                        </div>
                        <div class="margen">
                            <input id="nombre-input" type="text" name="actualizarNombre" value="<?php echo $nombre;?>">
                        </div>
                        
                        

                    </div>


                    <div class="elPapuContenido">
                        
                        <div class="tituloDatos">
                            Apellido Paterno:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizaraPaterno" value="<?php echo $aPaterno;?>">                            
                        </div>
                        
                    </div>

                    <div class="elPapuContenido">                        
                        <div class="tituloDatos">
                            Apellido Materno:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizaraMaterno" value="<?php echo $aMaterno;?>">                            
                        </div>
                    </div>



                    

                    <!-- DATOS CONTACTO CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                Telefono:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizarTelefono" value="<?php echo $telefono;?>">                            
                        </div>
                    </div>

                    <!-- DATOS CONTACTO CLIENTE CORREO -->
                    <div class="elPapuContenido">
                    <div class="tituloDatos">
                                Usuario:
                        </div>
                        <div class="margen">
                            <input class="inputAncho" type="text" name="actualizarCorreo" placeholder="Correo de usuario" value="<?php echo $correo;?>">                             
                        </div>
                        <div class="tituloDatos">
                                Contraseña:
                        </div>
                        <div class="margen">
                            <input class="inputAncho" type="password" name="actualizarClave" placeholder="Min 8 caracteres" value="<?php echo $clave;?>">                             
                        </div>
                    </div>

                    <!-- DATOS DIRECCION CALLE CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                Calle:
                        </div>
                        <div class="margen">
                            <input class="inputAncho" type="text" name="actualizarCalle" value="<?php echo $calle;?>">                             
                        </div>
                        <div class="tituloDatos">
                                No. Interior:
                        </div>
                        <div class="margen">
                            <input class="numerosCasa" type="text" name="actualizarNoInt" value="<?php echo $noInt;?>"> 
                            
                        </div>
                        <div class="tituloDatos">
                                No. Exterior:
                        </div>
                        <div class="margen">
                            <input class="numerosCasa" type="text" name="actualizarNoExt" value="<?php echo $noExt;?>">                            
                        </div>                          
                    </div>


                    

                    <!-- DATOS DIRECCION CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                Estado:
                        </div>
                        <div class="margen">
                            <select name="actualizarEstado">                                 
                                         <option value="<?php echo $filasEstado['estadoID']; ?>"><?php echo $filasEstado['estado']; ?></option>                                                                 
                            </select>                            
                        </div>

                        <div class="tituloDatos">
                                Municipio:
                        </div>
                        <div class="margen">
                            <select name="actualizarMunicipio">                                
                                         <option value="<?php echo $filasMunicipio['municipioID']; ?>"><?php echo $filasMunicipio['municipio']; ?></option>                                                                                         
                            </select>                            
                        </div>

                        <div class="tituloDatos">
                                Colonia:
                        </div>
                        <div class="margen">
                            <select name="actualizarColonia">   
                                <?php
                                    while($filasColonia=mysqli_fetch_array($resultadoColonia))
                                    {
                                ?>
                                         <option value="<?php echo $filasColonia['coloniaID']; ?>"><?php echo $filasColonia['colonia']; ?></option>                                                                                         
                                <?php
                                    }
                                ?>
                            </select>                            
                        </div>

                    </div>
                    <br>
                    <button type="submit" class="nuevoreg">Crear Cuenta</button>
                    <a class="nuevoreg" id="cancelarRegistro" href="../html/index.html">Cancelar</a>
                </form>
            </div>            

        </div>

    </main>
    <br><br><br>
    <footer class="abajo" id="pie">

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