<?php

class Clientes extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        if(empty($_SESSION["emailCliente"])) {
            header("Location: ". BASE_URL);
        }
        $data['title'] = 'Tu Perfil';
        $data['verificar'] = $this->model->getVerificar($_SESSION["emailCliente"]);
        $this->views->getView('principal', "perfil", $data);
    }
    public function registrarse()
    {
        if (isset($_POST['nombre']) && isset($_POST['contrasena'])) {
            $nombre = $_POST['nombre'];
            $nom_usuario = $_POST['nom_usuario'];
            $rut = $_POST['rut'];
            $telefono = $_POST['telefono'];
            $fdn = $_POST['fecha_nacimiento'];
            $email = $_POST['email'];
            $contrasena = $_POST['contrasena'];
            $hash = password_hash($contrasena,PASSWORD_DEFAULT);
            $data = $this->model->registroDirecto($nombre, $nom_usuario, $rut, $telefono, $fdn, $email, $hash)+1;

            if ($data > 0) {
                $_SESSION['emailCliente'] = $email;
                $_SESSION['nombreCliente'] = $nombre;
                $mensaje = array('msg' => 'registrado con éxito', 'icono' => 'success');
            } else {
                $mensaje = array('msg' => 'error al registrarse', 'icono' => 'error');
            }
            
            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
            die();
        }

        #else {
        #   $mensaje = array('msg' => 'YA TIENES UNA CUENTA', 'icono' => 'warning');
        #}
    }
    public function iniciar_sesion()
    {
        if (isset($_POST['correoLogin']) && isset($_POST['contrasenaLogin'])) {
            if (empty($_POST['correoLogin']) || empty($_POST['contrasenaLogin'])) {
                $mensaje = array('msg' => 'TODOS LOS CAMPOS SON REQUERIDOS', 'icono' => 'warning');
            } else {
                $email = $_POST['correoLogin'];
                $contrasena = $_POST['contrasenaLogin'];
                $verificar = $this->model->getVerificar($email);
                
                if (!empty($verificar)) {
                    $usuarioData = $verificar[0];
                
                if (!empty($verificar)) {
                    if (password_verify($contrasena, $usuarioData['contrasena'])) {
                        $_SESSION['rutCliente'] = $usuarioData['rut'];
                        $_SESSION['emailCliente'] = $usuarioData['email'];
                        $_SESSION['nombreCliente'] = $usuarioData['nombre'];
                        $mensaje = array('msg' => 'OK', 'icono' => 'success');
                    } else {
                        $mensaje = array('msg' => 'CONTRASEÑA INCORRECTA', 'icono' => 'error');
                    }
                } 
                } else {
                    $mensaje = array('msg' => 'EL CORREO NO EXISTE', 'icono' => 'warning');
                }
            }
            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
            die();
        }

        #else {
        #   $mensaje = array('msg' => 'YA TIENES UNA CUENTA', 'icono' => 'warning');
        #}
    }
    public function registrar_pedido()
{
    // Verificar que la solicitud sea de tipo POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $pedidos = $json['pedidos'];
        $productos = $json['productos'];
        $resultadoPedido = $this->model->registrarPedido(
            $pedidos['cod_pedido'],
            $pedidos['monto'],
            $pedidos['estado'],
            $pedidos['fecha_pedido'],
            $pedidos['cliente_rut']
        );
        
        $resultadoPedido = 1;
        // Responder con el resultado
        if ($resultadoPedido > 0) {
            // El pedido se registró correctamente, ahora registrar el detalle
            foreach ($productos as $producto) {
                
                $temp = $this->model->getProducto($producto['cod_producto']);
                if (isset($temp[0]['nombre_producto'])) {
                    $nombre_producto['nombre_producto'] = $temp[0]['nombre_producto'];
                } else {
                    $nombre_producto['nombre_producto'] = null;
                }
                if (isset($temp[0]['precio'])) {
                    $precio['precio'] = $temp[0]['precio'];
                } else {
                    $precio['precio'] = null;
                }
                if (isset($temp[0]['cod_producto'])) {
                    $cod_producto['cod_producto'] = $temp[0]['cod_producto'];
                } else {
                    $cod_producto['cod_producto'] = null;
                }

                $resultadoDetalle = $this->model->registrarDetalle(
                    $nombre_producto['nombre_producto'],
                    $precio['precio'],
                    $producto['cantidad'],
                    $pedidos['cod_pedido'],
                    $cod_producto['cod_producto']
                );
                
                $this->model->actualizarStock($producto['cantidad'],$cod_producto['cod_producto']);

                if ($resultadoDetalle  <= 0) {
                    // Manejar el caso en que no se pudo registrar el detalle
                    // Puedes lanzar un error, log o realizar acciones adicionales
                    $mensaje = array('msg' => 'Error al registrar el detalle', 'icono' => 'error');
                    echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
                    die();
                }
            }

            // El detalle se registró correctamente
            
            $mensaje = array('msg' => 'Pedido registrado correctamente', 'icono' => 'success');
        } else {
            // Manejar el caso en que no se pudo registrar el pedido
            // Puedes lanzar un error, log o realizar acciones adicionales
            
            $mensaje = array('msg' => 'Error al registrar el pedido', 'icono' => 'error');
        }

        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }
}

    //listar productos pendientes
    public function listarPedidos()
    {   
        $rut = $_SESSION['rutCliente'];
        $data = $this->model->getPedidos($rut);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '    <div class="d-center">
            <button class="btn btn-primary" type="button" onclick="verPedido('.$data[$i]['cod_pedido'].')"><i class="fas fa-eye"></i></button>
        </div>';
        }
        echo json_encode($data);
        die();
    }
 
     public function verPedido($cod_pedido)
     {
         $data['producto'] = $this->model->verPedidos($cod_pedido);
         echo json_encode($data);
         die();
     }

     public function cerrar_sesion() {

        session_destroy();
        header('Location: ' . BASE_URL);
}}
