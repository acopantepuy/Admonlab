// JavaScript Document

$(document).ready(function(){

	//Inicio
	$('#inicioli').bind('click', function() { //Próximo Registro		

		if ($('#inicioli').attr("class") == "previous active" ){
		
			$.post( "view_usuarios.php", function( data ) {
	  			$( "#DataContenedor" ).html( data );
			});

		}	
		
	});

	//Anterior
	$('#anterior').bind('click', function() { //Próximo Registro		

		if ($('#anterior').attr("class") == "previous active" ){
			
			var pag = $("#anterior").attr("proximapag");

			$.post( "view_usuarios.php",{InicioReg:pag}, function( data ) {
	  			$( "#DataContenedor" ).html( data );
			});

		}	
		
	});

	//Proximo
	$('a[id="proximo"]').bind('click', function() { //Próximo Registro
				
		if ($('#proximoli').attr("class") == "next active" ){
			var pag = $("#proximo").attr("proximapag");

			$.post( "view_usuarios.php", {InicioReg:pag}, function( data ) {
	  			$( "#DataContenedor" ).html( data );
			});		
		}
	});

	//Ultimo
	$('a[id="ultimo"]').bind('click', function() { //Próximo Registro
				
		if ($('#ultimoli').attr("class") == "next active" ){
			var pag = $("#ultimo").attr("proximapag");

			$.post( "view_usuarios.php", {InicioReg:pag}, function( data ) {
	  			$( "#DataContenedor" ).html( data );
			});		
		}
	});

});