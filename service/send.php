<?php

	setlocale(LC_ALL,"es_ES");

// RECUPERO CAMPOS DEL FORM

	$post_requestdate = date("Y-m-d H:i:s");
	$form_origen = isset($_REQUEST['origen'])? $_REQUEST['origen'] : '';
	$form_name = isset($_REQUEST['nombre'])? $_REQUEST['nombre'] : '';
	$form_apellido = isset($_REQUEST['apellido'])? $_REQUEST['apellido'] : '';
	$form_email = isset($_REQUEST['email'])? $_REQUEST['email'] : '';
	$form_phone = isset($_REQUEST['telefono'])? $_REQUEST['telefono'] : '';
	$form_comments = isset($_REQUEST['comentario'])? $_REQUEST['comentario'] : '';

// ENVIO DE MAIL DE NOTIFICACION

	$to = 'Info Arloeyx <jose.santana@arloeyx.com.ar>';

	$subject = 'Contacto de ' . $form_name;

	$headers = "From: Formulario Web <noreply@arloeyx.com.ar>\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message .= '<h1>Formulario de Contacto</h1>';
	$message .= '<table rules="all" style="border-color: #E8E8E8; width:100%" cellpadding="10" width="100%">';
	$message .= "<tr><td><strong>Enviado:</strong> </td><td>" . $post_requestdate . "</td></tr>";
	$message .= "<tr><td><strong>Sección de origen:</strong> </td><td>" . strip_tags($form_origen) . "</td></tr>";
	$message .= "<tr><td><strong>Nombre:</strong> </td><td>" . strip_tags($form_name) . "</td></tr>";
	$message .= "<tr><td><strong>Apellido:</strong> </td><td>" . strip_tags($form_apellido) . "</td></tr>";+
	$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($form_email) . "</td></tr>";
	$message .= "<tr><td><strong>Teléfono:</strong> </td><td>" . strip_tags($form_phone) . "</td></tr>";
	$message .= "<tr><td><strong>Comentarios:</strong> </td><td>" . strip_tags($form_comments) . "</td></tr>";
	$message .= "</table>";
	$message .= "</body></html>";

	mail($to, $subject, $message, $headers);

?>