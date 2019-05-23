
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../admin/vista/admin/index.php");
} elseif ($_SESSION['rol'] == 'user') {
   // header("Location: ../usuario/index.php");
}
?>


<?php

    include '../../config/conexionBD.php';

    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;

    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena')";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $_SESSION['isLogin'] = true;
        $_SESSION['codigo']=$row["usu_codigo"];
        $_SESSION['rol']=$row["rol"];
        $_SESSION['nom']=$row["usu_nombres"];
        $_SESSION['ape']=$row["usu_apellidos"];
        $_SESSION['img']=$row["img"];
        
        header("Location: ../../admin/vista/admin/index.php");
    } else {
        header("Location: ../vista/login.html");
    }
    $conn->close();

?>