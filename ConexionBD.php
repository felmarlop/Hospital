<?php

function ConexionBD()
{
	//$host="oci:dbname=localhost/XE";
	//$host="oci:dbname=XE";
	//$usuario="IISSI";
	//$password="iissi";
	$host="oci:dbname=localhost/XE";
	$usuario="IISSI_H";
	$password="iissi";
	
	$conexion=null;
	
	try{
		$conexion=new PDO($host,$usuario,$password);
    	
     /* Indicar que queremos que lance excepciones cuando ocurra un error*/ 
     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    	
	}catch(PDOException $e){
		$_SESSION['excepcion']=$e;
		header("Location:error.php");
	}
	return $conexion;
}

function CerrarBD($conexion){
	$conexion=null;
}

?>