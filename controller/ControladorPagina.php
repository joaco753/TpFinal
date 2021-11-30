<?php
    include_once "./controller/conexion.php";
    include_once "./models/Auto.php";

    class ControladorPaginas {
        private $accion;
        private $searchQuery;
        private $notify;

        public function __construct() {
            $this->accion      = isset($_GET['accion']) ? $_GET['accion'] : "inicio";
            $this->searchQuery = isset($_GET['query'])  ? $_GET['query']  : false;
            $this->notify      = isset($_GET['notify']) ? $_GET['notify'] : false;
        }

        public function getAccion() { return $this->accion; }
        public function getSearchQuery() { return $this->searchQuery; }

        public function plantilla(){
            include_once "./app.php";
        }

        public function obtenerPagina(){
            return $this -> plantilla();

            if( isset($_GET['accion']) ){
                
                $accion = $_GET['accion'];
                
                return $this->$accion();
            }
            else{
                return $this -> plantilla();
            }

        }

        private function showView($actionName) {
            switch($actionName) {
                case "mostrar":
                    $autos = Auto::consultar($this->searchQuery);
                    $searchQuery = $this->searchQuery;
                    $notify = $this->notify;
                    switch($notify) {
                        case 'addsuccess':
                            $notifyText = 'Se ha registrado el vehículo';
                            break;
                        case 'editsuccess':
                            $notifyText = 'Se han guardado los cambios satisfactoriamente';
                            break;
                        case 'deletesuccess':
                            $notifyText = 'Se ha eliminado el vehículo del sistema';
                            break;
                        default:
                            $notify = false;
                    }
                    break;
                case "registrar":
                    if($_POST){
                        $marca = $_POST['marca'];
                        $modelo = $_POST['modelo'];
                        $anio = $_POST['anio'];
                        $precio = $_POST['precio'];
                        Auto::registrar($marca, $modelo, $anio, $precio);
                        return header("Location: index.php?accion=mostrar&notify=addsuccess");
                    }
                    break;
                case "editar":
                    if($_POST){
                        $id = $_POST['id'];
                        $marca = $_POST['marca'];
                        $modelo = $_POST['modelo'];
                        $anio = $_POST['anio'];
                        $precio = $_POST['precio'];
                        Auto::editar($id, $marca, $modelo, $anio, $precio);
                        return header("Location: index.php?accion=mostrar&notify=editsuccess");
                    }
                    if(isset($_GET['id'])){
                        $auto = Auto::buscar($_GET['id']);
                    }
                    break;
                case "borrar":
                    if(isset($_POST['id'])){
                        Auto::borrar($_POST['id']);
                        return header("Location: index.php?accion=mostrar&notify=deletesuccess");
                    }
                    if(isset($_GET['id'])){
                        $auto = Auto::buscar($_GET['id']);
                    }
                    break;
            }
            return include_once "./views/" . $actionName . ".php";
        }
    }

?>