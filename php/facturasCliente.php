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
        <br><br><br><br>
        <h2>Facturas</h2>
        
        

        <div class="mainAdm-contenedor">
        
        <div class="botonnuevo">  


<a class="nuevoreg" id="cancelarRegistro" href="../php/datosCliente.php">Volver</a>

        <div class="tituloDatos datos-cliente">
                            <h1>Nombre:</h1>
                            <p>
                                <?php echo $filas['nombre' ]?> <?php echo $filas['aPaterno']?> <?php echo $filas['aMaterno']?>
                            </p>
                        </div>



                        
        <!-- CONSULTA EN PHP -->
        <?php

            include 'conexion.php';

                // CONSULTA DE TABLA FACTURAS
                $consultaFacturas = "SELECT * FROM factura fac 
                                        INNER JOIN pedido ped
                                        ON fac.pedidoFK = ped.pedidoID WHERE ped.clienteFK='$dato'";

                $resultadoFacturas = mysqli_query($conexion,$consultaFacturas);                   
        ?>
            
                       
            <!-- TABLA VENTAS -->
            <table id="responsiveFuente">
                <tr class="tabla-encabezado">
                    <td>
                        ID FACTURA
                    </td>
                    <td id="telcliente">
                        RFC
                    </td>
                    <td class="nombrecliente">
                        Importe Total
                    </td>
                    <td class="icontabla">
                        Fecha
                    </td>
                    <td class="icontabla">
                        Detalles
                    </td>
                </tr>
                <!-- RENGLONES QUE SE LLENARAN AUTOMATICAMENTE -->
                <?php
                    // INICIA EL WHILE
                    while($filasFacturas=mysqli_fetch_array($resultadoFacturas))
                    {  
                ?>
                <tr>
                    <td class="tablanoedicion">
                        <!-- ID de la Ropa -->
                        <?php
                            echo $filasFacturas['facturaID'];
                        ?>
                    </td>
                    <td class="tablanoedicion">
                        <!-- TipoRopa -->
                        <?php
                            echo $filasFacturas['rfc'];
                        ?>
                    </td>
                    <td class="tablanoedicion">
                        <!-- Subcategoria -->
                        <?php
                            echo $filasFacturas['importeTotal'];
                        ?>
                    </td>
                    <td class="tablanoedicion">
                        <!-- Genero -->
                        <?php
                            echo $filasFacturas['fecha'];
                        ?>
                    </td>
                    <td class="tabla-edicion">
                        

                        <!-- Detalles -->
                        <!-- Detalles -->
                        <!-- Se envian dos variables, el id para consultar y el nombre concatenado para presentarlo
                             en la pagina -->
 

                        <form action="detalleFactura.php" method="POST">
                            <label>
                                <input class="basura" type="submit" name="otro" value="<?php echo $filasFacturas['facturaID'];?>">
                                <input class="basura" type="text" name="facturaID" value="<?php echo $filasFacturas['facturaID']?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-info" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <path d="M11 14h1v4h1" />
                                    <path d="M12 11h.01" />
                                </svg>
                            </label>  
                         </form>
                                

                    </td>
                </tr>
                
                <?php
                    }   // CIERRE DEL WHILE
                ?>
            </table>

        </div>
        
    </main>

       
</body>

</html>

