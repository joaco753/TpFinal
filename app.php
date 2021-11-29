<?php
  include("./components/mainLayoutBegin.php");
  //A partir del metodo obtener paginas del controladore iremos cambiando la pagina
  $controlador = new ControladorPaginas();
  $controlador->showView($controlador->getAccion());
  include("./components/mainLayoutEnd.php");
?>