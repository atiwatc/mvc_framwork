<?php
define( 'YOURLS_WEBSERVER', 'https://pearl.mtec.or.th/MTECApp' );
define( 'YOURLS_WEBSERVER_SITE', 'https://pearl.mtec.or.th/MTECApp/new_project' );

abstract class Config {
	protected static function reqister_controller($index = false) {
		 $MTECApp = array(
							"Controller" => array("mainController"),
							"Method" 	 => array( "home","menu")
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