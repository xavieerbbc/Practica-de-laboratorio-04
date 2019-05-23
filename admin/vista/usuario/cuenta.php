<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.html");
} elseif ($_SESSION['rol'] == 'admin') {
    header("Location: ../admin/index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/admin_style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../admin/css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Mi cuenta</title>
</head>

<body>

    <header>
        <?php
        include("../archivos/cabeUser.php")
        ?>
    </header>
    <br>
    <br>
    <br>
    <br>
    <div id="contenedor">
        <h2>Mi Cuenta</h2>
        <section>
            <table>
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Direccion</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Fecha Nacimiento</th>
                        <th>Foto</th>
                        <th>Eliminar</th>
                        <th>Modificar</th>
                        <th>Cambiar contraseña</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../../../config/conexionBD.php';
                    $sql = "SELECT * FROM usuario WHERE usu_codigo=" . $_SESSION['codigo'] . ";";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<tr>";
                        echo "<td>" . $row["usu_cedula"] . "</td>";
                        echo "<td>" . $row["usu_nombres"] . "</td>";
                        echo "<td>" . $row["usu_apellidos"] . "</td>";
                        echo "<td>" . $row["usu_direccion"] . "</td>";
                        echo "<td>" . $row["usu_correo"] . "</td>";
                        echo "<td>" . $row["usu_telefono"] . "</td>";
                        echo "<td>" . $row["usu_fecha_nacimiento"] . "</td>";
                        echo '<td><img src="../../../img/fotos/' . $row["usu_codigo"] . '/' . $row["img"] . '" alt=""></td>';

                        if ((string)$row["usu_eliminado"] === 'N') {
                            echo '<td><a href="deleteUser.php?usu_cod=' . $row["usu_codigo"] . '&delete=' . true . '">Eliminar</a></td>';
                        } else {
                            echo '<td><a href="deleteUser.php?usu_cod=' . $row["usu_codigo"] . '">Activar</a></td>';
                        }
                        $user = serialize($row);
                        $user = urlencode($user);
                        echo '<td><a href="modificaCuenta.php?user=' . $user . '">Modificar</a></td>';
                        echo '<td><a href="modificarPss.php?usu_cod=' . $row["usu_codigo"] . '">Cambiar contraseña</a></td>';
                        echo "</tr>";
                    } else {
                        echo "<tr>";
                        echo '<td colspan="10" class="db_null"><p>No existen usuarios registrados en el sistema</p><i class="fas fa-exclamation-circle"></i></td>';
                        echo "</tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <?php
            $cod = isset($_GET["delete"]) ? trim($_GET["delete"]) : null;
            if ($cod == true) {
                echo "<p>Usuario eliminado</p>";
            }
            ?>
        </section>
    </div>
   

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



    <footer>
        <?php
        include("../archivos/piePagina.php");
        ?>
    </footer>
</body>

</html>