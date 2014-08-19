<?php
include 'database_Model.php';

class project_Model extends database_Model{

	private function project_Model() 
    { 
        parent::__construct(); //นำ constructer ของ class แม่มา ซึ่งคือ database_Model
    }
}


?>
