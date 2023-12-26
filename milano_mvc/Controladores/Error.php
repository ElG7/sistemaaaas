<?php
class Errors extends Controlador
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView('Errores', "index");
    }
}