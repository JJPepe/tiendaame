<?php
    require 'conexion.php';
    session_start();

    $clienteID = $_SESSION['id'];
    $ropaID = $_POST['ropaID'];
    
    //echo $clienteID;
    //echo $ropaID;
    //echo date("d")."-".date("M")."-".date("Y");

    
    if(!isset($clienteID))
    {
        header("location: ../html/index.html"); // Regresar al Login si la sesion no esta activa
    }

    else
    {
        $consultaNumeroPedido = "SELECT COUNT(*) FROM PEDIDO";
        $resultadoNumeroPedido = mysqli_query($conexion,$consultaNumeroPedido);
        $filasNumeroPedido = mysqli_fetch_array($resultadoNumeroPedido);
        $pedidoID = $filasNumeroPedido['COUNT(*)'] + 1;

        $cantidad = 1;

        $consultaPrecioPrenda = "SELECT Pdescuento FROM ROPA WHERE ropaID ='$ropaID'";
        $resultadoPrecioPrenda = mysqli_query($conexion,$consultaPrecioPrenda);
        $filasPrecioPrenda = mysqli_fetch_array($resultadoPrecioPrenda);

        $importe = $filasPrecioPrenda['Pdescuento'] * $cantidad;   
        
        date_default_timezone_set("America/Mexico_City");
        $fecha = date("Y")."-".date("m")."-".date("d");

        // CONSULTA PARA SABER SI EL CLIENTE YA TIENE UN PEDIDO QUE NO HA FINALIZADO    
        $consultaClientePedido = "SELECT pedidoID FROM pedido WHERE clienteFK='$clienteID' and estadoReg='1'"; //Estado en 1 para pedido activo, estado 0 para lo contrario
        $resultadoClientePedido = mysqli_query($conexion,$consultaClientePedido);
        $filasClientePedido = mysqli_fetch_array($resultadoClientePedido);
        
        

        if(!isset($filasClientePedido['pedidoID']))
        {   

            // INSERTAR PRIMERO EN TABLA PEDIDO
            $insertarPedidoSQL = "INSERT INTO PEDIDO(pedidoID,clienteFK,fecha,estadoReg) VALUES('$pedidoID','$clienteID','$fecha','1')";
            $ejecutaInsertPedidoSQL = mysqli_query($conexion,$insertarPedidoSQL);

            echo "PEDIDO CREADO";

            $consultaNumeroDetalleCarrito = "SELECT COUNT(*) FROM DETALLECARRITO";
            $resultadoNumeroDetalleCarrito = mysqli_query($conexion,$consultaNumeroDetalleCarrito);
            $filasNumeroDetalleCarrito = mysqli_fetch_array($resultadoNumeroDetalleCarrito);
            $detalleCarritoID = $filasNumeroDetalleCarrito['COUNT(*)']+1;

            $insertarDetalleCarrito = "INSERT INTO DETALLECARRITO(detalleCarritoID,ropaFK,cantidad,importe,estadoReg,pedidoFK,clienteFK,pedido) VALUES($detalleCarritoID,'$ropaID','1','$importe','1','$pedidoID','$clienteID','NOCONFIRMADO')";
            $ejecutaInsertPedidoSQL = mysqli_query($conexion,$insertarDetalleCarrito);

            
            header("Location: carrito.php");
            

        }
        else
        {
            $pedidoID = $filasClientePedido['pedidoID'];

            $consultaNumeroDetalleCarrito = "SELECT COUNT(*) FROM DETALLECARRITO";
            $resultadoNumeroDetalleCarrito = mysqli_query($conexion,$consultaNumeroDetalleCarrito);
            $filasNumeroDetalleCarrito = mysqli_fetch_array($resultadoNumeroDetalleCarrito);
            $detalleCarritoID = $filasNumeroDetalleCarrito['COUNT(*)']+1;

            $insertarDetalleCarrito = "INSERT INTO DETALLECARRITO(detalleCarritoID,ropaFK,cantidad,importe,estadoReg,pedidoFK,clienteFK,pedido) VALUES($detalleCarritoID,'$ropaID','1','$importe','1','$pedidoID','$clienteID','NOCONFIRMADO')";
            $ejecutaInsertPedidoSQL = mysqli_query($conexion,$insertarDetalleCarrito);

            echo "YA TENIA EL PEDIDO .$pedidoID. SE AGREGA A CARRITO";

            echo mysqli_error($conexion);

            header("Location: carrito.php");

        }   
        
    }

?>