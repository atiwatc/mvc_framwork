<?php
	class view{			
		public function __construct(){ // ทำงานเมื่อ object ถูกสร้าง
			
		}
		public function jquery(){ //library jqurey 
		
			  echo ' 
					<link rel="stylesheet" href="'.YOURLS_WEBSERVER.'/library/jquery-ui-1.10.3/themes/base/jquery.ui.all.css">
					
					<script src="'.YOURLS_WEBSERVER.'/library/jquery-ui-1.10.3/jquery.js" type="text/javascript"></script>
				
					<script src="'.YOURLS_WEBSERVER.'/library/jquery-ui-1.10.3/jquery-ui.js" type="text/javascript"></script>
					';			
		}		
		public function sencha(){ // library Sencha 
		
			  echo '
					<link rel="stylesheet" href="'.YOURLS_WEBSERVER.'/library/ext-4.2.1.883/resources/ext-theme-classic/ext-theme-classic-all.css">
					
					<link rel="stylesheet" href="'.YOURLS_WEBSERVER.'/library/ext-4.2.1.883/examples/restful/restful.css"/>
					<link rel="stylesheet" href="'.YOURLS_WEBSERVER.'/library/ext-4.2.1.883/resources/css/ext-all.css"/>
					<script type="text/javascript" src="'.YOURLS_WEBSERVER.'/library/ext-4.2.1.883/ext-all.js"></script>	
					';
		 
		}		
		public function Bootstrap(){ //library Bootstrap ตัวจัดการแสดงผล
			echo '
			
				<style type="text/css" title="currentStyle">
					@import "'.YOURLS_WEBSERVER.'/library/DataTables-1.9.4/media/css/demo_page.css";
					@import "'.YOURLS_WEBSERVER.'/library/DataTables-1.9.4/media/css/demo_table.css";
					
					@import "'.YOURLS_WEBSERVER.'/library/DataTables-1.9.4/media/css/demo_table_jui.css";
					/*@import "'.YOURLS_WEBSERVER.'/library/DataTables-1.9.4/examples_support/themes/smoothness/jquery-ui-1.8.4.custom.css"; */
				</style>
				<!--
				<script type="text/javascript" charset="utf-8" src="'.YOURLS_WEBSERVER.'/library/DataTables-1.9.4/media/js/jquery.js"></script>
				-->
				<script type="text/javascript" charset="utf-8" src="'.YOURLS_WEBSERVER.'/library/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
				<script type="text/javascript" charset="utf-8" src="'.YOURLS_WEBSERVER.'/library/DataTables-1.9.4/ZeroClipboard.js"></script>
				<script type="text/javascript" charset="utf-8" src="'.YOURLS_WEBSERVER.'/library/DataTables-1.9.4/media/js/dataTables.tableTools.min.js"></script>
		
				<link href="'.YOURLS_WEBSERVER.'/library/bootstrap-3.0.3/dist/css/bootstrap.css" rel="stylesheet">
		
				<link href="'.YOURLS_WEBSERVER.'/library/bootstrap-3.0.3/examples/navbar/navbar.css" rel="stylesheet">
				<script src="'.YOURLS_WEBSERVER.'/library/bootstrap-3.0.3/dist/js/bootstrap.min.js"></script>
				<link href="'.YOURLS_WEBSERVER.'/library/bootstrap-3.0.3/dist/css/bootstrap-theme.min.css" rel="stylesheet">   
				    ';
		}
		
		public function dcodes(){ //library Bootstrap ตัวจัดการแสดงผล
			echo '
				<!-- DC Dock Menu CSS -->
				<link type="text/css" rel="stylesheet" href="dcodes/menus/dock/css/dc_dock_menu.css" />
				<!-- jQuery Library (skip this step if already called on page ) -->
				<script type="text/javascript" src="'.YOURLS_WEBSERVER.'/library/dcodes/jquery.min.js"></script> <!-- (do not call twice) -->
				<!-- DC Dock Menu JS -->
				<script type="text/javascript" src="'.YOURLS_WEBSERVER.'/library/dcodes/menus/dock/js/fisheye-iutil.min.js"></script>
				<script type="text/javascript" src="'.YOURLS_WEBSERVER.'/library/dcodes/menus/dock/js/dc_dock_menu.js"></script>';
		}
		
		public function menu($value='') //แสดงเมนู
		{
			
			include 'menu.php';
		}
		public function home($value='')//แสดงหน้าแรก
		{
			$this->jquery();
			//$this->sencha();
			$this->Bootstrap();
			
			$this->menu('home');
			echo "<br /><br />";
			$this->dcodes_menu();
			echo "<div class='container'>";
			include 'home.php';
			echo "</div>";
		}
		
		public function dcodes_menu()//แสดงหน้าแรก
		{
			$this->dcodes();
			echo "<div class='container'>";
			include 'dcodes_menu.php';
			echo "</div>";
		}
		

	}
	

	
?>
