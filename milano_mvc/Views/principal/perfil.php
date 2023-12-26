<?php include_once __DIR__ . '/../Plantillas/header-inicio.php';
?>
<style>
    #tblPedidos {
        width: 100%;
        /* Puedes ajustar el ancho según tus necesidades */
        font-size: 16px;
        /* Puedes ajustar el tamaño de fuente según tus necesidades */
    }

    #tblPedidos th,
    #tblPedidos td {
        text-align: center;
        /* Centra el texto en las celdas */
        padding: 10px;
        /* Puedes ajustar el espacio interno de las celdas según tus necesidades */

    }
</style>

<div class="container py-5">
    <?php if (!empty($_SESSION["emailCliente"])) { ?>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Pedido Actual</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pedidos-tab" data-toggle="tab" data-target="#pedidos" type="button" role="tab" aria-controls="pedidos" aria-selected="false">Pedidos</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" id="tableListaProductos">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>Seleccionar cantidad</th>
                                                <th>Subtotal</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <h3 id="totalProducto"></h3>
                                <button id="btnPagar" class="btn btn-success">Pagar</button>
                            </div>
                        </div>
                        <script>
                            const rutCliente = '<?php echo isset($_SESSION["rutCliente"]) ? $_SESSION["rutCliente"] : ""; ?>';
                        </script>


                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-lg">
                            <div class="card-body text-center">
                                <img class="img-thumbnail rounded-circle" src="https://st3.depositphotos.com/11742109/36001/v/450/depositphotos_360013274-stock-illustration-anonymous-gender-neutral-face-avatar.jpg" alt="" width="150">
                                <hr>
                                <p>
                                <p><?php echo $_SESSION['nombreCliente']; ?></p>
                                </p>
                                <p>
                                <p><?php echo $_SESSION['rutCliente']; ?></p>
                                </p>
                                <p><i class="fas fa-envelope"></i> <?php echo $_SESSION['emailCliente']; ?></p>
                            </div>
                            <a class="btn btn-primary" href="<?php echo BASE_URL . 'clientes/cerrar_sesion' ?>" role="button">Cerrar sesión</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pedidos" role="tabpanel" aria-labelledby="pedidos-tab">
                <div class="col-14">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped table-hover" id="tblPedidos" style="width: 100%;">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Monto</th>
                                                    <th>Fecha</th>
                                                    <th>Estado</th>
                                                    <th>#</th>
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
                </div>
            </div>
        </div>

    <?php } else { ?>
        <div class="alert alert-danger text-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <div class="h3">
                No estas registrado
            </div>
        </div>
    <?php } ?>
</div>

<div id="modalPedido" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles del pedido</h5>
                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
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
        </div>
    </div>
</div>


<?php include_once __DIR__ . '/../Plantillas/footer-inicio.php'; ?>
<script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL . 'Assets/DataTables/datatables.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL . 'Assets/js/es-ES.js'; ?>"></script>

<script src="<?php echo BASE_URL . 'Assets/js/clientes.js' ?>"></script>

</body>

</html>