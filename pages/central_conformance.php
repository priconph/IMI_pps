<?php
	include("includes.php");
	require_once("../oop/oop.php");
	require_once("../oop/hris_oop.php");
	
	session_start();
	
 	$username = $_SESSION['username'];
	// $username = 'chetana';
	
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
			background-color: transparent;
		}
						
	</style>
	
	<div class="container" style="width:95%;">	
	<br>
	<br>
		
		<div class="panel panel-primary" style="width:95%;">
			<div class="panel-heading"> IMI (REQUEST FOR APPROVAL) - CENTRAL MODULE
				<div class="btn-group pull-right">
					<button type="button" id="id_btn_back_to_dashboard" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> DASHBOARD</button>
				</div>
			</div>
			<div class="panel-body">

				<input type="hidden" id="id_hidden_username" name="name_hidden_username" value="<?=$username?>">
				
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div id="display_request_for_conformance">
					</div>
				</div>

			</div>
		</div>
		
	</div>
	
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
								<input type="hidden" class="form-control" id="id_hidden_pkid">

								<div class="col-sm-12">
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>Date</label>
											<input type="datetime" class="form-control" id="id_req_date" name="name_req_date" value="<?php echo date("Y-m-d H:i:s") ; ?>" readonly> 
										</div>
									</div>
										
									<div class="col-sm-6">
										<div class="form-group">
											<label>Department</label>
											<input class="form-control" id="id_req_dept" name="name_req_dept" readonly> 
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>Assy. Line / Section</label>
											<input class="form-control" id="id_req_section" name="name_req_section" readonly> 
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>TS Product <i><font size="1"> (For TS only) </font></i></label>
											<input type="text" list="id_ts_product" class="form-control" id="id_req_ts_product" name="name_req_ts_product" readonly>
											<datalist id="id_ts_product"></datalist> 
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>Item Category</label>
											<input class="form-control" id="id_req_item_cat" name="name_req_item_cat" readonly> 
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Prepared By</label>
											<input class="form-control" id="id_req_preparedby" name="name_req_preparedby" readonly> 
											<input type="hidden" class="form-control" id="id_hidden_req_preparedby" name="name_hidden_req_preparedby" readonly> 
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>Justification <i><font size="2"> (For additional & over consumption) </font></i></label>
											<textarea class="form-control" id="id_req_justi" name="name_req_justi" readonly></textarea>
										</div>
									</div>
									
								</div>
							</div>

								<div class="panel panel-primary" align="center">
									
									<div class="panel-heading clearfix">
										<label class="pull-left" style="padding-top: 5.5px;">ITEM SUMMARY</label>
									</div>

									<div class="panel-body">
								
										<table id="tbl_item_list" class="table table-bordered" border="1">
											<thead>
												<th><center><font size="2">Item Description</font></center></th>
												<th><center><font size="2">Item Specs.</font></center></th>
												<th><center><font size="2">UOM</font></center></th>
												<th><center><font size="2">Quantity</font></center></th>
												<th><center><font size="2">Remarks</font></center></th>
											</thead>
											<tbody id="tbl_item_list_tbody">
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
									<button type="button" id="id_req_conforme_modal" class="btn btn-success btn-sm"><i class="fa fa-thumbs-up" aria-hidden="true"></i>  APPROVE</button>
									<button type="button" id="id_req_revision_modal" class="btn btn-warning btn-sm"><i class="fa fa-random" aria-hidden="true"></i>  FOR REVISION</button>
									<button type="button" id="id_req_rejected_modal" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-down" aria-hidden="true"></i>  REJECT</button>
								</div>
								
								<div class="pull-right">
									<button type="button" id="id_req_close_modal" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
								
							</div>
						
						</div>
					
					</div>
					
				</div>
			
			</form>
			
		</div>
		
	</div>
	
	<div class="modal fade" id="conforme_modal_show">
	
		<div class="modal-dialog" style="width:65%;">
		
			<form id="form_conformed">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="container-fluid">
						
							<div class="panel panel-primary" align="center">

								<div class="panel-heading clearfix">
									<label class="pull-left" style="padding-top: 5.5px;">REQUEST ITEM(S) SUMMARY</label>
								</div>

								<div class="panel-body">
									<table id="tbl_item_list" class="table table-bordered" border="1">
										<thead>
											<th><center><font size="2">Item Description</font></center></th>
											<th><center><font size="2">Item Specs.</font></center></th>
											<th><center><font size="2">UOM</font></center></th>
											<th><center><font size="2">Quantity</font></center></th>
											<th><center><font size="2">Remarks</font></center></th>
										</thead>
										<tbody>
										</tbody>
									</table>
									
								</div>
							</div>	
							
							<div class="panel panel-info" align="center">
								
								<div class="panel-heading clearfix">
									<label class="pull-left" style="padding-top: 5.5px;">CONFORMED ITEM(S) SUMMARY</label>
									<div class="btn-group pull-right">
										<button type="button" id="id_btn_add_conf_item" class="btn btn-warning btn-sm"> ADD ITEM</button>
									</div>
								</div>

								<div class="panel-body">
									<input type="hidden" class="form-control" id="id_hidden_dept" name="name_hidden_dept"> 

									<table id="tbl_conf_item" class="table table-bordered" border="1">
										<thead>
											<th><center><font size="2">ID No.</font></center></th>
											<th><center><font size="2">Item Description</font></center></th>
											<th><center><font size="2">Item Specs.</font></center></th>
											<th><center><font size="2">UOM</font></center></th>
											<th><center><font size="2">Unit price($)</font></center></th>
											<th><center><font size="2">Exchange Rate</font></center></th>
											<th><center><font size="2">Unit price (Php)</font></center></th>					
											<th><center><font size="2">Requested Qty</font></center></th>
											<th><center><font size="2">Charge Dept.</font></center></th>
											<th><center><font size="2">Remarks</font></center></th>
											<th><center><font size="2">Remove</font></center></th>
										</thead>
										<tbody>
										</tbody>
									</table>
									
								</div>
							</div>	
					
							<div class="row">
								<input type="hidden" id="id_hidden_username" value="<?=$username?>">
							
								<div class="col-sm-6">
									<div class="form-group">
										<label>Custodian</label>
										<select class="form-control" id="id_custodian" name="name_custodian" required>
											<!--<option value="rondelu">Ronalyn De Lumban</option>
												<option value="melcasi">Melissa Casilao</option>-->
											<!-- <option value="jelanon">Jennifer Lanon</option> -->
											<!-- <option value="cbsatosa">Carla Monique Satosa</option> -->
											<option value="elosaul">Eloisa Saul</option>
										</select>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Conformed Remarks <i><font size="2"> (Optional) </font></i></label>
										<textarea class="form-control" id="id_conformed_remarks" name="name_conformed_remarks"></textarea>
									</div>
								</div>
									
							</div>
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button type="submit" id="id_btnApproved" class="btn btn-success btn-sm"> SUBMIT</button>
									<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</form>
			
		</div>
		
	</div>
	
	<div class="modal fade" id="id_conf_item_modal_show">
	
		<div class="modal-dialog" style="width:900px;">
		
			<form id="id_form_conf_item">
		
				<div class="modal-content">
				
					<div class="modal-body">

						<div class="container-fluid">
						<br>
							<div class="row">
								
								<input type="hidden" class="form-control" id="id_hidden_department" name="name_hidden_department"> 
								
								<div class="col-sm-3">
									<div class="form-group">
										<label>Date</label>
										<input type="date" class="form-control" id="id_ci_date" name="name_ci_date" value="<?php echo date("Y-m-d") ; ?>" readonly> 
									</div>
								</div>
								<div class="col-sm-6">	
									<div class="form-group">
										<label>Product Description *</label>
										<select class="form-control" id="id_ci_prod_desc" autocomplete="off"> 
										</select>
										<input type="hidden" class="form-control" id="id_ci_pkid" name="name_ci_pkid" autocomplete="off" readonly> 
									</div>
								</div>
								
								<div class="col-sm-3">	
									<div class="form-group">
										<label>Product Specs</label>
										<input class="form-control" id="id_ci_specs" name="name_ci_specs" autocomplete="off" readonly> 
									</div>
								</div>
								<div class="col-sm-2">	
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_ci_uom" name="name_ci_uom" autocomplete="off" readonly> 
									</div>
								</div>
								<div class="col-sm-2">	
									<div class="form-group">
										<label>Unit price ($)</label>
										<input class="form-control" id="id_ci_unit_dollor" name="name_ci_unit_dollor" autocomplete="off" readonly> 
									</div>
								</div>
								<div class="col-sm-2">	
									<div class="form-group">
										<label>Exchange rate</label>
										<input class="form-control" id="id_ci_exchange_rate" name="name_ci_exchange_rate" autocomplete="off" readonly> 
									</div>
								</div>
								<div class="col-sm-3">	
									<div class="form-group">
										<label>Unit price (Php)</label>
										<input class="form-control" id="id_ci_unit_peso" name="name_ci_unit_peso" autocomplete="off" readonly> 
									</div>
								</div>
								<div class="col-sm-2">	
									<div class="form-group">
										<label>Current Stock</label>
										<input class="form-control" style="color:blue;" id="id_ci_stock_qty" name="name_ci_stock_qty" autocomplete="off" readonly> 
									</div>
								</div>
								<div class="col-sm-2">		
									<div class="form-group">
										<label>Requested Qty *</label>
										<input type="number" style="color:green;" class="form-control" id="id_ci_qty" name="name_ci_qty" autocomplete="off"> 
									</div>
								</div>
								<div class="col-sm-3">	
									<div class="form-group">
										<label>Charge Dept. *</label>
										<select class="form-control" id="id_ci_charge_dept" name="name_ci_charge_dept" required >
											<option value="">--SELECT--</option>
											<option value="TS">TS</option>
											<option value="CN">CN</option>
											<option value="PPS">PPS</option>
											<option value="YF">YF</option>
										</select>										
									</div>
								</div>
								<div class="col-sm-7">		
									<div class="form-group">
										<label>Remarks</label>
										<input class="form-control" id="id_ci_remarks" name="name_ci_remarks" autocomplete="off"> 
									</div>
								</div>
								
								<input type="hidden" class="form-control" id="id_ci_encoded_by" name="name_ci_encoded_by" value="<?=$username?>" readonly> 

							</div>						
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="row">
							<div class="col-sm-12 pull-right">
								<button type="button" id="id_add_conf_item_modal" class="btn btn-success btn-sm"> ADD</button>
								<button type="button" id="id_close_conf_item_modal" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
		
	</div>
	
	<div class="modal fade" id="revision_modal_show">
	
		<div class="modal-dialog" style="width:35%;">
		
			<form id="form_revision">
		
				<div class="modal-content">
				
					<div class="modal-body">

						<div class="container-fluid">
						<br>
							<div class="row">
							<input type="hidden" id="id_hidden_username" value="<?=$username?>">

								<div class="col-sm-12">
									<div class="form-group">
										<label>Revision Remarks</label>
										<textarea class="form-control" id="id_revision_remarks" name="name_revision_remarks"></textarea>
									</div>
								</div>
									
							</div>
						</div>
	
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button type="submit" class="btn btn-success btn-sm"> SUBMIT</button>
									<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</form>
			
		</div>
		
	</div>
	
	<div class="modal fade" id="reject_modal_show">
	
		<div class="modal-dialog" style="width:35%;">
		
			<form id="form_rejected">
		
				<div class="modal-content">
				
					<div class="modal-body">

						<div class="container-fluid">
						<br>
							<div class="row">
							<input type="hidden" id="id_hidden_username" value="<?=$username?>">

								<div class="col-sm-12">
									<div class="form-group">
										<label>Reject Remarks</label>
										<textarea class="form-control" id="id_rejected_remarks" name="name_rejected_remarks"></textarea>
									</div>
								</div>
									
							</div>
						</div>
	
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button type="submit" class="btn btn-success btn-sm"> SUBMIT</button>
									<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</form>
			
		</div>
		
	</div>
	
	<div class="modal fade" id="export_modal_show">
	
		<div class="modal-dialog" style="width:20%;">
		
			<form id="form_report">
		
				<div class="modal-content">
				
					<div class="modal-body">

						<div class="container-fluid">
						<br>
							<div class="row">
							
								<div class="col-sm-12">
									<div class="form-group">
										<label>Start Date</label>
										<input id="tbox_startDate" name="tbox_startDate" type="date" class="form-control" value="<?php print $_GET['tbox_startDate']; ?>"/>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>End Date</label>
										<input id="tbox_endDate" name="tbox_endDate" type="date" class="form-control" value="<?php print $_GET['tbox_endDate']; ?>"/>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Choose Department to Export</label>
										<select class="form-control" id="drp_dept_report" name="name_dept_report" required> 
												<option value=''>--Select--</option>
												<option value='1'>TS</option>
												<option value='2'>PPS</option>
												<option value='3'>CN</option>
												<option value='4'>YF</option>
												<option value='5'>Overall</option>
												
										</select>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Requestor</label>
										<select class="form-control" id="id_requestor" name="name_requestor" required> 
											<option value=''>--Select--</option>
											<?php
												// $result = INVS::getInstance()->select_requestor_name();
												// while($row = mysqli_fetch_array($result)) {
													// echo '<option value='.$row['username'].'>'.$row['name'].' </option>';
												// }					
											?>
										</select>
									</div>
								</div>
									
							</div>
						</div>
	
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<a role="button" class="btn btn-success btn-sm" onClick="exportToExcelReport();" data-placement="bottom" title="Click this to generate excel file." data-original-title="">EXPORT </a>
									<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</form>
			
		</div>
	</div>
		
	<script src="scripts/central_conformance.js"></script>
	
	
	
	