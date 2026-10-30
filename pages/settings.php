<?php
	include("includes.php");
	require_once("../oop/oop.php");
	require_once("../oop/hris_oop.php");
	
	session_start();
	
 	$username = $_SESSION['username'];
	// $username = 'jangeco';

	
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

		#tab_central .nav-pills > li > a {
		  border-radius: 5px 5px 0 0 ;
		}

		#tab_central .tab-content {
		  color : black;
		  padding : 5px 15px;
		}		
		
	</style>
	
	<div id="tab_settings" class="container" style="width:95%;">	
	<br>
	<br>
	
	<div class="panel panel-primary">
		<div class="panel-heading">INDIRECT MATERIALS INFORMATION
			<div class="btn-group pull-right">
				<button type="button" id="id_btn_back_to_dashboard" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> DASHBOARD</button>
			</div>
		</div>
		<div class="panel-body">
		
		<div class="tabbable"> 
			<ul class="nav nav-tabs">
				<li class="active" id="tab_mtls_info">
					<a href="#tab1" data-toggle="tab" style="font-size: 14px;">MATERIAL INFO.</a>
				</li>
				<li id="tab_mtls_details">
					<a href="#tab2" data-toggle="tab" style="font-size: 14px;">MATERIAL DETAILS</a>
				</li>
				<li id="tab_mtls_stock">
					<a href="#tab3" data-toggle="tab" style="font-size: 14px;">MATERIAL STOCKS</a>
				</li>
				<li id="tab_withdrawal">
					<a href="#tab4" data-toggle="tab" style="font-size: 14px;">WITHDRAWAL SUMMARY</a>
				</li>
				<li id="tab_received_edit">
					<a href="#tab5" data-toggle="tab" style="font-size: 14px;">RECEIVED SUMMARY</a>
				</li>
			</ul>
					
			<div class="tab-content">
				
				<div class="tab-pane active" id="tab1">
					<div class="container" style="width:100%;">
			
						<div class="row sub_content">
						<br>
						<input type="hidden" id="id_hidden_username" name="name_hidden_username" value="<?=$username?>">
								
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
										<center><h1 class="page-header" style="font-size:18px;"><strong>MATERIAL INFORMATION</strong></h1></center>
									</div>
									<br>
									<br>
									<br>

									<div class="pull-left">
										<button type="button" id="id_btn_add_mtls_info" class="btn btn-success btn-sm"> ADD MATERIAL INFO</button>
										<button type="button" id="id_btn_remove_mtls_info" class="btn btn-danger btn-sm" data-confirm="Are you sure you want to delete this material?"> REMOVE</button>
									</div>
								</div>
							</div>
							<br>
							
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div id="display_mtls_info">
								</div>
							</div>

						</div>
						
					</div>
				</div><!-- tab1-->
				
				<div class="tab-pane" id="tab2">
					<div class="container" style="width:100%;">
			
						<div class="row sub_content">
						<br>
						<input type="hidden" id="id_hidden_username" name="name_hidden_username" value="<?=$username?>">
						<input type="hidden" id="id_current_stock" name="name_current_stock" >
						<input type="hidden" id="id_hidden_current_stock_pkid" name="name_hidden_current_stock_pkid" >
							
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
										<center><h1 class="page-header" style="font-size:18px;"><strong>MATERIAL DETAILS</strong></h1></center>
									</div>
									<br>
									<br>
									<br>

									<div class="pull-left">
										<button type="button" id="id_btn_add_mtls_dtls" class="btn btn-success btn-sm"> ADD MATERIAL DETAILS</button>
										<button type="button" id="id_btn_remove_mtls_dtls" class="btn btn-danger btn-sm" data-confirm="Are you sure you want to delete this material details?"> REMOVE</button>
									</div>
								</div>
							</div>
							<br>
							
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div id="display_mtls_dtls">
								</div>
							</div>

						</div>
						
					</div>
				</div><!-- tab2-->
				
				<div class="tab-pane" id="tab3">
				
					<div class="container" style="width:100%;">
			
						<div class="row sub_content">
						<br>
						
							<div class="tabbable"> 
								<ul class="nav nav-tabs">
								
									<div class="container-fluid">
										<div class="row">
											<div class="pull-left">
												<button type="button" id="id_inventory_report_modal" class="btn btn-success btn-sm"> EXPORT INVENTORY REPORT</button>
											</div>
										</div>
									</div>
									<br>
									
									
									<!-- <li class="active" id="tab_TS">
										<a href="#MD_tab1" data-toggle="tab" style="font-size: 14px; font-family: Euphemia;">TS</a>
									</li> -->
									<li class="active" id="tab_PPS">
										<a href="#MD_tab2" data-toggle="tab" style="font-size: 14px; font-family: Euphemia;">PPS</a>
									</li>
									<!-- <li id="tab_CN">
										<a href="#MD_tab3" data-toggle="tab" style="font-size: 14px; font-family: Euphemia;">CN</a>
									</li>
									<li id="tab_YF">
										<a href="#MD_tab4" data-toggle="tab" style="font-size: 14px; font-family: Euphemia;">YF</a>
									</li> -->
									<li id="tab_all">
										<a href="#MD_tab5" data-toggle="tab" style="font-size: 14px; font-family: Euphemia;">EOH QTY (OVERALL)</a>
									</li>
								</ul>
								
								<!-- tab material details per section -->
								<div class="tab-content">

									<div class="tab-pane" id="MD_tab1">
									
										<div class="container" style="width:100%;">
										<br>
											<div class="row">
												<div class="pull-left">
													<center><h1 class="page-header" style="font-size:18px;"><strong>TS - Material Stocks</strong></h1></center><br>
													<button type="button" id="id_btn_rcv_TS" class="btn btn-primary btn-sm"> RECEIVE</button>
													<button type="button" id="id_btn_transf_TS" class="btn btn-warning btn-sm"> WITHDRAW / TRANSFER</button>
													<!--
													<button type="button" id="id_btn_add_mtls_dtls_TS" class="btn btn-success btn-sm"> ADD TS STOCK</button>
													<button type="button" id="id_btn_remove_mtls_dtls_TS" class="btn btn-danger btn-sm" data-confirm="Are you sure you want to delete this material?"> REMOVE</button>
													-->
												</div>
											</div>
											<br>
											
											<div class="row sub_content">
											<br>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div id="display_mtls_dtls_TS">
												</div>
											</div>

											</div>
											
										</div>
									
									</div><!-- MD_tab1-->
							
									<div class="tab-pane active" id="MD_tab2">
									
										<div class="container" style="width:100%;">
										<br>
								
											<div class="row">
												<div class="pull-left">
													<center><h1 class="page-header" style="font-size:18px;"><strong>PPS - Material Stocks</strong></h1></center><br>
													<button type="button" id="id_btn_rcv_PPS" class="btn btn-primary btn-sm"> RECEIVE</button>
													<button type="button" id="id_btn_transf_PPS" class="btn btn-warning btn-sm"> WITHDRAW / TRANSFER</button>
													<!--
													<button type="button" id="id_btn_add_mtls_dtls_CN" class="btn btn-success btn-sm"> ADD TS STOCK</button>
													<button type="button" id="id_btn_remove_mtls_dtls_CN" class="btn btn-danger btn-sm" data-confirm="Are you sure you want to delete this material?"> REMOVE</button>
													-->
												</div>
											</div>
											<br>
											
											<div class="row sub_content">
											<br>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div id="display_mtls_dtls_PPS">
												</div>
											</div>

											</div>
											
										</div>
									
									</div><!-- MD_tab2-->
									
									<div class="tab-pane" id="MD_tab3">
									
										<div class="container" style="width:100%;">
										<br>
								
											<div class="row">
												<div class="pull-left">
													<center><h1 class="page-header" style="font-size:18px;"><strong>CN - Material Stocks</strong></h1></center><br>
													<button type="button" id="id_btn_rcv_CN" class="btn btn-primary btn-sm"> RECEIVE</button>
													<button type="button" id="id_btn_transf_CN" class="btn btn-warning btn-sm"> WITHDRAW / TRANSFER</button>
													<!--
													<button type="button" id="id_btn_remove_mtls_dtls_CN" class="btn btn-danger btn-sm" data-confirm="Are you sure you want to delete this material?"> REMOVE</button>
													-->
												</div>
											</div>
											<br>
											
											<div class="row sub_content">
											<br>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div id="display_mtls_dtls_CN">
												</div>
											</div>

											</div>
											
										</div>
									
									</div><!-- Wtab3-->
									
									<div class="tab-pane" id="MD_tab4">
									
										<div class="container" style="width:100%;">
										<br>
								
											<div class="row">
												<div class="pull-left">
													<center><h1 class="page-header" style="font-size:18px;"><strong>YF - Material Stocks</strong></h1></center><br>
													<button type="button" id="id_btn_rcv_YF" class="btn btn-primary btn-sm"> RECEIVE</button>
													<button type="button" id="id_btn_transf_YF" class="btn btn-warning btn-sm"> WITHDRAW / TRANSFER</button>
													<!--
													<button type="button" id="id_btn_remove_mtls_dtls_YF" class="btn btn-danger btn-sm" data-confirm="Are you sure you want to delete this material?"> REMOVE</button>
													-->
												</div>
											</div>
											<br>
											
											<div class="row sub_content">
											<br>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div id="display_mtls_dtls_YF">
												</div>
											</div>

											</div>
											
										</div>
									
									</div><!-- Wtab4-->
							
									<div class="tab-pane" id="MD_tab5">
									
										<div class="container" style="width:100%;">
										<br>
											
										<div class="row">
											<div class="col-lg-12">
												<center><h1 class="page-header" style="font-size:18px;"><strong>EOH QTY OVERALL as of </strong> <?php echo date("F j, Y") ; ?></h1></center>
											</div>
											<br>
											<br>
											<br>

											<div class="col-lg-12 col-md-12 col-sm-12">
												<div id="display_mtls_dtls_overall">
												</div>
											</div>

										</div>
											
										</div>
									
									</div><!-- Wtab5-->
							
								</div>
				
							</div>
							
						</div>
						
					</div>
				
				</div><!-- tab3-->
				
				<div class="tab-pane" id="tab4">
				
					<div class="container" style="width:100%;">
			
						<div class="row sub_content">
						<br>
						
							<div class="tabbable"> 
								<ul class="nav nav-tabs">
									<div class="container-fluid">
										<div class="row">
											<div class="pull-left">
												<button type="button" id="id_withdrawal_report_modal" class="btn btn-success btn-sm"> EXPORT WITHDRAWAL REPORT</button>
											</div>
										</div>
									</div>
									<br>
									
									<!-- <li class="active" id="tab_TS">
										<a href="#Wtab1" data-toggle="tab" style="font-size: 14px; font-family: Euphemia;">TS</a>
									</li> -->
									<li class="active" id="tab_PPS">
										<a href="#Wtab2" data-toggle="tab" style="font-size: 14px; font-family: Euphemia;">PPS</a>
									</li>
									<!-- <li id="tab_CN">
										<a href="#Wtab3" data-toggle="tab" style="font-size: 14px; font-family: Euphemia;">CN</a>
									</li>
									<li id="tab_YF">
										<a href="#Wtab4" data-toggle="tab" style="font-size: 14px; font-family: Euphemia;">YF</a>
									</li> -->
								</ul>
								
								<!-- tab withdrawal per section -->
								<div class="tab-content">

									<div class="tab-pane" id="Wtab1">
									
										<div class="container" style="width:100%;">
								
											<div class="row sub_content">
											<br>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div id="display_TS_withdrawal">
												</div>
											</div>

											</div>
											
										</div>
									
									</div><!-- Wtab1-->
									
									<div class="tab-pane active" id="Wtab2">
									
										<div class="container" style="width:100%;">
								
											<div class="row sub_content">
											<br>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div id="display_PPS_withdrawal">
												</div>
											</div>

											</div>
											
										</div>
									
									</div><!-- Wtab2-->
									
									<div class="tab-pane" id="Wtab3">
									
										<div class="container" style="width:100%;">
								
											<div class="row sub_content">
											<br>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div id="display_CN_withdrawal">
												</div>
											</div>

											</div>
											
										</div>
									
									</div><!-- Wtab3-->
									
									<div class="tab-pane" id="Wtab4">
									
										<div class="container" style="width:100%;">
								
											<div class="row sub_content">
											<br>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div id="display_YF_withdrawal">
												</div>
											</div>

											</div>
											
										</div>
									
									</div><!-- Wtab4-->
							
								</div>
				
							</div>
							
						</div>
						
					</div>
				
				</div><!-- tab4-->
		
				<div class="tab-pane" id="tab5">
				
					<div class="container" style="width:100%;">
			
						<div class="row sub_content">
						<br>
						
							<div class="tabbable"> 
								<ul class="nav nav-tabs">
								
									<!-- <li class="active" id="tab_TS">
										<a href="#RS_tab1" data-toggle="tab" style="font-size: 14px; font-family: Euphemia;">TS</a>
									</li> -->
									<li class="active" id="tab_PPS">
										<a href="#RS_tab2" data-toggle="tab" style="font-size: 14px; font-family: Euphemia;">PPS</a>
									</li>
									<!-- <li id="tab_CN">
										<a href="#RS_tab3" data-toggle="tab" style="font-size: 14px; font-family: Euphemia;">CN</a>
									</li>
									<li id="tab_YF">
										<a href="#RS_tab4" data-toggle="tab" style="font-size: 14px; font-family: Euphemia;">YF</a>
									</li> -->
								</ul>
								
					
								<div class="tab-content">

									<div class="tab-pane" id="RS_tab1">
									
										<div class="container" style="width:100%;">
										<br>
								
											<div class="row sub_content">
											<br>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div id="display_TS_recieved_info">
												</div>
											</div>

											</div>
											
										</div>
									
									</div><!-- RS_tab1-->
							
									<div class="tab-pane active" id="RS_tab2">
									
										<div class="container" style="width:100%;">
										<br>
								
											<div class="row sub_content">
											<br>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div id="display_PPS_recieved_info">
												</div>
											</div>

											</div>
											
										</div>
									
									</div><!-- RS_tab2-->
									
									<div class="tab-pane" id="RS_tab3">
									
										<div class="container" style="width:100%;">
										<br>
								
											<div class="row sub_content">
											<br>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div id="display_CN_recieved_info">
												</div>
											</div>

											</div>
											
										</div>
									
									</div><!-- RS_tab3-->
									
									<div class="tab-pane" id="RS_tab4">
									
										<div class="container" style="width:100%;">
										<br>
								
											<div class="row sub_content">
											<br>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div id="display_YF_recieved_info">
												</div>
											</div>

											</div>
											
										</div>
									
									</div><!-- RS_tab4-->
							
								</div>
				
									
							</div> <!-- tabbable -->
						</div>
					</div>
				</div><!-- tab5-->

			</div><!-- tab content-->

		</div>
		</div>
	</div>
	</div>

	<!-- material info -->
	<div class="modal fade" id="id_add_mtls_info_modal_show">

		<div class="modal-dialog" style="width:25%;">
		
			<form id="id_form_add_mtls_info">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>ADD NEW MATERIAL INFO.</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>  
							<div class="row">
								<input type="hidden" class="form-control" id="id_hidden_pkid">

								<div class="col-sm-12">
									
									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_mtls_info_date" name="name_mtls_info_date" value="<?php echo date("Y-m-d") ; ?>" readonly> 
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<input type="checkbox" id="id_mtls_info_pps_inv" name="name_mtls_info_pps_inv" value="1"> PPS PRODUCT
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<input class="form-control" id="id_mtls_info_prod_desc" name="name_mtls_info_prod_desc" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_mtls_info_specs" name="name_mtls_info_specs" autocomplete="off"> 
									</div>
									<div class="form-group">
										<label>UOM</label>
										<select class="form-control" id="id_mtls_info_uom" name="name_mtls_info_uom" autocomplete="off" required>
											<option value="0">--Select--</option>
											<option value="bag(s)">bag(s)</option>
											<option value="box(s)">box(s)</option>
											<option value="btl(s)">btl(s)</option>
											<option value="can(s)">can(s)</option>
											<option value="kilo(s)">kilo(s)</option>
											<option value="liter(s)">liter(s)</option>
											<option value="pack(s)">pack(s)</option>
											<option value="pad(s)">pad(s)</option>
											<option value="pair(s)">pair(s)</option>
											<option value="pc(s)">pc(s)</option>
											<option value="roll(s)">roll(s)</option>
											<option value="tube(s)">tube(s)</option>
										</select>		
									</div>
									<input type="hidden" class="form-control" id="id_mtls_info_encoded_by" name="name_mtls_info_encoded_by" value="<?php echo $username; ?> "readonly> 
									
								</div>
									
								</div>
							</div>
							
						</div>
						
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_mtls_info_add" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_mtls_info_x_add" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_update_mtls_info_modal_show">

		<div class="modal-dialog" style="width:25%;">
		
			<form id="id_form_update_mtls_info">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>UPDATE MATERIAL INFO.</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>  
							<div class="row">
								<input type="hidden" class="form-control" id="id_uhidden_pkid" readonly>

								<div class="col-sm-12">
									
									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_umtls_info_date" name="name_umtls_info_date" value="<?php echo date("Y-m-d") ; ?>" readonly> 
									</div>
								</div>
									
								<div class="col-sm-6">
									<div class="form-group">
										<input type="checkbox" id="id_umtls_info_pps_inv" name="name_umtls_info_pps_inv" value="1" disabled title="checked"> PPS PRODUCT
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<input class="form-control" id="id_umtls_info_prod_desc" name="name_umtls_info_prod_desc" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_umtls_info_specs" name="name_umtls_info_specs" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<select class="form-control" id="id_umtls_info_uom" name="name_umtls_info_uom" autocomplete="off" required>
											<option value="0">--Select--</option>
											<option value="bag(s)">bag(s)</option>
											<option value="box(s)">box(s)</option>
											<option value="btl(s)">btl(s)</option>
											<option value="can(s)">can(s)</option>
											<option value="kilo(s)">kilo(s)</option>
											<option value="liter(s)">liter(s)</option>
											<option value="pack(s)">pack(s)</option>
											<option value="pad(s)">pad(s)</option>
											<option value="pair(s)">pair(s)</option>
											<option value="pc(s)">pc(s)</option>
											<option value="roll(s)">roll(s)</option>
											<option value="tube(s)">tube(s)</option>
										</select>		
									</div>
									<input type="hidden" class="form-control" id="id_umtls_info_encoded_by" name="name_umtls_info_encoded_by" value="<?php echo $username; ?> "readonly> 
									
								</div>
									
								</div>
							</div>
							
						</div>
						
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_mtls_info_update" class="btn btn-success btn-sm"> UPDATE</button>
									<button type="button" id="id_mtls_info_x_update" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<!-- material details -->
	<div class="modal fade" id="id_add_mtls_dtls_modal_show">

		<div class="modal-dialog" style="width:40%;">
		
			<form id="id_form_add_mtls_dtls">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>ADD NEW MATERIAL DETAILS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>  
							<div class="row">
								<input type="hidden" class="form-control" id="id_hidden_pkid">

								<div class="col-sm-6">

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_mtls_dtls_date" name="name_mtls_dtls_date" value="<?php echo date("Y-m-d") ; ?>" readonly> 
									</div>
				
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_mtls_dtls_desc" name="name_mtls_dtls_desc" autocomplete="off"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mat_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') ('.$row['mat_uom'].')</option>';
												}					
											?>
										</select>
										<input type="hidden" class="form-control" id="id_mtls_dtls_pkid" name="name_mtls_dtls_pkid" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_mtls_dtls_specs" name="name_mtls_dtls_specs" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_mtls_dtls_uom" name="name_mtls_dtls_uom" autocomplete="off" readonly> 
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>UNIT PRICE IN $</label>
										<input class="form-control" id="id_mtls_dtls_dollor" name="name_mtls_dtls_dollor" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_mtls_dtls_exc" name="name_mtls_dtls_exc" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE IN Php</label>
										<input class="form-control" id="id_mtls_dtls_peso" name="name_mtls_dtls_peso" autocomplete="off"> 
									</div>
									
									<input type="hidden" class="form-control" id="id_mtls_info_encoded_by" name="name_mtls_info_encoded_by" value="<?php echo $username; ?> "readonly> 
									
								</div>
									
								</div>
							</div>
							
						</div>
						
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_mtls_info_add" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_mtls_dtls_x_add" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_update_mtls_dtls_modal_show">

		<div class="modal-dialog" style="width:40%;">
		
			<form id="id_form_update_mtls_dtls">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>UPDATE MATERIAL DETAILS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>  
							<div class="row">
								<input type="hidden" class="form-control" id="id_uhidden_pkid" readonly>
								<input type="hidden" class="form-control" id="id_ttl_current_stocks">

								<div class="col-sm-6">

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_umtls_dtls_date" name="name_umtls_dtls_date" value="<?php echo date("Y-m-d") ; ?>" readonly> 
									</div>
				
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_umtls_dtls_desc" name="name_umtls_dtls_desc" autocomplete="off" readonly> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mat_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') ('.$row['mat_uom'].')</option>';
												}					
											?>
										</select>
										<input type="hidden" class="form-control" id="id_umtls_dtls_pkid" name="name_umtls_dtls_pkid" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_umtls_dtls_specs" name="name_umtls_dtls_specs" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_umtls_dtls_uom" name="name_umtls_dtls_uom" autocomplete="off" readonly> 
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>UNIT PRICE IN $</label>
										<input class="form-control" id="id_umtls_dtls_dollor" name="name_umtls_dtls_dollor" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_umtls_dtls_exc" name="name_umtls_dtls_exc" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE IN Php</label>
										<input class="form-control" id="id_umtls_dtls_peso" name="name_umtls_dtls_peso" autocomplete="off"> 
									</div>
									
									<input type="hidden" class="form-control" id="id_umtls_info_encoded_by" name="name_umtls_info_encoded_by" value="<?php echo $username; ?> "readonly> 
									
								</div>
									
								</div>
							</div>
							
						</div>
						
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_mtls_info_update" class="btn btn-success btn-sm"> UPDATE</button>
									<button type="button" id="id_mtls_dtls_x_update" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>

	<!-- PPS EOH -->
	<div class="modal fade" id="id_add_pps_eoh_modal_show">

		<div class="modal-dialog" style="width:40%;">
		
			<form id="id_form_add_pps_eoh">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>PPS EOH SUMMARY</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>  
							<div class="row">
								<input type="hidden" class="form-control" id="id_pe_hidden_pkid" name="name_pe_hidden_pkid" readonly>
								<input type="hidden" class="form-control" id="id_pe_encoded_by" name="name_pe_encoded_by" value="<?php echo $username; ?> "readonly> 

								<div class="col-sm-4">
									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_pe_date" name="name_pe_date" value="<?php echo date("Y-m-d") ; ?>" > 
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<label>Product Description</label>
										<input class="form-control" id="id_pe_desc" name="name_pe_desc" autocomplete="off" readonly> 
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<label>UNIT PRICE IN $</label>
										<input class="form-control" id="id_pe_dollor" name="name_pe_dollor" autocomplete="off" readonly> 
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>EOH</label>
										<input class="form-control" id="id_pe_eoh" name="name_pe_eoh" autocomplete="off"> 
									</div>
				
								</div>
								
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div id="container_pps_eoh_summary">
										</div>
									</div>
								</div>
														
								</div>
							</div>
							
						</div>
						
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_add_eoh" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_eoh_x_close" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<!-- withdrawal -->
	<div class="modal fade" id="export_withdrawal_modal_show">
	
		<div class="modal-dialog" style="width:20%;">
		
			<form id="form_withdrawal_report">
		
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
										</select>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Requestor</label>
										<input list="id_requestor_list" class="form-control" name="name_requestor" id="id_requestor" autocomplete="off"/>
										<datalist id="id_requestor_list"></datalist> 

										<!--<select class="form-control" id="id_requestor" name="name_requestor" required> 
											<option value=''>--Select--</option>
											<?php
												// $result = INVS::getInstance()->select_requestor_name();
												// while($row = mysqli_fetch_array($result)) {
													// echo '<option value='.$row['username'].'>'.$row['name'].' </option>';
												// }					
											?>
										</select>-->
									</div>
								</div>
									
							</div>
						</div>
	
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<a role="button" class="btn btn-success btn-sm" onClick="exportToExcelReport();" data-placement="bottom" title="Click this to generate excel file." data-original-title="">EXPORT</a>
									<button type="button" id="id_btnACancel" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</form>
			
		</div>
	
	</div>
	
	<!-- inventory -->
	<div class="modal fade" id="export_inventory_modal_show">
	
		<div class="modal-dialog" style="width:40%;">
		
			<form id="form_inventory_report">
		
				<div class="modal-content">
				
					<div class="modal-body">

						<div class="container-fluid">
						<br>
							<div class="row">
							
								<div class="col-sm-12">
									<div class="form-group">
										<label>Start Date!</label>
										<input id="tbox_startDate_inv" name="tbox_startDate_inv" type="date" class="form-control" value="<?php print $_GET['tbox_startDate_inv']; ?>"/>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>End Date!</label>
										<input id="tbox_endDate_inv" name="tbox_endDate_inv" type="date" class="form-control" value="<?php print $_GET['tbox_endDate_inv']; ?>"/>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group">
										<label>Choose Report to Export</label>
										<select class="form-control" id="drp_report_inv" name="name_report" required> 
												<option value='0'>--Select--</option>
												<!-- <option value='1'>Inventory Qty</option> -->
												<!-- <option value='2'>Inventory Amount</option> -->
												<!-- <option value='3'>PPS Inventory Qty</option> -->
												<!-- <option value='4'>PPS Inventory Amount</option> -->
												<option value='5'>PPS Inventory</option>
												
										</select>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group">
										<label>Remarks</label>
										<input type="text" class="form-control" id="id_drp_remarks" name="name_drp_remarks" autocomplete="off" required> 
									</div>
								</div>
																
							</div>
						</div>
	
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<a role="button" class="btn btn-success btn-sm" onClick="exportToExcelReport_inventory();" data-placement="bottom" title="Click this to generate excel file." data-original-title="">EXPORT</a>
									<button type="button" id="id_btnACancel" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</form>
			
		</div>
	
	</div>
	
	<!-- TS -->
	<div class="modal fade" id="id_add_mtls_dtls_TS_modal_show">

		<div class="modal-dialog" style="width:40%;">
		
			<form id="id_form_add_mtls_dtls_TS">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>ADD NEW MATERIAL DETAILS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>  
							<div class="row">
								<input type="hidden" class="form-control" id="id_hidden_pkid">

								<div class="col-sm-6">

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_mtls_dtls_date_TS" name="name_mtls_dtls_date_TS" value="<?php echo date("Y-m-d") ; ?>" readonly> 
									</div>
				
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_mtls_dtls_desc_TS" name="name_mtls_dtls_desc_TS" autocomplete="off"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list_with_price();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mp_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') ('.$row['mat_uom'].')</option>';
												}					
											?>
										</select>
										<input type="text" class="form-control" id="id_mtls_dtls_pkid_TS" name="name_mtls_dtls_pkid_TS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_mtls_dtls_specs_TS" name="name_mtls_dtls_specs_TS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_mtls_dtls_uom_TS" name="name_mtls_dtls_uom_TS" autocomplete="off" readonly> 
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>UNIT PRICE IN $</label>
										<input class="form-control" id="id_mtls_dtls_dollor_TS" name="name_mtls_dtls_dollor_TS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_mtls_dtls_exc_TS" name="name_mtls_dtls_exc_TS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE IN Php</label>
										<input class="form-control" id="id_mtls_dtls_peso_TS" name="name_mtls_dtls_peso_TS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>QTY</label>
										<input type="number" class="form-control" id="id_mtls_dtls_qty_TS" name="name_mtls_dtls_qty_TS" autocomplete="off"> 
									</div>
									
									<input type="hidden" class="form-control" id="id_mtls_info_encoded_by_TS" name="name_mtls_info_encoded_by_TS" value="<?php echo $username; ?> "readonly> 
									
								</div>
									
								</div>
							</div>
							
						</div>
						
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_mtls_info_add_TS" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_mtls_dtls_x_add_TS" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>

	</div>
	
	<div class="modal fade" id="id_update_mtls_dtls_TS_modal_show">

		<div class="modal-dialog" style="width:40%;">
		
			<form id="id_form_update_mtls_dtls_TS">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>UPDATE MATERIAL DETAILS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>  
							<div class="row">
								<input type="hidden" class="form-control" id="id_uhidden_pkid_TS" readonly>

								<div class="col-sm-6">

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_umtls_dtls_date_TS" name="name_umtls_dtls_date_TS" value="<?php echo date("Y-m-d") ; ?>" readonly> 
									</div>
				
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_umtls_dtls_desc_TS" name="name_umtls_dtls_desc_TS" autocomplete="off" readonly> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mat_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') ('.$row['mat_uom'].')</option>';
												}					
											?>
										</select>
										<input type="text" class="form-control" id="id_umtls_dtls_pkid_TS" name="name_umtls_dtls_pkid_TS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_umtls_dtls_specs_TS" name="name_umtls_dtls_specs_TS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_umtls_dtls_uom_TS" name="name_umtls_dtls_uom_TS" autocomplete="off" readonly> 
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>UNIT PRICE IN $</label>
										<input class="form-control" id="id_umtls_dtls_dollor_TS" name="name_umtls_dtls_dollor_TS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_umtls_dtls_exc_TS" name="name_umtls_dtls_exc_TS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE IN Php</label>
										<input class="form-control" id="id_umtls_dtls_peso_TS" name="name_umtls_dtls_peso_TS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>QTY</label>
										<input type="number" class="form-control" id="id_umtls_dtls_qty_TS" name="name_umtls_dtls_qty_TS" autocomplete="off"> 
									</div>
									
									<input type="hidden" class="form-control" id="id_umtls_info_encoded_by_TS" name="name_umtls_info_encoded_by_TS" value="<?php echo $username; ?> "readonly> 
									
								</div>
									
								</div>
							</div>
							
						</div>
						
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_mtls_info_update_TS" class="btn btn-success btn-sm"> UPDATE</button>
									<button type="button" id="id_mtls_dtls_x_update_TS" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_ts_rcv_modal_show">

		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_ts_rcv">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b> TS - RECEIVE MATERIALS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>
							<div class="row">
								<div class="col-sm-4">
									
									<div class="form-group">
										<label>DATE RECEIVE</label>
										<input type="date" class="form-control" id="id_ts_rcv_date" name="name_ts_rcv_date" value="<?php echo date("Y-m-d") ; ?>" > 
									</div>
									
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_ts_rcv_prod_desc" name="name_ts_rcv_prod_desc" autocomplete="off"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list_info();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mp_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') || '.$row['mat_uom'].' || '.$row['mp_exchange_rate'].'</option>';												}					
											?>
										</select>
										<input type="hidden" class="form-control" id="id_ts_rcv_pkid" name="name_ts_rcv_pkid" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE($)</label>
										<input class="form-control" id="id_ts_rcv_unit_dollor" name="name_ts_rcv_unit_dollor" readonly> 
									</div>
									
									<div class="form-group">
										<label>RECEIVE QTY</label>
										<input type="number" class="form-control" id="id_ts_rcv_qty" name="name_ts_rcv_qty" autocomplete="off" required> 
									</div>
									
								</div>
								
								<div class="col-sm-4">	
								
									<div class="form-group">
										<label>SUPPLIER NAME</label>
										<input class="form-control" id="id_ts_supp_name" name="name_ts_supp_name" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_ts_rcv_prod_specs" name="name_ts_rcv_prod_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_ts_rcv_exchange_rate" name="name_ts_rcv_exchange_rate" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-4">
								
									<div class="form-group">
										<label>INVOICE NO.</label>
										<input class="form-control" id="id_ts_rcv_inv_no" name="name_ts_rcv_inv_no" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_ts_rcv_uom" name="name_ts_rcv_uom" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE (Php)</label>
										<input class="form-control" id="id_ts_rcv_unit_peso" name="name_ts_rcv_unit_peso" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-8">	
									
									<div class="form-group">
										<label>REMARKS</label>
										<textarea rows="1" class="form-control" id="id_ts_rcv_remarks" name="name_ts_rcv_remarks"></textarea> 
									</div>
									
								</div>
							
								
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_add_rcv_matls" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_close_ts_rcv_matls" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_ts_transf_modal_show">

		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_ts_transf">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>TS - WITHDRAW / TRANSFER MATERIALS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>
							<div class="row">
								<div class="col-sm-4">
									<input type="hidden" class="form-control" id="id_hidden_ts_dept" name="name_hidden_ts_dept" value="TS" readonly> 

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_ts_transf_date" name="name_ts_transf_date" value="<?php echo date("Y-m-d") ; ?>" > 
									</div>
									
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_ts_transf_prod_desc" name="name_ts_transf_prod_desc" autocomplete="off"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list_info();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mp_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') || '.$row['mat_uom'].' || '.$row['mp_exchange_rate'].'</option>';												}					
											?>
										</select>
										<input type="hidden" class="form-control" id="id_ts_transf_pkid" name="name_ts_transf_pkid" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE($)</label>
										<input class="form-control" id="id_ts_transf_unit_dollor" name="name_ts_transf_unit_dollor" readonly> 
									</div>
									
									<div class="form-group">
										<label>CURRENT STOCK</label>
										<input class="form-control" id="id_ts_transf_current_stock" name="name_ts_transf_current_stock" style="color:green;" readonly> 
									</div>

								</div>
								
								<div class="col-sm-4">	
								
									<div class="form-group">
										<label>TRANSACTION TYPE</label>
										<select class="form-control" id="id_ts_transaction_type" name="name_ts_transaction_type" autocomplete="off" required> 
												<option value='0'>--SELECT--</option>
												<option value='1'>TRANSFER</option>
												<option value='2'>WITHDRAW</option>
												
										</select>
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_ts_transf_prod_specs" name="name_ts_transf_prod_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_ts_transf_exchange_rate" name="name_ts_transf_exchange_rate" readonly> 
									</div>
									
									<div class="form-group">
										<label>QTY</label>
										<input type="number" class="form-control" id="id_ts_transf_qty" name="name_ts_transf_qty" autocomplete="off" required> 
									</div>
									
								</div>
								
								<div class="col-sm-4">
								
									<div class="form-group">
										<label>DEPARTMENT</label>
										<select class="form-control" id="id_ts_transaction_dept" name="name_ts_transaction_dept" autocomplete="off" required> 
												<option value='0'>--SELECT--</option>
												<option value='CN'>CN</option>
												<option value='PPS'>PPS</option>
												<option value='YF'>YF</option>
												<option value='TS'>TS</option>
												<option value='N/A'>N/A</option>
												
										</select>
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_ts_transf_uom" name="name_ts_transf_uom" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE (Php)</label>
										<input class="form-control" id="id_ts_transf_unit_peso" name="name_ts_transf_unit_peso" readonly> 
									</div>							
									
								</div>
								
								<div class="col-sm-12">
								
									<div class="form-group">
										<label>REMARKS</label>
										<input class="form-control" id="id_ts_transf_remarks" name="name_ts_transf_remarks" autocomplete="off"> 
									</div>
								</div>
								
								
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_add_transf_matls" class="btn btn-success btn-sm"> SUBMIT</button>
									<button type="button" id="id_close_ts_transf_matls" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_dtls_ts_modal_show">
	
		<div class="modal-dialog" style="width:70%;">
				
				<div class="modal-content">
				
					<div class="modal-body">
				
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>TS - TRANSACTION DETAILS</b></center></h4>
						</div>

						<div class="container-fluid">
						<br>
							<div class="row">
								<input type="hidden" class="form-control" id="id_hidden_ts_dtls_id" readonly>

								<div class="col-sm-4">
								
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<input class="form-control" id="id_dtls_ts_prod_desc" name="name_dtls_ts_prod_desc" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRICE</label>
										<input class="form-control" id="id_dtls_ts_price" name="name_dtls_ts_price" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-4">
								
									<div class="form-group">
										<label>SPECIFICATION</label>
										<input class="form-control" id="id_dtls_ts_specs" name="name_dtls_ts_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>CURRENT STOCK</label>
										<input class="form-control" id="id_dtls_ts_current_amnt" name="name_dtls_ts_current_amnt" style="color:green;" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-4">
					
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_dtls_ts_uom" name="name_dtls_ts_uom" readonly> 
									</div>
									
								</div>
								
							</div>

							<div class="panel panel-info" align="center">
								<div class="panel-heading clearfix">
									<label class="pull-left" style="padding-top: 5.5px;">TRANSACTION DETAILS</label>
								</div>
								<div class="panel-body">
							
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div id="get_trans_dtls_TS">
									</div>
								</div>
						
								</div>
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						
						<div class="container-fluid">
						
							<div class="row">
								<div class="pull-right">
									<button type="button" id="id_dtls_ts_close_modal" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							
							</div>
						
						</div>
					
					</div>
					
				</div>
				
		</div>
		
	</div>
	
	<div class="modal fade" id="id_ts_rcv_modal_update">

		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_ts_rcvd_update">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b> UPDATE TS - RECEIVED MATERIALS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>
							<div class="row">
								
								<div class="col-sm-6">
									
									<input type="hidden" class="form-control" id="id_uhidden_pkid_TS_received" readonly>

									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<input type="text" class="form-control" id="id_uts_prod_desc" name="name_uts_prod_desc" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_uts_rcv_prod_specs" name="name_uts_rcv_prod_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE(php)</label>
										<input class="form-control" id="id_uts_rcv_unit_price" name="name_uts_rcv_unit_price" readonly> 
									</div>
									
									<div class="form-group">
										<label>RECEIVED QTY</label>
										<input type="number" class="form-control" id="id_uts_rcv_qty" name="name_uts_rcv_qty" autocomplete="off" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-6">	
								
									<div class="form-group">
										<label>DATE RECEIVE</label>
										<input type="date" class="form-control" id="id_uts_rcv_date" name="name_uts_rcv_date" readonly> 
									</div>
									
									<div class="form-group">
										<label>SUPPLIER NAME</label>
										<input class="form-control" id="id_uts_supp_name" name="name_uts_supp_name" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>INVOICE NO.</label>
										<input class="form-control" id="id_uts_rcv_inv_no" name="name_uts_rcv_inv_no" autocomplete="off"> 
									</div>
																		
									<div class="form-group">
										<label>REMARKS</label>
										<textarea rows="3" class="form-control" id="id_uts_rcv_remarks" name="name_uts_rcv_remarks"></textarea> 
									</div>
									
								</div>
									
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_update_rcvd_matls" class="btn btn-success btn-sm"> UPDATE</button>
									<button type="button" id="id_close_ts_rcv_matls" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<!-- PPS -->
	<div class="modal fade" id="id_add_mtls_dtls_PPS_modal_show">

		<div class="modal-dialog" style="width:40%;">
		
			<form id="id_form_add_mtls_dtls_PPS">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>ADD NEW MATERIAL DETAILS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>  
							<div class="row">
								<input type="hidden" class="form-control" id="id_hidden_pkid_PPS">

								<div class="col-sm-6">

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_mtls_dtls_date_PPS" name="name_mtls_dtls_date_PPS" value="<?php echo date("Y-m-d") ; ?>" readonly> 
									</div>
				
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_mtls_dtls_desc_PPS" name="name_mtls_dtls_desc_PPS" autocomplete="off"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list_with_price();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mp_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') ('.$row['mat_uom'].')</option>';
												}					
											?>
										</select>
										<input type="text" class="form-control" id="id_mtls_dtls_pkid_PPS" name="name_mtls_dtls_pkid_PPS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_mtls_dtls_specs_PPS" name="name_mtls_dtls_specs_PPS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_mtls_dtls_uom_PPS" name="name_mtls_dtls_uom_PPS" autocomplete="off" readonly> 
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>UNIT PRICE IN $</label>
										<input type="number" class="form-control" id="id_mtls_dtls_dollor_PPS" name="name_mtls_dtls_dollor_PPS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input type="number" class="form-control" id="id_mtls_dtls_exc_PPS" name="name_mtls_dtls_exc_PPS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE IN Php</label>
										<input type="number" class="form-control" id="id_mtls_dtls_peso_PPS" name="name_mtls_dtls_peso_PPS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>QTY</label>
										<input type="number" class="form-control" id="id_mtls_dtls_qty_PPS" name="name_mtls_dtls_qty_PPS" autocomplete="off" > 
									</div>
									
									<input type="hidden" class="form-control" id="id_mtls_info_encoded_by_PPS" name="name_mtls_info_encoded_by_PPS" value="<?php echo $username; ?> "readonly> 
									
								</div>
									
								</div>
							</div>
							
						</div>
						
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_mtls_info_add_PPS" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_mtls_dtls_x_add_PPS" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_update_mtls_dtls_PPS_modal_show">

		<div class="modal-dialog" style="width:40%;">
		
			<form id="id_form_update_mtls_dtls_PPS">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>UPDATE MATERIAL DETAILS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>  
							<div class="row">
								<input type="hidden" class="form-control" id="id_uhidden_pkid_PPS" readonly>

								<div class="col-sm-6">

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_umtls_dtls_date_PPS" name="name_umtls_dtls_date_PPS" value="<?php echo date("Y-m-d") ; ?>" readonly> 
									</div>
				
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_umtls_dtls_desc_PPS" name="name_umtls_dtls_desc_PPS" autocomplete="off" readonly> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mat_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') ('.$row['mat_uom'].')</option>';
												}					
											?>
										</select>
										<input type="text" class="form-control" id="id_umtls_dtls_pkid_PPS" name="name_umtls_dtls_pkid_PPS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_umtls_dtls_specs_PPS" name="name_umtls_dtls_specs_PPS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_umtls_dtls_uom_PPS" name="name_umtls_dtls_uom_PPS" autocomplete="off" readonly> 
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>UNIT PRICE IN $</label>
										<input class="form-control" id="id_umtls_dtls_dollor_PPS" name="name_umtls_dtls_dollor_PPS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_umtls_dtls_exc_PPS" name="name_umtls_dtls_exc_PPS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE IN Php</label>
										<input class="form-control" id="id_umtls_dtls_peso_PPS" name="name_umtls_dtls_peso_PPS" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>QTY</label>
										<input type="number" class="form-control" id="id_umtls_dtls_qty_PPS" name="name_umtls_dtls_qty_PPS" autocomplete="off"> 
									</div>
									
									<input type="hidden" class="form-control" id="id_umtls_info_encoded_by_PPS" name="name_umtls_info_encoded_by_PPS" value="<?php echo $username; ?> "readonly> 
									
								</div>
									
								</div>
							</div>
							
						</div>
						
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_mtls_info_update_PPS" class="btn btn-success btn-sm"> UPDATE</button>
									<button type="button" id="id_mtls_dtls_x_update_PPS" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_pps_rcv_modal_show">

		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_pps_rcv">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>PPS - RECEIVE MATERIALS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>
							<div class="row">
								<div class="col-sm-4">
									
									<div class="form-group">
										<label>DATE RECEIVE</label>
										<input type="date" class="form-control" id="id_pps_rcv_date" name="name_pps_rcv_date" value="<?php echo date("Y-m-d") ; ?>" > 
									</div>
									
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_pps_rcv_prod_desc" name="name_pps_rcv_prod_desc" autocomplete="off"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list_info();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mp_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') || '.$row['mat_uom'].' || '.$row['mp_exchange_rate'].'</option>';												}					
											?>
										</select>
										<input type="hidden" class="form-control" id="id_pps_rcv_pkid" name="name_pps_rcv_pkid" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE($)</label>
										<input class="form-control" id="id_pps_rcv_unit_dollor" name="name_pps_rcv_unit_dollor" readonly> 
									</div>
									
									<div class="form-group">
										<label>RECEIVE QTY</label>
										<input type="number" class="form-control" id="id_pps_rcv_qty" name="name_pps_rcv_qty" autocomplete="off" required> 
									</div>
									
								</div>
								
								<div class="col-sm-4">	
								
									<div class="form-group">
										<label>SUPPLIER NAME</label>
										<input class="form-control" id="id_pps_supp_name" name="name_pps_supp_name" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_pps_rcv_prod_specs" name="name_pps_rcv_prod_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_pps_rcv_exchange_rate" name="name_pps_rcv_exchange_rate" readonly> 
									</div>
							
								</div>
								
								<div class="col-sm-4">
								
									<div class="form-group">
										<label>INVOICE NO.</label>
										<input class="form-control" id="id_pps_rcv_inv_no" name="name_pps_rcv_inv_no" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_pps_rcv_uom" name="name_pps_rcv_uom" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE (Php)</label>
										<input class="form-control" id="id_pps_rcv_unit_peso" name="name_pps_rcv_unit_peso" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-8">	
									
									<div class="form-group">
										<label>REMARKS</label>
										<textarea rows="1" class="form-control" id="id_pps_rcv_remarks" name="name_pps_rcv_remarks"></textarea> 
									</div>
									
								</div>

								
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_add_pps_rcv_matls" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_close_pps_rcv_matls" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_pps_transf_modal_show">

		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_pps_transf">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>PPS - WITHDRAW / TRANSFER MATERIALS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>
							<div class="row">
								<div class="col-sm-4">
									<input type="hidden" class="form-control" id="id_hidden_pps_dept" name="name_hidden_pps_dept" value="PPS" readonly> 

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_pps_transf_date" name="name_pps_transf_date" value="<?php echo date("Y-m-d") ; ?>" > 
									</div>
									
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_pps_transf_prod_desc" name="name_pps_transf_prod_desc" autocomplete="off"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list_info();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mp_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') || '.$row['mat_uom'].' || '.$row['mp_exchange_rate'].'</option>';												}					
											?>
										</select>
										<input type="hidden" class="form-control" id="id_pps_transf_pkid" name="name_pps_transf_pkid" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE($)</label>
										<input class="form-control" id="id_pps_transf_unit_dollor" name="name_pps_transf_unit_dollor" readonly> 
									</div>
									
									<div class="form-group">
										<label>CURRENT STOCK</label>
										<input class="form-control" id="id_pps_transf_current_stock" name="name_pps_transf_current_stock" style="color:green;" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-4">	
								
									<div class="form-group">
										<label>TRANSACTION TYPE</label>
										<select class="form-control" id="id_pps_transaction_type" name="name_pps_transaction_type" autocomplete="off" required> 
												<option value='0'>--SELECT--</option>
												<option value='1'>TRANSFER</option>
												<option value='2'>WITHDRAW</option>
												
										</select>
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_pps_transf_prod_specs" name="name_pps_transf_prod_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_pps_transf_exchange_rate" name="name_pps_transf_exchange_rate" readonly> 
									</div>
									
									<div class="form-group">
										<label>QTY</label>
										<input type="number" class="form-control" id="id_pps_transf_qty" name="name_pps_transf_qty" autocomplete="off" required> 
									</div>
									
								</div>
								
								<div class="col-sm-4">
								
									<div class="form-group">
										<label>DEPARTMENT</label>
										<select class="form-control" id="id_pps_transaction_dept" name="name_pps_transaction_dept" autocomplete="off" required> 
												<option value='0'>--SELECT--</option>
												<option value='CN'>CN</option>
												<option value='TS'>TS</option>
												<option value='YF'>YF</option>
												<option value='PPS'>PPS</option>
												<option value='N/A'>N/A</option>
												
										</select>
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_pps_transf_uom" name="name_pps_transf_uom" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE (Php)</label>
										<input class="form-control" id="id_pps_transf_unit_peso" name="name_pps_transf_unit_peso" readonly> 
									</div>							
									
								</div>
								
								<div class="col-sm-12">
								
									<div class="form-group">
										<label>REMARKS</label>
										<input class="form-control" id="id_pps_transf_remarks" name="name_pps_transf_remarks" autocomplete="off"> 
									</div>
								</div>
								
								
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_add_transf_matls" class="btn btn-success btn-sm"> WITHDRAW / TRANSFER</button>
									<button type="button" id="id_close_pps_transf_matls" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_dtls_pps_modal_show">
	
		<div class="modal-dialog" style="width:70%;">
				
				<div class="modal-content">
				
					<div class="modal-body">
				
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>PPS - TRANSACTION DETAILS</b></center></h4>
						</div>

						<div class="container-fluid">
						<br>
							<div class="row">
								<input type="hidden" class="form-control" id="id_hidden_pps_dtls_id" readonly>

								<div class="col-sm-4">
								
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<input class="form-control" id="id_dtls_pps_prod_desc" name="name_dtls_pps_prod_desc" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRICE</label>
										<input class="form-control" id="id_dtls_pps_price" name="name_dtls_pps_price" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-4">
								
									<div class="form-group">
										<label>SPECIFICATION</label>
										<input class="form-control" id="id_dtls_pps_specs" name="name_dtls_pps_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>CURRENT STOCK</label>
										<input class="form-control" id="id_dtls_pps_current_amnt" name="name_dtls_pps_current_amnt" style="color:green;" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-4">
					
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_dtls_pps_uom" name="name_dtls_pps_uom" readonly> 
									</div>
									
								</div>
								
							</div>

							<div class="panel panel-info" align="center">
								<div class="panel-heading clearfix">
									<label class="pull-left" style="padding-top: 5.5px;">TRANSACTION DETAILS</label>
								</div>
								<div class="panel-body">
							
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div id="get_trans_dtls_PPS">
									</div>
								</div>
						
								</div>
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						
						<div class="container-fluid">
						
							<div class="row">
								<div class="pull-right">
									<button type="button" id="id_dtls_pps_close_modal" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							
							</div>
						
						</div>
					
					</div>
					
				</div>
				
		</div>
		
	</div>
	
	<div class="modal fade" id="id_pps_rcv_modal_update">

		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_pps_rcvd_update">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b> UPDATE PPS - RECEIVED MATERIALS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>
							<div class="row">
								
								<div class="col-sm-6">
									
									<input type="hidden" class="form-control" id="id_uhidden_pkid_PPS_received" readonly>

									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<input type="text" class="form-control" id="id_upps_prod_desc" name="name_upps_prod_desc" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_upps_rcv_prod_specs" name="name_upps_rcv_prod_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE(php)</label>
										<input class="form-control" id="id_upps_rcv_unit_price" name="name_upps_rcv_unit_price" readonly> 
									</div>
									
									<div class="form-group">
										<label>RECEIVED QTY</label>
										<input type="number" class="form-control" id="id_upps_rcv_qty" name="name_upps_rcv_qty" autocomplete="off" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-6">	
								
									<div class="form-group">
										<label>DATE RECEIVE</label>
										<input type="date" class="form-control" id="id_upps_rcv_date" name="name_upps_rcv_date" readonly> 
									</div>
									
									<div class="form-group">
										<label>SUPPLIER NAME</label>
										<input class="form-control" id="id_upps_supp_name" name="name_upps_supp_name" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>INVOICE NO.</label>
										<input class="form-control" id="id_upps_rcv_inv_no" name="name_upps_rcv_inv_no" autocomplete="off"> 
									</div>
																		
									<div class="form-group">
										<label>REMARKS</label>
										<textarea rows="3" class="form-control" id="id_upps_rcv_remarks" name="name_upps_rcv_remarks"></textarea> 
									</div>
									
								</div>
									
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_update_rcvd_matls_pps" class="btn btn-success btn-sm"> UPDATE</button>
									<button type="button" id="id_close_pps_rcv_matls" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<!-- CN -->
	<div class="modal fade" id="id_add_mtls_dtls_CN_modal_show">

		<div class="modal-dialog" style="width:40%;">
		
			<form id="id_form_add_mtls_dtls_CN">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>ADD NEW MATERIAL DETAILS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>  
							<div class="row">
								<input type="hidden" class="form-control" id="id_hidden_pkid_CN">

								<div class="col-sm-6">

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_mtls_dtls_date_CN" name="name_mtls_dtls_date_CN" value="<?php echo date("Y-m-d") ; ?>" readonly> 
									</div>
				
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_mtls_dtls_desc_CN" name="name_mtls_dtls_desc_CN" autocomplete="off"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list_with_price();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mp_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') ('.$row['mat_uom'].')</option>';
												}					
											?>
										</select>
										<input type="text" class="form-control" id="id_mtls_dtls_pkid_CN" name="name_mtls_dtls_pkid_CN" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_mtls_dtls_specs_CN" name="name_mtls_dtls_specs_CN" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_mtls_dtls_uom_CN" name="name_mtls_dtls_uom_CN" autocomplete="off" readonly> 
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>UNIT PRICE IN $</label>
										<input type="number" class="form-control" id="id_mtls_dtls_dollor_CN" name="name_mtls_dtls_dollor_CN" autocomplete="off" readonly>  
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input type="number" class="form-control" id="id_mtls_dtls_exc_CN" name="name_mtls_dtls_exc_CN" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE IN Php</label>
										<input type="number" class="form-control" id="id_mtls_dtls_peso_CN" name="name_mtls_dtls_peso_CN" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>QTY</label>
										<input type="number" class="form-control" id="id_mtls_dtls_qty_CN" name="name_mtls_dtls_qty_CN" autocomplete="off"> 
									</div>
									
									<input type="hidden" class="form-control" id="id_mtls_info_encoded_by_CN" name="name_mtls_info_encoded_by_CN" value="<?php echo $username; ?> "readonly> 
									
								</div>
									
								</div>
							</div>
							
						</div>
						
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_mtls_info_add_CN" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_mtls_dtls_x_add_CN" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_update_mtls_dtls_CN_modal_show">

		<div class="modal-dialog" style="width:40%;">
		
			<form id="id_form_update_mtls_dtls_CN">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>UPDATE MATERIAL DETAILS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>  
							<div class="row">
								<input type="hidden" class="form-control" id="id_uhidden_pkid_CN" readonly>

								<div class="col-sm-6">

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_umtls_dtls_date_CN" name="name_umtls_dtls_date_CN" value="<?php echo date("Y-m-d") ; ?>" readonly> 
									</div>
				
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_umtls_dtls_desc_CN" name="name_umtls_dtls_desc_CN" autocomplete="off" readonly> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mat_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') ('.$row['mat_uom'].')</option>';
												}					
											?>
										</select>
										<input type="text" class="form-control" id="id_umtls_dtls_pkid_CN" name="name_umtls_dtls_pkid_CN" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_umtls_dtls_specs_CN" name="name_umtls_dtls_specs_CN" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_umtls_dtls_uom_CN" name="name_umtls_dtls_uom_CN" autocomplete="off" readonly> 
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>UNIT PRICE IN $</label>
										<input  class="form-control" id="id_umtls_dtls_dollor_CN" name="name_umtls_dtls_dollor_CN" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_umtls_dtls_exc_CN" name="name_umtls_dtls_exc_CN" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE IN Php</label>
										<input class="form-control" id="id_umtls_dtls_peso_CN" name="name_umtls_dtls_peso_CN" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>QTY</label>
										<input type="number" class="form-control" id="id_umtls_dtls_qty_CN" name="name_umtls_dtls_qty_CN" autocomplete="off"> 
									</div>
									
									<input type="hidden" class="form-control" id="id_umtls_info_encoded_by_CN" name="name_umtls_info_encoded_by_CN" value="<?php echo $username; ?> "readonly> 
									
								</div>
									
								</div>
							</div>
							
						</div>
						
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_mtls_info_update_CN" class="btn btn-success btn-sm"> UPDATE</button>
									<button type="button" id="id_mtls_dtls_x_update_CN" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_cn_rcv_modal_show">

		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_cn_rcv">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>CN - RECEIVE MATERIALS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>
							<div class="row">
								<div class="col-sm-4">
									
									<div class="form-group">
										<label>DATE RECEIVE</label>
										<input type="date" class="form-control" id="id_cn_rcv_date" name="name_cn_rcv_date" value="<?php echo date("Y-m-d") ; ?>" > 
									</div>
									
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_cn_rcv_prod_desc" name="name_cn_rcv_prod_desc" autocomplete="off"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list_info();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mp_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') || '.$row['mat_uom'].' || '.$row['mp_exchange_rate'].'</option>';												}					
											?>
										</select>
										<input type="hidden" class="form-control" id="id_cn_rcv_pkid" name="name_cn_rcv_pkid" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE($)</label>
										<input class="form-control" id="id_cn_rcv_unit_dollor" name="name_cn_rcv_unit_dollor" readonly> 
									</div>
									
									<div class="form-group">
										<label>RECEIVE QTY</label>
										<input type="number" class="form-control" id="id_cn_rcv_qty" name="name_cn_rcv_qty" autocomplete="off" required> 
									</div>
									
								</div>
								
								<div class="col-sm-4">	
								
									<div class="form-group">
										<label>SUPPLIER NAME</label>
										<input class="form-control" id="id_cn_supp_name" name="name_cn_supp_name" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_cn_rcv_prod_specs" name="name_cn_rcv_prod_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_cn_rcv_exchange_rate" name="name_cn_rcv_exchange_rate" readonly> 
									</div>
							
								</div>
								
								<div class="col-sm-4">
								
									<div class="form-group">
										<label>INVOICE NO.</label>
										<input class="form-control" id="id_cn_rcv_inv_no" name="name_cn_rcv_inv_no" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_cn_rcv_uom" name="name_cn_rcv_uom" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE (Php)</label>
										<input class="form-control" id="id_cn_rcv_unit_peso" name="name_cn_rcv_unit_peso" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-8">	
									
									<div class="form-group">
										<label>REMARKS</label>
										<textarea rows="1" class="form-control" id="id_cn_rcv_remarks" name="name_cn_rcv_remarks"></textarea> 
									</div>
									
								</div>

								
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_add_cn_rcv_matls" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_close_cn_rcv_matls" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_cn_transf_modal_show">

		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_cn_transf">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>CN - WITHDRAW / TRANSFER MATERIALS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>
							<div class="row">
								<div class="col-sm-4">
									<input type="hidden" class="form-control" id="id_hidden_cn_dept" name="name_hidden_cn_dept" value="CN" readonly> 

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_cn_transf_date" name="name_cn_transf_date" value="<?php echo date("Y-m-d") ; ?>" > 
									</div>
									
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_cn_transf_prod_desc" name="name_cn_transf_prod_desc" autocomplete="off"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list_info();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mp_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') || '.$row['mat_uom'].' || '.$row['mp_exchange_rate'].'</option>';												}					
											?>
										</select>
										<input type="hidden" class="form-control" id="id_cn_transf_pkid" name="name_cn_transf_pkid" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE($)</label>
										<input class="form-control" id="id_cn_transf_unit_dollor" name="name_cn_transf_unit_dollor" readonly> 
									</div>
									
									<div class="form-group">
										<label>CURRENT STOCK</label>
										<input class="form-control" id="id_cn_transf_current_stock" name="name_cn_transf_current_stock" style="color:green;" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-4">	
								
									<div class="form-group">
										<label>TRANSACTION TYPE</label>
										<select class="form-control" id="id_cn_transaction_type" name="name_cn_transaction_type" autocomplete="off" required> 
												<option value='0'>--SELECT--</option>
												<option value='1'>TRANSFER</option>
												<option value='2'>WITHDRAW</option>
												
										</select>
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_cn_transf_prod_specs" name="name_cn_transf_prod_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_cn_transf_exchange_rate" name="name_cn_transf_exchange_rate" readonly> 
									</div>
									
									<div class="form-group">
										<label>QTY</label>
										<input type="number" class="form-control" id="id_cn_transf_qty" name="name_cn_transf_qty" autocomplete="off" required> 
									</div>
									
								</div>
								
								<div class="col-sm-4">
								
									<div class="form-group">
										<label>DEPARTMENT</label>
										<select class="form-control" id="id_cn_transaction_dept" name="name_cn_transaction_dept" autocomplete="off" required> 
												<option value='0'>--SELECT--</option>
												<option value='TS'>TS</option>
												<option value='PPS'>PPS</option>
												<option value='YF'>YF</option>
												<option value='N/A'>N/A</option>
												
										</select>
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_cn_transf_uom" name="name_cn_transf_uom" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE (Php)</label>
										<input class="form-control" id="id_cn_transf_unit_peso" name="name_cn_transf_unit_peso" readonly> 
									</div>							
									
								</div>
								
								<div class="col-sm-12">
								
									<div class="form-group">
										<label>REMARKS</label>
										<input class="form-control" id="id_cn_transf_remarks" name="name_cn_transf_remarks" autocomplete="off"> 
									</div>
								</div>
								
								
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_add_transf_matls" class="btn btn-success btn-sm"> WITHDRAW / TRANSFER</button>
									<button type="button" id="id_close_cn_transf_matls" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_dtls_cn_modal_show">
	
		<div class="modal-dialog" style="width:70%;">
				
				<div class="modal-content">
				
					<div class="modal-body">
				
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>CN - TRANSACTION DETAILS</b></center></h4>
						</div>

						<div class="container-fluid">
						<br>
							<div class="row">
								<input type="hidden" class="form-control" id="id_hidden_cn_dtls_id" readonly>

								<div class="col-sm-4">
								
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<input class="form-control" id="id_dtls_cn_prod_desc" name="name_dtls_cn_prod_desc" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRICE</label>
										<input class="form-control" id="id_dtls_cn_price" name="name_dtls_cn_price" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-4">
								
									<div class="form-group">
										<label>SPECIFICATION</label>
										<input class="form-control" id="id_dtls_cn_specs" name="name_dtls_cn_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>CURRENT STOCK</label>
										<input class="form-control" id="id_dtls_cn_current_amnt" name="name_dtls_cn_current_amnt" style="color:green;" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-4">
					
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_dtls_cn_uom" name="name_dtls_cn_uom" readonly> 
									</div>
									
								</div>
								
							</div>

							<div class="panel panel-info" align="center">
								<div class="panel-heading clearfix">
									<label class="pull-left" style="padding-top: 5.5px;">TRANSACTION DETAILS</label>
								</div>
								<div class="panel-body">
							
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div id="get_trans_dtls_CN">
									</div>
								</div>
						
								</div>
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						
						<div class="container-fluid">
						
							<div class="row">
								<div class="pull-right">
									<button type="button" id="id_dtls_cn_close_modal" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							
							</div>
						
						</div>
					
					</div>
					
				</div>
				
		</div>
		
	</div>
	
	<div class="modal fade" id="id_cn_rcv_modal_update">

		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_cn_rcvd_update">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b> UPDATE CN - RECEIVED MATERIALS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>
							<div class="row">
								
								<div class="col-sm-6">
									
									<input type="hidden" class="form-control" id="id_uhidden_pkid_CN_received" readonly>

									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<input type="text" class="form-control" id="id_ucn_prod_desc" name="name_ucn_prod_desc" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_ucn_rcv_prod_specs" name="name_ucn_rcv_prod_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE(php)</label>
										<input class="form-control" id="id_ucn_rcv_unit_price" name="name_ucn_rcv_unit_price" readonly> 
									</div>
									
									<div class="form-group">
										<label>RECEIVED QTY</label>
										<input type="number" class="form-control" id="id_ucn_rcv_qty" name="name_ucn_rcv_qty" autocomplete="off" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-6">	
								
									<div class="form-group">
										<label>DATE RECEIVE</label>
										<input type="date" class="form-control" id="id_ucn_rcv_date" name="name_ucn_rcv_date" readonly> 
									</div>
									
									<div class="form-group">
										<label>SUPPLIER NAME</label>
										<input class="form-control" id="id_ucn_supp_name" name="name_ucn_supp_name" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>INVOICE NO.</label>
										<input class="form-control" id="id_ucn_rcv_inv_no" name="name_ucn_rcv_inv_no" autocomplete="off"> 
									</div>
																		
									<div class="form-group">
										<label>REMARKS</label>
										<textarea rows="3" class="form-control" id="id_ucn_rcv_remarks" name="name_ucn_rcv_remarks"></textarea> 
									</div>
									
								</div>
									
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_update_rcvd_matls_cn" class="btn btn-success btn-sm"> UPDATE</button>
									<button type="button" id="id_close_cn_rcv_matls" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<!-- YF -->
	<div class="modal fade" id="id_add_mtls_dtls_YF_modal_show">

		<div class="modal-dialog" style="width:40%;">
		
			<form id="id_form_add_mtls_dtls_YF">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>ADD NEW MATERIAL DETAILS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>  
							<div class="row">
								<input type="hidden" class="form-control" id="id_hidden_pkid_YF">

								<div class="col-sm-6">

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_mtls_dtls_date_YF" name="name_mtls_dtls_date_YF" value="<?php echo date("Y-m-d") ; ?>" readonly> 
									</div>
				
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_mtls_dtls_desc_YF" name="name_mtls_dtls_desc_YF" autocomplete="off"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list_with_price();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mp_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') ('.$row['mat_uom'].')</option>';
												}					
											?>
										</select>
										<input type="text" class="form-control" id="id_mtls_dtls_pkid_YF" name="name_mtls_dtls_pkid_YF" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_mtls_dtls_specs_YF" name="name_mtls_dtls_specs_YF" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_mtls_dtls_uom_YF" name="name_mtls_dtls_uom_YF" autocomplete="off" readonly> 
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>UNIT PRICE IN $</label>
										<input type="number" class="form-control" id="id_mtls_dtls_dollor_YF" name="name_mtls_dtls_dollor_YF" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input type="number" class="form-control" id="id_mtls_dtls_exc_YF" name="name_mtls_dtls_exc_YF" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE IN Php</label>
										<input type="number" class="form-control" id="id_mtls_dtls_peso_YF" name="name_mtls_dtls_peso_YF" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>QTY</label>
										<input type="number" class="form-control" id="id_mtls_dtls_qty_YF" name="name_mtls_dtls_qty_YF" autocomplete="off"> 
									</div>
									
									<input type="hidden" class="form-control" id="id_mtls_info_encoded_by_YF" name="name_mtls_info_encoded_by_YF" value="<?php echo $username; ?> "readonly> 
									
								</div>
									
								</div>
							</div>
							
						</div>
						
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_mtls_info_add_YF" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_mtls_dtls_x_add_YF" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_update_mtls_dtls_YF_modal_show">

		<div class="modal-dialog" style="width:40%;">
		
			<form id="id_form_update_mtls_dtls_YF">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>UPDATE MATERIAL DETAILS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>  
							<div class="row">
								<input type="hidden" class="form-control" id="id_uhidden_pkid_YF" readonly>

								<div class="col-sm-6">

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_umtls_dtls_date_YF" name="name_umtls_dtls_date_YF" value="<?php echo date("Y-m-d") ; ?>" readonly> 
									</div>
				
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_umtls_dtls_desc_YF" name="name_umtls_dtls_desc_YF" autocomplete="off" readonly> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mp_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') ('.$row['mat_uom'].')</option>';
												}					
											?>
										</select>
										<input type="text" class="form-control" id="id_umtls_dtls_pkid_YF" name="name_umtls_dtls_pkid_YF" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_umtls_dtls_specs_YF" name="name_umtls_dtls_specs_YF" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_umtls_dtls_uom_YF" name="name_umtls_dtls_uom_YF" autocomplete="off" readonly> 
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group">
										<label>UNIT PRICE IN $</label>
										<input class="form-control" id="id_umtls_dtls_dollor_YF" name="name_umtls_dtls_dollor_YF" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_umtls_dtls_exc_YF" name="name_umtls_dtls_exc_YF" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE IN Php</label>
										<input class="form-control" id="id_umtls_dtls_peso_YF" name="name_umtls_dtls_peso_YF" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>QTY</label>
										<input type="number" class="form-control" id="id_umtls_dtls_qty_YF" name="name_umtls_dtls_qty_YF" autocomplete="off"> 
									</div>
									
									<input type="hidden" class="form-control" id="id_umtls_info_encoded_by_YF" name="name_umtls_info_encoded_by_YF" value="<?php echo $username; ?> "readonly> 
									
								</div>
									
								</div>
							</div>
							
						</div>
						
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_mtls_info_update_YF" class="btn btn-success btn-sm"> UPDATE</button>
									<button type="button" id="id_mtls_dtls_x_update_YF" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
																	
	</div>
	
	<div class="modal fade" id="id_yf_rcv_modal_show">

		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_yf_rcv">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>YF - RECEIVE MATERIALS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>
							<div class="row">
								<div class="col-sm-4">
									
									<div class="form-group">
										<label>DATE RECEIVE</label>
										<input type="date" class="form-control" id="id_yf_rcv_date" name="name_yf_rcv_date" value="<?php echo date("Y-m-d") ; ?>" > 
									</div>
									
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_yf_rcv_prod_desc" name="name_yf_rcv_prod_desc" autocomplete="off"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list_info();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mp_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') || '.$row['mat_uom'].' || '.$row['mp_exchange_rate'].'</option>';												}					
											?>
										</select>
										<input type="hidden" class="form-control" id="id_yf_rcv_pkid" name="name_yf_rcv_pkid" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE($)</label>
										<input class="form-control" id="id_yf_rcv_unit_dollor" name="name_yf_rcv_unit_dollor" readonly> 
									</div>
									
									<div class="form-group">
										<label>RECEIVE QTY</label>
										<input type="number" class="form-control" id="id_yf_rcv_qty" name="name_yf_rcv_qty" autocomplete="off" required> 
									</div>
									
								</div>
								
								<div class="col-sm-4">	
								
									<div class="form-group">
										<label>SUPPLIER NAME</label>
										<input class="form-control" id="id_yf_supp_name" name="name_yf_supp_name" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_yf_rcv_prod_specs" name="name_yf_rcv_prod_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_yf_rcv_exchange_rate" name="name_yf_rcv_exchange_rate" readonly> 
									</div>
							
								</div>
								
								<div class="col-sm-4">
								
									<div class="form-group">
										<label>INVOICE NO.</label>
										<input class="form-control" id="id_yf_rcv_inv_no" name="name_yf_rcv_inv_no" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_yf_rcv_uom" name="name_yf_rcv_uom" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE (Php)</label>
										<input class="form-control" id="id_yf_rcv_unit_peso" name="name_yfrcv_unit_peso" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-8">	
									
									<div class="form-group">
										<label>REMARKS</label>
										<textarea rows="1" class="form-control" id="id_yf_rcv_remarks" name="name_yf_rcv_remarks"></textarea> 
									</div>
									
								</div>
								
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_add_yf_rcv_matls" class="btn btn-success btn-sm"> ADD</button>
									<button type="button" id="id_close_yf_rcv_matls" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_yf_transf_modal_show">

		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_yf_transf">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>YF - WITHDRAW / TRANSFER MATERIALS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>
							<div class="row">
								<div class="col-sm-4">
									<input type="hidden" class="form-control" id="id_hidden_yf_dept" name="name_hidden_yf_dept" value="YF" readonly> 

									<div class="form-group">
										<label>DATE</label>
										<input type="date" class="form-control" id="id_yf_transf_date" name="name_yf_transf_date" value="<?php echo date("Y-m-d") ; ?>" > 
									</div>
									
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<select class="form-control" id="id_yf_transf_prod_desc" name="name_yf_transf_prod_desc" autocomplete="off"> 
											<option value='0'>--Select--</option>
											<?php
												$result = INVS::getInstance()->select_item_list_info();
												while($row = mysqli_fetch_array($result)) {
													echo '<option value='.$row['mp_pkid'].'> '.$row['mat_product_desc'].' ('.$row['mat_product_specs'].') || '.$row['mat_uom'].' || '.$row['mp_exchange_rate'].'</option>';												}					
											?>
										</select>
										<input type="hidden" class="form-control" id="id_yf_transf_pkid" name="name_yf_transf_pkid" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE($)</label>
										<input class="form-control" id="id_yf_transf_unit_dollor" name="name_yf_transf_unit_dollor" readonly> 
									</div>
									
									<div class="form-group">
										<label>CURRENT STOCK</label>
										<input class="form-control" id="id_yf_transf_current_stock" name="name_yf_transf_current_stock" style="color:green;" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-4">	
								
									<div class="form-group">
										<label>TRANSACTION TYPE</label>
										<select class="form-control" id="id_yf_transaction_type" name="name_yf_transaction_type" autocomplete="off" required> 
												<option value='0'>--SELECT--</option>
												<option value='1'>TRANSFER</option>
												<option value='2'>WITHDRAW</option>
												
										</select>
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_yf_transf_prod_specs" name="name_yf_transf_prod_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>EXCHANGE RATE</label>
										<input class="form-control" id="id_yf_transf_exchange_rate" name="name_yf_transf_exchange_rate" readonly> 
									</div>
									
									<div class="form-group">
										<label>QTY</label>
										<input type="number" class="form-control" id="id_yf_transf_qty" name="name_yf_transf_qty" autocomplete="off" required> 
									</div>
									
								</div>
								
								<div class="col-sm-4">
								
									<div class="form-group">
										<label>DEPARTMENT</label>
										<select class="form-control" id="id_yf_transaction_dept" name="name_yf_transaction_dept" autocomplete="off" required> 
												<option value='0'>--SELECT--</option>
												<option value='CN'>CN</option>
												<option value='PPS'>PPS</option>
												<option value='TS'>TS</option>
												<option value='N/A'>N/A</option>
												
										</select>
									</div>
									
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_yf_transf_uom" name="name_yf_transf_uom" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE (Php)</label>
										<input class="form-control" id="id_yf_transf_unit_peso" name="name_yf_transf_unit_peso" readonly> 
									</div>							
									
								</div>
								
								<div class="col-sm-12">
								
									<div class="form-group">
										<label>REMARKS</label>
										<input class="form-control" id="id_yf_transf_remarks" name="name_yf_transf_remarks" autocomplete="off"> 
									</div>
								</div>
								
								
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_add_transf_matls" class="btn btn-success btn-sm"> WITHDRAW / TRANSFER</button>
									<button type="button" id="id_close_yf_transf_matls" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	<div class="modal fade" id="id_dtls_yf_modal_show">
	
		<div class="modal-dialog" style="width:70%;">
				
				<div class="modal-content">
				
					<div class="modal-body">
				
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b>YF - TRANSACTION DETAILS</b></center></h4>
						</div>

						<div class="container-fluid">
						<br>
							<div class="row">
								<input type="hidden" class="form-control" id="id_hidden_yf_dtls_id" readonly>

								<div class="col-sm-4">
								
									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<input class="form-control" id="id_dtls_yf_prod_desc" name="name_dtls_yf_prod_desc" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRICE</label>
										<input class="form-control" id="id_dtls_yf_price" name="name_dtls_yf_price" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-4">
								
									<div class="form-group">
										<label>SPECIFICATION</label>
										<input class="form-control" id="id_dtls_yf_specs" name="name_dtls_yf_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>CURRENT STOCK</label>
										<input class="form-control" id="id_dtls_yf_current_amnt" name="name_dtls_yf_current_amnt" style="color:green;" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-4">
					
									<div class="form-group">
										<label>UOM</label>
										<input class="form-control" id="id_dtls_yf_uom" name="name_dtls_yf_uom" readonly> 
									</div>
									
								</div>
								
							</div>

							<div class="panel panel-info" align="center">
								<div class="panel-heading clearfix">
									<label class="pull-left" style="padding-top: 5.5px;">TRANSACTION DETAILS</label>
								</div>
								<div class="panel-body">
							
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div id="get_trans_dtls_YF">
									</div>
								</div>
						
								</div>
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						
						<div class="container-fluid">
						
							<div class="row">
								<div class="pull-right">
									<button type="button" id="id_dtls_yf_close_modal" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							
							</div>
						
						</div>
					
					</div>
					
				</div>
				
		</div>
		
	</div>
	
	<div class="modal fade" id="id_yf_rcv_modal_update">

		<div class="modal-dialog" style="width:50%;">
		
			<form id="id_form_yf_rcvd_update">
		
				<div class="modal-content">
				
					<div class="modal-body">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><center><b> UPDATE YF - RECEIVED MATERIALS</b></center></h4>
						</div>
						
						<div class="container-fluid">
						<br>
							<div class="row">
								
								<div class="col-sm-6">
									
									<input type="hidden" class="form-control" id="id_uhidden_pkid_YF_received" readonly>

									<div class="form-group">
										<label>PRODUCT DESCRIPTION</label>
										<input type="text" class="form-control" id="id_uyf_prod_desc" name="name_uyf_prod_desc" autocomplete="off" readonly> 
									</div>
									
									<div class="form-group">
										<label>PRODUCT SPECS</label>
										<input class="form-control" id="id_uyf_rcv_prod_specs" name="name_uyf_rcv_prod_specs" readonly> 
									</div>
									
									<div class="form-group">
										<label>UNIT PRICE(php)</label>
										<input class="form-control" id="id_uyf_rcv_unit_price" name="name_uyf_rcv_unit_price" readonly> 
									</div>
									
									<div class="form-group">
										<label>RECEIVED QTY</label>
										<input type="number" class="form-control" id="id_uyf_rcv_qty" name="name_uyf_rcv_qty" autocomplete="off" readonly> 
									</div>
									
								</div>
								
								<div class="col-sm-6">	
								
									<div class="form-group">
										<label>DATE RECEIVE</label>
										<input type="date" class="form-control" id="id_uyf_rcv_date" name="name_uyf_rcv_date" readonly> 
									</div>
									
									<div class="form-group">
										<label>SUPPLIER NAME</label>
										<input class="form-control" id="id_uyf_supp_name" name="name_uyf_supp_name" autocomplete="off"> 
									</div>
									
									<div class="form-group">
										<label>INVOICE NO.</label>
										<input class="form-control" id="id_uyf_rcv_inv_no" name="name_uyf_rcv_inv_no" autocomplete="off"> 
									</div>
																		
									<div class="form-group">
										<label>REMARKS</label>
										<textarea rows="3" class="form-control" id="id_uyf_rcv_remarks" name="name_uyf_rcv_remarks"></textarea> 
									</div>
									
								</div>
									
							</div>
							
						</div>
						
					</div>
					
					<div class="modal-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="pull-right">
									<button id="id_update_rcvd_matls_yf" class="btn btn-success btn-sm"> UPDATE</button>
									<button type="button" id="id_close_yf_rcv_matls" class="btn btn-danger btn-sm" data-dismiss="modal"> CANCEL</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			
			</form>
			
		</div>
	
	</div>
	
	
	<script src="scripts/settings.js?v=2"></script>
	
	
	
	