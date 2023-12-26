<?php include_once 'Views/Plantillas/header-inicio.php'; ?>

		<section class="banner">
			<div class="content-banner">
				<p>Helado Delicioso</p>
				<h2>100% Natural <br />Helado Fresco</h2>
				<a href="<?php echo BASE_URL . 'principal/productos' ?>">Comprar ahora</a>
			</div>
		</section>

		<main class="main-content">
			<section class="container container-features">
				<div class="card-feature">
					<i class="fa-solid fa-location-dot"></i>
					<div class="feature-content">
						<span>Visita nuestro local</span>
						<p>Vicente Zegers 999</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-ice-cream"></i>
					<div class="feature-content">
						<span>Variedad de productos</span>
						<p>Botes y paletas disponibles</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-phone-volume"></i>
					<div class="feature-content">
						<span>Si tienes dudas, contactanos</span>
						<p>+56 9 83647598</p>
					</div>
				</div>
			</section>

			<section class="container top-categories">
				<h1 class="heading-1">¡Nuestras Categorías!</h1>
				<div class="container-categories">
					<div class="card-category category-moca">
						<p>BOTES</p>
						<a href="<?php echo BASE_URL . 'principal/categoriaBot' ?>">Ver mas</a>
					</div>
					<div class="card-category category-expreso">
					<p>VARIOS</p>
						<a href="<?php echo BASE_URL . 'principal/productos' ?>">Ver mas</a>
					</div>
					<div class="card-category category-capuchino">
						<p>PALETAS</p>
						<a href="<?php echo BASE_URL . 'principal/categoriaPal' ?>">Ver mas</a>
					</div>
				</div>
			</section>

			<section class="container top-products">
			<br>
				<h1 class="heading-1">¡Nuestras paletas favoritas!</h1>
			
			<!--  	<div class="container-options">
					<button class="category-btn" data-category="destacados">Destacados</button>
					<button class="category-btn" data-category="recientes">Más recientes</button>
					<button class="category-btn" data-category="vendidos">Mejores Vendidos</button>
					<button class="category-btn" data-category="todos">Todos</button>
				</div> -->
			
				<div class="container-products">
					<!-- Productos -->
					<?php foreach ($data['topProductos'] as $producto) { ?>
					<div class="card-product destacados">
						<div class="container-img">
							<img src="<?php echo $producto['imagen'] ?>" alt="<?php echo $producto['nombre_producto'] ?>" />
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
		
			<section class="gallery">
				<img
					src="<?php echo BASE_URL; ?>Assets/imgs/imagen 1.webp"
					alt="Gallery Img1"
					class="gallery-img-1"
				/><img
					src="<?php echo BASE_URL; ?>Assets/imgs/imagen 2.jpg"
					alt="Gallery Img2"
					class="gallery-img-2"
				/><img
					src="<?php echo BASE_URL; ?>Assets/imgs/imagen 3.jpg"
					alt="Gallery Img3"
					class="gallery-img-3"
				/><img
					src="<?php echo BASE_URL; ?>Assets/imgs/imagen 4.jpg"
					alt="Gallery Img4"
					class="gallery-img-4"
				/><img
					src="<?php echo BASE_URL; ?>Assets/imgs/imagen 5.jpg"
					alt="Gallery Img5"
					class="gallery-img-5"
				/>
			</section>

			<section class="container specials">
			</section>
		</main>

		<?php include_once 'Views/Plantillas/footer-inicio.php'; ?>

		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
		
	</body>
</html>