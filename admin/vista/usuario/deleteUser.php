<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.html");
} elseif ($_SESSION['rol'] == 'admin') {
    header("Location: ../admin/index.php");
}
?>
<?php
include '../../../config/conexionBD.php';
$cod = isset($_GET["usu_cod"]) ? trim($_GET["usu_cod"]) : null;
$delete = isset($_GET["delete"]) ? trim($_GET["delete"]) : null;
$date = date(date("Y-m-d H:i:s"));
if ($cod != null and $delete == true) {
    $sql = "UPDATE usuario SET usu_eliminado='S', usu_fecha_modificacion='$date' WHERE usu_codigo='$cod';";
    $result = $conn->query($sql);
    header("Location: cuenta.php");
} elseif ($cod != null and $delete == false) {
    $sql = "UPDATE usuario SET usu_eliminado='N', usu_fecha_modificacion='$date' WHERE usu_codigo='$cod';";
    $result = $conn->query($sql);
    header("Location: cuenta.php");
} else {
    header("Location: cuenta.php");
}
$conn->close();
?>