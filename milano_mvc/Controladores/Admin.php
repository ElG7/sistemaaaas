 <?php
class Admin extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Acceso Admin';
        $this->views->getView('admin', "login", $data);
    }
    public function   validar()
    {
        if (isset($_POST['email']) && isset($_POST['contrasena'])) {
            if (empty($_POST['email']) || empty($_POST['contrasena'])) {
                $respuesta = array('msg' => 'todo los campos son requeridos', 'icono' => 'warning');
            } else {
                $data = $this->model->getUsuario($_POST['email']);
                if (empty($data)) {
                    $respuesta = array('msg' => 'el correo no existe', 'icono' => 'warning');
                } else {
                    $usuarioData = $data[0];

                    if (isset($usuarioData['contrasena'])) {
                        if (password_verify($_POST['contrasena'], $usuarioData['contrasena'])) {
                            $_SESSION['email'] = $usuarioData['email'];
                            $respuesta = array('msg' => 'Datos correctos', 'icono' => 'success');
                        } else {
                            $respuesta = array('msg' => 'contraseña incorrecta', 'icono' => 'warning');
                        }
                    } else {
                        // Manejar el caso en que 'contrasena' no está en $usuarioData
                        $respuesta = array('msg' => 'Error interno, contacte al administrador', 'icono' => 'error');
                    }
                }
            }
        } else {
            $respuesta = array('msg' => 'error desconocido', 'icono' => 'error');
        }
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function home()
    {

        $data['title'] = 'Panel Administrativo';
        $data['pendientes'] = $this->model->getPendientes();
        $data['aceptados'] = $this->model->getAceptados();
        $data['completados'] = $this->model->getCompletados();
        $data['ventas'] = $this->model->getTotales();
        $data['ventasPorDia'] = $this->model->getVentasPorUltimos7Dias();
        $data['prodMasVendido'] = $this->model->getProductosMasVendidos();
        $data['prodMenorStock'] = $this->model->getProductosMenorStock();
        $data['prodMenosVendido'] = $this->model->getProductosMenosVendidos();
        $this->views->getView('admin/administracion', "index", $data);
        
    }
}
