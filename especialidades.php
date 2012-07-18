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
  $usuarios=filas($conexion);
?>
<html>
<head>
		<Title>
			Hospital P&uacute;blico - Especialidades
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
				<li id="perfil"><a href="perfil.php">Mi Perfil</a></li>
			</ul>
		</div>
		<div id="main">
            <div id="cerrar"><div id="variablesesion"><?php foreach($filas as $fila){} echo "Información sobre médicos - ".$fila['NOMBREREG']." ".$fila['APELLIDOS']; ?></div><a href="logout.php">Cerrar Sesi&oacute;n</a></div>
			
			<h2>Especialidades</h2>
			<div id="tablaespe">
			   <h4>Traumatolog&iacute;a</h4>
			   
			   	<?php 
           	    foreach($usuarios as $usuario){
           	    	if($usuario['ESPECIALIDAD']=='Traumatologia'){
           	    		$datoT=$usuario['ID'];
           	    		echo "<div id=\"med\"> <a href=\"fichaMedico.php?id=$datoT\">Dr.".$usuario['NOMBREREG']." ".$usuario['APELLIDOS']."</a></div>  ";
           	    	}
               }
				?>
			  
			   <h4>Pediatr&iacute;a</h4>	
			   	<?php 
           	    foreach($usuarios as $usuario){
           	    	if($usuario['ESPECIALIDAD']=='Pediatria'){
           	    		$datoP=$usuario['ID'];
           	    		echo "<div id=\"med\"><a href=\"fichaMedico.php?id=$datoP\">Dr. ".$usuario['NOMBREREG']." ".$usuario['APELLIDOS']."</a></div>  ";
           	    	}
               }
				?>
			   <h4>Oftalmolog&iacute;a</h4>
			   	<?php 
           	    foreach($usuarios as $usuario){
           	    	$datoO=$usuario['ID'];
           	    	if($usuario['ESPECIALIDAD']=='Oftalmologia'){
           	    		echo "<div id=\"med\"><a href=\"fichaMedico.php?id=$datoO\">Dr. ".$usuario['NOMBREREG']." ".$usuario['APELLIDOS']."</a></div>  ";
           	    	}
               }
				?>
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