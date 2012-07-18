<?php 
	session_start();
	$excepcion=$_SESSION['excepcion'];
	if(isset($excepcion)) 
		unset($_SESSION['excepcion']);
	else
		header("Location:formulario.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
		<Title>
			Hospital P&uacute;blico - Error
		</Title>
		<Link rel="stylesheet" type="text/css" href="estilos/styleini.css"/>
	</head>
	<body>
		<div id="imagen_logo">
				<img src="estilos/images/H.jpg" width="150" height="84"/>
		</div>
		<div id="Cabecera">
			<h1>Hospital P&uacute;blico Andaluz</h1>
		</div>
		<div id="main2">
			<h2>Ups!</h2>
	        <p>Ocurrió un problema durante el procesado de los datos. Pulse <a href="formulario.php">aquí</a> para volver al formulario.</p>
	
	       <?php 
	        // Aquí deberíamos almacenar la información del error en un archivo de logs
	
	      echo $excepcion;
	      ?>
  
    </div>
    <div id="Piepagina">
			&copy; Todos los derechos reservados. F&eacute;lix Mart&iacute;n L&oacute;pez y Jos&eacute Manuel Dom&iacutenguez P&eacuterez
		</div>
	</body>
</html>