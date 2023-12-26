<style>
	.bg-custom-orange {
		background-color: #ff8c00;
		/* Código de color naranja personalizado */
	}

	.btn-custom-orange {
		background-color: #ff8c00;
		/* Código de color naranja personalizado */
	}

	.modal-custom-size .modal-header,
	.modal-custom-size .modal-body,
	.modal-custom-size .modal-footer {
		font-size: 18px;
		/* Tamaño de fuente */
		line-height: 1.5;
		/* Espaciado entre líneas */

	}

	.modal {
		text-align: center;
	}

	.modal-dialog {
		display: inline-block;
		text-align: middle;

	}
</style>

<!-- Modal pedido -->
<div id="myModal" class="modal fade modal-custom-size" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-custom-orange text-white"><i class="fas-fa-cart-arrow-down"></i>
				<h5 class="modal-title">Pedido</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover" id="tableListaCarrito">
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
			<div class="modal-footer">
				<h3 id="totalGeneral"></h3>
				<a class="btn btn-outline-success" href="<?php echo BASE_URL . 'clientes' ?>">Procesar Pedido</a>
			</div>

		</div>
	</div>
</div>

<!-- Login cliente -->
<div id="modalLogin" class="modal fade modal-custom-size" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-custom-orange text-white">
				<h5 class="modal-title" id="titleLogin">Iniciar Sesión</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
				<form method="get" action="">
					<div class="row">
						<div class="col-md-12" id="frmLogin">
							<div class="form-group mb-3">
								<label for="correoLogin"><i class="fas fa-envelope"></i> Correo</label>
								<input id="correoLogin" class="form-control" type="email" name="correoLogin" placeholder="Email">
							</div>
							<div class="form-group mb-3">
								<label for="contrasenaLogin"><i class="fas fa-key"></i> Contraseña</label>
								<input id="contrasenaLogin" class="form-control" type="password" name="contrasenaLogin" placeholder="Contraseña">
							</div>
							<a href="#" id="btnRegister">No tienes una cuenta? Registrate aquí</a>
							<div class="float-end">
								<button class="btn btn-custom-orange text-white btn-lg" type="button" id="login">Entrar</button>
							</div>
						</div>
						<!-- registro cliente -->
						<div class="col-md-12 d-none" id="frmRegister">
							<div class="form-group mb-3">
								<label for="nombreRegistro"><i class="fas fa-user"></i> Nombre</label>
								<input id="nombreRegistro" class="form-control" type="text" name="nombreRegistro" placeholder="Nombre Completo">
							</div>
							<div class="form-group mb-3">
								<label for="nom_usuarioRegistro"><i class="fas fa-user"></i> Nombre de usuario</label>
								<input id="nom_usuarioRegistro" class="form-control" type="text" name="nom_usuarioRegistro" placeholder="Nombre de usuario">
							</div>
							<div class="form-group mb-3">
								<label for="rutRegistro"><i class="fas fa-passport"></i> RUT</label>
								<input id="rutRegistro" class="form-control" type="number" name="rutRegistro" placeholder="RUT">
							</div>
							<div class="form-group mb-3">
								<label for="telefonoRegistro"><i class="fas fa-phone"></i> Telefono</label>
								<input id="telefonoRegistro" class="form-control" type="number" name="telefonoRegistro" placeholder="Telefono">
							</div>
							<div class="form-group mb-3">
								<label for="fdnRegistro"><i class="fas fa-calendar"></i> Fecha de nacimiento</label>
								<input id="fdnRegistro" class="form-control" type="date" name="fdnRegistro" placeholder="Fecha de nacimiento">
							</div>
							<div class="form-group mb-3">
								<label for="correoRegistro"><i class="fas fa-envelope"></i> Correo</label>
								<input id="correoRegistro" class="form-control" type="email" name="correoRegistro" placeholder="Email">
							</div>
							<div class="form-group mb-3">
								<label for="contrasenaRegistro"><i class="fas fa-key"></i> Contraseña</label>
								<input id="contrasenaRegistro" class="form-control" type="password" name="contrasenaRegistro" placeholder="Contraseña">
							</div>
							<a href="#" id="btnLogin">Si ya tienes una cuenta, logeate aquí</a>
							<div class="float-end">
								<button class="btn btn-custom-orange text-white btn-lg" type="button" id="registrarse">Registrarse</button>
							</div>
						</div>
					</div>

				</form>
			</div>


		</div>
	</div>
</div>


<footer class="footer">
	<div class="container container-footer">
		<div class="menu-footer">
			<div class="contact-info">
				<p class="title-footer">Información de Contacto</p>
				<ul>
					<li>
						Dirección: Vicente Zegers 999, Iquique, Chile
					</li>
					<li>Teléfono: +56-572-412571</li>
					<li>WhatsApp: +569-44982963</li>
					<li>Email: info@gelateriamilano.cl</li>
				</ul>
				<div class="social-icons">
					<a href="https://web.facebook.com/gelateria.milano.iqq"><span class="facebook">
							<i class="fa-brands fa-facebook-f"></i>
						</span></a>
					<a href="https://www.instagram.com/gelateriamilano.iqq/"><span class="instagram">
							<i class="fa-brands fa-instagram"></i>
						</span></a>
				</div>
			</div>

			<div class="information">
				<p class="title-footer">Información</p>
				<ul>
					<li><a href="<?php echo BASE_URL . 'principal/sobre_nosotros' ?>">Sobre Nosotros</a></li>
					<li><a href="<?php echo BASE_URL . 'Assets/docs/gm_pdp.pdf' ?>" target="_blank">Politicas de Privacidad</a></li>
					<li><a href="<?php echo BASE_URL . 'Assets/docs/gm_tyc.pdf' ?>" target="_blank">Términos y condiciones</a></li>
				</ul>
			</div>

			<div class="my-account">
				<p class="title-footer">Mi cuenta</p>

				<ul>
					<li><a href="<?php echo BASE_URL . 'clientes' ?>">Historial de pedidos</a></li>
					<li><a href="<?php echo BASE_URL . 'admin' ?>">Iniciar sesion como administrador</a></li>
				</ul>
			</div>
		</div>

		<div class="copyright">
			<p>
				Desarrollado por Estudiantes UNAP
			</p>
		</div>
	</div>
</footer>


<script>
	const base_url = '<?php echo BASE_URL; ?>';

	function alertaPerzanalizada(mensaje, type, titulo = '') {
		toastr[type](mensaje, titulo)

		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
	}

	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
	}

	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
</script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!--<script src="<?php echo BASE_URL; ?>Assets/js/bootstrap.bundle.min.js"></script>-->
<script src="<?php echo BASE_URL; ?>Assets/js/all.min.js"></script>
<script src="<?php echo BASE_URL; ?>Assets/js/sweetalert2.all.min"></script>


<script src="<?php echo BASE_URL; ?>Assets/js/carrito.js"></script>
<script src="<?php echo BASE_URL; ?>Assets/js/login.js"></script>