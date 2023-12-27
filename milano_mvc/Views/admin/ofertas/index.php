<?php include_once 'Views/Plantillas/header-admin.php';  ?>

<a class="btn btn-success mb-2" href="<?php echo BASE_URL . 'WhatsappAPI'; ?>" id="btnEnviarWhatsApp" style="margin-left: 20px;">Enviar oferta WhatsApp</a>
<button class="btn btn-primary mb-2" type="button" id="btnEnviarCorreo" style="margin-left: 20px;">Enviar oferta Correo</button>

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



<?php include_once 'Views/Plantillas/footer-admin.php';  ?>

</body>

</html>

<link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/css/bootstrap.min.css'; ?>">
<script src="<?php echo BASE_URL . 'Assets/js/modulos/ofertas.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/bootstrap.bundle.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/es-ES.js'; ?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL . 'Assets/DataTables/datatables.min.js'; ?>"></script>