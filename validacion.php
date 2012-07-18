<?php 
  session_start();
  require_once("ConexionBD.php");
  require_once("funciones.php");
  $conexion = ConexionBD();
  $formulario = $_SESSION['formulario'];
  if(isset($_SESSION['formulario'])){
      $formulario['nusuario']=$_REQUEST['nusuario'];
	  $formulario['contraseñareg']=$_REQUEST['contraseñareg'];
	  $formulario['contraseñaconf']=$_REQUEST['contraseñaconf'];
	  $formulario['tipousu']=$_REQUEST['tipousu'];
	  $formulario['cedula']=$_REQUEST['cedula'];
	  $formulario['eligeespe']=$_REQUEST['eligeespe'];
	  $formulario['nombre']=$_REQUEST['nombre'];
	  $formulario['apellidos']=$_REQUEST['apellidos'];
	  //$formulario['casilla']=$_REQUEST['casilla'];
	  //$formulario['foto']=$_REQUEST['foto'];
	  $formulario['dni']=$_REQUEST['dni'];
	  $formulario['letra']=$_REQUEST['letra'];
	  $formulario['email']=$_REQUEST['email'];
	  //$formulario['sexo']=$_REQUEST['sexo'];
	  //$formulario['nsocial']=$_REQUEST['nsocial'];
	  //$formulario['nsocial2']=$_REQUEST['nsocial2'];
	  //$formulario['telefono']=$_REQUEST['telefono'];
	  //formulario['poblacion']=$_REQUEST['poblacion'];
	  //$formulario['calle']=$_REQUEST['calle'];
	  $vecesnombre="";
	  $vecesemail="";
	  $_SESSION["formulario"]=$formulario;
	  
	  if($formulario['nusuario']==""){
	  	$errores[]='Nombre de usuario no puede ser vacio';
	  }
	  if(strlen($formulario['nusuario'])<=4&&($formulario['nusuario']!='')){
	  	$errores[]='El nombre dede tener al menos 5 caracteres';
	  }
	  $filas=seleccionarPorNombre($formulario["nusuario"],$conexion);
	  foreach($filas as $fila){
	  	if($fila['NOMBRE']==$formulario["nusuario"]){
	  	    $vecesnombre++;	
	  	}
	  }
      if($vecesnombre>0){
	  	    $errores[]='Ya existe un usuario con ese Nombre de Usuario';	
	  	}
      
	  
	  if($formulario['contraseñareg']==""){
	  	$errores[]='Contraseña no rellenada';
	  }
	  if(strlen($formulario['contraseñareg'])<5){
	  	$errores[]='La contraseña dede tener al menos 5 caracteres';
	  }
	   if($formulario['contraseñaconf']==""){
	  	 $errores[]='Contraseña debe ser confirmada';
	   }
	   if($formulario['contraseñareg']!=$formulario['contraseñaconf']){
	  	 $errores[]='La contraseña y su confirmación deben coincidir';
	   }
	   if($formulario['tipousu']=='Medico'){
	        if($formulario['cedula']==""){
	  	    $errores[]='Cedula no rellenada';
		  }
		     if($formulario['eligeespe']=="..Seleccionar.."){
		 	  $errores[]='Si es un médico, debe elegir una especialidad';
		   }
	   }
	    if($formulario['tipousu']=='Paciente'){
	   	   $formulario['cedula']="-";
		   $formulario['eligeespe']="-";
		   $_SESSION["formulario"]=$formulario;
	    }
       if($formulario['nombre']==""){
	  	 $errores[]='El nombre no puede estar vacio';
	   }
	   if($formulario['apellidos']==""){
	  	 $errores[]='Apellidos no rellenos';
	   }
      // if(!empty($formulario['casilla'])){
      	// if($formulario['foto']==""){
      		// $errores[]='Debe elegir alguna foto si marcas la casilla';
      	// }
      // }
       if(($formulario['dni']=="")||($formulario['letra']=="")){
      	 $errores[]='El numero o la letra del DNI no están rellenos';	
       }  
       if(($formulario['dni']!="")&&($formulario['letra']!="")){
      	 $letras = array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');
		$modulo = $formulario['dni'] % 23;
		if($formulario['letra']!=$letras[$modulo]){
			$errores[]='La letra es incorrecta';
		}  
      }
	   
      // if(($formulario['nsocial']=="")||($formulario['nsocial12']=="")){
	  	// $errores[]='Algún campo del Nº Seguridad Social está vacío';
	  // }
      // if($formulario['telefono']=""){
      	// $errores[]='El campo Teléfono está vacío';
      // }
      // if(strlen($formulario['telefono'])!=9){
      	// $errores[]='El teléfono debe ser de 9 cifras';
	  // }
       if($formulario['email']==""){
      	 $errores[]='El campo email debe estar relleno';
       }else if(!ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*$",$formulario['email'])){
      	 $errores[]='Error,<b> ' .$formulario['email']. '</b> no es una direccion de email correcta';
       }
	   $todos=filas($conexion);
	   foreach($todos as $todo){
	  	if($todo['EMAIL']==$formulario["email"]){
	  	    $vecesemail++;	
	  	}
	  }
	   if($vecesemail>0){
	  	    $errores[]='Ya existe un usuario con ese E-mail';
	   }
      // if(($formulario['poblacion']!="")&&($formulario['calle']!="")&&($formulario['provincia']==0)){
      	// $errores[]= 'Debe elegir alguna provincia';
      // }
// 	  
   
	  if(count($errores)>0){
		$_SESSION['errores']=$errores;
		Header('Location: formulario.php');
	  }else{
	  	$_SESSION['register']='on';
		Header("Location:exito.php");	
	}
	
  }else{
  	Header("Location: formulario.php");
	session_destroy();
  }  
?>
<?php
  cerrarBD($conexion);
?>