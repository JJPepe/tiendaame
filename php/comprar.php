<?php
    require 'conexion.php';
    session_start();

    $clienteID = $_SESSION['id'];
    //CONSULTA SUMA DEL TOTAL DE LOS ARTICULOS
    $consultaTotal = "SELECT SUM(importe) FROM DETALLECARRITO WHERE CLIENTEFK='$clienteID' AND pedido='NOCONFIRMADO' AND ESTADOREG='1'";
    $resultadoTotal = mysqli_query($conexion,$consultaTotal);
    $filasTotal = mysqli_fetch_array($resultadoTotal);
    $importeTotal = $filasTotal['SUM(importe)'];

   
    //CONSULTA NUMERO DE PEDIDO
    $consultaPedidoID = "SELECT pedidoFK FROM DETALLECARRITO WHERE CLIENTEFK='$clienteID' AND pedido='NOCONFIRMADO' AND ESTADOREG='1'";
    $resultadoPedidoID = mysqli_query($conexion,$consultaPedidoID);
    $filasPedidoID = mysqli_fetch_array($resultadoPedidoID);
    $pedidoID = $filasPedidoID['pedidoFK'];
    

    echo $clienteID."\n".$pedidoID."\n".$importeTotal;

    if(!isset($pedidoID))
    {
        header("Location: ./carrito.php");
    }
    else
    {
        // ACTUALIZA PEDIDO CON EL IMPORTE TOTAL
        $actualizarPedido = "UPDATE pedido SET importeTotal = '$importeTotal' WHERE pedidoID='$pedidoID'";
        $ejecutarActualizarPedido = mysqli_query($conexion,$actualizarPedido);

        // SE INSERTAN LOS DATOS DE LA FACTURA CON EL ID DEL PEDIDO SERA EL MISMO PARA LA FACTURA
        $insertarFactura = "INSERT INTO factura(facturaID, pedidoFK, rfc, estadoReg, clienteFK) VALUES('$pedidoID','$pedidoID','N/A','1','$clienteID')";
        $ejecutaInsertarFactura = mysqli_query($conexion,$insertarFactura);

        // SE ACTUALIZA LA COLUMNA PEDIDO DE DETALLECARRITO A CONFIRMADO
        $actualizarDetalleCarrito = "UPDATE detallecarrito SET pedido = 'CONFIRMADO' WHERE pedidoFK='$pedidoID'";
        $ejecutarActualizarCarrito = mysqli_query($conexion,$actualizarDetalleCarrito);

        // SE ACTUALIZA LA COLUMNA ESTADOREG DE PEDIDO A 0
        $actualizarPedido = "UPDATE pedido SET estadoReg = '0' WHERE pedidoID='$pedidoID'";
        $ejecutarActualizarPedido = mysqli_query($conexion,$actualizarPedido);

        echo "
            <html>
                <head>

                <!--Fuente de texto externa Allura-->
                <link href=\"https://fonts.googleapis.com/css2?family=Allura&display=swap\" rel=\"stylesheet\">

                    <link rel=\"STYLESHEET\" type=\"text/css\" href=\"../css/estilos.css\">
                    <link href=\"../CSS/style.css\" rel=\"stylesheet\">
                </head>
                
                <body>

                    <header> 
                        <div class=\"barramenu\">              
                            <div class=\"imagenlogo\">
                                <img src=\"../imagenes/logo.png\">
                            </div>  
                        </div> 
                    </header>

                    <hr>

                    <center>
                        <div class=\"contenido\">

                            <div class=\"espacio\"><!--Espacio--></div>
                            
                            <div class=\"formulario contenedorForm\">
                                <div class=\"actualizarAdmin\">
                                    <label class=\"mensajesOKsql\">
                                    <h1>Compra realizada con exito</h1>
                                    <label>
                                </div>
                            </div>
                        </div>
                    <center>
                </body>
            </html>";

    header("Refresh:3; ./facturasCliente.php");

    }

    
?>