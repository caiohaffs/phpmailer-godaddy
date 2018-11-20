<?php

require_once "recaptchalib.php";

$Nome		= $_POST["name"];	// Pega o valor do campo Nome
$Email		= $_POST["email"];	// Pega o valor do campo Email
$Fone		= $_POST["subject"];	// Pega o valor do campo titulo
$Mensagem	= $_POST["message"];	// Pega os valores do campo Mensagem



	
// Variável que junta os valores acima e monta o corpo do email

$Vai 		= "Name: $Nome\n\nE-mail: $Email\n\n Regarding: $Fone\n\n Message: $Mensagem\n";
error_reporting(0);
require_once("phpmailer/class.phpmailer.php");




	global $error;
	$mail = new PHPMailer(true);
	
	$mail->SMTPAuth = false;		// Autenticação ativada
	$mail->SMTPDebug = 2;  
	$mail->Host = 'localhost';	// SMTP utilizado
	$mail->Port = 25;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = '';
	$mail->Password = '';
	$mail->SetFrom($Email, $Nome);
	$mail->Subject = 'Contact by site';
	$mail->Body = $Vai;
	$para='meuemail@dominio.com';
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}


?>
