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
  echo $_REQUEST["id"];
?>