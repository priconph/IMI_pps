<?php

	class INVS extends mysqli 
	{
		private static $instance = null;
		
		//db connection config variables
		private $user = "root";	//Username
		private $pass = "r@p1d0nl1n3"; //Password
		// private $dbName = "db_imi"; 
		private $dbName = "db_imi_pps"; 
		// private $dbName = "db_imi"; 
		private $dbHost = "localhost"; //host
		
		//NO NEED TO CHANGE HERE 
		public static function getInstance() {
			if(!self::$instance instanceof self) 
			{
				self::$instance = new self;
			}
			return self::$instance;
		}

		public function __clone() {
			trigger_error('Clone is not allowed.',E_USER_ERROR);
		}
		
		public function __wakeup() {
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
		}
		
		public function select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit){
			$query = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $array_fields) . " FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};";
			// return $this->query($query);
			return $query;
		}
		
		public function add_quotations($array_values){
			$array_values_r = array();
			for($i=0;$i<count($array_values);$i++){
				// $array_values_r[$i] = "'".$array_values[$i]."'";
				$array_values_r[$i] = "'".$this->real_escape_string($array_values[$i])."'";
			}
		return $array_values_r;
		}
	
		public function insert_query_id($table,$array_fields,$array_values){
			$new_values = $this->add_quotations($array_values); 
			$query 		= "INSERT INTO {$table} (". implode(", ", $array_fields).") VALUES (". implode(",", $new_values) .");";
			$result = $this->query($query);
			$new_pkid = $this->insert_id;
			return $new_pkid;
		}
		
		public function insert_query_id_test($table,$array_fields,$array_values){
			$new_values = $this->add_quotations($array_values); 
			$query 		= "INSERT INTO {$table} (". implode(", ", $array_fields).") VALUES (". implode(",", $new_values) .");";
			return $query;
		}
		
		public function update_query($table,$array_fields,$array_values,$where_table,$id){
			$update_array =  $this->create_update_param($array_fields,$array_values);
			$query 		  = "UPDATE {$table} SET ". implode(",", $update_array) ."WHERE `{$where_table}` ='{$id}';";
			$this->query($query);
			return "Record has been updated";
		}
		
		public function update_query_test($table,$array_fields,$array_values,$where_table,$id){
			$update_array =  $this->create_update_param($array_fields,$array_values);
			$query 		  = "UPDATE {$table} SET ". implode(",", $update_array) ."WHERE `{$where_table}` ='{$id}';";
			return $query;
		}
		
		public function create_update_param($array_fields,$array_values){
			$array_update = array();
			for($i=0;$i<count($array_fields);$i++){
				$array_update[$i] = "`".$array_fields[$i]."` = "."'".$array_values[$i]."' ";
			}
			return $array_update;
		}
		
		////////////////////////////////////////////////////////////////////////
		/* SELECT */
		public function select_item_list() {  
			$query = ("SELECT * FROM tbl_material_list ORDER BY mat_pkid ASC");
			return $this->query($query);
		}
		
		public function select_item_list_by_id($mat_pkid) {  
			$query = ("SELECT * FROM tbl_material_list WHERE mat_pkid = '$mat_pkid' ");
			return $this->query($query);
		}
		
		public function select_item_list_by_price($mp_pkid) {  
			$query = ("SELECT a.*, b.* FROM tbl_material_list a
						INNER JOIN tbl_material_list_price b on b.mp_fkid_material_list = a.mat_pkid
						WHERE b.mp_pkid = '$mp_pkid' and a.mat_logdel = '0' ORDER BY b.mp_fkid_material_list");
			return $this->query($query);
		}
	
		public function select_item_list_with_price() {  
			$query = ("SELECT a.*, b.* FROM tbl_material_list a
						INNER JOIN tbl_material_list_price b on b.mp_fkid_material_list = a.mat_pkid 
						WHERE (a.mat_logdel = '0') AND b.mp_logdel = '0'
						ORDER BY a.mat_product_desc ASC");
			return $this->query($query);
		}
		
		public function select_item_list_info() {  
			$query = ("SELECT * FROM vw_material_list ORDER BY mat_product_desc ASC");
			return $this->query($query);
		}
		
		public function select_item_list_info_by_id($mp_pkid) {  
			$query = ("SELECT * FROM vw_material_list WHERE mp_pkid  = '$mp_pkid' ");
			return $this->query($query);
		}
		
		public function select_item_list_priceTS_by_id($mp_pkid) {  
			$query = ("SELECT * FROM vw_material_list WHERE mp_pkid  = '$mp_pkid' ORDER BY mat_product_desc ASC ");
			return $this->query($query);
		}
		
		public function select_item_list_pricePPS_by_id($mp_pkid) {  
			$query = ("SELECT * FROM vw_material_list WHERE mp_pkid  = '$mp_pkid' ORDER BY mat_product_desc ASC ");
			return $this->query($query);
		}
		
		public function select_item_list_priceCN_by_id($mp_pkid) {  
			$query = ("SELECT * FROM vw_material_list WHERE mp_pkid  = '$mp_pkid' ORDER BY mat_product_desc ASC ");
			return $this->query($query);
		}
		
		public function select_item_list_priceYF_by_id($mp_pkid) {  
			$query = ("SELECT * FROM vw_material_list WHERE mp_pkid  = '$mp_pkid' ORDER BY mat_product_desc ASC ");
			return $this->query($query);
		}
		
		public function select_item_list_with_price_CN() {  
			$query = ("SELECT *	FROM vw_idm_cn ORDER BY mat_product_desc ASC");
			return $this->query($query);
		}	
		
		public function select_request_info_by_pkid($pkid) {
			$query = ("SELECT * FROM tbl_request WHERE req_pkid = '$pkid' AND req_logdel = '0' ");
			return $this->query($query);
		}

		public function select_item_request($pkid) {
			$query = ("SELECT a.*, b.* FROM tbl_request_item_list a 
						INNER JOIN tbl_material_list b on b.mat_pkid = a.ril_fkid_material_list
						WHERE a.ril_fkid_request ='$pkid' AND a.ril_logdel = '0' AND a.ril_update_id = '1'");
			return $this->query($query);		
		}
		
		public function select_conformed_item_request($pkid) {
			$query = ("SELECT a.ci_date_withdraw, a.ci_fkid_req, a.ci_dept, a.ci_req_material_id, a.ci_req_qty,
						c.mat_product_desc, c.mat_product_specs, c.mat_uom, c.mp_unit_price_dollor, c.mp_exchange_rate, c.mp_unit_price_peso, b.req_prepared_by
						FROM tbl_withdraw_items a 
						INNER JOIN tbl_request b on b.req_pkid = a.ci_fkid_req
						INNER JOIN vw_material_list c on c.mp_pkid = a.ci_req_material_id
						WHERE a.ci_fkid_req ='$pkid' AND a.ci_logdel = '0'");
			return $this->query($query);		
		}
		
		public function select_item_request_based_on_price($pkid) {
			$query = ("SELECT a.*, b.* FROM tbl_request_item_list a 
						INNER JOIN vw_material_list b on b.mp_pkid = a.ril_fkid_material_list
						WHERE a.ril_fkid_request ='$pkid' AND a.ril_logdel = '0' AND a.ril_update_id = '1'");
			return $this->query($query);		
		}
		
		public function select_remarks($pkid) {
			$query = ("SELECT * FROM tbl_request_remarks WHERE rem_fkid_request ='$pkid' AND rem_logdel = '0' ");
			return $this->query($query);		
		}
		
		public function select_ts_central_email_add() {
			$query = ("SELECT email_add FROM tbl_useraccount WHERE restriction = '2' ");
			return $this->query($query);		
		}
		
		public function select_custodian_by_pkid($id) {
			$query = ("SELECT * FROM tbl_useraccount WHERE restriction = '2' AND id = '$id'");
			return $this->query($query);		
		}
		
		public function select_custodian() {
			$query = ("SELECT * FROM tbl_useraccount WHERE restriction = '2' AND logdel = '0'");
			return $this->query($query);		
		}
		
		public function select_employee_info_by_username($username) {
			$query = ("SELECT name AS emp_name, section FROM db_rapid.tbl_useraccounts WHERE username = '$username' ");
			return $this->query($query);		
		}		
		
		public function select_email_add($username) {
			$query = ("SELECT email_add FROM db_rapid.tbl_useraccounts WHERE username = '$username' ");
			return $this->query($query);		
		}

		public function select_email_add_ts_central() {
			$query = ("SELECT email_add FROM db_rapid.tbl_useraccounts WHERE username = 'chetana' ");
			return $this->query($query);		
		}

		
		public function select_requestor_name() {
			$query = ("SELECT DISTINCT(a.req_prepared_by) as username, b.name, a.req_department FROM tbl_request a 
						INNER JOIN db_rapid.tbl_useraccounts b ON b.username = a.req_prepared_by");
			return $this->query($query);		
		}
		
		public function select_requestor_name_ts() {
			$query = ("SELECT DISTINCT(a.req_prepared_by) as username, b.name, a.req_department FROM tbl_request a 
						INNER JOIN db_rapid.tbl_useraccounts b ON b.username = a.req_prepared_by
						WHERE a.req_department = 'TS'");
			return $this->query($query);		
		}
		
		public function select_requestor_name_cn() {
			$query = ("SELECT DISTINCT(a.req_prepared_by) as username, b.name, a.req_department FROM tbl_request a 
						INNER JOIN db_rapid.tbl_useraccounts b ON b.username = a.req_prepared_by
						WHERE a.req_department = 'CN'");
			return $this->query($query);		
		}
		
		public function select_requestor_name_pps() {
			$query = ("SELECT DISTINCT(a.req_prepared_by) as username, b.name, a.req_department FROM tbl_request a 
						INNER JOIN db_rapid.tbl_useraccounts b ON b.username = a.req_prepared_by
						WHERE a.req_department = 'PPS'");
			return $this->query($query);		
		}
		
		public function select_requestor_name_yf() {
			$query = ("SELECT DISTINCT(a.req_prepared_by) as username, b.name, a.req_department FROM tbl_request a 
						INNER JOIN db_rapid.tbl_useraccounts b ON b.username = a.req_prepared_by
						WHERE a.req_department = 'YF'");
			return $this->query($query);		
		}
		
		/* UPDATE */
		public function update_approval_status($status, $pkid, $name){
			$query = "UPDATE tbl_request SET req_status = '{$status}', req_conformer = '{$name}' WHERE req_pkid ='{$pkid}';";
			return $this->query($query);	
		}
		
		public function update_approval_status3($status, $pkid, $req_custodian, $name){
			$query = "UPDATE tbl_request SET req_status = '{$status}', req_custodian = '{$req_custodian}', req_conformer = '{$name}' WHERE req_pkid ='{$pkid}';";
			return $this->query($query);	
		}

		public function update_approval_status4($status, $pkid, $name){
			$query = "UPDATE tbl_request SET req_status = '{$status}', req_custodian = '{$name}' WHERE req_pkid ='{$pkid}';";
			return $this->query($query);	
		}


		// public function update_stock_inventory($req_item_id, $stock_qty){
			// $query = "UPDATE tbl_material_list_price SET mp_stock_qty = '{$stock_qty}' WHERE mp_pkid ='{$req_item_id}';";
		public function update_stock_inventory($req_item_id, $TS_dept_qty, $PPS_dept_qty, $CN_dept_qty, $YF_dept_qty, $stock_qty){
			$query = "UPDATE tbl_material_list_price SET mp_TS = '{$TS_dept_qty}', mp_PPS = '{$PPS_dept_qty}', mp_CN = '{$CN_dept_qty}', mp_YF = '{$YF_dept_qty}', mp_stock_qty = '{$stock_qty}' WHERE mp_pkid ='{$req_item_id}';";
			return $this->query($query);	
		}
		
		// public function update_stock_inventory_script($req_item_id, $stock_qty){
			// $query = "UPDATE tbl_material_list_price SET mp_stock_qty = '{$stock_qty}' WHERE mp_pkid ='{$req_item_id}';";
		public function update_stock_inventory_script($req_item_id, $TS_dept_qty, $PPS_dept_qty, $CN_dept_qty, $YF_dept_qty, $stock_qty){
			$query = "UPDATE tbl_material_list_price SET mp_TS = '{$TS_dept_qty}', mp_PPS = '{$PPS_dept_qty}', mp_CN = '{$CN_dept_qty}', mp_YF = '{$YF_dept_qty}', mp_stock_qty = '{$stock_qty}' WHERE mp_pkid ='{$req_item_id}';";
			return $query;	
		}
		
		/* public function update_mat_new_qty($mp_pkid, $new_stock_qty){
			$query = "UPDATE tbl_material_list_price SET mp_stock_qty = '{$new_stock_qty}' WHERE mp_pkid ='{$mp_pkid}';";
			return $this->query($query);
		} */
		
		public function update_mat_new_qty($mp_pkid, $ts_stock_qty, $pps_stock_qty, $cn_stock_qty, $yf_stock_qty, $new_stock_qty){
			$query = "UPDATE tbl_material_list_price SET mp_TS = '{$ts_stock_qty}', mp_PPS = '{$pps_stock_qty}', mp_CN = '{$cn_stock_qty}', mp_YF = '{$yf_stock_qty}', mp_stock_qty = '{$new_stock_qty}' WHERE mp_pkid ='{$mp_pkid}';";
			return $this->query($query);
		}
		
		/* NEW */
		public function update_TS_stock_inventory($req_item_id, $TS_stock_qty){
			$query = "UPDATE tbl_idm_TS SET idmTS_stock_qty = '{$TS_stock_qty}' WHERE idmTS_pkid ='{$req_item_id}';";
			return $this->query($query);
		}
		
		public function update_TS_stock_inventory_script($req_item_id, $TS_stock_qty){
			$query = "UPDATE tbl_idm_TS SET idmTS_stock_qty = '{$TS_stock_qty}' WHERE idmTS_pkid ='{$req_item_id}';";
			return $query;	
		}
		
		public function update_CN_stock_inventory($req_item_id, $CN_stock_qty){
			$query = "UPDATE tbl_idm_CN SET idmCN_stock_qty = '{$CN_stock_qty}' WHERE idmCN_pkid ='{$req_item_id}';";
			return $this->query($query);
		}
		
		public function update_CN_stock_inventory_script($req_item_id, $CN_stock_qty){
			$query = "UPDATE tbl_idm_CN SET idmCN_stock_qty = '{$CN_stock_qty}' WHERE idmCN_pkid ='{$req_item_id}';";
			return $query;	
		}
		
		public function getUsername($username) { 
			$query = ("SELECT name as emp_name, id as pkid, username  FROM db_rapid.tbl_useraccounts WHERE username = '$username' ");
			// $query = ("SELECT CONCAT(firstname, ' ', lastname) as emp_name, pkid, username FROM `vw_emp_hris` WHERE (empstatus = '1') AND username = '$username' ");
			return $this->query($query);
		}
		
		public function getSuperiorName($username) { 
			$query = ("SELECT * FROM tbl_useraccount WHERE requestor_username = '$username' ");
			return $this->query($query);
		}
		
		//-New
		public function select_pps_prod_item_list_by_id($mp_pkid) {  
			$query = ("SELECT a.*, b.mp_pkid, b.mp_unit_price_dollor FROM tbl_material_list a
				INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid
				WHERE b.mp_pkid = '$mp_pkid' AND a.mat_pps_product  = '1'");
			return $this->query($query);
		}

		public function select_pps_prod_item_list() {  
			$query = ("SELECT a.*, b.mp_pkid, b.mp_unit_price_dollor FROM tbl_material_list a
				INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid
				WHERE a.mat_pps_product  = '1'
				ORDER BY mat_pkid ASC");
			return $this->query($query);
		}
	
		
	}
	
	
?>
