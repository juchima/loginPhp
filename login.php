<?php 
session_start();
if(isset($_SESSION['correo']))
{
header('location:/loginPHP');

}


if( !empty($_POST['correo']) &&  !empty($_POST['password']) )
{ 
    
    $correo= $_POST['correo'];
    $password=$_POST['password'];
    $UsuarioTxt='usuarioPlano.txt';
    $respuesta="";
    try 
    {   
        
        //Usuario Amdministador 
        //correo: admin , pass: admin
        if($correo=='admin' && password_verify($password ,'$2y$10$upar/WerfcyTn0RG1d.N4./XjaPcgZG9vHGqdSkneGEWELrgHX9K.'))
        {
           $_SESSION['correo']=$correo;
           header('location: /loginPHP');
          //lectura desde el txt. no puede leerlo =(
                // if(touch($UsuarioTxt))
                // {
                            
                //     $archivoID = fopen($UsuarioTxt, "r");
                    
                //     while( !feof($archivoID))
                //     {
                    
                //     $linea = fgets($archivoID, 1024);
                //     $registro= explode('||',$linea );
                    
                        
                //     }
                    
                //     fclose($archivoID);
                // }
        }
        else
        {
               $respuesta="Credenciales no válidas";
        } 


      
       
     
    } 
    catch (Exception $ex) 
    {
       die($ex->getMessage());
    }
   
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="assets/css/estilos.css" rel="stylesheet">
    <!-- <script src='main.js'></script> -->
</head>
<body>
    
    <?php  require_once 'parcials/header.php'?> 
    <h1>LOGIN</h1> 
    <span> o <a href="registro.php">Registro</a></span>
  
   <?php if(!empty($respuesta)) :?>
    <p><?=  $respuesta ?></p>
   <?php  endif;?> 

    <form action="login.php" method="POST" >
        <input type="text" name="correo" placeholder="Correo">
        <input type="password" name="password" placeholder="Contraseña">
         <input type="submit" value="Ingresar">
    </form>
    
</body>
</html>