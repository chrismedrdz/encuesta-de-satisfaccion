<?php
function limpiarCadena($cadena)
{
	$cadena = str_ireplace("SELECT","",$cadena);
	$cadena = str_ireplace("COPY","",$cadena);
	$cadena = str_ireplace("DELETE","",$cadena);
	$cadena = str_ireplace("DROP","",$cadena);
	$cadena = str_ireplace("DUMP","",$cadena);
	$cadena = str_ireplace("INSERT","",$cadena);
	$cadena = str_ireplace(" OR ","",$cadena);
	$cadena = str_ireplace("%","",$cadena);
	$cadena = str_ireplace("LIKE","",$cadena);
	$cadena = str_ireplace("--","",$cadena);
	$cadena = str_ireplace("^","",$cadena);
	$cadena = str_ireplace("[","",$cadena);
	$cadena = str_ireplace("]","",$cadena);
	$cadena = str_ireplace("\\","",$cadena);
	$cadena = str_ireplace("!","",$cadena);
	$cadena = str_ireplace("¡","",$cadena);
	$cadena = str_ireplace("?","",$cadena);
	$cadena = str_ireplace("=","",$cadena);
	$cadena = str_ireplace("&","",$cadena);
	return $cadena;
}


function obtenerParam($name, $default = null) {
		$res = $default;

		if(isset($_COOKIE[$name]))
			$res = $_COOKIE[$name];
		else if(isset($_GET[$name]))
			$res = $_GET[$name];
		else if(isset($_POST[$name]))
			$res = $_POST[$name];
		else if(isset($_REQUEST[$name]))
			$res = $_REQUEST[$name];
		/*
		if($preg_match != null) {
			if(!preg_match($preg, $res))
				$res = $default;
		}
		*/
		$res = ( preg_match("/http/i", "$res")) ? "" : $res;
		$res = ( preg_match("/https/i", "$res")) ? "" : $res;
		$res = ( preg_match("/ftp/i", "$res")) ? "" : $res;
		
		return $res;
	}
	
	
	function elimina_acentos($cadena){
		$tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ ";
		$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn_";
		return(strtr($cadena,$tofind,$replac));
	}
	
	function formato_moneda($cantidad){

		return number_format ( $cantidad , 2 , "." , "," );

	}
	
	function fecha_dma($fecha){
		
		#El parametro es una fecha con el formato: aaaa mm dd
		#Manipulamos la fecha parapresentarla en el formato: dd mm aaaa
		
		$fecha = substr(strval($fecha), 0, 10);#convertir a cadena y tomar los valores que nos importan aaaa/mm/dd
		@$fecha = split("-", $fecha);#obtenemos subcadenas: [aaaa] [mm] [dd]
		
		$dia = $fecha[2];
		$mes = $fecha[1];
		$ann = $fecha[0];
		
		switch ($mes) {
			case 1:
				$mes = "Enero";
				break;
			
			case 2:
				$mes = "Febrero";
				break;
			
			case 3:
				$mes = "Marco";
				break;
			
			case 4:
				$mes = "Abril";
				break;
			
			case 5:
				$mes = "Mayo";
				break;
			
			
			case 6:
				$mes = "Junio";
				break;
			
			case 7:
				$mes = "Julio";
				break;
			
			case 8:
				$mes = "Agosto";
				break;
			
			case 9:
				$mes = "Septiembre";
				break;
			
			case 10:
				$mes = "Octubre";
				break;
			
			case 11:
				$mes = "Noviembre";
				break;
			
			case 12:
				$mes = "Diciembre";
				break;
			
			default:
				$mes = "N/A";
				break;
		}
		
		$fecha = "No Disponible";
		if ($mes!="N/A") {
			$fecha = "{$dia}-{$mes}-{$ann}";
		}
		return $fecha;
	}

	

	
?>
