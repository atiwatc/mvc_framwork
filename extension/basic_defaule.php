<?php
namespace basic_defaule;
class basic_defaule{
		public static function loading_js(){
			//return '<div style="position:relative; top:150px;z-index:2;color:#2E9AFE;" align="center" ><img src="'.YOURLS_WEBSERVER.'/oss/image/loading_line2.gif" /><br /><h4>กำลังโหลดข้อมูล...</h4></div>';
			return '<div style="position:relative; top:100px;z-index:2;color:#2E9AFE;" align="center" ><img src="'.YOURLS_WEBSERVER_SITE.'/image/ajax_loader_blue_64.gif" /><br /><h4>กำลังโหลดข้อมูล...</h4></div>';
		}
}
?>
		