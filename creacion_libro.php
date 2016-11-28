<?php 
	//incluir encabezado html
 require_once('layout/header.php');
 
	if (isset($_POST['nombre']) 
		&& isset($_POST['editorial']) 
		&& isset($_POST['numero_paginas'])
		&& isset($_POST['genero'])
        && isset($_FILES['imagen']) 
		&& isset($_POST['usuario_id'])
		&& isset($_POST['fecha_creacion'])
		) 
	{
		// vaidar las variabls si estan inicializadas
		$nombre= $_POST['nombre'];
		$editorial= $_POST['editorial'];
		$numero_paginas= $_POST['numero_paginas'];
		$genero= $_POST['genero'];
		$imagen= $_FILES['imagen']['name'];
		$usuario_id= $_POST['usuario_id'];
		$fecha_creacion= $_POST['fecha_creacion'];
		$carpeta= "imagen";
		$direccion= $carpeta.basename($imagen);


		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $direccion))
		{
			require_once('conexion.php');

			$insertar=mysqli_query($conexion, " INSERT INTO productos( nombre, editorial, numero_paginas, genero, imagen, usuario_id, fecha_creacion) values('$nombre','$editorial', '$numero_paginas','$genero', '$imagen', '$usuario_id', '$fecha_creacion')");

				$consulta = mysqli_affected_rows($conexion);

				if($consulta == 1)
				{
					?>
					<div class="alert alert-success">
						<button type ="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Alerta!</strong> El libro fue registrado con exito.
					</div>

					<?php 
				}
				else
				{
					?>
					<div class="alert alert-danger">
						<button type ="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Alerta!</strong> El libro no pudo ser registrado, intentelo de nuevo.
					</div>
					<?php  
				}
		   }
		   else
		   {

		   		?>
				<div class="alert alert-danger">
					<button type ="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Alerta!</strong> la imagen del libro no pudo ser procesado, intentelo de nuevo.
				</div>
				<?php  
		   }

	}
	
?>

<div class="container">
	<h2 class="text-center">CREAR NUEVO LIBRO </h2>
	<div class="row">
	<div class="col-md-2"></div>
		<form action="creacion_libro.php" class="col-md-8" method="POST" enctype="multipart/form-data">
				<div class="form- group ">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre" required="">
				</div>
				<div class="form- group ">
					<label for="nombre">editorial</label>
					<input type="text" name="editorial" class="form-control"  placeholder="Ingrese Editorial" required="">
				</div>
				<div class="form- group ">
					<label for="nombre">Numero paginas</label>
					<input type="number" name="numero_paginas" class="form-control" placeholder="Ingrese numero de paginas" required="">
				</div>
				<div class="form- group ">
					<label for="nombre">Genero</label>
					<input type="text" name="genero" class="form-control" placeholder="ingrese el genero" required="">
				</div>

				<input type="hidden" name="usuario_id" value="<?php  echo $_SESSION['id']; ?>">
				<div class="form- group ">
					<label for="nombre">imagen</label>
					<input type="file" name="imagen" class="form-control" required="">
				</div>
				<div class="form- group ">
					<label for="nombre">Fecha creacion</label>
					<input type="date" name="fecha_creacion" class="form-control" placeholder="ingrese la fecha creacion" required="">
				</div>
				<dir class="text-center">
					<button type="submit" class="btn btn-primary">Crear libro </button>
					<a href="listar_libros.php" type="submit" class="btn btn-success">Volver Atras</a>
				</dir>
		</form>

	</div>
 </div>



<?php 
	//incluir pie de pagina html
require_once('layout/footer.php');

?>