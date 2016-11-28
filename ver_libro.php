<?php 
	//incluir encabezado html
 require_once('layout/header.php');
 
  $id= $_GET['id'];
	
 require_once('conexion.php');
    $consulta= mysqli_query($conexion, "SELECT * FROM productos WHERE id = $id");

    $producto= mysqli_fetch_array($consulta);

    if(mysqli_num_rows($consulta)): 
?>

<div class="container">
	<h2 class="text-center"> DETALLE LIBRO</h2>
	<div class="row">
	<div class="col-md-2"></div>
		<form  class="col-md-8" >
			<div class="form- group ">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre" required="" readonly value="<?php echo $producto['nombre']; ?>">
			</div>
			<div class="form- group ">
				<label for="nombre">editorial</label>
				<input type="text" name="editorial" class="form-control"  placeholder="Ingrese editorial" required="" readonly value="<?php echo $producto['editorial']; ?>">
			</div>
			<div class="form- group ">
				<label for="nombre">numero paginas</label>
				<input type="number" name="numero_paginas" class="form-control" placeholder="Ingrese numero de paginas" required="" readonly value="<?php echo $producto['numero_paginas']; ?>">
			</div>
			<div class="form- group ">
				<label for="nombre">genero</label>
				<input type="text" name="genero" class="form-control" placeholder="Ingrese genero" required="" readonly value="<?php echo $producto['genero']; ?>">
			</div>
			<div class="form- group ">
				<label for="nombre">imagen</label>
				<input type="number" name="imagen" class="form-control" required="" readonly value="<?php echo $producto['imagen']; ?>">
			</div>
			<dir class="text-center">
				<a href="listar_libros.php" type="submit" class="btn btn-success">Volver Atras</a>
			</dir>
	</form>

	</div>
 </div>

<?php 
 	
 	endif;

 //incluir pie de pagina html
 require_once('layout/footer.php');

?>



