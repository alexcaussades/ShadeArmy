<?php

namespace ShadeLife;



/**
 * - Systeme d'envoie de E-mail
 * - pour les function création de compte et de mot de passe 
 */

class Mail
{

	public function mailgo($email, $subject, $messagemail )
	{
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1'; 
		$headers[] = 'From: nepasrepondre@shadearmy.fr';
		$headers[] = 'Bcc: alexcaussades@gmail.com';

		mail($email, $subject, $messagemail, implode("\r\n", $headers));

	}

	public function emailpass($login, $newpass)
	{
		$messagemail = "<div>Bonjour : ". $login ."</div>
		<div>vous avez demander un <strong> changement de mot de passe </strong> sur le service. </div>
		<div>Voici cotre nouveau mot de passe : ". $newpass."</div>";
		return $messagemail;
	
	}

	public function emailactivation($email, $setname, $pass)
	{
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1'; 
		$headers[] = 'From: nepasrepondre@shadearmy.fr';
		$headers[] = 'Bcc: alexcaussades@gmail.com';
		$subject = "Activation de votre Compte";
		
		$messagemail = '
		<img class="imgheader" src="https://i.imgur.com/J3qgrrw.jpg" alt="">

			<h3> Bonjour  '. $setname .'</h3>

		<div>Vous avez crée un <strong> compte sur le pannel de la ShadeArmy </strong>. Nous vous remercions de votre confiance, que vous nous apportez. </div>

		<br>
		<div>
				Vos informations de connexion : <br>
				Identifiant de connexion : '. $setname .' <br>
				Mot de passe: '. $pass .' <br>
			
		</div>
		
		<br>
		<div>

		

		
		<br>
		<img class="imgcenter" src="https://shadearmy.fr/wp-content/uploads/2018/10/Game-Connection_White-e1540060498645.png" alt="">
		<img class="imgcenter" src="https://shadearmy.fr/wp-content/uploads/2018/10/logo-K-Net1-e1540066458394.png" alt="">
		<img class="imgcenter" src="https://shadearmy.fr/wp-content/uploads/2019/06/ts.png" alt="">
		<img class="imgcenter" src="https://shadearmy.fr/wp-content/uploads/2018/10/Dect1TcXUAAc6RR.jpg-e1540067888845.png" alt="">
		<img class="imgcenter" src="https://shadearmy.fr/wp-content/uploads/2018/04/logo-white-transparent2-e1525101403188.png" alt="">
		<img class="imgcenter" src="https://shadearmy.fr/wp-content/uploads/2018/04/engage2.png" alt="">
		<img class="imgcenter" src="https://shadearmy.fr/wp-content/uploads/2018/04/netgear-e1525103755513.png" alt="">';
		

		mail($email, $subject, $messagemail, implode("\r\n", $headers));
			
		
			
	}

	
}

// $email = new Mail;
// $login = "alex";
// $newpass = "qsdkljqlizdlqizdjlqzi@@##´qszdjziqjl";
// $messagemail = "<div>Bonjour : " .$login."</div>
// 		<div>vous avez demander un <strong> changement de mot de passe </strong> sur le service. </div>
// 		<div>Voici cotre nouveau mot de passe : ". $newpass."</div>";

// $email->mailgo("alexc45fc@gmail.com", "coucou ses moi", $messagemail, $headers);

