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

	$to = 'info@arloeyx.com.ar';

	$subject = 'Contacto Formulario Web de ' . $form_name;

	$headers = "From:Contacto Formulario Web <".$form_email.">\r\n";
	//$headers .= "CC: roy.djizmedjian@gmail.com\r\n";

	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$message = '<html><body>';
	$message .= '<h1>Formulario de Contacto</h1>';
	$message .= '<table rules="all" style="border-color: #E8E8E8; width:100%" cellpadding="10" width="100%">';
	$message .= "<tr><td><strong>Enviado:</strong> </td><td>" . $post_requestdate . "</td></tr>";
	$message .= "<tr><td><strong>Sección de origen:</strong> </td><td>" . strip_tags($form_origen) . "</td></tr>";
	$message .= "<tr><td><strong>Nombre:</strong> </td><td>" . strip_tags($form_name) . "</td></tr>";
	$message .= "<tr><td><strong>Apellido:</strong> </td><td>" . strip_tags($form_apellido) . "</td></tr>";
	$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($form_email) . "</td></tr>";
	$message .= "<tr><td><strong>Teléfono:</strong> </td><td>" . strip_tags($form_phone) . "</td></tr>";
	$message .= "<tr><td><strong>Comentarios:</strong> </td><td>" . strip_tags($form_comments) . "</td></tr>";
	$message .= "</table>";
	$message .= "</body></html>";




	mail($to, $subject, $message, $headers);

	//$to = 'info@arloeyx.com.ar';
	$to2 = $form_email;

	$subject2 = 'Contacto Formulario Web de Arloeyx';

	$headers2 = "From:Contacto Formulario Web <info@arloeyx.com.ar>\r\n";

	$headers2 .= "MIME-Version: 1.0\r\n";
	$headers2 .= "Content-Type: text/html; charset=UTF-8\r\n";

	// $message2 = '<html><body>';
	// $message2 .= '<h1>Formulario de Contacto</h1>';
	// $message2 .= '<table rules="all" style="border-color: #E8E8E8; width:100%" cellpadding="10" width="100%">';
	// $message2 .= "<tr><td><strong>Enviado:</strong> </td><td>" . $post_requestdate . "</td></tr>";
	// $message2 .= "<tr><td><strong>Muchas Gracias</strong> </td><td>" . strip_tags($form_name) . "</td></tr>";
	// $message2 .= "<tr><td><strong>Mensaje:</strong> </td><td>su solicitud comienza a ser procesada a la brevedad recibirá un próximo contacto nuestro.</td></tr>";
	// $message2 .= "<tr><td><strong>Arloeyx</strong> </td><td></td></tr>";
	// $message2 .= "</table>";
	// $message2 .= "</body></html>";

	$message2 = '<html><body><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family:Helvetica, Arial, sans-serif;color:#272626"><tr><td><img src="https://www.arloeyx.com.ar/misc/mails/06-newsContacto/img-ctaCte.jpg" style="display:block;border:none;outline:none" width="600" height="205" /></td></tr><tr><td><table width="600" border="0" cellspacing="0" cellpadding="0"><tr height="45"><td width="50px">&nbsp;</td>';
	$message2 .= '<td style="font-size:20px">Estimado, <strong>'. strip_tags($form_name) .'</strong></td><td width="50px">&nbsp;</td></tr><tr height="30">
            <td>&nbsp;</td><td>Hemos recibido su consulta<br /> Estamos procesando su solicitud, a la brevedad recibir&aacute; un pr&oacute;ximo contacto nuestro.</td> <td >&nbsp;</td> </tr><tr height="40px"><td>&nbsp;</td><td>&nbsp;</td><td width="50px">&nbsp;</td></tr></table></td></tr><tr style="background:#e2e2e2"><td><table width="600" border="0" cellspacing="0" cellpadding="0"><tr><td colspan="3" height="40"></td></tr><tr><td width="50">&nbsp;</td><td height="47"><img src="https://www.arloeyx.com.ar/misc/mails/06-newsContacto/img-barComunicate.jpg" style="display:block;border:none;outline:none" width="500" height="47" /></td><td width="50">&nbsp;</td></tr><tr height="20"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td><p style="font-size:10px;padding:20px;text-align:center;border:1px solid #cdcdcd">Para seguir en contacto te solicitamos que al correo que envies nos pongas <strong>responder</strong> y podremos seguir mas presonalizadamente tu servicio.<br />Si logras conseguir un presupuesto mejor que el nuestro, te proponemos que nos envies la cotizacion formulada por la otra empresa y <strong>te mejoraremos nuestra oferta</strong>.</p></td><td>&nbsp;</td></tr><tr height="30"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td><a href="http://www.arloeyx.com.ar" target="_blank"><img src="https://www.arloeyx.com.ar/misc/mails/06-newsContacto/img-clubarlo.jpg" style="display:block;border:none;outline:none" width="500" height="108" /></a></td><td>&nbsp;</td></tr><tr height="20"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td><img src="https://www.arloeyx.com.ar/misc/mails/06-newsContacto/footer.jpg" style="display:block;border:none;outline:none" width="500" height="80" /></td><td>&nbsp;</td></tr></table> </td></tr></table></body></html>';


	mail($to2, $subject2, $message2, $headers2);

?>