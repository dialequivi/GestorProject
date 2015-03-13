$(document).ready(function() {//Se ejecuta unicamente cuando la pagina se haya cargado completamente

	/**Declaraciones para las manipulaciones de eventos
	==============================*/

	//$("#crearProy").click(ocultarMostrar);
	//$('[name=registroNuevoProy]').click(Registrarme);
	$('#registrarProy').submit(verificarCodProy);
	///$('#registrarObj').click(primerObjetivo);
	$('[name=btnRegistroNuevoObj]').click(primerObjetivo);
	//$('#crearProy').click(ocultarMostrar);
	$('[name=btnRegistroNuevoMeta]').click(primerMeta);

	$('[name=btnRegistroNuevoActi]').click(primerActi);
	
	$('[name=btnAddObj]').click(agregarObjetivo);

	$('[name=btnAddMeta]').click(agregarMeta);

	//$('[name=muestreMeta]').click(agregarActividad);
	$('[name=btnAddActi]').click(agregarActividad);



	$('[name=btnNuevoObjPro]').click( addObjectFromModify );

	$('[name=btnNuevoMetaPro]').click( addMetaFromModify );

	$('[name=btnNuevoActividadPro]').click( addActiFromModify );


	$('[name=btnModifyPro]').click( modifyProyecto ); 

	$('[name=btnModifyObjPro]').click( modifyObject );

	$('[name=btnModifyMetaPro]').click( modifyMeta );

	$('[name=btnModifyActividadPro]').click( modifyActividad );


	//$('#menuProyVigentes').click( guardarObjetivoModify );

	

	$primerObjetivo = false;

	$primerMeta = false;

	$primerActividad = false;

	$modificarObjetivo = false;

	$modifcarProyecto = false;

	$modificarMeta = false;

	$modificarActividad = false;




	//datosRegistroProy1 = [];



	/**Métodos
	==============================*/




/*Agrega un objetivo a un proyecto previamente creado, los cuales se consultan desde el menu > modificar proyecto*/
function addObjectFromModify( ){

	//alert(" CLICK!");
	$codigoProyecto = this.id;
	//alert($codigo);
	console.log("Codigo proyecto: "+$codigoProyecto);
	$.cookie('codP', $codigoProyecto );
	agregarObjetivo();
}

/*Agregra una meta a un objetivo de un proyecto previamente creado, la meta se agrega al código de objetivo que seleccione el usuario*/
function addMetaFromModify( ){
	$codigoObjetibo = this.id;
	console.log("Codigo objetivo: "+$codigoObjetibo);
	$.cookie('codOP', $codigoObjetibo );
	agregarMeta();
}

/*Agrega una actividad a una meta de un proyecto previamente creado, la actividad se agrega al código de meta seleccionado*/
function addActiFromModify(){
	$codigoMeta = this.id;
	console.log("Codigo meta: "+$codigoMeta);
	$.cookie('codMP', $codigoMeta);
	agregarActividad();
}

/*Permite la modificación de un proyecto*/
function modifyProyecto(){
	if($modifcarProyecto == false){ 			//OBTENER LOS VALORES
		var $fila = $(this).closest("tr"); //Busca la fila más cercana
		var $celda = $fila.find(".default"); // Busca todas las celdas
		$campo=0;
		$.each($celda, function(){// Visits every single <td> element
			//console.log($(this).text());// Prints out the text within the <td>
			switch ($campo){
				case 0:
					$('[name=codigoProy]').val( $.trim($(this).text()) );
					break;
				case 1:
					$('[name=nombreProy]').val( $.trim($(this).text()) );
					break;
				case 2:
					//var dat = $(this).text();
					$('[name=fechaIniProy]').val( $.trim( $(this).text() ) );//eliminar espacios en blanco
					break;
				case 3:
					$('[name=fechafinProy]').val( $.trim( $(this).text() ) );
					break;
				case 4:
					$('[name=montoProy]').val( $.trim($(this).text()) );
					break;
				case 5:
					$('[name=descripcionProy]').val( $.trim( $(this).text()) );
					break;
				case 6:
					break;
				case 7:
					var esta = $.trim( $(this).text() ); //trim elinima espacios en blanco al inicio y final de la cadena

					if( esta == "Activo" ){ //strcmp($obtenido, "disponible") != 0 
						$('[name=estadoProy]').val( 1 );
					}
					else if(esta == "Finalizado"){
						$('[name=estadoProy]').val( 2 );
					}
					else if(esta == "Cancelado"){
						$('[name=estadoProy]').val( 3 );
					}
					else if(esta == "Inactivo"){ // "Inactivo"
						$('[name=estadoProy]').val( 4 );
					}
					//$('[name=estadoObj]').val( $(this).text() );
					break;

			}
			
			$campo++;
			
		})

		$modifcarProyecto = true;
		//$primerObjetivo = true;
		$('#tituloProyecto').html("Modificar Proyecto");
		$('#formNewProy').show("fast");
	}
	else{//ESTABLECER LOS VALORES UNA VEZ SE HA HECHO LA MOFICICACIÓN
		$modifcarProyecto = false;
		var $fila = $(this).closest("tr"); //Busca la fila más cercana
		var $celda = $fila.find(".default"); // Busca todas las celdas
		$campo=0;
		$.each($celda, function(){// Visits every single <td> element
			//console.log($(this).text());// Prints out the text within the <td>
			switch ($campo){
				case 0:
					break;
				case 1:
					 $(this).innerHTML = $.cookie('nameP') ;
					break;
				case 2:
					//var dat = $(this).text();
					//$('[name=fechaIniProy]').val( $.trim( $(this).text() ) );//eliminar espacios en blanco
					break;
				case 3:
					//$('[name=fechafinProy]').val( $.trim( $(this).text() ) );
					break;
				case 4:
					//$('[name=montoProy]').val( $.trim($(this).text()) );
					break;
				case 5:
					//$('[name=descripcionProy]').val( $.trim( $(this).text()) );
					break;
				case 6:
					break;
				case 7:
					/*var esta = $.trim( $(this).text() ); //trim elinima espacios en blanco al inicio y final de la cadena

					if( esta == "Activo" ){ //strcmp($obtenido, "disponible") != 0 
						$('[name=estadoProy]').val( 1 );
					}
					else if(esta == "Finalizado"){
						$('[name=estadoProy]').val( 2 );
					}
					else if(esta == "Cancelado"){
						$('[name=estadoProy]').val( 3 );
					}
					else if(esta == "Inactivo"){ // "Inactivo"
						$('[name=estadoProy]').val( 4 );
					}*/
					//$('[name=estadoObj]').val( $(this).text() );
					break;

			}
			
			$campo++;
			
		})

	}
}
/*Guarda un proyecto previamente modificado*/
function guardarProyectoModify(){
	//LOS VALORES YA SE OBTUVIERON EN LA FUNCION datosProy1()
	$.ajax({
    		type: "POST",
	            url: 'php/modificarProyecto.php',
	            data: {
	                datosFormulario: $.cookie('codP'),
	            },
	            dataType: "html",
	            success: function(RespHTML) {
	                alert(RespHTML);
					$('#formNewProy').hide("fast");//esconde el formulario de objetivo
					modifyProyecto();

	            },
	            error: function() {
	                alert('Lo sentimos, se ha producido un error.');
	            }
	        });

}
	
/*Permite la modificación de un objetivo*/
function modifyObject(){
	//$codigoObjetibo = this.id;
	//console.log("Codigo objetivo: "+$codigoObjetibo);
	
	//$tableData = $("#"+$codigoObjetibo+"_tabla").children("td").map(function(){
	//	return $("#"+$codigoObjetibo+"_tabla").text();
	//}).get();
	//console.log("Datos tabla:");

	/*var $row = $(this).closest("tr"); //Find the row
	var $text = $row.find(".default").text(); //find the text

	alert($text);
	console.log($text);*/
	var $row = $(this).closest("tr"); // Finds the closest row <tr> 
	var $tds = $row.find(".default"); // Finds all children <td> elements

	$campo = 0;
	$.each($tds, function(){// Visits every single <td> element
		//console.log($(this).text());// Prints out the text within the <td>
		switch ($campo){
			case 0:
				$("#codigoObj").text( $.trim($(this).text()) );
				break;
			case 1:
				$('[name=nombreObj]').val( $.trim($(this).text()) );
				break;
			case 2:
				//var dat = $(this).text();
				$('[name=fechaIniObj]').val( $.trim( $(this).text() ) );//eliminar espacios en blanco
				break;
			case 3:
				$('[name=fechafinObj]').val( $.trim( $(this).text() ) );
				break;
			case 4:
				$('[name=montoObj]').val( $.trim($(this).text()) );
				break;
			case 5:
				$('[name=descripcionObj]').val( $.trim( $(this).text()) );
				break;
			case 6:
				break;
			case 7:
				var esta = $.trim( $(this).text() ); //trim elinima espacios en blanco al inicio y final de la cadena

				if( esta == "Activo" ){ //strcmp($obtenido, "disponible") != 0 
					$('[name=estadoObj]').val( 1 );
				}
				else if(esta == "Finalizado"){
					$('[name=estadoObj]').val( 2 );
				}
				else if(esta == "Cancelado"){
					$('[name=estadoObj]').val( 3 );
				}
				else if(esta == "Inactivo"){ // "Inactivo"
					$('[name=estadoObj]').val( 4 );
				}
				//$('[name=estadoObj]').val( $(this).text() );
				break;

		}
		
		$campo++;
		
	})

	$modificarObjetivo = true;
	$primerObjetivo = true;
	$('#tituloObjetivo').html("Modificar Objetivo");
	$('#formNewObj').show("fast");
}

/*Se guarda el objetivo modificado*/
	function guardarObjetivoModify(){
		//Modificar Objetivo
		//console.log( $("#tituloObjetivo").text() );
		$.cookie('codOP', $("#codigoObj").text());//Se obtiene acá para evitar sobreescritura del código
		//console.log($.cookie('codOP'));
   	
    	//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVO OBJETIVO
    	//Los otros campos ya se capturaron el el metodo primerObjetivo()
    	$.ajax({
    		type: "POST",
	            url: 'php/modificarObjetivo.php',
	            data: {
	                datosFormulario: $.cookie('codOP'),
	            },
	            dataType: "html",
	            success: function(RespHTML) {
	                alert(RespHTML);
					$('#formNewObj').hide("fast");//esconde el formulario de objetivo
	            },
	            error: function() {
	                alert('Lo sentimos, se ha producido un error.');
	            }
	        });
	}


function modifyMeta(){
	var $fila = $(this).closest("tr"); //Busca la fila más cercana
	var $celda = $fila.find(".default"); // Busca todas las celdas
	$campo=0;
	$.each($celda, function(){// Visits every single <td> element
		//console.log($(this).text());// Prints out the text within the <td>
		switch ($campo){
			case 0:
				$('#codigoMeta').text( $.trim($(this).text()) );
				break;
			case 1:
				$('[name=nombreMeta]').val( $.trim($(this).text()) );
				break;
			case 2:
				//var dat = $(this).text();
				$('[name=fechaIniMeta]').val( $.trim( $(this).text() ) );//eliminar espacios en blanco
				break;
			case 3:
				$('[name=fechafinMeta]').val( $.trim( $(this).text() ) );
				break;
			case 4:
				$('[name=montoMeta]').val( $.trim($(this).text()) );
				break;
			case 5:
				$('[name=descripcionMeta]').val( $.trim( $(this).text()) );
				break;
			case 6:
				break;
			case 7:
				var esta = $.trim( $(this).text() ); //trim elinima espacios en blanco al inicio y final de la cadena

				if( esta == "Activo" ){ //strcmp($obtenido, "disponible") != 0 
					$('[name=estadoMeta]').val( 1 );
				}
				else if(esta == "Finalizado"){
					$('[name=estadoMeta]').val( 2 );
				}
				else if(esta == "Cancelado"){
					$('[name=estadoMeta]').val( 3 );
				}
				else if(esta == "Inactivo"){ // "Inactivo"
					$('[name=estadoMeta]').val( 4 );
				}
				//$('[name=estadoObj]').val( $(this).text() );
				break;

		}
		
		$campo++;
		
	})

	$modificarMeta = true;
	$primerMeta = true;
	//$primerObjetivo = true;
	$('#tituloMeta').html("Modificar Meta");
	$('#formNewMeta').show("fast");
}


function guardarMetaModify(){
	$.cookie('codMP', $("#codigoMeta").text());//Se obtiene acá para evitar sobreescritura del código
		//console.log($.cookie('codOP'));
   	
    	//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVO OBJETIVO
    	//Los otros campos ya se capturaron el el metodo primerMeta()
    	$.ajax({
    		type: "POST",
	            url: 'php/modificarMeta.php',
	            data: {
	                datosFormulario: $.cookie('codMP'),
	            },
	            dataType: "html",
	            success: function(RespHTML) {
	                alert(RespHTML);
					$('#formNewMeta').hide("fast");//esconde el formulario de meta
	            },
	            error: function() {
	                alert('Lo sentimos, se ha producido un error.');
	            }
	        });
}


function modifyActividad(){
	var $fila = $(this).closest("tr"); //Busca la fila más cercana
	var $celda = $fila.find(".default"); // Busca todas las celdas
	$campo=0;
	$.each($celda, function(){// Visits every single <td> element
		//console.log($(this).text());// Prints out the text within the <td>
		switch ($campo){
			case 0:
				$('#codigoActi').text( $.trim($(this).text()) );
				break;
			case 1:
				$('[name=nombreActi]').val( $.trim($(this).text()) );
				break;
			case 2:
				//var dat = $(this).text();
				$('[name=fechaIniActi]').val( $.trim( $(this).text() ) );//eliminar espacios en blanco
				break;
			case 3:
				$('[name=fechafinActi]').val( $.trim( $(this).text() ) );
				break;
			case 4:
				$('[name=montoActi]').val( $.trim($(this).text()) );
				break;
			case 5:
				$('[name=descripcionActi]').val( $.trim( $(this).text()) );
				break;
			case 6:
				break;
			case 7:
				var esta = $.trim( $(this).text() ); //trim elinima espacios en blanco al inicio y final de la cadena

				if( esta == "Activo" ){ //strcmp($obtenido, "disponible") != 0 
					$('[name=estadoActi]').val( 1 );
				}
				else if(esta == "Finalizado"){
					$('[name=estadoActi]').val( 2 );
				}
				else if(esta == "Cancelado"){
					$('[name=estadoActi]').val( 3 );
				}
				else if(esta == "Inactivo"){ // "Inactivo"
					$('[name=estadoActi]').val( 4 );
				}
				//$('[name=estadoObj]').val( $(this).text() );
				break;

		}
		
		$campo++;
		
	})

	$modificarActividad = true;
	$primerActividad = true;
	//$primerObjetivo = true;
	$('#tituloActividad').html("Modificar Actividad");
	$('#formNewActi').show("fast");	
}

function guardarActividadModify(){
	$.cookie('codAP', $("#codigoActi").text());//Se obtiene acá para evitar sobreescritura del código
		//console.log($.cookie('codOP'));

    	//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVO OBJETIVO
    	//Los otros campos ya se capturaron el el metodo primerMeta()
    	$.ajax({
    		type: "POST",
    		url: 'php/modificarActi.php',
    		data: {
    			datosFormulario: $.cookie('codMP'),
    		},
    		dataType: "html",
    		success: function(RespHTML) {
    			alert(RespHTML);
					$('#formNewActi').hide("fast");//esconde el formulario de meta
				},
				error: function() {
					alert('Lo sentimos, se ha producido un error.');
				}
			});
    }

/*Agrega un nuevo objetivo a un proyecto ya creado
*/
	function agregarObjetivo(){
		//alert("Agregar Objetivo");
		$primerObjetivo = true;
		
		$.ajax({
            type: "POST",
            url: 'php/ultimoCodigoObj.php',
            data: {
                datosFormulario: $.cookie('codP'),
                //"datosFormulario": JSON.stringify(datosRegistroProy1)
            },
            dataType: "html",
            //timeout: 1000,
            //beforeSend: function() {
              //  alert('En breve se enviará la solicitud.');
            //},
            success: function(RespHTML) {
                //$('#Mensaje').html(RespHTML);
                //alert(RespHTML);

                $.cookie('codOP', RespHTML); //el codigo se agrega incrementado en uno. Consultado de la BD

                $('#codigoObj').html( RespHTML ); 
				$('#formNewObj').show("fast");

				$('#btnAddObj').hide("fast");

				$('#filaMeta').hide("fast");
				$('#filaActi').hide("fast");

				$('#btnAddMeta').hide("fast");
				$('#btnAddActi').hide("fast");    
            },
            error: function() {
                alert('Lo sentimos, se ha producido un error.');
            }
        });
	}

	/*Agrega una nueva meta acorde al objetivo que se seleccione*/
	function agregarMeta(){
		////alert("Vamos a consultar los codigos")
		$primerMeta = true;
		$.ajax({
            type: "POST",
            url: 'php/codigosObjetivos.php',
            data: {
                datosFormulario: $.cookie('codP'),
                //"datosFormulario": JSON.stringify(datosRegistroProy1)
            },
            dataType: "html", /////OJO ESTABA EN json************************************************************
            //timeout: 1000,
            //beforeSend: function() {
              //  alert('En breve se enviará la solicitud.');
            //},
            success: function(RespHTML) {
                //$('#Mensaje').html(RespHTML);
                //alert(RespHTML[0]);
                //alert(RespHTML[1]);
                console.log(RespHTML);
                
                //alert(RespHTML[1]);

                //datosRegistroProy1 = RespHTML;//recibo el array

                //alert(datosRegistroProy1[2]);

                $.cookie('codMP', RespHTML); //el codigo se agrega incrementado en uno. Consultado de la BD
                $('#codigoMeta').html( RespHTML); 
                //( $.cookie('codMP') );
                //$('#codMetaP').html( RespHTML );
                //$('#nameMetaP').html( "" );
				$('#formNewMeta').show("fast");

				$('#btnAddMeta').hide("fast");

				//$('#filaObje').hide("fast");
				$('#filaActi').hide("fast");
				
				$('#btnAddObj').hide("fast");
				$('#btnAddActi').hide("fast");


               
            },
            error: function() {
                alert('Lo sentimos, se ha producido un error.');
            }
        });
	}

	/*Agrega una nueva actividad acorde a la meta que se seleccione*/
	function agregarActividad(){
		$primerActividad =  true;
		$.ajax({
            type: "POST",
            url: 'php/ultimoCodigoActi.php',
            data: {
                datosFormulario: $.cookie('codP'),
                //"datosFormulario": JSON.stringify(datosRegistroProy1)
            },
            dataType: "html", /////OJO ESTABA EN json************************************************************
            //timeout: 1000,
            //beforeSend: function() {
              //  alert('En breve se enviará la solicitud.');
            //},
            success: function(RespHTML) {
                //$('#Mensaje').html(RespHTML);
                //alert(RespHTML[0]);
                //alert(RespHTML[1]);
                console.log("Sigte código: ");
                console.log(RespHTML);
                
                //alert(RespHTML[1]);

                //datosRegistroProy1 = RespHTML;//recibo el array

                //alert(datosRegistroProy1[2]);

                $.cookie('codAP', RespHTML); //el codigo se agrega incrementado en uno. Consultado de la BD
                $('#codigoActi').html( RespHTML); 
                //( $.cookie('codMP') );
                //$('#codMetaP').html( RespHTML );
                //$('#nameMetaP').html( "" );
				$('#formNewActi').show("fast");

				$('#btnAddActi').hide("fast");

				//$('#filaObje').hide("fast");
				//$('#filaActi').hide("fast");
				
				$('#btnAddObj').hide("fast");
				$('#btnAddMeta').hide("fast");


               
            },
            error: function() {
                alert('Lo sentimos, se ha producido un error.');
            }
        });

	}


	/*VERIFICAR EL CODIGO DEL PROYECTO ESTA DISPONIBLE O NO */
	function verificarCodProy(event){
		event.preventDefault();
		if($modifcarProyecto == true){
			datosProy1();
		}
		else{
			$.ajax({
				type: "POST",
				url: 'php/verificaCodProy.php',
				dataType: "html",
	            data: $('#registrarProy').serialize(),
	            //data:{
	             //Codig: $('[name=codigoProy]').val()
	        	//},
	            //beforeSend: function() {
	            //  alert('Verificando código del proyecto.');
	            //},
	            //success: function(responde) {
	              //  $(responde.mensaje);
	            //},
	            success: function(RespHTML) {
	            	//alert($('[name=codigoProy]').val());
	            	var mens = RespHTML;
	                //$('#respon').html(RespHTML);
	                if(mens.search("no disponible") > -1){
	                	alert(mens);
	                	limpiarCampoForm('#registrarProy');
	                }else{
	                	//alert( $('[name=codigoProy]').val() );
	                	//var codigo = $('[name=codigoProy]').val();
	                	datosProy1();

	                	/*$.cookie('codP', $('[name=codigoProy]').val() );
	                	$.cookie('nameP', $('[name=nombreProy]').val() );
	                	$.cookie('dateIniP', $('[name=fechaIniProy]').val() );
	                	$.cookie('datefinP', $('[name=fechafinProy]').val() );
	                	$.cookie('montoP', $('[name=montoProy]').val() );
	                	$.cookie('estadoP', $('[name=estadoProy]').val() );
	                	$.cookie('descripcionP', $('[name=descripcionProy]').val() );*/
	                	
	                	//alert( $.cookie('codP') +" _ "+ $.cookie('estadoP'));

	                	
	                }
	                
	            },
	            error: function() {
	                alert('Lo sentimos, se ha producido un error.');
	            }
			});
		}
	}
	function limpiarCampoForm(formulario){
		$(formulario).find('input').each(function(){
			switch(this.type){
				case 'text':
				$('#codigoProy').val('');
				break;
			}
		});
	}

	function datosProy1(){
		//CAPTURANDO LOS DATOS DEL FORMULARIO DEL NUEVO PROYECTO
		$.cookie('codP', $('[name=codigoProy]').val() );
        $.cookie('nameP', $('[name=nombreProy]').val() );
        $.cookie('dateIniP', $('[name=fechaIniProy]').val() );
        $.cookie('datefinP', $('[name=fechafinProy]').val() );
        $.cookie('montoP', $('[name=montoProy]').val() );
        $.cookie('estadoP', $('[name=estadoProy]').val() );
        $.cookie('descripcionP', $('[name=descripcionProy]').val() );

        //datosRegistroProy1[0] = $('[name=codigoProy]').val();
		/*datosRegistroProy1[0] = $('[name=codigoProy]').val();
		datosRegistroProy1[1] = $('[name=nombreProy]').val();
		datosRegistroProy1[2] = $('[name=fechaIniProy]').val();
		datosRegistroProy1[3] = $('[name=fechafinProy]').val();
		datosRegistroProy1[4] = $('[name=montoProy]').val();
		datosRegistroProy1[5] = $('[name=estadoProy]').val();
		datosRegistroProy1[6] = $('[name=descripcionProy]').val();*/
		if($modifcarProyecto == true){
			//$modifcarProyecto = false;
			guardarProyectoModify();
		}
		else{
	        //alert("nombre: "+datosRegistroProy1[1]+" y FECHA-FIN: "+datosRegistroProy1[3]+" ESTADO: "+datosRegistroProy1[5]);
	        $('#infoCrearProy').show("fast");
			$('#codProy').html( $.cookie('codP') );//SE AGREGA AL div #infoCrearProy el codigo del proyecto
			$('#nameProy').html( $.cookie('nameP') );

			$("#formNewProy").hide("fast");
			$('#formNewObj').show("fast");
			$('#codigoObj').html( $.cookie('codP') +".1"  ); //codigo proyecto + .1  de primer objetivo
			//EL SIGUENTE BLOQUE ES PARA ENVIAR LAS COOKIES de proyecto AL ACORDEON HOME
	          $('#codProy1').html( $.cookie('codP') );
	          $('#nameProy1').html( $.cookie('nameP') );
	          $('#nameProy2').html( $.cookie('nameP') );
	          $('#dateIniProy1').html( $.cookie('dateIniP') );
	          $('#dateFinProy1').html( $.cookie('datefinP') );
	          $('#montoProy1').html( $.cookie('montoP') );
	          $('#estadoProy1').html( $.cookie('estadoP') );
	          $('#descripcionProy1').html( $.cookie('descripcionP') );
	      	//SE CIERRA EL BLOQUE DE COOKIES ENVIADAS AL ACORDEON DEL HOME
      }

   }


   function primerObjetivo(){
		//PERIMERO SE DEBEN VERIFICAR LOS CAMPOS

		//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVO OBJETIVO
	    $.cookie('nameOP', $('[name=nombreObj]').val());
	    $.cookie('dateIniOP', $('[name=fechaIniObj]').val());
	    $.cookie('datefinOP', $('[name=fechafinObj]').val());
	    $.cookie('montoOP', $('[name=montoObj]').val());
	    $.cookie('estadoOP', $('[name=estadoObj]').val());
	    $.cookie('descripOP', $('[name=descripcionObj]').val());

		if($primerObjetivo == false){
			//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVO OBJETIVO
			$.cookie('codOP', $.cookie('codP')+".1"  );
			
		}
		else if($modificarObjetivo == true){
			$modificarObjetivo = false;
			$primerObjetivo = false;
			guardarObjetivoModify();

		}else{
    	
				/*datosRegistroProy1[7] = datosRegistroProy1[0] +".1";
				datosRegistroProy1[8] = $('[name=nombreObj]').val();
				datosRegistroProy1[9] = $('[name=fechaIniObj]').val();
				datosRegistroProy1[10] = $('[name=fechafinObj]').val();
				datosRegistroProy1[11] = $('[name=montoObj]').val();
				datosRegistroProy1[12] = $('[name=estadoObj]').val();
				datosRegistroProy1[13] = $('[name=descripcionObj]').val();*/
				//alert("Listo");
				//alert("CODIGO: "+datosRegistroProy1[7]+" y FECHA-FIN: "+datosRegistroProy1[10]+" ESTADO: "+datosRegistroProy1[12]);

			$('#codObjP').html( $.cookie('codOP') );//SE AGREGA AL div el codigo del objetivo
			
			$('#nameObjP').html( $.cookie('nameOP') );

			//alert( $("#codigoObj").text() );
			console.log( $("#codigoObj").text() );

			$('#formNewObj').hide("fast");//esconde el formulario de objetivo
	        $('#formNewMeta').show("fast");//muestra el formulario de meta
	        $('#codigoMeta').html( $.cookie('codOP') +".1"  );//codigo meta + .1 de nueva meta
	        //EL SIGUENTE BLOQUE ES PARA ENVIAR LAS COOKIES de objetivo AL ACORDEON HOME
	          
	          $('#accordion2').show("fast");
	          $('#codObj1').html( $.cookie('codOP') );
	          $('#nameObj1').html( $.cookie('nameOP') );
	          $('#nameObj2').html( $.cookie('nameOP') );
	          $('#dateIniObj1').html( $.cookie('dateIniOP') );
	          $('#dateFinObj1').html( $.cookie('datefinOP') );
	          $('#montoObj1').html( $.cookie('montoOP') );
	          $('#estadoObj1').html( $.cookie('estadoOP') );
	          $('#descripcionObj1').html( $.cookie('descripcionOP') );
	      	//SE CIERRA EL BLOQUE DE COOKIES ENVIADAS AL ACORDEON DEL HOME
      	}

 	}

	function primerMeta(){
		//PERIMERO SE DEBEN VERIFICAR LOS CAMPOS
		//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVA META
		
		$.cookie('nameMP', $('[name=nombreMeta]').val() );
		$.cookie('dateIniMP', $('[name=fechaIniMeta]').val());
		$.cookie('datefinMP', $('[name=fechafinMeta]').val());
		$.cookie('montoMP', $('[name=montoMeta]').val() );
		$.cookie('estadoMP', $('[name=estadoMeta]').val());
		$.cookie('descripMP', $('[name=descripcionMeta]').val());

		if($primerMeta == false){
			//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVO OBJETIVO
			$.cookie('codMP', $.cookie('codOP') +".1" );
			console.log("primer meta");
		}
		else if($modificarMeta == true){
			$modificarMeta = false;
			$primerMeta = false;
			guardarMetaModify();
		}else{

		
		
		
			/*datosRegistroProy1[14] = datosRegistroProy1[7] +".1";
			datosRegistroProy1[15] = $('[name=nombreMeta]').val();
			datosRegistroProy1[16] = $('[name=fechaIniMeta]').val();
			datosRegistroProy1[17] = $('[name=fechafinMeta]').val();
			datosRegistroProy1[18] = $('[name=montoMeta]').val();
			datosRegistroProy1[19] = $('[name=estadoMeta]').val();
			datosRegistroProy1[20] = $('[name=descripcionMeta]').val();*/
			//alert("Listo");
			//alert("CODIGO: "+datosRegistroProy1[7]+" y FECHA-FIN: "+datosRegistroProy1[10]+" ESTADO: "+datosRegistroProy1[12]);

			$('#codMetaP').html( $.cookie('codMP') );
			$('#nameMetaP').html( $.cookie('nameMP'));
			if($primerObjetivo == true && $primerMeta == false){
				$('#filaMeta').show("fast");

			}else if($primerMeta == true){
				$('#filaActi').show("fast");
			}

			$('#formNewMeta').hide("fast");//esconde el formulario de objetivo

			

	        $('#formNewActi').show("fast");//muestra el formulario de meta
	        //$('#btnRegistroNuevoActi').text('Terminar');//Cambio del texto del boton

	        $('#codigoActi').html( $.cookie('codMP') +".1"  );//codigo meta + .1 de nueva actividad

	        //EL SIGUENTE BLOQUE ES PARA ENVIAR LAS COOKIES de objetivo AL ACORDEON HOME
	          $('#accordion3').show("fast");
	          $('#codMet1').html( $.cookie('codMP') );
	          $('#nameMet1').html( $.cookie('nameMP') );
	          $('#nameMet2').html( $.cookie('nameMP') );
	          $('#dateIniMet1').html( $.cookie('dateIniMP') );
	          $('#dateFinMet1').html( $.cookie('datefinMP') );
	          $('#montoMet1').html( $.cookie('montoMP') );
	          $('#estadoMet1').html( $.cookie('estadoMP') );
	          $('#descripcionMet1').html( $.cookie('descripcionMP') );
	      	//SE CIERRA EL BLOQUE DE COOKIES ENVIADAS AL ACORDEON DEL HOME
      }
	}

	function primerActi(){
		//PERIMERO SE DEBEN VERIFICAR LOS CAMPOS
		$.cookie('nameAP', $('[name=nombreActi]').val());
		$.cookie('dateIniAP', $('[name=fechaIniActi]').val());
		$.cookie('datefinAP', $('[name=fechafinActi]').val());
		$.cookie('montoAP', $('[name=montoActi]').val());
		$.cookie('estadoAP', $('[name=estadoActi]').val());
		$.cookie('descriAP', $('[name=descripcionActi]').val());

		//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVA ACTIVIDAD

		if($primerActividad == false){
			$.cookie('codAP', $.cookie('codMP') +".1" );
			
		}
		else if($modificarActividad == true){
			$modificarActividad = false;
			$primerActividad = false;

			guardarActividadModify();
		}
		else{

		
		

		/*datosRegistroProy1[21] = datosRegistroProy1[14]+".1";
		datosRegistroProy1[22] = $('[name=nombreMeta]').val();
		datosRegistroProy1[23] = $('[name=fechaIniMeta]').val();
		datosRegistroProy1[24] = $('[name=fechafinMeta]').val();
		datosRegistroProy1[25] = $('[name=montoActi]').val();
		datosRegistroProy1[26] = $('[name=estadoActi]').val();
		datosRegistroProy1[27] = $('[name=descripcionActi]').val();*/

		//EL SIGUENTE BLOQUE ES PARA ENVIAR LAS COOKIES de ACTIVIDAD AL ACORDEON HOME
          $('#accordion4').show("fast");
          $('#codAct1').html( $.cookie('codAP') );
          $('#nameAct1').html( $.cookie('nameAP') );
          $('#nameAct2').html( $.cookie('nameAP') );
          $('#dateIniAct1').html( $.cookie('dateIniAP') );
          $('#dateFinAct1').html( $.cookie('datefinAP') );
          $('#montoAct1').html( $.cookie('montoAP') );
          $('#estadoAct1').html( $.cookie('estadoAP') );
          $('#descripcionAct1').html( $.cookie('descriAP') );
      	//SE CIERRA EL BLOQUE DE COOKIES ENVIADAS AL ACORDEON DEL HOME

		if($primerObjetivo == false && $primerMeta == false && $primerActividad == false){ // Este es el caso para cuando se registra el proyecto por primera vez
			$.ajax({
	            type: "POST",
	            url: 'php/registrarProyecto.php',
	            data: {
	                datosFormulario: $.cookie('codAP'),
	                //"datosFormulario": JSON.stringify(datosRegistroProy1)
	            },
	            dataType: "html",
	            //timeout: 1000,
	            //beforeSend: function() {
	              //  alert('En breve se enviará la solicitud.');
	            //},
	            success: function(RespHTML) {
	                //$('#Mensaje').html(RespHTML);
	                alert(RespHTML);
	                $('#codActP').html( $.cookie('codAP') );
					$('#nameActP').html( $.cookie('nameAP'));

					$('#formNewActi').hide("fast");//esconde el formulario de objetivo
					$('#btnAddObj').show("fast");
					$('#btnAddMeta').show("fast");
					$('#btnAddActi').show("fast");
	            },
	            error: function() {
	                alert('Lo sentimos, se ha producido un error.');
	            }
	        });
		}
		else if($primerObjetivo == true && $primerMeta == false && $primerActividad == false){//Para registrar un nuevo objetivo
			$primerObjetivo == false;
			$.ajax({
	            type: "POST",
	            url: 'php/registrarObjetivo.php',
	            data: {
	                datosFormulario: $.cookie('codAP'),
	                //"datosFormulario": JSON.stringify(datosRegistroProy1)
	            },
	            dataType: "html",
	            //timeout: 1000,
	            //beforeSend: function() {
	              //  alert('En breve se enviará la solicitud.');
	            //},
	            success: function(RespHTML) {
	                //$('#Mensaje').html(RespHTML);
	                alert(RespHTML);
	                $('#codActP').html( $.cookie('codAP') );
					$('#nameActP').html( $.cookie('nameAP'));

					$('#formNewActi').hide("fast");//esconde el formulario de objetivo
					$('#btnAddObj').show("fast");

					//$('#filaMeta').show("fast");
					$('#filaActi').show("fast");
					$('#btnAddMeta').show("fast");
					$('#btnAddActi').show("fast");

					$('#menuModificarProy').click( );
	            },
	            error: function() {
	                alert('Lo sentimos, se ha producido un error.');
	            }
	        });
		}
		else if($primerMeta == true && $primerActividad == false){ //Para registrar una nueva meta
			$primerMeta = false;
			$.ajax({
	            type: "POST",
	            url: 'php/registrarMeta.php',
	            data: {
	                datosFormulario: $.cookie('codAP'),
	                //"datosFormulario": JSON.stringify(datosRegistroProy1)
	            },
	            dataType: "html",
	            //timeout: 1000,
	            //beforeSend: function() {
	              //  alert('En breve se enviará la solicitud.');
	            //},
	            success: function(RespHTML) {
	                //$('#Mensaje').html(RespHTML);
	                alert(RespHTML);
	                $('#codActP').html( $.cookie('codAP') );
					$('#nameActP').html( $.cookie('nameAP'));

					$('#formNewActi').hide("fast");//esconde el formulario de objetivo
					$('#btnAddObj').show("fast");

					//$('#filaMeta').show("fast");
					//$('#filaActi').show("fast");
					$('#btnAddMeta').show("fast");
					$('#btnAddActi').show("fast");
	            },
	            error: function() {
	                alert('Lo sentimos, se ha producido un error.');
	            }
	        });
		}
		else if($primerActividad == true){
			$primerActividad = false;
			$.ajax({
	            type: "POST",
	            url: 'php/registrarActividad.php',
	            data: {
	                datosFormulario: $.cookie('codP'),
	                //"datosFormulario": JSON.stringify(datosRegistroProy1)
	            },
	            dataType: "html",
	            //timeout: 1000,
	            //beforeSend: function() {
	              //  alert('En breve se enviará la solicitud.');
	            //},
	            success: function(RespHTML) {
	                //$('#Mensaje').html(RespHTML);
	                alert(RespHTML);
	                $('#codActP').html( $.cookie('codAP') );
					$('#nameActP').html( $.cookie('nameAP'));


					$('#formNewActi').hide("fast");//esconde el formulario de objetivo
					$('#btnAddObj').show("fast");

					//$('#filaMeta').show("fast");
					//$('#filaActi').show("fast");
					$('#btnAddMeta').show("fast");
					$('#btnAddActi').show("fast");
	            },
	            error: function() {
	                alert('Lo sentimos, se ha producido un error.');
	            }
	        });


		}
	  }

	}
});