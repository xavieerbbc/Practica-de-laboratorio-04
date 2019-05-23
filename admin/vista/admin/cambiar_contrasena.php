<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.html");
}elseif ($_SESSION['rol'] == 'user') {
    header("Location: ../usuario/index.php");
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practica Hipermedial</title>
    <link rel="stylesheet" href="../admin/css/modificar_usuario.css"> 
    <link rel="stylesheet" href="../../../public/vista/css/cabecera.css"> 
</head>

<body>
<header>
        <!--Menu de Navegacion-->
        <div class="ancho">
            <nav>
                <ul>
                 
                  <li><a href="index.php">Modificar</a></li>
                  <li><a href="../admin/cerrarSeccion.php">Cerrar Seccion</a></li>
                </ul>
            </nav>
    
        </div>
    
    </header>
    <br>
    <br>
    <br>
    
    <form action="../admin/cambiar_contrasena2.php?usu_cod=<?php $cod=$_GET["usu_cod"]; echo($cod);?>" method="POST">
        <h2> Cambiar contraseña</h2>


        <input type="password" name="actual" placeholder="Actual" required>
        <input type="password" name="nueva" placeholder="Nueva Contrasena"  required>
        <input type="password" name="repnueva" placeholder="Repetir contraseña nueva"  required>
     


        <input id="boton" type="submit" value="Guardar Cambios" required>
        
    </form>

</body>

</html>