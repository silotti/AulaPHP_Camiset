<?php

class dataBaseCore{
	public static $_instance;
	public static function getHandler(){
		$host = "127.0.0.1";
		$dbname = "chamados";
		$charset = "utf8";
		$user = 'adminchamados';
		$password = 'supersenha';

		if ( !isset( self::$_instance ) ) {   
            self::$_instance = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset",$user, $password);        
        }       
        return self::$_instance;
	}
}
?>