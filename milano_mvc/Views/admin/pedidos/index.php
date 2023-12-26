<?php include_once 'Views/Plantillas/header-admin.php';  ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="listaPedidos" data-bs-toggle="tab" data-bs-target="#listaPedidosTab" type="button" role="tab" aria-controls="listaPedidos" aria-selected="true">Pedidos</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="nuevoPedidos" data-bs-toggle="tab" data-bs-target="#nuevoPedidosTab" type="button" role="tab" aria-controls="nuevoPedidos" aria-selected="false">Finalizados</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="listaPedidosTab" role="tabpanel" aria-labelledby="listaPedidos">
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
    <div class="tab-pane fade" id="nuevoPedidosTab" role="tabpanel" aria-labelledby="nuevoPedidos">
        <!-- Aquí va el contenido de la pestaña Nuevo -->
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



<?php include_once 'Views/Plantillas/footer-admin.php';  ?>

</body>

</html>

<link rel="stylesheet" href="<?php echo BASE_URL . 'Assets/css/bootstrap.min.css'; ?>">
<script src="<?php echo BASE_URL . 'Assets/js/modulos/pedidos.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/bootstrap.bundle.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/es-ES.js'; ?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL . 'Assets/DataTables/datatables.min.js'; ?>"></script>