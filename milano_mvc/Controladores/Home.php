<?php
class Home extends Controlador
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Pagina Principal';
        $data['topProductos'] = $this->model->getTopProductos();
        $this->views->getView('Home', "index", $data);
    }

}