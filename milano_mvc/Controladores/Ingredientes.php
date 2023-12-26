<?php
class Ingredientes extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = ' ingredientes ';
        $this->views->getView('admin/ingredientes', "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getIngredientes(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '    <div class="d-flex">
            <button class="btn btn-primary" type="button" onclick="editIngre(' . $data[$i]['cod_ingrediente'] . ')"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="eliminarIngre(' . $data[$i]['cod_ingrediente'] . ')"><i class="fas fa-trash"></i></button>
        </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if (isset($_POST['nombre_ingrediente'])) {
            $nombre_ingrediente = $_POST['nombre_ingrediente'];
            $cod_ingrediente = $_POST['cod_ingrediente'];
            $detalle = $_POST['detalle'];
            $stock = $_POST['stock'];
            $producto_cod_producto = $_POST['producto_cod_producto'];
            $fecha_vencimiento = $_POST['fecha_vencimiento'];
            if ( empty($_POST['cod_ingrediente']) || empty($_POST['detalle']) || empty($_POST['stock']) || empty($_POST['producto_cod_producto'])|| empty($_POST['fecha_vencimiento'])) {
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                if (empty($cod_ingrediente)) {
                    $result = $this->model->verificarIngrediente($nombre_ingrediente);
                    if (empty($result)) {
                        $data = $this->model->registrar($nombre_ingrediente, $cod_ingrediente, $detalle, $stock, $producto_cod_producto, $fecha_vencimiento);
                        if ($data > 0) {
                            $respuesta = array('msg' => 'Error al registrar', 'icono' => 'warning');
                        } else {
                            $respuesta = array('msg' => 'Ingrediente Registrado', 'icono' => 'success');
                        }
                    } else {
                        $respuesta = array('msg' => 'Ingrediente ya existe', 'icono' => 'warning');
                    }
                } else {
                    $data = $this->model->modificar($nombre_ingrediente, $cod_ingrediente, $detalle, $stock, $producto_cod_producto, $fecha_vencimiento);
                        if ($data == 1) {
                            $respuesta = array('msg' => 'Error al modificar', 'icono' => 'warning');
                        } else {
                            $respuesta = array('msg' => 'Ingrediente Modificado', 'icono' => 'success');
                        }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }




    public function delete($idIngre)
    {
        if (is_numeric($idIngre)) {
            $data = $this->model->eliminar($idIngre);
            if ($data == 1) {
                $respuesta = array('msg' => 'producto dado de baja', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'error al eliminar', 'icono' => 'warning');
            }
        } else {
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }

    public function edit($idIngre)
    {
        if (is_numeric($idIngre)) {
            $data = $this->model->getIngrediente($idIngre);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
