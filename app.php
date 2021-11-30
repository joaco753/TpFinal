<?php
  include("./components/mainLayoutBegin.php");
  $controlador = new ControladorPaginas();
  $controlador->showView($controlador->getAccion());
  include("./components/mainLayoutEnd.php");
?>