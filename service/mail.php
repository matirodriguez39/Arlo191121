<?php
	/*header('Content-Type: application/json');

	function printOut($code=200,$str=''){
		global $json;
		$response = new stdClass();
		$response->code = $code;
		$response->message = $str;
		$json['response'] = $response;
		echo json_encode($json, JSON_PRETTY_PRINT);
		die();
	}*/

	setlocale(LC_ALL,"es_ES");

// RECUPERO CAMPOS DEL FORM

	$post_requestdate = date("Y-m-d H:i:s");
	$form_name = isset($_REQUEST['name'])? $_REQUEST['name'] : '';
	$form_origen = isset($_REQUEST['lugar_origen'])? $_REQUEST['lugar_origen'] : '';
	$form_destino = isset($_REQUEST['lugar_destino'])? $_REQUEST['lugar_destino'] : '';
	$form_fecha = isset($_REQUEST['fecha'])? $_REQUEST['fecha'] : '';
	$form_hora = isset($_REQUEST['hora'])? $_REQUEST['hora'] : '';
	$form_pax = isset($_REQUEST['cantidad_personas'])? $_REQUEST['cantidad_personas'] : '';
	$form_phone = isset($_REQUEST['telefono'])? $_REQUEST['telefono'] : '';
	$form_email = isset($_REQUEST['email'])? $_REQUEST['email'] : '';
	$form_comments = isset($_REQUEST['comentario'])? $_REQUEST['comentario'] : '';
	/*$form_name = $_POST['name'];
	$form_origen = $_POST['lugar_origen'];
	$form_destino = $_POST['lugar_destino'];
	$form_fecha = $_POST['fecha'];
	$form_hora = $_POST['hora'];
	$form_pax = $_POST['cantidad_personas'];
	$form_phone = $_POST['telefono'];
	$form_email = $_POST['email'];
	$form_comments = $_POST['comentario'];*/

// ENVIO DE MAIL DE NOTIFICACION

	$to = 'Reservas Arloeyx <jose.santana@arloeyx.com.ar>';

	$subject = 'Reserva de ' . $form_name;

	$headers = "From: Formulario Web <noreply@arloeyx.com.ar>\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message .= '<h1>Formulario de Reservas</h1>';
	$message .= '<table rules="all" style="border-color: #E8E8E8; width:100%" cellpadding="10" width="100%">';
	$message .= "<tr><td><strong>Enviado:</strong> </td><td>" . $post_requestdate . "</td></tr>";
	$message .= "<tr><td><strong>Nombre:</strong> </td><td>" . strip_tags($form_name) . "</td></tr>";
	$message .= "<tr><td><strong>Origen:</strong> </td><td>" . strip_tags($form_origen) . "</td></tr>";
	$message .= "<tr><td><strong>Destino:</strong> </td><td>" . strip_tags($form_destino) . "</td></tr>";
	$message .= "<tr><td><strong>Fecha:</strong> </td><td>" . strip_tags($form_fecha) . "</td></tr>";
	$message .= "<tr><td><strong>Hora:</strong> </td><td>" . strip_tags($form_hora) . "</td></tr>";
	$message .= "<tr><td><strong>Cantidad de Pax:</strong> </td><td>" . strip_tags($form_pax) . "</td></tr>";
	$message .= "<tr><td><strong>Teléfono:</strong> </td><td>" . strip_tags($form_phone) . "</td></tr>";
	$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($form_email) . "</td></tr>";
	$message .= "<tr><td><strong>Comentarios:</strong> </td><td>" . strip_tags($form_comments) . "</td></tr>";
	$message .= "</table>";
	$message .= "</body></html>";

	mail($to, $subject, $message, $headers);

?>