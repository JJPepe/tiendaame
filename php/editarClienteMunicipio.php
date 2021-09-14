<!DOCTYPE html>
<html lang="es">
<head> 

<?php

    include 'conexion.php';
    session_start();           
              
    $dato = $_SESSION['id'];
        
    if($dato=="")
    {
        header("Location: clientes.php");
    }
    else
    {
               
        $consultaClientes = "SELECT *, cli.nombre AS NOMBRE,                                 
                                        cli.clienteID, 
                                        CONCAT(NOMBRE,' ',APATERNO,' ',AMATERNO) AS NOMBRECOMPLETO, 
                                        TELEFONO,
                                        cu.cuentaID,                                          
                                        cu.correo,
                                        co.colonia,
                                        mun.municipio,
                                        est.estado
                                    FROM CLIENTE CLI
                                    INNER JOIN CUENTA CU
                                    ON CLI.CUENTAFK = CU.CUENTAID 
                                    INNER JOIN COLONIA CO
                                    ON CLI.COLONIAFK = CO.COLONIAID
                                    INNER JOIN MUNICIPIO MUN
                                    ON CLI.MUNICIPIOFK = MUN.MUNICIPIOID
                                    INNER JOIN ESTADO EST
                                    ON CLI.ESTADOFK = EST.ESTADOID
                                    WHERE cli.estadoReg='1' AND cli.clienteID='$dato'";
                                    //header("Location: clientes.php");

        $resultado = mysqli_query($conexion,$consultaClientes); 
        $filas=mysqli_fetch_array($resultado);                    
    }                
?>
    
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
                
     <br><br>   
    <h2>Editar Cliente</h2>
        
        <div class="mainAdm-contenedor">
        
        

        <!-- CONSULTA EN PHP -->
        <?php

            include 'conexion.php';
                       
              

            // CACHAR LOS DATOS DEL FORM ANTERIOR EDITARCLIENTE.PHP

            $id = $_SESSION['id'];
            $nombre = $_POST['actualizarNombre'];
            $aPaterno = $_POST['actualizaraPaterno'];
            $aMaterno = $_POST['actualizaraMaterno'];
            $telefono = $_POST['actualizarTelefono'];
            $correo = $_POST['actualizarCorreo'];
            $calle = $_POST['actualizarCalle'];
            $noInt = $_POST['actualizarNoInt'];
            $noExt = $_POST['actualizarNoExt'];
            $estado = $_POST['actualizarEstado'];
        
            if($nombre=="")
            {
                header("Location: datosCliente.php");
            }
            else
            {
                // TRAER EL estadoID DE LA BD
                $consultaEstadoID = "SELECT estadoID FROM estado WHERE estado='$estado'";

                $resultadoEstadoID = mysqli_query($conexion,$consultaEstadoID);
                $filasEstado = mysqli_fetch_array($resultadoEstadoID);
                $estadoID = $filasEstado['estadoID'];

               
                $consultaMunicipio = "SELECT *
                                     FROM municipio mun
                                     INNER JOIN  estado es
                                     ON mun.estadoFK = es.estadoID                                     
                                     WHERE mun.estadoFK='$estadoID' AND mun.ESTADOREG='1' ORDER BY municipio";

                $resultadoMunicipio = mysqli_query($conexion,$consultaMunicipio);
                

                
                    
            }  

              
        ?>

                  
        <!-- RENGLONES QUE SE LLENARAN AUTOMATICAMENTE -->
                        <!-- Eliminar -->                
            
            <div class="elPapu">            
                <form action="editarClienteColonia.php" method="POST">
                    <h3>
                        Seleccione el municipio
                    </h3>
                    <br>

                    <!-- DATOS CUENTA DE CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                               Numero de cuenta:
                        </div>
                        <div class="margen">                            
                            <?php echo $id; ?>
                        </div class="margen">
                    </div>

                    <!-- DATOS NOMBRE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                            Nombre:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizarNombre" value="<?php echo $nombre; ?>">
                        </div>
                        <div class="tituloDatos">
                            Apellido Paterno:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizaraPaterno" value="<?php echo $aPaterno; ?>">                            
                        </div>
                        <div class="tituloDatos">
                            Apellido Materno:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizaraMaterno" value="<?php echo $aMaterno; ?>">                            
                        </div>
                    </div>

                    

                    <!-- DATOS CONTACTO CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                Telefono:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizarTelefono" value="<?php echo $telefono; ?>">                            
                        </div>
                    </div>

                    <!-- DATOS CONTACTO CLIENTE CORREO -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                email:
                        </div>
                        <div class="margen">
                            <input class="inputAncho" type="text" name="actualizarCorreo" value="<?php echo $correo; ?>">                             
                        </div>
                    </div>

                    <!-- DATOS DIRECCION CALLE CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                Calle:
                        </div>
                        <div class="margen">
                            <input class="inputAncho" type="text" name="actualizarCalle" value="<?php echo $calle; ?>">                             
                        </div>
                        <div class="tituloDatos">
                                No. Interior:
                        </div>
                        <div class="margen">
                            <input class="numerosCasa" type="text" name="actualizarNoInt" value="<?php echo $noInt; ?>"> 
                            
                        </div>
                        <div class="tituloDatos">
                                No. Exterior:
                        </div>
                        <div class="margen">
                            <input class="numerosCasa" type="text" name="actualizarNoExt" value="<?php echo $noExt; ?>">                            
                        </div>                          
                    </div>


                    

                    <!-- DATOS DIRECCION CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                Estado:
                        </div>
                        <div class="margen">
                            <select name="actualizarEstado">
                                         <option value="<?php echo $estadoID; ?>"><?php echo $estado; ?></option>                                
                            </select>                            
                        </div>
                        <div class="tituloDatos">
                                Municipio:
                        </div>
                        <div class="margen">
                            <select name="actualizarMunicipio">
                                <?php 
                                    while($filasMunicipio = mysqli_fetch_array($resultadoMunicipio)) 
                                    {    
                                ?>
                                        <option value="<?php echo $filasMunicipio['municipioID']; ?>"><?php echo $filasMunicipio['municipio']; ?></option>                                
                                <?php
                                    }
                                ?>        
                            </select>                            
                        </div>
                    </div>
                    <br>
                    <input type="checkbox" id="nuevoadmin">
                    <br>
                    <button type="submit" class="nuevoreg">Continuar</button>
                    <input type="checkbox" id="nuevoadmin">
                    <a href="datosCliente.php" class="nuevoreg" id="regresarCli" for="nuevoadmin">Regresar</a>
                  
                </form>
            </div>

            <div class="botonnuevo">  
            

        </div>
                
            
    </main>
    <div class="mainAdm-contenedor">
        <section class="resumen-facturas">
            <a  href="../php/facturasCliente.php">

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2" />
                    </svg>
                    <h3 class="resumen-titulo"><a  href="../php/facturasCliente.php">Facturas</a></h3>
            </a>
                    <p class="resumen-parrafo">
                        <?php 
                            require 'conexion.php';
                            $consulta = "SELECT COUNT(*) FROM FACTURA WHERE clienteFK ='$dato'";
                            $registro = mysqli_query($conexion,$consulta);
                            $total = mysqli_fetch_array($registro);
                            echo $total['COUNT(*)']; 
                        ?>
                    </p>
                    
                </section>
            </div>
</body>

</html>