<?php 
	//incluir encabezado html
 require_once('layout/header.php');
 
	if (isset($_POST['nombre']) 
		&& isset($_POST['apellido']) 
		&& isset($_POST['email']) 
		&& isset($_POST['tipo_usuario']) 
		&& isset($_POST['contrasena']) 
		&& isset($_POST['contrasena2'])
		) 
	{
		// vaidar las variabls si estan inicializadas
		$nombre= $_POST['nombre'];
		$apellido= $_POST['apellido'];
		$email= $_POST['email'];
		$tipo_usuario= $_POST['tipo_usuario'];
		$contrasena= $_POST['contrasena'];
		$contrasena2= $_POST['contrasena2'];


		//Validar contraseñas
		if ($contrasena == $contrasena2) 
		{

			$contrasena_enc= sha1($contrasena);

			require_once('conexion.php');

			$insertar=mysqli_query($conexion, " INSERT INTO usuario( nombre, apellido, email, tipo_usuario, contrasena ) values('$nombre','$apellido', '$email','$tipo_usuario','$contrasena_enc') ");

			$consulta = mysqli_affected_rows($conexion);

			if($consulta == 1)
			{
				?>
					<div class="alert alert-success">
						<button type ="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Alerta!</strong> El Usuario fue registrado con exito.
					</div>

				<?php 
			}
			else
			{
				?>
					<div class="alert alert-danger">
						<button type ="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Alerta!</strong> El Usuario no pudo ser registrado, intentelo de nuevo.
					</div>
					<?php  
			}

		}
	else
	{
			?>
				<div class="alert alert-danger">
					<button type ="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Alerta!</strong> Las contraseñas  ingresadas no coiciden ....
				</div>

			<?php 
    }	

}
 
?>

<div class="container">
	<h2 class="text-center">CREAR NUEVO USUARIOS </h2>
	<div class="row">
	<div class="col-md-2"></div>
		<form action="crear_usuario.php" class="col-md-8" method="POST" >
			<div class="form- group ">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre" required="">
			</div>
			<div class="form- group ">
				<label for="nombre">Apellido</label>
				<input type="text" name="apellido" class="form-control"  placeholder="Ingrese apellido" required="">
			</div>
			<div class="form- group ">
				<label for="nombre">Email</label>
				<input type="email" name="email" class="form-control" placeholder="Ingrese Email" required="">
			</div>
			<div class="form- group ">
				<label for="tipo_usuario"> Seleccione un tipo de Usuario</label>
				<select name="tipo_usuario" class="form-control">
				<option value="administrador" >Administrador</option>
				<option value="cliente" >Cliente</option>
				</select>
			</div>
			<div class="form- group ">
				<label for="nombre">Contraseña</label>
				<input type="password" name="contrasena" class="form-control" placeholder="Ingrese Contraseña" required="">
			</div>
			<div class="form- group ">
				<label for="nombre">Repetir Contraseña</label>
				<input type="password" name="contrasena2" class="form-control" placeholder="Ingrese Contraseña de Nuevo" required="">
			</div>
			<dir class="text-center">
				<button type="submit" class="btn btn-primary">Crear Usuario </button>
				<a href="listar_usuario.php" type="submit" class="btn btn-success">Volver Atras</a>
			</dir>
	</form>

	</div>
 </div>



<?php 
	//incluir pie de pagina html
require_once('layout/footer.php');

?>



