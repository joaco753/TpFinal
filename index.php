<?php 
  ini_set('display_startup_errors',1);
  ini_set('display_errors',1);
  error_reporting(-1);

  require "./controller/ControladorPagina.php";
  $controlador = new ControladorPaginas();
  $controlador -> obtenerPagina();
?>