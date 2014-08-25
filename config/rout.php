<?php
define( 'YOURLS_WEBSERVER', 'http://localhost:81/' );
define( 'YOURLS_WEBSERVER_SITE', 'http://localhost:81/pototype_mvc' );
define( 'YOURLS_SITE', 'pototype_mvc' );

abstract class Config {
	protected static function reqister_controller($index = false) {
		 $MTECApp = array(
							"Controller" => array("mainController"),
							"Method" 	 => array( "home","menu","dcodes_menu","about")
						 );
        if( $index == false ) {
        	$array = $MTECApp;
		}else{
			$array = $MTECApp[$index];
		}
		
		return $array;
    }
	
	protected static function Mssql_OSS($index = false) {
		 $database = array(
								'HOST' => '' , 
								'USER' => '' , 
								'PASSWORD' => '' , 
							  );
        return $index !== false ? $database[$index] : $database;
    }
}
?>