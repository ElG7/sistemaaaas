<?php include_once 'Views/Plantillas/header-admin.php';  ?>




<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Estadisticas</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- pedidos pendientes -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pedidos pendientes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['pendientes'][0]['total'] ?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- pedidos aceptados -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pedidos aceptados</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['aceptados'][0]['total'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-spinner fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pedidos completados -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pedidos completados</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['completados'][0]['total'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- total de ventas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total de ventas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo '$' . number_format($data['ventas'][0]['total_montos'], 0, ',', '.'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        
        
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ventas durante los ultimos 7 dias</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Productos mas vendidos</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

    <!-- Primer Gráfico -->
    <div class="col-lg-6 mb-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Productos con poco stock</h6>
                <!-- ... (Código de la barra de herramientas) -->
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="chart_poco_stock"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <!-- ... (Cualquier otro contenido específico) -->
                </div>
            </div>
        </div>
    </div>

    <!-- Segundo Gráfico -->
    <div class="col-lg-6 mb-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Productos menos vendidos</h6>
                <!-- ... (Código de la barra de herramientas) -->
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="chart_menos_vendidos"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <!-- ... (Cualquier otro contenido específico) -->
                </div>
            </div>
        </div>
    </div>

</div>


            <!-- Color System -->
    </div>

</div>
<!-- /.container-fluid -->
<!-- Page level custom scripts -->
<script>
    
            const ventasPorDia = <?php echo json_encode($data['ventasPorDia']); ?>;
            const prodMasVendido = <?php echo json_encode($data['prodMasVendido']); ?>;
            const prodMenorStock =  <?php echo json_encode($data['prodMenorStock']); ?>;
            const prodMenosVendido = <?php echo json_encode($data['prodMenosVendido']); ?>;

</script>

            <script src="https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Assets/js/demo/chart-area-demo.js"></script>
            <script src="https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Assets/js/demo/chart-pie-demo.js"></script>
            <script src="https://acinfo.inf.unap.cl/~brojas/interfaz2/milano_mvc/Assets/vendor/fontawesome-free/js/all.min.js"></script>



<?php include_once 'Views/Plantillas/footer-admin.php';  ?>