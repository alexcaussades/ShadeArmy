<?php

namespace ShadeLife;

require ('define.php');
class Bdd

{

	public static function get(){
		if(!self::$bdd){
			try {
                self::$bdd = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
				self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
				return self::$bdd;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}else{
			return self::$bdd;
		}
	}
}