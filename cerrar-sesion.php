<?php 

 session_start();
 session_destroy();
 $login = 0;
 header("Location: inisiar_sesion.php?login=".$login);

 ?>