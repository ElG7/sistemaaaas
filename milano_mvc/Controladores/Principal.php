<?php
class Principal extends Controlador
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {

    }
    public function productos()
    {
        $data['title'] = 'Productos';
        $data['losProductos'] = $this->model->getProductos();
        $this->views->getView('principal', "productos", $data);
    }
    
    public function sobre_nosotros(){
        $data['title'] = 'Sobre Nosotros';
        $this->views->getView('principal', "sobre_nosotros", $data);
    }

    public function categoriaPal()
    {
        $data['title'] = 'Paletas';
        $data['paletas'] = $this->model->getPaletas();
        $this->views->getView('principal', "categoriaPal", $data);
    }
    public function categoriaBot()
    {
        $data['title'] = 'Botes';
        $data['botes'] = $this->model->getBotes();
        $this->views->getView('principal', "categoriaBot", $data);
    }
    
    public function listaProductos()
{
    // Recibir datos del cuerpo de la solicitud
    $datos = file_get_contents('php://input');
    $json = json_decode($datos, true);
        $array['producto'] = array();
        $total = 0;

        if (!empty($json)) {
            foreach ($json as $producto) {
                $result = $this->model->getListaProducto($producto['cod_producto']);
               
                if (isset($result[0]['cod_producto'])) {
                    $data['cod_producto'] = $result[0]['cod_producto'];
                } else {
                    $data['cod_producto'] = null;
                }
    
                // Repite esto para otros índices (nombre_producto, precio, imagen)
                if (isset($result[0]['nombre_producto'])) {
                    $data['nombre_producto'] = $result[0]['nombre_producto'];
                } else {
                    $data['nombre_producto'] = null;
                }
    
                if (isset($result[0]['precio'])) {
                    $data['precio'] = $result[0]['precio'];
                } else {
                    $data['precio'] = null;
                }
    
                if (isset($result[0]['imagen'])) {
                    $data['imagen'] = $result[0]['imagen'];
                } else {
                    $data['imagen'] = null;
                }
                
                $subTotal = $data['precio'] * $producto['cantidad'];
                $data['subTotal'] = number_format($subTotal);
                
                array_push($array['producto'], $data);
                $total += $subTotal;
            }
        }        

        $array['total'] = $total;
        $array['moneda'] = MONEDA;
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die();
    }
}