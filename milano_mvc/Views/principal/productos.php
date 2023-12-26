<?php include_once __DIR__ . '/../Plantillas/header-inicio.php';
 ?>

<section class="container top-products">
     <!-- <div class="bgh-producto">
        <h1 class="heading-producto" style="color: white">Productos</h1>
      </div>-->
      <br>
    

      <div class="container-options">
        <a href= "<?php echo BASE_URL . 'principal/productos' ?>"><span class="active">Todos</span></a>
        <a href= "<?php echo BASE_URL . 'principal/categoriaBot' ?>"><span class="">Botes</span></a>
        <a href= "<?php echo BASE_URL . 'principal/categoriaPal' ?>"><span class="">Paletas</span></a>

        <!-- 
        <div>
          <label for="filtro" class="label-categoria"
            >Filtrar por categoría:</label
          >
          <select
            class="select-categoria"
            id="filtro"
            onchange="filtrarProductos()"
          >
            <option value="todos">Todos</option>
            <option value="menorPrecio">Menor Precio</option>
            <option value="menorPrecio">Mayor Precio</option>
            <option value="menorPrecio">Nombre ascendente</option>
            <option value="menorPrecio">Nombre descendente</option>
            <option value="menorPrecio">Fecha ascentente</option>
            <option value="electronica">Fecha descentente</option>
          </select>
        </div>-->
      </div>
              
              
      <div class="container-products">
        <?php foreach ($data['losProductos'] as $producto) { ?>
            <div class="card-product destacados">
              <div class="container-img">
               <img src="/../~brojas/interfaz2/milano_mvc/<?php echo $producto['imagen'] ?>" alt="<?php echo $producto['nombre_producto'] ?>" />
                
              </div>
              <div class="content-card-product">
                <h3><?php echo $producto['nombre_producto'] ?></h3>
                <span class="add-cart">
                  <a class="btn btn-util text-white btnAddcarrito" href="#" prod='<?php echo $producto['cod_producto'] ?>'>
                    <i class="fa-solid fa-basket-shopping"></i>
                  </a>
                </span>
                <p class="price">$<?php echo $producto['precio'] ?></p>
              </div>
            </div>
            <?php } ?>
          </div>
  </section>
<?php include_once __DIR__ . '/../Plantillas/footer-inicio.php'; ?>
    <script
      src="https://kit.fontawesome.com/81581fb069.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
