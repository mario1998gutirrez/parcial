<?php 
	//incluir encabezado html
 require_once('layout/header.php');
 
 require_once('configuracion.php');

 $conexion = mysqli_connect($configuracion['servidor'], $configuracion['usuario'], $configuracion['contrasena'], $configuracion['base_datos']);

	if(!$conexion){
		die("Error de Conexion a la base de datos". mysqli_connect_error());
	}

    $consulta= mysqli_query($conexion, "SELECT * FROM usuario");

    $usuarios= mysqli_fetch_all($consulta, MYSQLI_ASSOC );

    //recibir variable consulta 
    if(isset($_GET['consulta']))
    {
    	$consulta =$_GET['consulta'];
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

    //recibir variable eliminado
    if(isset($_GET['eliminado']))
    {
    	$eliminado =$_GET['eliminado'];
		if($eliminado == 1)
		{
			?>
				<div class="alert alert-success">
					<button type ="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Alerta!</strong> El Usuario fue eliminado con exito.
				</div>

			<?php 
		}
		else
		{
			?>
				<div class="alert alert-danger">
					<button type ="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Alerta!</strong> El Usuario no pudo ser eliminado, intentelo de nuevo.
				</div>
			<?php  
		}
   }

   //recibir la variable de inicio de session
   if(isset($_GET['login']))
   {
   		?>
   			<div class="alert alert-success">
					<button type ="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Alerta!</strong> Bienvenido has iniciado session Correctamente
				</div>

   		<?php  

   }


?>
	<div class="container">
		<h2 class="text-center">LISTAR USUARIOS </h2>

		<a href=" crear_usuario.php" class="btn btn-success" ><i class="fa fa-plus" aria-hidden="true"> Añadir Nuevo Usuario</i> </a>
		<table class="table table-bordered  table-striped" >
		<tr>
		  <th class="text-center"> ID</th>
	      <th class="text-center"> Nombre</th>
	      <th class="text-center">Apellido</th>
	      <th class="text-center">Email</th>
	      <th class="text-center">Tipo de Usuario</th>
	      <th class="text-center">Fecha de Creacion</th>
	      <th class="text-center">Opciones</th>
		</tr>
  		<?php  foreach ($usuarios as $usuario ): ?>
  		<tr>
		  <th class="text-center"><?php echo $usuario ['id']; ?></th>
	      <th class="text-center"><?php echo $usuario ['nombre']; ?></th>
	      <th class="text-center"><?php echo $usuario ['apellido']; ?></th>
	      <th class="text-center"><?php echo $usuario ['email']; ?></th>
	      <th class="text-center"><?php echo $usuario ['tipo_usuario']; ?></th>
	      <th class="text-center"><?php echo $usuario ['fecha_creacion']; ?></th>
	      <td class="text-center">

	      <a href="ver_usuario.php?id=<?php echo $usuario ['id'] ?> "  class="btn btn-primary" ><i class="fa fa-search" aria-hidden="true"></i></a>

	      <a href="editar_usuario.php?id=<?php echo $usuario ['id'] ?> "  class="btn btn-warning" ><i class="fa fa-edit" aria-hidden="true"></i></a>

	      <a href="eliminar_usuario.php?id=<?php echo $usuario ['id'] ?> "  class="btn btn-danger" onclick="return confirm ('Estas seguro de eliminar este registro')" ><i class="fa fa-trash" aria-hidden="true"></i></a>

	      </td>
		</tr>
  	    	
  	    <?php  endforeach; ?>



	    </table>
    </div>

  



<?php 
	//incluir pie de pagina html
require_once('layout/footer.php');

?>