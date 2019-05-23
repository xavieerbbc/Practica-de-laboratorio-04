<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.html");
}elseif ($_SESSION['rol'] == 'user') {
    header("Location: ../usuario/index.php");
} 
?>
<?php
session_start();

session_destroy();
header("Location: ../../../public/vista/login.html");


?>