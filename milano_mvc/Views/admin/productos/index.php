<?php include_once 'Views/Plantillas/header-admin.php';  ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="listaProducto" data-bs-toggle="tab" data-bs-target="#listaProductoTab" type="button" role="tab" aria-controls="listaProducto" aria-selected="true">Productos</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="nuevoProducto" data-bs-toggle="tab" data-bs-target="#nuevoProductoTab" type="button" role="tab" aria-controls="nuevoProducto" aria-selected="false">Nuevo</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="listaProductoTab" role="tabpanel" aria-labelledby="listaProducto">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" style="width: 100;" id="tblProductos">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre Producto</th>
                                <th>Stock</th>
                                <th>Precio</th>
                                <th>Imagen</th>
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
    <div class="tab-pane fade" id="nuevoProductoTab" role="tabpanel" aria-labelledby="nuevoProducto">
        <!-- Aquí va el contenido de la pestaña Nuevo -->
        <div class="card">
            <div class="card-body">
                <form id="frmRegistro">
                    <div class="row">
                        <input type="hidden" id="imagen_actual" name="imagen_actual">
                        <div class="col-md-5">
                            <div class="form-group mb-2">
                                <label for="cod_producto">Codigo Producto</label>
                                <input id="cod_producto" class="form-control" type="number" name="cod_producto" placeholder="Codigo Producto">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group mb-2">
                                <label for="nombre_producto">Nombre Producto</label>
                                <input id="nombre_producto" class="form-control" type="text" name="nombre_producto" placeholder="Nombre Producto">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-2">
                                <label for="precio">Precio</label>
                                <input id="precio" class="form-control" type="number" name="precio" placeholder="Precio">
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
                                <label for="sabor">Sabor</label>
                                <input id="sabor" class="form-control" type="text" name="sabor" placeholder="Sabor">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-2">
                                <label for="fecha_vencimiento">Fecha Vencimiento</label>
                                <input id="fecha_vencimiento" class="form-control" type="date" name="fecha_vencimiento" placeholder="Fecha Vencimiento">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select id="categoria" class="form-control" name="categoria">
                                    <option value="">Seleccionar</option>
                                    <option value="Bote">Bote</option>
                                    <option value="Paleta">Paleta</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input id="imagen" class="form-control-file" type="file" name="imagen" placeholder="Imagen">
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
<script src="<?php echo BASE_URL . 'Assets/js/modulos/productos.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/bootstrap.bundle.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/es-ES.js'; ?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL . 'Assets/DataTables/datatables.min.js'; ?>"></script>