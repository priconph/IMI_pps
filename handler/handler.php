<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	if(is_ajax()) {
		if(isset($_POST["action"]) && !empty($_POST["action"])) {
			$action = $_POST["action"];
			switch($action) {

				// case for ajax actions

				case "select_item_list_by_id"			: select_item_list_by_id(); break;				
				case "select_supv_list_by_username"		: select_supv_list_by_username(); break;
				case "select_custodian_by_pkid"			: select_custodian_by_pkid(); break;
				case "select_detailed_request"			: select_detailed_request(); break;
				case "select_item_list_by_price"		: select_item_list_by_price(); break;
					
				/* settings */
				case "select_mtls_info"					: select_mtls_info(); break;
				case "select_mtls_dtls"					: select_mtls_dtls(); break;
				case "select_mtls_dtls_TS"				: select_mtls_dtls_TS(); break;
				case "select_mtls_dtls_PPS"				: select_mtls_dtls_PPS(); break;
				case "select_mtls_dtls_CN"				: select_mtls_dtls_CN(); break;
				case "select_mtls_dtls_YF"				: select_mtls_dtls_YF(); break;
				
				case "get_request_item_list"			: get_request_item_list(); break;
				case "get_remarks"						: get_remarks(); break;
				case "get_request_conformed_item_list"	: get_request_conformed_item_list(); break;
				case "get_TS_Section"					: get_TS_Section(); break;
				
				case "add_request_info"					: add_request_info(); break;
				case "add_request_item_info"			: add_request_item_info(); break;
				case "add_new_request_item_info"		: add_new_request_item_info(); break;
				case "add_new_material_info"			: add_new_material_info(); break;
				case "add_new_material_price"			: add_new_material_price(); break;
				case "conformed_items_request"			: conformed_items_request(); break;
				
				case "add_mtls_dtls"					: add_mtls_dtls(); break;
				case "add_mtls_dtls_TS"					: add_mtls_dtls_TS(); break;
				case "add_mtls_dtls_PPS"				: add_mtls_dtls_PPS(); break;
				case "add_mtls_dtls_CN"					: add_mtls_dtls_CN(); break;
				case "add_mtls_dtls_YF"					: add_mtls_dtls_YF(); break;
				
				case "add_rcv_TS"						: add_rcv_TS(); break;
				case "add_rcv_PPS"						: add_rcv_PPS(); break;
				case "add_rcv_CN"						: add_rcv_CN(); break;
				case "add_rcv_YF"						: add_rcv_YF(); break;
				
				case "add_transf_TS"					: add_transf_TS(); break;
				case "add_transf_PPS"					: add_transf_PPS(); break;
				case "add_transf_CN"					: add_transf_CN(); break;
				case "add_transf_YF"					: add_transf_YF(); break;
				
				case "display_request"					: display_request(); break;
				case "display_request_for_approval"		: display_request_for_approval(); break;
				case "display_request_for_conformance"	: display_request_for_conformance(); break;
				case "display_conformed_request"		: display_conformed_request(); break;
				case "display_matls_inventory"			: display_matls_inventory(); break;
				
				case "display_mtls_info"				: display_mtls_info(); break;
				case "display_mtls_dtls"				: display_mtls_dtls(); break;
				case "display_mtls_dtls_TS"				: display_mtls_dtls_TS(); break;
				case "display_mtls_dtls_PPS"			: display_mtls_dtls_PPS(); break;
				case "display_mtls_dtls_CN"				: display_mtls_dtls_CN(); break;
				case "display_mtls_dtls_YF"				: display_mtls_dtls_YF(); break;
				case "display_mtls_dtls_overall"		: display_mtls_dtls_overall(); break;
					
				case "display_TS_withdrawal"			: display_TS_withdrawal(); break;
				case "display_CN_withdrawal"			: display_CN_withdrawal(); break;
				case "display_PPS_withdrawal"			: display_PPS_withdrawal(); break;
				case "display_YF_withdrawal"			: display_YF_withdrawal(); break;
								
				case "conformed_request_by_requestor"	: conformed_request_by_requestor(); break;
				case "update_stock_qty"					: update_stock_qty(); break;
				case "update_material_price"			: update_material_price(); break;
				case "update_request"					: update_request(); break;
				case "update_material_info"				: update_material_info(); break;
				
				case "update_material_dtls"				: update_material_dtls(); break;
				case "update_material_dtls_TS"			: update_material_dtls_TS(); break;
				case "update_material_dtls_PPS"			: update_material_dtls_PPS(); break;
				case "update_material_dtls_CN"			: update_material_dtls_CN(); break;
				case "update_material_dtls_YF"			: update_material_dtls_YF(); break;
				
				case "remove_request"					: remove_request(); break;
				case "remove_material"					: remove_material(); break;
				case "remove_item"						: remove_item(); break;
				case "remove_mtls_info"					: remove_mtls_info(); break;
				case "remove_mtls_dtls"					: remove_mtls_dtls(); break;
				case "remove_mtls_dtls_TS"				: remove_mtls_dtls_TS(); break;
				case "remove_mtls_dtls_PPS"				: remove_mtls_dtls_PPS(); break;
				case "remove_mtls_dtls_CN"				: remove_mtls_dtls_CN(); break;
				case "remove_mtls_dtls_YF"				: remove_mtls_dtls_YF(); break;
				
				case "approved_request"					: approved_request(); break;
				case "rejected_request"					: rejected_request(); break;
				case "conformed_request"				: conformed_request(); break;
				case "revision_request_by_tsCentral"	: revision_request_by_tsCentral(); break;
				case "rejected_request_by_tsCentral"	: rejected_request_by_tsCentral(); break;
				case "served_request"					: served_request(); break;
				case "unserved_request"					: unserved_request(); break;
				
				case "send_email_from_requestor"					: send_email_from_requestor(); break;
				case "send_email_update_from_requestor"				: send_email_update_from_requestor(); break;
				case "send_conformed_request_email"					: send_conformed_request_email(); break;
				case "send_revision_request_email_from_conformer"	: send_revision_request_email_from_conformer(); break;
				case "send_rejected_request_email_from_conformer"	: send_rejected_request_email_from_conformer(); break;
				case "send_served_request_email"					: send_served_request_email(); break;
				case "send_unserved_request_email"					: send_unserved_request_email(); break;
				case "send_email_conformed_from_requestor"			: send_email_conformed_from_requestor(); break;
				
				case "check_item_price_id"					: check_item_price_id(); break;
				case "select_item_list_info_by_id"			: select_item_list_info_by_id(); break;
				case "select_item_list_priceTS_by_id"		: select_item_list_priceTS_by_id(); break;
				case "select_item_list_priceCN_by_id"		: select_item_list_priceCN_by_id(); break;
				case "select_item_list_pricePPS_by_id"		: select_item_list_pricePPS_by_id(); break;
				case "select_item_list_priceYF_by_id"		: select_item_list_priceYF_by_id(); break;
				
				case "select_item_list_by_div"				: select_item_list_by_div(); break;
				
				case "view_details_ts"						: view_details_ts(); break;
				case "view_details_pps"						: view_details_pps(); break;
				case "view_details_cn"						: view_details_cn(); break;
				case "view_details_yf"						: view_details_yf(); break;
				
				case "get_trans_dtls_TS"					: get_trans_dtls_TS(); break;
				case "get_trans_dtls_PPS"					: get_trans_dtls_PPS(); break;
				case "get_trans_dtls_CN"					: get_trans_dtls_CN(); break;
				case "get_trans_dtls_YF"					: get_trans_dtls_YF(); break;
				
				/* Recieved for update*/
				case "display_TS_recieved_info"				: display_TS_recieved_info(); break;
				case "view_received_details_ts"				: view_received_details_ts(); break;
				case "update_recieved_info_ts"				: update_recieved_info_ts(); break;
				
				case "display_PPS_recieved_info"			: display_PPS_recieved_info(); break;
				case "view_received_details_pps"			: view_received_details_pps(); break;
				case "update_recieved_info_pps"				: update_recieved_info_pps(); break;
				
				case "display_CN_recieved_info"				: display_CN_recieved_info(); break;
				case "view_received_details_cn"				: view_received_details_cn(); break;
				case "update_recieved_info_cn"				: update_recieved_info_cn(); break;
				
				case "display_YF_recieved_info"				: display_YF_recieved_info(); break;
				case "view_received_details_yf"				: view_received_details_yf(); break;
				case "update_recieved_info_yf"				: update_recieved_info_yf(); break;
				
				/* User Setting */
				case "getRequestor"							: getRequestor(); break;
				case "display_user_setting"					: display_user_setting(); break;
				case "view_edit_user_setting"				: view_edit_user_setting(); break;
				case "add_user_setting"						: add_user_setting(); break;
				case "update_user_setting"					: update_user_setting(); break;
				case "delete_user_setting"					: delete_user_setting(); break;
				
				case "select_requestor"						: select_requestor(); break;
				
				case "select_pps_eoh"						: select_pps_eoh(); break;
				case "get_pps_eoh_sum"						: get_pps_eoh_sum(); break;
				case "add_pps_eoh"							: add_pps_eoh(); break;

				// case "select_pps_prod_item_list_by_id"		: select_pps_prod_item_list_by_id(); break;
				// case "display_pps_inv"						: display_pps_inv(); break;


			}
		}
	}

	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}

	/* Select */
	/* function select_supv_list_by_username(){
		require_once('../oop/hris_oop.php');
		
		$return = $_POST;
		$result = INVS_HRIS::getInstance()->select_supv_list_by_username($return['pkid']);
		
		while($row = mysqli_fetch_array($result)) {
			$return['pkid']	 	 = $row['pkid'];
			$return['username']	 = $row['username'];
			$return['emp_name']	 = $row['emp_name'];
		}
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
	} */
	
	function select_supv_list_by_username(){
		require_once('../oop/hris_oop.php');
		
		$return = $_POST;
		$result = INVS_HRIS::getInstance()->select_supv_list_by_username($return['username']);
		
		while($row = mysqli_fetch_array($result)) {
			$return['pkid']	 	 = $row['pkid'];
			$return['username']	 = $row['username'];
			$return['emp_name']	 = $row['emp_name'];
		}
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function select_custodian_by_pkid(){
		require_once('../oop/oop.php');
		
		$return = $_POST;
		$result = INVS::getInstance()->select_custodian_by_pkid($return['id']);
		
		while($row = mysqli_fetch_array($result)) {
			$return['id']	 		 = $row['id'];
			$return['username']		 = $row['username'];
			$return['emp_name']	 	 = $row['emp_name'];
			$return['restriction']	 = $row['restriction'];
		}
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function select_item_list_by_id(){
		require_once('../oop/oop.php');
		
		$return = $_POST;
		$result = INVS::getInstance()->select_item_list_by_id($return['mat_pkid']);
		
		while($row = mysqli_fetch_array($result)) {
			$return['mat_pkid']	 		 = $row['mat_pkid'];
			$return['mat_product_desc']	 = $row['mat_product_desc'];
			$return['mat_product_specs'] = $row['mat_product_specs'];
			$return['mat_uom'] 			 = $row['mat_uom'];
			$return['mat_pps_product']   = $row['mat_pps_product'];
		}
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}

	function select_item_list_by_price(){
		require_once('../oop/oop.php');
		
		$return = $_POST;
		$result = INVS::getInstance()->select_item_list_by_price($return['mp_pkid']);
		
		while($row = mysqli_fetch_array($result)) {
			$return['mat_pkid']	 		 = $row['mat_pkid'];
			$return['mat_product_desc']	 = $row['mat_product_desc'];
			$return['mat_product_specs'] = $row['mat_product_specs'];
			$return['mat_uom'] 			 = $row['mat_uom'];
			
			$return['mp_pkid'] 					= $row['mp_pkid'];
			$return['mp_fkid_material_list'] 	= $row['mp_fkid_material_list'];
			$return['mp_unit_price_dollor'] 	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'] 		= $row['mp_unit_price_peso'];
		}
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
	} 
	
	function select_item_list_by_div(){
		require_once('../oop/oop.php');
		
		$html_select 	= '';
		$html_select	= '<option value="">--SELECT--</option>';
		$return 		= $_POST;
		// $division 		= $_POST['division'];
		
		// if($division == 'TS') {
			$result = INVS::getInstance()->select_item_list_info();
			
			while($row = mysqli_fetch_array($result)) {
				
				$html_select	.= '<option value="'.$row['mp_pkid'].'">'.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') || '.$row['mp_exchange_rate'].'</option>';
			}
		// } 
		// else if($division == 'CN') {
			// $result = INVS::getInstance()->select_item_list_CN();
			
			// while($row = mysqli_fetch_array($result)) {
				// $html_select	.= '<option value="'.$row['mp_pkid'].'">'.$row['mat_product_desc'].' '.$row['mat_product_specs'].'</option>';
			// }
		// } else if($division == 'PPS') {
			// $result = INVS::getInstance()->select_item_list_PPS();
			
			// while($row = mysqli_fetch_array($result)) {
				// $html_select	.= '<option value="'.$row['mp_pkid'].'">'.$row['mat_product_desc'].' '.$row['mat_product_specs'].'</option>';
			// }
		// } else if($division == 'YF') {
			// $result = INVS::getInstance()->select_item_list_YF();
			
			// while($row = mysqli_fetch_array($result)) {
				// $html_select	.= '<option value="'.$row['mp_pkid'].'">'.$row['mat_product_desc'].' '.$row['mat_product_specs'].'</option>';
			// }
		// }
		
		$return['html_select'] = $html_select;
		echo json_encode($return);
	}
	
	function select_item_list_info_by_id(){
		require_once('../oop/oop.php');
		
		$return = $_POST;
		$result = INVS::getInstance()->select_item_list_info_by_id($return['mp_pkid']);
		
		while($row = mysqli_fetch_array($result)) {
			$return['mp_pkid']	 			 = $row['mp_pkid'];
			$return['mat_product_desc']		 = $row['mat_product_desc'];
			$return['mat_product_specs']	 = $row['mat_product_specs'];
			$return['mat_uom']	 			 = $row['mat_uom'];
			$return['mp_unit_price_dollor']	 = $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate']		 = $row['mp_exchange_rate'];
			$return['mp_unit_price_peso']	 = $row['mp_unit_price_peso'];

		}
				
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function select_item_list_priceTS_by_id(){
		require_once('../oop/oop.php');
		
		$return = $_POST;
		$result = INVS::getInstance()->select_item_list_priceTS_by_id($return['mp_pkid']);
		
		while($row = mysqli_fetch_array($result)) {
			$return['mp_pkid']	 			 = $row['mp_pkid'];
			$return['mat_product_desc']		 = $row['mat_product_desc'];
			$return['mat_product_specs']	 = $row['mat_product_specs'];
			$return['mat_uom']	 			 = $row['mat_uom'];
			$return['mp_unit_price_dollor']	 = $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate']		 = $row['mp_exchange_rate'];
			$return['mp_unit_price_peso']	 = $row['mp_unit_price_peso'];
			$return['mp_unit_price_peso']	 = $row['mp_unit_price_peso'];
			$return['ts_current_stock'] 		 = get_current_stock_TS($row['mp_pkid']);
			$return['pps_current_stock'] 		 = get_current_stock_PPS($row['mp_pkid']);
			$return['cn_current_stock'] 		 = get_current_stock_CN($row['mp_pkid']);
			$return['yf_current_stock'] 		 = get_current_stock_YF($row['mp_pkid']);

			$ttl_current_stock_ts			= ( $return['ts_current_stock'] + $return['pps_current_stock'] + $return['cn_current_stock'] + $return['yf_current_stock'] );
			$return['ttl_current_stock_ts'] =  $ttl_current_stock_ts; 

		}
				
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function select_item_list_pricePPS_by_id(){
		require_once('../oop/oop.php');
		
		$return = $_POST;
		$result = INVS::getInstance()->select_item_list_pricePPS_by_id($return['mp_pkid']);
		
		while($row = mysqli_fetch_array($result)) {
			$return['mp_pkid']	 			 = $row['mp_pkid'];
			$return['mat_product_desc']		 = $row['mat_product_desc'];
			$return['mat_product_specs']	 = $row['mat_product_specs'];
			$return['mat_uom']	 			 = $row['mat_uom'];
			$return['mp_unit_price_dollor']	 = $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate']		 = $row['mp_exchange_rate'];
			$return['mp_unit_price_peso']	 = $row['mp_unit_price_peso'];
			$return['mp_unit_price_peso']	 = $row['mp_unit_price_peso'];
			// $return['ts_current_stock'] 		 = get_current_stock_TS($row['mp_pkid']);
			$return['pps_current_stock'] 		 = get_current_stock_PPS($row['mp_pkid']);
			// $return['cn_current_stock'] 		 = get_current_stock_CN($row['mp_pkid']);
			// $return['yf_current_stock'] 		 = get_current_stock_YF($row['mp_pkid']);

			// $ttl_current_stock_pps			 = ( $return['ts_current_stock'] + $return['pps_current_stock'] + $return['cn_current_stock'] + $return['yf_current_stock'] );
			$return['ttl_current_stock_pps'] =  $return['pps_current_stock']; 

		}
				
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function select_item_list_priceCN_by_id(){
		require_once('../oop/oop.php');
		
		$return = $_POST;
		$result = INVS::getInstance()->select_item_list_priceCN_by_id($return['mp_pkid']);
		
		while($row = mysqli_fetch_array($result)) {
			$return['mp_pkid']	 			 = $row['mp_pkid'];
			$return['mat_product_desc']		 = $row['mat_product_desc'];
			$return['mat_product_specs']	 = $row['mat_product_specs'];
			$return['mat_uom']	 			 = $row['mat_uom'];
			$return['mp_unit_price_dollor']	 = $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate']		 = $row['mp_exchange_rate'];
			$return['mp_unit_price_peso']	 = $row['mp_unit_price_peso'];
			$return['mp_unit_price_peso']	 = $row['mp_unit_price_peso'];
			$return['ts_current_stock'] 		 = get_current_stock_TS($row['mp_pkid']);
			$return['pps_current_stock'] 		 = get_current_stock_PPS($row['mp_pkid']);
			$return['cn_current_stock'] 		 = get_current_stock_CN($row['mp_pkid']);
			$return['yf_current_stock'] 		 = get_current_stock_YF($row['mp_pkid']);

			$ttl_current_stock_cn			= ( $return['ts_current_stock'] + $return['pps_current_stock'] + $return['cn_current_stock'] + $return['yf_current_stock'] );
			$return['ttl_current_stock_cn'] =  $ttl_current_stock_cn; 

		}
				
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function select_item_list_priceYF_by_id(){
		require_once('../oop/oop.php');
		
		$return = $_POST;
		$result = INVS::getInstance()->select_item_list_priceYF_by_id($return['mp_pkid']);
		
		while($row = mysqli_fetch_array($result)) {
			$return['mp_pkid']	 			 = $row['mp_pkid'];
			$return['mat_product_desc']		 = $row['mat_product_desc'];
			$return['mat_product_specs']	 = $row['mat_product_specs'];
			$return['mat_uom']	 			 = $row['mat_uom'];
			$return['mp_unit_price_dollor']	 = $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate']		 = $row['mp_exchange_rate'];
			$return['mp_unit_price_peso']	 = $row['mp_unit_price_peso'];
			$return['mp_unit_price_peso']	 = $row['mp_unit_price_peso'];
			$return['ts_current_stock'] 		 = get_current_stock_TS($row['mp_pkid']);
			$return['pps_current_stock'] 		 = get_current_stock_PPS($row['mp_pkid']);
			$return['cn_current_stock'] 		 = get_current_stock_CN($row['mp_pkid']);
			$return['yf_current_stock'] 		 = get_current_stock_YF($row['mp_pkid']);

			$ttl_current_stock_yf			= ( $return['ts_current_stock'] + $return['pps_current_stock'] + $return['cn_current_stock'] + $return['yf_current_stock'] );
			$return['ttl_current_stock_yf'] =  $ttl_current_stock_yf; 

		}
				
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function check_item_price_id(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('*');
		$table 	   		= 'vw_idm_ts';
		$joins 	   		= '';
		$sql_where		= "WHERE mp_pkid = '".$return['mp_pkid']."' ";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mat_pkid'][$ctr] 				= $row['mat_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_pkid '][$ctr] 				= $row['mp_pkid '];
			$return['mp_unit_price_dollor'][$ctr] 	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			$return['idmTS_stock_qty'][$ctr] 		= $row['idmTS_stock_qty'];

			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']	= $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);

	}	
	
	function select_item_list_by_priceCN(){

		require_once('../oop/oop.php');

		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'vw_idm_cn';
		$joins 	   		= '';
		$sql_where		= "WHERE mp_pkid = '".$return['mp_pkid']."'";
		$sql_order 		= '';
		$sql_limit 		= 'LIMIT 0, 10';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;
		
		$mat_product_specs 		= array();
		$mat_uom 				= array();
		$mp_unit_price_dollor 	= array();
		$mp_exchange_rate 		= array();
		$mp_unit_price_peso 	= array();
		$idmTS_stock_qty 		= array();
		
		while($row = mysqli_fetch_array($result)){
		
			if(!in_array($row['mat_product_specs'],$mat_product_specs)){
				$mat_product_specs[] = $row['mat_product_specs'];
			}	
			
			if(!in_array($row['mat_uom'],$mat_uom)){
				$mat_uom[] = $row['mat_uom'];
			}	
			
			if(!in_array($row['mp_unit_price_dollor'],$mp_unit_price_dollor)){
				$mp_unit_price_dollor[] = $row['mp_unit_price_dollor'];
			}	
			
			if(!in_array($row['mp_exchange_rate'],$mp_exchange_rate)){
				$mp_exchange_rate[] = $row['mp_exchange_rate'];
			}	
			
			if(!in_array($row['mp_unit_price_peso'],$mp_unit_price_peso)){
				$mp_unit_price_peso[] = $row['mp_unit_price_peso'];
			}	
			
			if(!in_array($row['idmCN_stock_qty'],$idmCN_stock_qty)){
				$idmCN_stock_qty[] = $row['idmCN_stock_qty'];
			}	
			
			$return['mat_pkid'][$ctr] 				= $row['mat_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mp_unit_price_dollor'][$ctr] 	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			
			$return['idmCN_stock_qty'][$ctr] 		= $row['idmCN_stock_qty'];

			$ctr++;
		}
		
		$return['mat_product_specs'] 		= $mat_product_specs;
		$return['mat_uom'] 					= $mat_uom;
		$return['mp_unit_price_dollor'] 	= $mp_unit_price_dollor;
		$return['mp_exchange_rate'] 		= $mp_exchange_rate;
		$return['mp_unit_price_peso'] 		= $mp_unit_price_peso;
		$return['idmCN_stock_qty'] 			= $idmCN_stock_qty;
		
		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
	}

	// select_detailed_request();
	function select_detailed_request(){
		require_once('../oop/oop.php');
		$result 		= '';
		$return 		= $_POST;
		// $array_fields 	= array('a.*, b.name AS requestor_name, c.rem_approved_remarks');
		$array_fields 	= array('a.*, b.name AS requestor_name');
		$table 	   		= 'tbl_request a';
		$joins 	   		= 'INNER JOIN db_rapid.tbl_useraccounts b ON b.username = a.req_prepared_by';
							// LEFT JOIN tbl_request_remarks c ON c.rem_fkid_request = a.req_pkid';
		// $sql_where		= "WHERE a.req_pkid = '".$return['id']."' AND a.req_logdel = '0' AND (c.rem_approver = 'chetana' OR c.rem_approver = 'cbsatosa' OR c.rem_approver IS NULL)";
		// $sql_where		= "WHERE a.req_pkid = '".$return['id']."' AND a.req_logdel = '0' AND c.rem_logdel = '0' AND (c.rem_approver = 'elosaul' OR c.rem_approver IS NULL)";
		$sql_where		= "WHERE a.req_pkid = '".$return['id']."' AND a.req_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			$return['req_pkid'][$ctr] 				= $row['req_pkid'];
			$return['req_status'][$ctr] 			= $row['req_status'];
			$return['req_date'][$ctr] 				= $row['req_date'];
			$return['req_prepared_by'][$ctr] 		= $row['req_prepared_by'];
			$return['req_department'][$ctr] 		= $row['req_department'];
			$return['req_section'][$ctr] 			= $row['req_section'];
			$return['req_TS_product'][$ctr] 		= $row['req_TS_product'];
			$return['requestor_name'][$ctr] 		= $row['requestor_name'];
			$return['req_item_category'][$ctr] 		= $row['req_item_category'];
			$return['req_justification'][$ctr] 		= $row['req_justification'];
			// $return['rem_approved_remarks'][$ctr] 	= $row['rem_approved_remarks'];

			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
		// echo $test_result;

	}	
	
	function get_request_item_list(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('a.req_status, b.*, c.*');
		$table 	   		= 'tbl_request a 
							INNER JOIN tbl_request_item_list b on b.ril_fkid_request = a.req_pkid
							INNER JOIN tbl_material_list c on c.mat_pkid = b.ril_fkid_material_list';
		$joins 	   		= '';
		$sql_where		= "WHERE b.ril_fkid_request = '".$return['id']."' AND b.ril_logdel = '0' AND b.ril_update_id = '1' ";
		$sql_order 		= 'ORDER BY b.ril_fkid_material_list ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['req_status'][$ctr] 		= $row['req_status'];
			$return['ril_pkid'][$ctr] 			= $row['ril_pkid'];
			$return['ril_fkid_request'][$ctr] 	= $row['ril_fkid_request'];
			$return['ril_fkid_material_list'][$ctr] 	= $row['ril_fkid_material_list'];
			$return['mat_product_desc'][$ctr] 	= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 	= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 			= $row['mat_uom'];
			$return['ril_request_qty'][$ctr] 	= $row['ril_request_qty'];
			$return['ril_remarks'][$ctr] 		= $row['ril_remarks'];

			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']	= $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
		// echo $test_result;

	}	
	
	function get_request_conformed_item_list(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('a.*, b.*');
		$table 	   		= 'tbl_withdraw_items a';
		$joins 	   		= 'INNER JOIN vw_material_list b on b.mp_pkid = a.ci_req_material_id';
		$sql_where		= "WHERE a.ci_fkid_req = '".$return['id']."' AND a.ci_logdel = '0'";
		$sql_order 		= 'ORDER BY a.ci_req_material_id ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['ci_pkid'][$ctr] 				= $row['ci_pkid'];
			$return['ci_fkid_req'][$ctr] 			= $row['ci_fkid_req'];
			$return['ci_req_material_id'][$ctr] 	= $row['ci_req_material_id'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			$return['ci_req_qty'][$ctr] 			= $row['ci_req_qty'];
			$return['ci_remarks'][$ctr] 			= $row['ci_remarks'];

			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']	= $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
		// echo $test_result;

	}	
	
	function get_conformed_items(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('*');
		$table 	   		= 'tbl_withdraw_items';
		$joins 	   		= '';
		$sql_where		= "WHERE ci_fkid_req = '".$return['id']."' AND ci_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['ci_fkid_req'][$ctr] 		= $row['ci_fkid_req'];
			$return['ci_item_price_id'][$ctr] 	= $row['ci_item_price_id'];
			$return['ci_req_item_desc'][$ctr] 	= $row['ci_req_item_desc'];
			$return['ci_req_item_specs'][$ctr] 	= $row['ci_req_item_specs'];
			$return['ci_req_uom'][$ctr] 		= $row['ci_req_uom'];
			$return['ci_req_qty'][$ctr] 		= $row['ci_req_qty'];
			$return['ril_qty'][$ctr] 			= $row['ril_qty'];
			$return['ril_remarks'][$ctr] 		= $row['ril_remarks'];

			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']	= $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
		// echo $test_result;

	}	
	
	function get_remarks(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('a.*, b.name AS approver_name');
		$table 	   		= 'tbl_request_remarks a';
		$joins 	   		= 'INNER JOIN db_rapid.tbl_useraccounts b on b.username = a.rem_approver';
		$sql_where		= "WHERE a.rem_fkid_request = '".$return['id']."' AND a.rem_logdel = '0'";
		$sql_order 		= 'ORDER BY a.rem_pkid ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['rem_fkid_request'][$ctr] 			= $row['rem_fkid_request'];
			$return['rem_approver'][$ctr] 				= $row['rem_approver'];
			$return['approver_name'][$ctr] 				= $row['approver_name'];
			$return['rem_approved_remarks'][$ctr] 		= $row['rem_approved_remarks'];
			$return['rem_reject_remarks'][$ctr] 		= $row['rem_reject_remarks'];
			$return['rem_other_remarks'][$ctr] 			= $row['rem_other_remarks'];
			$return['rem_lastupdate'][$ctr] 			= $row['rem_lastupdate'];

			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']	= $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
		// echo $test_result;

	}	

	function get_TS_Section(){

		require_once('../oop/hris_oop.php');

		$return 		= $_POST;
		$pattern 		= $_POST['pattern'];
		// $pattern 		= 'Burn-in Sockets';
		
		$result 		= '';
		$array_fields 	= array('a.division, b.department, c.section');
		$table 	   		= 'tbl_Division a ';
		$joins 	   		= 'INNER JOIN tbl_Department b on b.fkDivision = a.pkid
							INNER JOIN tbl_Section c on c.fkDepartment = b.pkid';
		$sql_where 		= 'WHERE a.division = "TS" AND (c.section = "burn-in sockets" OR c.section = "test sockets") AND c.section LIKE "%'.$pattern.'%" ';
		$sql_order 		= 'GROUP BY c.section ASC';
		$sql_limit 		= '';
		$result 		= INVS_HRIS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$result1 		= INVS_HRIS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			$return['division'][$ctr] 		= $row['division'];
			$return['department'][$ctr] 	= $row['department'];
			$return['section'][$ctr] 		= $row['section'];
			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		$return['result1'] = $result1;
		echo json_encode($return);

	}

	function select_mtls_info(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('*');
		$table 	   		= 'tbl_material_list';
		$joins 	   		= '';
		$sql_where		= "WHERE mat_pkid = '".$return['id']."' AND mat_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mat_pkid'][$ctr] 				= $row['mat_pkid'];
			$return['mat_date_encode'][$ctr] 		= $row['mat_date_encode'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			$return['mat_pps_product'][$ctr] 		= $row['mat_pps_product'];
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);

	}	
	
	function select_mtls_dtls(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('a.*, b.*');
		$table 	   		= 'tbl_material_list a';
		$joins 	   		= 'INNER JOIN tbl_material_list_price b on b.mp_fkid_material_list = a.mat_pkid';
		$sql_where		= "WHERE b.mp_pkid = '".$return['id']."' AND b.mp_logdel = '0' AND a.mat_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mat_pkid'][$ctr] 				= $row['mat_pkid'];
			$return['mat_date_encode'][$ctr] 		= $row['mat_date_encode'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			$return['mat_pps_product'][$ctr] 		= $row['mat_pps_product'];
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mp_date_encode'][$ctr] 		= $row['mp_date_encode'];
			$return['mp_fkid_material_list'][$ctr] 	= $row['mp_fkid_material_list'];
			$return['mp_unit_price_dollor'][$ctr] 	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			
			$return['ts_current_stock'] 		 = get_current_stock_TS($row['mp_pkid']);
			$return['pps_current_stock'] 		 = get_current_stock_PPS($row['mp_pkid']);
			$return['cn_current_stock'] 		 = get_current_stock_CN($row['mp_pkid']);
			$return['yf_current_stock'] 		 = get_current_stock_YF($row['mp_pkid']);

			$ttl_current_stocks				= ( $return['ts_current_stock'] + $return['pps_current_stock'] + $return['cn_current_stock'] + $return['yf_current_stock'] );
			$return['ttl_current_stocks']	=  $ttl_current_stocks; 

			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);

	}	

	//-New
	function select_pps_eoh(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('a.*, b.*');
		$table 	   		= 'tbl_material_list a';
		$joins 	   		= 'INNER JOIN tbl_material_list_price b on b.mp_fkid_material_list = a.mat_pkid';
		$sql_where		= "WHERE b.mp_pkid = '".$return['id']."' AND b.mp_logdel = '0' AND a.mat_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mat_pkid'][$ctr] 				= $row['mat_pkid'];
			$return['mat_date_encode'][$ctr] 		= $row['mat_date_encode'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			$return['mat_pps_product'][$ctr] 		= $row['mat_pps_product'];
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mp_date_encode'][$ctr] 		= $row['mp_date_encode'];
			$return['mp_fkid_material_list'][$ctr] 	= $row['mp_fkid_material_list'];
			$return['mp_unit_price_dollor'][$ctr] 	= $row['mp_unit_price_dollor'];

			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);

	}	

	function get_pps_eoh_sum(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('a.*, b.ppi_date, b.ppi_eoh');
		$table 	   		= 'tbl_material_list_price a';
		$joins 	   		= 'INNER JOIN tbl_pps_product_inventory b on b.ppi_fkid_mlp  = a.mp_pkid';
		$sql_where		= "WHERE a.mp_pkid = '".$return['id']."' AND a.mp_logdel = '0'";
		$sql_order 		= 'ORDER BY b.ppi_date DESC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
					
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mp_date_encode'][$ctr] 		= $row['mp_date_encode'];
			$return['mp_fkid_material_list'][$ctr] 	= $row['mp_fkid_material_list'];
			$return['mp_unit_price_dollor'][$ctr] 	= $row['mp_unit_price_dollor'];
			
			$return['ppi_date'][$ctr] 	= $row['ppi_date'];
			$return['ppi_eoh'][$ctr] 	= $row['ppi_eoh'];

			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);

	}	

	function select_mtls_dtls_TS(){

		require_once('../oop/oop.php');

		$result 		= '';
		$array_fields 	= array('a.mat_pkid, a.mat_product_desc, a.mat_product_specs, a.mat_uom, b.mp_unit_price_dollor, b.mp_exchange_rate, b.mp_unit_price_peso, c.idmTS_pkid, c.idmTS_date_encode, c.idmTS_stock_qty');
		$table 	   		= 'tbl_material_list a';
		$joins 	   		= 'INNER JOIN tbl_material_list_price b on b.mp_fkid_material_list = a.mat_pkid
							INNER JOIN tbl_idm_TS c on c.idmTS_fkid_material_list_price = b.mp_pkid';
		$sql_where 		= "WHERE c.idmTS_pkid = '".$_POST['id']."' AND a.mat_logdel = '0' AND b.mp_logdel = '0' ";
		$sql_order 		= 'ORDER BY c.idmTS_pkid ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mat_pkid'][$ctr] 				= $row['mat_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_unit_price_dollor'][$ctr] 	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			
			$return['idmTS_pkid'][$ctr] 			= $row['idmTS_pkid'];
			$return['idmTS_date_encode'][$ctr] 		= $row['idmTS_date_encode'];
			$return['idmTS_stock_qty'][$ctr] 		= $row['idmTS_stock_qty'];

			
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);

	}		
	
	function select_mtls_dtls_PPS(){

		require_once('../oop/oop.php');

		$result 		= '';
		$array_fields 	= array('a.mat_pkid, a.mat_product_desc, a.mat_product_specs, a.mat_uom, b.mp_unit_price_dollor, b.mp_exchange_rate, b.mp_unit_price_peso, c.idmPPS_pkid, c.idmPPS_date_encode, c.idmPPS_stock_qty');
		$table 	   		= 'tbl_material_list a';
		$joins 	   		= 'INNER JOIN tbl_material_list_price b on b.mp_fkid_material_list = a.mat_pkid
							INNER JOIN tbl_idm_PPS c on c.idmPPS_fkid_material_list_price = b.mp_pkid';
		$sql_where 		= "WHERE c.idmPPS_pkid = '".$_POST['id']."' AND a.mat_logdel = '0' AND b.mp_logdel = '0' ";
		$sql_order 		= 'ORDER BY c.idmPPS_pkid ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mat_pkid'][$ctr] 				= $row['mat_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_unit_price_dollor'][$ctr] 	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			
			$return['idmPPS_pkid'][$ctr] 				= $row['idmPPS_pkid'];
			$return['idmPPS_date_encode'][$ctr] 		= $row['idmPPS_date_encode'];
			$return['idmPPS_stock_qty'][$ctr] 			= $row['idmPPS_stock_qty'];

			
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);

	}	
	
	function select_mtls_dtls_CN(){

		require_once('../oop/oop.php');

		$result 		= '';
		$array_fields 	= array('a.mat_pkid, a.mat_product_desc, a.mat_product_specs, a.mat_uom, b.mp_unit_price_dollor, b.mp_exchange_rate, b.mp_unit_price_peso, c.idmCN_pkid, c.idmCN_date_encode, c.idmCN_stock_qty');
		$table 	   		= 'tbl_material_list a';
		$joins 	   		= 'INNER JOIN tbl_material_list_price b on b.mp_fkid_material_list = a.mat_pkid
							INNER JOIN tbl_idm_CN c on c.idmCN_fkid_material_list_price = b.mp_pkid';
		$sql_where 		= "WHERE c.idmCN_pkid = '".$_POST['id']."' AND a.mat_logdel = '0' AND b.mp_logdel = '0' ";
		$sql_order 		= 'ORDER BY c.idmCN_pkid ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mat_pkid'][$ctr] 				= $row['mat_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_unit_price_dollor'][$ctr] 	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			
			$return['idmCN_pkid'][$ctr] 			= $row['idmCN_pkid'];
			$return['idmCN_date_encode'][$ctr] 		= $row['idmCN_date_encode'];
			$return['idmCN_stock_qty'][$ctr] 		= $row['idmCN_stock_qty'];

			
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);

	}
	
	function select_mtls_dtls_YF(){

		require_once('../oop/oop.php');

		$result 		= '';
		$array_fields 	= array('a.mat_pkid, a.mat_product_desc, a.mat_product_specs, a.mat_uom, b.mp_unit_price_dollor, b.mp_exchange_rate, b.mp_unit_price_peso, c.idmYF_pkid, c.idmYF_date_encode, c.idmYF_stock_qty');
		$table 	   		= 'tbl_material_list a';
		$joins 	   		= 'INNER JOIN tbl_material_list_price b on b.mp_fkid_material_list = a.mat_pkid
							INNER JOIN tbl_idm_YF c on c.idmYF_fkid_material_list_price = b.mp_pkid';
		$sql_where 		= "WHERE c.idmYF_pkid = '".$_POST['id']."' AND a.mat_logdel = '0' AND b.mp_logdel = '0' ";
		$sql_order 		= 'ORDER BY c.idmYF_pkid ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mat_pkid'][$ctr] 				= $row['mat_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_unit_price_dollor'][$ctr] 	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			
			$return['idmYF_pkid'][$ctr] 			= $row['idmYF_pkid'];
			$return['idmYF_date_encode'][$ctr] 		= $row['idmYF_date_encode'];
			$return['idmYF_stock_qty'][$ctr] 		= $row['idmYF_stock_qty'];

			
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);

	}
	
	function view_details_ts(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('*');
		$table 	   		= 'vw_material_list';
		$joins 	   		= '';
		$sql_where		= "WHERE mp_pkid = '".$return['id']."' ";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mp_pkid'][$ctr] 					= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 			= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 			= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 					= $row['mat_uom'];
			$return['mp_unit_price_dollor'][$ctr] 		= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 			= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 		= $row['mp_unit_price_peso'];
			// current stock
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
	}	
	
	function view_details_pps(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('*');
		$table 	   		= 'vw_material_list';
		$joins 	   		= '';
		$sql_where		= "WHERE mp_pkid = '".$return['id']."' ";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mp_pkid'][$ctr] 					= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 			= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 			= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 					= $row['mat_uom'];
			$return['mp_unit_price_dollor'][$ctr] 		= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 			= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 		= $row['mp_unit_price_peso'];
			// current stock
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
	}	
	
	function view_details_cn(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('*');
		$table 	   		= 'vw_material_list';
		$joins 	   		= '';
		$sql_where		= "WHERE mp_pkid = '".$return['id']."' ";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mp_pkid'][$ctr] 					= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 			= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 			= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 					= $row['mat_uom'];
			$return['mp_unit_price_dollor'][$ctr] 		= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 			= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 		= $row['mp_unit_price_peso'];
			// current stock
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
	}	
		
	function view_details_yf(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('*');
		$table 	   		= 'vw_material_list';
		$joins 	   		= '';
		$sql_where		= "WHERE mp_pkid = '".$return['id']."' ";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mp_pkid'][$ctr] 					= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 			= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 			= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 					= $row['mat_uom'];
			$return['mp_unit_price_dollor'][$ctr] 		= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 			= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 		= $row['mp_unit_price_peso'];
			// current stock
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
	}	
	
	/* Add */
	function add_request_info(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_request';
		//- 1/10/2020
		// $array_fields 	= array('req_status, req_date, req_prepared_by, req_department, req_section, req_TS_product, req_conformer, 	req_supv, req_item_category, req_justification');

		$array_fields 	= array('req_status, req_date, req_prepared_by, req_department, req_section, req_TS_product, req_supv, req_item_category, req_justification');
		$array_values 	= array($return['name_hidden_req_status'], 
								$return['name_req_date'], 
								$return['name_hidden_req_preparedby'], 
								$return['name_req_dept'], 
								$return['name_req_section'], 
								$return['name_req_ts_product'], 
								// $return['name_hidden_central'], 
								$return['name_hidden_supv'], 
								// $return['name_hidden_req_immediate_superior'], 
								$return['name_req_item_cat'], 
								$return['name_req_justi']); 
		
		// $result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		// $immediate_superior		= $return['name_hidden_req_immediate_superior'];
		
		$Dept			= $return['name_req_dept'];
		$Section		= $return['name_req_section'];
	
		if( $Dept == '0') {
			$return['msg']	= 'no Dept';
			
		} 
		// else if( $Section == '') {
			// $return['msg1']	= 'no Section';
			
		// } else if( $Section == '') {
			// $return['msg1']	= 'no Section';
			
		// } 
		else {
			$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		}


		/* Get ID */
		require_once('../oop/oop.php');
		
		$result 		= '';
		$array_fields 	= array('req_pkid');
		$table 	   		= 'tbl_request';
		$joins 	   		= '';
		$sql_where 		= ''; 
		$sql_order 		= 'ORDER BY req_pkid DESC';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['req_pkid'] 	= $row['req_pkid']; 
		
		} 
				
		$return['script'] = $script;
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function add_request_item_info(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_request_item_list';
		$array_fields 	= array('ril_fkid_request, ril_fkid_material_list, ril_request_qty, ril_remarks, ril_update_id');
		$array_values 	= array($return['fkid_request'], 
								$return['item_num'], 
								$return['qty'], 
								$return['remarks'], 
								$return['id']);
		
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		

		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function add_new_request_item_info(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_request_item_list';
		$array_fields 	= array('ril_fkid_request, ril_fkid_material_list, ril_request_qty, ril_remarks, ril_update_id');
		$array_values 	= array($return['fkid_request'], 
								$return['item_num'], 
								$return['qty'], 
								$return['remarks'],
								$return['id']);
		
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		

		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function add_new_material_info(){
	
		require_once('../oop/oop.php');

		$pps_inv_opt 		= $_POST['pps_inv'];

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_material_list';
		$array_fields 	= array('mat_date_encode, mat_product_desc, mat_product_specs, mat_uom, mat_pps_product, mat_encoded_by');
		$array_values 	= array($return['name_mtls_info_date'], 
								$return['name_mtls_info_prod_desc'], 
								$return['name_mtls_info_specs'], 
								$return['name_mtls_info_uom'],
								$pps_inv_opt,
								$return['name_mtls_info_encoded_by']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		

		/* Get ID */
		require_once('../oop/oop.php');
		
		$result 		= '';
		$array_fields 	= array('mat_pkid');
		$table 	   		= 'tbl_material_list';
		$joins 	   		= '';
		$sql_where 		= ''; 
		$sql_order 		= 'ORDER BY mat_pkid DESC';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['mat_pkid'] 	= $row['mat_pkid']; 
		} 
	
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function add_new_material_price(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_material_list_price';
		$array_fields 	= array('mp_date_encode, mp_fkid_material_list, mp_unit_price_dollor, mp_exchange_rate, mp_unit_price_peso, mp_TS, mp_PPS, mp_CN, mp_YF, mp_stock_qty, mp_encoded_by');
		$array_values 	= array($return['name_mp_date'],
								$return['name_mp_pkid'],
								$return['name_mp_unit_dollor'], 
								$return['name_mp_exchange_rate'],
								$return['name_mp_unit_peso'],
								$return['name_ts_mp_stock_qty'],
								$return['name_pps_mp_stock_qty'],
								$return['name_cn_mp_stock_qty'],
								$return['name_yf_mp_stock_qty'],
								$return['name_mp_stock_qty'],
								$return['name_mp_encoded_by']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		
		/* Get ID */
		// require_once('../oop/oop.php');
		
		// $result 		= '';
		// $array_fields 	= array('mp_pkid');
		// $table 	   		= 'tbl_material_list_price';
		// $joins 	   		= '';
		// $sql_where 		= ''; 
		// $sql_order 		= 'ORDER BY mp_pkid DESC';
		// $sql_limit 		= 'LIMIT 0,1';
		// $result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		// $script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		// if (!$result) {
			// echo mysql_error();
		// }
		
		// while($row = mysqli_fetch_array($result)){
			
			// $return['mp_pkid'] 		= $row['mp_pkid']; 
			// $mp_pkid				= $row['mp_pkid']; 
		// } 
		
		// $result			= '';
		// $table			= 'tbl_material_list_by_dept';
		// $array_fields 	= array('mlbd_fkid_mat_price, mlbd_department');
		// $array_values 	= array($mp_pkid, $return['name_mp_dept']);
								
		// $result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);	
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function conformed_items_request(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_withdraw_items';
		$array_fields 	= array('ci_date_withdraw, ci_fkid_req, ci_dept, ci_req_material_id, ci_req_qty, ci_transaction_type, ci_transaction_dept, ci_remarks');
		$array_values 	= array( date("Y-m-d"), 
		// $array_values 	= array( '2018-08-20', 
								$return['fkid_request'], 
								$return['dept'], 
								$return['item_num'], 
								$return['req_qty'],
								2, //transaction type 1-transfer 2-withdraw
								$return['charge_dept'],
								$return['remarks']);
								
		$fkid_request 	= $return['fkid_request'];
		
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		$test_result 	= INVS::getInstance()->insert_query_id_test($table,$array_fields,$array_values);		
		
		$return['fkid_request'] 	= $fkid_request;
		$dept 						= $return['charge_dept'];
		
		if ( $dept == 'TS'){
			
			/* Insert to another table */
			$table			= 'tbl_TS_transaction';
			$array_fields 	= array('trans_ts_date_transaction,
									trans_ts_fkid_request, 
									trans_ts_fkid_material, 
									 `trans_ts_in`, 
									 `trans_ts_out`,
									 `trans_ts_type`');
			$array_values 	= array(date("Y-m-d"), 
			// $array_values 	= array('2018-08-20', 
									$return['fkid_request'],
									$return['item_num'],
									0,
									$return['req_qty'],
									2); //transaction type 1-transfer 2-withdraw
									
			$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		
		
		} else if ( $dept == 'PPS'){
			
			/* Insert to another table */
			$table			= 'tbl_PPS_transaction';
			$array_fields 	= array('trans_pps_date_transaction,
									trans_pps_fkid_request, 
									trans_pps_fkid_material, 
									 `trans_pps_in`, 
									 `trans_pps_out`,
									 `trans_pps_type`');
			$array_values 	= array(date("Y-m-d"), 
			// $array_values 	= array('2018-08-20', 
									$return['fkid_request'],
									$return['item_num'],
									0,
									$return['req_qty'],
									2); //transaction type 1-transfer 2-withdraw
									
			$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		
		
		} else if ( $dept == 'CN'){
			
			/* Insert to another table */
			$table			= 'tbl_CN_transaction';
			$array_fields 	= array('trans_cn_date_transaction,
									trans_cn_fkid_request, 
									trans_cn_fkid_material, 
									 `trans_cn_in`, 
									 `trans_cn_out`,
									 `trans_cn_type`');
			$array_values 	= array(date("Y-m-d"), 
			// $array_values 	= array('2018-08-20', 
									$return['fkid_request'],
									$return['item_num'],
									0,
									$return['req_qty'],
									2); //transaction type 1-transfer 2-withdraw
									
			$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		
		
		} else if ( $dept == 'YF'){
			
			/* Insert to another table */
			$table			= 'tbl_YF_transaction';
			$array_fields 	= array('trans_yf_date_transaction,
									trans_yf_fkid_request, 
									trans_yf_fkid_material, 
									 `trans_yf_in`, 
									 `trans_yf_out`,
									 `trans_yf_type`');
			$array_values 	= array(date("Y-m-d"), 
			// $array_values 	= array('2018-08-20', 
									$return['fkid_request'],
									$return['item_num'],
									0,
									$return['req_qty'],
									2); //transaction type 1-transfer 2-withdraw
									
			$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		
		
		}
		
		$return['test_result'] = $test_result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
		// echo $test_result;
		
	}
	
	function add_mtls_dtls(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_material_list_price';
		$array_fields 	= array('mp_date_encode, mp_fkid_material_list, mp_unit_price_dollor, mp_exchange_rate, mp_unit_price_peso, mp_encoded_by');
		$array_values 	= array($return['name_mtls_dtls_date'], 
								$return['name_mtls_dtls_pkid'], 
								$return['name_mtls_dtls_dollor'], 
								$return['name_mtls_dtls_exc'], 
								$return['name_mtls_dtls_peso'],
								$return['name_mtls_info_encoded_by']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		$result1 		= INVS::getInstance()->insert_query_id_test($table,$array_fields,$array_values);		

		$return['result']	 = json_encode($result);
		$return['result1']	 = $result1;
		echo json_encode($return);
		
	}

	//- New
	function add_pps_eoh(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_pps_product_inventory';
		$array_fields 	= array('ppi_date, ppi_fkid_mlp, ppi_eoh, username');
		$array_values 	= array($return['name_pe_date'], 
								$return['name_pe_hidden_pkid'], 
								$return['name_pe_eoh'], 
								$return['name_pe_encoded_by']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		$result1 		= INVS::getInstance()->insert_query_id_test($table,$array_fields,$array_values);		

		$return['result']	 = json_encode($result);
		$return['result1']	 = $result1;
		echo json_encode($return);
		
	}
	
	
	function add_mtls_dtls_TS(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_idm_TS';
		$array_fields 	= array('idmTS_date_encode, idmTS_fkid_material_list_price, idmTS_dept, idmTS_stock_qty, idmTS_encoded_by');
		$array_values 	= array($return['name_mtls_dtls_date_TS'], 
								$return['name_mtls_dtls_pkid_TS'], 
								'TS',
								$return['name_mtls_dtls_qty_TS'],
								$return['name_mtls_info_encoded_by_TS']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		$result1 		= INVS::getInstance()->insert_query_id_test($table,$array_fields,$array_values);		

		$return['result']	 = json_encode($result);
		$return['result1']	 = $result1;
		echo json_encode($return);
		
	}
	
	function add_mtls_dtls_PPS(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_idm_PPS';
		$array_fields 	= array('idmPPS_date_encode, idmPPS_fkid_material_list_price, idmPPS_dept, idmPPS_stock_qty, idmPPS_encoded_by');
		$array_values 	= array($return['name_mtls_dtls_date_PPS'], 
								$return['name_mtls_dtls_pkid_PPS'], 
								'PPS',
								$return['name_mtls_dtls_qty_PPS'],
								$return['name_mtls_info_encoded_by_PPS']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		$result1 		= INVS::getInstance()->insert_query_id_test($table,$array_fields,$array_values);		

		$return['result']	 = json_encode($result);
		$return['result1']	 = $result1;
		echo json_encode($return);
		
	}
	
	function add_mtls_dtls_CN(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_idm_CN';
		$array_fields 	= array('idmCN_date_encode, idmCN_fkid_material_list_price, idmCN_dept, idmCN_stock_qty, idmCN_encoded_by');
		$array_values 	= array($return['name_mtls_dtls_date_CN'], 
								$return['name_mtls_dtls_pkid_CN'], 
								'CN',
								$return['name_mtls_dtls_qty_CN'],
								$return['name_mtls_info_encoded_by_CN']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		$result1 		= INVS::getInstance()->insert_query_id_test($table,$array_fields,$array_values);		

		$return['result']	 = json_encode($result);
		$return['result1']	 = $result1;
		echo json_encode($return);
		
	}
	
	function add_mtls_dtls_YF(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_idm_YF';
		$array_fields 	= array('idmYF_date_encode, idmYF_fkid_material_list_price, idmYF_dept, idmYF_stock_qty, idmYF_encoded_by');
		$array_values 	= array($return['name_mtls_dtls_date_YF'], 
								$return['name_mtls_dtls_pkid_YF'], 
								'YF',
								$return['name_mtls_dtls_qty_YF'],
								$return['name_mtls_info_encoded_by_YF']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		$result1 		= INVS::getInstance()->insert_query_id_test($table,$array_fields,$array_values);		

		$return['result']	 = json_encode($result);
		$return['result1']	 = $result1;
		echo json_encode($return);
		
	}
	
	/* Receive */
	function add_rcv_TS(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_receive_materials_TS';
		$array_fields 	= array('rm_ts_date_received, 
								 rm_ts_supplier, 
								 rm_ts_invoice_num, 
								 rm_ts_fkid_material, 
								 rm_ts_rcv_qty,
								 rm_ts_remarks');
		$array_values 	= array($return['name_ts_rcv_date'], 
								$return['name_ts_supp_name'], 
								$return['name_ts_rcv_inv_no'], 
								$return['name_ts_rcv_pkid'],
								$return['name_ts_rcv_qty'],
								$return['name_ts_rcv_remarks']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		

		/* Insert to another table */
		$table			= 'tbl_TS_transaction';
		$array_fields 	= array('trans_ts_date_transaction, 
								 trans_ts_supplier, 
								 trans_ts_invoice_num, 
								 trans_ts_fkid_material, 
								 `trans_ts_in`, 
								 `trans_ts_out`,
								 `trans_ts_remarks`');
		$array_values 	= array($return['name_ts_rcv_date'], 
								$return['name_ts_supp_name'], 
								$return['name_ts_rcv_inv_no'], 
								$return['name_ts_rcv_pkid'],
								$return['name_ts_rcv_qty'], // IN
								0, //OUT
								$return['name_ts_rcv_remarks']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		
		
		$return['result'] 	= json_encode($result);
		echo json_encode($return);
		
	}

	function add_rcv_PPS(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_receive_materials_PPS';
		$array_fields 	= array('rm_pps_date_received, 
								 rm_pps_supplier, 
								 rm_pps_invoice_num, 
								 rm_pps_fkid_material, 
								 rm_pps_rcv_qty,
								 rm_pps_remarks');
		$array_values 	= array($return['name_pps_rcv_date'], 
								$return['name_pps_supp_name'], 
								$return['name_pps_rcv_inv_no'], 
								$return['name_pps_rcv_pkid'],
								$return['name_pps_rcv_qty'],
								$return['name_pps_rcv_remarks']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		

		/* Insert to another table */
		$table			= 'tbl_PPS_transaction';
		$array_fields 	= array('trans_pps_date_transaction, 
								 trans_pps_supplier, 
								 trans_pps_invoice_num, 
								 trans_pps_fkid_material, 
								 `trans_pps_in`, 
								 `trans_pps_out`,
								 `trans_pps_remarks`');
		$array_values 	= array($return['name_pps_rcv_date'], 
								$return['name_pps_supp_name'], 
								$return['name_pps_rcv_inv_no'], 
								$return['name_pps_rcv_pkid'],
								$return['name_pps_rcv_qty'], // IN
								0, //OUT
								$return['name_pps_rcv_remarks']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		
		
		$return['result'] 	= json_encode($result);
		echo json_encode($return);
		
	}

	function add_rcv_CN(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_receive_materials_CN';
		$array_fields 	= array('rm_cn_date_received, 
								 rm_cn_supplier, 
								 rm_cn_invoice_num, 
								 rm_cn_fkid_material, 
								 rm_cn_rcv_qty,
								 rm_cn_remarks');
		$array_values 	= array($return['name_cn_rcv_date'], 
								$return['name_cn_supp_name'], 
								$return['name_cn_rcv_inv_no'], 
								$return['name_cn_rcv_pkid'],
								$return['name_cn_rcv_qty'],
								$return['name_cn_rcv_remarks']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		

		/* Insert to another table */
		$table			= 'tbl_CN_transaction';
		$array_fields 	= array('trans_cn_date_transaction, 
								 trans_cn_supplier, 
								 trans_cn_invoice_num, 
								 trans_cn_fkid_material, 
								 `trans_cn_in`, 
								 `trans_cn_out`,
								 `trans_cn_remarks`');
		$array_values 	= array($return['name_cn_rcv_date'], 
								$return['name_cn_supp_name'], 
								$return['name_cn_rcv_inv_no'], 
								$return['name_cn_rcv_pkid'],
								$return['name_cn_rcv_qty'], // IN
								0, //OUT
								$return['name_cn_rcv_remarks']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		
		
		$return['result'] 	= json_encode($result);
		echo json_encode($return);
		
	}

	function add_rcv_YF(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_receive_materials_YF';
		$array_fields 	= array('rm_yf_date_received, 
								 rm_yf_supplier, 
								 rm_yf_invoice_num, 
								 rm_yf_fkid_material, 
								 rm_yf_rcv_qty,
								 rm_yf_remarks');
		$array_values 	= array($return['name_yf_rcv_date'], 
								$return['name_yf_supp_name'], 
								$return['name_yf_rcv_inv_no'], 
								$return['name_yf_rcv_pkid'],
								$return['name_yf_rcv_qty'],
								$return['name_yf_rcv_remarks']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		

		/* Insert to another table */
		$table			= 'tbl_YF_transaction';
		$array_fields 	= array('trans_yf_date_transaction, 
								 trans_yf_supplier, 
								 trans_yf_invoice_num, 
								 trans_yf_fkid_material, 
								 `trans_yf_in`, 
								 `trans_yf_out`,
								 `trans_yf_remarks`');
		$array_values 	= array($return['name_yf_rcv_date'], 
								$return['name_yf_supp_name'], 
								$return['name_yf_rcv_inv_no'], 
								$return['name_yf_rcv_pkid'],
								$return['name_yf_rcv_qty'], // IN
								0, //OUT
								$return['name_yf_rcv_remarks']);
								
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		
		
		$return['result'] 	= json_encode($result);
		echo json_encode($return);
		
	}

	/* Withdraw / Transfer */
	function add_transf_TS(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_withdraw_items';
		$array_fields 	= array('ci_date_withdraw, ci_fkid_req, ci_dept, ci_req_material_id, ci_req_qty, ci_transaction_type, ci_transaction_dept, ci_remarks, ci_stock_checking');
		$array_values 	= array($return['name_ts_transf_date'], 
								'0', 
								$return['name_hidden_ts_dept'], 
								$return['name_ts_transf_pkid'], 
								$return['name_ts_transf_qty'],
								$return['name_ts_transaction_type'],
								$return['name_ts_transaction_dept'],
								$return['name_ts_transf_remarks'],
								$return['name_ts_transf_current_stock']);
		
		
		$ts_transaction_type		= $return['name_ts_transaction_type'];
		$ts_transf_qty				= $return['name_ts_transf_qty'];
		$ts_transf_current_stock	= $return['name_ts_transf_current_stock'];
		$ts_transaction_dept		= $return['name_ts_transaction_dept'];
	
		if( $ts_transf_qty > $ts_transf_current_stock) {
			
			$return['msg']	= 'higher than current';
			
			
		} else {
			
			if ( $ts_transaction_type == 0 ){
			
				$return['msg1']	= 'no transaction type';
			
			} else {
			
				$return['msg']	= 'lower than current';
				$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);	

				/* Insert to another table */
				$table			= 'tbl_TS_transaction';
				$array_fields 	= array('trans_ts_date_transaction,
										trans_ts_fkid_material, 
										 `trans_ts_in`, 
										 `trans_ts_out`,
										 `trans_ts_type`,
										 `trans_ts_dept`,
										 trans_ts_remarks');
				$array_values 	= array($return['name_ts_transf_date'], 
										$return['name_ts_transf_pkid'],
										0,
										$return['name_ts_transf_qty'],
										$return['name_ts_transaction_type'],
										$return['name_ts_transaction_dept'],
										$return['name_ts_transf_remarks']);
										
				$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);			
				
				
				if ( $ts_transaction_dept == 'PPS' ){
			
					/* Insert to PPS table transfer transaction */
					$table			= 'tbl_PPS_transaction';
					$array_fields 	= array('trans_pps_date_transaction,
											trans_pps_fkid_material,
											 `trans_pps_in`, 
											 `trans_pps_out`,
											 `trans_pps_type`,
											 `trans_pps_dept`,
											 trans_pps_remarks');
				$array_values 	= array($return['name_ts_transf_date'], 
										$return['name_ts_transf_pkid'],
										$return['name_ts_transf_qty'],
										0,
										$return['name_ts_transaction_type'],
										'',
										'Transferred from TS');
											
					$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
				
				}else if ( $ts_transaction_dept == 'CN' ){
			
					/* Insert to PPS table transfer transaction */
					$table			= 'tbl_CN_transaction';
					$array_fields 	= array('trans_cn_date_transaction,
											trans_cn_fkid_material,
											 `trans_cn_in`, 
											 `trans_cn_out`,
											 `trans_cn_type`,
											 `trans_cn_dept`,
											 trans_cn_remarks');
				$array_values 	= array($return['name_ts_transf_date'], 
										$return['name_ts_transf_pkid'],
										$return['name_ts_transf_qty'],
										0,
										$return['name_ts_transaction_type'],
										'',
										'Transferred from TS');
											
					$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
				
				}else if ( $ts_transaction_dept == 'YF' ){
			
					/* Insert to PPS table transfer transaction */
					$table			= 'tbl_YF_transaction';
					$array_fields 	= array('trans_yf_date_transaction,
											trans_yf_fkid_material,
											 `trans_yf_in`, 
											 `trans_yf_out`,
											 `trans_yf_type`,
											 `trans_yf_dept`,
											 trans_yf_remarks');
				$array_values 	= array($return['name_ts_transf_date'], 
										$return['name_ts_transf_pkid'],
										$return['name_ts_transf_qty'],
										0,
										$return['name_ts_transaction_type'],
										'',
										'Transferred from TS');
											
					$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
				
				}
				
			
			
			
			}
		}
		
		$return['result'] 	= json_encode($result);
		echo json_encode($return);
		
	}
	
	function add_transf_PPS(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_withdraw_items';
		$array_fields 	= array('ci_date_withdraw, ci_fkid_req, ci_dept, ci_req_material_id, ci_req_qty, ci_transaction_type, ci_transaction_dept, ci_remarks, ci_stock_checking');
		$array_values 	= array($return['name_pps_transf_date'], 
								'0', 
								$return['name_hidden_pps_dept'], 
								$return['name_pps_transf_pkid'], 
								$return['name_pps_transf_qty'],
								$return['name_pps_transaction_type'],
								$return['name_pps_transaction_dept'],
								$return['name_pps_transf_remarks'],
								$return['name_pps_transf_current_stock']);
		
		
		$pps_transaction_type		= $return['name_pps_transaction_type'];
		$pps_transf_qty				= $return['name_pps_transf_qty'];
		$pps_transf_current_stock	= $return['name_pps_transf_current_stock'];
		$pps_transaction_dept		= $return['name_pps_transaction_dept'];
	
		if( $pps_transf_qty > $pps_transf_current_stock) {
			
			$return['msg']	= 'higher than current';
			
			
		} else {
			
			if ( $pps_transaction_type == 0 ){
			
				$return['msg1']	= 'no transaction type';
			
			} else {
			
				$return['msg']	= 'lower than current';
				$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);	

				/* Insert to another table */
				$table			= 'tbl_PPS_transaction';
				$array_fields 	= array('trans_pps_date_transaction,
										trans_pps_fkid_material, 
										 `trans_pps_in`, 
										 `trans_pps_out`,
										 `trans_pps_type`,
										 `trans_pps_dept`,
										 trans_pps_remarks');
				$array_values 	= array($return['name_pps_transf_date'], 
										$return['name_pps_transf_pkid'],
										0,
										$return['name_pps_transf_qty'],
										$return['name_pps_transaction_type'],
										$return['name_pps_transaction_dept'],
										$return['name_pps_transf_remarks']);
										
				$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);			
				
				
				if ( $pps_transaction_dept == 'TS' ){
			
					/* Insert to TS table transfer transaction */
					$table			= 'tbl_TS_transaction';
					$array_fields 	= array('trans_ts_date_transaction,
											trans_ts_fkid_material,
											 `trans_ts_in`, 
											 `trans_ts_out`,
											 `trans_ts_type`,
											 `trans_ts_dept`,
											 trans_ts_remarks');
				$array_values 	= array($return['name_pps_transf_date'], 
										$return['name_pps_transf_pkid'],
										$return['name_pps_transf_qty'],
										0,
										$return['name_pps_transaction_type'],
										'',
										'Transferred from PPS');
										
					$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
				
				}else if ( $pps_transaction_dept == 'CN' ){
			
					/* Insert to CN table transfer transaction */
					$table			= 'tbl_CN_transaction';
					$array_fields 	= array('trans_cn_date_transaction,
											trans_cn_fkid_material,
											 `trans_cn_in`, 
											 `trans_cn_out`,
											 `trans_cn_type`,
											 `trans_cn_dept`,
											 trans_cn_remarks');
				$array_values 	= array($return['name_pps_transf_date'], 
										$return['name_pps_transf_pkid'],
										$return['name_pps_transf_qty'],
										0,
										$return['name_pps_transaction_type'],
										'',
										'Transferred from PPS');
										
					$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
				
				} else if ( $pps_transaction_dept == 'YF' ){
			
					/* Insert to YF table transfer transaction */
					$table			= 'tbl_YF_transaction';
					$array_fields 	= array('trans_yf_date_transaction,
											trans_yf_fkid_material,
											 `trans_yf_in`, 
											 `trans_yf_out`,
											 `trans_yf_type`,
											 `trans_yf_dept`,
											 trans_yf_remarks');
				$array_values 	= array($return['name_pps_transf_date'], 
										$return['name_pps_transf_pkid'],
										$return['name_pps_transf_qty'],
										0,
										$return['name_pps_transaction_type'],
										'',
										'Transferred from PPS');
										
					$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
				
				} 
				
				
			}
		}
		
		$return['result'] 	= json_encode($result);
		echo json_encode($return);
		
	}
	
	function add_transf_CN(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_withdraw_items';
		$array_fields 	= array('ci_date_withdraw, ci_fkid_req, ci_dept, ci_req_material_id, ci_req_qty, ci_transaction_type, ci_transaction_dept, ci_remarks, ci_stock_checking');
		$array_values 	= array($return['name_cn_transf_date'], 
								'0', 
								$return['name_hidden_cn_dept'], 
								$return['name_cn_transf_pkid'], 
								$return['name_cn_transf_qty'],
								$return['name_cn_transaction_type'],
								$return['name_cn_transaction_dept'],
								$return['name_cn_transf_remarks'],
								$return['name_cn_transf_current_stock']);
		
		
		$cn_transaction_type		= $return['name_cn_transaction_type'];
		$cn_transf_qty				= $return['name_cn_transf_qty'];
		$cn_transf_current_stock	= $return['name_cn_transf_current_stock'];
		$cn_transaction_dept		= $return['name_cn_transaction_dept'];
	
		if( $cn_transf_qty > $cn_transf_current_stock) {
			
			$return['msg']	= 'higher than current';
			
			
		} else {
			
			if ( $cn_transaction_type == 0 ){
			
				$return['msg1']	= 'no transaction type';
			
			} else {
			
				$return['msg']	= 'lower than current';
				$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);	

				/* Insert to another table */
				$table			= 'tbl_CN_transaction';
				$array_fields 	= array('trans_cn_date_transaction,
										trans_cn_fkid_material, 
										 `trans_cn_in`, 
										 `trans_cn_out`,
										 `trans_cn_type`,
										 `trans_cn_dept`,
										 trans_cn_remarks');
				$array_values 	= array($return['name_cn_transf_date'], 
										$return['name_cn_transf_pkid'],
										0,
										$return['name_cn_transf_qty'],
										$return['name_cn_transaction_type'],
										$return['name_cn_transaction_dept'],
										$return['name_cn_transf_remarks']);
										
				$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);			
				
				
				if ( $cn_transaction_dept == 'TS' ){
			
					/* Insert to TS table transfer transaction */
					$table			= 'tbl_TS_transaction';
					$array_fields 	= array('trans_ts_date_transaction,
											trans_ts_fkid_material,
											 `trans_ts_in`, 
											 `trans_ts_out`,
											 `trans_ts_type`,
											 `trans_ts_dept`,
											 trans_ts_remarks');
				$array_values 	= array($return['name_cn_transf_date'], 
										$return['name_cn_transf_pkid'],
										$return['name_cn_transf_qty'],
										0,
										$return['name_cn_transaction_type'],
										'',
										'Transferred from CN');
										
					$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
				
				}else if ( $cn_transaction_dept == 'PPS' ){
			
					/* Insert to PPS table transfer transaction */
					$table			= 'tbl_PPS_transaction';
					$array_fields 	= array('trans_pps_date_transaction,
											trans_pps_fkid_material,
											 `trans_pps_in`, 
											 `trans_pps_out`,
											 `trans_pps_type`,
											 `trans_pps_dept`,
											 trans_pps_remarks');
				$array_values 	= array($return['name_cn_transf_date'], 
										$return['name_cn_transf_pkid'],
										$return['name_cn_transf_qty'],
										0,
										$return['name_cn_transaction_type'],
										'',
										'Transferred from CN');
										
					$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
				
				}else if ( $cn_transaction_dept == 'YF' ){
			
					/* Insert to YF table transfer transaction */
					$table			= 'tbl_YF_transaction';
					$array_fields 	= array('trans_yf_date_transaction,
											trans_yf_fkid_material,
											 `trans_yf_in`, 
											 `trans_yf_out`,
											 `trans_yf_type`,
											 `trans_yf_dept`,
											 trans_yf_remarks');
				$array_values 	= array($return['name_cn_transf_date'], 
										$return['name_cn_transf_pkid'],
										$return['name_cn_transf_qty'],
										0,
										$return['name_cn_transaction_type'],
										'',
										'Transferred from CN');
										
					$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
				
				}
				
			}
		}
		
		$return['result'] 	= json_encode($result);
		echo json_encode($return);
		
	}
	
	function add_transf_YF(){
	
		require_once('../oop/oop.php');

		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_withdraw_items';
		$array_fields 	= array('ci_date_withdraw, ci_fkid_req, ci_dept, ci_req_material_id, ci_req_qty, ci_transaction_type, ci_transaction_dept, ci_remarks, ci_stock_checking');
		$array_values 	= array($return['name_yf_transf_date'], 
								'0', 
								$return['name_hidden_yf_dept'], 
								$return['name_yf_transf_pkid'], 
								$return['name_yf_transf_qty'],
								$return['name_yf_transaction_type'],
								$return['name_yf_transaction_dept'],
								$return['name_yf_transf_remarks'],
								$return['name_yf_transf_current_stock']);
		
		
		$yf_transaction_type		= $return['name_yf_transaction_type'];
		$yf_transf_qty				= $return['name_yf_transf_qty'];
		$yf_transf_current_stock	= $return['name_yf_transf_current_stock'];
		$yf_transaction_dept		= $return['name_yf_transaction_dept'];
	
		if( $yf_transf_qty > $yf_transf_current_stock) {
			
			$return['msg']	= 'higher than current';
			
			
		} else {
			
			if ( $yf_transaction_type == 0 ){
			
				$return['msg1']	= 'no transaction type';
			
			} else {
			
				$return['msg']	= 'lower than current';
				$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);	

				/* Insert to another table */
				$table			= 'tbl_YF_transaction';
				$array_fields 	= array('trans_yf_date_transaction,
										trans_yf_fkid_material, 
										 `trans_yf_in`, 
										 `trans_yf_out`,
										 `trans_yf_type`,
										 `trans_yf_dept`,
										 trans_yf_remarks');
				$array_values 	= array($return['name_yf_transf_date'], 
										$return['name_yf_transf_pkid'],
										0,
										$return['name_yf_transf_qty'],
										$return['name_yf_transaction_type'],
										$return['name_yf_transaction_dept'],
										$return['name_yf_transf_remarks']);
										
				$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);			
				
				
				if ( $yf_transaction_dept == 'TS' ){
			
					/* Insert to TS table transfer transaction */
					$table			= 'tbl_TS_transaction';
					$array_fields 	= array('trans_ts_date_transaction,
											trans_ts_fkid_material,
											 `trans_ts_in`, 
											 `trans_ts_out`,
											 `trans_ts_type`,
											 `trans_ts_dept`,
											 trans_ts_remarks');
					$array_values 	= array($return['name_yf_transf_date'], 
										$return['name_yf_transf_pkid'],
										$return['name_yf_transf_qty'],
										0,
										$return['name_yf_transaction_type'],
										'',
										'Transferred from YF');
										
					$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
				
				}else if ( $yf_transaction_dept == 'PPS' ){
			
					/* Insert to PPS table transfer transaction */
					$table			= 'tbl_PPS_transaction';
					$array_fields 	= array('trans_pps_date_transaction,
											trans_pps_fkid_material,
											 `trans_pps_in`, 
											 `trans_pps_out`,
											 `trans_pps_type`,
											 `trans_pps_dept`,
											 trans_pps_remarks');
					$array_values 	= array($return['name_yf_transf_date'], 
										$return['name_yf_transf_pkid'],
										$return['name_yf_transf_qty'],
										0,
										$return['name_yf_transaction_type'],
										'',
										'Transferred from YF');
										
					$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
				
				}else if ( $yf_transaction_dept == 'CN' ){
			
					/* Insert to CN table transfer transaction */
					$table			= 'tbl_CN_transaction';
					$array_fields 	= array('trans_cn_date_transaction,
											trans_cn_fkid_material,
											 `trans_cn_in`, 
											 `trans_cn_out`,
											 `trans_cn_type`,
											 `trans_cn_dept`,
											 trans_cn_remarks');
					$array_values 	= array($return['name_yf_transf_date'], 
										$return['name_yf_transf_pkid'],
										$return['name_yf_transf_qty'],
										0,
										$return['name_yf_transaction_type'],
										'',
										'Transferred from YF');
										
					$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
				
				}
				
				
			}
		}
		
		$return['result'] 	= json_encode($result);
		echo json_encode($return);
		
	}
	
	/* Approval */
	function approved_request(){

		require_once('../oop/oop.php');
		
		$lastupdate 	= date("Y-m-d H:i:s");
		
		$status = '1';
		$pkid = $_POST['pkid'];
		$name = $_POST['approver_name'];
				
		$return['update_result'] = update_status($status, $pkid, $name);
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_request_remarks';
		// $array_fields 	= array('rem_fkid_request', 'rem_approver', 'rem_approved_remarks', 'rem_reject_remarks', 'rem_conformed_remarks', 'rem_rejected_by_TSCentral', 'rem_lastupdate');
		// $array_values 	= array($pkid, $name, $return['name_approved_remarks'], 'N/A', 'N/A', 'N/A', $lastupdate);

		$array_fields 	= array('rem_fkid_request', 'rem_approver', 'rem_approved_remarks', 'rem_reject_remarks', 'rem_other_remarks', 'rem_lastupdate');
		$array_values 	= array($pkid, $name, $return['name_approved_remarks'], 'N/A', 'N/A', $lastupdate);
		$result = INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);
		$return['pkid'] = $result;

		echo json_encode($return);

	}
	
	function update_status($status, $pkid, $name){
		require_once('../oop/oop.php');
		$update_result = INVS::getInstance()->update_approval_status($status, $pkid, $name);
		return $update_result;
	}
	
	function rejected_request(){

		require_once('../oop/oop.php');
		
		$lastupdate 	= date("Y-m-d H:i:s");
		
		$status = '2';
		$pkid = $_POST['pkid'];
		$name = $_POST['approver_name'];
				
		$return['update_result'] = update_status2($status, $pkid, $name);
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_request_remarks';
		$array_fields 	= array('rem_fkid_request', 'rem_approver', 'rem_approved_remarks', 'rem_reject_remarks', 'rem_other_remarks', 'rem_lastupdate');
		$array_values 	= array($pkid, $name, 'N/A', $return['name_rejected_remarks'], 'N/A', $lastupdate);
		$result = INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);
		$return["pkid"] = $result;

		echo json_encode($return);

	}
	
	function update_status2($status, $pkid, $name){
		require_once('../oop/oop.php');
		$update_result = INVS::getInstance()->update_approval_status($status, $pkid, $name);
		return $update_result;
	}

	function update_status4($status, $pkid, $name){
		require_once('../oop/oop.php');
		$update_result = INVS::getInstance()->update_approval_status4($status, $pkid, $name);
		return $update_result;
	}
	
	function conformed_request(){

		require_once('../oop/oop.php');
		
		$lastupdate 	= date("Y-m-d H:i:s");
		// $lastupdate = '2018-08-20';
		
		$status 		= '1';
		$pkid 			= $_POST['pkid'];
		$req_custodian 	= $_POST['req_custodian'];
		$name 			= $_POST['approver_name'];
				
		$return['update_result'] = update_status3($status, $pkid, $req_custodian, $name);
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_request_remarks';		
		$array_fields 	= array('rem_fkid_request', 'rem_approver', 'rem_approved_remarks', 'rem_reject_remarks', 'rem_other_remarks', 'rem_lastupdate');
		$array_values 	= array($pkid, 
								$name, 
								$return['name_conformed_remarks'], 
								'N/A', 
								'N/A', 
								$lastupdate);
				
		$cus_name			= $req_custodian;
	
		if( $cus_name == '') {
			$return['msg']	= 'no CUS';
		} else {
			$return['msg']	= 'with CUS';
			$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);		
		}
		
		$return["pkid"] = $result;
		echo json_encode($return);

	}
	
	function update_status3($status, $pkid, $req_custodian, $name){
		require_once('../oop/oop.php');
		$update_result = INVS::getInstance()->update_approval_status3($status, $pkid, $req_custodian, $name);
		return $update_result;
	}
	
	function revision_request_by_tsCentral(){

		require_once('../oop/oop.php');
		
		$lastupdate 	= date("Y-m-d H:i:s");
		
		$status = '2';
		$pkid = $_POST['pkid'];
		$name = $_POST['approver_name'];
				
		$return['update_result'] = update_status2($status, $pkid, $name);
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_request_remarks';
		$array_fields 	= array('rem_fkid_request', 'rem_approver', 'rem_approved_remarks', 'rem_reject_remarks', 'rem_other_remarks', 'rem_lastupdate');
		$array_values 	= array($pkid, $name, 'N/A', 'N/A', $return['name_revision_remarks'], $lastupdate);
		$result = INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);
		$return["pkid"] = $result;

		echo json_encode($return);

	}

	function rejected_request_by_tsCentral(){

		require_once('../oop/oop.php');
		
		$lastupdate 	= date("Y-m-d H:i:s");
				
		$status = '5';
		$pkid = $_POST['pkid'];
		$name = $_POST['approver_name'];
				
		$return['update_result'] = update_status2($status, $pkid, $name);
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_request_remarks';
		$array_fields 	= array('rem_fkid_request', 'rem_approver', 'rem_approved_remarks', 'rem_reject_remarks', 'rem_other_remarks', 'rem_lastupdate');
		$array_values 	= array($pkid, $name, 'N/A', $return['name_rejected_remarks'], 'N/A', $lastupdate);
		$result = INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);
		$return["pkid"] = $result;

		echo json_encode($return);

	}

	function served_request(){

		require_once('../oop/oop.php');
		
		$lastupdate 	= date("Y-m-d H:i:s");
		// $lastupdate = '2018-08-20';
		
		$status = '3';
		$pkid = $_POST['pkid'];
		$name = $_POST['req_custodian'];
				
		$return['update_result'] = update_status4($status, $pkid, $name);
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_request_remarks';
		$array_fields 	= array('rem_fkid_request', 'rem_approver', 'rem_approved_remarks', 'rem_reject_remarks', 'rem_other_remarks', 'rem_lastupdate');
		$array_values 	= array($pkid, $name, $return['name_served_remarks'], 'N/A', 'N/A', $lastupdate);
		$result = INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);
		$return["pkid"] = $result;

		echo json_encode($return);

	}
	
	function unserved_request(){

		require_once('../oop/oop.php');
		
		$lastupdate 	= date("Y-m-d H:i:s");
				
		$status = '4';
		$pkid = $_POST['pkid'];
		$name = $_POST['req_custodian'];
				
		$return['update_result'] = update_status4($status, $pkid, $name);
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_request_remarks';
		$array_fields 	= array('rem_fkid_request', 'rem_approver', 'rem_approved_remarks', 'rem_reject_remarks', 'rem_other_remarks', 'rem_lastupdate');
		$array_values 	= array($pkid, $name, 'N/A', 'N/A', $return['name_unserved_remarks'],  $lastupdate);
		$result = INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);
		$return["pkid"] = $result;

		echo json_encode($return);

	}
	
	/* Display */
	function display_request(){

		require_once('../oop/oop.php');

		$username		= $_POST['req_prepared_by'];
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('a.*, c.name as requestor_name');
		$table 	   		= 'tbl_request a';
		$joins 	   		= ' INNER JOIN db_rapid.tbl_useraccounts c on c.username = a.req_prepared_by';
		$sql_where 		= "WHERE a.req_prepared_by = '$username' AND a.req_logdel = '0' ";
		$sql_order 		= 'ORDER BY a.req_status, a.req_date DESC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$result_test	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			
			$return['req_pkid'][$ctr] 				= $row['req_pkid'];
			$return['req_status'][$ctr] 			= $row['req_status'];
			$return['req_date'][$ctr] 				= $row['req_date'];
			$return['req_prepared_by'][$ctr] 		= $row['req_prepared_by'];
			$return['requestor_name'][$ctr] 		= $row['requestor_name'];
			$return['req_department'][$ctr] 		= $row['req_department'];
			$return['req_section'][$ctr] 			= $row['req_section'];
			$return['req_conformer'][$ctr] 			= $row['req_conformer'];
			$return['req_item_category'][$ctr] 		= $row['req_item_category'];
			$return['req_justification'][$ctr] 		= $row['req_justification'];
			$ctr++;
		}
	
		$return['result_test']	  = $result_test;
		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function display_request_for_approval(){ //Cancelled

		require_once('../oop/oop.php');

		$username		=$_POST['req_approver'];
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('a.*, b.name as approver_name, c.name as requestor_name');
		$table 	   		= 'tbl_request a';
		$joins 	   		= 'INNER JOIN db_rapid.tbl_useraccounts b on b.username = a.req_approver
						   INNER JOIN db_rapid.tbl_useraccounts c on c.username = a.req_prepared_by';
		$sql_where 		= "WHERE a.req_approver = '$username' AND a.req_logdel = '0' AND (req_status = '0' OR req_status = '3')";
		$sql_order 		= 'ORDER BY a.req_status, a.req_date ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			$return['req_pkid'][$ctr] 			= $row['req_pkid'];
			$return['req_status'][$ctr] 		= $row['req_status'];
			$return['req_date'][$ctr] 			= $row['req_date'];
			$return['req_prepared_by'][$ctr] 	= $row['req_prepared_by'];
			$return['requestor_name'][$ctr] 	= $row['requestor_name'];
			$return['req_department'][$ctr] 	= $row['req_department'];
			$return['req_section'][$ctr] 		= $row['req_section'];
			$return['req_approver'][$ctr] 		= $row['req_approver'];
			$return['approver_name'][$ctr] 		= $row['approver_name'];
			$return['req_item_category'][$ctr] 	= $row['req_item_category'];
			$return['req_justification'][$ctr] 	= $row['req_justification'];
			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}

	function display_request_for_conformance(){

		require_once('../oop/oop.php');
		
		$username		=$_POST['req_conformer'];
		// $username		='alvvela';

		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('a.*, b.name as requestor_name');
		$table 	   		= 'tbl_request a';
		$joins 	   		= 'INNER JOIN db_rapid.tbl_useraccounts b on b.username = a.req_prepared_by';
		//- 1/10/2020
		// $sql_where 		= "WHERE a.req_conformer = '$username' AND a.req_logdel = '0' AND ( req_status = '0' OR req_status = '1' OR req_status = '2' OR req_status = '3' OR req_status = '4' OR req_status = '6')";
		$sql_where 		= "WHERE a.req_logdel = '0' AND a.req_status != '5' ";
		$sql_order 		= 'ORDER BY a.req_status ASC, a.req_date DESC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			$return['req_pkid'][$ctr] 			= $row['req_pkid'];
			$return['req_status'][$ctr] 		= $row['req_status'];
			$return['req_date'][$ctr] 			= $row['req_date'];
			$return['req_prepared_by'][$ctr] 	= $row['req_prepared_by'];
			$return['requestor_name'][$ctr] 	= $row['requestor_name'];
			$return['req_department'][$ctr] 	= $row['req_department'];
			$return['req_section'][$ctr] 		= $row['req_section'];
			$return['req_conformer'][$ctr] 		= $row['req_conformer'];
			$return['req_item_category'][$ctr] 	= $row['req_item_category'];
			$return['req_justification'][$ctr] 	= $row['req_justification'];
			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function display_conformed_request(){

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('a.*, b.name as requestor_name');
		$table 	   		= 'tbl_request a';
		$joins 	   		= 'INNER JOIN db_rapid.tbl_useraccounts b on b.username = a.req_prepared_by';
		$sql_where 		= "WHERE a.req_logdel = '0' AND (a.req_status = '1' OR a.req_status = '3' OR a.req_status = '4' )";
		$sql_order 		= 'ORDER BY a.req_status, a.req_date ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			$return['req_pkid'][$ctr] 			= $row['req_pkid'];
			$return['req_status'][$ctr] 		= $row['req_status'];
			$return['req_date'][$ctr] 			= $row['req_date'];
			$return['req_prepared_by'][$ctr] 	= $row['req_prepared_by'];
			$return['requestor_name'][$ctr] 	= $row['requestor_name'];
			$return['req_department'][$ctr] 	= $row['req_department'];
			$return['req_section'][$ctr] 		= $row['req_section'];
			$return['req_TS_product'][$ctr] 	= $row['req_TS_product'];
			$return['req_item_category'][$ctr] 	= $row['req_item_category'];
			$return['req_justification'][$ctr] 	= $row['req_justification'];
			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}

	function display_matls_inventory(){

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$result 		= '';
		// $array_fields 	= array('a.*,b.*, c.*');
		$array_fields 	= array('a.*,b.*');
		$table 	   		= 'tbl_material_list a';
		$joins 	   		= 'INNER JOIN tbl_material_list_price b on b.mp_fkid_material_list = a.mat_pkid';
		$sql_where 		= "WHERE a.mat_logdel = '0' AND b.mp_logdel = '0' ";
		$sql_order 		= 'ORDER BY mat_product_desc ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			$return['mat_pkid'][$ctr] 				= $row['mat_pkid'];
			$return['mat_date_encode'][$ctr] 		= $row['mat_date_encode'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mp_fkid_material_list'][$ctr] 	= $row['mp_fkid_material_list'];
			$return['mp_unit_price_dollor'][$ctr] 	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			$return['mp_TS'][$ctr] 					= $row['mp_TS'];
			$return['mp_PPS'][$ctr] 				= $row['mp_PPS'];
			$return['mp_CN'][$ctr] 					= $row['mp_CN'];
			$return['mp_YF'][$ctr] 					= $row['mp_YF'];
			$return['mp_stock_qty'][$ctr] 			= $row['mp_stock_qty'];
			// $return['mlbd_department'][$ctr] 		= $row['mlbd_department'];
			
			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function display_mtls_info(){

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'tbl_material_list';
		$joins 	   		= '';
		// $sql_where 		= "WHERE mat_logdel = '0'";
		$sql_where 		= "";
		$sql_order 		= 'ORDER BY mat_product_desc ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			$return['mat_pkid'][$ctr] 				= $row['mat_pkid'];
			$return['mat_date_encode'][$ctr] 		= $row['mat_date_encode'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			$return['mat_pps_product'][$ctr] 		= $row['mat_pps_product'];
			$return['mat_logdel'][$ctr] 			= $row['mat_logdel'];
				
			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function display_mtls_dtls(){

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('a.*, b.*');
		$table 	   		= 'tbl_material_list a';
		$joins 	   		= 'INNER JOIN tbl_material_list_price b on b.mp_fkid_material_list = a.mat_pkid';
		$sql_where 		= "WHERE a.mat_logdel = '0'";
		$sql_order 		= 'ORDER BY a.mat_product_desc, a.mat_product_specs ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			$return['mat_pkid'][$ctr] 				= $row['mat_pkid'];
			$return['mat_date_encode'][$ctr] 		= $row['mat_date_encode'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			$return['mat_pps_product'][$ctr] 		= $row['mat_pps_product'];
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mp_unit_price_dollor'][$ctr] 	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			$return['mp_logdel'][$ctr] 				= $row['mp_logdel'];
			
			$return['ts_current_stock'] 		 = get_current_stock_TS($row['mp_pkid']);
			$return['pps_current_stock'] 		 = get_current_stock_PPS($row['mp_pkid']);
			$return['cn_current_stock'] 		 = get_current_stock_CN($row['mp_pkid']);
			$return['yf_current_stock'] 		 = get_current_stock_YF($row['mp_pkid']);

			$ttl_current_stocks				= ( $return['ts_current_stock'] + $return['pps_current_stock'] + $return['cn_current_stock'] + $return['yf_current_stock'] );
			$return['ttl_current_stocks']	=  $ttl_current_stocks; 
			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function display_mtls_dtls_TS(){

		require_once('../oop/oop.php');
	
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'vw_material_list';
		$joins 	   		= '';
		$sql_where 		= "WHERE mat_pps_product ='0' ";
		$sql_order 		= 'ORDER BY mat_product_desc, mat_product_specs ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_unit_price_dollor'][$ctr]	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			$return['current_stock'][$ctr] 			= get_current_stock_TS($row['mp_pkid']);
			
			$ctr++;
			
		}
		
		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function display_mtls_dtls_PPS(){

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'vw_material_list';
		$joins 	   		= '';
		$sql_where 		= "";
		$sql_order 		= 'ORDER BY mat_product_desc, mat_product_specs ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_unit_price_dollor'][$ctr]	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			$return['current_stock'][$ctr] 			= get_current_stock_PPS($row['mp_pkid']);
			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function display_mtls_dtls_CN(){

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'vw_material_list';
		$joins 	   		= '';
		$sql_where 		= "WHERE mat_pps_product ='0'";
		$sql_order 		= 'ORDER BY mat_product_desc, mat_product_specs ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_unit_price_dollor'][$ctr]	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			$return['current_stock'][$ctr] 			= get_current_stock_CN($row['mp_pkid']);

			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function display_mtls_dtls_YF(){

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'vw_material_list';
		$joins 	   		= '';
		$sql_where 		= "WHERE mat_pps_product ='0'";
		$sql_order 		= 'ORDER BY mat_product_desc, mat_product_specs ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_unit_price_dollor'][$ctr]	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			$return['current_stock'][$ctr] 			= get_current_stock_YF($row['mp_pkid']);

			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function display_mtls_dtls_overall(){

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'vw_material_list';
		$joins 	   		= '';
		$sql_where 		= "";
		$sql_order 		= 'ORDER BY mat_product_desc, mat_product_specs ASC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_unit_price_dollor'][$ctr]	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			// $return['current_stock_TS'][$ctr] 		= get_current_stock_TS($row['mp_pkid']);
			$return['current_stock_PPS'][$ctr] 		= get_current_stock_PPS($row['mp_pkid']);
			// $return['current_stock_CN'][$ctr] 		= get_current_stock_CN($row['mp_pkid']);
			// $return['current_stock_YF'][$ctr] 		= get_current_stock_YF($row['mp_pkid']);

			// $return['ttl_current_stock'][$ctr] = $return['current_stock_TS'][$ctr] + $return['current_stock_PPS'][$ctr] + $return['current_stock_CN'][$ctr] + $return['current_stock_YF'][$ctr];
			$return['ttl_current_stock'][$ctr] = $return['current_stock_PPS'][$ctr];
			
			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function display_TS_withdrawal(){ 

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('a.*, SUM(a.withdraw_qty) as withdraw_qty, b.name as requestor_name');
		$table 	   		= 'vw_request_details a';
		$joins 	   		= 'INNER JOIN db_rapid.tbl_useraccounts b on b.username = a.requested_by';
		$sql_where 		= "WHERE a.department = 'TS' GROUP BY a.material_withdraw_id, a.date_conformed, a.requested_by ASC";
		$sql_order 		= 'ORDER BY a.date, a.product_desc ';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			$return['date'][$ctr] 				= $row['date'];
			$return['date_conformed'][$ctr] 	= $row['date_conformed'];
			$return['requested_by'][$ctr] 		= $row['requested_by'];
			$return['department'][$ctr] 		= $row['department'];
			$return['item_category'][$ctr] 		= $row['item_category'];
			$return['justification'][$ctr] 		= $row['justification'];
			
			$return['product_desc'][$ctr] 		= $row['product_desc'];
			$return['product_specs'][$ctr] 		= $row['product_specs'];
			$return['uom'][$ctr] 				= $row['uom'];
			$return['unit_price_dollor'][$ctr] 	= $row['unit_price_dollor'];
			$return['exchange_rate'][$ctr] 		= $row['exchange_rate'];
			$return['unit_price_peso'][$ctr] 	= $row['unit_price_peso'];
			$return['withdraw_qty'][$ctr] 		= $row['withdraw_qty'];
			$return['requestor_name'][$ctr] 	= $row['requestor_name'];
			
			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}

	function display_PPS_withdrawal(){

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('a.*, SUM(a.withdraw_qty) as withdraw_qty, b.name as requestor_name');
		$table 	   		= 'vw_request_details a';
		$joins 	   		= 'INNER JOIN db_rapid.tbl_useraccounts b on b.username = a.requested_by';
		$sql_where 		= "WHERE a.department = 'PPS' GROUP BY a.material_withdraw_id, a.date_conformed, a.requested_by ASC";
		$sql_order 		= 'ORDER BY a.date, a.product_desc';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			$return['date'][$ctr] 				= $row['date'];
			$return['date_conformed'][$ctr] 	= $row['date_conformed'];
			$return['requested_by'][$ctr] 		= $row['requested_by'];
			$return['department'][$ctr] 		= $row['department'];
			$return['item_category'][$ctr] 		= $row['item_category'];
			$return['justification'][$ctr] 		= $row['justification'];
			
			$return['product_desc'][$ctr] 		= $row['product_desc'];
			$return['product_specs'][$ctr] 		= $row['product_specs'];
			$return['uom'][$ctr] 				= $row['uom'];
			$return['unit_price_dollor'][$ctr] 	= $row['unit_price_dollor'];
			$return['exchange_rate'][$ctr] 		= $row['exchange_rate'];
			$return['unit_price_peso'][$ctr] 	= $row['unit_price_peso'];
			$return['withdraw_qty'][$ctr] 		= $row['withdraw_qty'];
			$return['requestor_name'][$ctr] 	= $row['requestor_name'];
			
			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function display_CN_withdrawal(){

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('a.*, SUM(a.withdraw_qty) as withdraw_qty, b.name as requestor_name');
		$table 	   		= 'vw_request_details a';
		$joins 	   		= 'INNER JOIN db_rapid.tbl_useraccounts b on b.username = a.requested_by';
		$sql_where 		= "WHERE a.department = 'CN' GROUP BY a.material_withdraw_id, a.date_conformed, a.requested_by ASC";
		$sql_order 		= 'ORDER BY a.date, a.product_desc';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			$return['date'][$ctr] 				= $row['date'];
			$return['date_conformed'][$ctr] 	= $row['date_conformed'];
			$return['requested_by'][$ctr] 		= $row['requested_by'];
			$return['department'][$ctr] 		= $row['department'];
			$return['item_category'][$ctr] 		= $row['item_category'];
			$return['justification'][$ctr] 		= $row['justification'];
			
			$return['product_desc'][$ctr] 		= $row['product_desc'];
			$return['product_specs'][$ctr] 		= $row['product_specs'];
			$return['uom'][$ctr] 				= $row['uom'];
			$return['unit_price_dollor'][$ctr] 	= $row['unit_price_dollor'];
			$return['exchange_rate'][$ctr] 		= $row['exchange_rate'];
			$return['unit_price_peso'][$ctr] 	= $row['unit_price_peso'];
			$return['withdraw_qty'][$ctr] 		= $row['withdraw_qty'];
			$return['requestor_name'][$ctr] 	= $row['requestor_name'];
			
			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function display_YF_withdrawal(){

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('a.*, SUM(a.withdraw_qty) as withdraw_qty, b.name as requestor_name');
		$table 	   		= 'vw_request_details a';
		$joins 	   		= 'LEFT JOIN db_rapid.tbl_useraccounts b on b.username = a.requested_by';//from INNER JOIN TO LEFT JOIN - to include those that do not have user info 2020-07-06
		$sql_where 		= "WHERE a.department = 'YF' GROUP BY a.material_withdraw_id, a.date_conformed, a.requested_by ASC";
		$sql_order 		= 'ORDER BY a.date, a.product_desc';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			$return['date'][$ctr] 				= $row['date'];
			$return['date_conformed'][$ctr] 	= $row['date_conformed'];
			$return['requested_by'][$ctr] 		= $row['requested_by'];
			$return['department'][$ctr] 		= $row['department'];
			$return['item_category'][$ctr] 		= $row['item_category'];
			$return['justification'][$ctr] 		= $row['justification'];
			
			$return['product_desc'][$ctr] 		= $row['product_desc'];
			$return['product_specs'][$ctr] 		= $row['product_specs'];
			$return['uom'][$ctr] 				= $row['uom'];
			$return['unit_price_dollor'][$ctr] 	= $row['unit_price_dollor'];
			$return['exchange_rate'][$ctr] 		= $row['exchange_rate'];
			$return['unit_price_peso'][$ctr] 	= $row['unit_price_peso'];
			$return['withdraw_qty'][$ctr] 		= $row['withdraw_qty'];
			$return['requestor_name'][$ctr] 	= $row['requestor_name'];
			
			$ctr++;
		}

		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	/* TS details */
	function get_current_stock_TS($id){
		require_once('../oop/oop.php');
		 
		$array_fields 	= array('*');
		$table 			= 'tbl_TS_transaction';
		$joins 			= '';
		$sql_where 		= "WHERE trans_ts_fkid_material = '$id' AND trans_ts_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$boh 			= 0;
		$eoh 			= 0;
		
		while($row 	= mysqli_fetch_array($result)){
			$boh = get_ts_boh( $row['trans_ts_fkid_material'], $row['trans_ts_pkid'], $row['trans_ts_date_transaction']);			
			$eoh = $boh + get_ts_eoh( $row['trans_ts_pkid']);
		}
		return $eoh;
	}
	
	function get_trans_dtls_TS(){
		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$id 			= $_POST['id'];
		 
		$array_fields 	= array('*');
		$table 			= 'tbl_TS_transaction';
		$joins 			= '';
		$sql_where 		= "WHERE trans_ts_fkid_material = '$id' AND trans_ts_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$html 			= '';
		$eoh 			= 0;
		
		while($row 	= mysqli_fetch_array($result)){
			
			$boh = get_ts_boh( $row['trans_ts_fkid_material'], $row['trans_ts_pkid'], $row['trans_ts_date_transaction']);
			
			$eoh = $boh + get_ts_eoh( $row['trans_ts_pkid']);
			
			$html .= '<tr>';
			$html .= '	<td><center><font size="2">'.$row['trans_ts_date_transaction'].'<center></font></td>';
			$html .= '	<td><font size="2">'.$row['trans_ts_supplier'].'</font></td>';
			$html .= '	<td><font size="2">'.$row['trans_ts_invoice_num'].'</font></td>';
			$html .= '	<td><center><font size="2">'.$boh.'</center></font></td>'; //BOH
			$html .= '	<td><center><font size="2">'.$row['trans_ts_in'].'</center></font></td>'; // IN
			$html .= '	<td><center><font size="2">'.$row['trans_ts_out'].'</center></font></td>'; // OUT
			$html .= '	<td><center><font size="2">'.$eoh.'</center></font></td>'; //EOH
			$html .= '	<td><center><font size="2">'.$row['trans_ts_dept'].'</center></font></td>'; // OUT
			$html .= '	<td><center><font size="2">'.$row['trans_ts_remarks'].'</center></font></td>'; // OUT
			$html .= '</tr>';
		}
				
		$return['eoh'] 		= $eoh;
		$return['html'] 	= $html;
		$return['result'] 	= $result;
		$return['script'] 	= $script;
		echo json_encode($return);
	}
	
	function get_ts_boh($trans_ts_fkid_material,$trans_ts_pkid,$trans_ts_date_transaction){
		
		$array_fields 	= array(' IFNULL( SUM( `trans_ts_in` ) , 0 ) - IFNULL( SUM( `trans_ts_out` ) , 0 ) AS boh ');
		$table 			= 'tbl_TS_transaction';
		$joins 			= '';
		$sql_where 		= " WHERE trans_ts_fkid_material = '$trans_ts_fkid_material' AND trans_ts_pkid < '$trans_ts_pkid' AND trans_ts_logdel = '0' ";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$boh = 0;
		
		while($row = mysqli_fetch_array($result)){
			
			$boh = $row['boh'];
			
		}
		
		return $boh;
		
	}
	
	function get_ts_eoh($trans_ts_pkid){
		
		$array_fields 	= array(' IFNULL( `trans_ts_in` , 0 ) - IFNULL( `trans_ts_out` , 0 ) AS eoh');
		$table 			= 'tbl_TS_transaction';
		$joins 			= '';
		$sql_where 		= "WHERE `trans_ts_pkid` = '$trans_ts_pkid' AND trans_ts_logdel = '0'";		
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		while($row = mysqli_fetch_array($result)){
			
			$eoh = $row['eoh'];
			
		}
		
		return $eoh;
	}
	
	function display_TS_recieved_info(){

		require_once('../oop/oop.php');
	
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'vw_received_materials_TS';
		$joins 	   		= '';
		$sql_where 		= "";
		$sql_order 		= 'ORDER BY rm_ts_date_received DESC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_unit_price_dollor'][$ctr]	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			
			$return['rm_ts_pkid'][$ctr] 			= $row['rm_ts_pkid'];
			$return['rm_ts_date_received'][$ctr] 	= $row['rm_ts_date_received'];
			$return['rm_ts_supplier'][$ctr] 		= $row['rm_ts_supplier'];
			$return['rm_ts_invoice_num'][$ctr] 		= $row['rm_ts_invoice_num'];
			$return['rm_ts_rcv_qty'][$ctr] 			= $row['rm_ts_rcv_qty'];
			$return['rm_ts_remarks'][$ctr] 			= $row['rm_ts_remarks'];
			
			$ctr++;
			
		}
		
		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function view_received_details_ts(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('*');
		$table 	   		= 'vw_received_materials_TS';
		$joins 	   		= '';
		$sql_where		= "WHERE rm_ts_pkid = '".$return['id']."' ";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mp_pkid'][$ctr] 					= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 			= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 			= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 					= $row['mat_uom'];
			$return['mp_unit_price_dollor'][$ctr] 		= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 			= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 		= $row['mp_unit_price_peso'];
			
			$return['rm_ts_pkid'][$ctr] 				= $row['rm_ts_pkid'];
			$return['rm_ts_date_received'][$ctr] 		= $row['rm_ts_date_received'];
			$return['rm_ts_supplier'][$ctr] 			= $row['rm_ts_supplier'];
			$return['rm_ts_invoice_num'][$ctr] 			= $row['rm_ts_invoice_num'];
			$return['rm_ts_rcv_qty'][$ctr] 				= $row['rm_ts_rcv_qty'];
			$return['rm_ts_remarks'][$ctr] 				= $row['rm_ts_remarks'];
			
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
	}	
	
	function update_recieved_info_ts(){
		
		require_once('../oop/oop.php');
		
		$id_rcvd_dtls_TS	= $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_receive_materials_TS';
		$array_fields 	= array('rm_ts_supplier', 'rm_ts_invoice_num', 'rm_ts_remarks');
		$array_values 	= array($return['name_uts_supp_name'], 
								$return['name_uts_rcv_inv_no'],
								$return['name_uts_rcv_remarks']);
		$where_table 	= 'rm_ts_pkid';
		$id 			= $id_rcvd_dtls_TS;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		/* Get ID */	
		$result 		= '';
		$array_fields 	= array('rm_ts_pkid');
		$table 	   		= 'tbl_receive_materials_TS';
		$joins 	   		= '';
		$sql_where 		= ''; 
		$sql_order 		= 'ORDER BY rm_ts_pkid DESC';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['rm_ts_pkid'] 		= $row['rm_ts_pkid']; 
		} 

		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	/* PPS details*/
	function get_current_stock_PPS($id){
		require_once('../oop/oop.php');
		 
		$array_fields 	= array('*');
		$table 			= 'tbl_PPS_transaction';
		$joins 			= '';
		$sql_where 		= "WHERE trans_pps_fkid_material = '$id' AND trans_pps_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$boh 			= 0;
		$eoh 			= 0;
		
		while($row 	= mysqli_fetch_array($result)){
			$boh = get_pps_boh( $row['trans_pps_fkid_material'], $row['trans_pps_pkid'], $row['trans_pps_date_transaction']);			
			$eoh = $boh + get_pps_eoh( $row['trans_pps_pkid']);
		}
		return $eoh;
	}
	
	function get_trans_dtls_PPS(){
		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$id 			= $_POST['id'];
		// $id 			= 6;
		
		$array_fields 	= array('*');
		$table 			= 'tbl_PPS_transaction';
		$joins 			= '';
		$sql_where 		= "WHERE trans_pps_fkid_material = '$id' AND trans_pps_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$html 			= '';
		$eoh 			= 0;
		
		while($row 	= mysqli_fetch_array($result)){
			
			$boh = get_pps_boh( $row['trans_pps_fkid_material'], $row['trans_pps_pkid'], $row['trans_pps_date_transaction']);
			$eoh = $boh + get_pps_eoh( $row['trans_pps_pkid'] );
			
			$html .= '<tr>';
			$html .= '	<td><center><font size="2">'.$row['trans_pps_date_transaction'].'<center></font></td>';
			$html .= '	<td><font size="2">'.$row['trans_pps_supplier'].'</font></td>';
			$html .= '	<td><font size="2">'.$row['trans_pps_invoice_num'].'</font></td>';
			$html .= '	<td><center><font size="2">'.$boh.'</center></font></td>'; //BOH
			$html .= '	<td><center><font size="2">'.$row['trans_pps_in'].'</center></font></td>'; // IN
			$html .= '	<td><center><font size="2">'.$row['trans_pps_out'].'</center></font></td>'; // OUT
			$html .= '	<td><center><font size="2">'.$eoh.'</center></font></td>'; //EOH
			$html .= '	<td><center><font size="2">'.$row['trans_pps_dept'].'</center></font></td>'; // OUT
			$html .= '	<td><center><font size="2">'.$row['trans_pps_remarks'].'</center></font></td>'; // OUT
			$html .= '</tr>';
												
		}
				
		$return['eoh'] 		= $eoh;
		$return['html'] 	= $html;
		$return['result'] 	= $result;
		$return['script'] 	= $script;
		echo json_encode($return);
		
	}
	
	function get_pps_boh($trans_pps_fkid_material,$trans_pps_pkid,$trans_pps_date_transaction){
		
		$array_fields 	= array(' IFNULL( SUM( `trans_pps_in` ) , 0 ) - IFNULL( SUM( `trans_pps_out` ) , 0 ) AS boh ');
		$table 			= 'tbl_PPS_transaction';
		$joins 			= '';
		$sql_where 		= " WHERE trans_pps_fkid_material = '$trans_pps_fkid_material' AND trans_pps_pkid < '$trans_pps_pkid' AND trans_pps_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		while($row = mysqli_fetch_array($result)){
			
			$boh = $row['boh'];
			
		}
		
		return $boh;
		
	}
	
	function get_pps_eoh($trans_pps_pkid){
		
		$array_fields 	= array(' IFNULL( `trans_pps_in` , 0 ) - IFNULL( `trans_pps_out` , 0 ) AS eoh');
		$table 			= 'tbl_PPS_transaction';
		$joins 			= '';
		$sql_where 		= "WHERE `trans_pps_pkid` = '$trans_pps_pkid' AND trans_pps_logdel = '0'";		
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		while($row = mysqli_fetch_array($result)){
			
			$eoh = $row['eoh'];
			
		}
		
		return $eoh;
	}
	
	function display_PPS_recieved_info(){

		require_once('../oop/oop.php');
	
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'vw_received_materials_PPS';
		$joins 	   		= '';
		$sql_where 		= "";
		$sql_order 		= 'ORDER BY rm_pps_date_received DESC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_unit_price_dollor'][$ctr]	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			
			$return['rm_pps_pkid'][$ctr] 			= $row['rm_pps_pkid'];
			$return['rm_pps_date_received'][$ctr] 	= $row['rm_pps_date_received'];
			$return['rm_pps_supplier'][$ctr] 		= $row['rm_pps_supplier'];
			$return['rm_pps_invoice_num'][$ctr] 	= $row['rm_pps_invoice_num'];
			$return['rm_pps_rcv_qty'][$ctr] 		= $row['rm_pps_rcv_qty'];
			$return['rm_pps_remarks'][$ctr] 		= $row['rm_pps_remarks'];
			
			$ctr++;
			
		}
		
		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function view_received_details_pps(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('*');
		$table 	   		= 'vw_received_materials_PPS';
		$joins 	   		= '';
		$sql_where		= "WHERE rm_pps_pkid = '".$return['id']."' ";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mp_pkid'][$ctr] 					= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 			= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 			= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 					= $row['mat_uom'];
			$return['mp_unit_price_dollor'][$ctr] 		= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 			= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 		= $row['mp_unit_price_peso'];
			
			$return['rm_pps_pkid'][$ctr] 				= $row['rm_pps_pkid'];
			$return['rm_pps_date_received'][$ctr] 		= $row['rm_pps_date_received'];
			$return['rm_pps_supplier'][$ctr] 			= $row['rm_pps_supplier'];
			$return['rm_pps_invoice_num'][$ctr] 		= $row['rm_pps_invoice_num'];
			$return['rm_pps_rcv_qty'][$ctr] 			= $row['rm_pps_rcv_qty'];
			$return['rm_pps_remarks'][$ctr] 			= $row['rm_pps_remarks'];
			
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
	}	
	
	function update_recieved_info_pps(){
		
		require_once('../oop/oop.php');
		
		$id_rcvd_dtls_PPS	= $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_receive_materials_PPS';
		$array_fields 	= array('rm_pps_supplier', 'rm_pps_invoice_num', 'rm_pps_remarks');
		$array_values 	= array($return['name_upps_supp_name'], 
								$return['name_upps_rcv_inv_no'],
								$return['name_upps_rcv_remarks']);
		$where_table 	= 'rm_pps_pkid';
		$id 			= $id_rcvd_dtls_PPS;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		/* Get ID */	
		$result 		= '';
		$array_fields 	= array('rm_pps_pkid');
		$table 	   		= 'tbl_receive_materials_PPS';
		$joins 	   		= '';
		$sql_where 		= ''; 
		$sql_order 		= 'ORDER BY rm_pps_pkid DESC';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['rm_pps_pkid'] 		= $row['rm_pps_pkid']; 
		} 

		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	/* CN details*/
	function get_current_stock_CN($id){
		require_once('../oop/oop.php');
		 
		$array_fields 	= array('*');
		$table 			= 'tbl_CN_transaction';
		$joins 			= '';
		$sql_where 		= "WHERE trans_cn_fkid_material = '$id' AND trans_cn_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$boh 			= 0;
		$eoh 			= 0;
		
		while($row 	= mysqli_fetch_array($result)){
			$boh = get_cn_boh( $row['trans_cn_fkid_material'], $row['trans_cn_pkid'], $row['trans_cn_date_transaction']);			
			$eoh = $boh + get_cn_eoh( $row['trans_cn_pkid']);
		}
		return $eoh;
	}
	
	function get_trans_dtls_CN(){
		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$id 			= $_POST['id'];
		
		$array_fields 	= array('*');
		$table 			= 'tbl_CN_transaction';
		$joins 			= '';
		$sql_where 		= "WHERE trans_cn_fkid_material = '$id' AND trans_cn_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$html 			= '';
		$eoh 			= 0;
		
		while($row 	= mysqli_fetch_array($result)){
			
			$boh = get_cn_boh( $row['trans_cn_fkid_material'], $row['trans_cn_pkid'], $row['trans_cn_date_transaction']);
			
			$eoh = $boh + get_cn_eoh( $row['trans_cn_pkid'] );
			
			$html .= '<tr>';
			$html .= '	<td><center><font size="2">'.$row['trans_cn_date_transaction'].'<center></font></td>';
			$html .= '	<td><font size="2">'.$row['trans_cn_supplier'].'</font></td>';
			$html .= '	<td><font size="2">'.$row['trans_cn_invoice_num'].'</font></td>';
			$html .= '	<td><center><font size="2">'.$boh.'</center></font></td>'; //BOH
			$html .= '	<td><center><font size="2">'.$row['trans_cn_in'].'</center></font></td>'; // IN
			$html .= '	<td><center><font size="2">'.$row['trans_cn_out'].'</center></font></td>'; // OUT
			$html .= '	<td><center><font size="2">'.$eoh.'</center></font></td>'; //EOH
			$html .= '	<td><center><font size="2">'.$row['trans_cn_dept'].'</center></font></td>'; // OUT
			$html .= '	<td><center><font size="2">'.$row['trans_cn_remarks'].'</center></font></td>'; // OUT
			$html .= '</tr>';
		}
				
		$return['eoh'] 		= $eoh;
		$return['html'] 	= $html;
		$return['result'] 	= $result;
		$return['script'] 	= $script;
		echo json_encode($return);
		
	}
	
	function get_cn_boh($trans_cn_fkid_material,$trans_cn_pkid,$trans_cn_date_transaction){
		
		$array_fields 	= array(' IFNULL( SUM( `trans_cn_in` ) , 0 ) - IFNULL( SUM( `trans_cn_out` ) , 0 ) AS boh ');
		$table 			= 'tbl_CN_transaction';
		$joins 			= '';
		// $sql_where 		= " WHERE trans_cn_fkid_material = '$trans_cn_fkid_material' AND trans_cn_date_transaction <= '$trans_cn_date_transaction' AND trans_cn_pkid < '$trans_cn_pkid' ";
		$sql_where 		= " WHERE trans_cn_fkid_material = '$trans_cn_fkid_material' AND trans_cn_pkid < '$trans_cn_pkid' AND trans_cn_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		while($row = mysqli_fetch_array($result)){
			
			$boh = $row['boh'];
			
		}
		
		return $boh;
		
	}
	
	function get_cn_eoh($trans_cn_pkid){
		
		$array_fields 	= array(' IFNULL( `trans_cn_in` , 0 ) - IFNULL( `trans_cn_out` , 0 ) AS eoh');
		$table 			= 'tbl_CN_transaction';
		$joins 			= '';
		$sql_where 		= "WHERE `trans_cn_pkid` = '$trans_cn_pkid' AND trans_cn_logdel = '0'";		
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		while($row = mysqli_fetch_array($result)){
			
			$eoh = $row['eoh'];
			
		}
		
		return $eoh;
	}
	
	function display_CN_recieved_info(){

		require_once('../oop/oop.php');
	
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'vw_received_materials_CN';
		$joins 	   		= '';
		$sql_where 		= "";
		$sql_order 		= 'ORDER BY rm_cn_date_received DESC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_unit_price_dollor'][$ctr]	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			
			$return['rm_cn_pkid'][$ctr] 			= $row['rm_cn_pkid'];
			$return['rm_cn_date_received'][$ctr] 	= $row['rm_cn_date_received'];
			$return['rm_cn_supplier'][$ctr] 		= $row['rm_cn_supplier'];
			$return['rm_cn_invoice_num'][$ctr] 		= $row['rm_cn_invoice_num'];
			$return['rm_cn_rcv_qty'][$ctr] 			= $row['rm_cn_rcv_qty'];
			$return['rm_cn_remarks'][$ctr] 			= $row['rm_cn_remarks'];
			
			$ctr++;
			
		}
		
		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function view_received_details_cn(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('*');
		$table 	   		= 'vw_received_materials_CN';
		$joins 	   		= '';
		$sql_where		= "WHERE rm_cn_pkid = '".$return['id']."' ";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mp_pkid'][$ctr] 					= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 			= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 			= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 					= $row['mat_uom'];
			$return['mp_unit_price_dollor'][$ctr] 		= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 			= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 		= $row['mp_unit_price_peso'];
			
			$return['rm_cn_pkid'][$ctr] 			= $row['rm_cn_pkid'];
			$return['rm_cn_date_received'][$ctr] 	= $row['rm_cn_date_received'];
			$return['rm_cn_supplier'][$ctr] 		= $row['rm_cn_supplier'];
			$return['rm_cn_invoice_num'][$ctr] 		= $row['rm_cn_invoice_num'];
			$return['rm_cn_rcv_qty'][$ctr] 			= $row['rm_cn_rcv_qty'];
			$return['rm_cn_remarks'][$ctr] 			= $row['rm_cn_remarks'];
			
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
	}	
	
	function update_recieved_info_cn(){
		
		require_once('../oop/oop.php');
		
		$id_rcvd_dtls_CN	= $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_receive_materials_CN';
		$array_fields 	= array('rm_cn_supplier', 'rm_cn_invoice_num', 'rm_cn_remarks');
		$array_values 	= array($return['name_ucn_supp_name'], 
								$return['name_ucn_rcv_inv_no'],
								$return['name_ucn_rcv_remarks']);
		$where_table 	= 'rm_cn_pkid';
		$id 			= $id_rcvd_dtls_CN;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		/* Get ID */	
		$result 		= '';
		$array_fields 	= array('rm_cn_pkid');
		$table 	   		= 'tbl_receive_materials_CN';
		$joins 	   		= '';
		$sql_where 		= ''; 
		$sql_order 		= 'ORDER BY rm_cn_pkid DESC';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['rm_cn_pkid'] 		= $row['rm_cn_pkid']; 
		} 

		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	/* YF details*/
	function get_current_stock_YF($id){
		require_once('../oop/oop.php');
		 
		$array_fields 	= array('*');
		$table 			= 'tbl_YF_transaction';
		$joins 			= '';
		$sql_where 		= "WHERE trans_yf_fkid_material = '$id' AND trans_yf_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$boh 			= 0;
		$eoh 			= 0;
		
		while($row 	= mysqli_fetch_array($result)){
			$boh = get_yf_boh( $row['trans_yf_fkid_material'], $row['trans_yf_pkid'], $row['trans_yf_date_transaction']);			
			$eoh = $boh + get_yf_eoh( $row['trans_yf_pkid']);
		}
		return $eoh;
	}
	
	function get_trans_dtls_YF(){
		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$id 			= $_POST['id'];
		
		$array_fields 	= array('*');
		$table 			= 'tbl_YF_transaction';
		$joins 			= '';
		$sql_where 		= "WHERE trans_yf_fkid_material = '$id' AND trans_yf_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$html 			= '';
		$eoh 			= 0;
		
		while($row 	= mysqli_fetch_array($result)){
			
			$boh = get_yf_boh( $row['trans_yf_fkid_material'], $row['trans_yf_pkid'], $row['trans_yf_date_transaction']);
			
			$eoh = $boh + get_yf_eoh( $row['trans_yf_pkid'] );
			
			$html .= '<tr>';
			$html .= '	<td><center><font size="2">'.$row['trans_yf_date_transaction'].'<center></font></td>';
			$html .= '	<td><font size="2">'.$row['trans_yf_supplier'].'</font></td>';
			$html .= '	<td><font size="2">'.$row['trans_yf_invoice_num'].'</font></td>';
			$html .= '	<td><center><font size="2">'.$boh.'</center></font></td>'; //BOH
			$html .= '	<td><center><font size="2">'.$row['trans_yf_in'].'</center></font></td>'; // IN
			$html .= '	<td><center><font size="2">'.$row['trans_yf_out'].'</center></font></td>'; // OUT
			$html .= '	<td><center><font size="2">'.$eoh.'</center></font></td>'; //EOH
			$html .= '	<td><center><font size="2">'.$row['trans_yf_dept'].'</center></font></td>'; // OUT
			$html .= '	<td><center><font size="2">'.$row['trans_yf_remarks'].'</center></font></td>'; // OUT
			$html .= '</tr>';
		}
				
		$return['eoh'] 		= $eoh;
		$return['html'] 	= $html;
		$return['result'] 	= $result;
		$return['script'] 	= $script;
		echo json_encode($return);
		
	}
	
	function get_yf_boh($trans_yf_fkid_material,$trans_yf_pkid,$trans_yf_date_transaction){
		
		$array_fields 	= array(' IFNULL( SUM( `trans_yf_in` ) , 0 ) - IFNULL( SUM( `trans_yf_out` ) , 0 ) AS boh ');
		$table 			= 'tbl_YF_transaction';
		$joins 			= '';
		// $sql_where 		= " WHERE trans_yf_fkid_material = '$trans_yf_fkid_material' AND trans_yf_date_transaction <= '$trans_yf_date_transaction' AND trans_yf_pkid < '$trans_yf_pkid' ";
		$sql_where 		= " WHERE trans_yf_fkid_material = '$trans_yf_fkid_material' AND trans_yf_pkid < '$trans_yf_pkid' AND trans_yf_logdel = '0'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		while($row = mysqli_fetch_array($result)){
			
			$boh = $row['boh'];
			
		}
		
		return $boh;
		
	}
	
	function get_yf_eoh($trans_yf_pkid){
		
		$array_fields 	= array(' IFNULL( `trans_yf_in` , 0 ) - IFNULL( `trans_yf_out` , 0 ) AS eoh');
		$table 			= 'tbl_YF_transaction';
		$joins 			= '';
		$sql_where 		= "WHERE `trans_yf_pkid` = '$trans_yf_pkid' AND trans_yf_logdel = '0'";		
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		while($row = mysqli_fetch_array($result)){
			
			$eoh = $row['eoh'];
			
		}
		
		return $eoh;
	}
	
	function display_YF_recieved_info(){

		require_once('../oop/oop.php');
	
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'vw_received_materials_YF';
		$joins 	   		= '';
		$sql_where 		= "";
		$sql_order 		= 'ORDER BY rm_yf_date_received DESC';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 				= $row['mat_uom'];
			
			$return['mp_unit_price_dollor'][$ctr]	= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 		= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 	= $row['mp_unit_price_peso'];
			
			$return['rm_yf_pkid'][$ctr] 			= $row['rm_yf_pkid'];
			$return['rm_yf_date_received'][$ctr] 	= $row['rm_yf_date_received'];
			$return['rm_yf_supplier'][$ctr] 		= $row['rm_yf_supplier'];
			$return['rm_yf_invoice_num'][$ctr] 		= $row['rm_yf_invoice_num'];
			$return['rm_yf_rcv_qty'][$ctr] 			= $row['rm_yf_rcv_qty'];
			$return['rm_yf_remarks'][$ctr] 			= $row['rm_yf_remarks'];
			
			$ctr++;
			
		}
		
		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function view_received_details_yf(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('*');
		$table 	   		= 'vw_received_materials_YF';
		$joins 	   		= '';
		$sql_where		= "WHERE rm_yf_pkid = '".$return['id']."' ";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
		
			$return['mp_pkid'][$ctr] 					= $row['mp_pkid'];
			$return['mat_product_desc'][$ctr] 			= $row['mat_product_desc'];
			$return['mat_product_specs'][$ctr] 			= $row['mat_product_specs'];
			$return['mat_uom'][$ctr] 					= $row['mat_uom'];
			$return['mp_unit_price_dollor'][$ctr] 		= $row['mp_unit_price_dollor'];
			$return['mp_exchange_rate'][$ctr] 			= $row['mp_exchange_rate'];
			$return['mp_unit_price_peso'][$ctr] 		= $row['mp_unit_price_peso'];
			
			$return['rm_yf_pkid'][$ctr] 			= $row['rm_yf_pkid'];
			$return['rm_yf_date_received'][$ctr] 	= $row['rm_yf_date_received'];
			$return['rm_yf_supplier'][$ctr] 		= $row['rm_yf_supplier'];
			$return['rm_yf_invoice_num'][$ctr] 		= $row['rm_yf_invoice_num'];
			$return['rm_yf_rcv_qty'][$ctr] 			= $row['rm_yf_rcv_qty'];
			$return['rm_yf_remarks'][$ctr] 			= $row['rm_yf_remarks'];
			
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
	}	
	
	function update_recieved_info_yf(){
		
		require_once('../oop/oop.php');
		
		$id_rcvd_dtls_YF	= $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_receive_materials_YF';
		$array_fields 	= array('rm_yf_supplier', 'rm_yf_invoice_num', 'rm_yf_remarks');
		$array_values 	= array($return['name_uyf_supp_name'], 
								$return['name_uyf_rcv_inv_no'],
								$return['name_uyf_rcv_remarks']);
		$where_table 	= 'rm_yf_pkid';
		$id 			= $id_rcvd_dtls_YF;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		/* Get ID */	
		$result 		= '';
		$array_fields 	= array('rm_yf_pkid');
		$table 	   		= 'tbl_receive_materials_YF';
		$joins 	   		= '';
		$sql_where 		= ''; 
		$sql_order 		= 'ORDER BY rm_yf_pkid DESC';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['rm_yf_pkid'] 		= $row['rm_yf_pkid']; 
		} 

		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
		
	/* Update */
	function conformed_request_by_requestor(){
		
		require_once('../oop/oop.php');
		
		$id 		= $_POST['id'];
		$lastupdate 	= date("Y-m-d");
		// $lastupdate = '2018-08-20';
			
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_request';
		$array_fields 	= array('req_status', 'req_conformed_date');
		$array_values 	= array('6', $lastupdate);
		$where_table 	= 'req_pkid';
		$id 			= $id;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		$result_test 	= INVS::getInstance()->update_query_test($table,$array_fields,$array_values,$where_table,$id);
		
		/* Get Department */
		require_once('../oop/oop.php');
		
		$result 		= '';
		$array_fields 	= array('req_pkid, req_department');
		$table 	   		= 'tbl_request';
		$joins 	   		= '';
		$sql_where 		= "WHERE req_pkid = '$id'"; 
		$sql_order 		= '';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['req_pkid'] 		= $row['req_pkid']; 
			$return['req_department'] 	= $row['req_department']; 
		} 

		
		$return['result_test']  = $result_test;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
		
	}
	
	function update_stock_qty(){  
		
		require_once('../oop/oop.php');
		
		$id 			= $_POST['id'];
		$department 	= $_POST['dept'];

		/* Get Withdraw items */
		require_once('../oop/oop.php');
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'tbl_withdraw_items';
		$joins 	   		= '';
		$sql_where 		= "WHERE ci_fkid_req = '$id' AND ci_dept = '$department'"; 
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		$ctr = 0;
		
		while($row = mysqli_fetch_array($result)){
			
			$return['ci_fkid_req'][$ctr]	= $row['ci_fkid_req']; 
			$return['ci_dept'][$ctr]		= $row['ci_dept']; 
			$return['ci_req_item_id'][$ctr] = $row['ci_req_item_id']; 
			$return['ci_req_qty'][$ctr] 	= $row['ci_req_qty']; 
			$ci_dept			 			= $row['ci_dept']; 
			$req_item_id			 		= $row['ci_req_item_id']; 
			$req_qty		 				= $row['ci_req_qty']; 
			$ctr++;
		
		
			/* Get req. items id */
				/* if ( $ci_dept == 'TS' ){
					
					$result1 		= '';
					$array_fields 	= array('*');
					$table 	   		= 'tbl_idm_TS';
					$joins 	   		= '';
					$sql_where 		= "WHERE idmTS_pkid = '$req_item_id'"; 
					$sql_order 		= '';
					$sql_limit 		= '';
					$result1 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
					$script1[] 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
					
					if (!$result1) {
						echo mysql_error();
					}
				
					$ctr1 = 0;
				
					while($row1 = mysqli_fetch_array($result1)){
						
						$return['idmTS_stock_qty'][$ctr1] 	= $row1['idmTS_stock_qty']; 
						$idmTS_stock_qty				 	= $row1['idmTS_stock_qty']; 
						$ctr1++;
					} 
					
					$TS_stock_qty = $idmTS_stock_qty - $req_qty;
					
					$return['update_result_ts'] 	= update_TS_stock_inventory($req_item_id, $TS_stock_qty);
					$return['update_result_ts1'] 	= update_TS_stock_inventory_script($req_item_id, $TS_stock_qty);
 
				} 
				else if ( $ci_dept == 'CN' ) {
					
					$result1 		= '';
					$array_fields 	= array('*');
					$table 	   		= 'tbl_idm_CN';
					$joins 	   		= '';
					$sql_where 		= "WHERE idmCN_pkid = '$req_item_id'"; 
					$sql_order 		= '';
					$sql_limit 		= '';
					$result1 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
					$script1[] 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
					
					if (!$result1) {
						echo mysql_error();
					}
				
					$ctr1 = 0;
				
					while($row1 = mysqli_fetch_array($result1)){
						
						$return['idmCN_stock_qty'][$ctr1] 	= $row1['idmCN_stock_qty']; 
						$idmCN_stock_qty				 	= $row1['idmCN_stock_qty']; 
						$ctr1++;
					} 
					
					$CN_stock_qty = $idmCN_stock_qty - $req_qty;
					
					$return['update_result_cn'] 	= update_CN_stock_inventory($req_item_id, $CN_stock_qty);
					$return['update_result_cn1'] 	= update_CN_stock_inventory_script($req_item_id, $CN_stock_qty);
					
				} */
				
		} 
		
		/* Get items list*/
		/* $result 		= '';
		$array_fields 	= array('a.*, b.*');
		$table 	   		= 'tbl_material_list a';
		$joins 	   		= 'INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid';
		$sql_where 		= "WHERE b.mp_pkid = '$req_item_id'"; 
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		$ctr = 0;
		
		while($row = mysqli_fetch_array($result)){
			
			$return['mat_product_desc'][$ctr] 		= $row['mat_product_desc']; 
			$return['mat_product_specs'][$ctr] 		= $row['mat_product_specs']; 
			$return['mat_uom'][$ctr] 				= $row['mat_uom']; 
			
			$return['mp_pkid'][$ctr] 				= $row['mp_pkid']; 
			$return['mp_fkid_material_list'][$ctr] 	= $row['mp_fkid_material_list']; 
			$return['mp_stock_qty'][$ctr] 			= $row['mp_stock_qty']; 
			$mp_pkid			 					= $row['mp_pkid']; 
			$mp_stock_qty			 				= $row['mp_stock_qty']; 
			$ctr++;
		}  */
				
		$return['result'] 	= json_encode($result);
		$return['script'] 	= json_encode($script);
		// $return['script1'] 	= $script1;
		// $return['result1'] 	= $result1;
		echo json_encode($return);
		
	}
	
	function update_TS_stock_inventory($req_item_id, $TS_stock_qty){
		require_once('../oop/oop.php');
		$update_result_ts = INVS::getInstance()->update_TS_stock_inventory($req_item_id, $TS_stock_qty);
		return $update_result_ts;
	}
	
	function update_TS_stock_inventory_script($req_item_id, $TS_stock_qty){
		require_once('../oop/oop.php');
		$update_result_ts1 = INVS::getInstance()->update_TS_stock_inventory_script($req_item_id, $TS_stock_qty);
		return $update_result_ts1;
	}
	
	function update_CN_stock_inventory($req_item_id, $CN_stock_qty){
		require_once('../oop/oop.php');
		$update_result_cn = INVS::getInstance()->update_CN_stock_inventory($req_item_id, $CN_stock_qty);
		return $update_result_cn;
	}
	
	function update_CN_stock_inventory_script($req_item_id, $CN_stock_qty){
		require_once('../oop/oop.php');
		$update_result_cn1 = INVS::getInstance()->update_CN_stock_inventory_script($req_item_id, $CN_stock_qty);
		return $update_result_cn1;
	}
	
	function update_stock_inventory($req_item_id, $TS_dept_qty, $PPS_dept_qty, $CN_dept_qty, $YF_dept_qty, $stock_qty){
		require_once('../oop/oop.php');
		$update_result = INVS::getInstance()->update_stock_inventory($req_item_id, $TS_dept_qty, $PPS_dept_qty, $CN_dept_qty, $YF_dept_qty, $stock_qty);
		return $update_result;
	}
	
	function update_stock_inventory_script($req_item_id, $TS_dept_qty, $PPS_dept_qty, $CN_dept_qty, $YF_dept_qty, $stock_qty){ //hanggang dito
		require_once('../oop/oop.php');
		$update_result1 = INVS::getInstance()->update_stock_inventory_script($req_item_id, $TS_dept_qty, $PPS_dept_qty, $CN_dept_qty, $YF_dept_qty, $stock_qty);
		return $update_result1;
	}
	
	function update_material_price(){
		
		require_once('../oop/oop.php');
		
		$id_matls_inventory = $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_material_list_price';
		$array_fields 	= array('mp_unit_price_dollor', 'mp_exchange_rate', 'mp_unit_price_peso', 'mp_TS', 'mp_PPS', 'mp_CN', 'mp_YF', 'mp_stock_qty');
		$array_values 	= array($return['name_ump_unit_dollor'], 
								$return['name_ump_exchange_rate'], 
								$return['name_ump_unit_peso'], 
								$return['name_ts_ump_stock_qty'], 
								$return['name_pps_ump_stock_qty'], 
								$return['name_cn_ump_stock_qty'], 
								$return['name_yf_ump_stock_qty'], 
								$return['name_ump_stock_qty']);
		$where_table 	= 'mp_pkid';
		$id 			= $id_matls_inventory;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		/* Get ID */	
		$result 		= '';
		$array_fields 	= array('mp_pkid');
		$table 	   		= 'tbl_material_list_price';
		$joins 	   		= '';
		$sql_where 		= ''; 
		$sql_order 		= 'ORDER BY mp_pkid DESC';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['mp_pkid'] 		= $row['mp_pkid']; 
			$mp_pkid				= $row['mp_pkid']; 
		} 

		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function update_material_info(){
		
		require_once('../oop/oop.php');
		
		$id_mtls_info 	= $_POST['id'];
		$lastupdate 	= date("Y-m-d H:i:s");
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_material_list';
		$array_fields 	= array('mat_product_desc', 'mat_product_specs', 'mat_uom', 'lastupdate', 'username');
		$array_values 	= array($return['name_umtls_info_prod_desc'], 
								$return['name_umtls_info_specs'], 
								$return['name_umtls_info_uom'], 
								$lastupdate,
								$return['name_umtls_info_encoded_by']);
		$where_table 	= 'mat_pkid';
		$id 			= $id_mtls_info;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		/* Get ID */	
		$result 		= '';
		$array_fields 	= array('mat_pkid');
		$table 	   		= 'tbl_material_list';
		$joins 	   		= '';
		$sql_where 		= ''; 
		$sql_order 		= 'ORDER BY mat_pkid DESC';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['mat_pkid'] 		= $row['mat_pkid']; 
		} 

		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function update_request(){
		
		require_once('../oop/oop.php');
		
		$id_update = $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_request';
		$array_fields 	= array('req_status', 'req_department', 'req_section', 'req_TS_product', 'req_justification');
		$array_values 	= array('0', $return['name_ureq_dept'], $return['name_ureq_section'], $return['name_ureq_ts_product'], $return['name_ureq_justi']);
		$where_table 	= 'req_pkid';
		$id 			= $id_update;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		$test_result 	= INVS::getInstance()->update_query_test($table,$array_fields,$array_values,$where_table,$id);
		
		$return['result'] 		= json_encode($result);
		$return['test_result']  = $test_result;
		echo json_encode($return);
		
	}	
	
	function update_material_dtls(){
		
		require_once('../oop/oop.php');
		
		$id_mtls_dtls	= $_POST['id'];
		$lastupdate 	= date("Y-m-d H:i:s");
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_material_list_price';
		$array_fields 	= array('mp_unit_price_dollor', 'mp_exchange_rate', 'mp_unit_price_peso', 'lastupdate', 'username');
		$array_values 	= array($return['name_umtls_dtls_dollor'], 
								$return['name_umtls_dtls_exc'], 
								$return['name_umtls_dtls_peso'],
								$lastupdate,
								$return['name_umtls_info_encoded_by']);
		$where_table 	= 'mp_pkid';
		$id 			= $id_mtls_dtls;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		/* Get ID */	
		$result 		= '';
		$array_fields 	= array('mp_pkid');
		$table 	   		= 'tbl_material_list_price';
		$joins 	   		= '';
		$sql_where 		= ''; 
		$sql_order 		= 'ORDER BY mp_pkid DESC';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['mp_pkid'] 		= $row['mp_pkid']; 
		} 

		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function update_material_dtls_TS(){
		
		require_once('../oop/oop.php');
		
		$id_mtls_dtls_TS	= $_POST['id'];
		$lastupdate 	= date("Y-m-d H:i:s");

		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_idm_TS';
		$array_fields 	= array('idmTS_stock_qty', 'lastupdate');
		$array_values 	= array($return['name_umtls_dtls_qty_TS'], 
								$lastupdate);
		$where_table 	= 'idmTS_pkid';
		$id 			= $id_mtls_dtls_TS;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		$result1 		= INVS::getInstance()->update_query_test($table,$array_fields,$array_values,$where_table,$id);
		
		/* Get ID */	
		$result 		= '';
		$array_fields 	= array('idmTS_pkid');
		$table 	   		= 'tbl_idm_TS';
		$joins 	   		= '';
		$sql_where 		= ''; 
		$sql_order 		= 'ORDER BY idmTS_pkid DESC';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['idmTS_pkid'] 		= $row['idmTS_pkid']; 
		} 

		
		$return['result'] = json_encode($result);
		$return['result1'] = $result1;
		echo json_encode($return);
		
	}
	
	function update_material_dtls_PPS(){
		
		require_once('../oop/oop.php');
		
		$id_mtls_dtls_PPS	= $_POST['id'];
		$lastupdate 	= date("Y-m-d H:i:s");
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_idm_PPS';
		$array_fields 	= array('idmPPS_stock_qty', 'lastupdate');
		$array_values 	= array($return['name_umtls_dtls_qty_PPS'], 
								$lastupdate);
		$where_table 	= 'idmPPS_pkid';
		$id 			= $id_mtls_dtls_PPS;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		$result1 		= INVS::getInstance()->update_query_test($table,$array_fields,$array_values,$where_table,$id);
		
		/* Get ID */	
		$result 		= '';
		$array_fields 	= array('idmPPS_pkid');
		$table 	   		= 'tbl_idm_PPS';
		$joins 	   		= '';
		$sql_where 		= ''; 
		$sql_order 		= 'ORDER BY idmPPS_pkid DESC';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['idmPPS_pkid'] 		= $row['idmPPS_pkid']; 
		} 

		
		$return['result'] = json_encode($result);
		$return['result1'] = $result1;
		echo json_encode($return);
		
	}
	
	function update_material_dtls_CN(){
		
		require_once('../oop/oop.php');
		
		$id_mtls_dtls_CN	= $_POST['id'];
		$lastupdate 	= date("Y-m-d H:i:s");
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_idm_CN';
		$array_fields 	= array('idmCN_stock_qty', 'lastupdate');
		$array_values 	= array($return['name_umtls_dtls_qty_CN'], 
								$lastupdate);
		$where_table 	= 'idmCN_pkid';
		$id 			= $id_mtls_dtls_CN;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		$result1 		= INVS::getInstance()->update_query_test($table,$array_fields,$array_values,$where_table,$id);
		
		/* Get ID */	
		$result 		= '';
		$array_fields 	= array('idmCN_pkid');
		$table 	   		= 'tbl_idm_CN';
		$joins 	   		= '';
		$sql_where 		= ''; 
		$sql_order 		= 'ORDER BY idmCN_pkid DESC';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['idmCN_pkid'] 		= $row['idmCN_pkid']; 
		} 

		
		$return['result'] = json_encode($result);
		$return['result1'] = $result1;
		echo json_encode($return);
		
	}
	
	function update_material_dtls_YF(){
		
		require_once('../oop/oop.php');
		
		$id_mtls_dtls_YF	= $_POST['id'];
		$lastupdate 	= date("Y-m-d H:i:s");
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_idm_YF';
		$array_fields 	= array('idmYF_stock_qty', 'lastupdate');
		$array_values 	= array($return['name_umtls_dtls_qty_YF'], 
								$lastupdate);
		$where_table 	= 'idmYF_pkid';
		$id 			= $id_mtls_dtls_YF;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		$result1 		= INVS::getInstance()->update_query_test($table,$array_fields,$array_values,$where_table,$id);
		
		/* Get ID */	
		$result 		= '';
		$array_fields 	= array('idmYF_pkid');
		$table 	   		= 'tbl_idm_YF';
		$joins 	   		= '';
		$sql_where 		= ''; 
		$sql_order 		= 'ORDER BY idmYF_pkid DESC';
		$sql_limit 		= 'LIMIT 0,1';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
			
			$return['idmYF_pkid'] 		= $row['idmYF_pkid']; 
		} 

		
		$return['result'] = json_encode($result);
		$return['result1'] = $result1;
		echo json_encode($return);
		
	}
	
	/* Remove */
	function remove_request(){
		
		require_once('../oop/oop.php');
		
		$id = $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_request';
		$array_fields 	= array('req_logdel');
		$array_values 	= array('1');
		$where_table 	= 'req_pkid';
		$id 			= $id;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function remove_material(){
		
		require_once('../oop/oop.php');
		
		$id = $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_material_list_price';
		$array_fields 	= array('mp_logdel');
		$array_values 	= array('1');
		$where_table 	= 'mp_pkid';
		$id 			= $id;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function remove_item(){
		
		require_once('../oop/oop.php');
		
		$id = $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_request_item_list';
		$array_fields 	= array('ril_logdel');
		$array_values 	= array('1');
		$where_table 	= 'ril_pkid';
		$id 			= $id;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function remove_mtls_info(){
		
		require_once('../oop/oop.php');
		
		$id_mtls_info 	= $_POST['id'];
		$username	 	= $_POST['username'];
		$lastupdate 	= date("Y-m-d H:i:s");
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_material_list';
		$array_fields 	= array('mat_logdel', 'lastupdate', 'username');
		$array_values 	= array('1', $lastupdate, $username);
		$where_table 	= 'mat_pkid';
		$id 			= $id_mtls_info;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function remove_mtls_dtls(){
		
		require_once('../oop/oop.php');
		
		$id_mtls_dtls 	= $_POST['id'];
		$username	 	= $_POST['username'];
		$lastupdate 	= date("Y-m-d H:i:s");

		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_material_list_price';
		$array_fields 	= array('mp_logdel', 'lastupdate', 'username');
		$array_values 	= array('1', $lastupdate, $username);
		$where_table 	= 'mp_pkid';
		$id 			= $id_mtls_dtls;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function remove_mtls_dtls_TS(){
		
		require_once('../oop/oop.php');
		
		$id_mtls_dtls_TS 	= $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_idm_TS';
		$array_fields 	= array('idmTS_logdel');
		$array_values 	= array('1');
		$where_table 	= 'idmTS_pkid';
		$id 			= $id_mtls_dtls_TS;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function remove_mtls_dtls_PPS(){
		
		require_once('../oop/oop.php');
		
		$id_mtls_dtls_PPS 	= $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_material_list_price_PPS';
		$array_fields 	= array('idmPPS_logdel');
		$array_values 	= array('1');
		$where_table 	= 'idmPPS_pkid';
		$id 			= $id_mtls_dtls_PPS;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function remove_mtls_dtls_CN(){
		
		require_once('../oop/oop.php');
		
		$id_mtls_dtls_CN 	= $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_material_list_price_CN';
		$array_fields 	= array('idmCN_logdel');
		$array_values 	= array('1');
		$where_table 	= 'idmCN_pkid';
		$id 			= $id_mtls_dtls_CN;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	function remove_mtls_dtls_YF(){
		
		require_once('../oop/oop.php');
		
		$id_mtls_dtls_YF 	= $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_material_list_price_YF';
		$array_fields 	= array('idmYF_logdel');
		$array_values 	= array('1');
		$where_table 	= 'idmYF_pkid';
		$id 			= $id_mtls_dtls_YF;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}
	
	/* Email Notification */
	function send_email_from_requestor() {
		require_once('../oop/oop.php');
		require_once('../oop/hris_oop.php');
		require_once('send_email.php');
		
		$return = $_POST;
		$ctr = 0;
		
		$select_request_info = INVS::getInstance()->select_request_info_by_pkid($return['pkid']);
		// $select_request_info = INVS::getInstance()->select_request_info_by_pkid(1);
		
		if($row_request = mysqli_fetch_array($select_request_info)) {
			
			$req_status 		= $row_request['req_status'];
			$req_date 			= $row_request['req_date'];
			$req_prepared_by 	= $row_request['req_prepared_by'];
			$req_department 	= $row_request['req_department'];
			$req_section 		= $row_request['req_section'];
			$req_conformer 		= $row_request['req_conformer'];
			$req_supv 			= $row_request['req_supv'];
			$req_item_category 	= $row_request['req_item_category'];
			$req_justification 	= $row_request['req_justification'];
				
			$con_name = INVS::getInstance()->select_employee_info_by_username($req_conformer);
			if($row_con_name = mysqli_fetch_array($con_name)) {
				$conformer_name = $row_con_name['emp_name'];
			}
	
			$req_name = INVS::getInstance()->select_employee_info_by_username($req_prepared_by);
			if($row_req_name = mysqli_fetch_array($req_name)) {
				$requestor_name = $row_req_name['emp_name'];
			}

			$subject = "Material Request";
			$body = "Good day!, You have material request waiting for your conformance. <br>";
			$body .= "Please see details below. <br>";
			$body .= "Thank You..<br><br>";
	
			$body .= "<b>Details of Requests</b> <br>";
			$body .= "Date of Request:			".date('M d, Y',strtotime($req_date))."<br>";
			$body .= "Requestor:				".$requestor_name." <br>";
			$body .= "Department:				".$req_department." <br>";
			$body .= "Section:					".$req_section." <br>";
			$body .= "Item Category:			".$req_item_category." <br>";
			$body .= "Justification:			".$req_justification." <br>";
			$body .= "Item Summary: <br>";
			
			$body .= "<table border='1' class='table table-bordered' id='tbl_item_list'>";
			$body .=  "<thead>";
			$body .=  "	<tr>";
			$body .=  "		<td align='center'>Item Description</center></td>";		
			$body .=  "		<td align='center'>Item Specs</center></td>";
			$body .=  "		<td align='center'>UOM</center></td>";
			$body .=  "		<td align='center'>Qty</center></td>";
			$body .=  "		<td align='center'>Remarks</center></td>";
			$body .="	</tr>"; 
			$body .="</thead>"; 
			
			$ctrFrom = 0;
			$ctrCc = 0;
			
			$select_query_from = INVS::getInstance()->select_email_add($req_prepared_by);
			while($row = mysqli_fetch_array($select_query_from)) {
				
				if($ctrFrom == 0) {
					$from = $row['email_add'];
					$ctrFrom++;
					
					$cc = $row['email_add'];
					$ctrCc++;
					
				} else {
					$from .= "," . $row['email_add'];
					$ctrFrom++;
				}	
			}
			
			$result = INVS::getInstance()->select_item_request($return['pkid']);
			// $result = INVS::getInstance()->select_item_request(1);
				while($row = mysqli_fetch_array($result)) {
					$body .= "<tbody>";
					$body .="	<tr>";
					$body .= "		<td align='left'>".$row['mat_product_desc']."</td>";
					$body .= "		<td align='left'>".$row['mat_product_specs']."</td>";
					$body .= "		<td align='center'>".$row['mat_uom']."</td>";
					$body .= "		<td align='center'>".$row['ril_request_qty']."</td>";
					$body .= "		<td align='left'>".$row['ril_remarks']."</td>";
					$body .= "	</tr>";
					$body .= "</tbody>";	
					$ctrCc++;	
				}
							
			$body .="</table>"; 
			
			$ctrCc = 0;
			$select_query_cc = INVS::getInstance()->select_email_add($req_supv);
			while($row = mysqli_fetch_array($select_query_cc)) {
				$cc .= "," . $row['email_add'];
				$ctrCc++;	
			}	
			
			$ctrTo = 0;
			$select_query_to = INVS::getInstance()->select_email_add_ts_central();
			while($row = mysqli_fetch_array($select_query_to)) {
				if($ctrTo == 0) {
					$to = $row['email_add'];
					$ctrTo++;
				} else {
					$to .= "," . $row['email_add'];
					$ctrTo++;
				}	
			}
			
			// echo $to;	
			// echo $cc;	
			// echo $body;
			$php_email = new email();
			$msg = $php_email->send_email($to, $from, $cc, $subject, $body);
			$return['msg'] = $msg;
			$return['result'] = json_encode($result);
			echo json_encode($return);
		}
	}
	
	function send_email_update_from_requestor() {
		require_once('../oop/oop.php');
		require_once('../oop/hris_oop.php');
		require_once('send_email.php');
		
		$return = $_POST;
		$ctr = 0;
		
		$select_request_info = INVS::getInstance()->select_request_info_by_pkid($return['pkid']);
		// $select_request_info = INVS::getInstance()->select_request_info_by_pkid(1);
		
		if($row_request = mysqli_fetch_array($select_request_info)) {
			
			$req_status 		= $row_request['req_status'];
			$req_date 			= $row_request['req_date'];
			$req_prepared_by 	= $row_request['req_prepared_by'];
			$req_department 	= $row_request['req_department'];
			$req_section 		= $row_request['req_section'];
			$req_conformer 		= $row_request['req_conformer'];
			$req_supv 			= $row_request['req_supv'];
			$req_item_category 	= $row_request['req_item_category'];
			$req_justification 	= $row_request['req_justification'];
				
			$con_name = INVS::getInstance()->select_employee_info_by_username($req_conformer);
			if($row_con_name = mysqli_fetch_array($con_name)) {
				$conformer_name = $row_con_name['emp_name'];
			}
	
			$req_name = INVS::getInstance()->select_employee_info_by_username($req_prepared_by);
			if($row_req_name = mysqli_fetch_array($req_name)) {
				$requestor_name = $row_req_name['emp_name'];
			}

			$subject = "Material Request";
			$body = "Good day!, You have material request waiting for your conformance. <br>";
			$body .= "Please see details below. <br>";
			$body .= "Thank You..<br><br>";
	
			$body .= "<b>Details of Requests</b> <br>";
			$body .= "Date of Request:			".date('M d, Y',strtotime($req_date))."<br>";
			$body .= "Requestor:				".$requestor_name." <br>";
			$body .= "Department:				".$req_department." <br>";
			$body .= "Section:					".$req_section." <br>";
			$body .= "Item Category:			".$req_item_category." <br>";
			$body .= "Justification:			".$req_justification." <br>";
			$body .= "Item Summary: <br>";
			
			$body .= "<table border='1' class='table table-bordered' id='tbl_item_list'>";
			$body .=  "<thead>";
			$body .=  "	<tr>";
			$body .=  "		<td align='center'>Item Description</center></td>";		
			$body .=  "		<td align='center'>Item Specs</center></td>";
			$body .=  "		<td align='center'>UOM</center></td>";
			$body .=  "		<td align='center'>Qty</center></td>";
			$body .=  "		<td align='center'>Remarks</center></td>";
			$body .="	</tr>"; 
			$body .="</thead>"; 
			
			$ctrFrom = 0;
			$ctrCc = 0;
			
			$select_query_from = INVS::getInstance()->select_email_add($req_prepared_by);
			while($row = mysqli_fetch_array($select_query_from)) {
				
				if($ctrFrom == 0) {
					$from = $row['email_add'];
					$ctrFrom++;
					
					$cc = $row['email_add'];
					$ctrCc++;
					
				} else {
					$from .= "," . $row['email_add'];
					$ctrFrom++;
				}	
			}
			
			$result = INVS::getInstance()->select_item_request($return['pkid']);
			// $result = INVS::getInstance()->select_item_request(1);
				while($row = mysqli_fetch_array($result)) {
					$body .= "<tbody>";
					$body .="	<tr>";
					$body .= "		<td align='left'>".$row['mat_product_desc']."</td>";
					$body .= "		<td align='left'>".$row['mat_product_specs']."</td>";
					$body .= "		<td align='center'>".$row['mat_uom']."</td>";
					$body .= "		<td align='center'>".$row['ril_request_qty']."</td>";
					$body .= "		<td align='left'>".$row['ril_remarks']."</td>";
					$body .= "	</tr>";
					$body .= "</tbody>";	
					$ctrCc++;	
				}
							
			$body .="</table>"; 
			
			$ctrCc = 0;
			$select_query_cc = INVS::getInstance()->select_email_add($req_supv);
			while($row = mysqli_fetch_array($select_query_cc)) {
				$cc .= "," . $row['email_add'];
				$ctrCc++;	
			}	
			
			$ctrTo = 0;
			$select_query_to = INVS::getInstance()->select_email_add_ts_central();
			while($row = mysqli_fetch_array($select_query_to)) {
				if($ctrTo == 0) {
					$to = $row['email_add'];
					$ctrTo++;
				} else {
					$to .= "," . $row['email_add'];
					$ctrTo++;
				}	
			}
			
			// echo $to;	
			// echo $cc;	
			// echo $body;
			$php_email = new email();
			$msg = $php_email->send_email($to, $from, $cc, $subject, $body);
			$return['msg'] = $msg;
			$return['result'] = json_encode($result);
			echo json_encode($return);
		}
	}

	function send_conformed_request_email() {
		require_once('../oop/oop.php');
		require_once('../oop/hris_oop.php');
		require_once('send_email.php');
		
		$return = $_POST;
		$ctr = 0;
		
		$select_request_info = INVS::getInstance()->select_request_info_by_pkid($return['pkid']);
		// $select_request_info = INVS::getInstance()->select_request_info_by_pkid(1036);
		
		if($row_request = mysqli_fetch_array($select_request_info)) {
			
			$req_status 		= $row_request['req_status'];
			$req_date 			= $row_request['req_date'];
			$req_prepared_by 	= $row_request['req_prepared_by'];
			$req_department 	= $row_request['req_department'];
			$req_section 		= $row_request['req_section'];
			$req_conformer 		= $row_request['req_conformer'];
			$req_supv 			= $row_request['req_supv'];
			$req_item_category 	= $row_request['req_item_category'];
			$req_justification 	= $row_request['req_justification'];
			
			$req_name = INVS::getInstance()->select_employee_info_by_username($req_prepared_by);
			if($row_req_name = mysqli_fetch_array($req_name)) {
				$requestor_name = $row_req_name['emp_name'];
			}
			
			$con_name = INVS::getInstance()->select_employee_info_by_username($req_conformer);
			if($row_con_name = mysqli_fetch_array($con_name)) {
				$conformer_name = $row_con_name['emp_name'];
			}

			$subject = "Material Request";
			$body = "Good day!, Please be informed that your request has been conformed by ".$conformer_name.". <br>";
			$body .= "Please see details below. <br>";
			$body .= "Thank You..<br><br>";
	
			$body .= "<b>Details of Requests</b> <br>";
			$body .= "Date of Request:			".date('M d, Y',strtotime($req_date))."<br>";
			$body .= "Requestor:				".$requestor_name." <br>";
			$body .= "Department:				".$req_department." <br>";
			$body .= "Section:					".$req_section." <br>";
			$body .= "Item Category:			".$req_item_category." <br>";
			$body .= "Justification:			".$req_justification." <br>";
			$body .= "Item Summary: <br>";
			
			$body .= "<table border='1' class='table table-bordered' id='tbl_item_list'>";
			$body .=  "<thead>";
			$body .=  "	<tr>";
			$body .=  "		<td align='center'>Item Description</center></td>";		
			$body .=  "		<td align='center'>Item Specs</center></td>";
			$body .=  "		<td align='center'>UOM</center></td>";
			$body .=  "		<td align='center'>Qty</center></td>";
			// $body .=  "		<td align='center'>Remarks</center></td>";
			$body .="	</tr>"; 
			$body .="</thead>"; 
			
			$ctrFrom = 0;
			$ctrCc = 0;
			
			$select_query_from = INVS::getInstance()->select_email_add($req_conformer);
			while($row = mysqli_fetch_array($select_query_from)) {
				
				if($ctrFrom == 0) {
					$from = $row['email_add'];
					$ctrFrom++;
					
					$cc = $row['email_add'];
					$ctrCc++;
					
				} else {
					$from .= "," . $row['email_add'];
					$ctrFrom++;
				}	
			}
			
			$result = INVS::getInstance()->select_conformed_item_request($return['pkid']);
			// $result = INVS::getInstance()->select_conformed_item_request(1036);
				while($row = mysqli_fetch_array($result)) {
					$body .= "<tbody>";
					$body .="	<tr>";
					$body .= "		<td align='left'>".$row['mat_product_desc']."</td>";
					$body .= "		<td align='left'>".$row['mat_product_specs']."</td>";
					$body .= "		<td align='center'>".$row['mat_uom']."</td>";
					$body .= "		<td align='center'>".$row['ci_req_qty']."</td>";
					// $body .= "		<td align='left'>".$row['ril_remarks']."</td>";
					$body .= "	</tr>";
					$body .= "</tbody>";	
					$ctrCc++;	
				}
							
			$body .="</table>"; 
			
			$ctrCc = 0;
			$select_query_cc = INVS::getInstance()->select_email_add($req_supv);
			while($row = mysqli_fetch_array($select_query_cc)) {
				$cc .= "," . $row['email_add'];
				$ctrCc++;	
			}	
			
			$ctrTo = 0;
			$select_query_to = INVS::getInstance()->select_email_add($req_prepared_by);
			while($row = mysqli_fetch_array($select_query_to)) {
				if($ctrTo == 0) {
					$to = $row['email_add'];
					$ctrTo++;
				} else {
					$to .= "," . $row['email_add'];
					$ctrTo++;
				}	
			}
				
			$php_email = new email();
			$msg = $php_email->send_email($to, $from, $cc, $subject, $body);
			$return['msg'] = $msg;
			$return['result'] = json_encode($result);
			echo json_encode($return);
		}
	}
	
	function send_served_request_email() {
		require_once('../oop/oop.php');
		require_once('../oop/hris_oop.php');
		require_once('send_email.php');
		
		$return = $_POST;
		$ctr = 0;
		
		$select_request_info = INVS::getInstance()->select_request_info_by_pkid($return['pkid']);
		// $select_request_info = INVS::getInstance()->select_request_info_by_pkid(1);
		
		if($row_request = mysqli_fetch_array($select_request_info)) {
			
			$req_status 		= $row_request['req_status'];
			$req_date 			= $row_request['req_date'];
			$req_prepared_by 	= $row_request['req_prepared_by'];
			$req_department 	= $row_request['req_department'];
			$req_section 		= $row_request['req_section'];
			$req_conformer 		= $row_request['req_conformer'];
			$req_supv 			= $row_request['req_supv'];
			$req_custodian 		= $row_request['req_custodian'];
			$req_item_category 	= $row_request['req_item_category'];
			$req_justification 	= $row_request['req_justification'];
			
			$req_name = INVS::getInstance()->select_employee_info_by_username($req_prepared_by);
			if($row_req_name = mysqli_fetch_array($req_name)) {
				$requestor_name = $row_req_name['emp_name'];
			}
			
			$con_name = INVS::getInstance()->select_employee_info_by_username($req_conformer);
			if($row_con_name = mysqli_fetch_array($con_name)) {
				$conformer_name = $row_con_name['emp_name'];
			}
			
			$cus_name = INVS::getInstance()->select_employee_info_by_username($req_custodian);
			if($row_cus_name = mysqli_fetch_array($cus_name)) {
				$custodian_name = $row_cus_name['emp_name'];
			}

			$subject = "Material Request";
			$body = "Good day!, Please be informed that your request has been assessed by ".$custodian_name.". <br>";
			$body .= "Please see details below. <br>";
			$body .= "Thank You..<br><br>";
	
			$body .= "<b>Details of Requests</b> <br>";
			$body .= "Date of Request:			".date('M d, Y',strtotime($req_date))."<br>";
			$body .= "Requestor:				".$requestor_name." <br>";
			$body .= "Department:				".$req_department." <br>";
			$body .= "Section:					".$req_section." <br>";
			$body .= "Item Category:			".$req_item_category." <br>";
			$body .= "Justification:			".$req_justification." <br>";
			$body .= "Item Summary: <br>";
			
			$body .= "<table border='1' class='table table-bordered' id='tbl_item_list'>";
			$body .=  "<thead>";
			$body .=  "	<tr>";
			$body .=  "		<td align='center'>Item Description</center></td>";		
			$body .=  "		<td align='center'>Item Specs</center></td>";
			$body .=  "		<td align='center'>UOM</center></td>";
			$body .=  "		<td align='center'>Qty</center></td>";
			$body .=  "		<td align='center'>Remarks</center></td>";
			$body .="	</tr>"; 
			$body .="</thead>"; 
			
			$ctrFrom = 0;
			$ctrCc = 0;
			
			$select_query_from = INVS::getInstance()->select_email_add($req_custodian);
			while($row = mysqli_fetch_array($select_query_from)) {
				
				if($ctrFrom == 0) {
					$from = $row['email_add'];
					$ctrFrom++;
					
					$cc = $row['email_add'];
					$ctrCc++;
					
				} else {
					$from .= "," . $row['email_add'];
					$ctrFrom++;
				}	
			}
			
			$result = INVS::getInstance()->select_item_request($return['pkid']);
			// $result = INVS::getInstance()->select_item_request(1);
				while($row = mysqli_fetch_array($result)) {
					$body .= "<tbody>";
					$body .="	<tr>";
					$body .= "		<td align='left'>".$row['mat_product_desc']."</td>";
					$body .= "		<td align='left'>".$row['mat_product_specs']."</td>";
					$body .= "		<td align='center'>".$row['mat_uom']."</td>";
					$body .= "		<td align='center'>".$row['ril_request_qty']."</td>";
					$body .= "		<td align='left'>".$row['ril_remarks']."</td>";
					$body .= "	</tr>";
					$body .= "</tbody>";	
					$ctrCc++;	
				}
							
			$body .="</table>"; 
			
			$ctrCc = 0;
			$select_query_cc = INVS::getInstance()->select_email_add($req_conformer);
			while($row = mysqli_fetch_array($select_query_cc)) {
				$cc .= "," . $row['email_add'];
				$ctrCc++;	
			}	
			
			$ctrCc = 0;
			$select_query_cc = INVS::getInstance()->select_email_add($req_supv);
			while($row = mysqli_fetch_array($select_query_cc)) {
				$cc .= "," . $row['email_add'];
				$ctrCc++;	
			}
			
			$ctrTo = 0;
			$select_query_to = INVS::getInstance()->select_email_add($req_prepared_by);
			while($row = mysqli_fetch_array($select_query_to)) {
				if($ctrTo == 0) {
					$to = $row['email_add'];
					$ctrTo++;
				} else {
					$to .= "," . $row['email_add'];
					$ctrTo++;
				}	
			}
				
			$php_email = new email();
			$msg = $php_email->send_email($to, $from, $cc, $subject, $body);
			$return['msg'] = $msg;
			$return['result'] = json_encode($result);
			echo json_encode($return);
		}
	}
	
	function send_unserved_request_email() {
		require_once('../oop/oop.php');
		require_once('../oop/hris_oop.php');
		require_once('send_email.php');
		
		$return = $_POST;
		$ctr = 0;
		
		$select_request_info = INVS::getInstance()->select_request_info_by_pkid($return['pkid']);
		
		if($row_request = mysqli_fetch_array($select_request_info)) {
			
			$req_status 		= $row_request['req_status'];
			$req_date 			= $row_request['req_date'];
			$req_prepared_by 	= $row_request['req_prepared_by'];
			$req_department 	= $row_request['req_department'];
			$req_section 		= $row_request['req_section'];
			$req_conformer 		= $row_request['req_conformer'];
			$req_custodian 		= $row_request['req_custodian'];
			$req_item_category 	= $row_request['req_item_category'];
			$req_justification 	= $row_request['req_justification'];
			
			$req_name = INVS::getInstance()->select_employee_info_by_username($req_prepared_by);
			if($row_req_name = mysqli_fetch_array($req_name)) {
				$requestor_name = $row_req_name['emp_name'];
			}
			
			$con_name = INVS::getInstance()->select_employee_info_by_username($req_conformer);
			if($row_con_name = mysqli_fetch_array($con_name)) {
				$conformer_name = $row_con_name['emp_name'];
			}
			
			$cus_name = INVS::getInstance()->select_employee_info_by_username($req_custodian);
			if($row_cus_name = mysqli_fetch_array($cus_name)) {
				$custodian_name = $row_cus_name['emp_name'];
			}

			$subject = "Material Request";
			$body = "Good day!, Please be informed that your request has been assessed by ".$custodian_name.". <br>";
			$body .= "Please see details below. <br>";
			$body .= "Thank You..<br><br>";
	
			$body .= "<b>Details of Requests</b> <br>";
			$body .= "Date of Request:			".date('M d, Y',strtotime($req_date))."<br>";
			$body .= "Requestor:				".$requestor_name." <br>";
			$body .= "Department:				".$req_department." <br>";
			$body .= "Section:					".$req_section." <br>";
			$body .= "Item Category:			".$req_item_category." <br>";
			$body .= "Justification:			".$req_justification." <br>";
			$body .= "Item Summary: <br>";
			
			$body .= "<table border='1' class='table table-bordered' id='tbl_item_list'>";
			$body .=  "<thead>";
			$body .=  "	<tr>";
			$body .=  "		<td align='center'>Item Description</center></td>";		
			$body .=  "		<td align='center'>Item Specs</center></td>";
			$body .=  "		<td align='center'>UOM</center></td>";
			$body .=  "		<td align='center'>Qty</center></td>";
			$body .=  "		<td align='center'>Remarks</center></td>";
			$body .="	</tr>"; 
			$body .="</thead>"; 
			
			$ctrFrom = 0;
			$ctrCc = 0;
			
			$select_query_from = INVS::getInstance()->select_email_add($req_custodian);
			while($row = mysqli_fetch_array($select_query_from)) {
				
				if($ctrFrom == 0) {
					$from = $row['email_add'];
					$ctrFrom++;
					
					$cc = $row['email_add'];
					$ctrCc++;
					
				} else {
					$from .= "," . $row['email_add'];
					$ctrFrom++;
				}	
			}
			
			$result = INVS::getInstance()->select_item_request($return['pkid']);
			// $result = INVS::getInstance()->select_item_request(1);
				while($row = mysqli_fetch_array($result)) {
					$body .= "<tbody>";
					$body .="	<tr>";
					$body .= "		<td align='left'>".$row['mat_product_desc']."</td>";
					$body .= "		<td align='left'>".$row['mat_product_specs']."</td>";
					$body .= "		<td align='center'>".$row['mat_uom']."</td>";
					$body .= "		<td align='center'>".$row['ril_request_qty']."</td>";
					$body .= "		<td align='left'>".$row['ril_remarks']."</td>";
					$body .= "	</tr>";
					$body .= "</tbody>";	
					$ctrCc++;	
				}
							
			$body .="</table>"; 
			$body .="<br>"; 
			$body .="<br>"; 
			$body .="<br>"; 
			
			$body .= "Remarks: <br>";
			$body .= "<table border='1' class='table table-bordered' id='tbl_remarks'>";
			$body .=  "<thead>";
			$body .=  "	<tr>";
			$body .=  "		<td align='center'>Date</td>";
			$body .=  "		<td align='left'>Custodian</center></td>";		
			$body .=  "		<td align='left'>Remarks</center></td>";
			$body .="	</tr>"; 
			$body .="</thead>"; 
			
			$result = INVS::getInstance()->select_remarks($return['pkid']);
				while($row = mysqli_fetch_array($result)) {
					$body .= "<tbody>";
					$body .="	<tr>";
					$body .= "		<td align='center'>".$row['rem_lastupdate']."</td>";
					$body .= "		<td align='left'>".$row['rem_approver']."</td>";
					$body .= "		<td align='left'>".$row['rem_other_remarks']."</td>";
					$body .= "	</tr>";
					$body .= "</tbody>";	
					$ctrCc++;	
				}
							
			$body .="</table>"; 

			$ctrCc = 0;
			$select_query_cc = INVS::getInstance()->select_email_add($req_conformer);
			while($row = mysqli_fetch_array($select_query_cc)) {
				$cc .= "," . $row['email_add'];
				$ctrCc++;	
			}	
			
			$ctrTo = 0;
			$select_query_to = INVS::getInstance()->select_email_add($req_prepared_by);
			while($row = mysqli_fetch_array($select_query_to)) {
				if($ctrTo == 0) {
					$to = $row['email_add'];
					$ctrTo++;
				} else {
					$to .= "," . $row['email_add'];
					$ctrTo++;
				}	
			}
				
			$php_email = new email();
			$msg = $php_email->send_email($to, $from, $cc, $subject, $body);
			$return['msg'] = $msg;
			$return['result'] = json_encode($result);
			echo json_encode($return);
		}
	}
	
	function send_revision_request_email_from_conformer() {
		require_once('../oop/oop.php');
		require_once('../oop/hris_oop.php');
		require_once('send_email.php');
		
		$return = $_POST;
		$ctr = 0;
		
		$select_request_info = INVS::getInstance()->select_request_info_by_pkid($return['pkid']);
		
		if($row_request = mysqli_fetch_array($select_request_info)) {
			
			$req_status 		= $row_request['req_status'];
			$req_date 			= $row_request['req_date'];
			$req_prepared_by 	= $row_request['req_prepared_by'];
			$req_department 	= $row_request['req_department'];
			$req_section 		= $row_request['req_section'];
			$req_conformer 		= $row_request['req_conformer'];
			$req_supv 			= $row_request['req_supv'];
			$req_custodian 		= $row_request['req_custodian'];
			$req_item_category 	= $row_request['req_item_category'];
			$req_justification 	= $row_request['req_justification'];
			
			$req_name = INVS::getInstance()->select_employee_info_by_username($req_prepared_by);
			if($row_req_name = mysqli_fetch_array($req_name)) {
				$requestor_name = $row_req_name['emp_name'];
			}
			
			$con_name = INVS::getInstance()->select_employee_info_by_username($req_conformer);
			if($row_con_name = mysqli_fetch_array($con_name)) {
				$conformer_name = $row_con_name['emp_name'];
			}

			$subject = "For Revision - Material Request";
			$body = "Good day!, Please be advised that your request is for revision. <br>";
			$body .= "Please see details below. <br>";
			$body .= "Thank You..<br><br>";
	
			$body .= "<b>Details of Requests</b> <br>";
			$body .= "Date of Request:			".date('M d, Y',strtotime($req_date))."<br>";
			$body .= "Requestor:				".$requestor_name." <br>";
			$body .= "Department:				".$req_department." <br>";
			$body .= "Section:					".$req_section." <br>";
			$body .= "Item Category:			".$req_item_category." <br>";
			$body .= "Justification:			".$req_justification." <br>";
			$body .= "Item Summary: <br>";
			
			$body .= "<table border='1' class='table table-bordered' id='tbl_item_list'>";
			$body .=  "<thead>";
			$body .=  "	<tr>";
			$body .=  "		<td align='center'>Item Description</td>";		
			$body .=  "		<td align='center'>Item Specs</td>";
			$body .=  "		<td align='center'>UOM</td>";
			$body .=  "		<td align='center'>Qty</td>";
			$body .=  "		<td align='center'>Remarks</td>";
			$body .="	</tr>"; 
			$body .="</thead>"; 
					
			$ctrFrom = 0;
			$ctrCc = 0;
			
			$select_query_from = INVS::getInstance()->select_email_add($req_conformer);
			while($row = mysqli_fetch_array($select_query_from)) {
				
				if($ctrFrom == 0) {
					$from = $row['email_add'];
					$ctrFrom++;
					
					$cc = $row['email_add'];
					$ctrCc++;
					
				} else {
					$from .= "," . $row['email_add'];
					$ctrFrom++;
				}	
			}
			
			$result = INVS::getInstance()->select_item_request($return['pkid']);
			// $result = INVS::getInstance()->select_item_request(1);
				while($row = mysqli_fetch_array($result)) {
					$body .= "<tbody>";
					$body .="	<tr>";
					$body .= "		<td align='left'>".$row['mat_product_desc']."</td>";
					$body .= "		<td align='left'>".$row['mat_product_specs']."</td>";
					$body .= "		<td align='center'>".$row['mat_uom']."</td>";
					$body .= "		<td align='center'>".$row['ril_request_qty']."</td>";
					$body .= "		<td align='left'>".$row['ril_remarks']."</td>";
					$body .= "	</tr>";
					$body .= "</tbody>";	
					$ctrCc++;	
				}
			
			$body .="</table><br>"; 
			
			$body .= "Remarks Summary: <br>";
			
			$body .= "<table border='1' class='table table-bordered' id='tbl_remarks'>";
			$body .=  "<thead>";
			$body .=  "	<tr>";
			$body .=  "		<td align='center'>Approver</td>";		
			$body .=  "		<td align='center'>Revision Remarks</td>";
			$body .=  "		<td align='center'>Date of Approval</td>";
			$body .="	</tr>"; 
			$body .="</thead>"; 	
			
			$result = INVS::getInstance()->select_remarks($return['pkid']);
				while($row = mysqli_fetch_array($result)) {
					$body .= "<tbody>";
					$body .="	<tr>";
					$body .= "		<td align='left'>".$row['rem_approver']."</td>";
					$body .= "		<td align='left'>".$row['rem_other_remarks']."</td>";
					$body .= "		<td align='center'>".$row['rem_lastupdate']."</td>";
					$body .= "	</tr>";
					$body .= "</tbody>";	
					$ctrCc++;	
				}
							
			$body .="</table>"; 
			
			$ctrCc = 0;
			$select_query_cc = INVS::getInstance()->select_email_add($req_supv);
			while($row = mysqli_fetch_array($select_query_cc)) {
				$cc .= "," . $row['email_add'];
				$ctrCc++;	
			}	
			
			$ctrTo = 0;
			$select_query_to = INVS::getInstance()->select_email_add($req_prepared_by);
			while($row = mysqli_fetch_array($select_query_to)) {
				if($ctrTo == 0) {
					$to = $row['email_add'];
					$ctrTo++;
				} else {
					$to .= "," . $row['email_add'];
					$ctrTo++;
				}	
			}
				
			$php_email = new email();
			$msg = $php_email->send_email($to, $from, $cc, $subject, $body);
			$return['msg'] = $msg;
			$return['result'] = json_encode($result);
			echo json_encode($return);
		}
	}
	
	function send_rejected_request_email_from_conformer() {
		require_once('../oop/oop.php');
		require_once('../oop/hris_oop.php');
		require_once('send_email.php');
		
		$return = $_POST;
		$ctr = 0;
		
		$select_request_info = INVS::getInstance()->select_request_info_by_pkid($return['pkid']);
		
		if($row_request = mysqli_fetch_array($select_request_info)) {
			
			$req_status 		= $row_request['req_status'];
			$req_date 			= $row_request['req_date'];
			$req_prepared_by 	= $row_request['req_prepared_by'];
			$req_department 	= $row_request['req_department'];
			$req_section 		= $row_request['req_section'];
			$req_conformer 		= $row_request['req_conformer'];
			$req_supv 			= $row_request['req_supv'];
			$req_custodian 		= $row_request['req_custodian'];
			$req_item_category 	= $row_request['req_item_category'];
			$req_justification 	= $row_request['req_justification'];
			
			$req_name = INVS::getInstance()->select_employee_info_by_username($req_prepared_by);
			if($row_req_name = mysqli_fetch_array($req_name)) {
				$requestor_name = $row_req_name['emp_name'];
			}
			
			$con_name = INVS::getInstance()->select_employee_info_by_username($req_conformer);
			if($row_con_name = mysqli_fetch_array($con_name)) {
				$conformer_name = $row_con_name['emp_name'];
			}

			$subject = "Rejected - Material Request";
			$body = "Good day!, Please be informed that your request has been rejected by ".$conformer_name.". <br>";
			$body .= "Please see details below. <br>";
			$body .= "Thank You..<br><br>";
	
			$body .= "<b>Details of Requests</b> <br>";
			$body .= "Date of Request:			".date('M d, Y',strtotime($req_date))."<br>";
			$body .= "Requestor:				".$requestor_name." <br>";
			$body .= "Department:				".$req_department." <br>";
			$body .= "Section:					".$req_section." <br>";
			$body .= "Item Category:			".$req_item_category." <br>";
			$body .= "Justification:			".$req_justification." <br>";
			$body .= "Item Summary: <br>";
			
			$body .= "<table border='1' class='table table-bordered' id='tbl_item_list'>";
			$body .=  "<thead>";
			$body .=  "	<tr>";
			$body .=  "		<td align='center'>Item Description</td>";		
			$body .=  "		<td align='center'>Item Specs</td>";
			$body .=  "		<td align='center'>UOM</td>";
			$body .=  "		<td align='center'>Qty</td>";
			$body .=  "		<td align='center'>Remarks</td>";
			$body .="	</tr>"; 
			$body .="</thead>"; 
					
			$ctrFrom = 0;
			$ctrCc = 0;
			
			$select_query_from = INVS::getInstance()->select_email_add($req_conformer);
			while($row = mysqli_fetch_array($select_query_from)) {
				
				if($ctrFrom == 0) {
					$from = $row['email_add'];
					$ctrFrom++;
					
					$cc = $row['email_add'];
					$ctrCc++;
					
				} else {
					$from .= "," . $row['email_add'];
					$ctrFrom++;
				}	
			}
			
			$result = INVS::getInstance()->select_item_request($return['pkid']);
			// $result = INVS::getInstance()->select_item_request(1);
				while($row = mysqli_fetch_array($result)) {
					$body .= "<tbody>";
					$body .="	<tr>";
					$body .= "		<td align='left'>".$row['mat_product_desc']."</td>";
					$body .= "		<td align='left'>".$row['mat_product_specs']."</td>";
					$body .= "		<td align='center'>".$row['mat_uom']."</td>";
					$body .= "		<td align='center'>".$row['ril_request_qty']."</td>";
					$body .= "		<td align='left'>".$row['ril_remarks']."</td>";
					$body .= "	</tr>";
					$body .= "</tbody>";	
					$ctrCc++;	
				}
			
			$body .="</table><br>"; 
			
			$body .= "Remarks Summary: <br>";
			
			$body .= "<table border='1' class='table table-bordered' id='tbl_remarks'>";
			$body .=  "<thead>";
			$body .=  "	<tr>";
			$body .=  "		<td align='center'>Approver</td>";		
			$body .=  "		<td align='center'>Remarks</td>";
			$body .=  "		<td align='center'>Date of Approval</td>";
			$body .="	</tr>"; 
			$body .="</thead>"; 	
			
			$result = INVS::getInstance()->select_remarks($return['pkid']);
				while($row = mysqli_fetch_array($result)) {
					$body .= "<tbody>";
					$body .="	<tr>";
					$body .= "		<td align='left'>".$row['rem_approver']."</td>";
					$body .= "		<td align='left'>".$row['rem_reject_remarks']."</td>";
					$body .= "		<td align='center'>".$row['rem_lastupdate']."</td>";
					$body .= "	</tr>";
					$body .= "</tbody>";	
					$ctrCc++;	
				}
							
			$body .="</table>"; 
			
			$ctrCc = 0;
			$select_query_cc = INVS::getInstance()->select_email_add($req_supv);
			while($row = mysqli_fetch_array($select_query_cc)) {
				$cc .= "," . $row['email_add'];
				$ctrCc++;	
			}	
			
			$ctrTo = 0;
			$select_query_to = INVS::getInstance()->select_email_add($req_prepared_by);
			while($row = mysqli_fetch_array($select_query_to)) {
				if($ctrTo == 0) {
					$to = $row['email_add'];
					$ctrTo++;
				} else {
					$to .= "," . $row['email_add'];
					$ctrTo++;
				}	
			}
				
			$php_email = new email();
			$msg = $php_email->send_email($to, $from, $cc, $subject, $body);
			$return['msg'] = $msg;
			$return['result'] = json_encode($result);
			echo json_encode($return);
		}
	}
	
	function send_email_conformed_from_requestor() {
		require_once('../oop/oop.php');
		require_once('../oop/hris_oop.php');
		require_once('send_email.php');
		
		$return = $_POST;
		$ctr = 0;
		
		$select_request_info = INVS::getInstance()->select_request_info_by_pkid($return['pkid']);
		// $select_request_info = INVS::getInstance()->select_request_info_by_pkid(1);
		
		if($row_request = mysqli_fetch_array($select_request_info)) {
			
			$req_status 		= $row_request['req_status'];
			$req_date 			= $row_request['req_date'];
			$req_prepared_by 	= $row_request['req_prepared_by'];
			$req_department 	= $row_request['req_department'];
			$req_section 		= $row_request['req_section'];
			$req_conformer 		= $row_request['req_conformer'];
			$req_supv 			= $row_request['req_supv'];
			$req_item_category 	= $row_request['req_item_category'];
			$req_justification 	= $row_request['req_justification'];
			
			$req_name = INVS::getInstance()->select_employee_info_by_username($req_prepared_by);
			if($row_req_name = mysqli_fetch_array($req_name)) {
				$requestor_name = $row_req_name['emp_name'];
			}

			$subject = "Received - Material Request";
			$body = "Good day!, Please be informed that material request has been done and received by ".$requestor_name.". <br>";
			$body .= "Please see details below. <br>";
			$body .= "Thank You..<br><br>";
	
			$body .= "<b>Details of Requests</b> <br>";
			$body .= "Date of Request:			".date('M d, Y',strtotime($req_date))."<br>";
			$body .= "Requestor:				".$requestor_name." <br>";
			$body .= "Department:				".$req_department." <br>";
			$body .= "Section:					".$req_section." <br>";
			$body .= "Item Category:			".$req_item_category." <br>";
			$body .= "Justification:			".$req_justification." <br>";
			$body .= "Item Summary: <br>";
			
			$body .= "<table border='1' class='table table-bordered' id='tbl_item_list'>";
			$body .=  "<thead>";
			$body .=  "	<tr>";
			$body .=  "		<td align='center'>Item Description</center></td>";		
			$body .=  "		<td align='center'>Item Specs</center></td>";
			$body .=  "		<td align='center'>UOM</center></td>";
			$body .=  "		<td align='center'>Qty</center></td>";
			$body .=  "		<td align='center'>Remarks</center></td>";
			$body .="	</tr>"; 
			$body .="</thead>"; 
			
			$ctrFrom = 0;
			$ctrCc = 0;
			
			$select_query_from = INVS::getInstance()->select_email_add($req_prepared_by);
			while($row = mysqli_fetch_array($select_query_from)) {
				
				if($ctrFrom == 0) {
					$from = $row['email_add'];
					$ctrFrom++;
					
					$cc = $row['email_add'];
					$ctrCc++;
					
				} else {
					$from .= "," . $row['email_add'];
					$ctrFrom++;
				}	
			}
			
			$result = INVS::getInstance()->select_item_request($return['pkid']);
			// $result = INVS::getInstance()->select_item_request(1);
				while($row = mysqli_fetch_array($result)) {
					$body .= "<tbody>";
					$body .="	<tr>";
					$body .= "		<td align='left'>".$row['mat_product_desc']."</td>";
					$body .= "		<td align='left'>".$row['mat_product_specs']."</td>";
					$body .= "		<td align='center'>".$row['mat_uom']."</td>";
					$body .= "		<td align='center'>".$row['ril_request_qty']."</td>";
					$body .= "		<td align='left'>".$row['ril_remarks']."</td>";
					$body .= "	</tr>";
					$body .= "</tbody>";	
					$ctrCc++;	
				}
							
			$body .="</table>"; 
			
			$ctrCc = 0;
			$select_query_cc = INVS::getInstance()->select_email_add($req_supv);
			while($row = mysqli_fetch_array($select_query_cc)) {
				$cc .= "," . $row['email_add'];
				$ctrCc++;	
			}	

			$ctrTo = 0;
			$select_query_to = INVS::getInstance()->select_email_add($req_conformer);
			while($row = mysqli_fetch_array($select_query_to)) {
				if($ctrTo == 0) {
					$to = $row['email_add'];
					$ctrTo++;
				} else {
					$to .= "," . $row['email_add'];
					$ctrTo++;
				}	
			}
			
			// echo $cc;	
			// echo $body;
			$php_email = new email();
			$msg = $php_email->send_email($to, $from, $cc, $subject, $body);
			$return['msg'] = $msg;
			$return['result'] = json_encode($result);
			echo json_encode($return);
		}
	}
	
	/* User Access */
	function getRequestor(){

		require_once('../oop/oop.php');

		$return 		= $_POST;
		$pattern 		= $_POST['pattern'];
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'db_rapid.tbl_useraccounts';
		$joins 	   		= '';
		$sql_where 		= 'WHERE name LIKE "%'.$pattern.'%"';
		$sql_order 		= '';
		$sql_limit 		= 'LIMIT 0,10';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		if($pattern == ""){
			$return['id'][$ctr] 			= '';
			$return['empno'][$ctr] 		= '';
			$return['username'][$ctr] 		= '';
			$return['name'][$ctr] 		= '';
		}else{
			while($row = mysqli_fetch_array($result)){
				$return['id'][$ctr] 			= $row['id'];
				$return['empno'][$ctr] 			= $row['empno'];
				$return['username'][$ctr] 		= $row['username'];
				$return['name'][$ctr] 			= $row['name'];
				$ctr++;
			}
		}


		$return['ctr']	  = $ctr;
		$return['script'] = $script;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}

	/* Display */
	function display_user_setting(){

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$result 		= '';
		$array_fields 	= array('*');
		$table 	   		= 'tbl_useraccount';
		$joins 	   		= '';
		$sql_where 		= "";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$result_test	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}

		$ctr = 0;

		while($row = mysqli_fetch_array($result)){
			
			$return['id'][$ctr] 					= $row['id'];
			$return['requestor_name'][$ctr] 		= $row['requestor_name'];
			$return['requestor_username'][$ctr] 	= $row['requestor_username'];
			$return['superior_name'][$ctr] 			= $row['superior_name'];
			$return['superior_username'][$ctr] 		= $row['superior_username'];
			$return['logdel'][$ctr] 				= $row['logdel'];
			$ctr++;
		}
	
		$return['result_test']	  = $result_test;
		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}
	
	function view_edit_user_setting(){

		require_once('../oop/oop.php');

		$result 		= '';
		$return 		= $_POST;
		$array_fields 	= array('*');
		$table 	   		= 'tbl_useraccount';
		$joins 	   		= '';
		$sql_where		= "WHERE id = '".$return['id']."' AND logdel = '0' ";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$test_result 	= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$ctr = 0;
		
		if (!$result) {
			echo mysql_error();
		}
		
		while($row = mysqli_fetch_array($result)){
		
			$return['id'][$ctr] 					= $row['id'];
			$return['requestor_name'][$ctr] 		= $row['requestor_name'];
			$return['requestor_username'][$ctr] 	= $row['requestor_username'];
			$return['superior_name'][$ctr] 			= $row['superior_name'];
			$return['superior_username'][$ctr] 		= $row['superior_username'];
			$ctr++;
		}

		$return['ctr']	 		= $ctr;
		$return['test_result']  = $test_result;
		$return['result'] 		= json_encode($result);
		echo json_encode($return);
	}	
	
	function add_user_setting(){
	
		require_once('../oop/oop.php');
	
		$return			= $_POST;
		$result			= '';
		$table			= 'tbl_useraccount';
		$array_fields 	= array('requestor_name', 'requestor_username', 'superior_name', 'superior_username');
		$array_values 	= array($return['name_list_requestor_name'],
								$return['name_hidden_req_username'],
								$return['name_list_superior_name'],
								$return['name_hidden_superior_username']);
		$result 		= INVS::getInstance()->insert_query_id($table,$array_fields,$array_values);
		echo json_encode($return);
		
	}
	
	function update_user_setting(){
		
		require_once('../oop/oop.php');
		
		$id_update 		= $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_useraccount';
		$array_fields 	= array('id', 'requestor_name', 'requestor_username', 'superior_name', 'superior_username');
		$array_values 	= array($return['id'],
								$return['name_ulist_requestor_name'],
								$return['name_uhidden_req_username'],
								$return['name_ulist_superior_name'],
								$return['name_uhidden_superior_username']);
		$where_table 	= 'id';
		$id 			= $id_update;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		$result1 		= INVS::getInstance()->update_query_test($table,$array_fields,$array_values,$where_table,$id);
		
		$return['result1'] 	= $result1;
		$return['result'] 	= json_encode($result);
		echo json_encode($return);
		
	}
	
	function delete_user_setting(){
		
		require_once('../oop/oop.php');
		
		$id_delete 		= $_POST['id'];
		
		$return 		= $_POST;
		$result 		= '';
		$table        	= 'tbl_useraccount';
		$array_fields 	= array('logdel');
		$array_values 	= array('1');
		$where_table 	= 'id';
		$id 			= $id_delete;
		$result 		= INVS::getInstance()->update_query($table,$array_fields,$array_values,$where_table,$id);
		
		$return['result'] = json_encode($result);
		echo json_encode($return);
		
	}

	function select_requestor(){

		require_once('../oop/oop.php');
		
		$return 		= $_POST;
		$drp_dept 		= $_POST['drp_dept'];
		
		$result 		= '';
		$array_fields 	= array('DISTINCT(a.req_prepared_by) as username, b.name, a.req_department');
		$table 	   		= 'tbl_request a ';
		$joins 	   		= 'INNER JOIN db_rapid.tbl_useraccounts b ON b.username = a.req_prepared_by';
		$sql_where 		= "WHERE a.req_department = '$drp_dept'";
		$sql_order 		= '';
		$sql_limit 		= '';
		$result 		= INVS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 		= INVS::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);

		if (!$result) {
			echo mysql_error();
		}
		$ctr = 0;
		while($row = mysqli_fetch_array($result)){

			$return['username'][$ctr] 		= $row['username'];
			$return['name'][$ctr]				= $row['name'];
			$return['req_department'][$ctr] 	= $row['req_department'];
			$ctr++;
		}
		
		$return['ctr']	  = $ctr;
		$return['script'] = $script;
		$return['result'] = json_encode($result);
		echo json_encode($return);

	}

	

	
?>

