<?php 
 // Ubicamos la sesión
  session_start();

  session_unset();
  session_status();
  header('location:/loginPHP');


?>