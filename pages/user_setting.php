<?php
	include("includes.php");
	// require_once("../oop/oop.php");
	// require_once("../oop/hris_oop.php");
	
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
			<div class="panel-heading"> IMI - USERS SETTING
				<div class="pull-right">
					<button type="button" id="id_btn_add_new_user" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> ADD NEW REQUESTOR</button>
					<button type="button" id="id_btn_back_to_dashboard" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> DASHBOARD</button>
				</div>
			</div>
			<div class="panel-body">
				
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div id="container_display_user_setting">
					</div>
				</div>

			</div>
		</div>
		
	</div>
	
	<div class="modal fade" id="id_new_user_modal_show">
	
		<div class="modal-dialog" style="width:30%;">
		
			<form id="id_form_new_user" data-confirm="Are you sure you want to add this data?">

				<div class="modal-content">
				
					<div class="modal-body">
				
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>NEW USER</b></center></h4>
						</div>

						<div class="container-fluid">
						<br>
							<div class="row">
																			
								<div class="col-sm-12">
									<div class="form-group">
										<label>Requestor Name</label>
										<input class="form-control setFont" style="font-size: 14px; height:35px;" list="id_list_requestor_name" name="name_list_requestor_name" id="id_requestor_name">
										<datalist id="id_list_requestor_name"></datalist>
										<input class="form-control setFont" type="text" id="id_hidden_req_username" name="name_hidden_req_username" readonly>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Supervior Name</label>
										<input class="form-control setFont" style="font-size: 14px; height:35px;" list="id_list_superior_name" name="name_list_superior_name" id="id_superior_name">
										<datalist id="id_list_superior_name"></datalist>
										<input class="form-control setFont" type="text" id="id_hidden_superior_username" name="name_hidden_superior_username" readonly>
									</div>
								</div>
								
							</div>

						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">								
								<div class="pull-right">
									<button type="submit" id="id_add_new_user_modal" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_close_modal" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
									
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
		
	</div>
	
	<div class="modal fade" id="id_update_user_modal_show">
	
		<div class="modal-dialog" style="width:30%;">
		
			<form id="id_form_update_user" data-confirm="Are you sure you want to update this data?">>
		
				<div class="modal-content">
				
					<div class="modal-body">
				
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>UPDATE USER</b></center></h4>
						</div>

						<div class="container-fluid">
						<br>
							<div class="row">

								<input type="hidden" id="hidden_id_user_setting" name="name_hidden_id_user_setting">										
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Requestor Name</label>
										<input class="form-control setFont" style="font-size: 14px; height:35px;" list="id_ulist_requestor_name" name="name_ulist_requestor_name" id="id_urequestor_name">
										<datalist id="id_ulist_requestor_name"></datalist>
										<input class="form-control setFont" type="text" id="id_uhidden_req_username" name="name_uhidden_req_username" readonly>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Supervior Name</label>
										<input class="form-control setFont" style="font-size: 14px; height:35px;" list="id_ulist_superior_name" name="name_ulist_superior_name" id="id_usuperior_name">
										<datalist id="id_ulist_superior_name"></datalist>
										<input class="form-control setFont" type="text" id="id_uhidden_superior_username" name="name_uhidden_superior_username" readonly>
									</div>
								</div>
									
							</div>

						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">								
								<div class="pull-right">
									<button type="submit" id="id_add_update_user_modal" class="btn btn-success btn-sm"> UPDATE</button>
									<button type="button" id="id_update_close_modal" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
		
	</div>
	
	
	<script src="scripts/user_setting.js"></script>
	
	
	
	