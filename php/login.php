<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../imagenes/logoYireh.png" />
    
    <title>YIREH | INICIO DE SESIÓN</title>

    <!--–Fuente de texto externa Open Sans Condensed--->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&display=swap" rel="stylesheet">
    
    <!--–Hoja de estilos css para el formulario de inio de sesión--->
    <link rel="STYLESHEET" type="text/css" href="../css/formularios-estilos.css">
    <link href="../CSS/style.css" rel="stylesheet">

</head>
<body>

    <?php
        $pagina = $_POST['pagina'];
        if($pagina=="")
        {
            header("Location: ../html/index.html");
        }
    ?>

    <header> 

        <div class="barramenu">              
            <div class="imagenlogo">
                <img src="../imagenes/logo.png">
            </div>  
        </div> 

    </header>

    <hr>
    
    <div class="contenido">
        <div class="espacio"><!--Espacio--></div>

        <div class="formulario">

            <div class="actualizarAdmin">

                <div class="contenedorForm">
                
                    <div class="fraccionForm">
                        <h1>Inicia sesión en tu cuenta</h1>
                    </div>
                        
                    <div class="fraccionForm">
                        <form class="formAltaAdmin" action="./loguear.php" method="POST">
                            <h2>Usuario</h2>
                            <input type="text" name="usuario" placeholder="Correo electrónico...">
                            <br><br>
                            <h2>Contraseña</h2>
                            <input type="password" name="clave" placeholder="Contraseña...">
                            <br><br>
                            <button class="nuevoreg" type="submit" name="pagina" value="<?php echo $pagina; ?>">Iniciar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="espacio"><!--Espacio--></div>
    </div>

</body>
</html>
