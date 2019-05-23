
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../admin/vista/admin/index.php");
} 
?>
<?php


$consulta = ConsultarUsuario($_GET['usu_codigo']);

function ConsultarUsuario($codigo)
{
    include '../../../config/conexionBD.php';

    $sql = "SELECT * FROM usuario WHERE usu_codigo= '" . $codigo . "' ";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return [
        $row['usu_cedula'],
        $row['usu_nombres'],
        $row['usu_apellidos'],
        $row['usu_direccion'],
        $row['usu_telefono'],
        $row['usu_correo'],
        $row['usu_fecha_nacimiento']
    ];
    $conn->close();
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

                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="../admin/cerrarSeccion.php">Cerrar Seccion</a></li>
                </ul>
            </nav>

        </div>

    </header>
    <br>
    <br>
    <br>
    <form action="../admin/modificar_usuario2.php" method="POST">
        <h2>Creacion de nuevos Usuarios</h2>
        <input type="hidden" name="uso_codigo" value="<?php echo $_GET['usu_codigo'] ?>">
        <input type="text" name="cedula" placeholder="Cedula" value="<?php echo $consulta[0] ?>" required>
        <input type="text" name="nombres" placeholder="Nombre" value="<?php echo $consulta[1] ?>" required>
        <input type="text" name="apellidos" placeholder="Apellido" value="<?php echo $consulta[2] ?>" required>
        <input type="text" name="direccion" placeholder="Direccion" value="<?php echo $consulta[3] ?>" required>
        <input type="text" name="telefono" placeholder="Telefono" value="<?php echo $consulta[4] ?>" required>
        <input type="email" name="correo" placeholder="Email" value="<?php echo $consulta[5] ?>" required>
        <input type="date" name="fechaNacimiento" value="<?php echo $consulta[6] ?>" required>


        <input id="boton" type="submit" value="Guardar" required>
        <!-- <input type="reset" id="cancelar" name="cancelar" value="Cancelar" /> -->


    </form>

</body>

</html>