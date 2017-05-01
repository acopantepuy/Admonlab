function showMsj(titulo,mensaje,ventanaModal){
	$('#ventanaTitulo').html(titulo);
	$('#msjBody').text(mensaje);
	ventanaModal.modal('show');	
}