<?php
   session_start();
   if(isset($_SESSION['login'])){
  	$login=$_SESSION["login"];	 
   }else{
   	$login['nombreusuario']="";
	$login['contraseña']="";
   	$_SESSION['login']=$login;
   }
   if(isset($_SESSION["erroreslog"])){
  	 $errores=$_SESSION["erroreslog"];
   }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
		<Title>
			Hospital P&uacute;blico - Login
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
				<li id="menuinicio"><a href="inicio.html">INICIO</a></li> |
				<li id="menuespecialidades"><a href="especialidades.html">ESPECIALIDADES Y M&Eacute;DICOS</a></li> 
			
			</ul>
		</div>
		<div id="main2">
			<h2>Login...Rellene para acceder</h2>
			<?php
		  
  		  if(isset($errores)&& count($errores)>0){
  		  	echo "<div class=\"error\">";
  		  	foreach($errores as $error){
  		  		echo $error ."<br/>";
  		  	}
			echo "</div>";
		  }	
		  ?>
			<form action="validacionlogin.php">
			    <div id="usuario"><label id="label_nombreusuario" for="nombreusuario"><b>Nombre de usuario:</b></label>
							<input id="nombreusuario" name="nombreusuario" type="text" value="<?php if(isset($login['nombreusuario'])){echo $login['nombreusuario'];} ?>"/>
			    </div>
			    <div id="contraseñaa"><label id="label_contraseña" for="contraseña"><b>Contrase&ntilde;a:</b></label>
							<input id="contraseña" name="contraseña" type="password" />
			    </div>
			    <div id="acceder">
							<button id="submit_acceder"><b>Acceder</b></button>
			    </div>	
			</form>
			<div id="parrafologin"><p>&iquest;Todavia sin cuenta?<a href="formulario.php"><b> Reg&iacute;strese</b></a></p></div>
		</div>
		<div id="Piepagina">
			&copy; Todos los derechos reservados. F&eacute;lix Mart&iacute;n L&oacute;pez y Jos&eacute Manuel Dom&iacutenguez P&eacuterez
		</div>
		
	</body>
</html>