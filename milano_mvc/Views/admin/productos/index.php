<?php include_once 'Views/Plantillas/header-admin.php';  ?>

<button class="btn btn-primary mb-2" type="button" id="nuevo_registro">Nuevo</button>

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
    
<div id="nuevoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal"></h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="frmRegistro">
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group mb-2">
                        <label for="rut">RUT</label>
                        <input id="rut" class="form-control" type="number" name="rut" placeholder="RUT">
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Correo</label>
                        <input id="email" class="form-control" type="email" name="email" placeholder="Correo Electronico">
                    </div>
                    <div class="form-group mb-2">
                        <label for="contrasena">Contraseña</label>
                        <input id="contrasena" class="form-control" type="password" name="contrasena" placeholder="Contraseña">
                    </div>
                    <div class="form-group mb-2">
                        <label for="telefono">Telefono</label>
                        <input id="telefono" class="form-control" type="number" name="telefono" placeholder="Telefono">
                    </div>
                    <div class="form-group mb-2">
                        <label for="nom_usuario">Nombre de Usuario</label>
                        <input id="nom_usuario" class="form-control" type="text" name="nom_usuario" placeholder="Nombre de Usuario">
                    </div>
                    <div class="form-group mb-2">
                        <label for="fecha_nacimiento">Fecha Nacimiento</label>
                        <input id="fecha_nacimiento" class="form-control" type="date" name="fecha_nacimiento" placeholder="Fecha Nacimiento">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="sumbit" id ="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                </div>
                
            </form>
        </div>
    </div>
</div>




    <?php include_once 'Views/Plantillas/footer-admin.php';  ?>

    </body>

    </html>

    <script src="<?php echo BASE_URL . 'Assets/js/modulos/productos.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/js/es-ES.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo BASE_URL . 'Assets/DataTables/datatables.min.js'; ?>"></script>