<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.html");
} elseif ($_SESSION['rol'] == 'admin') {
    header("Location: ../admin/index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <link rel="stylesheet" href="../admin/css/index.css"> 
    <link rel="stylesheet" href="../archivos/css/buscar.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="../usuario/js/busca.js"></script>

</head>

<body>

    <?php
    include("../archivos/cabeUser.php")
    ?>



    <br>
    <br>
    <br>
    <br>

    <h1>Mensajes Recibidos</h1>

    <div class="buscar">
        <button>
            <i class="fas fa-search"></i>
        </button>
        <input type="search" id="buscarRemitente" placeholder="Buscar por remitente" onkeyup="buscar(this)">
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Remitente</th>
                <th>Asunto</th>
                <th></th>

            </tr>
        </thead>


        <tbody id="data">
                    <?php
                    include '../../../config/conexionBD.php';
                    $sql = "SELECT * FROM usuario usu, mensaje msj WHERE usu.usu_codigo=msj.usu_remitente AND 
                    msj.usu_destino=" . $_SESSION['codigo'] . ";";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["mail_fecha"] . "</td>";
                            echo "<td>" . $row["usu_correo"] . "</td>";
                            echo "<td>" . $row["mail_asunto"] . "</td>";
                            echo ('<div id="floatWindow" class="floatWindow"></div>');
                            echo '<td><a onclick="openWindow(' . $row["mail_codigo"] . ',\'De:\',\'usu_remitente\')">Leer</a></td>';
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