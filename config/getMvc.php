<?php
	include_once 'config/rout.php';
	
	class getMvc extends Config{
		public function __construct(){
			$falg = TRUE;
			$requestUrl = YOURLS_WEBSERVER . $_SERVER['REQUEST_URI'];
			//echo "<br/><br/>".YOURLS_WEBSERVER;
			//echo "<br/><br/>".$_SERVER['REQUEST_URI'];
			//$url = explode('index.php', $requestUrl);
			if(strstr($requestUrl," index.php"))
			{
				$url = explode('index.php', $requestUrl);
			}else{
				$url = explode(YOURLS_SITE, $requestUrl);
				//echo "<br/><br/>host".YOURLS_SITE;
			}
			
			
			$controllerName = $url[1];
			$url1 = explode('/', $controllerName);
			  
			if($url1[1] == null){
				//include "Controller/oss.php";
				//$controller = new $MTECApp[Controller][0]();
				$controler_ = self::reqister_controller("Controller");
				$controller = new $controler_[0]();
				//echo " <br /><br /><br />dd".$controler_[0];
				
			}else{
				//include "Controller/$url1[1].php";
				//$controller = new $url1[1]();
				$controler_ = self::reqister_controller("Controller");
				$search = FALSE;
				foreach($controler_ as $key=>$subval){
					if(strcmp(strtolower($url1[1]), strtolower($subval))==0){
					   $search = TRUE;
					}
				}
				
				if($search){
					$controller = new $url1[1]();
				}else {
					$controller = new $controler_[0]();
					$falg = FALSE;
				}
			}
			
			/*
			for($i=3; $i<sizeof($url1); $i++){
				$param .= "$url1[$i]";
				if($i<(sizeof($url1)-1)){
					$param .= ", ";
				}
			}
			if($url1[2] == null){
				$controller -> menu();
			}else{
				$controller -> $url1[2]($param);
				echo $param;
			} 
			 */
			$method_ = self::reqister_controller("Method");
			$search = FALSE;
			foreach($method_ as $key=>$subval){
				//echo "<br />method true ".$url1[2]." ".$subval;
				if(strcmp(strtolower($url1[2]), strtolower($subval)) == 0){
					   $search = TRUE;
					}
			}
			if(($search==TRUE) && ($falg==TRUE)){
			$max = sizeof($url1);
			if ($max == 4) {
				$controller -> $url1[2]($url1[3]);
			} else if ($max == 5) {
				$controller -> $url1[2]($url1[3], $url1[4]);
			} else if ($max == 6) {
				$controller -> $url1[2]($url1[3], $url1[4], $url1[5]);
			} else if ($max == 7) {
				$controller -> $url1[2]($url1[3], $url1[4], $url1[5], $url1[6]);
			} else if ($max == 8) {
				$controller -> $url1[2]($url1[3], $url1[4], $url1[5], $url1[6], $url1[7]);
			} else if ($max == 9) {
				$controller -> $url1[2]($url1[3], $url1[4], $url1[5], $url1[6], $url1[7], $url1[8]);
			} else if ($max == 10) {
				$controller -> $url1[2]($url1[3], $url1[4], $url1[5], $url1[6], $url1[7], $url1[8], $url1[10], $url1[11]);
			} else if ($max == 11) {
				$controller -> $url1[2]($url1[3], $url1[4], $url1[5], $url1[6], $url1[7], $url1[8], $url1[10], $url1[11], $url1[12]);
			} else if ($max == 12) {
				$controller -> $url1[2]($url1[3], $url1[4], $url1[5], $url1[6], $url1[7], $url1[8], $url1[10], $url1[11], $url1[12], $url1[13]);
			} else if ($max == 13) {
				$controller -> $url1[2]($url1[3], $url1[4], $url1[5], $url1[6], $url1[7], $url1[8], $url1[10], $url1[11], $url1[12], $url1[13], $url1[14]);
			}else{
				if($url1[2] == null){
					$controller -> $method_[0]();
					
				}else{
					$controller -> $url1[2]();
					
				}
			}
		}else{
			//$method = $method_[0];
			$controller->$method_[0]();
			
		}
	}
	}
?>