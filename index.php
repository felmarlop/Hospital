<?php
  session_start();
  require_once("ConexionBD.php");
  require_once("funciones.php");
  $conexion = ConexionBD();
  if(isset($_SESSION['register'])){
  	$login=$_SESSION['login'];	 
  }else{
  	Header("location:login.php");
  }
  $filas=seleccionarPorNombre($login['nombreusuario'],$conexion);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
		<Title>
			Hospital P&uacute;blico - Inicio
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
		<div id="Menú">
			<ul>
				<li id="menuinicio"><a href="index.php">INICIO</a></li> |
				<li id="menuespecialidades"><a href="especialidades.php">ESPECIALIDADES Y M&Eacute;DICOS</a></li> |
				<li id"perfil"><a href="perfil.php">Mi Perfil</a></li>
			</ul>
		</div>	
		<div id="main">
	    <div id="cerrar"><div id="variablesesion"><?php foreach($filas as $fila){} echo "Hola, has iniciado sesi&oacute;n - ".$fila['NOMBREREG']." ".$fila['APELLIDOS']; ?></div><a href="logout.php">Cerrar Sesi&oacute;n</a></div>
			<div id="imagenvertical">
				<img src="estilos/images/hr_vertical.png" height="400"/>
			</div>
			<h2>Inicio</h2>
			<div id="parrafo">
				<p>Una vez registrado en la web de <a href="inicio.html">Hospital P&uacute;blico Central</a> podr&aacute tenerr
				acceso a los diferentes m&eacutedicos que trabajan en nuestras instalaciones junto con especialidad.</p>
			
			</div>
			<div id="twitter">Ultimo estado:
				<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
                <script type="text/javascript" src="http://twitter.com/statuses/@felixmartin7_timeline/@felixmartin7.json?callback=twitterCallback2&;count=1"></script>
             </div>
			<div id="fotoHospital">
				<a href="inicio.html"><img border="2" src="estilos/images/hospital.jpg" width="600" height="310"/></a>
				<p>Esta es una imagen de la puerta central del hospital.</p>
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