<?php
require("../../config/conexionBD.php");
//incluir conexión a la base de datos

include '../../config/conexionBD.php';

$foto = $_FILES['foto']['name'];
$temp = $_FILES['foto']['tmp_name'];
$type = $_FILES['foto']['type'];


echo ($_FILES['foto']['name']);

$sql = "SELECT MAX(usu_codigo)+1 AS codigo  FROM usuario;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$directorio = "../../img/fotos/" . $row['codigo'] . "/";
mkdir($directorio, 0777, true);
move_uploaded_file($temp, "../../img/fotos/" . $row['codigo'] . "/$foto");


$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
$nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
$apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
$correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
$fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]) : null;
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;



$sql = "INSERT INTO usuario () VALUES (
    0, 
    '$cedula', 
    '$nombres', 
    '$apellidos', 
    '$direccion', 
    '$telefono', 
    '$correo',
    MD5('$contrasena'), 
    '$fechaNacimiento', 
    'N', 
    null, 
    null,
    'user',
    '" . $_FILES['foto']['name'] . "'
)";




if ($conn->query($sql) === TRUE) {
    echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
    header("Location: ../vista/login.html");
} else {
    if ($conn->errno == 1062) {
        echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
    } else {
        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    }
}
//cerrar la base de datos
$conn->close();
//echo "<a href='../vista/crear_usuario.html'>Regresar</a>";
?>



?>