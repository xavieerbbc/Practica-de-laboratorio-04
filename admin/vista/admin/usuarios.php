<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.html");
} elseif ($_SESSION['rol'] == 'user') {
    header("Location: ../usuario/index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <link rel="stylesheet" href="../admin/css/index.css">
    <link rel="stylesheet" href="../../../public/vista/css/cabecera.css">
</head>

<body>


    <?php
    include("../archivos/cabeAdmin.php")
    ?>



    </div>
    <br>
    <br>
    <br>
    <br>

    <h1>Lista de usuarios</h1>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
            <th>Eliminar</th>
            <th>Modificar</th>
            <th>Cambiar Contrasena</th>
        </tr>


        <?php



        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM usuario WHERE usu_eliminado='N'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["usu_codigo"] . "</td>";
                echo "<td>" . $row["usu_cedula"] . "</td>";
                echo "<td>" . $row['usu_nombres'] . "</td>";
                echo "<td>" . $row['usu_apellidos'] . "</td>";
                echo "<td>" . $row['usu_direccion'] . "</td>";
                echo "<td>" . $row['usu_telefono'] . "</td>";
                echo "<td>" . $row['usu_correo'] . "</td>";
                echo "<td>" . $row['usu_fecha_nacimiento'] . "</td>";

                if ((string)$row["usu_eliminado"] === 'N') {
                    echo '<td><a href="eliminar.php?usu_codigo=' . $row["usu_codigo"] . '&delete=' . true . '">Eliminar</a></td>';
                } else {
                    echo '<td><a href="eliminar.php?usu_codigo=' . $row["usu_codigo"] . '">Activar</a></td>';
                }

                echo '<td><a href="modificar_usuario.php?usu_codigo=' . $row['usu_codigo'] . '">Modificar Usuario</a></td>';

                echo '<td><a href="cambiar_contrasena.php?usu_cod=' . $row["usu_codigo"] . '">Cambiar Contrasena</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }
        $conn->close();

        ?>
    </table>
</body>

</html>