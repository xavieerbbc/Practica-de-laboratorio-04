<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.html");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../public/vista/css/crear_usuario.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <title>Modificar Usuario</title>
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
    <section>
        <div class="contenedor">

            <?php
            $data = $_GET["user"];
            $datos = stripslashes($data);
            $datos = urldecode($datos);
            $datos = unserialize($datos);
            ?>
            <form enctype="multipart/form-data" action="actualizarUser.php" method="post">

                <h2>Editar Datos</h2>
                <input type="hidden" name="usu_codigo" value="<?php echo ($datos["usu_codigo"]); ?>">
                <input type="text" name="cedula" id="cedula" value="<?php echo ($datos["usu_cedula"]); ?>" required>
                <input type="text" name="nombre" id="nombre" value="<?php echo ($datos["usu_nombres"]); ?>" required>
                <input type="text" name="apellido" id="apellido" value="<?php echo ($datos["usu_apellidos"]); ?>" required>
                <input type="text" name="direccion" id="direccion" value="<?php echo ($datos["usu_direccion"]); ?>" required>
                <input type="text" name="telefono" id="telefono" value="<?php echo ($datos["usu_telefono"]); ?>" required>
                <input type="date" name="fechaNac" id="fechaNac" value="<?php echo ($datos["usu_fecha_nacimiento"]); ?>" required>
                <input type="email" name="email" id="email" value="<?php echo ($datos["usu_correo"]); ?>" required>

                <div class="foto">

                <img src="<?php echo ('../../../img/fotos/' . $_SESSION["codigo"] . '/' . $_SESSION["img"]) ?>" alt="">
                    <br>
                    <input type="file" name="foto" id="foto">

                </div>

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </section>

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