<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.html");
} elseif ($_SESSION['rol'] == 'admin') {
    header("Location: ../admin/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../archivos/css/newMesseger.css">
</head>

<body>
    <?php
    include("../archivos/cabeUser.php")
    ?>



    <br>
    <br>
    <br>
    <br>

    <div class="contenedor">
      
        <form action="../controlador/user/newEmail.php" method="POST">
                <textarea name="mensaje" id="mensaje"  placeholder="Mensaje"></textarea><br>
                <input type="hidden" name="codigoRemitente" value="<?php echo ($_SESSION['codigo']) ?>"><br>
                <input type="mail" name="emailDestino" id="emailDestino" required placeholder="Destino"><br>
                <input type="text" name="asunto" id="asunto" value="Prueba"><br>
                <input type="submit" value="Ingresar">
            </form>




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