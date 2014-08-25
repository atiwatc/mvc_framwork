<?php
session_start();

class mainController {
	
	public function __construct(){ 
		include __DIR__.'/../Model/project_Model.php';				//ส่วนจัดการข้อมูล
		include __DIR__.'/../View/view.php';					//ส่วนแสดงผล
		include __DIR__.'/../extension/VariableModel.php';		//เก็บพวก varidate ทั่วไป
		include __DIR__.'/../extension/Bootstrap.php';			//เจนเรท bootstrap เช่น datatable
		include __DIR__.'/../extension/Sencha.php';				//เจนเรท sencha เช่น gridview,autocomplet
	    include __DIR__.'/../extension/Jquery.php';				//เจนเรทตัว jqurey เช่น ajax,dialog,autocomplet
		include __DIR__.'/../extension/basic_defaule.php';		//ตัวเจนเรททั่วไป
	}

	public function menu(){ //ส่วนของเมนู
		$view = new view();
		$view->menu();
		unset($view); //ทำลาย Object
	}
	public function home(){ //หน้าหลัก
		$view = new view();
		$view->home();
		unset($view); //ทำลาย Object
	}
	
	public function dcodes_menu(){
		$view = new view();
		$view->dcodes_menu();
		unset($view); //ทำลาย Object
	}
	
	public function about(){ //หน้าหลัก
		$view = new view();
		$view->about();
		unset($view); //ทำลาย Object
	}
}

?>
