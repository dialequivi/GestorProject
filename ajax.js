$(document).ready(function() {//Se ejecuta unicamente cuando la pagina se haya cargado completamente

	/**Declaraciones para las manipulaciones de eventos
	==============================*/

	//$("#crearProy").click(ocultarMostrar);
	//$('[name=registroNuevoProy]').click(Registrarme);
	$('#registrarProy').submit(verificarCodProy);
	///$('#registrarObj').click(primerObjetivo);
	$('#registrarObj').submit(primerObjetivo);
	//$('#crearProy').click(ocultarMostrar);
	$('#registrarMeta').submit(primerMeta);
	//$('[name=btnRegistroNuevoMeta]').click(primerMeta);
	$('#registrarActividad').submit(primerActi);
	//$('[name=btnRegistroNuevoActi]').click(primerActi);
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
		$('[name=btnRegistroNuevoObj]').attr('value', 'Continuar');//Cambiar el nombre del boton
		$("#tituloObjetivo").text('Agregar Objetivo');//Se actualiza por si se ha cambiado  por Modificar Proyecto

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
	var modPro = 0;
	var thisProyect;
	function modifyProyecto(){
		$('[name=btnRegistroNuevoProy]').attr('value', 'Finalizar');//Cambiar el nombre del botón
		if(modPro == 0){ //Salvar el objeto y poder más adelante mostrar los campos modificados del formulario en la tabla de informacion del proyecto
			thisProyect = this;
			modPro++;
		}
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
		else{//REFRESCAR LOS VALORES EN LA TABLA, UNA VEZ SE HA HECHO LA MOFICICACIÓN
			$modifcarProyecto = false;
			modPro = 0;

			
			var $fila = $(thisProyect).closest("tr"); //Busca la fila más cercana
			var $celda = $fila.find(".default"); // Busca todas las celdas
			$campo=0;
			$.each($celda, function(){// Visits every single <td> element
				//console.log($(this).text());// Prints out the text within the <td>
				switch ($campo){
					case 0:
						break;
					case 1:
						 //$(this).text('CHARLY');
						 $(this).text($.cookie('nameP') );
						break;
					case 2:
						$(this).text($.cookie('dateIniP') );
						break;
					case 3:
						$(this).text($.cookie('datefinP') );
						break;
					case 4:
						$(this).text($.cookie('montoP') );
						break;
					case 5:
						$(this).text($.cookie('descripcionP') );
						break;
					case 6:
						break;
					case 7:

						if( $.cookie('estadoP') == 1 ){ 
							$(this).text('Activo');
						}
						else if( $.cookie('estadoP') == 2 ){ 
							$(this).text('Finalizado');
						}
						else if( $.cookie('estadoP') == 3 ){ 
							$(this).text('Cancelado');
						}
						else if( $.cookie('estadoP') == 4 ){ 
							$(this).text('Inactivo');
						}
						
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
						modifyProyecto(); //SE LLAMA PERO PARA REFRESCAR LOS DATOS EN LA TABLA (CONDCIONAL ELSE)
		            },
		            error: function() {
		                alert('Lo sentimos, se ha producido un error.');
		            }
		        });

	}

	/*Permite la modificación de un objetivo*/
	var modObjP = 0;
	var thisObject;
	function modifyObject(){
		$('[name=btnRegistroNuevoObj]').attr('value', 'Finalizar');
		if(modObjP == 0){
			thisObject = this;
			modObjP++;
		}
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
		if($modificarObjetivo == false){		//OBTENER LOS VALORES
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
		else{
			$modificarObjetivo = false;
			modObjP = 0;
			var $fila = $(thisObject).closest("tr"); //Busca la fila más cercana
			var $celda = $fila.find(".default"); // Busca todas las celdas
			$campo=0;
			$.each($celda, function(){// Visits every single <td> element
				//console.log($(this).text());// Prints out the text within the <td>
				switch ($campo){
					case 0:
						break;
					case 1:
						 //$(this).text('CHARLY');
						 $(this).text($.cookie('nameOP') );
						break;
					case 2:
						$(this).text($.cookie('dateIniOP') );
						break;
					case 3:
						$(this).text($.cookie('datefinOP') );
						break;
					case 4:
						$(this).text($.cookie('montoOP') );
						break;
					case 5:
						$(this).text($.cookie('descripOP') );
						break;
					case 6:
						break;
					case 7:

						if( $.cookie('estadoOP') == 1 ){ 
							$(this).text('Activo');
						}
						else if( $.cookie('estadoOP') == 2 ){ 
							$(this).text('Finalizado');
						}
						else if( $.cookie('estadoOP') == 3 ){ 
							$(this).text('Cancelado');
						}
						else if( $.cookie('estadoOP') == 4 ){ 
							$(this).text('Inactivo');
						}
						
						break;

				}
				
				$campo++;
			})
		}
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
						modifyObject();//se llama para refrescar los valores en la tabla una vez se ha hecho la modificación guardado en la BD 
		            },
		            error: function() {
		                alert('Lo sentimos, se ha producido un error.');
		            }
		        });
		}

	/*Permite la modoficación de una meta*/
	var modMeta = 0;
	var thisMeta;
	function modifyMeta(){
		$('[name=btnRegistroNuevoMeta]').text("Finalizar");
		if(modMeta == 0){
			thisMeta = this;
			modMeta++;
		}
		if($modificarMeta==false){				//OBTENER LOS VALORES DE LA FILA
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
		else{
			$modificarMeta = false;
			modMeta = 0;
			var $fila = $(thisMeta).closest("tr"); //Busca la fila más cercana
			var $celda = $fila.find(".default"); // Busca todas las celdas
			$campo=0;
			$.each($celda, function(){// Visits every single <td> element
				//console.log($(this).text());// Prints out the text within the <td>
				switch ($campo){
					case 0:
						break;
					case 1:
						 //$(this).text('CHARLY');
						 $(this).text($.cookie('nameMP') );
						break;
					case 2:
						$(this).text($.cookie('dateIniMP') );
						break;
					case 3:
						$(this).text($.cookie('datefinMP') );
						break;
					case 4:
						$(this).text($.cookie('montoMP') );
						break;
					case 5:
						$(this).text($.cookie('descripMP') );
						break;
					case 6:
						break;
					case 7:

						if( $.cookie('estadoMP') == 1 ){ 
							$(this).text('Activo');
						}
						else if( $.cookie('estadoMP') == 2 ){ 
							$(this).text('Finalizado');
						}
						else if( $.cookie('estadoMP') == 3 ){ 
							$(this).text('Cancelado');
						}
						else if( $.cookie('estadoMP') == 4 ){ 
							$(this).text('Inactivo');
						}
						
						break;

				}
				
				$campo++;
			})
		}
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
						modifyMeta(); //se llama para refrescar los valores en la tabla una vez se ha hecho la modificación guardado en la BD 
		            },
		            error: function() {
		                alert('Lo sentimos, se ha producido un error.');
		            }
		        });
	}

	var modActi = 0;
	var thisActi;

	function modifyActividad(){
		$('[name=btnRegistroNuevoActi]').text("Finalizar");
		if(modActi == 0){
			thisActi = this;
			modActi++;
		}
		if($modificarActividad==false){
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
		else{
			$modificarActividad = false;
			modActi = 0;
			var $fila = $(thisActi).closest("tr"); //Busca la fila más cercana
			var $celda = $fila.find(".default"); // Busca todas las celdas
			$campo=0;
			$.each($celda, function(){// Visits every single <td> element
				//console.log($(this).text());// Prints out the text within the <td>
				switch ($campo){
					case 0:
						break;
					case 1:
						 //$(this).text('CHARLY');
						 $(this).text($.cookie('nameAP') );
						break;
					case 2:
						$(this).text($.cookie('dateIniAP') );
						break;
					case 3:
						$(this).text($.cookie('datefinAP') );
						break;
					case 4:
						$(this).text($.cookie('montoAP') );
						break;
					case 5:
						$(this).text($.cookie('descriAP') );
						break;
					case 6:
						break;
					case 7:

						if( $.cookie('estadoAP') == 1 ){ 
							$(this).text('Activo');
						}
						else if( $.cookie('estadoAP') == 2 ){ 
							$(this).text('Finalizado');
						}
						else if( $.cookie('estadoAP') == 3 ){ 
							$(this).text('Cancelado');
						}
						else if( $.cookie('estadoAP') == 4 ){ 
							$(this).text('Inactivo');
						}
						
						break;

				}
				
				$campo++;
			})
		}
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
						modifyActividad();//Refrescar los valores de la tabla
					},
					error: function() {
						alert('Lo sentimos, se ha producido un error.');
					}
				});
	}

