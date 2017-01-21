$(document).ready(function(){
	
	// click en cualquier link </a> del contenedor #estilos
	//$("#boton-login").click(function(){
		CargarCSS(this);
		//return false;
	//});
	
	function CargarCSS( CSSelegido ) {
		// obtener contenido del link </a> 
		// la variable async servira para identificar contenido asyncrono
		$.get( CSSelegido.href+'&async',function(data){
			// cambiarmos atributo href del elemento hoja_estilo, obtenido de theme.php
			$('#hoja_estilo').attr('href', data + '.css');
		});
	}
});