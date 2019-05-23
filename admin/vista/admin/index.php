<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.html");
}elseif ($_SESSION['rol'] == 'user') {
    header("Location: ../usuario/index.php");
} 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <link rel="stylesheet" href="../admin/css/index.css">
    
</head>

<body>

    <?php
        include ("../archivos/cabeAdmin.php")
    ?>


    </div>
    <br>
    <br>
    <br>
    <br>

    <h1>Mensajes Recibidos</h1>
    <table>
        <tr>
            <th>Fecha</th>
            <th>Remitente</th>
            <th>Destinatario</th>
            <th>Asunto</th>
            <th></th>

        </tr>


        <?php





        ?>
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