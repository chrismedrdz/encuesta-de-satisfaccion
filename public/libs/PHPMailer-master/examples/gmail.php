<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Enviar Resultados</title>
</head>
<body>
<?php

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.office365.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "sistemas@cecac.edu.mx";
//Password to use for SMTP authentication
$mail->Password = "Cecac138";
//Set who the message is to be sent from
$mail->setFrom('sistemas@cecac.edu.mx', 'Sistemas CECAC');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('sistemas@cecac.edu.mx', 'Chris Medina');
//Set the subject line
$mail->Subject = 'Resultados SES';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body



$contenedor_mensaje = '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Resultados SES</title>
<style>
	
	body { font: 12px "Lucida Grande", Helvetica, Sans-Serif; }
	table { border-collapse: collapse; }

	.td1 {
		color: black;
		font-family: Helvetica;
		text-align: justify;
		font-weight: 500;
	}

	th { padding: 5px; background: black; color: white; text-align: center; }
	tr.even td { background: #eee; }
	td .total-box, .total-box { border: 3px solid green; width: 70px; padding: 3px; margin: 5px 0 5px 0; text-align: center; font-size: 18px; color: black; font-weight: bold; }

</style>
</head>
<body>
	<table style="width: 700px; border-collapse: collapse; ">

		<thead>
			<tr>
				<td style="width:100%;" align="center" ><img align="center" width="100%" src="images/header-ses.jpg"></td>
			</tr>
		</thead>	
		<tbody>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td class="td1">Te damos a conocer los resultados obtenidos por el Sistema de Evaluaci&oacute;n de Servicios del Centro Escolar Cuauht&eacute;moc A.C. los cuales arrojaste como <i>evaluado</i> en el &aacute;rea Staff evaluada.</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td class="td1">Recuerda que &eacute;sto es una retroalimentaci&oacute;n que te ayudar&aacute; en la mejora continua de los servicios que presta el departamento donde te desenvuelves.</td>
			</tr>
			<tr><td>&nbsp;</td></tr>

			<tr>
				<td style="width:100%;" align="center">

					<table align="center" style="width: 600px; ">
						<thead>
							<tr>
								<td>&nbsp;</td>
								<td align="center"><b>'.$nombre_evaluado.'</b></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<th style="width:5%;" align="center" >Reactivo</th>
								<th  style="width:85%;" align="center" >Descripci&oacute;n</th>
								<th style="width:10%;" align="center" >Resultado</th>
							</tr>
						</thead>
						<tbody>
							<tr class="odd"> 
								<td style="width:5%;" align="center">1.</td>
								<td style="width:85%;" align="left">Conocer la situaci&oacute;n del cliente y asesorarlo</td>
								<td style="width:10%; color:#a81800;" align="center">'.$prom_reactivo[1].'</td>
							</tr>
							<tr class="even">
								<td style="width:5%;" align="center">2.</td>
								<td style="width:85%;" align="left">Interesarse en resolver problemas y dudas</td>
								<td style="width:10%; color:#a81800;" align="center">'.$prom_reactivo[2].'</td>
							</tr>
							<tr class="odd">
								<td style="width:5%;" align="center">3.</td>
								<td style="width:85%;" align="left">Proporcionar retroalimentaci&oacute;n y confirmar satisfacci&oacute;n</td>
								<td style="width:10%; color:#a81800;" align="center">'.$prom_reactivo[3].'</td>
							</tr>
							<tr class="even">
								<td style="width:5%;" align="center">4.</td>
								<td style="width:85%;" align="left">Establecer planes de acci&oacute;n concretos</td>
								<td style="width:10%; color:#a81800;" align="center">'.$prom_reactivo[4].'</td>
							</tr>
							<tr class="odd">
								<td style="width:5%;" align="center">5.</td>
								<td style="width:85%;" align="left">Oportunidad de respuesta ante solicitudes</td>
								<td style="width:10%; color:#a81800;" align="center">'.$prom_reactivo[5].'</td>
							</tr>
							<tr class="even">
								<td style="width:5%;" align="center">6.</td>
								<td style="width:85%;" align="left">Cumplir con los compromisos acordados</td>
								<td style="width:10%; color:#a81800;" align="center">'.$prom_reactivo[6].'</td>
							</tr>
							<tr class="odd">
								<td style="width:5%;" align="center">7.</td>
								<td style="width:85%;" align="left">Facilitar el cumplimiento de metas</td>
								<td style="width:10%; color:#a81800;" align="center">'.$prom_reactivo[7].'</td>
							</tr>
							<tr class="even">
								<td style="width:5%;" align="center">8.</td>
								<td style="width:85%;" align="left">Generar empat&iacute;a</td>
								<td style="width:10%; color:#a81800;" align="center">'.$prom_reactivo[8].'</td>
							</tr>
							<tr class="odd">
								<td style="width:5%;" align="center">9.</td>
								<td style="width:85%;" align="left">Disponibilidad</td>
								<td style="width:10%; color:#a81800;" align="center">'.$prom_reactivo[9].'</td>
							</tr>
							<tr class="even">
								<td style="width:5%;" align="center">10.</td>
								<td style="width:85%;" align="left">Comunicar en forma clara y oportuna</td>
								<td style="width:10%; color:#a81800;" align="center">'.$prom_reactivo[10].'</td>
							</tr>

							<tr>
				                <td colspan="6" style="text-align: right;">															
				                    Promedio: <input type="text" class="total-box" id="product-subtotal" disabled="disabled" value=" '.$prom_gral.' "> 
				                </td>
				            </tr>
							
						</tbody>	
					</table>

				</td>	
			</tr>
		
		</tbody>
	</table>
</body>
</html>';


//$mail->msgHTML(file_get_contents('contents.php'), dirname(__FILE__));

$mail->msgHTML($contenedor_mensaje , dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->AltBody = 'Resultados obtenidos por el SES';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.gif');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
</body>
</html>
