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
  if(isset($_SESSION['editado'])){
  	$editado['email2']=$_REQUEST['email2'];
    $_SESSION['editado']=$editado;
	
    if($editado['email2']==""){
      	 $errores[]='El campo Nuevo Email debe estar relleno';
       }else if(!ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*$",$editado['email2'])){
      	 $errores[]='Error,<b> ' .$editado['email2']. '</b> no es una direccion de email correcta';
       }
	   $todos=filas($conexion);
	   foreach($todos as $todo){
	  	if($todo['EMAIL']==$formulario["email"]){
	  	    $vecesemail++;	
	  	}
	  }
	   if(count($errores)>0){
		$_SESSION['erroresvali']=$errores;
		Header('Location: editarPerfil.php');
	  }else{
	  	$_SESSION['register']='on';
		Header("Location:exitoEditar.php");	
	}
  }else{
   	 Header("Location: editarPerfil.php");
   	 session_destroy();
   }
?>
<?php
  cerrarBD($conexion);
?>