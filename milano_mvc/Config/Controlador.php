<?php
class Controlador {
    protected $views, $model;
    public function __construct()
    {
        $this->views = new Vistas();
        $this->cargarModel();
    }
    public function cargarModel()
    {
        $model = get_class($this)."Model";
        $ruta = "Modelos/".$model.".php";
        if (file_exists($ruta)) {
            require_once $ruta;
            $this->model = new $model();
        }
    }
}

?>
