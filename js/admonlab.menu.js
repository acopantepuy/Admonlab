// JavaScript Document
$(document).ready(function(){	

/********************* MENU PRINCIPAL ******************************/	

	//**************** PROCESOS	***************************************

	$('a[id="registro"]').bind('click', function() { //Registro
				
		alert("Registro");
		
	});

	
	$('a[id="resultados"]').bind('click', function() { //Resultados
				
		alert("Resultados");
		
	});

	
	$('a[id="reportes"]').bind('click', function() { //Reportes
				
		alert("Reportes");
		
	});

	$('a[id="exit"]').bind('click', function() { //Reportes
				
		$.post( "logout.php", function( data ) {
  			if (data === ""){
  				location.reload();
  			}
		});
		
	});

	//**************** TABLAS	***************************************

	$('a[id="tipoclientes"]').bind('click', function() { //Tipo de Clientes
				
		$.post( "view_tipo_clientes.php", function( data ) {
  			$( "#DataContenedor" ).html( data );
		});
		
	});

	
	$('a[id="clientes"]').bind('click', function() { //Clientes
				
		$.post( "view_clientes.php", function( data ) {
  			$( "#DataContenedor" ).html( data );
		});
		
	});

	
	$('a[id="tipoanalisis"]').bind('click', function() { //Tipo Análisis
				
		$.post( "view_tipo_analisis.php", function( data ) {
  			$( "#DataContenedor" ).html( data );
		});
		
	});


	$('a[id="analisis"]').bind('click', function() { //Análisis
				
		$.post( "view_analisis.php", function( data ) {
  			$( "#DataContenedor" ).html( data );
		});
		
	});

	
	$('a[id="plantillaproductos"]').bind('click', function() { //Plantilla Productos
				
		$.post( "view_plantilla_productos.php", function( data ) {
  			$( "#DataContenedor" ).html( data );
		});
		
	});


	//**************** SEGURIDAD ************************************

	$('a[id="usuarios"]').bind('click', function() { //Usuarios
				
		$.post( "view_usuarios.php", function( data ) {
  			$( "#DataContenedor" ).html( data );
		});
		
	});

	
	$('a[id="roles"]').bind('click', function() { //Roles
				
		alert("Roles");
		
	});

});