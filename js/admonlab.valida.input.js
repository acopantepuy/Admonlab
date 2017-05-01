(function($){
	$.fn.soloNumeros = function(){		

		this.keypress(function(event){

			/*Definimos las variables*/
			var expRegular = ""; // Patrón de la Expresión Regular 
			var caracterTecla = "" // Caracter correspondiente al Código Unicode
			var codeTecla = null; // Código Unicode

			//expRegular = /\d/; // Solo acepta números
			//expRegular = /\w/; // Acepta números y letras
			//expRegular = /\D/; // No acepta números
			//expRegular =/[A-Za-zñÑ\s]/; // igual que el ejemplo, pero acepta también las letras ñ y Ñ	
			//expRegular = /^[0-9]*\.?[0-9]*$/; //Decimales	
			
			codeTecla = (document.all) ? event.keyCode : event.which; /* Cactura la tecla para la mayoria de los Navegadores */
    		
    		if (codeTecla == 8 ) return true;    		
    		
    		expRegular = /\d/; // Solo acepta números    		
			
			caracterTecla = String.fromCharCode(codeTecla); /* Devuelve el numero Unicode a caracter */ 
    		return expRegular.test(caracterTecla);    		

		});

	};
}(jQuery));