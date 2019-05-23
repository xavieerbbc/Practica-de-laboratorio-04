<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../archivos/css/cabeUser.css">
</head>

<body>

    <header>
        <!--Menu de Navegacion-->
        <div class="ancho">
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="../usuario/newMessger.php">Nuevo Mensaje</a></li>
                    <li><a href="../usuario/sendmail.php">Mensajes Enviados</a></li>
                    <li><a href="../usuario/cuenta.php">Mi Cuenta</a></li>
                    <li><a href="../admin/cerrarSeccion.php">Cerrar sesión</a></li>

                </ul>

            </nav>

        </div>
        <div class="imag">


                <img src="<?php echo ('../../../img/fotos/' . $_SESSION["codigo"] . '/' . $_SESSION["img"]) ?>" alt=""> 
                <span><label><?php echo ($_SESSION['nom'] . ' ' . $_SESSION['ape']) ?></label></span>


        </div>

    </header>

</body>

</html>