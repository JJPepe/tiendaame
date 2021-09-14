<!DOCTYPE html>
<html lang="es">
<head> 
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META http-equiv="cache-control" content="no-cache">

    <link rel="icon" href="../imagenes/logoYireh.png" />
    
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

            $consultaEstado = "SELECT * FROM ESTADO";
            $resultadoEstado = mysqli_query($conexion,$consultaEstado);
              
        ?>

                  
        <!-- RENGLONES QUE SE LLENARAN AUTOMATICAMENTE -->
                        <!-- Eliminar -->                
            
            <div class="elPapu">            
                <form action="registroMunicipio.php" method="POST">
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
                            <input id="nombre-input" type="text" name="actualizarNombre">
                        </div>
                        
                        

                    </div>


                    <div class="elPapuContenido">
                        
                        <div class="tituloDatos">
                            Apellido Paterno:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizaraPaterno">                            
                        </div>
                        
                    </div>

                    <div class="elPapuContenido">                        
                        <div class="tituloDatos">
                            Apellido Materno:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizaraMaterno">                            
                        </div>
                    </div>



                    

                    <!-- DATOS CONTACTO CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                Telefono:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizarTelefono">                            
                        </div>
                    </div>

                    <!-- DATOS CONTACTO CLIENTE CORREO -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                Usuario:
                        </div>
                        <div class="margen">
                            <input class="inputAncho" type="text" name="actualizarCorreo" placeholder="Correo de usuario">                             
                        </div>
                        <div class="tituloDatos">
                                Contraseña:
                        </div>
                        <div class="margen">
                            <input class="inputAncho" type="password" name="actualizarClave" placeholder="Min 8 caracteres">                             
                        </div>
                    </div>

                    <!-- DATOS DIRECCION CALLE CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                Calle:
                        </div>
                        <div class="margen">
                            <input class="inputAncho" type="text" name="actualizarCalle">                             
                        </div>
                        <div class="tituloDatos">
                                No. Interior:
                        </div>
                        <div class="margen">
                            <input class="numerosCasa" type="text" name="actualizarNoInt"> 
                            
                        </div>
                        <div class="tituloDatos">
                                No. Exterior:
                        </div>
                        <div class="margen">
                            <input class="numerosCasa" type="text" name="actualizarNoExt">                            
                        </div>                          
                    </div>


                    

                    <!-- DATOS DIRECCION CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                Estado:
                        </div>
                        <div class="margen">
                            <select name="actualizarEstado">
                                <?php
                                    while($filasEstado=mysqli_fetch_array($resultadoEstado))
                                    {
                                ?> 
                                         <option value="<?php echo $filasEstado['estadoID']; ?>"><?php echo $filasEstado['estado']; ?></option>  
                                    <?php    
                                    }
                                ?>                               
                            </select>                            
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="nuevoreg">Continuar</button>
                    <a class="nuevoreg" id="cancelarRegistro" href="../html/index.html">Cancelar</a>
                </form>
            </div>            

        </div>

    </main>
    <br><br><br>
    
</body>

</html>