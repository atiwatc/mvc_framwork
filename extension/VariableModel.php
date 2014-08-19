<?php
//namespace Gennarate;
class Variable{
	   

       public static function get($load, $name="") {
              if($load == "_GET") {
                     global $_GET;
                     $var = $_GET;
              } else if($load == "_POST") {
                     global $_POST;
                     $var = $_POST;
              } else if($load == "_SESSION") {
                     global $_SESSION;
                     $var = $_SESSION;
              } else if($load == "_FILES") {
                     global $_FILES;
                     $var = $_FILES;
              }
              if($name == "") {
                     return self::validate($var, $load);
              } else {
                     return self::validate($var[$name], $load);
              }
       }
       private function validate($var, $load, $key=""){

              if(is_array($var)) {
                     foreach($var as $key=>$value) {
                           $var[$key] = self::validate($value, $load, $key);
                     }
                     return $var;
              } else {
                     if($load != "_POST") {
                           $var = strip_tags($var);
                     }
                     //replace ' for mssql
                     return str_replace("'", "''", $var);
              }
       }
	   public static function tis620_to_utf8($tis) {
			for ($i = 0; $i < strlen($tis); $i++) {
				$s = substr($tis, $i, 1);
				$val = ord($s);
				if ($val < 0x80) {
					$utf8 .= $s;
				} elseif ((0xA1 <= $val and $val <= 0xDA) or (0xDF <= $val and $val <= 0xFB)) {
					$unicode = 0x0E00 + $val - 0xA0;
					$utf8 .= chr(0xE0 | ($unicode>>12));
					$utf8 .= chr(0x80 | (($unicode>>6) & 0x3F));
					$utf8 .= chr(0x80 | ($unicode & 0x3F));
				}
			}
			return $utf8;
		}
		public static function utf8_to_tis620($string) {
			$str = $string;
			$res = "";
			for ($i = 0; $i < strlen($str); $i++) {
				if (ord($str[$i]) == 224) {
					$unicode = ord($str[$i+2]) & 0x3F;
					$unicode |= (ord($str[$i+1]) & 0x3F) << 6;
					$unicode |= (ord($str[$i]) & 0x0F) << 12;
					$res .= chr($unicode-0x0E00+0xA0);
					$i += 2;
				} else {
					$res .= $str[$i];
				}
			}
			return $res;
		}
		
		public static function getValue($value, $type) {
		$value.="";
		if($type == "digit"){ //001
			if (ctype_digit($value)) {
				if(substr($value, 0, 1) == 0 || substr($value, 0, 1) >= 0){
					return $value;
				}else{
					return null;
				}
			}else{
				return null;
			}
		}else if($type == "decimal"){ //.. -1 0 1 ..
			if (is_numeric($value)) {
				return $value;
			}else{
				return null;
			}
		}else if($type == "number"){ //0 1 2 ..
			if (ctype_digit($value)) {
				if(strlen($value) > 1){
					if(substr($value, 0, 1) > 0){
						//echo $value;
						return $value;
					}else{
						return null;
					}
				}else{
					return $value;
				}
			}else{
				return null;
			}
		}else{
			return null;
		}
	}
	
	public static function convertYMDTtoDMYT($date){
		return substr($date, 8, 2) . "/" . substr($date, 5, 2) . "/" . (substr($date, 0, 4)+543)." ".substr($date, 11, 8);
	}
	
	public static function convertDMYTtoYMDT($date){
		return substr($date, 8, 2) . "/" . substr($date, 5, 2) . "/" . (substr($date, 0, 4)+543)." ".substr($date, 11, 8);
	}
	
	public static function convertYMDTtoDMY($date){
		return substr($date, 8, 2) . "/" . substr($date, 5, 2) . "/" . (substr($date, 0, 4)+543);
	}
	
	public static function convertDMYTtoYMD($date){
		return substr($date, 8, 2) . "/" . substr($date, 5, 2) . "/" . (substr($date, 0, 4)+543);
	}
	
	public static function substr($value="",$leng) {
		//$Filename_sub4 = substr($value,25);
		if(isset($value{30})){
			//$value = substr($value,0,$leng);
			$value = mb_substr($value,0,$leng,'UTF-8'); 
			$value .= "...";
			//$Filename_sub4 .= substr($value,strlen($value)-$leng,strlen($value));
		}
		return $value;
	}
	
	public static function str_replace_quat($value="") {
		$vowels = array("\\");
		$value = str_replace($vowels, "", htmlspecialchars($value));
		return $value;
	}
}
/*--------------------------------------------start Bootstrap-------------------------------------------------------------------*/

/*--------------------------------------------end Bootstrap-------------------------------------------------------------------*/

/*--------------------------------------------start Sencha-------------------------------------------------------------------*/

/*--------------------------------------------end Sencha-------------------------------------------------------------------*/

/*---------------------------------------------start jqurey----------------------------------------------------------------------*/
		
/*----------------------------------------------end jqurey-------------------------------------------------------------------*/





?>