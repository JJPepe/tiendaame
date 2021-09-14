<!DOCTYPE html>
<html lang="es">
<head> 

<?php

    include 'conexion.php';
    session_start();           
              
    $dato = $_SESSION['id'];
        
    if($dato=="")
    {
        header("Location: datosCliente.php");
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
        
        <div class="botonnuevo">  
            
            <input type="checkbox" id="nuevoadmin">
            <!--<a href="datosCliente.php" class="nuevoreg" id="regresarCli" for="nuevoadmin">Regresar</a>-->

        </div>
        <br><br>

        <!-- CONSULTA EN PHP -->
        <?php

            include 'conexion.php';
                       
            $dato = $_SESSION['id'];
        
            if($dato=="")
            {
                header("Location: datosCliente.php");
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

                $consultaPedido = "SELECT COUNT(*) FROM PEDIDO WHERE CLIENTEFK='$dato' AND ESTADOREG='1'";
                
                /*$resultadoPedido = mysqli_query($conexion,$consultaPedido);
                $filasPedido = mysqli_fetch_array($resultadoPedido);

                $consultaFacturas = "SELECT *,COUNT(*)
                                     FROM FACTURA fac
                                     INNER JOIN PEDIDO ped
                                     ON fac.pedidoFK = ped.pedidoID                                     
                                     WHERE ped.CLIENTEFK='$dato' AND ped.ESTADOREG='1'";

                $resultadoFacturas = mysqli_query($conexion,$consultaFacturas);
                $filasFacturas = mysqli_fetch_array($resultadoFacturas);*/


                // CONSULTA COLONIA
                $consultaColonia = "SELECT * FROM COLONIA";

                $resultadoColonia = mysqli_query($conexion,$consultaColonia);

                // CONSULTA MUNICIPIO
                $consultaMunicipio = "SELECT * FROM MUNICIPIO";

                $resultadoMunicipio = mysqli_query($conexion,$consultaMunicipio);

                // CONSULTA ESTADO
                $consultaEstado = "SELECT * FROM ESTADO";

                $resultadoEstado = mysqli_query($conexion,$consultaEstado);
                    
            }  

              
        ?>

                  
        <!-- RENGLONES QUE SE LLENARAN AUTOMATICAMENTE -->
                        <!-- Eliminar -->                
            <br><br>
            <div class="elPapu">            
                <form action="editarClienteMunicipio.php" method="POST">
                    <h3>
                        <?php echo $filas['NOMBRECOMPLETO'] ?>
                    </h3>
                    <br>

                    <!-- DATOS CUENTA DE CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                               Numero de cuenta:
                        </div>
                        <div class="margen">                            
                            <?php echo $filas['cuentaID']; ?>
                        </div class="margen">
                    </div>

                    <!-- DATOS NOMBRE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                            Nombre:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizarNombre" value="<?php echo $filas['NOMBRE']; ?>">
                        </div>
                        <div class="tituloDatos">
                            Apellido Paterno:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizaraPaterno" value="<?php echo $filas['aPaterno']; ?>">                            
                        </div>
                        <div class="tituloDatos">
                            Apellido Materno:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizaraMaterno" value="<?php echo $filas['aMaterno']; ?>">                            
                        </div>
                    </div>

                    

                    <!-- DATOS CONTACTO CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                Telefono:
                        </div>
                        <div class="margen">
                            <input type="text" name="actualizarTelefono" value="<?php echo $filas['telefono']; ?>">                            
                        </div>
                    </div>

                    <!-- DATOS CONTACTO CLIENTE CORREO -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                email:
                        </div>
                        <div class="margen">
                            <input class="inputAncho" type="text" name="actualizarCorreo" value="<?php echo $filas['correo']; ?>">                             
                        </div>
                    </div>

                    <!-- DATOS DIRECCION CALLE CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                                Calle:
                        </div>
                        <div class="margen">
                            <input class="inputAncho" type="text" name="actualizarCalle" value="<?php echo $filas['calle']; ?>">                             
                        </div>
                        <div class="tituloDatos">
                                No. Interior:
                        </div>
                        <div class="margen">
                            <input class="numerosCasa" type="text" name="actualizarNoInt" value="<?php echo $filas['numeroInterior']; ?>"> 
                            
                        </div>
                        <div class="tituloDatos">
                                No. Exterior:
                        </div>
                        <div class="margen">
                            <input class="numerosCasa" type="text" name="actualizarNoExt" value="<?php echo $filas['numeroExterior']; ?>">                            
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
                                         <option value="<?php echo $filasEstado['estado']; ?>"><?php echo $filasEstado['estado']; ?></option>  
                                <?php    
                                    }
                                ?>                               
                            </select>                            
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="nuevoreg">Continuar</button>
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