<?php 

		$nombre= $_POST['nombre'];
		$editorial= $_POST['editorial'];
		$numero_paginas= $_POST['numero_paginas'];
		$genero= $_POST['genero'];
		$id= $_POST['id'];

   
     

require_once('conexion.php');

//Consulta a la base de datos para editar un asuasrio
$editar= mysqli_query($conexion, "UPDATE productos SET nombre ='$nombre', editorial ='$editorial', numero_paginas='$numero_paginas', genero='$genero' WHERE id ='$id'  ");


$consulta = mysqli_affected_rows($conexion);

// Redirigir a la pagina Listar Usuarios
header("Location: listar_libros.php?consulta=".$consulta);


 ?>