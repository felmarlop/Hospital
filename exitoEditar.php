<?php
  session_start();
  if(isset($_SESSION['register'])){ 
	$login=$_SESSION['login'];
  }else{
  	Header("location:editaPerfil.php");
  }
  if(isset($_SESSION['editado'])){
  	$editado=$_SESSION['editado'];
  }
    unset($_SESSION["editado"]);
	unset($_SESSION["erroresvali"]);

	require_once("ConexionBD.php");
	require_once("funciones.php");
	$conexion = ConexionBD();
  $filas=seleccionarPorNombre($login['nombreusuario'],$conexion);
  foreach($filas as $fila){}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
		<Title>
			Hospital P&uacute;blico - Borrar
		</Title>
		<Link rel="stylesheet" type="text/css" href="estilos/styleini.css"/>
		<script type="text/javascript" language="JavaScript" src="js/validacionCuenta.js"></script>
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
	     	$actualizar=actualizarUsuario($login['nombreusuario'],$editado['email2'],$conexion);
    	  
		?>
		<h2>Su perfil ha sido editado correctamente</h2>
		<div id="div_terminar">
			<a href="perfil.php">Terminar Editado</a>
		</div>
    </div>
    <div id="Piepagina">
						&copy; Todos los derechos reservados. F&eacute;lix Mart&iacute;n L&oacute;pez y Jos&eacute Manuel Dom&iacutenguez P&eacuterez
	</body>
</html>
<?php
  cerrarBD($conexion);
?>