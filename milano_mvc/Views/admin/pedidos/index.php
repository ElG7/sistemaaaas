<?php include_once 'Views/Plantillas/header-admin.php';  ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="PedidosPendientes" data-bs-toggle="tab" data-bs-target="#PedidosPendientesTab" type="button" role="tab" aria-controls="PedidosPendientes" aria-selected="true">Pendientes</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="PedidosAceptado" data-bs-toggle="tab" data-bs-target="#PedidosAceptadoTab" type="button" role="tab" aria-controls="PedidosAceptado" aria-selected="false">Aceptados</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="PedidosFinalizados" data-bs-toggle="tab" data-bs-target="#PedidosFinalizadosTab" type="button" role="tab" aria-controls="PedidosFinalizados" aria-selected="false">Finalizados</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="PedidosPendientesTab" role="tabpanel" aria-labelledby="PedidosPendientes">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" style="width: 100;" id="tblPendientes">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Monto</th>
                                <th>Fecha Pedido</th>
                                <th>Cliente</th>
                                <th>Estado</th>
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
    <div class="tab-pane fade show" id="PedidosAceptadoTab" role="tabpanel" aria-labelledby="PedidosAceptado">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" style="width: 100;" id="tblAceptados">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Monto</th>
                                <th>Fecha Pedido</th>
                                <th>Cliente</th>
                                <th>Estado</th>
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
    <div class="tab-pane fade show" id="PedidosFinalizadosTab" role="tabpanel" aria-labelledby="PedidosFinalizados">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" style="width: 100;" id="tblCompletados">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Monto</th>
                                <th>Fecha Pedido</th>
                                <th>Cliente</th>
                                <th>Estado</th>
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
</div>

<div id="modalPedidos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Productos</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle" id="tablePedidos" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <?php include_once 'Views/Plantillas/footer-admin.php';  ?>

    </body>

    </html>

    <link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/css/bootstrap.min.css'; ?>">
    <script src="<?php echo BASE_URL . 'Assets/js/modulos/pedidos.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/js/bootstrap.bundle.min.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/js/es-ES.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo BASE_URL . 'Assets/DataTables/datatables.min.js'; ?>"></script>