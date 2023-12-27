<?php
class WhatsappAPI extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = ' WhatsappAPI ';
        $this->views->getView('WhatsappAPI/public', "index", $data);
    }
    
}