<?php
session_start();
require_once("ConexionBD.php");
require_once("funciones.php");
$conexion = ConexionBD();
if(isset($_SESSION['login'])){
	$login['nombreusuario']=$_REQUEST['nombreusuario'];
	$login['contraseña']=$_REQUEST['contraseña'];
	$veces="";
	$contraseña="";
	$_SESSION["login"]=$login;
	
	if($login['nombreusuario']==""){
	  	$errores[]='Nombre de usuario no puede ser vacio';
	  }
    if((strlen($login['nombreusuario'])<=4)&&($login['nombreusuario']!='')){
	  	$errores[]='El Nombre de Usuario dede tener al menos 5 caracteres';
	  }
	  $filas=seleccionarPorNombre($login['nombreusuario'],$conexion);
	  foreach($filas as $fila){
	  	$veces++;
		$contraseña=$fila['CONTRASENA'];    			
	  }
	  if($veces==0){
	  	$errores[]='No existe un usario con ese nombre de usuario';
	  }
	  if(($veces!=0)&&($contraseña!=$login['contraseña'])){
	  	$errores[]='Contraseña incorrecta';
	  }
	  
    if($login['contraseña']==""){
	  	$errores[]='Contraseña no rellenada';
	  }
    if(count($errores)>0){
		$_SESSION['erroreslog']=$errores;
		Header('Location: login.php');
	}else{
	  	$_SESSION['register']='on';
		Header("Location:index.php");
	}
}else{
	Header("Location: login.php");
	session_destroy();
}

?>