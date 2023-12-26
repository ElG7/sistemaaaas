<?php
class Usuarios extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = ' usuarios ';
        $this->views->getView('admin/usuarios', "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getUsuarios(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '    <div class="d-flex">
            <button class="btn btn-primary" type="button" onclick="editUser(' . $data[$i]['rut'] . ')"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="eliminarUser(' . $data[$i]['rut'] . ')"><i class="fas fa-trash"></i></button>
        </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $rut = $_POST['rut'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $nom_usuario = $_POST['nom_usuario'];
            $contrasena = $_POST['contrasena'];
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            if (empty($_POST['nombre']) || empty($_POST['rut']) || empty($_POST['email']) || empty($_POST['telefono']) || empty($_POST['nom_usuario']) || empty($_POST['contrasena']) || empty($_POST['fecha_nacimiento'])) {
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                if (empty($rut)) {
                    $result = $this->model->verificarCorreo($email);
                    if (empty($result)) {
                        $data = $this->model->registrar($nombre, $rut, $email, $telefono, $nom_usuario, $hash, $fecha_nacimiento);
                        if ($data > 0) {
                            $respuesta = array('msg' => 'Error al registrar', 'icono' => 'warning');
                        } else {
                            $respuesta = array('msg' => 'Usuario Registrado', 'icono' => 'success');
                        }
                    } else {
                        $respuesta = array('msg' => 'Correo ya existe', 'icono' => 'warning');
                    }
                } else {
                    $data = $this->model->modificar($nombre, $rut, $email, $telefono, $nom_usuario, $fecha_nacimiento);
                        if ($data == 1) {
                            $respuesta = array('msg' => 'Error al modificar', 'icono' => 'warning');
                        } else {
                            $respuesta = array('msg' => 'Usuario Modificado', 'icono' => 'success');
                        }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }

    public function delete($idUser)
    {
        if (is_numeric($idUser)) {
            $data = $this->model->eliminar($idUser);
            if ($data == 1) {
                $respuesta = array('msg' => 'usuario dado de baja', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'error al eliminar', 'icono' => 'warning');
            }
        } else {
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }

    public function edit($idUser)
    {
        if (is_numeric($idUser)) {
            $data = $this->model->getUsuario($idUser);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
