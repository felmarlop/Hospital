<?php
    function insertarUsuario ($nusuario,$contraseñareg,$contraseñaconf,$tipousu,$cedula,$eligeespe,$nombre,$apell,$dni,$letra,$email,$conexion){
     try {
    	 	$stmt=$conexion->prepare('CALL INSERTAR_USUARIO(:NOMBRE,:CONTRASENA,:CONTRASENACONF,:TIPOUSU,:CEDULA,
			:ESPECIALIDAD,:NOMBREREG,:APELLIDOS,:DNI,:LETRA,:EMAIL)');
			$stmt->bindParam(':NOMBRE',$nusuario);
	  		$stmt->bindParam(':CONTRASENA',$contraseñareg);
			$stmt->bindParam(':CONTRASENACONF',$contraseñaconf);
			$stmt->bindParam(':TIPOUSU',$tipousu);
			$stmt->bindParam(':CEDULA',$cedula);
			$stmt->bindParam(':ESPECIALIDAD',$eligeespe);
			$stmt->bindParam(':NOMBREREG',$nombre);
			$stmt->bindParam(':APELLIDOS',$apell);
			$stmt->bindParam(':DNI',$dni);
			$stmt->bindParam(':LETRA',$letra);
			$stmt->bindParam(':EMAIL',$email);
			$stmt->execute();
	} catch(PDOException $e) {
	  $_SESSION['excepcion']="Error de inserción maricón".
      header("Location:error.php");
    }
      return $stmt;
  }
   function seleccionarPorNombre($nusuario,$conexion){
   	try{
   		$stmt=$conexion->prepare("SELECT * FROM USUARIO WHERE NOMBRE LIKE :nombre");
		$searchString ="%" . $nusuario . "%";
		$stmt->bindParam(":nombre",$searchString);
		$stmt->execute();
   	}catch(PDOException $e){
   		$_SESSION['excepcion']="Error al seleccionar".
        header("Location:error.php");
    }   	
	return $stmt->fetchAll();
   } 
   function borrarUsuario($nombre,$conexion)
  {
  	try{
  	    $stmt=$conexion->prepare("DELETE FROM USUARIO WHERE NOMBRE LIKE :nombre");
		$searchString ="%" . $nombre . "%";
		$stmt->bindParam(":nombre",$searchString);
		$stmt->execute();
   	}catch(PDOException $e){
   		$_SESSION['excepcion']="Error al borrar".
        header("Location:error.php");
    }   
    return $stmt;
}
  function actualizarUsuario($nombre,$email,$conexion){
  	try{
  		$stmt=$conexion->prepare("UPDATE USUARIO SET EMAIL=:EMAIL WHERE NOMBRE=:NOMBRE");
  		$stmt->bindParam(':NOMBRE',$nombre);
		$stmt->bindParam(':EMAIL',$email);
		$stmt->execute();
	}catch(PDOException $e){
		$_SESSION['excepcion']="Error al actualizar datos".
        header("Location:error.php");
		
	}
  }
  function filas($conexion){
   	try{
   		$stmt=$conexion->prepare("SELECT * FROM USUARIO");
		$stmt->execute();
   	}catch(PDOException $e){
   		$_SESSION['excepcion']="Error al recorrer datos".
        header("Location:error.php");
    }   	
	return $stmt->fetchAll();
   } 
   
?>