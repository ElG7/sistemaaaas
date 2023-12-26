<?php include_once 'Views/Plantillas/header-admin.php';  ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="listaIngrediente" data-bs-toggle="tab" data-bs-target="#listaIngredienteTab" type="button" role="tab" aria-controls="listaIngrediente" aria-selected="true">Productos</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="nuevoIngrediente" data-bs-toggle="tab" data-bs-target="#nuevoIngredienteTab" type="button" role="tab" aria-controls="nuevoIngrediente" aria-selected="false">Nuevo</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="listaIngredienteTab" role="tabpanel" aria-labelledby="listaIngrediente">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" style="width: 100;" id="tblIngredientes">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre Ingrediente</th>
                                <th>Stock</th>
                                <th>Detalle</th>
                                <th>Codigo Producto que pertenece</th>
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
    <div class="tab-pane fade" id="nuevoIngredienteTab" role="tabpanel" aria-labelledby="nuevoIngrediente">
        <!-- Aquí va el contenido de la pestaña Nuevo -->
        <div class="card">
            <div class="card-body">
                <form id="frmRegistro">
                    <div class="row">
                        <input type="hidden" id="imagen_actual" name="imagen_actual">
                        <div class="col-md-5">
                            <div class="form-group mb-2">
                                <label for="cod_ingrediente">Codigo Ingrediente</label>
                                <input id="cod_ingrediente" class="form-control" type="number" name="cod_ingrediente" placeholder="Codigo Ingrediente">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group mb-2">
                                <label for="nombre_ingrediente">Nombre Ingrediente</label>
                                <input id="nombre_ingrediente" class="form-control" type="text" name="nombre_ingrediente" placeholder="Nombre Ingrediente">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-2">
                                <label for="detalle">Detalle</label>
                                <input id="detalle" class="form-control" type="text" name="detalle" placeholder="Detalle">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-2">
                                <label for="stock">Stock</label>
                                <input id="stock" class="form-control" type="number" name="stock" placeholder="Stock">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-2">
                                <label for="producto_cod_producto">Producto al cual pertenece</label>
                                <input id="producto_cod_producto" class="form-control" type="number" name="producto_cod_producto" placeholder="Producto al cual pertenece">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-2">
                                <label for="fecha_vencimiento">Fecha Vencimiento</label>
                                <input id="fecha_vencimiento" class="form-control" type="date" name="fecha_vencimiento" placeholder="Fecha Vencimiento">
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
<script src="<?php echo BASE_URL . 'Assets/js/modulos/ingredientes.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/bootstrap.bundle.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/es-ES.js'; ?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL . 'Assets/DataTables/datatables.min.js'; ?>"></script>