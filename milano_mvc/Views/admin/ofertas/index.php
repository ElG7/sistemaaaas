<?php include_once 'Views/Plantillas/header-admin.php';  ?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require  __DIR__ . '/PHPMailer/PHPMailer.php';
require  __DIR__ . '/PHPMailer/SMTP.php';
require __DIR__ . '/PHPMailer/Exception.php';

?>
<a class="btn btn-success mb-2" type="button" href="<?php echo BASE_URL . 'ofertas_wsp' ?>" id="btnEnviarWhatsApp" style="margin-left: 20px;">Enviar oferta WhatsApp</a>
<button class="btn btn-primary mb-2" type="button" id="btnEnviarCorreo" data-toggle="modal" data-target="#modalEnviarCorreo" style="margin-left: 20px;">Enviar oferta Correo</button>
<!-- Agrega esto al final de tu cuerpo HTML -->
<div class="modal fade" id="modalEnviarCorreo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enviar correo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">>
                    <label for="destinatario">Destinatario:</label>
                    <input type="email" name="destinatario" required>
                    <br>

                    <label for="asunto">Asunto:</label>
                    <input type="text" name="asunto" required>
                    <br>

                    <label for="mensaje">Mensaje:</label>
                    <textarea name="mensaje" required></textarea>
                    <br>
                    <label for="imagen">Adjuntar Imagen:</label>
                    <input type="file" name="imagen" accept="image/*">
                    <br>

                    <button type="submit" name="enviarCorreo">Enviar Correo</button>
                </form>

            </div>
        </div>
    </div>
</div>


<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="listaOferta" data-bs-toggle="tab" data-bs-target="#listaOfertaTab" type="button" role="tab" aria-controls="listaOferta" aria-selected="true">Productos</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="nuevoOferta" data-bs-toggle="tab" data-bs-target="#nuevoOfertaTab" type="button" role="tab" aria-controls="nuevoOferta" aria-selected="false">Nuevo</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="listaOfertaTab" role="tabpanel" aria-labelledby="listaOferta">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" style="width: 100;" id="tblOfertas">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descripcion</th>
                                <th>Descuento</th>
                                <th>Tiempo Inicio</th>
                                <th>Tiempo Fin</th>
                                <th>Producto</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nuevoOfertaTab" role="tabpanel" aria-labelledby="nuevoOferta">
        <!-- Aquí va el contenido de la pestaña Nuevo -->
        <div class="card">
            <div class="card-body">
                <form id="frmRegistro">
                    <div class="row">
                        <input type="hidden" id="imagen_actual" name="imagen_actual">
                        <div class="col-md-5">
                            <div class="form-group mb-2">
                                <label for="cod_oferta">Codigo Oferta</label>
                                <input id="cod_oferta" class="form-control" type="number" name="cod_oferta" placeholder="Codigo Oferta">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group mb-2">
                                <label for="descripcion">Descripcion</label>
                                <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripcion">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="descuento">Descuento</label>
                                <input id="descuento" class="form-control" type="number" name="descuento" placeholder="Descuento">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="tiempo_inicio">Tiempo Incio</label>
                                <input id="tiempo_inicio" class="form-control" type="date" name="tiempo_inicio" placeholder="Tiempo Inicio">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="tiempo_fin">Tiempo Fin</label>
                                <input id="tiempo_fin" class="form-control" type="date" name="tiempo_fin" placeholder="Tiempo Fin">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="producto_cod_producto">Producto</label>
                                <input id="producto_cod_producto" class="form-control" type="number" name="producto_cod_producto" placeholder="Producto">
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary" type="sumbit" id="btnAccion">Registrar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviarCorreo'])) {
    // Recoge los datos del formulario
    $destinatario = $_POST['destinatario'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    // Instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'coloringg7@gmail.com';
        $mail->Password   = 'gzuh qpqu yyyi rhwx';
        $mail->SMTPSecure = 'tls'; // tls o ssl
        $mail->Port       = 587; // o 465

        // Configuración del remitente y destinatario
        $mail->setFrom('coloringg7@gmail.com', 'Gelateria Milano');
        $mail->addAddress($destinatario, 'Giorgio');

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = $mensaje;

        if ($_FILES['imagen']['error'] == 0) {
            $imagen_tmp = $_FILES['imagen']['tmp_name'];
            $mail->AddAttachment($imagen_tmp, $_FILES['imagen']['name']);
        }
        // Enviar el correo
        $mail->send();
        echo 'Correo enviado con éxito';
        echo '<script>
            Swal.fire({
                icon: "success",
                title: "¡Correo enviado con éxito!",
                text: "Gelateria Milano",
                confirmButtonText: "Aceptar"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/admin/home";
                }
            });
          </script>';
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ', $mail->ErrorInfo;
    }
}
?>
<?php include_once 'Views/Plantillas/footer-admin.php';  ?>

</body>

</html>

<link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/css/bootstrap.min.css'; ?>">
<script src="<?php echo BASE_URL . 'Assets/js/modulos/ofertas.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/bootstrap.bundle.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/es-ES.js'; ?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL . 'Assets/DataTables/datatables.min.js'; ?>"></script>