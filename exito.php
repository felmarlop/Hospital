<?php
  session_start();
  if(isset($_SESSION['register'])){
  	$formulario=$_SESSION["formulario"];  
  }else{
  	Header("location:formulario.php");
  }
    unset($_SESSION["formulario"]);
	unset($_SESSION["errores"]);

	require_once("ConexionBD.php");
	require_once("funciones.php");
	$conexion = ConexionBD();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
		<Title>
			Hospital P&uacute;blico - Éxito
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
		<div id="main3">
    	<?php
    	    insertarUsuario ($formulario['nusuario'],$formulario['contraseñareg'],$formulario['contraseñaconf'],$formulario['tipousu'],
    	    $formulario['cedula'],$formulario['eligeespe'],$formulario['nombre'],$formulario['apellidos'],$formulario['dni'],
    	    $formulario['letra'],$formulario['email'],$conexion);
		?>
		<h2>Su entrada se registr&oacute; correctamente</h2>
		<div id="div_volver">
			Pulse <a href="login.php">aqu&iacute;</a> para loguearte.
		</div>
    </div>
    <div id="Piepagina">
			&copy; Todos los derechos reservados. F&eacute;lix Mart&iacute;n L&oacute;pez y Jos&eacute Manuel Dom&iacutenguez P&eacuterez
		</div>
	</body>
	
</html>
<?php
  cerrarBD($conexion);
?>
