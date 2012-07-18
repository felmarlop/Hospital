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
   $email=$fila['EMAIL'];
  if(!isset($_SESSION["editado"])){
	  $editado['email2']="$email";
	  $_SESSION['editado']=$editado;
  	 
   }else{
   	  $editado = $_SESSION['editado'];
   }
   if(isset($_SESSION["erroresvali"])){
  	 $errores=$_SESSION["erroresvali"];
   }
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
		<div id="main3">
			<div id="cerrar"><div id="variablesesion"><?php foreach($filas as $fila){}echo "Hola ".$fila['NOMBREREG'].", edite su email."; ?>
			</div><a href="logout.php">Cerrar Sesi&oacute;n</a></div>
			<h2>Edite su E-mail</h2>  
				<?php
		  
  		  if(isset($errores)&& count($errores)>0){
  		  	echo "<div class=\"error\">";
  		  	foreach($errores as $error){
  		  		echo $error ."<br/>";
  		  	}
			echo "</div>";
		  }	
  	     ?> 
			<div id="editar">
					<form action="validaEditar.php">
						<div id="div_email">
							<label id="label_email2" for="email">Nuevo E-mail:</label>
							<input id="email" name="email2" value="<?=$email?>" type="text"/>
							<div id="div_submit">
							<button><b>Editar</b></button>
						</div>
						</div>	
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