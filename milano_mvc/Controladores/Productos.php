<?php
class Productos extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = ' productos ';
        $this->views->getView('admin/productos', "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getProductos(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['imagen'] = '<img class="img-thumbnail" src="' . $data[$i]['imagen'] . '" alt="' . $data[$i]['nombre_producto'] . '" width="50">';
            $data[$i]['accion'] = '<img class="d-flex">
            <button class="btn btn-primary" type="button" onclick="editPro(' . $data[$i]['cod_producto'] . ')"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="eliminarPro(' . $data[$i]['cod_producto'] . ')"><i class="fas fa-trash"></i></button>
        </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if (isset($_POST['nombre_producto']) && isset($_POST['cod_producto'])) {
            $nombre_producto = $_POST['nombre_producto'];
            $cod_producto = $_POST['cod_producto'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $imagen = $_FILES['imagen'];
            $tmp_name = $imagen['tmp_name'];
            $categoria = $_POST['categoria'];
            $sabor = $_POST['sabor'];
            $fecha_vencimiento = $_POST['fecha_vencimiento'];
            $ruta = 'img_prod/';
            $nombreImg = date('YmdHis');
            if (empty($nombre_producto) || empty($precio) || empty($stock) || empty($imagen) || empty($categoria) || empty($sabor) || empty($fecha_vencimiento)) {
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                $existeProducto = $this->model->existeProducto($cod_producto);
                
                if (!empty($imagen['name'])) {
                    $destino = $ruta . $nombreImg . '.jpg';
                } else if (!empty($_POST['imagen_actual']) && empty($imagen['name'])) {
                    $destino = $_POST['imagen_actual'][0];
                } else {
                    $destino = $ruta . 'default.png';
                }
                if (empty($existeProducto)) {
                    $data = $this->model->registrar($nombre_producto, $cod_producto, $precio, $stock, $sabor, $fecha_vencimiento, $categoria, $destino);
                    if ($data > 0) {
                        if (!empty($imagen['name'])) {
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'producto registrado', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'error al registrar', 'icono' => 'error');
                    }
                } else {
                    $data = $this->model->modificar($nombre_producto, $cod_producto, $precio, $stock, $sabor, $fecha_vencimiento, $categoria, $imagen);
                    if ($data == 1) {
                        if (!empty($imagen['name'])) {
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'producto modificado', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'error al modificar', 'icono' => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }




    public function delete($idPro)
    {
        if (is_numeric($idPro)) {
            $data = $this->model->eliminar($idPro);
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

    public function edit($idPro)
    {
        if (is_numeric($idPro)) {
            $data = $this->model->getProducto($idPro);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
