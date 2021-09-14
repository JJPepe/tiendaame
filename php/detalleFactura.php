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
    <hr>

         
   

    <main>
        <br><br><br><br>
        <h2>Detalle Factura</h2>
        
        <div class="botonnuevo">
        <a href="facturasCliente.php" class="nuevoreg" id="regresarCli" for="nuevoadmin">Regresar</a>
        </div>
        <div class="mainAdm-contenedor">
        
            
            

        <!-- CONSULTA EN PHP -->
        <?php

            include 'conexion.php';
                       
              
            $idFactura = $_POST['facturaID'];
        
            if($idFactura=="")
            {
                header("Location: facturasCliente.php");
            }
            else
            {
                $consultapedidofactura = "SELECT ped.pedidoID FROM factura fac INNER JOIN pedido ped ON fac.pedidoFK = ped.pedidoID 
                                            WHERE fac.facturaID = '$idFactura'";
                $resultadopedidofactura = mysqli_query($conexion,$consultapedidofactura);
                $idPedido = mysqli_fetch_array($resultadopedidofactura);
                $pedidoID=$idPedido['pedidoID'];
                
                $consultaVfactura = "SELECT * FROM vista_factura WHERE facturaID = '$idFactura'";
                $resultadoVfactura = mysqli_query($conexion,$consultaVfactura);
                $filasVfactura = mysqli_fetch_array($resultadoVfactura);

                $consultaNombreCliente = "SELECT CONCAT(cli.nombre,' ',cli.aPaterno,' ',cli.aMaterno) AS NOMBRECOMPLETO, 
                                                det.clienteFK, det.cantidad, det.importe, det.pedidoFK, rop.ropaID, gen.genero, 
                                                    tip.tipoRopa, cat.categoria, sub.subcategoria, tem.temporada, tal.talla, col.color,
                                                     rop.precio, rop.descuento, rop.desTemp, rop.Pdescuento FROM detallecarrito det 
                                                     INNER JOIN ropa rop ON det.ropaFK = rop.ropaID INNER JOIN genero gen 
                                                     ON rop.generoFK = gen.generoID INNER JOIN tipoRopa tip ON rop.tipoRopaFK = tip.tipoRopaID 
                                                     INNER JOIN categoria cat ON rop.categoriaFK = cat.categoriaID INNER JOIN subcategoria sub 
                                                     ON rop.subcategoriaFK = sub.subcategoriaID INNER JOIN temporada tem 
                                                     ON rop.temporadaFK = tem.temporadaID INNER JOIN talla tal ON rop.tallaFK = tal.tallaID 
                                                     INNER JOIN color col ON rop.colorFK = col.colorID INNER JOIN cliente cli 
                                                     ON det.clienteFK = cli.clienteID where det.pedidoFK='$pedidoID'";
                $resultadoNombreCliente = mysqli_query($conexion,$consultaNombreCliente);
                $filasNombreCliente = mysqli_fetch_array($resultadoNombreCliente);
                $nombreCliente = $filasNombreCliente['NOMBRECOMPLETO'];

                $consultaArticulosPedido = "SELECT CONCAT(cli.nombre,' ',cli.aPaterno,' ',cli.aMaterno) AS NOMBRECOMPLETO, det.clienteFK, det.cantidad, det.importe, det.pedidoFK, rop.ropaID, gen.genero, tip.tipoRopa, cat.categoria, sub.subcategoria, tem.temporada, tal.talla, col.color, rop.precio, rop.descuento, rop.desTemp, rop.Pdescuento FROM detallecarrito det INNER JOIN ropa rop ON det.ropaFK = rop.ropaID INNER JOIN genero gen ON rop.generoFK = gen.generoID INNER JOIN tipoRopa tip ON rop.tipoRopaFK = tip.tipoRopaID INNER JOIN categoria cat ON rop.categoriaFK = cat.categoriaID INNER JOIN subcategoria sub ON rop.subcategoriaFK = sub.subcategoriaID INNER JOIN temporada tem ON rop.temporadaFK = tem.temporadaID INNER JOIN talla tal ON rop.tallaFK = tal.tallaID INNER JOIN color col ON rop.colorFK = col.colorID INNER JOIN cliente cli ON det.clienteFK = cli.clienteID 
                                            where det.pedidoFK='$pedidoID'";
                $resultadoArtivulosPedido = mysqli_query($conexion,$consultaArticulosPedido);
                
                    
            }  

              
        ?>

                  
            <div class="elPapu">            
                <form>
                    

                    <!-- DATOS GENERALES DE LA FACTURA -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                               Numero de Factura:
                        </div>
                        <div class="margen">
                            <?php echo $idFactura; ?>
                        </div class="margen">
                        <div class="tituloDatos">
                               Fecha:
                        </div>
                        <div class="margen">
                            <?php echo $filasVfactura['fecha']; ?>
                        </div class="margen">
                        <div class="tituloDatos">
                               Numero de Pedido:
                        </div>
                        <div class="margen">
                            <?php echo $filasVfactura['pedidoID']; ?>
                        </div class="margen">
                    </div>

                    <!-- NOMBRE DEL CLIENTE -->
                    <div class="elPapuContenido">
                        <div class="tituloDatos">
                               Cliente:
                        </div>
                        <div class="margen">
                            <?php echo $nombreCliente; ?>
                        </div class="margen">                        
                    </div>

                    <!-- WHILE PARA LLENAR LOS CAMPOS POR TODOS LOS ARTICULOS QUE PERTENEZCAN AL MISMO PEDIDO -->
                    <?php
                        while($filasArticulosPedido = mysqli_fetch_array($resultadoArtivulosPedido))
                        {
                    ?>
                                <!-- DATOS DE LOS ARTICULOS -->
                                <div class="elPapuContenido">
                                    <div class="tituloDatos">
                                        Articulo:
                                    </div>
                                    <div class="margen">
                                        <?php echo $filasArticulosPedido['tipoRopa']; ?>
                                    </div>

                                    <div class="tituloDatos">
                                        Subcategoria:
                                    </div>
                                    <div class="margen">
                                        <?php echo $filasArticulosPedido['subcategoria']; ?>
                                    </div>

                                    <div class="tituloDatos">
                                        Categoria:
                                    </div>
                                    <div class="margen">
                                        <?php echo $filasArticulosPedido['categoria']; ?>
                                    </div>
                                </div>



                                <!-- DATOS TEMPORADA -->
                                <div class="elPapuContenido">
                                    <div class="tituloDatos">
                                            Temporada:
                                    </div>
                                    <div class="margen">
                                        <?php echo $filasArticulosPedido['temporada']; ?>
                                    </div>
                                </div>

                                <!-- DATOS GENERO -->
                                <div class="elPapuContenido">
                                    <div class="tituloDatos">
                                            Genero:
                                    </div>
                                    <div class="margen">
                                        <?php echo $filasArticulosPedido['genero']; ?>
                                    </div>
                                </div>

                                

                                <!-- DATOS TALLA COLOR Y CANTIDAD EN INVENTARIO -->
                                <div class="elPapuContenido">                        
                                    <div class="tituloDatos">
                                            Talla:
                                    </div>
                                    <div class="margen">
                                        <?php echo $filasArticulosPedido['talla']; ?>
                                    </div>
                                    <div class="tituloDatos">
                                            Color:
                                    </div>
                                    <div class="margen">
                                        <?php echo $filasArticulosPedido['color']; ?>
                                    </div>
                                </div>

                                <!-- DATOS PRECIO -->
                                <div class="elPapuContenido">
                                    <div class="tituloDatos">
                                            Precio sin descuento:
                                    </div>
                                    <div class="margen">
                                        <?php echo $filasArticulosPedido['precio']; ?>
                                    </div>
                                    <div class="tituloDatos">
                                            Descuento:
                                    </div>
                                    <div class="margen">
                                        <?php echo $filasArticulosPedido['descuento']; ?>
                                    </div>
                                    <div class="tituloDatos">
                                            Descuento por Temporada:
                                    </div>
                                    <div class="margen">
                                        <?php echo $filasArticulosPedido['desTemp']; ?>
                                    </div>  
                                    <div class="tituloDatos">
                                            Precio con descuento:
                                    </div>
                                    <div class="margen">
                                        <?php echo $filasArticulosPedido['Pdescuento']; ?>
                                    </div>                         
                                </div>                                    
                        <?php
                            } // SE CIERRA LO QUE CONTIENE EL WHILE
                        ?>

                        <div class="elPapuContenido">
                            <div class="tituloDatos">
                                   TOTAL:
                            </div>
                            <div class="margen">
                                <?php echo $filasVfactura['importeTotal']; ?>
                            </div class="margen">                        
                        </div>

                        

                </form>
            </div>

    </main>
 
</body>

</html>