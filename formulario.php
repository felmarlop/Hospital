<?php
   session_start();
   if(!isset($_SESSION["formulario"])){
   	  $formulario['nusuario']="";
	  $formulario['contraseñareg']="";
	  $formulario['contraseñaconf']="";
	  $formulario['provincia']="";
	  $formulario['eligeespe']="";
	  $formulario['sexo']="";
	  $formulario['tipousu']="";
	  $_SESSION['formulario']=$formulario;
  	 
   }else{
   	  $formulario = $_SESSION['formulario'];
   }
   if(isset($_SESSION["errores"])){
  	 $errores=$_SESSION["errores"];
   }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html>
<head>
		<Title>
			Hospital P&uacute;blico - Crear Cuenta
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
				
				<li id="menuinicio"><a href="inicio.html">INICIO</a></li> |
				<li id="menuespecialidades"><a href="especialidades.html">ESPECIALIDADES Y M&Eacute;DICOS</a></li> 
				
			</ul>
			<div id="fotoLogin">
				<a href="login.php"><img src="estilos/images/login.png"/></a>
			</div>	
		</div>
		<div id="registro">
			
			<?php
		  
  		  if(isset($errores)&& count($errores)>0){
  		  	echo "<div class=\"error\">";
  		  	foreach($errores as $error){
  		  		echo $error ."<br/>";
  		  	}
			echo "</div>";
		  }	
  	     ?>
			<form onsubmit="return validaRegistro()" action="validacion.php">
				<div id="parrafo1">
					<p>Rellene el siguiente formulario y pinche en TERMINAR para completar su cuenta. Gracias</p>
					<p>*Los Datos Personales y Datos de Usuario son obligatorios. Por seguridad, su nombre de usuario debe escribirlo en min&uacute;scula</p>
				
		
		        </div>
		        <div id="datos_usuario">
		        	<fieldset>
		        		<legend>Datos de Usuario</legend>
		        		<div id="div_nombreusuarioreg">
		        			<label id="label_nusuario" for="nusuario">Nombre de Usuario:</label>
							<input id="nusuario" name="nusuario" type="text"/>
		        		</div>
		        		<div id="div_contraseñareg">
		        			<label id="label_contraseñareg" for="contraseñareg">Escriba su contrase&ntilde;a:</label>
							<input id="contraseñareg" name="contraseñareg" type="password"/>
		        		</div>
		        		<div id="div_contraseñaconf">
		        			<label id="label_contraseñaconf" for="contraseñaconf">Confirme su contrase&ntilde;a:</label>
							<input id="contraseñaconf" name="contraseñaconf" type="password"/>
		        		</div>
		        		<div id="div_tipo">
							<div id="div_titulo_tipo">
								Tipo de usuario:
							</div>
							<div id="div_tipo_valor">
								<?php
              	                  if($formulario['tipousu']=="Paciente"){
              	                	echo '<INPUT id="tipo_paciente" TYPE="radio" NAME="tipousu" VALUE="Paciente" onclick="datosMedico2()" checked="checked"/>Paciente<BR>';
              	                  }else{
              	                  	echo '<INPUT id="tipo_paciente" TYPE="radio" NAME="tipousu" VALUE="Paciente" onclick="datosMedico2()"/>Paciente<BR>';
              	                  } 
              	                ?>
              	                <?php
              	                  if($formulario['tipousu']=="Medico"){
              	                	echo '	<INPUT id="tipo_medico" TYPE="radio" NAME="tipousu" VALUE="Medico" onclick="datosMedico()" checked="checked"/>Medico<BR>';
              	                  }else{
              	                  	echo '<INPUT id="tipo_medico" TYPE="radio" NAME="tipousu" VALUE="Medico" onclick="datosMedico()">Medico<BR/>';
              	                  } 
              	                ?>
							</div>
						</div>
		        	</fieldset>
		        </div>
		        <div id="datos_medico" class="nodisplay">
		        	<fieldset>
		        		<legend>Datos del M&eacute;dico</legend>
		        		<div id="div_cedula">
							<label id="label_cedula" for="cedula">N&ordm; C&eacute;dula:</label>
							<input id="cedula" name="cedula" type="text"/>
						</div>
						<div id="div_eligeespe">
                            <label id="label_eligeespe" for="eligeespe">Especialidad:</label>
                            <select id="eligeespe" name="eligeespe">
                            	<option>..Seleccionar..</option>
                            	<?php
              	                    if($formulario["eligeespe"]=="Traumatologia"){
              	                       	echo "<option  selected='true'>Traumatologia</option>";
              	                    } else{
              	                      	echo "<option>Traumatologia</option>";
              	                    }
              	                ?>
                            	<?php
              	                    if($formulario["eligeespe"]=="Pediatria"){
              	                       	echo "<option selected='true'>Pediatria</option>";
              	                    } else{
              	                      	echo "<option>Pediatria</option>";
              	                    }
              	                ?>
                            	<?php
              	                    if($formulario["eligeespe"]=="Oftalmologia"){
              	                       	echo "<option selected='true'>Oftalmologia</option>";
              	                    } else{
              	                      	echo "<option>Oftalmologia</option>";
              	                    }
              	                ?>
                            </select>
                        </div>  
		        	</fieldset>
		        </div>
				<div id="datos_personales">
					<fieldset>
						<legend>Datos Personales</legend>
						<div id="div_sexo">
							<div id="div_titulo_sexo">
								Sexo:
							</div>
							<div id="div_sexo_hombre">
								<?php
              	                  if($formulario['sexo']=="hombre"){
              	                	echo '<input id="sexo_hombre" name="sexo" type="radio" value="hombre" checked="checked"/>';
              	                  }else{
              	                  	echo '<input id="sexo_hombre" name="sexo" type="radio" value="hombre"/>';
              	                  } 
              	                ?>
								<label id="label_hombre" for="sexo_hombre">Hombre</label>
							</div>
							<div id="div_sexo_mujer">
								<?php
              	                  if($formulario['sexo']=="mujer"){
              	                	echo '<input id="sexo_mujer" name="sexo" type="radio" value="mujer" checked="checked"/>';
              	                  }else{
              	                  	echo '<input id="sexo_mujer" name="sexo" type="radio" value="mujer"/>';
              	                  } 
              	                ?>
       							<label id="label_mujer" for="sexo_mujer">Mujer</label>
							</div>
						</div>
						<div id="div_nombre">
							<label id="label_nombre" for="nombre">Nombre:</label>
							<input id="nombre" name="nombre" type="text"/>
						</div>
						 <div id="div_apellidos">
							<label id="label_apellidos" for="apellidos">Apellidos:</label>
							<input id="apellidos" name="apellidos" type="text"/>
						</div>
						<div id="habilitar">
							<input id="casilla" name="casilla" type="checkbox" onchange="habilitar()" /> <div id="texto_habilitar">Marque la casilla si desea enviar foto de perfil.</div>
						</div>
						<div id="div_foto">
							<label id="label_foto" for="foto">Foto:</label>
							<input id="foto" name="foto" type="file" disabled="true"/>
						</div>
						<div id="div_dni">
							<label id="label_dni" for="dni">D.N.I.:</label>
							<input id="dni" name="dni" type="text" maxlength="8"/>-
					        <input id="letra" name="letra" type="text" maxlength="1"/>
						</div>
						<div id="div_nsocial">
							<label id="label_nsocial" for="nsocial">N&ordm; Seguridad Social:</label>
							<input id="nsocial1" name="nsocial" type="text" maxlength="2"/>
							<input id="nsocial2" name="nsocial2" type="text" maxlength="9"/>
						</div>
						<div id="div_email">
							<label id="label_email" for="email">E-mail:</label>
							<input id="email" name="email" type="text"/>
						</div>
						<div id="div_telefono">
							<label id="label_telefono" for="telefono">N&ordm; Tel&eacute;fono:</label>
							<input id="telefono" name="telefono" type="tel" maxlength="9"/>
						</div>
					</fieldset>
				</div>
				<div id="Direccion">
					<fieldset>
						<legend>Direcci&oacuten</legend>
						<div id="div_poblacion">
							<label id="label_poblacion" for="poblacion">Poblaci&oacuten:</label>
                            <input id="poblacion" name="poblacion" type="text" onchange="suProvincia()"/>
						</div>
						<div id="div_calle">
                            <label id="label_calle" for="calle">Calle/Avda.:</label>
                            <input id="calle" name="calle" type="text" onchange="supProvincia()"/>   
                        </div>  
						<div id="div_provincia">
                            <label id="label_provincia" for="provincia">Provincia:</label>
                            <select id="provincia" name="provincia" disabled="true">
                            	<option value="0">..Seleccionar..</option>
                            	<?php
              	                    if($formulario["provincia"]=="Almería"){
              	                       	echo "<option selected='true'>Almería</option>";
              	                    } else{
              	                      	echo "<option>Almería</option>";
              	                    }
              	                ?>
                            	<?php
              	                    if($formulario["provincia"]=="Cadiz"){
              	                       	echo "<option selected='true'>Cadiz</option>";
              	                    } else{
              	                      	echo "<option>Cádiz</option>";
              	                    }
              	                ?>
                            	<?php
              	                    if($formulario["provincia"]=="Cordoba"){
              	                       	echo "<option selected='true'>Cordoba</option>";
              	                    } else{
              	                      	echo "<option>Córdoba</option>";
              	                    }
              	                ?>
                            	<?php
              	                    if($formulario["provincia"]=="Granada"){
              	                       	echo "<option selected='true'>Granada</option>";
              	                    } else{
              	                      	echo "<option>Granada</option>";
              	                    }
              	                ?>
                            	<?php
              	                    if($formulario["provincia"]=="Huelva"){
              	                       	echo "<option selected='true'>Huelva</option>";
              	                    } else{
              	                      	echo "<option>Huelva</option>";
              	                    }
              	                ?>
                            	<?php
              	                    if($formulario["provincia"]=="Jaen"){
              	                       	echo "<option selected='true'>Jaen</option>";
              	                    } else{
              	                      	echo "<option>Jaen</option>";
              	                    }
              	                ?>
                            	<?php
              	                    if($formulario["provincia"]=="Malaga"){
              	                       	echo "<option selected='true'>Malaga</option>";
              	                    } else{
              	                      	echo "<option>Malaga</option>";
              	                    }
              	                ?>
                            	<?php
              	                    if($formulario["provincia"]=="Sevilla"){
              	                       	echo "<option selected='true'>Sevilla</option>";
              	                    } else{
              	                      	echo "<option>Sevilla</option>";
              	                    }
              	                ?>
                            </select>
                        </div>  
                        <div id="div_cogigop">
                            <label id="label_codigop" for="codigop">Codigo postal:</label>
                            <input id="codigop" name="codigop" type="text" maxlength="5"/>   
                        </div>  
					</fieldset>
				</div>
				<div id="Descripción">
					<fieldset>
						<div id="div_submit">
							<button id="submit"><b>Terminar</b></button>
						</div>
						
					</fieldset>
				</div>
			</form>
		</div>
		<div id="Piepagina">
			&copy; Todos los derechos reservados. F&eacute;lix Mart&iacute;n L&oacute;pez y Jos&eacute Manuel Dom&iacutenguez P&eacuterez
		</div>
	</body>	