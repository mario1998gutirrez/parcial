<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Celu Locura</title>
	<!-- Activar Responsive Design -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Incluir CSS Proyecto -->
	<!-- Incluir Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
	<!-- Incluir Font Awesome CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" />
	<!-- Incluir Datatables CSS-->
	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
	<!-- Incluir Hoja de Estilos Propia -->
	<link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
</head>
<body>
<br>
<br>
<br>
<div class="container text-center encabezado">
	 
	 <img src="imagenes/sss.jpg" width="500px">

</div>

<div class="menu">
	<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">BIBLIOTECA</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">	
				<ul class="nav navbar-nav navbar-right">
                   <?php 
				 	session_start();

				          if (!empty($_SESSION['email'])) 
				          {
				   
				             ?>
				             <li class="active"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> inicio</a></li>
				          	<li><a href="listar_usuario.php"><i class="fa fa-users" aria-hidden="true"></i> Usuarios</a></li>
				          	<li><a href="listar_libros.php"><i class="fa fa-tags" aria-hidden="true"></i> Productos</a></li>
				             <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user" aria-hidden="true"> <?php echo "Usuario ".$_SESSION['nombre']." ".$_SESSION['apellido'];?></i> <b class="caret"></b></a>
					          <ul class="dropdown-menu">
					            <li><a href="cerrar-sesion.php">Cerrar Sesión</a></li>
						      
					          </ul>
					        </li>
					
				             <?php 	
				          }else
				          {
				          	?>
				          		<li class="active"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> INICIO</a></li>
				       
				          		<li><a href="registrarse.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  REGISTRARSE </a></li>
				          		<li><a href="inisiar_sesion.php"><i class="fa fa-sign-in" aria-hidden="true"></i> INICIAR SESSION </a></li>
				          	<?php 	
				          }
				       ?> 

				  </ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
</div>

