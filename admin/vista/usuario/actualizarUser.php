<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.html");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Modificar Usuario</title>
</head>

<body>
   
    <section>

        <h1 class="tittle">Gestion de usuarios</h1>

        <div class="formulario crear_usuario">
        <?php
            include '../../../config/conexionBD.php';
            $foto = $_FILES['foto']['name'];
            $temp = $_FILES['foto']['tmp_name'];
            $type = $_FILES['foto']['type'];
            move_uploaded_file($temp, "../../../img/fotos/" . $_POST["usu_codigo"] . "/$foto");
            $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
            $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
            $apellido = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;
            $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
            $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
            $email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
            $fechaNac = isset($_POST["fechaNac"]) ? trim($_POST["fechaNac"]) : null;
            $cod = $_POST["usu_codigo"];
            $date = date(date("Y-m-d H:i:s"));
            $sql = "UPDATE usuario SET
                        usu_cedula='" . $cedula . "',
                        usu_nombres='" . $nombre . "',
                        usu_apellidos='" . $apellido . "',
                        usu_direccion='" . $direccion . "',
                        usu_telefono='" . $telefono . "',
                        usu_correo='" . $email . "',
                        usu_fecha_nacimiento='$fechaNac',
                        usu_fecha_modificacion='$date',
                        img='" . $_FILES['foto']['name'] . "'
                        WHERE usu_codigo='$cod'";
            if ($conn->query($sql) == true) {
                echo "<h2>Datos actualizados con exito</h2>";
                echo '<i class="far fa-check-circle"></i>';
                header("Location: cuenta.php");
            } else {
                if ($conn->errno == 1062) {
                    echo "<h2>Las cedula $cedula ya existe</h2>";
                    echo '<i class="fas fa-exclamation-circle"></i>';
                } else {
                    echo "<h2>Error al actualizar losa datos " . mysqli_error($conn) . "</h2>";
                    echo '<i class="fas fa-exclamation-circle"></i>';
                }
            }
            $conn->close();
            ?>
            <a href="cuenta.php">Regresar</a>
        </div>
    </section>




</body>

</html>