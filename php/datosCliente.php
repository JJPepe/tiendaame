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
                
        <div class="mainAdm-contenedor">
            
            <div class="elPapu elPapu-datosCliente">

                <form action="editarCliente.php" method="POST">
                    <br>
                    <h3>
                        <?php echo $filas['NOMBRECOMPLETO']?>
                    </h3>
                    <br>

                <!-- DATOS NOMBRE DEL CLIENTE-->
                <div class="elPapuContenido">
                        <div class="tituloDatos datos-cliente">
                            <h1>Nombre:</h1>
                            <p>
                                <?php echo $filas['nombre']?>
                            </p>
                        </div>
                </div>

                <!-- DATOS APELLIDO PATERNO DEL CLIENTE-->
                <div class="elPapuContenido">
                        <div class="tituloDatos datos-cliente">
                            <h1>Apellido Paterno:</h1>
                            <p>
                                <?php echo $filas['aPaterno']?>
                            </p>
                        </div>
                </div>

                <!-- DATOS APELLIDO MATERNO DEL CLIENTE-->
                <div class="elPapuContenido">
                        <div class="tituloDatos datos-cliente">
                            <h1>Apellido Materno:</h1>
                            <p>
                                <?php echo $filas['aMaterno']?>
                            </p>
                        </div>
                </div>

                <!-- DATOS TELEFONO DEL CLIENTE-->
                <div class="elPapuContenido">
                        <div class="tituloDatos datos-cliente">
                            <h1>Telefono:</h1>
                            <p>
                                <?php echo $filas['telefono']?>
                            </p>
                        </div>
                </div>

                <!-- DATOS USUARIO DEL CLIENTE-->
                <div class="elPapuContenido">
                        <div class="tituloDatos datos-cliente">
                            <h1>Usuario:</h1>
                            <p>
                                <?php echo $filas['correo']?>
                            </p>
                        </div>
                </div>

                <!-- DATOS CONTRASEÑA DEL CLIENTE-->
                <div class="elPapuContenido">
                        <div class="tituloDatos datos-cliente">
                            <h1>Contraseña:</h1>
                            <p>
                                <?php echo "••••••••"?>
                            </p>
                        </div>
                </div>
                
                <!-- DATOS DIRECCION DEL CLIENTE -->
                <div class="elPapuContenido">

                        <!--CALLE,numero-->
                        <div class="tituloDatos datos-cliente">
                            <h1>Dirección:</h1><br>
                                <p>
                                    Calle &nbsp <p><?php echo $filas['calle']?>
                                    , número interior &nbsp<p><?php echo $filas['numeroInterior']?>
                                    , número exterior &nbsp<p><?php echo $filas['numeroExterior']?>
                                    , <p><?php echo $filas['colonia']?>
                                    &nbsp  <p><?php echo $filas['municipio']?>
                                    , &nbsp  <p><?php echo $filas['estado']?>
                                </p>
                        </div>

                </div>
                
                <a class="nuevoreg" id="cancelarRegistro" href="../php/index.php">Volver</a>
                    <button type="submit" class="nuevoreg boton-datosCliente">Editar</button>
                

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