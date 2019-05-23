<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    header("Location: ../admin/index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../admin/css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="js/search.js"></script>
    <title>Mensajes enviados</title>
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
        <h2>Mensajes Enviados</h2>
        <section>
            <!-- <div class="buscar">
                <input type="search" placeholder="Buscar">
            </div> -->
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Destino</th>
                        <th>Asunto</th>
                        <th></th>
                    </tr>
                </thead>
            
                <tbody>
                    <?php
                    include '../../../config/conexionBD.php';
                    $sql = "SELECT * FROM usuario usu, mensaje msj WHERE usu.usu_codigo=msj.usu_destino AND 
                    msj.usu_remitente=" . $_SESSION['codigo'] . ";";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["mail_fecha"] . "</td>";
                            echo "<td>" . $row["usu_correo"] . "</td>";
                            echo "<td>" . $row["mail_asunto"] . "</td>";
                            echo ('<div id="floatWindow" class="floatWindow"></div>');
                            echo '<td><a onclick="openWindow(' . $row["mail_codigo"] . ',\'Para:\',\'usu_destino\')">Leer</a></td>';
                        }
                    } else {
                        echo "<tr>";
                        echo '<td colspan="10" class="db_null"><p>No tienes mensajes recibidos</p><i class="fas fa-exclamation-circle"></i></td>';
                        echo "</tr>";
                    }
                    $conn->close();
                    ?>


                </tbody>
            </table>

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