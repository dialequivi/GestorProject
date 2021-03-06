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

	

	$primerObjetivo = false;

	$primerMeta = false;

	$primerActividad = false;



	//datosRegistroProy1 = [];


	/**Métodos
	==============================*/
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

        //alert("nombre: "+datosRegistroProy1[1]+" y FECHA-FIN: "+datosRegistroProy1[3]+" ESTADO: "+datosRegistroProy1[5]);
        $('#infoCrearProy').show("fast");
		$('#codProy').html( $.cookie('codP') );//SE AGREGA AL div #infoCrearProy el codigo del proyecto
		$('#nameProy').html( $.cookie('nameP') );

		$("#formNewProy").hide("fast");
		$('#formNewObj').show("fast");
		$('#codigoObj').html( $.cookie('codP') +".1"  ); //codigo proyecto + .1  de primer objetivo

   }


   function primerObjetivo(){
		//PERIMERO SE DEBEN VERIFICAR LOS CAMPOS
		if($primerObjetivo == false){
			//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVO OBJETIVO
			$.cookie('codOP', $.cookie('codP')+".1"  );
		}
    	
    	//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVO OBJETIVO
    	$.cookie('nameOP', $('[name=nombreObj]').val());
    	$.cookie('dateIniOP', $('[name=fechaIniObj]').val());
    	$.cookie('datefinOP', $('[name=fechafinObj]').val());
    	$.cookie('montoOP', $('[name=montoObj]').val());
    	$.cookie('estadoOP', $('[name=estadoObj]').val());
    	$.cookie('descripOP', $('[name=descripcionObj]').val());
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

	    }

	function primerMeta(){
		//PERIMERO SE DEBEN VERIFICAR LOS CAMPOS

		if($primerMeta == false){
			//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVO OBJETIVO
			$.cookie('codMP', $.cookie('codOP') +".1" );
			console.log("primer meta");
		}

		//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVA META
		
		$.cookie('nameMP', $('[name=nombreMeta]').val() );
		$.cookie('dateIniMP', $('[name=fechaIniMeta]').val());
		$.cookie('datefinMP', $('[name=fechafinMeta]').val());
		$.cookie('montoMP', $('[name=montoMeta]').val() );
		$.cookie('estadoMP', $('[name=estadoMeta]').val());
		$.cookie('descripMP', $('[name=descripcionMeta]').val());
		
		
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
	}

	function primerActi(){
		//PERIMERO SE DEBEN VERIFICAR LOS CAMPOS

		//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVA ACTIVIDAD

		if($primerActividad == false){
			$.cookie('codAP', $.cookie('codMP') +".1" );
			
		}

		
		$.cookie('nameAP', $('[name=nombreActi]').val());
		$.cookie('dateIniAP', $('[name=fechaIniActi]').val());
		$.cookie('datefinAP', $('[name=fechafinActi]').val());
		$.cookie('montoAP', $('[name=montoActi]').val());
		$.cookie('estadoAP', $('[name=estadoActi]').val());
		$.cookie('descriAP', $('[name=descripcionActi]').val());

		/*datosRegistroProy1[21] = datosRegistroProy1[14]+".1";
		datosRegistroProy1[22] = $('[name=nombreMeta]').val();
		datosRegistroProy1[23] = $('[name=fechaIniMeta]').val();
		datosRegistroProy1[24] = $('[name=fechafinMeta]').val();
		datosRegistroProy1[25] = $('[name=montoActi]').val();
		datosRegistroProy1[26] = $('[name=estadoActi]').val();
		datosRegistroProy1[27] = $('[name=descripcionActi]').val();*/

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


});