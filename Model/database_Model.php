<?php

include_once 'config/rout.php';
//include 'VariableModel.php';
class database_Model extends Config {
	protected $connect;
	protected $sql;
	protected $strTable;
	protected $strCondition;
	
	protected $objResult = array();
	protected $arrValue = array();

	public function __construct(){
		$this->connect = $this->connect_db();
		if($this->connect == FALSE){
			exit("Connection Database Failed !!!");
		}
	}
	
	private function connect_db(){
		$connect = odbc_connect(	
									self::Mssql_DBContribution("HOST"), 
									self::Mssql_DBContribution("USER"), 
									self::Mssql_DBContribution("PASSWORD") 
								); 
		if (!$connect){
			//exit("Connection Failed: " . $connect);
			return FALSE;
		}else{
			return $connect;
		}
	}
	
	protected function select(){
		$objExec = odbc_exec($this->connect, $this->sql);
		$this->objResult = array();
		while ($objResult = odbc_fetch_array($objExec)){
        	$this->objResult[] = $objResult;
		}
		$this->db_close();
		return $this->objResult;
	}
	protected function odbc_transection_begin(){
		odbc_autocommit($this->connect,false); 
	}
	protected function odbc_transection_commit(){
		odbc_commit($this->connect);
	}
	protected function odbc_transection_rollback(){
		odbc_rollback($this->connect);
	}
	protected function insert(){
		$keys = array_keys($this->arrValue);
		$values = array_values($this->arrValue);
		for($j=0;$j<sizeof($keys);$j++){
			$att .= "$keys[$j]";
			$val .= "'$values[$j]'";
			if($j<(sizeof($keys)-1)){
				$att .= ", ";
				$val .= ", ";
			}
		}
		$strSQL = "INSERT INTO $this->strTable ($att) VALUES ( $val ) ";
		//echo $strSQL."<br />";
		if(odbc_exec($this->connect, $strSQL)){
			return true;
		}else{
			$this->odbc_transection_rollback();
			return false;
		}
		$this->db_close();
	}
	
	protected function update()
	{
		$keys = array_keys($this->arrValue);
		$values = array_values($this->arrValue);
		for($j=0;$j<sizeof($keys);$j++){
			$val .= "$keys[$j] = '$values[$j]'";
			if($j<(sizeof($keys)-1)){
				$val .= ", ";
			}
		}
		$strSQL = "UPDATE $this->strTable SET $val WHERE $this->strCondition ";
		//echo $strSQL."<br />";
		if(odbc_exec($this->connect, $strSQL)){
			return true;
		}else{
			$this->odbc_transection_rollback();
			return false;
		}
		$this->db_close();
	}

	protected function delete()
	{
		$strSQL = "DELETE FROM $this->strTable WHERE $this->strCondition ";
		//echo $strSQL."<br />";
		if(odbc_exec($this->connect, $strSQL)){
			return true;
		}else{
			$this->odbc_transection_rollback();
			return false;
		}
		$this->db_close();
	}
	
	protected function db_close(){
		odbc_close($this->connect);
	}
	
	public function __destruct() {
		$this->db_close();
  	}	
}

?>
