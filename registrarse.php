<?php
	//Incluir Encabezado 
	require_once('layout/header.php');
	if(isset($_POST['nombre']) 
		&& isset($_POST['apellido'])
		&& isset($_POST['email'])
		&& isset($_POST['contrasena'])
		&& isset($_POST['contrasena2'])){
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$contrasena = $_POST['contrasena'];
		$contrasena2 = $_POST['contrasena2'];
		if(($contrasena == $contrasena2) && (strlen($contrasena >= 6))){
			$contrasena_encriptada = sha1($contrasena);
			require_once('base_datos/conexion.php');
			$insertar = mysqli_query($conexion, "INSERT INTO usuario (nombre, apellido, email, contrasena) VALUES ('$nombre', '$apellido', '$email', '$contrasena_encriptada')");
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Exito!</strong> El usuario ha sido registrado con exito, por favor inicia sesion ...
			</div>
			<?php
		}else{
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Error!</strong> Las contraseÃ±as son incorrectas ...
			</div>
			<?php
		}
	}
?>
<h1 class="text-center">Formulario de Registro</h1>
<div class="row">
	<div class="col-md-offset-3 col-md-6">
		<form action="" method="POST" role="form">
			<div class="form-group">
				<label for="">Nombre</label>
				<input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre" required="">
			</div>
			<div class="form-group">
				<label for="">Apellido</label>
				<input type="text" class="form-control" name="apellido" placeholder="Ingrese Apellido" required="">
			</div>
			<div class="form-group">
				<label for="">Correo Electronico</label>
				<input type="email" class="form-control" name="email" placeholder="Ingrese Correo ElectrÃ³nico" required="">
			</div>
			<div class="form-group">
				<label for="">Contraseña</label>
				<input type="password" class="form-control" name="contrasena" placeholder="Ingrese ContraseÃ±a" required="">
			</div>
			<div class="form-group">
				<label for="">Repetir Contraseña</label>
				<input type="password" class="form-control" name="contrasena2" placeholder="Ingrese ContraseÃ±a Otra Vez" required="">
			</div>
			<button type="submit" class="btn btn-primary">Registrar Usuario</button>
		</form>
	</div>			
</div>
<?php
	//Incluir Pie de Pagina
	require_once('layout/footer.php');
?>