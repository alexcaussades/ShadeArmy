<?php

namespace ShadeLife;

require 'interface/Imail.php';

/**
 * - Systeme d'envoie de E-mail
 * - pour les function création de compte et de mot de passe 
 */

class Mail implements Imail
{

	public function mailgo($email, $subject, $messagemail )
	{
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1'; 
		$headers[] = 'From: nepasrepondre@shadearmy.fr';
		$headers[] = 'Bcc: alexcaussades@gmail.com';

		mail($email, $subject, $messagemail, implode("\r\n", $headers));

	}

	public function emailpass()
	{
		$login = "alex";
		$newpass = "qsdkljqlizdlqizdjlqzi@@##´qszdjziqjl";
		$messagemail = "<div>Bonjour : ". $login ."</div>
		<div>vous avez demander un <strong> changement de mot de passe </strong> sur le service. </div>
		<div>Voici cotre nouveau mot de passe : ". $newpass."</div>";
		return $messagemail;
	
	}

}

// $email = new Mail;
// $login = "alex";
// $newpass = "qsdkljqlizdlqizdjlqzi@@##´qszdjziqjl";
// $messagemail = "<div>Bonjour : " .$login."</div>
// 		<div>vous avez demander un <strong> changement de mot de passe </strong> sur le service. </div>
// 		<div>Voici cotre nouveau mot de passe : ". $newpass."</div>";

// $email->mailgo("alexc45fc@gmail.com", "coucou ses moi", $messagemail, $headers);

