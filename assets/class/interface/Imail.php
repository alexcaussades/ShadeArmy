<?php
namespace ShadeLife;


interface Imail
{
	function mailgo($messagemail, $subject, $email);

	function emailpass();
}