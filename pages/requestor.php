<?php
	include("includes.php");
	require_once("../oop/oop.php");
	// require_once("../oop/hris_oop.php");
	
	session_start();
	
 	$username = $_SESSION['username'];
	// $username = 'jangeco';
	
	$result = INVS::getInstance()->getUsername($username);
		while($row = mysqli_fetch_array($result)){
			$emp_name 	= $row['emp_name'];
	}
	
	$result = INVS::getInstance()->getSuperiorName($username);
		while($row = mysqli_fetch_array($result)){
			$username 	= $row['requestor_username'];
			$supv 		= $row['superior_username'];
	}
	
?>

	<style>
		label {
			font-size: 13px;
		}
		.form-control {
			height:33px
		}
		
		thead, th {
			text-align: center;
		}

		.modal {
			overflow-y: scroll;
		}		
		
	</style>

	<section class="white">
	<br>
	<br>
	
	<div class="container" style="width:95%;">
	
	<div class="panel panel-primary">
		<div class="panel-heading">IMI Requestor Module</div>
		<div class="panel-body">
	
			<div class="row sub_content">
			<br>
				
				<input type="hidden" id="id_hidden_username" name="name_hidden_username" value="<?=$username?>">
				
				<div class="col-lg-3 col-md-3 col-sm-12">
					<button type="button" class="btn btn-warning btn-sm" id="id_btn_add_request_modal">ADD NEW REQUEST</button>
					<!--
					<button type="button" class="btn btn-danger btn-sm" id="id_btn_remove_request" data-confirm="Are you sure you want to delete this Request?">DELETE</button>
					-->
					<br>
					<br>
				</div>
			
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div id="container_request_summary">
					</div>
				</div>

			</div>
		</div>
	</div>
	
	</div>
		
	</section>
	
	<div class="modal fade" id="id_request_modal_show">
	
		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_request">
		
				<div class="modal-content">
				
					<div class="modal-body">
				
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>MATERIAL TRANSACTION</b></center></h4>
							<h5 class="modal-title"><center>OPERATIONS DIVISION</center></h5>
						</div>

						<div class="container-fluid">
						<br>
							<div class="row">
								<input type="hidden" id="id_hidden_req_status" name="name_hidden_req_status" value="0">
								<input type="hidden" id="id_hidden_central" name="name_hidden_central" value="chetana"> 
								<input type="hidden" id="id_hidden_supv" name="name_hidden_supv" value="<?php echo $supv; ?>"> 

								<div class="col-sm-12">
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>Date</label>
									
											<input type="date" class="form-control" id="id_req_date" name="name_req_date" value="<?php echo date("Y-m-d") ; ?>" > 
											
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>Department</label>
											<select class="form-control" id="id_req_dept" name="name_req_dept" required >
												<option value="0">--Select--</option>
												<option value="TS">TS</option>
												<option value="CN">CN</option>
												<option value="PPS">PPS</option>
												<option value="YF">YF</option>
											</select>	
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>Assy. Line / Section</label>
											<input class="form-control" id="id_req_section" name="name_req_section" autocomplete="off" required>
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>TS Product <i><font size="1"> (For TS only) </font></i></label>
											<input type="text" list="id_ts_product" class="form-control" id="id_req_ts_product" name="name_req_ts_product" autocomplete="off" required>
											<datalist id="id_ts_product"></datalist> 
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>Item Category</label>
											<select class="form-control" id="id_req_item_cat" name="name_req_item_cat" required>
												<option value="Indirect Materials">Indirect Materials</option>
												<!--
												<option value="Office Supplies">Office Supplies</option>
												<option value="Forms">Forms</option>
												<option value="Factory Supplies">Factory Supplies</option>
												<option value="Chemical">Chemical</option>
												-->
											</select>									
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>Prepared By</label>
											<input class="form-control" id="id_req_preparedby" name="name_req_preparedby" value="<?php echo $emp_name ?>" readonly> 
											<input type="hidden" class="form-control" id="id_hidden_req_preparedby" name="name_hidden_req_preparedby" value="<?php echo $username ?>" readonly> 
										</div>
									</div>
									
									<div class="col-sm-12">
										<div class="form-group">
											<label>Justification <i><font size="1"> (For additional & over consumption) </font></i></label>
											<textarea class="form-control" id="id_req_justi" name="name_req_justi"></textarea>
										</div>
									</div>
									
								</div>
							</div>

							<div class="panel panel-primary" align="center">
								
								<div class="panel-heading clearfix">
									<label class="pull-left" style="padding-top: 5.5px;">ITEM SUMMARY</label>
									<div class="btn-group pull-right">
										<button type="button" id="id_btn_add_item" class="btn btn-warning btn-sm"> ADD ITEM</button>
									</div>
								</div>

								<div class="panel-body">
							
									<table id="tbl_item_list" class="table table-bordered" border="1">
										<thead>
											<th><center><font size="2">Item No.</font></center></th>
											<th><center><font size="2">Item Description</font></center></th>
											<th><center><font size="2">Item Specs.</font></center></th>
											<th><center><font size="2">UOM</font></center></th>
											<th><center><font size="2">Quantity</font></center></th>
											<th><center><font size="2">Remarks</font></center></th>
											<th><center><font size="2">Remove</font></center></th>
										</thead>
										<tbody>
										</tbody>
									</table>
									
								</div>
							</div>	
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						
						<div class="container-fluid">
						
							<div class="row">
							
								<div class="col-sm-12 pull-right">
									<button id="id_req_add_modal" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_req_close_modal" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							
							</div>
						
						</div>
					
					</div>
					
				</div>
			
			</form>
			
		</div>
		
	</div>
	
	<div class="modal fade" id="id_item_modal_show">
	
		<div class="modal-dialog" style="width:20%;">
		
			<form id="id_form_item">
		
				<div class="modal-content">
				
					<div class="modal-body">

						<div class="container-fluid">
						<br>
							<div class="row">
								
								<div class="col-sm-12">

									<div class="form-group">
										<input type="hidden" class="form-control" id="id_item_num" name="name_item_num" readonly> 
										<input type="hidden" class="form-control" id="id_hidden_no" name="name_hidden_no" value="1"> 
									</div>
									
									<div class="form-group">
										<label>Item Description</label>
										<select class="form-control" id="id_item_description"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mat_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].')</option>';
												}					
											?>
										</select>
										
									</div>
								
									<div class="form-group">
										<label>Item Specs</label>
										<input class="form-control" id="id_item_specs" name="name_item_specs" readonly> 
									</div>
								
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_uom" name="name_uom" readonly> 
									</div>
								
									<div class="form-group">
										<label>Quantity</label>
										<input type="number" class="form-control" id="id_quantity_requested" name="name_quantity_requested"> 
									</div>
									
									<div class="form-group">
										<label>Remarks</label>
										<textarea class="form-control" id="id_remarks" name="name_remarks"> </textarea> 
									</div>
									
								</div>
							</div>						
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						
						<div class="container-fluid">
						
							<div class="row">
							
								<div class="col-sm-12 pull-right">
									<button type="button" id="id_add_item_modal" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_close_item_modal" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							
							</div>
						
						</div>
					
					</div>
					
				</div>
			
			</form>
			
		</div>
		
	</div>
	
	<!-- Update -->
	<div class="modal fade" id="id_update_request_modal_show">
	
		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_update_request">
		
				<div class="modal-content">
				
					<div class="modal-body">
				
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>MATERIAL TRANSACTION</b></center></h4>
							<h5 class="modal-title"><center>OPERATIONS DIVISION</center></h5>
						</div>

						<div class="container-fluid">
						<br>
							<div class="row">
								<input type="hidden" class="form-control" id="id_uhidden_id">
								<input type="hidden" class="form-control" id="id_uhidden_status">

								<div class="col-sm-12">

									<div class="col-sm-6">
										<div class="form-group">
											<label>Date</label>
											<input type="date" class="form-control" id="id_ureq_date" name="name_ureq_date" value="<?php echo date("Y-m-d") ; ?>" readonly> 
										</div>
									</div>
										
									<div class="col-sm-6">
										<div class="form-group">
											<label>Department</label>
											<select class="form-control" id="id_ureq_dept" name="name_ureq_dept" required >
												<option value="0">--Select--</option>
												<option value="TS">TS</option>
												<option value="CN">CN</option>
												<option value="PPS">PPS</option>
												<option value="YF">YF</option>
											</select>	
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>Assy. Line / Section</label>
											<input class="form-control" id="id_ureq_section" name="name_ureq_section" autocomplete="off" required>
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>TS Product <i><font size="1"> (For TS only) </font></i></label>
											<input type="text" list="id_uts_product" class="form-control" id="id_ureq_ts_product" name="name_ureq_ts_product" autocomplete="off" required>
											<datalist id="id_uts_product"></datalist> 
										</div>
									</div>									
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>Item Category</label>
											<input class="form-control" id="id_ureq_item_cat" name="name_ureq_item_cat" readonly> 
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>Prepared By</label>
											<input class="form-control" id="id_ureq_preparedby" name="name_ureq_preparedby" value="<?php echo $emp_name ?>"readonly> 
											<input type="hidden" class="form-control" id="id_uhidden_req_preparedby" name="name_uhidden_req_preparedby" value="<?php echo $username ?>" readonly> 
										</div>
									</div>
									
									<div class="col-sm-12">
										<div class="form-group">
											<label>Justification <i><font size="2"> (For additional & over consumption) </font></i></label>
											<textarea class="form-control" id="id_ureq_justi" name="name_ureq_justi" ></textarea>
										</div>
									</div>
									
								</div>
							</div>
					
							<div class="panel panel-primary" align="center">
								
								<div class="panel-heading clearfix">
									<label class="pull-left" style="padding-top: 5.5px;">REQUEST ITEM(S) SUMMARY</label>
									<div class="btn-group pull-right">
										<button type="button" id="id_ubtn_add_item" class="btn btn-warning btn-sm"> ADD ITEM</button>
									</div>

								</div>

								<div class="panel-body">
							
									<table id="tbl_uitem_list" class="table table-bordered" border="1">
										<thead>
											<th><center><font size="2">Item No.</font></center></th>
											<th><center><font size="2">Item Description</font></center></th>
											<th><center><font size="2">Item Specs.</font></center></th>
											<th><center><font size="2">UOM</font></center></th>
											<th><center><font size="2">Quantity</font></center></th>
											<th><center><font size="2">Remarks</font></center></th>
											<th><center><font size="2">Remove</font></center></th>
										</thead>
										<tbody id="tbl_uitem_list_tbody">
										</tbody>
									</table>
									
								</div>
							</div>
							
							<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
								<div class="panel panel-info">
									<div class="panel-heading" role="tab" id="heading1">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1" style="color: #2E86C1;">
											 <label>CONFORMED ITEM(S) SUMMARY  <--- <i>Click this to see conformed item(s)</i></label>
											</a>
										</h4>
									</div>
									
									<div id="collapseOne1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
										<div class="panel-body">
							
										<table id="tbl_citem_list" class="table table-bordered" border="1">
											<thead>
												<th><center><font size="2">Item No.</font></center></th>
												<th><center><font size="2">Item Description</font></center></th>
												<th><center><font size="2">Item Specs.</font></center></th>
												<th><center><font size="2">UOM</font></center></th>
												<th><center><font size="2">Quantity</font></center></th>
												<th><center><font size="2">Remarks</font></center></th>
											</thead>
											<tbody id="tbl_citem_list_tbody">
											</tbody>
										</table>
									
										</div>
									</div>
								</div>
							</div>
							
							<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
								<div class="panel panel-danger">
									<div class="panel-heading" role="tab" id="heading2">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2" style="color: #CB4335;">
											 <label>REMARKS SUMMARY <--- <i>Click this to see remarks</i></label>
											</a>
										</h4>
									</div>
									
									<div id="collapseOne2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
										<div class="panel-body">
							
										<table id="tbl_remarks" class="table table-bordered" border="1">
											<thead>
												<th><center><font size="2">Approver</font></center></th>
												<th><center><font size="2">Approved </font></center></th>
												<th><center><font size="2">Rejected </font></center></th>
												<th><center><font size="2">Others</font></center></th>
												<th><center><font size="2">Date of Approval</font></center></th>
											</thead>
											<tbody id="tbl_remarks_tbody">
											</tbody>
										</table>
									
										</div>
									</div>
								</div>
							</div>
					
						</div>
						
					</div>
					
					<div class="modal-footer">
						
						<div class="container-fluid">
						
							<div class="row">
								<div class="pull-left">
									<button type="button" class="btn btn-primary btn-sm" id="id_btn_conformed_request" data-confirm="Are you sure you want to received this request?">RECEIVED</button>
								</div>
								
								<div class="pull-right">
									<button type="submit" id="id_ureq_update_modal" class="btn btn-primary btn-sm"> SUBMIT</button>
									<button type="button" id="id_ureq_close_modal" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							
							</div>
						
						</div>
					
					</div>
					
				</div>
			
			</form>
			
		</div>
		
	</div>
	
	<div class="modal fade" id="id_uitem_modal_show">
	
		<div class="modal-dialog" style="width:20%;">
		
			<form id="id_uform_item">
		
				<div class="modal-content">
				
					<div class="modal-body">

						<div class="container-fluid">
						<br>
							<div class="row">
								
								<div class="col-sm-12">

									<div class="form-group">
										<input type="hidden" class="form-control" id="id_uitem_num" name="name_uitem_num" readonly> 
										<input type="hidden" class="form-control" id="id_uhidden_no" name="name_uhidden_no" value="1"> 

									</div>
									
									<div class="form-group">
										<label>Item Description</label>
										<select class="form-control" id="id_uitem_description"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mat_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].')</option>';
												}					
											?>
										</select>
										
									</div>
																		
									<div class="form-group">
										<label>Item Specs</label>
										<input class="form-control" id="id_uitem_specs" name="name_uitem_specs" readonly> 
									</div>
								
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_uuom" name="name_uuom" readonly> 
									</div>
								
									<div class="form-group">
										<label>Quantity</label>
										<input type="number" class="form-control" id="id_uquantity_requested" name="name_uquantity_requested"> 
									</div>
									
									<div class="form-group">
										<label>Remarks</label>
										<textarea class="form-control" id="id_uremarks" name="name_uremarks"> </textarea> 
									</div>
									
								</div>
							</div>						
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						
						<div class="container-fluid">
						
							<div class="row">
							
								<div class="col-sm-12 pull-right">
									<button type="button" id="id_uadd_item_modal" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_uclose_item_modal" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							
							</div>
						
						</div>
					
					</div>
					
				</div>
			
			</form>
			
		</div>
		
	</div>
	
	<script src="scripts/requestor.js"></script>
	
	
	
	