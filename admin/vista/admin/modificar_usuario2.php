<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.html");
}elseif ($_SESSION['rol'] == 'user') {
    header("Location: ../usuario/index.php");
} 
?>

<?php

ModificarUsuario(
    $_POST['cedula'],
    $_POST['nombres'],
    $_POST['apellidos'],
    $_POST['direccion'],
    $_POST['telefono'],
    $_POST['correo'],
    $_POST['fechaNacimiento'],
    $_POST['uso_codigo']
);

function ModificarUsuario($cedula, $nombres, $apellidos, $direccion, $telefono, $correo, $fechaNac, $usu_codigo)
{


    include '../../../config/conexionBD.php';
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());

    $sql = "UPDATE usuario SET usu_cedula='" . $cedula . "', usu_nombres= '" . $nombres . "', usu_apellidos='" . $apellidos . "', 
    usu_direccion='" . $direccion . "', usu_telefono='" . $telefono . "', usu_correo='" . $correo . "', usu_fecha_nacimiento='" . $fechaNac . "' 
    , usu_fecha_modificacion= '$fecha' 
    WHERE usu_codigo='" . $usu_codigo . "'";

    header("Location: index.php");
    $conn->query($sql);
    $conn->close();
}
?>