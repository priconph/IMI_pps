<?php
	include("includes.php");
	require_once("../oop/oop.php");
	require_once("../oop/hris_oop.php");
	
	session_start();
	
 	$username = $_SESSION['username'];
	// $username = 'jelanon';
	

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
	
	<div class="container" style="width:95%;">
	<br>
	<br>
	
	<div class="panel panel-info">
		<div class="panel-heading"> IMI (WITHDRAWAL) - CUSTODIAN MODULE</div>
		<div class="panel-body">
		
		
			<div class="row sub_content">
			<br>
			
				<input type="hidden" id="id_hidden_username" name="name_hidden_username" value="<?=$username?>">
				
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div id="display_conformed_request">
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
								<input type="hidden" class="form-control" id="id_hidden_fiscal">

								<div class="col-sm-12">
									
									<div class="col-sm-6">
										<div class="form-group">
											<label>Date</label>
											<input class="form-control" id="id_req_date" name="name_req_date" readonly> 
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
										<label class="pull-left" style="padding-top: 5.5px;">CONFORMED ITEM(S) SUMMARY</label>
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
											</thead>
											<tbody id="tbl_item_list_tbody">
											</tbody>
										</table>
										
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group">
										<label>Conformed Remarks</label>
										<textarea class="form-control" id="id_req_conformed_remarks" name="name_req_conformed_remarks" readonly></textarea>
									</div>
								</div>

							
						</div>
						
					</div>
					
					<div class="modal-footer">
						
						<div class="container-fluid">
						
							<div class="row">
								<div class="pull-left">
									<button type="button" id="id_req_served_modal" class="btn btn-success btn-sm"><i class="fa fa-thumbs-up" aria-hidden="true"></i>  SERVED</button>
									<button type="button" id="id_req_unserved_modal" class="btn btn-warning btn-sm"><i class="fa fa-retweet" aria-hidden="true"></i>  WITH UNSERVED</button>
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
	
	<div class="modal fade" id="served_modal_show">
	
		<div class="modal-dialog" style="width:35%;">
		
			<form id="form_served">
		
				<div class="modal-content">
				
					<div class="modal-body">

						<div class="container-fluid">
						<br>
							<div class="row">
							<input type="hidden" id="id_hidden_username" value="<?=$username?>">
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Served Remarks <i><font size="2"> (Optional) </font></i></label>
										<textarea class="form-control" id="id_served_remarks" name="name_served_remarks"></textarea>
									</div>
								</div>
									
							</div>
						</div>
	
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button type="submit" id="id_btnserved" class="btn btn-success btn-sm"> SUBMIT</button>
									<button type="button" id="id_btnSCancel" class="btn btn-danger btn-sm"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</form>
			
		</div>
		
	</div>
	
	<div class="modal fade" id="unserved_modal_show">
	
		<div class="modal-dialog" style="width:35%;">
		
			<form id="form_unserved">
		
				<div class="modal-content">
				
					<div class="modal-body">

						<div class="container-fluid">
						<br>
							<div class="row">
							<input type="hidden" id="id_hidden_username" value="<?=$username?>">
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Unserved Remarks</label>
										<textarea class="form-control" id="id_unserved_remarks" name="name_unserved_remarks" required></textarea>
									</div>
								</div>
									
							</div>
						</div>
	
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button type="submit" id="id_btnUnserved" class="btn btn-success btn-sm"> SUBMIT</button>
									<button type="button" id="id_btnUNCancel" class="btn btn-danger btn-sm"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</form>
			
		</div>
		
	</div>
	
	<script src="scripts/custodian.js"></script>
	
	
	
	