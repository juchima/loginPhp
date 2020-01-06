<?php 

   if( !empty($_POST['correo']) &&  !empty($_POST['password']) )
   { 
       
       $correo= $_POST['correo'];
       $password=$_POST['password'];
       $UsuarioTxt='usuarioPlano.txt';
       $Respuesta="";
       try 
       {
          //Cifrando Contraseña
          $passwordCifrado= password_hash($password, PASSWORD_DEFAULT);   
          //Preparando Contenido a guardar
          $contenido="<registro>".$correo."||".$passwordCifrado."</registro>";    
          //Guardando en .text
          $Respuesta= guardarUsuario($UsuarioTxt ,$contenido);
        
       } 
       catch (Exception $ex) 
       {
          die($ex->getMessage());
       }
      
   }

   
     function guardarUsuario($UsuarioTxt,$contenido)
    {  
        
        try
         {
            $fi=fopen($UsuarioTxt,"a");
            fwrite($fi,$contenido);
            $mensaje= 'Usuario creado de forma exitosa';

         } 
            catch (Exception $ex)
         {
            die($ex->getMessage());
            $mensaje= 'Ocurrió un error';
         }
        
           return $mensaje; 
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="assets/css/estilos.css" rel="stylesheet">
    <!-- <script src='main.js'></script> -->
</head>
<body>
    
    <?php  require_once 'parcials/header.php'?> 
     
    <?php  if( !empty($Respuesta)): ?>
       <p> <?= $Respuesta ?> </p>
    <?php  endif; ?>

    <h1>Registro</h1>
    <span>o <a href="login.php"> Login</a></span>

    <form action="registro.php" method="POST" >
        <input type="text" name="correo" placeholder="Correo">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="password" name="confirmarPassword" placeholder="Confirmar Contraseña">
         <input type="submit" value="Guardar">
    </form>
    
</body>
</html>