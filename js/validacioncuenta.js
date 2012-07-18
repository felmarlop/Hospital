function validaRegistro(){
	//variable para almacenar errores
	var errores="";
	//No puede haber campos nulos
	var nusuario=document.getElementById("nusuario");
	var nombre=document.getElementById("nombre");
	var coreg=document.getElementById("contraseñareg");
	var coconf=document.getElementById("contraseñaconf");
	var tipoM=document.getElementById("tipo_medico");
	var tipoP=document.getElementById("tipo_paciente");
	var cedula=document.getElementById("cedula");
	var eligeespe=document.getElementById("eligeespe");
	var apellidos= document.getElementById("apellidos");
	var dni= document.getElementById("dni");
	// var sexH=document.getElementById("sexo_hombre");
	// var sexM=document.getElementById("sexo_mujer");
	// var foto=document.getElementById("foto");
	 var letra= document.getElementById("letra");
	// var seguridadsocial= document.getElementById("nsocial1");
	// var seguridadsocial2=document.getElementById("nsocial2");
    var email= document.getElementById("email");
	// var telefono= document.getElementById("telefono");
	// var poblacion= document.getElementById("poblacion");
	// var provincia= document.getElementById("provincia");
	// var calle= document.getElementById("calle");
	// var codigop= document.getElementById("codigop");
    var pemail=/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*$/;
    
    if(nusuario.value==""){
    	errores+= "El Nombre de Usuario debe ser rellenado.\n";
		document.getElementById("label_nusuario").className="error";
	}else if(((nusuario.value.length)<=4)&&(nusuario.value!="")){
    	document.getElementById("label_nusuario").className="error";
    	errores+= "El Nombre de Usuario debe tener al menos 5 caracteres.\n";
			
    }else{
    	document.getElementById("label_nusuario").className="label_nusuario";
    }
    if(((coreg.value.length)<=4)&&(coreg.value!="")){
    	errores+= "La contraseña debe tener al menos 5 caracteres.\n";
		document.getElementById("label_contraseñareg").className="error";
    }else{
    	document.getElementById("label_contraseñareg").className="label_contraseñareg";
    }
    if((coreg.value=="")){
    	errores+= "El Contraseña debe ser rellenada.\n";
		document.getElementById("label_contraseñareg").className="error";
    }else{
    	document.getElementById("label_contraseñareg").className="label_contraseñareg";
    }
    if((coconf.value=="")){
    	errores+= "Debe confirmar su contraseña.\n";
		document.getElementById("label_contraseñaconf").className="error";
    }else{
    	document.getElementById("label_contraseñaconf").className="label_contraseñaconf";
    }
    if((coreg.value)!=(coconf.value)){
    	errores+= "La Contraseña y su confirmacion no coinciden.\n";
    	document.getElementById("label_contraseñaconf").className="error";
    	document.getElementById("label_contraseñareg").className="error";
    	
    }else{
    	document.getElementById("label_contraseñaconf").className="label_contraseñaconf";
    }
    if((tipoM.checked==false)&&(tipoP.checked==false)){
    	errores+= "Debe elegir el tipo de usuario.\n";
    	document.getElementById("div_titulo_tipo").className="error2";
    }else{
    	document.getElementById("div_titulo_tipo").className="";
    }
    if(tipoM.checked==true){
    	if((cedula.value=="")){
    		errores+= "Si eres médico, la Cédula debe ser rellenada.\n";
    	    document.getElementById("label_cedula").className="error2";
    	}else{
            document.getElementById("label_cedula").className="label_cedula";
    	}
    	if((eligeespe.options[eligeespe.selectedIndex].value=="0")){
    		errores+= "Si eres médico, debe seleccionar alguna Especialidad.\n";
    	    document.getElementById("label_eligeespe").className="error";
    	}else{
    		document.getElementById("label_eligeespe").className="label_eligeespe";
    	}
    }
    if((dni.value=="")||(letra.value=="")){
		errores+= "El DNI debe ser rellenado .\n";
		document.getElementById("label_dni").className="error";
	}else if((dni.value!="")&&(letra.value!="")){
		var tabla=['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
		var modulo = dni.value % 23;
		if(letra.value.toUpperCase()!=tabla[modulo]){
			errores+= "La letra del DNI no se corresponde.\n";
			document.getElementById("label_dni").className="error";
		}
	}else{
		document.getElementById("label_dni").className="label_nombre";
	}
	if((nombre.value=="")){
		errores+= "El Nombre debe ser rellenado.\n";
		document.getElementById("label_nombre").className="error";
	}else{
		document.getElementById("label_nombre").className="label_nombre";
	}
	if((apellidos.value=="")){
		errores+= "Los Apellidos deben ser rellenados.\n";
		document.getElementById("label_apellidos").className="error2";
	}else{	// if((sexH.checked==false)&&(sexM.checked==false)){
		// errores+="Debe elegir el tipo de sexo.\n";
		// document.getElementById("div_titulo_sexo").className="error2";	
	// }else{
    	// document.getElementById("div_titulo_sexo").className="";
    // }
		document.getElementById("label_apellidos").className="label_apellidos";
	}

	if((email.value=="")){
		errores+= "El E-mail debe ser rellenado.\n";
		document.getElementById("label_email").className="error";
	}else if(!pemail.test(email.value)){
		errores+= "El formato del E-mail no es correcto.\n";
		document.getElementById("label_email").className="error";
    }else{
	    document.getElementById("label_email").className="label_email";
	}
	// if((seguridadsocial.value=="")||(seguridadsocial2.value=="")){
		// errores+= "El Nº Seguridad Social debe ser rellenado.\n";
		// document.getElementById("label_nsocial").className="error";
	// }else{
	    // document.getElementById("label_nsocial").className="label_nsocial";
	// }if((telefono.value=="")){
		// errores+= "El Nº Telefono debe ser rellenado.\n";
		// document.getElementById("label_telefono").className="error";
	// }else if(isNaN(telefono.value)){
		// errores+="Debe introducir sólo numeros en Nº Telefono.\n";
		// document.getElementById("label_telefono").className="error";
   // }else if(telefono.value.length<=8){
   	    // errores+="El Nº Telefono debe ser de 9 cifras.\n";
		// document.getElementById("label_telefono").className="error";
   // }else{
	    // document.getElementById("label_telefono").className="label_telefono";
	// }
// 	
	// if((provincia.options[provincia.selectedIndex].value=="0")&&(poblacion.value!="")&&(calle.value!="")){
		 // errores+="Debe seleccionar alguna provincia.\n";
		 // document.getElementById("label_provincia").className="error";
	// }else{
		 // document.getElementById("label_provincia").className="label_provincia";
	// }
	// if((casilla.checked==true)&&(foto.value=="")){
		// errores+= "Debe enviar alguna foto\n";
		// document.getElementById("label_foto").className="error";
	// }else{
		// document.getElementById("label_foto").className="label_foto";
	// }
	if(errores!=""){
		window.alert(errores);
		return false;
	}else{
		window.alert("Muy bien. Cuenta Completada");
		return true;
	}
}
//Deshabilitar campo Provincia si no indicamos Población o Calle
function supProvincia(){
	var calle=document.getElementById("calle");
	var poblacion=document.getElementById("poblacion");
	var provincia=document.getElementById("provincia");
	if((calle=="")||(poblacion=="")){
		provincia.disabled="disable";
	}else{
		provincia.disabled=null;
	}
}
//Habilitar o deshabilitar envio de foto
function habilitar(){
	if(document.getElementById("casilla").checked==true){
		document.getElementById("foto").disabled=null;
	}else{
	    document.getElementById("foto").disabled="disable";	
	}
	
}
//habilita los datos del medico
function datosMedico(){
	if(document.getElementById("tipo_medico").checked=true){
		document.getElementById("datos_medico").className="display";
	}
}
function datosMedico2(){
	if(document.getElementById("tipo_paciente").checked=true){
		document.getElementById("datos_medico").className="nodisplay";
	}
	
}





