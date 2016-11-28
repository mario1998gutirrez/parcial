<?php 
	//incluir encabezado html
 require_once('layout/header.php');
 
 require_once('configuracion.php');

 $conexion = mysqli_connect($configuracion['servidor'], $configuracion['usuario'], $configuracion['contrasena'], $configuracion['base_datos']);

	if(!$conexion){
		die("Error de Conexion a la base de datos". mysqli_connect_error());
	}

    $consulta= mysqli_query($conexion, "SELECT * FROM productos");
	$productos= mysqli_fetch_all($consulta, MYSQLI_ASSOC );

   
?>
	<div class="container">
		<h2 class="text-center">LISTAR LIBROS </h2>

		<a href=" creacion_libro.php" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"> Añadir Nuevo Libro</i> </a>
		<table class="table table-bordered  table-striped" >
		<tr>
		  <th class="text-center"> ID</th>
	      <th class="text-center"> Nombre</th>
	      <th class="text-center"> editorial</th>
	      <th class="text-center"> numero_paginas</th>
	      <th class="text-center"> genero</th>
	      <th class="text-center"> imagen</th>
	      <th class="text-center"> usuario_id</th>
	      <!--<th class="text-center"> Fecha de Creacion</th>-->
	      
		</tr>
  		<?php  foreach ($productos as $producto ): ?>
  		<tr>
		  <th class="text-center"><?php echo $producto ['id']; ?></th>
	      <th class="text-center"><?php echo $producto ['nombre']; ?></th>
	      <th class="text-center"><?php echo $producto ['editorial']; ?></th>
	      <th class="text-center"><?php echo $producto ['numero_paginas']; ?></th>
	      <th class="text-center"><?php echo $producto ['genero']; ?></th>
	      <th class="text-center"><img src="imagen/<?php echo $producto ['imagen']; ?>" class="img-responsive" width="80 %"></th>
	     <!-- <th class="text-center"><?php echo $producto ['fecha_creacion']; ?></th>-->
	      <td class="text-center">

	      <a href="ver_libro.php?id=<?php echo $producto ['id'] ?> "  class="btn btn-primary" ><i class="fa fa-search" aria-hidden="true"></i></a>

	      <a href="editar_libro.php?id=<?php echo $producto ['id'] ?> "  class="btn btn-warning" ><i class="fa fa-edit" aria-hidden="true"></i></a>

	      <a href="eliminar_libro.php?id=<?php echo $producto ['id'] ?> "  class="btn btn-danger" onclick="return confirm ('Estas seguro de eliminar este producto')" ><i class="fa fa-trash" aria-hidden="true"></i></a>

	      </td>
		</tr>
  	    	
  	    <?php  endforeach; ?>



	    </table>
    </div>
    
<?php 
	//incluir pie de pagina html
require_once('layout/footer.php');

?>