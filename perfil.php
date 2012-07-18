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
  foreach($filas as $fila){}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
		<Title>
			Hospital P&uacute;blico - Perfil
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
		<div id="Menú">
			<ul>
				<li id="menuinicio"><a href="index.php">INICIO</a></li> |
				<li id="menuespecialidades"><a href="especialidades.php">ESPECIALIDADES Y M&Eacute;DICOS</a></li> |
				<li id="perfil"><a href="perfil.php">Mi Perfil</a></li>
			</ul>
		</div>
		<div id="main2">
			<div id="cerrar"><div id="variablesesion"><?php foreach($filas as $fila){}echo "Hola ".$fila['NOMBREREG']." ".$fila['APELLIDOS'].", datos de su perfil."; ?>
			</div><a href="logout.php">Cerrar Sesi&oacute;n</a></div>
			<h2>Tu perfil</h2>   
			<div id="datosperfil">
				<fieldset>
					<legend>Datos</legend>
				    <?php echo "Su n&ordm; ID es el: <b>".$fila['ID']."</b></BR>"."Nombre de Usuario: <b>".$fila['NOMBRE']."</b></BR>".
				    "Tipo de Usuario: <b>".$fila['TIPOUSU']."</b></BR>"."Nombre personal y apellidos: <b>".
				    	$fila['NOMBREREG']." ".$fila['APELLIDOS']."</b></BR>"."DNI: <b>".$fila['DNI']."-".
				    	$fila['LETRA']."</b></BR>"."EMAIL: <b>".$fila['EMAIL']."</b></BR>"?>
				    <?php if($fila['TIPOUSU']=="Medico"){
				    	echo "C&eacute;dula: <b>".$fila['CEDULA'];
				    }?>		
				    </fieldset>
			</div> 
				    <div id="borrar">
				    	<form onsubmit="validaBorrar()" action="validaBorrar.php" method="post">
				    	<input type="submit" value="Eliminar su cuenta"  name="submit">
				    </form>
				    </div>
				    <div id="actualizar">
				    	<form action="editarPerfil.php" method="post">
				    	<input type="submit" value="Editar email"  name="submit">
				    </form>
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