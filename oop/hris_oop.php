<?php

	class INVS_HRIS extends mysqli 
	{
		private static $instance = null;
		
		//db connection config variables
		private $user = "root";	//Username
		private $pass = "newd3v"; //Password
		private $dbName = "db_hris"; //db_name Note: if you are going to use multiple database just place one here.. use sql to call the other one just in case, for example : database2.tablename
		private $dbHost = "192.168.3.240"; //host
		
		//NO NEED TO CHANGE HERE 
		public static function getInstance() {
			if(!self::$instance instanceof self) 
			{
				self::$instance = new self;
			}
			return self::$instance;
		}

		public function __clone()
		{
			trigger_error('Clone is not allowed.',E_USER_ERROR);
		}
		
		public function __wakeup()
		{
			trigger_error('Deserializing is not allowed.',E_USER_ERROR);
		}
		
		private function __construct() {
			parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
			if(mysqli_connect_error())
			{
				exit('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
			}
			parent::set_charset('utf-8');
		}

		////////////////////////////////////UP TO HERE////////////////////////////////////////
		
		////////////////////////////////////PUBLIC FUNCTIONS STARTS HERE//////////////////////////////////////////////
		public function select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit){
			$query = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $array_fields) . " FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};";
			return $this->query($query);
			// return $query;
		}
		
		public function select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit){
			$query = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $array_fields) . " FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};";
			return $this->query($query);
			// return $query;
		}
			
		public function insert_query($table,$array_fields,$array_values){
			$new_values = $this->add_quotations($array_values); 
			$query 		= "INSERT INTO {$table} (". implode(", ", $array_fields).") VALUES (". implode(",", $new_values) .");";
			$this->query($query);
			// $this->save_logs('1',$query);
			return "New record has been saved";
		}

		public function update_query($table,$array_fields,$array_values,$pkid){
			$update_array =  $this->create_update_param($array_fields,$array_values);
			$query 		  = "UPDATE {$table} SET ". implode(",", $update_array) ."WHERE pkid='{$pkid}';";
			$this->query($query);
			// $this->save_logs('2',$query);
			return "Record has been updated";
		}

		public function delete_query($table,$pkid){
			$query = "DELETE FROM {$table} WHERE `pkid` = '{$pkid}';";
			$this->query($query);
			// $this->save_logs('3',$query);
			return "Record has been deleted";
		}
		
		public function add_quotations($array_values){
			$array_values_r = array();
			for($i=0;$i<count($array_values);$i++){
				$array_values_r[$i] = "'".$array_values[$i]."'";
			}
			return $array_values_r;
		}

		public function create_update_param($array_fields,$array_values){
			$array_update = array();
			for($i=0;$i<count($array_fields);$i++){
				$array_update[$i] = "`".$array_fields[$i]."` = "."'".$array_values[$i]."' ";
			}
			return $array_update;
		}
		
		public function save_logs($type,$query){
			$date_today = date('Y-m-d H:i:s');
			$new_query = str_replace("'",'"',$query);
			$logs = "INSERT INTO `tbl_logs` (`type_of_query`,`query`,`date`) VALUES('".$type."','".$new_query."','".$date_today."');";
			$this->query($logs);
		}
		
		//////////////////////////////////
		
		public function getUsername($username) { 
			// $query = ("SELECT * FROM tbl_useraccounts WHERE username = '$username' ");
			$query = ("SELECT CONCAT(firstname, ' ', lastname) as emp_name, pkid, username FROM `vw_emp_hris` WHERE (empstatus = '1') AND username = '$username' ");
			return $this->query($query);
		}

		public function select_immediate_superior() {  
			// $query = ("SELECT CONCAT(firstname, ' ', lastname) as emp_name, pkid, username FROM `vw_emp_hris` WHERE (salarytype = '4') AND (empstatus = '1') AND (division = 'TS' OR division = 'CN' OR division = 'PPS' OR division = 'YF') ORDER BY emp_name ASC");
			$query = ("SELECT CONCAT(firstname, ' ', lastname) as emp_name, pkid, username FROM `vw_emp_hris` WHERE Section = 'Information System Section' AND (empstatus = '1') ");
			return $this->query($query);
		}
	
		// public function select_supv_list_by_username($pkid) {  
		public function select_supv_list_by_username($username) {  
			// $query = ("SELECT CONCAT(firstname, ' ', lastname) as emp_name, pkid, username FROM `vw_emp_hris` WHERE (salarytype = '4') AND (empstatus = '1') AND (division = 'TS' OR division = 'CN' OR division = 'PPS' OR division = 'YF') AND pkid = '$pkid'");
			// $query = ("SELECT CONCAT(firstname, ' ', lastname) as emp_name, pkid, username FROM `vw_emp_hris` WHERE Section = 'Information System Section' AND pkid = '$pkid' ");
			$query = ("SELECT CONCAT(firstname, ' ', lastname) as emp_name, pkid, username FROM `vw_emp_hris` WHERE Section = 'Information System Section' AND username = '$username' ");
			return $this->query($query);
		}

		
		
		public function select_employee_info_by_username($username) {
			$query = ("SELECT CONCAT(firstname , ' ', lastname) AS emp_name, Section FROM vw_EmpInfo_Rapid WHERE username = '$username' ");
			return $this->query($query);		
		}
		
		public function select_email_add($username) {
			$query = ("SELECT email_add FROM vw_EmpInfo_Rapid WHERE username = '$username' ");
			return $this->query($query);		
		}
		
		public function getApproverList($emp_username) { //Get approver list
			$query = ("SELECT * FROM  `vw_Approver` WHERE username =  '$emp_username' AND EmpStatus = '1' "); 
		return $this->query($query);
		}
		
		public function getEmpName($username) { //Get Emp name
			$query = ("SELECT tbl_EmployeeInfo.`FirstName`,tbl_EmployeeInfo.`LastName` FROM db_acl.tbl_useraccnt 
						INNER JOIN db_hris.tbl_EmployeeInfo ON tbl_EmployeeInfo.pkid = tbl_useraccnt.fkemployee 
						WHERE tbl_useraccnt.username='".$username."' ;");
		return $this->query($query);
		}
		
		public function getSectionHeadName($username) { //Get Sec approver name
			$query = ("SELECT tbl_EmployeeInfo.`FirstName`,tbl_EmployeeInfo.`LastName` FROM db_acl.tbl_useraccnt INNER JOIN db_hris.tbl_EmployeeInfo ON tbl_EmployeeInfo.pkid = tbl_useraccnt.fkemployee 
				WHERE tbl_useraccnt.username='".$username."' ;");
		return $this->query($query);
		}
		
		public function getSectionHead($emp_username) { //Get Sec head list
			$query = ("SELECT * FROM vw_elfs_approver WHERE username =  '$emp_username' and logdel = '0'"); 	
		return $this->query($query);
		}
		
		
		
		
		

		
	}

?>
