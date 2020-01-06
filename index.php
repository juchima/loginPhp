<?php 
session_start();
$user="";
if(isset ($_SESSION['correo']))
{
  $user=$_SESSION['correo'];

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ingreso al sistema</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="assets/css/estilos.css" rel="stylesheet">
    <!-- <script src='main.js'></script> -->
</head>
<body>

    <?php  require_once 'parcials/header.php' ?>


    <?php if(!empty($user)):?>
    <br>"Bienvenido" <?= $user?>
    <br> Te encuentras logeado a la aplicación  
    <a href="logout.php"> Logout </a>
     
     <?php else :?>
    <h1>Login o Registro</h1>
    <a href="login.php">Login</a>
    <a href="registro.php">Registro</a>
     <?php endif; ?>

</body>
</html>