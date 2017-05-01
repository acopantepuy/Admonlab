// JavaScript Document
$(document).ready(function(){	

	//**************** SEGURIDAD ************************************

	function DatosSesion(data){
		
		if (data ===""){
			location.reload();
		}else{
			alert(data);
		}

	}

	$('#SumitLogin').bind('click', function() { //Usuarios
				
		var Usuario = $('#txtUsuario').val();
		var Clave = $('#txtClave').val();		
		
		$.post( './init_sesion.php',{UserLogin:Usuario,pClave:Clave},DatosSesion);		
		
	});

});