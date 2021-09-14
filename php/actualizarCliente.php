<?php
    include 'conexion.php';

    session_start();
    $usuario = $_SESSION['username'];
    $id = $_SESSION['id'];
    if(!isset($usuario))
    {
        header("location: ./login.php");
    }

    $nombre = $_POST['actualizarNombre'];
    $aPaterno = $_POST['actualizaraPaterno'];
    $aMaterno = $_POST['actualizaraMaterno'];
    $telefono = $_POST['actualizarTelefono'];
    $correo = $_POST['actualizarCorreo'];
    $calle = $_POST['actualizarCalle'];
    $noInt = $_POST['actualizarNoInt'];
    $noExt = $_POST['actualizarNoExt'];
    $estado = $_POST['actualizarEstado'];
    $municipioID = $_POST['actualizarMunicipio'];
    $coloniaID = $_POST['actualizarColonia'];


    $actualizarCuenta = "UPDATE CUENTA SET correo='$correo' WHERE cuentaID='$id'";

    if(mysqli_query($conexion,$actualizarCuenta))
    {
        // echo "OK $correo";
    }
    else
    {
        echo "No se pudo actualizar";
        echo mysqli_error($conexion);
    }
    

    if($nombre=="" || $aPaterno=="" || $aMaterno=="" || $telefono=="" || $correo="" || $calle=="" || $noInt=="" || $noExt=="")
    {
        header("refresh:3; datosCliente.php");
    }
    else
    {
        $actualizaCliente = "UPDATE CLIENTE SET nombre='$nombre', 
                                                aPaterno='$aPaterno',
                                                aMaterno='$aMaterno',
                                                telefono='$telefono',
                                                calle='$calle',
                                                numeroInterior='$noInt',
                                                numeroExterior='$noExt',
                                                estadoFK='$estado',
                                                municipioFK='$municipioID',
                                                coloniaFK='$coloniaID' WHERE clienteID='$id'";

        
        

        if(mysqli_query($conexion,$actualizaCliente))
        {
            
                ?>
                <html>
                    <head>
                        <link href="./CSS/style.css" rel="stylesheet">
                    </head>
                    <body>
                        <center>
                        <div class="actualizarAdmin">
                            <label class="mensajesOKsql">Registro Actualizado<?php echo $correo?><label>
                        </div>
                        <center>
                    </body>
                </html>
                <?php
                header("refresh:3; datosCliente.php");
            
        }
        else
        {
            echo "No se pudo actualizar";
            echo mysqli_error($conexion);
        }
    }

?>