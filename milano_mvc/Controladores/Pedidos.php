<?php
class Pedidos extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = ' pedidos ';
        $this->views->getView('admin/pedidos', "index", $data);
    }

    public function listarPendientes()
    {
        $data = $this->model->getPedidos('Pendiente');
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '<img class="d-flex">
            <button class="btn btn-info" type="button" onclick="cambiarProceso(' . $data[$i]['cod_pedido'] . ')"><i class="fas fa-check-circle"></i></button>
        </div>';
        }
        echo json_encode($data);
        die();
    }

    public function listarCompletados()
    {
        $data = $this->model->getPedidos('Completado');
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '<img class="d-flex">
            <button class="btn btn-primary" type="button" onclick="eliminarPro(' . $data[$i]['cod_pedido'] . ')"><i class="fas fa-circle"></i></button>
        </div>';
        }
        echo json_encode($data);
        die();
    }
    public function update($idPedido)
    {
        if (is_numeric($idPedido)) {
            $data = $this->model->actualizarEstado('Completado',$idPedido);
            if ($data == 0) { // Si es true, actualización exitosa
                $respuesta = array('msg' => 'pedido actualizado', 'icono' => 'success');
            } else { // Si es false, error en la actualización
                $respuesta = array('msg' => 'error al actualizar', 'icono' => 'warning');
            }
            echo json_encode($respuesta);
        }
        die();
    }
}
