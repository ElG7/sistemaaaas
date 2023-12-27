<?php
class Ofertas extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = ' ofertas ';
        $this->views->getView('admin/ofertas', "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getOfertas(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '    <div class="d-flex">
            <button class="btn btn-primary" type="button" onclick="editOfert(' . $data[$i]['cod_oferta'] . ')"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="eliminarOfert(' . $data[$i]['cod_oferta'] . ')"><i class="fas fa-trash"></i></button>
        </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if (isset($_POST['cod_oferta'])) {
            $cod_oferta = $_POST['cod_oferta'];
            $descripcion = $_POST['descripcion'];
            $tiempo_inicio = $_POST['tiempo_inicio'];
            $tiempo_fin = $_POST['tiempo_fin'];
            $producto_cod_producto = $_POST['producto_cod_producto'];
            if (empty($cod_oferta) || empty($descripcion) || empty($tiempo_inicio) || empty($tiempo_fin) || empty($producto_cod_producto)) {
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                $result = $this->model->verificarOferta($cod_oferta);

                if (empty($result)) {
                        $data = $this->model->registrar($cod_oferta, $descripcion, $tiempo_inicio, $tiempo_fin, $producto_cod_producto);
                        if ($data > 0) {
                            $respuesta = array('msg' => 'Error al registrar', 'icono' => 'warning');
                        } else {
                            $respuesta = array('msg' => 'Oferta Registrada', 'icono' => 'success');
                        }
                } else {
                    $data = $this->model->modificar($cod_oferta, $descripcion, $tiempo_inicio, $tiempo_fin, $producto_cod_producto);
                    if ($data == 1) {
                        $respuesta = array('msg' => 'Error al modificar', 'icono' => 'warning');
                    } else {
                        $respuesta = array('msg' => 'Oferta Modificada', 'icono' => 'success');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }




    public function delete($idOfert)
    {
        if (is_numeric($idOfert)) {
            $data = $this->model->eliminar($idOfert);
            if ($data == 1) {
                $respuesta = array('msg' => 'Oferta dada de baja', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'error al eliminar', 'icono' => 'warning');
            }
        } else {
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }

    public function edit($idOfert)
    {
        if (is_numeric($idOfert)) {
            $data = $this->model->getOferta($idOfert);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