/*Agrega un nuevo objetivo a un proyecto ya creado
/Si se va agregar un objetivo, con el id del proyecto (previamente obtenido) se consulta el monto disponible y las fechas del proyecto
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
                //console.log(RespHTML);
                var dataProy =  RespHTML.split("_");
                $.cookie('codOP', dataProy[0]); //el codigo se agrega incrementado en uno. Consultado de la BD
                $.cookie('dateIniP', dataProy[1]); //para condicionar la fecha de inicio del objetivo acorde a la fecha de inicio del proyecto
                $.cookie('datefinP', dataProy[2]);//lo mismo
                $.cookie('montoP', dataProy[3]);//lo mismo

                $('[name=fechaIniObj]').attr({
                	'min': $.cookie('dateIniP'),
                	'max': $.cookie('datefinP')
                });
                $('[name=fechafinObj]').attr({
                	'min': $.cookie('dateIniP'),
                	'max': $.cookie('datefinP')
                });

		        

                $('#codigoObj').attr('value', dataProy[0] );      

                //$('#formNewProy').hide("fast");

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

                var dataObj = RespHTML.split("_");
                $.cookie('codMP', dataObj[0]); //el codigo se agrega incrementado en uno. Consultado de la BD
                $.cookie('dateIniOP', dataObj[1]);
                $.cookie('datefinOP', dataObj[2]);
                $.cookie('montoOP', dataObj[3]);

                $('[name=fechaIniMeta]').attr({
                	'min': $.cookie('dateIniOP'),
                	'max': $.cookie('datefinOP')
                });
                $('[name=fechafinMeta]').attr({
                	'min': $.cookie('dateIniOP'),
                	'max': $.cookie('datefinOP')
                });

                $('#codigoMeta').attr('value', dataObj[0]); 
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
            	console.log(RespHTML);
            	var dataMeta = RespHTML.split("_");
            	$.cookie('codAP', dataMeta[0]); //el codigo se agrega incrementado en uno. Consultado de la BD
				$.cookie('dateIniMP', dataMeta[1]);
				$.cookie('datefinMP', dataMeta[2]);
				$.cookie('montoMP', dataMeta[3]);               

				$('[name=fechaIniActi]').attr({
                	'min': $.cookie('dateIniMP'),
                	'max': $.cookie('datefinMP')
                });
                $('[name=fechafinActi]').attr({
                	'min': $.cookie('dateIniMP'),
                	'max': $.cookie('datefinMP')
                });

                $('#codigoActi').attr('value', dataMeta[0]); 
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
        var fechaIpro = Date.parse($.cookie('dateIniP'));
	    var fechaFpro = Date.parse($.cookie('datefinP'));
	    var estProy= $.cookie('estadoP');

        if($modifcarProyecto == true){
			//$modifcarProyecto = false;//SE HACE FALSE CUANDO SE REFRESCAN  LOS VALORES EN LA TABLA
			guardarProyectoModify();
		}
		else if (fechaIpro>fechaFpro){
        	alert("Fecha de Finalización Incorrecta");
        	$("#formNewProy").show("fast");
			$('#formNewObj').fast("fast");
        }
		else{
			/*if(estProy="Activo"){

			}*/
	        //Cookies enviadas para validar fechas del formulario de objetivos
	        $('[name=fechaIniObj]').attr('min', $.cookie('dateIniP'));
	        $('[name=fechaIniObj]').attr('max', $.cookie('datefinP'));
	        $('[name=fechafinObj]').attr('min', $.cookie('dateIniP'));
	        $('[name=fechafinObj]').attr('max', $.cookie('datefinP'));
	        //$('[name=opFinObj]').prop("disabled", false); // Element(s) are now enabled.
	        //Se cierra el bloque de cookies enviadas al formulario de objetivos
	        		        
	        $('#infoCrearProy').show("fast");
	        $('#codProy').html( $.cookie('codP') );//SE AGREGA AL div #infoCrearProy el codigo del proyecto
	        $('#nameProy').html( $.cookie('nameP') );

	        $("#formNewProy").hide("fast");
	        $("#tituloObjetivo").text('Agregar Objetivo');//Se actualiza por si se ha cambiado  por Modificar Proyecto

			$('#formNewObj').show("fast");
			$('[name=codigoObj]').attr('placeholder', $.cookie('codP')+".1");
			$('#codigoObj').attr('value', $.cookie('codP') +".1"  ); //codigo proyecto + .1  de primer objetivo
			$('[name=btnRegistroNuevoObj]').attr('value', 'Continuar');//Cambiar el nombre del boton.

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

    function primerObjetivo(event){
   		event.preventDefault();
		$.ajax({
			type: "POST",
			url: 'php/evitarActualizacion.php',
			dataType: "html",
            data: {
            	codigoProyMontoDisp: "consultaSaldo" 
            },
            success: function(RespHTML) {
            	
				console.log(RespHTML);

				
				//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVO OBJETIVO
		   			$.cookie('dateIniOP', $('[name=fechaIniObj]').val());
			    	$.cookie('datefinOP', $('[name=fechafinObj]').val());
				    $.cookie('montoOP', $('[name=montoObj]').val());
			    	$.cookie('nameOP', $('[name=nombreObj]').val());
			    	$.cookie('estadoOP', $('[name=estadoObj]').val());
			    	$.cookie('descripOP', $('[name=descripcionObj]').val());
			    //Cerrando bloque de capura de datos
			    if($primerObjetivo == false){
					//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVO OBJETIVO
					$.cookie('codOP', $.cookie('codP')+".1"  );
					console.log("primer ojetivo false");
				}
				else if($modificarObjetivo == true){
					//$modificarObjetivo = false; //SE HACE FALSE CUANDO SE REFRESCAN LOS VALORES EN LA TABLA
					$primerObjetivo = false;
					guardarObjetivoModify();
					console.log("modificar objetivo");
				}

				if($modificarObjetivo == false){

				    var	montoProyecto=parseInt($.cookie('montoP'));
					var	fechaIObj = Date.parse($.cookie('dateIniOP'));
				    var	fechaFobj = Date.parse($.cookie('datefinOP'));
				    var montoObjetivo=parseInt($.cookie('montoOP'));
				    
				    //Bloque de validaciones para formulario de Objetivos
			  		if (fechaIObj>fechaFobj){
						alert("Fecha de Finalización Incorrecta");
						$('#formNewObj').show("fast");//esconde el formulario de objetivo
			        	$('#formNewMeta').hide("fast");//muestra el formulario de meta
					}//Si la fecha inicial es mayor a la fecha final arroja la notificación e impide el cambio de formulario
					else if(montoObjetivo>montoProyecto || montoObjetivo<0){
						alert("Monto de Objetivo debe ser menor o igual al monto del Proyecto y mayor que cero."+
							" El monto disponible es $"+montoProyecto);
						$('#formNewObj').show("fast");//esconde el formulario de objetivo
			        	$('#formNewMeta').hide("fast");//muestra el formulario de meta
					}//Si el monto del objetivo supera el monto del proyecto arroja la notificación, tambien valida que no sea negativo
					
					else{
				    	 //Cookies enviadas para validar fechas del formulario de metas
				        $('[name=fechaIniMeta]').attr('min', $.cookie('dateIniOP'));
				        $('[name=fechaIniMeta]').attr('max', $.cookie('datefinOP'));
				        $('[name=fechafinMeta]').attr('min', $.cookie('dateIniOP'));
				        $('[name=fechafinMeta]').attr('max', $.cookie('datefinOP'));
				        //Se cierra el bloque de cookies enviadas al formulario de metas

						$('#codObjP').html( $.cookie('codOP') );//SE AGREGA AL div el codigo del objetivo
						
						$('#nameObjP').html( $.cookie('nameOP') );
						
						//alert( $("#codigoObj").text() );
						console.log( $("#codigoObj").text() );
						$('#formNewObj').hide("fast");//esconde el formulario de objetivo
				        $('#formNewMeta').show("fast");//muestra el formulario de meta
				        $('[name=codigoMeta]').attr('placeholder', $.cookie('codOP')+".1");
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
				          $('#descripcionObj1').html( $.cookie('descripOP') );
				      	//SE CIERRA EL BLOQUE DE COOKIES ENVIADAS AL ACORDEON DEL HOME
					}  
				}        	
            },
            error: function() {
                alert('Lo sentimos, se ha producido un error.');
            }
		});
	}

	function primerMeta(event){
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: 'php/evitarActualizacion.php',
			dataType: "html",
            data: $('#registrarMeta').serialize(),
			success: function(RespHTML) {
				console.log(RespHTML);             
				//PERIMERO SE DEBEN VERIFICAR LOS CAMPOS
				//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVA META
				$.cookie('nameMP', $('[name=nombreMeta]').val() );
				$.cookie('dateIniMP', $('[name=fechaIniMeta]').val());
				$.cookie('datefinMP', $('[name=fechafinMeta]').val());
				$.cookie('montoMP', $('[name=montoMeta]').val() );
				$.cookie('estadoMP', $('[name=estadoMeta]').val());
				$.cookie('descripMP', $('[name=descripcionMeta]').val());
				$.cookie('dIniMP', $('[name=fechaIniMeta]').val());
				$.cookie('dfinMP', $('[name=fechafinMeta]').val());

				if($primerMeta == false){
					//CAPTURANDO LOS DATOS DEL FORMULARIO DE NUEVO OBJETIVO
					$.cookie('codMP', $.cookie('codOP') +".1" );
					console.log("primer meta");
				}
				else if($modificarMeta == true){
					//$modificarMeta = false;//sE HACE FALSE CUANDO SE REFRESCAN LOS VALORES EN LA TABLA
					$primerMeta = false;
					guardarMetaModify();
				}
				if($modificarMeta == false){
					var montoObjetivo=parseInt($.cookie('montoOP'));
				    var montoMeta=parseInt($.cookie('montoMP'));
				    var fechaIMet = Date.parse($.cookie('dateIniMP'));
				    var fechaFMet = Date.parse($.cookie('datefinMP'));
					if (fechaIMet>fechaFMet){
						alert("Fecha de Finalización Incorrecta");
						$('#formNewMeta').show("fast");//esconde el formulario de meta
			        	$('#formNewActi').hide("fast");//muestra el formulario de actividad
					}
					else if(montoMeta>montoObjetivo || montoMeta<0){
						alert("Monto de Meta no puede ser mayor al monto del Objetivo. Monto disponible $"+montoObjetivo);
						$('#formNewMeta').show("fast");//esconde el formulario de meta
			        	$('#formNewActi').hide("fast");//muestra el formulario de actividad
					}
					else{
						//Cookies enviadas para validar fechas del formulario de actividades
				        $('[name=fechaIniActi]').attr('min', $.cookie('dateIniMP'));
				        $('[name=fechaIniActi]').attr('max', $.cookie('datefinMP'));
				        $('[name=fechafinActi]').attr('min', $.cookie('dateIniMP'));
				        $('[name=fechafinActi]').attr('max', $.cookie('datefinMP'));
				        //Se cierra el bloque de cookies enviadas al formulario de actividades
						
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
				        $('[name=codigoActi]').attr('placeholder', $.cookie('codMP')+".1");
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
				          $('#descripcionMet1').html( $.cookie('descripMP') );
				      	//SE CIERRA EL BLOQUE DE COOKIES ENVIADAS AL ACORDEON DEL HOME

				      	$("#tituloActividad").text("Agregar Actividad");
						$('[name=btnRegistroNuevoActi]').text("Continuar");
			    	}
			    }
			},
			error: function() {
                alert('Lo sentimos, se ha producido un error.');
            }
        });
	}

	function primerActi(event){
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: 'php/evitarActualizacion.php',
			dataType: "html",
            data: $('#registrarActividad').serialize(),
			success: function(RespHTML) {
				console.log(RespHTML); 
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
					//$modificarActividad = false;
					$primerActividad = false;

					guardarActividadModify();
				}
				if($modificarActividad == false){
					var montoMet=parseInt($.cookie('montoMP'));
				    var montoAct=parseInt($.cookie('montoAP'));
				    var fechaIAct = Date.parse($.cookie('dateIniAP'));
				    var fechaFAct = Date.parse($.cookie('datefinAP'));
					if(fechaIAct>fechaFAct){
						alert("Fecha de Finalización Incorrecta");
					}
					else if(montoAct>montoMet || montoAct<0){
						alert("Monto de Actividad no puede ser mayor al monto de la Meta. Monto disponible $"+montoMet);
					}
					else{	
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
							$primerObjetivo = false;
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
			}
		});
	}
});