<?php
session_start();
	
include 'config/rout.php';
header('Content-Type: text/html; charset=utf-8');

//กำหนด ให้ ie เป็นเวอชั่นสูงสุด
echo '<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />';
echo '<meta http-equiv="X-UA-Compatible" content="IE=10" >';
echo '<meta http-equiv="X-UA-Compatible" content="IE=9" >';
echo '<meta http-equiv="X-UA-Compatible" content="IE=8" >';
//echo '<META HTTP-EQUIV="Refresh"  CONTENT="2000;">'; //session หมดอายุทุกๆ 24 นาที จึง refresh เพื่อให้ session ยุเรื่อยๆ

echo '<link rel="stylesheet" href="'.YOURLS_WEBSERVER_SITE.'/css/style_oss.css">'; //css ของระบบ
echo '
	<link rel="icon" href="'.YOURLS_WEBSERVER_SITE.'/image/favicon.ico" type="image/x-icon" />
	<title>Example</title>
';
function __autoload($class_name){ //ฟั่งชั่น ในการ autoload ในการ include 

        //class directories
        $directorys = array(
        	'config/',
            'Controller/',
        );
        
        //for each directory
        foreach($directorys as $directory)
        {
            if(file_exists($directory.$class_name . '.php'))
            {
                require_once($directory.$class_name . '.php');
                return;
            }            
        }
    }

	new getMvc(); //เรียกใช้ controller ของระบบ 

	
	
?>
