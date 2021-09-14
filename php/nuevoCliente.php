<?php

    require 'conexion.php';

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
    $coloniaID = $_POST['actualizarColonia'];

   
    if($nombre=="" || $aPaterno=="" || $aMaterno=="" || $telefono=="" || $correo=="" || $calle=="" || $noExt=="")
    {
        echo "
            <html>
                <head>
                    <link rel=\"STYLESHEET\" type=\"text/css\" href=\"../css/estilos.css\">
                    <link href=\"../CSS/style.css\" rel=\"stylesheet\">
                </head>
                <body>
                    <center>
                    <div class=\"actualizarAdmin\">
                        <label class=\"mensajesOKsql\">Datos Incompletos<label>
                    </div>
                    <center>
                </body>
            </html>";

        header("refresh:3; ./registro.php");
    }
    

    $sqlCrearCuenta = "INSERT INTO CUENTA(correo,password,estadoReg) VALUES('$correo','$clave','1')";
    

    //$sqlCrearCarrito = "INSERT INTO CARRITO(estadoReg) VALUES('1')";

    $consultaNoCuenta = "SELECT COUNT(*) AS cuenta FROM CUENTA";
    $resultadoNoCuenta = mysqli_query($conexion, $consultaNoCuenta);
    $filasNoCuenta = mysqli_fetch_array($resultadoNoCuenta);

    $cuentaFK = $filasNoCuenta['cuenta']+1;
    //echo $cuentaFK;

    $sqlCrearCliente = "INSERT INTO CLIENTE(nombre,aPaterno,aMaterno,telefono,cuentaFK,estadoFK,municipioFK,coloniaFK,calle,numeroExterior,numeroInterior,estadoReg)
                               VALUES ('$nombre','$aPaterno','$aMaterno','$telefono','$cuentaFK','$estadoID','$municipioID','$coloniaID','$calle','$noInt','$noExt','1')";

    

    if($resultadoSqlCrearCuenta = mysqli_query($conexion,$sqlCrearCuenta))
    {
            //echo "insertado cuenta";
    }
    /*if($resultadoSqlCrearCarrito = mysqli_query($conexion,$sqlCrearCarrito))
    {
            //echo "insertado carrito";
    }*/
    if($resultadoSqlCrearCliente = mysqli_query($conexion,$sqlCrearCliente))
    {
            //echo "insertado cliente";
    }
    
    $q = "SELECT * FROM CUENTA WHERE correo='$correo' and password='$clave'";
    $consulta = mysqli_query($conexion,$q);
    $array = mysqli_fetch_array($consulta);

    $id = $array['CUENTAID'];
    

    if($id!=0)
    {
        session_start();
        $_SESSION['id'] = $cuentaFK;

        echo "
            <html>
                <head>
                    <link rel=\"STYLESHEET\" type=\"text/css\" href=\"../css/estilos.css\">
                    <link href=\"../CSS/style.css\" rel=\"stylesheet\">
                </head>
                <body>
                    <center>
                    <div class=\"actualizarAdmin\">
                        <label class=\"mensajesOKsql\">Registro Exitoso<label>
                    </div>
                    <center>
                </body>
            </html>";

        header("refresh:3; ./index.php");
    }

    
    

?>