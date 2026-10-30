 
	$.ajaxSetup({
		type	: 'post',
		dataType: 'json',
		url		: '../handler/handler.php',
	});
	
	var id_mtls_info 		= '';
	var id_mtls_dtls 		= '';
	var id_mtls_dtls_TS 	= '';
	var id_mtls_dtls_PPS 	= '';
	var id_mtls_dtls_CN		= '';
	var id_mtls_dtls_YF		= '';
	
	var id_rcvd_dtls_TS		= '';
	var id_rcvd_dtls_PPS	= '';
	var id_rcvd_dtls_CN		= '';
	var id_rcvd_dtls_YF		= '';
	
	$(document).ready(function(){
				
		$('#id_btn_back_to_dashboard').click(function(){
			window.location.href = "db_selection.php";
		});

		$("#id_btn_add_mtls_info").click(function(){
			$('#id_add_mtls_info_modal_show').modal('show');
		});	
		
		$("#id_mtls_info_x_add").click(function(){
			location.reload();
		});	
		
		/* $("#id_close_ts_transf_matls").click(function(){
			location.reload();
		});	
		
		$("#id_close_pps_transf_matls").click(function(){
			location.reload();
		});	
		
		$("#id_close_cn_transf_matls").click(function(){
			location.reload();
		});	
		
		$("#id_close_yf_transf_matls").click(function(){
			location.reload();
		});	
		 */
		 
		/* $("#id_dtls_ts_close_modal").click(function(){
			location.reload();
		});	
		
		$("#id_dtls_pps_close_modal").click(function(){
			location.reload();
		});	
		
		$("#id_dtls_cn_close_modal").click(function(){
			location.reload();
		});	
		
		$("#id_dtls_yf_close_modal").click(function(){
			location.reload();
		});	
		 */
		 
		/* $("#id_close_ts_rcv_matls").click(function(){
			location.reload();
		});
		
		$("#id_close_pps_rcv_matls").click(function(){
			location.reload();
		});
		
		$("#id_close_cn_rcv_matls").click(function(){
			location.reload();
		});
		
		$("#id_close_yf_rcv_matls").click(function(){
			location.reload();
		});
		*/
 
		$("#id_mtls_info_x_update").click(function(){
			location.reload();
		});	
		
		$("#id_btn_add_mtls_dtls").click(function(){
			$('#id_add_mtls_dtls_modal_show').modal('show');
		});	
		
		$("#id_btn_add_pps_eoh").click(function(){
			$('#id_add_pps_eoh_modal_show').modal('show');
		});	

		$("#id_mtls_dtls_x_add").click(function(){
			location.reload();
		});	
		
		$("#id_mtls_dtls_x_update").click(function(){
			location.reload();
		});	
		
		$("#id_withdrawal_report_modal").click(function(){
			$('#export_withdrawal_modal_show').modal('show');
		});	
		
		$("#id_inventory_report_modal").click(function(){
			$('#export_inventory_modal_show').modal('show');
		});	
		
		/* TS */
		$("#id_btn_add_mtls_dtls_TS").click(function(){
			$('#id_add_mtls_dtls_TS_modal_show').modal('show');
		});	
		
		$("#id_mtls_dtls_x_add_TS").click(function(){
			location.reload();
		});	
		
		$("#id_mtls_dtls_x_update_TS").click(function(){
			location.reload();
		});	
		
		$("#id_btn_rcv_TS").click(function(){
			$('#id_ts_rcv_modal_show').modal('show');
		});	
		
		$("#id_btn_transf_TS").click(function(){
			$('#id_ts_transf_modal_show').modal('show');
		});	
		
		/* PPS */
		$("#id_btn_add_mtls_dtls_PPS").click(function(){
			$('#id_add_mtls_dtls_PPS_modal_show').modal('show');
		});	
		
		$("#id_mtls_dtls_x_add_PPS").click(function(){
			location.reload();
		});	
		
		$("#id_mtls_dtls_x_update_PPS").click(function(){
			location.reload();
		});	
		
		$("#id_btn_rcv_PPS").click(function(){
			$('#id_pps_rcv_modal_show').modal('show');
		});	
		
		$("#id_btn_transf_PPS").click(function(){
			$('#id_pps_transf_modal_show').modal('show');
		});	
		
		/* CN */
		$("#id_btn_add_mtls_dtls_CN").click(function(){
			$('#id_add_mtls_dtls_CN_modal_show').modal('show');
		});	
		
		$("#id_mtls_dtls_x_add_CN").click(function(){
			location.reload();
		});	
		
		$("#id_mtls_dtls_x_update_CN").click(function(){
			location.reload();
		});	
		
		$("#id_btn_rcv_CN").click(function(){
			$('#id_cn_rcv_modal_show').modal('show');
		});	
		
		$("#id_btn_transf_CN").click(function(){
			$('#id_cn_transf_modal_show').modal('show');
		});	
		
		/* YF */
		$("#id_btn_add_mtls_dtls_YF").click(function(){
			$('#id_add_mtls_dtls_YF_modal_show').modal('show');
		});	
		
		$("#id_mtls_dtls_x_add_YF").click(function(){
			location.reload();
		});	
		
		$("#id_mtls_dtls_x_update_YF").click(function(){
			location.reload();
		});	
		
		$("#id_btn_rcv_YF").click(function(){
			$('#id_yf_rcv_modal_show').modal('show');
		});	
		
		$("#id_btn_transf_YF").click(function(){
			$('#id_yf_transf_modal_show').modal('show');
		});	
		
	});	
	
	/* material Info. */
	display_mtls_info();
	function display_mtls_info(){
				
		var data = {
			'action'		: 'display_mtls_info'
		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				
				var ctr = data['ctr'];
				
				$('#display_mtls_info').empty();
				
				var content  = '<table id="tbl_mtls_info" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th>ID</th>';
					content += '			<th>Status</th>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>PPS Product</th>';
					content += '			<th>Action</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_mtls_info').append(content);
				
				for(i=0;i<ctr;i++){
				
				var mat_logdel = data['mat_logdel'][i];
				if ( mat_logdel == '0'){
					var mat_status = '<font color="green"><b> Active </b></font>';
				}else if ( mat_logdel == '1'){
					var mat_status = '<font color="red"><b> Inactive </b></font>';
				}

				var mat_pps_product = data['mat_pps_product'][i];
				if ( mat_pps_product == '0'){
					var mat_pps_product_status = '<i class="fa fa-times-circle-o fa-2x" style="color:red"></i>';
				}else if ( mat_pps_product == '1'){
					var mat_pps_product_status = '<i class="fa fa-check-circle-o fa-2x" style="color:green"></i>';
				}

				if (data['mat_logdel'][i] == '0'){
					var btn_edit = '<button class="btn btn-success" id="btn_edit_mat_details" title="Update Material Info." style="border-radius: 0px;" value='+data['mat_pkid'][i]+'> <i class="fa fa-pencil" aria-hidden="true"></i> </button>';
				}else{
					var btn_edit = '<button class="btn btn-default" style="border-radius: 0px;"> <i class="fa fa-ban" aria-hidden="true"></i> </button>';
				}

 				
				var values  = '<tr align="center" id='+data['mat_pkid'][i]+'>';
					values += '		<td>'+data['mat_pkid'][i]+'</td>';
					values += '		<td>'+mat_status+'</td>';
					values += '		<td>'+data['mat_product_desc'][i]+'</td>';
					values += '		<td>'+data['mat_product_specs'][i]+'</td>';
					values += '		<td>'+data['mat_uom'][i]+'</td>';
					values += '		<td>'+mat_pps_product_status+'</td>';
					values += '		<td>'+btn_edit+'</td>';
					values += '</tr>';
					
					$('#tbl_mtls_info tbody').append(values);
				}
				
				$("#tbl_mtls_info tbody").on('click','tr #btn_edit_mat_details', function(e){
					e.preventDefault();
					select_mtls_info($(this).val());
				});

				$('#tbl_mtls_info').DataTable({ 
					paginate: true, 
					aaSorting: [],
				 });
					 
				 select_row_mtls_info();
					 
				
			},
			error	: function(data){
				console.log(data);
			}
		});		
	}
	
	function select_row_mtls_info(){
		
		$('#tbl_mtls_info tbody').on('click','tr', function(){
			id_mtls_info = '';
			$('#tbl_mtls_info tbody tr').attr('style','');
			$(this).attr('style','background: #D5F5E3 ;color:black;');
			id_mtls_info = this.id;
		});
			
		// $("#tbl_mtls_info tbody").on('dblclick', 'tr', function(){
		// 	$("#modal-body input").val("");	
		// 	select_mtls_info(id_mtls_info);
		// });	
	
	}
	
	function select_mtls_info(id_mtls_info) {
		
		var data = {
			"action"		 : "select_mtls_info",
			"id"			 : id_mtls_info
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_umtls_info_date').val(data['mat_date_encode']);
				$('#id_umtls_info_prod_desc').val(data['mat_product_desc']);
				$('#id_umtls_info_specs').val(data['mat_product_specs']);
				$('#id_umtls_info_uom').val(data['mat_uom']);

				if(data['mat_pps_product'] == 1) {
					$('#id_umtls_info_pps_inv').prop('checked', true);
					$('#id_umtls_info_pps_inv').prop('disabled', true);
				} else {
					$('#id_umtls_info_pps_inv').prop('checked', false);
				}

				$('#id_uhidden_pkid').val(id_mtls_info);
				$("#id_update_mtls_info_modal_show").modal();

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	$('#id_mtls_info_pps_inv').change(function () {
		if ($(this).is(':checked')) {
			$('#id_mtls_info_specs').val('N/A');
		} else {
			$('#id_mtls_info_specs').val('');
		}
	});


	$('#id_form_add_mtls_info').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		add_new_material_info(serialData);
	}); 
	
	function add_new_material_info(serialData){
	
		
		var data = {
			'action'	: 'add_new_material_info',
			'pps_inv'   : $('input[name="name_mtls_info_pps_inv"]:checked').val()
		}
		
		data = $.param(data) + "&" + serialData;
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				window.location.reload();
				// notif_add_success();
				display_mtls_info();
				
				// notif_add_success();
				// $('#id_add_mtls_info_modal_show').modal('hide');

			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
	}	
	
	$('#id_form_update_mtls_info').submit(function(e){
		e.preventDefault();
		
		var data = {
			'action'			: 'update_material_info',
			'id'				: id_mtls_info
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(output){
			
			window.location.reload();
			// notif_success_update();
			// $('#id_update_mtls_info_modal_show').modal('hide');
			display_mtls_info();
		
			},
			error	: function(output){
				console.log(output);
			}
		});
	});
	
	$('#id_btn_remove_mtls_info').click(function(e){
		
		if(id_mtls_info == ""){
			notif_warning_unselect_for_deletion();
			return false;
		}else{
			
			if(confirm($(this).data('confirm'))){
				e.preventDefault();
			} else {
				return false;
			}
			remove_mtls_info(id_mtls_info);
		}
		
		// if(confirm($(this).data('confirm'))){
			// e.preventDefault();
		// } else {
			// return false;
		// }	
		// remove_mtls_info(id_mtls_info);
	});
		
	function remove_mtls_info(id_mtls_info) {
		
		var username = $('#id_hidden_username').val();
		
		var data = {
			"action"			 : "remove_mtls_info",
			"id"				 : id_mtls_info,
			"username" 			 : username
		}
		
		data = $.param(data);
		alert(data);
		$.ajax({
			data	: data,
			success	: function (data) {
				console.log(data);
				
				notif_success_removed();
				display_mtls_info();
			
			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	/* material details */
	display_mtls_dtls();
	function display_mtls_dtls(){
				
		var data = {
			'action'		: 'display_mtls_dtls'
		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				
				var ctr 					= data['ctr'];			
				
				$('#display_mtls_dtls').empty();
				
				var content  = '<table id="tbl_mtls_dtls" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th>ID</th>';
					content += '			<th>Status</th>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>Unit price in $</th>';
					content += '			<th>Exchange Rate</th>';
					content += '			<th>Unit price in Php</th>';
					content += '			<th>PPS Product</th>';
					content += '			<th>Action</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_mtls_dtls').append(content);
				
				for(i=0;i<ctr;i++){
				
				var mp_unit_price_dollor	= parseFloat(data['mp_unit_price_dollor'][i]).toFixed(4);
				var mp_exchange_rate		= parseFloat(data['mp_exchange_rate'][i]).toFixed(3);
				var mp_unit_price_peso 		= parseFloat(data['mp_unit_price_peso'][i]).toFixed(4);
				var mp_unit_price_peso1 	= ReplaceNumberWithCommas(mp_unit_price_peso);

				var mp_logdel = data['mp_logdel'][i];
				if ( mp_logdel == '0'){
					var mp_status = '<font color="green"><b> Active </b></font>';
				}else if ( mp_logdel == '1'){
					var mp_status = '<font color="red"><b> Inactive </b></font>';
				}

				var mat_pps_product = data['mat_pps_product'][i];
				if ( mat_pps_product == '0'){
					var mat_pps_product_status = '<i class="fa fa-times-circle-o fa-2x" style="color:red"></i>';
					var btn_eoh = '';
				}else if ( mat_pps_product == '1'){
					var mat_pps_product_status = '<i class="fa fa-check-circle-o fa-2x" style="color:green"></i>';
					var btn_eoh = '<button class="btn btn-warning" id="btn_eoh" title="View EOH summary" style="border-radius: 0px;" value='+data['mp_pkid'][i]+'> <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> </button>';
				}

				if (data['mp_logdel'][i] == '0'){
					var btn_edit = '<button class="btn btn-success" id="btn_edit_details" title="Update Material Details" style="border-radius: 0px;" value='+data['mp_pkid'][i]+'> <i class="fa fa-pencil" aria-hidden="true"></i> </button>';
				}else{
					var btn_edit = '<button class="btn btn-default" style="border-radius: 0px;"> <i class="fa fa-ban" aria-hidden="true"></i> </button>';
				}

				var values  = '<tr align="center" id='+data['mp_pkid'][i]+'>';
					values += '		<td>'+data['mp_pkid'][i]+'</td>';
					values += '		<td>'+mp_status+'</td>';
					values += '		<td>'+data['mat_product_desc'][i]+'</td>';
					values += '		<td>'+data['mat_product_specs'][i]+'</td>';
					values += '		<td>'+data['mat_uom'][i]+'</td>';
					values += '		<td>'+mp_unit_price_dollor+'</td>';
					values += '		<td>'+mp_exchange_rate+'</td>';
					values += '		<td>'+mp_unit_price_peso1+'</td>';
					values += '		<td>'+mat_pps_product_status+'</td>';
					// values += '		<td>'+btn_edit+' '+btn_eoh+'</td>';
					values += '		<td>'+btn_eoh+'</td>';
					values += '</tr>';
					
					$('#tbl_mtls_dtls tbody').append(values);
				}
				
				$("#tbl_mtls_dtls tbody").on('click','tr #btn_edit_details', function(e){
					e.preventDefault();
					select_mtls_dtls($(this).val());
				});

				$("#tbl_mtls_dtls tbody").on('click','tr #btn_eoh', function(e){
					e.preventDefault();
					// alert( $(this).val() );
					select_pps_eoh($(this).val());
				});


				$('#tbl_mtls_dtls').DataTable({ 
					paginate: true, 
					aaSorting: [],
				 });
					 
				 select_row_mtls_dtls();
					 
				
			},
			error	: function(data){
				console.log(data);
			}
		});
		
	}
	
	function select_row_mtls_dtls(){
		
		$('#tbl_mtls_dtls tbody').on('click','tr', function(){
			id_mtls_dtls 		= '';
			
			$('#tbl_mtls_dtls tbody tr').attr('style','');
			$(this).attr('style','background: #D5F5E3 ;color:black;');
			id_mtls_dtls	= this.id;		
			
			select_mtls_dtls_stocks(id_mtls_dtls);
			
		});
			
		// $("#tbl_mtls_dtls tbody").on('dblclick', 'tr', function(){
		// 	$("#modal-body input").val("");	
		// 	select_mtls_dtls(id_mtls_dtls);
		// });	
	
	}
	
	function select_mtls_dtls_stocks(id_mtls_dtls) {
		
		var data = {
			"action"		 : "select_mtls_dtls",
			"id"			 : id_mtls_dtls
		}
		
		data = $.param(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_current_stock').val(data['ttl_current_stocks']);			
				$('#id_hidden_current_stock_pkid').val(id_mtls_dtls);

			}, error	: function (data) {
				alert('ERROR: '+data);
			}
		});
	}
	
	function select_mtls_dtls(id_mtls_dtls) {
		
		var data = {
			"action"		 : "select_mtls_dtls",
			"id"			 : id_mtls_dtls
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_umtls_dtls_date').val(data['mat_date_encode']);
				$('#id_umtls_dtls_desc').val(data['mat_pkid']);
				$('#id_umtls_dtls_pkid').val(data['mat_pkid']);
				$('#id_umtls_dtls_specs').val(data['mat_product_specs']);
				$('#id_umtls_dtls_uom').val(data['mat_uom']);
				
				$('#id_umtls_dtls_dollor').val(data['mp_unit_price_dollor']);
				$('#id_umtls_dtls_exc').val(data['mp_exchange_rate']);
				$('#id_umtls_dtls_peso').val(data['mp_unit_price_peso']);
				$('#id_ttl_current_stocks').val(data['ttl_current_stocks']);
								
				$('#id_uhidden_pkid').val(id_mtls_dtls);
				$("#id_update_mtls_dtls_modal_show").modal();

			}, error	: function (data) {
				alert('ERROR: '+data);
			}
		});
	}

	//-New
	function select_pps_eoh(id_mtls_dtls) {
		
		var data = {
			"action"		 : "select_pps_eoh",
			"id"			 : id_mtls_dtls
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_pe_desc').val(data['mat_product_desc']);
				$('#id_pe_pkid').val(data['mat_pkid']);
				
				$('#id_pe_dollor').val(data['mp_unit_price_dollor']);
								
				$('#id_pe_hidden_pkid').val(id_mtls_dtls);
				$("#id_add_pps_eoh_modal_show").modal();

				get_pps_eoh(id_mtls_dtls);

			}, error	: function (data) {
				alert('ERROR: '+data);
			}
		});
	}

	function get_pps_eoh(id_mtls_dtls) {
		
		var data = {
			"action"		: "get_pps_eoh_sum",
			"id"	 		: id_mtls_dtls
		}		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				var ctr = data['ctr'];
				
				$('#container_pps_eoh_summary').empty();
				var content  = '<table id="tbl_eoh_summary" class="table table-striped table-hover" style="padding: 20px; margin-right: 20px; font-size: 12px;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th><center>DATE</center></th>';
					content += '			<th><center>EOH</center></th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#container_pps_eoh_summary').append(content);
				
				for(i=0;i<ctr;i++){
							
									
					var html  = '<tr id='+data['mp_pkid'][i]+'>';
						html += '		<td><center>'+data['ppi_date'][i]+'</center></td>';
						html += '		<td><center>'+data['ppi_eoh'][i]+'</center></td>';
						html += '</tr>';
						
						$('#tbl_eoh_summary tbody').append(html);
				}
				
				$('#tbl_eoh_summary').DataTable({ 
					paginate: true, 
					aaSorting: [],
				 });
				
			}, error	: function(data) {
			alert('ERROR: '+data);
			}
		});
	}

	$('#id_form_add_pps_eoh').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_pps_eoh(serialData);
		
	}); 
	
	function add_pps_eoh(serialData){
	
		var data = {
			'action'	: 'add_pps_eoh'
		}
		
		data = $.param(data) + "&" + serialData;
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				// window.location.reload();

				notif_add_success();
				$('#id_pe_eoh').val('');
				get_pps_eoh($('#id_pe_hidden_pkid').val());


			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}	
	
	$('#id_form_add_mtls_dtls').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_mtls_dtls(serialData);
		
	}); 
	
	function add_mtls_dtls(serialData){
	
		var data = {
			'action'	: 'add_mtls_dtls'
		}
		
		data = $.param(data) + "&" + serialData;
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				// window.location.reload();

				notif_add_success();
				display_mtls_dtls();
				$('#id_add_mtls_dtls_modal_show').modal('hide');
				$('#id_mtls_dtls_desc').val('');
				$('#id_mtls_dtls_pkid').val('');
				$('#id_mtls_dtls_specs').val('');
				$('#id_mtls_dtls_uom').val('');
				$('#id_mtls_dtls_dollor').val('');
				$('#id_mtls_dtls_exc').val('');
				$('#id_mtls_dtls_peso').val('');

			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}	
	
	$('#id_form_update_mtls_dtls').submit(function(e){
		e.preventDefault();
		
		var data = {
			'action'			: 'update_material_dtls',
			'id'				: id_mtls_dtls
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(output){
			
			notif_success_update();
			$('#id_update_mtls_dtls_modal_show').modal('hide');
			display_mtls_dtls();
		
			},
			error	: function(output){
				console.log(output);
			}
		});
		
	});
	
	$('#id_btn_remove_mtls_dtls').click(function(e){
		
		var ttl_current_stocks = $('#id_current_stock').val();
		
		if(id_mtls_dtls == ""){
			notif_warning_unselect_for_deletion();
			return false;
		}else{
			
			if (ttl_current_stocks == "0" || ttl_current_stocks == ""){
				
				alert( "Current Stock: " + ttl_current_stocks);
				
				if(confirm($(this).data('confirm'))){
					e.preventDefault();
				} else {
					return false;
				}
					
				remove_mtls_dtls(id_mtls_dtls);
			
			}else{
				alert( "Current Stock: " + ttl_current_stocks);
				alert( "System cannot delete this data. Kindly check your stocks. Thank you!");
			}
			
		}
		
	});
	
	function remove_mtls_dtls(id_mtls_dtls) {
		
		var username = $('#id_hidden_username').val();

		var data = {
			"action"			 : "remove_mtls_dtls",
			"id"				 : id_mtls_dtls,
			"username" 			 : username

		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data	: data,
			success	: function (data) {
				console.log(data);
				
				notif_success_removed();
				display_mtls_dtls();
			
			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	/* withdrawal summary */
	display_TS_withdrawal();
	function display_TS_withdrawal(){
				
		var data = {
			'action'		: 'display_TS_withdrawal'
		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr = data['ctr'];
				
				$('#display_TS_withdrawal').empty();
				
				var content  = '<table id="tbl_TS_withdrawal" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead style="background-color: #F5CBA7;">';
					content += '		<tr>';
					content += '			<th>Date Requested</th>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>QTY</th>';
					content += '			<th>Amount</th>';
					content += '			<th>Requestor</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_TS_withdrawal').append(content);
				
				for(i=0;i<ctr;i++){
				
				var unit_price_peso_lbl	= parseFloat(data['unit_price_peso'][i]).toFixed(4);

				var values  = '<tr>';
					values += '		<td><center>'+data['date'][i]+'</center></td>';
					values += '		<td>'+data['product_desc'][i]+'</td>';
					values += '		<td>'+data['product_specs'][i]+'</td>';
					values += '		<td>'+data['uom'][i]+'</td>';
					values += '		<td><center><font color="red">'+data['withdraw_qty'][i]+'</center></font></td>';
					values += '		<td>'+unit_price_peso_lbl+'</td>';
					values += '		<td>'+data['requestor_name'][i]+'</td>';
					values += '</tr>';
					
					$('#tbl_TS_withdrawal tbody').append(values);
				}
				
				$('#tbl_TS_withdrawal').DataTable({ 
					paginate: true, 
					aaSorting: [],
					 });
					
			},
			error	: function(data){
				console.log(data);
			}
		});
		
	}
	
	display_PPS_withdrawal();
	function display_PPS_withdrawal(){
				
		var data = {
			'action'		: 'display_PPS_withdrawal'
		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr = data['ctr'];
				
				$('#display_PPS_withdrawal').empty();
				
				var content  = '<table id="tbl_PPS_withdrawal" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead style="background-color: #F5CBA7;">';
					content += '		<tr>';
					content += '			<th>Date Requested</th>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>QTY</th>';
					content += '			<th>Amount</th>';
					content += '			<th>Requestor</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_PPS_withdrawal').append(content);
				
				for(i=0;i<ctr;i++){
				
				var unit_price_peso_lbl	= parseFloat(data['unit_price_peso'][i]).toFixed(4);
				
				var values  = '<tr>';
					values += '		<td><center>'+data['date'][i]+'</center></td>';
					values += '		<td>'+data['product_desc'][i]+'</td>';
					values += '		<td>'+data['product_specs'][i]+'</td>';
					values += '		<td>'+data['uom'][i]+'</td>';
					values += '		<td><center><font color="red">'+data['withdraw_qty'][i]+'</center></font></td>';
					values += '		<td>'+unit_price_peso_lbl+'</td>';
					values += '		<td>'+data['requestor_name'][i]+'</td>';
					values += '</tr>';
					
					$('#tbl_PPS_withdrawal tbody').append(values);
				}
				
				$('#tbl_PPS_withdrawal').DataTable({ 
					paginate: true, 
					aaSorting: [],
					 });
					
			},
			error	: function(data){
				console.log(data);
			}
		});
		
	}
	
	display_CN_withdrawal();
	function display_CN_withdrawal(){
				
		var data = {
			'action'		: 'display_CN_withdrawal'
		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr = data['ctr'];
				
				$('#display_CN_withdrawal').empty();
				
				var content  = '<table id="tbl_CN_withdrawal" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead style="background-color: #F5CBA7;">';
					content += '		<tr>';
					content += '			<th>Date Requested</th>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>QTY</th>';
					content += '			<th>Amount</th>';
					content += '			<th>Requestor</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_CN_withdrawal').append(content);
				
				for(i=0;i<ctr;i++){
				
				var unit_price_peso_lbl	= parseFloat(data['unit_price_peso'][i]).toFixed(4);
				
				var values  = '<tr>';
					values += '		<td><center>'+data['date'][i]+'</center></td>';
					values += '		<td>'+data['product_desc'][i]+'</td>';
					values += '		<td>'+data['product_specs'][i]+'</td>';
					values += '		<td>'+data['uom'][i]+'</td>';
					values += '		<td><center><font color="red">'+data['withdraw_qty'][i]+'</center></font></td>';
					values += '		<td>'+unit_price_peso_lbl+'</td>';
					values += '		<td>'+data['requestor_name'][i]+'</td>';
					values += '</tr>';
					
					$('#tbl_CN_withdrawal tbody').append(values);
				}
				
				$('#tbl_CN_withdrawal').DataTable({ 
					paginate: true, 
					aaSorting: [],
					 });
					
			},
			error	: function(data){
				console.log(data);
			}
		});
		
	}
	
	display_YF_withdrawal();
	function display_YF_withdrawal(){
				
		var data = {
			'action'		: 'display_YF_withdrawal'
		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr = data['ctr'];
				
				$('#display_YF_withdrawal').empty();
				
				var content  = '<table id="tbl_YF_withdrawal" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead style="background-color: #F5CBA7;">';
					content += '		<tr>';
					content += '			<th>Date Requested</th>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>QTY</th>';
					content += '			<th>Amount</th>';
					content += '			<th>Requestor</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_YF_withdrawal').append(content);
				
				for(i=0;i<ctr;i++){
				
				var unit_price_peso_lbl	= parseFloat(data['unit_price_peso'][i]).toFixed(4);
			
				var values  = '<tr>';
					values += '		<td><center>'+data['date'][i]+'</center></td>';
					values += '		<td>'+data['product_desc'][i]+'</td>';
					values += '		<td>'+data['product_specs'][i]+'</td>';
					values += '		<td>'+data['uom'][i]+'</td>';
					values += '		<td><center><font color="red">'+data['withdraw_qty'][i]+'</center></font></td>';
					values += '		<td>'+unit_price_peso_lbl+'</td>';
					values += '		<td>'+data['requestor_name'][i]+'</td>';
					values += '</tr>';
					
					$('#tbl_YF_withdrawal tbody').append(values);
				}
				
				$('#tbl_YF_withdrawal').DataTable({ 
					paginate: true, 
					aaSorting: [],
					 });
					
			},
			error	: function(data){
				console.log(data);
			}
		});
		
	}
	
	/* TS */
	display_mtls_dtls_TS();
	function display_mtls_dtls_TS(){
		
				
		var data = {
			'action'		: 'display_mtls_dtls_TS'
		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				
				var ctr = data['ctr'];

				$('#display_mtls_dtls_TS').empty();
				
				var content  = '<table id="tbl_mtls_dtls_TS" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th>ID</th>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>Unit price in $</th>';
					content += '			<th>Exchange Rate</th>';
					content += '			<th>Unit price in Php</th>';
					content += '			<th>Current Stock</th>';
					content += '			<th>View Details</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_mtls_dtls_TS').append(content);
				
				for(i=0;i<ctr;i++){
				
					var view_details = '<button class="btn btn-success" id="btn_view_details" style="border-radius: 0px;" value='+data['mp_pkid'][i]+'> <i class="fa fa-eye" aria-hidden="true"></i> </button>';

					var values  = '<tr align="center" id='+data['mp_pkid'][i]+'>';
						values += '		<td>'+data['mp_pkid'][i]+'</td>';
						
						values += '		<td>'+data['mat_product_desc'][i]+'</td>';
						values += '		<td>'+data['mat_product_specs'][i]+'</td>';
						values += '		<td>'+data['mat_uom'][i]+'</td>';
						
						values += '		<td>'+data['mp_unit_price_dollor'][i]+'</td>';
						values += '		<td>'+data['mp_exchange_rate'][i]+'</td>';
						values += '		<td>'+data['mp_unit_price_peso'][i]+'</td>';
						
						values += '		<td><font color="green"><b>'+data['current_stock'][i]+'</font></b></td>';
						values += '		<td>'+view_details+'</td>';
						values += '</tr>';

						$('#tbl_mtls_dtls_TS tbody').append(values);
				}
					
					$("#tbl_mtls_dtls_TS tbody").on('click','tr #btn_view_details', function(e){
						e.preventDefault();
						view_details_ts($(this).val());
					});
									
					$('#tbl_mtls_dtls_TS').DataTable({ 
						paginate: true, 
						aaSorting: [],
					});
					 
					 // select_row_mtls_dtls_TS();
					 
				
			},
			// error	: function(data){
				// console.log(data);
			// }
			
			error: function (jqXHR, textStatus, errorThrown){
				console.log('jqXHR:');
				console.log(jqXHR);
				console.log('textStatus:');
				console.log(textStatus);
				console.log('errorThrown:');
				console.log(errorThrown);
			}
		
		});
		
	}
	
	function view_details_ts(id_mtls_dtls_TS) {
		
		var data = {
			"action"		 : "view_details_ts",
			"id"			 : id_mtls_dtls_TS
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_dtls_ts_prod_desc').val(data['mp_pkid']);
				$('#id_dtls_ts_prod_desc').val(data['mat_product_desc']);
				$('#id_dtls_ts_specs').val(data['mat_product_specs']);
				$('#id_dtls_ts_uom').val(data['mat_uom']);
				$('#id_dtls_ts_price').val(data['mp_unit_price_peso']);
				
				$('#id_hidden_ts_dtls_id').val(id_mtls_dtls_TS);
				$("#id_dtls_ts_modal_show").modal();
			
				get_trans_dtls_TS(id_mtls_dtls_TS);
				

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
			
	function get_trans_dtls_TS(id_mtls_dtls_TS){
		
		var data = {
			"action"	: "get_trans_dtls_TS",
			"id"		: id_mtls_dtls_TS
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr 			= data['ctr'];
				// var current_stock	= data['eoh'];
				
				$('#id_dtls_ts_current_amnt').val(data['eoh']);		
				
				$('#get_trans_dtls_TS').empty();	
					var html  = '<table id="tbl_ts_trans_dtls" class="table table-bordered">';
						html += '	<thead>';
						html += '		<tr>';
						html += '			<th><center><font size="1">TRANSACTION DATE</font></center></th>';
						html += '			<th><center><font size="1">SUPPLIER NAME</font></center></th>';
						html += '			<th><center><font size="1">INVOICE NO.</font></center></th>';
						html += '			<th><center><font size="1">BOH</font></center></th>';
						html += '			<th><center><font size="1">IN</font></center></th>';
						html += '			<th><center><font size="1">OUT</font></center></th>';
						html += '			<th><center><font size="1">EOH</font></center></th>';
						html += '			<th><center><font size="1">TRANSFER DEPT.</font></center></th>';
						html += '			<th><center><font size="1">REMARKS</font></center></th>';
						html += '		</tr>';
						html += '	</thead>';
						html += '	<tbody>';
						html += '	</tbody>';
						html += '</table>';
					
				$('#get_trans_dtls_TS').append(html);			
									
					$('#tbl_ts_trans_dtls').append(data['html']);
					
				$('#tbl_ts_trans_dtls').DataTable({ 
					paginate: true, 
					aaSorting: [],
				 });
				
			},error	: function(data){
				alert(data);
			}
		});
	} 
	
	function select_row_mtls_dtls_TS(){
		
		$('#tbl_mtls_dtls_TS tbody').on('click','tr', function(){
			id_mtls_dtls_TS = '';
			$('#tbl_mtls_dtls_TS tbody tr').attr('style','');
			$(this).attr('style','background: #D5F5E3 ;color:black;');
			id_mtls_dtls_TS = this.id;
			// alert(id_mtls_dtls_TS);
		});
			
		$("#tbl_mtls_dtls_TS tbody").on('dblclick', 'tr', function(){
			$("#modal-body input").val("");	
			select_mtls_dtls_TS(id_mtls_dtls_TS);
		});	
	
	}
	
	function select_mtls_dtls_TS(id_mtls_dtls_TS) {
		
		var data = {
			"action"		 : "select_mtls_dtls_TS",
			"id"			 : id_mtls_dtls_TS
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_umtls_dtls_desc_TS').val(data['mat_pkid']);
				$('#id_umtls_dtls_specs_TS').val(data['mat_product_specs']);
				$('#id_umtls_dtls_uom_TS').val(data['mat_uom']);
				
				$('#id_umtls_dtls_dollor_TS').val(data['mp_unit_price_dollor']);
				$('#id_umtls_dtls_exc_TS').val(data['mp_exchange_rate']);
				$('#id_umtls_dtls_peso_TS').val(data['mp_unit_price_peso']);
				
				$('#id_umtls_dtls_pkid_TS').val(data['idmTS_pkid']);
				$('#id_umtls_dtls_date_TS').val(data['idmTS_date_encode']);
				$('#id_umtls_dtls_qty_TS').val(data['idmTS_stock_qty']);				
				
				$('#id_uhidden_pkid_TS').val(id_mtls_dtls_TS);
				$("#id_update_mtls_dtls_TS_modal_show").modal();

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	$('#id_form_add_mtls_dtls_TS').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_mtls_dtls_TS(serialData);
		
	}); 
	
	function add_mtls_dtls_TS(serialData){
	
		var data = {
			'action'	: 'add_mtls_dtls_TS'
		}
		
		data = $.param(data) + "&" + serialData;
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				window.location.reload();

				// notif_add_success();
				display_mtls_dtls_TS();
				// $('#id_add_mtls_dtls_TS_modal_show').modal('hide');

			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}	
	
	$('#id_form_update_mtls_dtls_TS').submit(function(e){
		e.preventDefault();
		
		var data = {
			'action'			: 'update_material_dtls_TS',
			'id'				: id_mtls_dtls_TS
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(output){
			
			notif_success_update();
			$('#id_update_mtls_dtls_TS_modal_show').modal('hide');
			display_mtls_dtls_TS();
		
			},
			error	: function(output){
				console.log(output);
			}
		});
		
	});
	
	$('#id_btn_remove_mtls_dtls_TS').click(function(e){
		
		if(confirm($(this).data('confirm'))){
			e.preventDefault();
		} else {
			return false;
		}	
		remove_mtls_dtls_TS(id_mtls_dtls_TS);
		
	});
	
	function remove_mtls_dtls_TS(id_mtls_dtls_TS) {
		
		var data = {
			"action"			 : "remove_mtls_dtls_TS",
			"id"				 : id_mtls_dtls_TS
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data	: data,
			success	: function (data) {
				console.log(data);
				
				notif_success_removed();
				display_mtls_info();
			
			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	display_TS_recieved_info();
	function display_TS_recieved_info(){
		
		var data = {
			'action'		: 'display_TS_recieved_info'
		}
		
		data = $.param(data);
		// alert(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				
				var ctr = data['ctr'];

				$('#display_TS_recieved_info').empty();
				
				var content  = '<table id="tbl_TS_recieved_info" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>Unit price in $</th>';
					content += '			<th>Exchange Rate</th>';
					content += '			<th>Unit price in Php</th>';
					content += '			<th>Date Recieved</th>';
					content += '			<th>Supplier</th>';
					content += '			<th>Invoice Number</th>';
					content += '			<th>Recieved Qty</th>';
					content += '			<th>Remarks</th>';
					content += '			<th>Update</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_TS_recieved_info').append(content);
				
				for(i=0;i<ctr;i++){
				
					var view_details = '<button class="btn btn-warning" id="btn_view_details" style="border-radius: 0px;" value='+data['rm_ts_pkid'][i]+'> <i class="fa fa-pencil" aria-hidden="true"></i> </button>';

					var values  = '<tr align="center" id='+data['rm_ts_pkid'][i]+'>';
						
						values += '		<td>'+data['mat_product_desc'][i]+'</td>';
						values += '		<td>'+data['mat_product_specs'][i]+'</td>';
						values += '		<td>'+data['mat_uom'][i]+'</td>';
						
						values += '		<td>'+data['mp_unit_price_dollor'][i]+'</td>';
						values += '		<td>'+data['mp_exchange_rate'][i]+'</td>';
						values += '		<td>'+data['mp_unit_price_peso'][i]+'</td>';
						
						values += '		<td>'+data['rm_ts_date_received'][i]+'</td>';
						values += '		<td>'+data['rm_ts_supplier'][i]+'</td>';
						values += '		<td>'+data['rm_ts_invoice_num'][i]+'</td>';
						values += '		<td>'+data['rm_ts_rcv_qty'][i]+'</td>';
						values += '		<td>'+data['rm_ts_remarks'][i]+'</td>';
						
						values += '		<td>'+view_details+'</td>';
						values += '</tr>';

						$('#tbl_TS_recieved_info tbody').append(values);
				}
					
					$("#tbl_TS_recieved_info tbody").on('click','tr #btn_view_details', function(e){
						e.preventDefault();
						view_received_details_ts($(this).val());
					});
									
					$('#tbl_TS_recieved_info').DataTable({ 
						paginate: true, 
						aaSorting: [],
					});
					 		 
				
			},
			
			error: function (jqXHR, textStatus, errorThrown){
				console.log('jqXHR:');
				console.log(jqXHR);
				console.log('textStatus:');
				console.log(textStatus);
				console.log('errorThrown:');
				console.log(errorThrown);
			}
		
		});
		
	}
	
	function view_received_details_ts(id_rcvd_dtls_TS) {
		
		var data = {
			"action"		 : "view_received_details_ts",
			"id"			 : id_rcvd_dtls_TS
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_uts_prod_desc').val(data['mat_product_desc']);
				$('#id_uts_rcv_prod_specs').val(data['mat_product_specs']);
				$('#id_uts_rcv_unit_price').val(data['mp_unit_price_peso']);
				
				$('#id_uts_rcv_date').val(data['rm_ts_date_received']);
				$('#id_uts_rcv_qty').val(data['rm_ts_rcv_qty']);
				$('#id_uts_supp_name').val(data['rm_ts_supplier']);
				$('#id_uts_rcv_inv_no').val(data['rm_ts_invoice_num']);
				$('#id_uts_rcv_remarks').val(data['rm_ts_remarks']);
				
				$('#id_uhidden_pkid_TS_received').val(id_rcvd_dtls_TS);
				$("#id_ts_rcv_modal_update").modal();
						

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	$('#id_form_ts_rcvd_update').submit(function(e){
		e.preventDefault();
		
		var id_rcvd_dtls_TS		= $("#id_uhidden_pkid_TS_received").val();

		var data = {
			'action'			: 'update_recieved_info_ts',
			'id'				: id_rcvd_dtls_TS
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(output){
			
			window.location.reload();
			display_TS_recieved_info();
		
			},
			error	: function(output){
				console.log(output);
			}
		});
		
	});
	
	
	/* PPS */
	display_mtls_dtls_PPS();
	function display_mtls_dtls_PPS(){
		
				
		var data = {
			'action'		: 'display_mtls_dtls_PPS'
		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				
				var ctr = data['ctr'];
				
				$('#display_mtls_dtls_PPS').empty();
				
				var content  = '<table id="tbl_mtls_dtls_PPS" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th>ID</th>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>Unit price in $</th>';
					content += '			<th>Exchange Rate</th>';
					content += '			<th>Unit price in Php</th>';
					content += '			<th>Current Stock</th>';
					content += '			<th>View Details</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_mtls_dtls_PPS').append(content);
				
				for(i=0;i<ctr;i++){
				
				var view_details = '<button class="btn btn-success" id="btn_view_details" style="border-radius: 0px;" value='+data['mp_pkid'][i]+'> <i class="fa fa-eye" aria-hidden="true"></i> </button>';

				var values  = '<tr align="center" id='+data['mp_pkid'][i]+'>';
					values += '		<td>'+data['mp_pkid'][i]+'</td>';
					
					values += '		<td>'+data['mat_product_desc'][i]+'</td>';
					values += '		<td>'+data['mat_product_specs'][i]+'</td>';
					values += '		<td>'+data['mat_uom'][i]+'</td>';
					
					values += '		<td>'+data['mp_unit_price_dollor'][i]+'</td>';
					values += '		<td>'+data['mp_exchange_rate'][i]+'</td>';
					values += '		<td>'+data['mp_unit_price_peso'][i]+'</td>';
					
					values += '	<td><font color="green"><b>'+data['current_stock'][i]+'</font></b></td>';
					values += '		<td>'+view_details+'</td>';
					values += '</tr>';
					
					$('#tbl_mtls_dtls_PPS tbody').append(values);
				}
					
					$("#tbl_mtls_dtls_PPS tbody").on('click','tr #btn_view_details', function(e){
						e.preventDefault();
						view_details_pps($(this).val());
					});
									
					$('#tbl_mtls_dtls_PPS').DataTable({ 
						paginate: true, 
						aaSorting: [],
					});
					 
					 // select_row_mtls_dtls_TS();
					 
				
			},
			// error	: function(data){
				// console.log(data);
			// }
			
			error: function (jqXHR, textStatus, errorThrown){
				console.log('jqXHR:');
				console.log(jqXHR);
				console.log('textStatus:');
				console.log(textStatus);
				console.log('errorThrown:');
				console.log(errorThrown);
			}
		
		});
		
	}
	
	function view_details_pps(id_mtls_dtls_PPS) {
		
		var data = {
			"action"		 : "view_details_pps",
			"id"			 : id_mtls_dtls_PPS
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_dtls_pps_prod_desc').val(data['mp_pkid']);
				$('#id_dtls_pps_prod_desc').val(data['mat_product_desc']);
				$('#id_dtls_pps_specs').val(data['mat_product_specs']);
				$('#id_dtls_pps_uom').val(data['mat_uom']);
				$('#id_dtls_pps_price').val(data['mp_unit_price_peso']);
				
				$('#id_hidden_pps_dtls_id').val(id_mtls_dtls_PPS);
				$("#id_dtls_pps_modal_show").modal();
			
				get_trans_dtls_PPS(id_mtls_dtls_PPS);
				

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	function get_trans_dtls_PPS(id_mtls_dtls_PPS){
		
		var data = {
			"action"	: "get_trans_dtls_PPS",
			"id"		: id_mtls_dtls_PPS
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr 			= data['ctr'];
				
				$('#id_dtls_pps_current_amnt').val(data['eoh']);		

				$('#get_trans_dtls_PPS').empty();	
					var html  = '<table id="tbl_pps_trans_dtls" class="table table-bordered">';
						html += '	<thead>';
						html += '		<tr>';
						html += '			<th><center><font size="1">TRANSACTION DATE</font></center></th>';
						html += '			<th><center><font size="1">SUPPLIER NAME</font></center></th>';
						html += '			<th><center><font size="1">INVOICE NO.</font></center></th>';
						html += '			<th><center><font size="1">BOH</font></center></th>';
						html += '			<th><center><font size="1">IN</font></center></th>';
						html += '			<th><center><font size="1">OUT</font></center></th>';
						html += '			<th><center><font size="1">EOH</font></center></th>';
						html += '			<th><center><font size="1">TRANSFER DEPT.</font></center></th>';
						html += '			<th><center><font size="1">REMARKS</font></center></th>';
						html += '		</tr>';
						html += '	</thead>';
						html += '	<tbody>';
						html += '	</tbody>';
						html += '</table>';
					
				$('#get_trans_dtls_PPS').append(html);			
									
					$('#tbl_pps_trans_dtls').append(data['html']);
					
				$('#tbl_pps_trans_dtls').DataTable({ 
					paginate: true, 
					aaSorting: [],
				 });
				
			},error	: function(data){
				alert(data);
			}
		});
	} 
	
	function select_row_mtls_dtls_PPS(){
		
		$('#tbl_mtls_dtls_PPS tbody').on('click','tr', function(){
			id_mtls_dtls_PPS = '';
			$('#tbl_mtls_dtls_PPS tbody tr').attr('style','');
			$(this).attr('style','background: #D5F5E3 ;color:black;');
			id_mtls_dtls_PPS = this.id;
		});
			
		$("#tbl_mtls_dtls_PPS tbody").on('dblclick', 'tr', function(){
			$("#modal-body input").val("");	
			select_mtls_dtls_PPS(id_mtls_dtls_PPS);
		});	
	
	}
	
	function select_mtls_dtls_PPS(id_mtls_dtls_PPS) {
		
		var data = {
			"action"		 : "select_mtls_dtls_PPS",
			"id"			 : id_mtls_dtls_PPS
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_umtls_dtls_desc_PPS').val(data['mat_pkid']);
				$('#id_umtls_dtls_specs_PPS').val(data['mat_product_specs']);
				$('#id_umtls_dtls_uom_PPS').val(data['mat_uom']);
				
				$('#id_umtls_dtls_dollor_PPS').val(data['mp_unit_price_dollor']);
				$('#id_umtls_dtls_exc_PPS').val(data['mp_exchange_rate']);
				$('#id_umtls_dtls_peso_PPS').val(data['mp_unit_price_peso']);
				
				$('#id_umtls_dtls_pkid_PPS').val(data['idmPPS_pkid']);
				$('#id_umtls_dtls_date_PPS').val(data['idmPPS_date_encode']);
				$('#id_umtls_dtls_qty_PPS').val(data['idmPPS_stock_qty']);				
				
				$('#id_uhidden_pkid_PPS').val(id_mtls_dtls_TS);
				$("#id_update_mtls_dtls_PPS_modal_show").modal();

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	$('#id_form_add_mtls_dtls_PPS').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_mtls_dtls_PPS(serialData);
		
	}); 
	
	function add_mtls_dtls_PPS(serialData){
	
		var data = {
			'action'	: 'add_mtls_dtls_PPS'
		}
		
		data = $.param(data) + "&" + serialData;
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				window.location.reload();
				// notif_add_success();
				display_mtls_dtls_PPS();
				// $('#id_add_mtls_dtls_PPS_modal_show').modal('hide');

			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}	
	
	$('#id_form_update_mtls_dtls_PPS').submit(function(e){
		e.preventDefault();
		
		var data = {
			'action'			: 'update_material_dtls_PPS',
			'id'				: id_mtls_dtls_PPS
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(output){
			
			notif_success_update();
			$('#id_update_mtls_dtls_PPS_modal_show').modal('hide');
			display_mtls_dtls_PPS();
		
			},
			error	: function(output){
				console.log(output);
			}
		});
		
	});
	
	$('#id_btn_remove_mtls_dtls_PPS').click(function(e){
		
		if(confirm($(this).data('confirm'))){
			e.preventDefault();
		} else {
			return false;
		}	
		remove_mtls_dtls_PPS(id_mtls_dtls_PPS);
		
	});
	
	function remove_mtls_dtls_PPS(id_mtls_dtls_PPS) {
		
		var data = {
			"action"			 : "remove_mtls_dtls_PPS",
			"id"				 : id_mtls_dtls_PPS
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data	: data,
			success	: function (data) {
				console.log(data);
				
				notif_success_removed();
				display_mtls_dtls_PPS();
			
			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	display_PPS_recieved_info();
	function display_PPS_recieved_info(){
		
		var data = {
			'action'		: 'display_PPS_recieved_info'
		}
		
		data = $.param(data);
		// alert(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				
				var ctr = data['ctr'];

				$('#display_PPS_recieved_info').empty();
				
				var content  = '<table id="tbl_PPS_recieved_info" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>Unit price in $</th>';
					content += '			<th>Exchange Rate</th>';
					content += '			<th>Unit price in Php</th>';
					content += '			<th>Date Recieved</th>';
					content += '			<th>Supplier</th>';
					content += '			<th>Invoice Number</th>';
					content += '			<th>Recieved Qty</th>';
					content += '			<th>Remarks</th>';
					content += '			<th>Update</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_PPS_recieved_info').append(content);
				
				for(i=0;i<ctr;i++){
				
					var view_details_pps = '<button class="btn btn-warning" id="btn_view_rcvd_details_pps" style="border-radius: 0px;" value='+data['rm_pps_pkid'][i]+'> <i class="fa fa-pencil" aria-hidden="true"></i> </button>';

					var values  = '<tr align="center" id='+data['rm_pps_pkid'][i]+'>';
						
						values += '		<td>'+data['mat_product_desc'][i]+'</td>';
						values += '		<td>'+data['mat_product_specs'][i]+'</td>';
						values += '		<td>'+data['mat_uom'][i]+'</td>';
						
						values += '		<td>'+data['mp_unit_price_dollor'][i]+'</td>';
						values += '		<td>'+data['mp_exchange_rate'][i]+'</td>';
						values += '		<td>'+data['mp_unit_price_peso'][i]+'</td>';
						
						values += '		<td>'+data['rm_pps_date_received'][i]+'</td>';
						values += '		<td>'+data['rm_pps_supplier'][i]+'</td>';
						values += '		<td>'+data['rm_pps_invoice_num'][i]+'</td>';
						values += '		<td>'+data['rm_pps_rcv_qty'][i]+'</td>';
						values += '		<td>'+data['rm_pps_remarks'][i]+'</td>';
						
						values += '		<td>'+view_details_pps+'</td>';
						values += '</tr>';

						$('#tbl_PPS_recieved_info tbody').append(values);
				}
					
					$("#tbl_PPS_recieved_info tbody").on('click','tr #btn_view_rcvd_details_pps', function(e){
						e.preventDefault();
						view_received_details_pps($(this).val());
					});
									
					$('#tbl_PPS_recieved_info').DataTable({ 
						paginate: true, 
						aaSorting: [],
					});
					 		 
				
			},
			
			error: function (jqXHR, textStatus, errorThrown){
				console.log('jqXHR:');
				console.log(jqXHR);
				console.log('textStatus:');
				console.log(textStatus);
				console.log('errorThrown:');
				console.log(errorThrown);
			}
		
		});
		
	}
	
	function view_received_details_pps(id_rcvd_dtls_PPS) {
		
		var data = {
			"action"		 : "view_received_details_pps",
			"id"			 : id_rcvd_dtls_PPS
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_upps_prod_desc').val(data['mat_product_desc']);
				$('#id_upps_rcv_prod_specs').val(data['mat_product_specs']);
				$('#id_upps_rcv_unit_price').val(data['mp_unit_price_peso']);
				
				$('#id_upps_rcv_date').val(data['rm_pps_date_received']);
				$('#id_upps_rcv_qty').val(data['rm_pps_rcv_qty']);
				$('#id_upps_supp_name').val(data['rm_pps_supplier']);
				$('#id_upps_rcv_inv_no').val(data['rm_pps_invoice_num']);
				$('#id_upps_rcv_remarks').val(data['rm_pps_remarks']);
				
				$('#id_uhidden_pkid_PPS_received').val(id_rcvd_dtls_PPS);
				$("#id_pps_rcv_modal_update").modal();
						

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	$('#id_form_pps_rcvd_update').submit(function(e){
		e.preventDefault();
		
		var id_rcvd_dtls_PPS		= $("#id_uhidden_pkid_PPS_received").val();

		var data = {
			'action'			: 'update_recieved_info_pps',
			'id'				: id_rcvd_dtls_PPS
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(output){
			
			window.location.reload();
			display_PPS_recieved_info();
		
			},
			error	: function(output){
				console.log(output);
			}
		});
		
	});
	
	/* CN */
	display_mtls_dtls_CN();
	function display_mtls_dtls_CN(){
		
		var data = {
			'action'		: 'display_mtls_dtls_CN'
		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				
				var ctr = data['ctr'];
				
				$('#display_mtls_dtls_CN').empty();
				
				var content  = '<table id="tbl_mtls_dtls_CN" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th>ID</th>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>Unit price in $</th>';
					content += '			<th>Exchange Rate</th>';
					content += '			<th>Unit price in Php</th>';
					content += '			<th>Current Stock</th>';
					content += '			<th>View Details</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_mtls_dtls_CN').append(content);
				
				for(i=0;i<ctr;i++){
				
				var view_details = '<button class="btn btn-success" id="btn_view_details" style="border-radius: 0px;" value='+data['mp_pkid'][i]+'> <i class="fa fa-eye" aria-hidden="true"></i> </button>';

				var values  = '<tr align="center" id='+data['mp_pkid'][i]+'>';
					values += '		<td>'+data['mp_pkid'][i]+'</td>';
					
					values += '		<td>'+data['mat_product_desc'][i]+'</td>';
					values += '		<td>'+data['mat_product_specs'][i]+'</td>';
					values += '		<td>'+data['mat_uom'][i]+'</td>';
					
					values += '		<td>'+data['mp_unit_price_dollor'][i]+'</td>';
					values += '		<td>'+data['mp_exchange_rate'][i]+'</td>';
					values += '		<td>'+data['mp_unit_price_peso'][i]+'</td>';
					
					values += '	<td><font color="green"><b>'+data['current_stock'][i]+'</font></b></td>';
					values += '		<td>'+view_details+'</td>';
					values += '</tr>';
					
					$('#tbl_mtls_dtls_CN tbody').append(values);
				}
					
					$("#tbl_mtls_dtls_CN tbody").on('click','tr #btn_view_details', function(e){
						e.preventDefault();
						view_details_cn($(this).val());
					});
									
					$('#tbl_mtls_dtls_CN').DataTable({ 
						paginate: true, 
						aaSorting: [],
					});
					 
					 // select_row_mtls_dtls_CN();
					 
				
			},
			error	: function(data){
				console.log(data);
			}
		});
		
	}
	
	function view_details_cn(id_mtls_dtls_CN) {
		
		var data = {
			"action"		 : "view_details_cn",
			"id"			 : id_mtls_dtls_CN
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_dtls_cn_prod_desc').val(data['mp_pkid']);
				$('#id_dtls_cn_prod_desc').val(data['mat_product_desc']);
				$('#id_dtls_cn_specs').val(data['mat_product_specs']);
				$('#id_dtls_cn_uom').val(data['mat_uom']);
				$('#id_dtls_cn_price').val(data['mp_unit_price_peso']);
				
				$('#id_hidden_cn_dtls_id').val(id_mtls_dtls_CN);
				$("#id_dtls_cn_modal_show").modal();
			
				get_trans_dtls_CN(id_mtls_dtls_CN);
				

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	function get_trans_dtls_CN(id_mtls_dtls_CN){
		
		var data = {
			"action"	: "get_trans_dtls_CN",
			"id"		: id_mtls_dtls_CN
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr = data['ctr'];
				
				$('#id_dtls_cn_current_amnt').val(data['eoh']);		

				$('#get_trans_dtls_CN').empty();	
					var html  = '<table id="tbl_cn_trans_dtls" class="table table-bordered">';
						html += '	<thead>';
						html += '		<tr>';
						html += '			<th><center><font size="1">DATE</font></center></th>';
						html += '			<th><center><font size="1">SUPPLIER NAME</font></center></th>';
						html += '			<th><center><font size="1">INVOICE NO.</font></center></th>';
						html += '			<th><center><font size="1">BOH</font></center></th>';
						html += '			<th><center><font size="1">IN</font></center></th>';
						html += '			<th><center><font size="1">OUT</font></center></th>';
						html += '			<th><center><font size="1">EOH</font></center></th>';
						html += '			<th><center><font size="1">TRANSFER DEPT.</font></center></th>';
						html += '			<th><center><font size="1">REMARKS</font></center></th>';
						html += '		</tr>';
						html += '	</thead>';
						html += '	<tbody>';
						html += '	</tbody>';
						html += '</table>';
					
				$('#get_trans_dtls_CN').append(html);			
									
					$('#tbl_cn_trans_dtls').append(data['html']);
					
				$('#tbl_cn_trans_dtls').DataTable({ 
					paginate: true, 
					aaSorting: [],
				 });
				
			},error	: function(data){
				alert(data);
			}
		});
	} 
	
	function select_row_mtls_dtls_CN(){
		
		$('#tbl_mtls_dtls_CN tbody').on('click','tr', function(){
			id_mtls_dtls_CN = '';
			$('#tbl_mtls_dtls_CN tbody tr').attr('style','');
			$(this).attr('style','background: #D5F5E3 ;color:black;');
			id_mtls_dtls_CN = this.id;
		});
			
		$("#tbl_mtls_dtls_CN tbody").on('dblclick', 'tr', function(){
			$("#modal-body input").val("");	
			select_mtls_dtls_CN(id_mtls_dtls_CN);
		});	
	
	}
	
	function select_mtls_dtls_CN(id_mtls_dtls_CN) {
		
		var data = {
			"action"		 : "select_mtls_dtls_CN",
			"id"			 : id_mtls_dtls_CN
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_umtls_dtls_desc_CN').val(data['mat_pkid']);
				$('#id_umtls_dtls_specs_CN').val(data['mat_product_specs']);
				$('#id_umtls_dtls_uom_CN').val(data['mat_uom']);
				
				$('#id_umtls_dtls_dollor_CN').val(data['mp_unit_price_dollor']);
				$('#id_umtls_dtls_exc_CN').val(data['mp_exchange_rate']);
				$('#id_umtls_dtls_peso_CN').val(data['mp_unit_price_peso']);
				
				$('#id_umtls_dtls_pkid_CN').val(data['idmCN_pkid']);
				$('#id_umtls_dtls_date_CN').val(data['idmCN_date_encode']);
				$('#id_umtls_dtls_qty_CN').val(data['idmCN_stock_qty']);				
				
				$('#id_uhidden_pkid_CN').val(id_mtls_dtls_TS);
				$("#id_update_mtls_dtls_CN_modal_show").modal();

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	$('#id_form_add_mtls_dtls_CN').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_mtls_dtls_CN(serialData);
		
	}); 
	
	function add_mtls_dtls_CN(serialData){
	
		var data = {
			'action'	: 'add_mtls_dtls_CN'
		}
		
		data = $.param(data) + "&" + serialData;
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				window.location.reload();
				// notif_add_success();
				display_mtls_dtls_CN();
				// $('#id_add_mtls_dtls_CN_modal_show').modal('hide');

			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}	
	
	$('#id_form_update_mtls_dtls_CN').submit(function(e){
		e.preventDefault();
		
		var data = {
			'action'			: 'update_material_dtls_CN',
			'id'				: id_mtls_dtls_CN
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(output){
			
			notif_success_update();
			$('#id_update_mtls_dtls_CN_modal_show').modal('hide');
			display_mtls_dtls_CN();
		
			},
			error	: function(output){
				console.log(output);
			}
		});
		
	});
	
	$('#id_btn_remove_mtls_dtls_CN').click(function(e){
		
		if(confirm($(this).data('confirm'))){
			e.preventDefault();
		} else {
			return false;
		}	
		remove_mtls_dtls_CN(id_mtls_dtls_CN);
		
	});
	
	function remove_mtls_dtls_CN(id_mtls_dtls_CN) {
		
		var data = {
			"action"			 : "remove_mtls_dtls_CN",
			"id"				 : id_mtls_dtls_CN
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data	: data,
			success	: function (data) {
				console.log(data);
				
				notif_success_removed();
				display_mtls_dtls_CN();
			
			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	display_CN_recieved_info();
	function display_CN_recieved_info(){
		
		var data = {
			'action'		: 'display_CN_recieved_info'
		}
		
		data = $.param(data);
		// alert(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				
				var ctr = data['ctr'];

				$('#display_CN_recieved_info').empty();
				
				var content  = '<table id="tbl_CN_recieved_info" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>Unit price in $</th>';
					content += '			<th>Exchange Rate</th>';
					content += '			<th>Unit price in Php</th>';
					content += '			<th>Date Recieved</th>';
					content += '			<th>Supplier</th>';
					content += '			<th>Invoice Number</th>';
					content += '			<th>Recieved Qty</th>';
					content += '			<th>Remarks</th>';
					content += '			<th>Update</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_CN_recieved_info').append(content);
				
				for(i=0;i<ctr;i++){
				
					var view_details_cn = '<button class="btn btn-warning" id="btn_view_rcvd_details_cn" style="border-radius: 0px;" value='+data['rm_cn_pkid'][i]+'> <i class="fa fa-pencil" aria-hidden="true"></i> </button>';

					var values  = '<tr align="center" id='+data['rm_cn_pkid'][i]+'>';
						
						values += '		<td>'+data['mat_product_desc'][i]+'</td>';
						values += '		<td>'+data['mat_product_specs'][i]+'</td>';
						values += '		<td>'+data['mat_uom'][i]+'</td>';
						
						values += '		<td>'+data['mp_unit_price_dollor'][i]+'</td>';
						values += '		<td>'+data['mp_exchange_rate'][i]+'</td>';
						values += '		<td>'+data['mp_unit_price_peso'][i]+'</td>';
						
						values += '		<td>'+data['rm_cn_date_received'][i]+'</td>';
						values += '		<td>'+data['rm_cn_supplier'][i]+'</td>';
						values += '		<td>'+data['rm_cn_invoice_num'][i]+'</td>';
						values += '		<td>'+data['rm_cn_rcv_qty'][i]+'</td>';
						values += '		<td>'+data['rm_cn_remarks'][i]+'</td>';
						
						values += '		<td>'+view_details_cn+'</td>';
						values += '</tr>';

						$('#tbl_CN_recieved_info tbody').append(values);
				}
					
					$("#tbl_CN_recieved_info tbody").on('click','tr #btn_view_rcvd_details_cn', function(e){
						e.preventDefault();
						view_received_details_cn($(this).val());
					});
									
					$('#tbl_CN_recieved_info').DataTable({ 
						paginate: true, 
						aaSorting: [],
					});
					 		 
				
			},
			
			error: function (jqXHR, textStatus, errorThrown){
				console.log('jqXHR:');
				console.log(jqXHR);
				console.log('textStatus:');
				console.log(textStatus);
				console.log('errorThrown:');
				console.log(errorThrown);
			}
		
		});
		
	}
	
	function view_received_details_cn(id_rcvd_dtls_CN) {
		
		var data = {
			"action"		 : "view_received_details_cn",
			"id"			 : id_rcvd_dtls_CN
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_ucn_prod_desc').val(data['mat_product_desc']);
				$('#id_ucn_rcv_prod_specs').val(data['mat_product_specs']);
				$('#id_ucn_rcv_unit_price').val(data['mp_unit_price_peso']);
				
				$('#id_ucn_rcv_date').val(data['rm_cn_date_received']);
				$('#id_ucn_rcv_qty').val(data['rm_cn_rcv_qty']);
				$('#id_ucn_supp_name').val(data['rm_cn_supplier']);
				$('#id_ucn_rcv_inv_no').val(data['rm_cn_invoice_num']);
				$('#id_ucn_rcv_remarks').val(data['rm_cn_remarks']);
				
				$('#id_uhidden_pkid_CN_received').val(id_rcvd_dtls_CN);
				$("#id_cn_rcv_modal_update").modal();
						

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	$('#id_form_cn_rcvd_update').submit(function(e){
		e.preventDefault();
		
		var id_rcvd_dtls_CN		= $("#id_uhidden_pkid_CN_received").val();

		var data = {
			'action'			: 'update_recieved_info_cn',
			'id'				: id_rcvd_dtls_CN
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(output){
			
			window.location.reload();
			display_CN_recieved_info();
		
			},
			error	: function(output){
				console.log(output);
			}
		});
		
	});
	
	/* YF */
	display_mtls_dtls_YF();
	function display_mtls_dtls_YF(){
		
		var data = {
			'action'		: 'display_mtls_dtls_YF'
		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				
				var ctr = data['ctr'];
				
				$('#display_mtls_dtls_YF').empty();
				
				var content  = '<table id="tbl_mtls_dtls_YF" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th>ID</th>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>Unit price in $</th>';
					content += '			<th>Exchange Rate</th>';
					content += '			<th>Unit price in Php</th>';
					content += '			<th>Current Stock</th>';
					content += '			<th>View Details</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_mtls_dtls_YF').append(content);
				
				for(i=0;i<ctr;i++){
				
				var view_details = '<button class="btn btn-success" id="btn_view_details" style="border-radius: 0px;" value='+data['mp_pkid'][i]+'> <i class="fa fa-eye" aria-hidden="true"></i> </button>';

				var values  = '<tr align="center" id='+data['mp_pkid'][i]+'>';
					values += '		<td>'+data['mp_pkid'][i]+'</td>';
					
					values += '		<td>'+data['mat_product_desc'][i]+'</td>';
					values += '		<td>'+data['mat_product_specs'][i]+'</td>';
					values += '		<td>'+data['mat_uom'][i]+'</td>';
					
					values += '		<td>'+data['mp_unit_price_dollor'][i]+'</td>';
					values += '		<td>'+data['mp_exchange_rate'][i]+'</td>';
					values += '		<td>'+data['mp_unit_price_peso'][i]+'</td>';
					
					values += '		<td><font color="green"><b>'+data['current_stock'][i]+'</font></b></td>';
					values += '		<td>'+view_details+'</td>';
					values += '</tr>';
					
					$('#tbl_mtls_dtls_YF tbody').append(values);
				}
					
					$("#tbl_mtls_dtls_YF tbody").on('click','tr #btn_view_details', function(e){
						e.preventDefault();
						view_details_yf($(this).val());
					});
									
					$('#tbl_mtls_dtls_YF').DataTable({ 
						paginate: true, 
						aaSorting: [],
					});
					 
					 // select_row_mtls_dtls_YF();
					 
				
			},
			error	: function(data){
				console.log(data);
			}
		});
		
	}
	
	function view_details_yf(id_mtls_dtls_YF) {
		
		var data = {
			"action"		 : "view_details_yf",
			"id"			 : id_mtls_dtls_YF
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_dtls_yf_prod_desc').val(data['mp_pkid']);
				$('#id_dtls_yf_prod_desc').val(data['mat_product_desc']);
				$('#id_dtls_yf_specs').val(data['mat_product_specs']);
				$('#id_dtls_yf_uom').val(data['mat_uom']);
				$('#id_dtls_yf_price').val(data['mp_unit_price_peso']);
				
				$('#id_hidden_yf_dtls_id').val(id_mtls_dtls_YF);
				$("#id_dtls_yf_modal_show").modal();
			
				get_trans_dtls_YF(id_mtls_dtls_YF);
				

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	function get_trans_dtls_YF(id_mtls_dtls_YF){
		
		var data = {
			"action"	: "get_trans_dtls_YF",
			"id"		: id_mtls_dtls_YF
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr 			= data['ctr'];
				$('#id_dtls_yf_current_amnt').val(data['eoh']);		

				$('#get_trans_dtls_YF').empty();	
					var html  = '<table id="tbl_yf_trans_dtls" class="table table-bordered">';
						html += '	<thead>';
						html += '		<tr>';
						html += '			<th><center><font size="1">DATE</font></center></th>';
						html += '			<th><center><font size="1">SUPPLIER NAME</font></center></th>';
						html += '			<th><center><font size="1">INVOICE NO.</font></center></th>';
						html += '			<th><center><font size="1">BOH</font></center></th>';
						html += '			<th><center><font size="1">IN</font></center></th>';
						html += '			<th><center><font size="1">OUT</font></center></th>';
						html += '			<th><center><font size="1">EOH</font></center></th>';
						html += '			<th><center><font size="1">TRANSFER DEPT.</font></center></th>';
						html += '			<th><center><font size="1">REMARKS</font></center></th>';
						html += '		</tr>';
						html += '	</thead>';
						html += '	<tbody>';
						html += '	</tbody>';
						html += '</table>';
					
				$('#get_trans_dtls_YF').append(html);			
									
					$('#tbl_yf_trans_dtls').append(data['html']);
					
				$('#tbl_yf_trans_dtls').DataTable({ 
					paginate: true, 
					aaSorting: [],
				 });
				
			},error	: function(data){
				alert(data);
			}
		});
	} 
	
	function select_row_mtls_dtls_YF(){
		
		$('#tbl_mtls_dtls_YF tbody').on('click','tr', function(){
			id_mtls_dtls_YF = '';
			$('#tbl_mtls_dtls_YF tbody tr').attr('style','');
			$(this).attr('style','background: #D5F5E3 ;color:black;');
			id_mtls_dtls_YF = this.id;
		});
			
		$("#tbl_mtls_dtls_YF tbody").on('dblclick', 'tr', function(){
			$("#modal-body input").val("");	
			select_mtls_dtls_YF(id_mtls_dtls_YF);
		});	
	
	}
	
	function select_mtls_dtls_YF(id_mtls_dtls_YF) {
		
		var data = {
			"action"		 : "select_mtls_dtls_YF",
			"id"			 : id_mtls_dtls_YF
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_umtls_dtls_desc_YF').val(data['mat_pkid']);
				$('#id_umtls_dtls_specs_YF').val(data['mat_product_specs']);
				$('#id_umtls_dtls_uom_YF').val(data['mat_uom']);
				
				$('#id_umtls_dtls_dollor_YF').val(data['mp_unit_price_dollor']);
				$('#id_umtls_dtls_exc_YF').val(data['mp_exchange_rate']);
				$('#id_umtls_dtls_peso_YF').val(data['mp_unit_price_peso']);
				
				$('#id_umtls_dtls_pkid_YF').val(data['idmYF_pkid']);
				$('#id_umtls_dtls_date_YF').val(data['idmYF_date_encode']);
				$('#id_umtls_dtls_qty_YF').val(data['idmYF_stock_qty']);				
				
				$('#id_uhidden_pkid_YF').val(id_mtls_dtls_TS);
				$("#id_update_mtls_dtls_YF_modal_show").modal();

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	$('#id_form_add_mtls_dtls_YF').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_mtls_dtls_YF(serialData);
		
	}); 
	
	function add_mtls_dtls_YF(serialData){
	
		var data = {
			'action'	: 'add_mtls_dtls_YF'
		}
		
		data = $.param(data) + "&" + serialData;
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				window.location.reload();
				// notif_add_success();
				display_mtls_dtls_YF();
				// $('#id_add_mtls_dtls_YF_modal_show').modal('hide');

			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}	
	
	$('#id_form_update_mtls_dtls_YF').submit(function(e){
		e.preventDefault();
		
		var data = {
			'action'			: 'update_material_dtls_YF',
			'id'				: id_mtls_dtls_YF
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(output){
			
			notif_success_update();
			$('#id_update_mtls_dtls_YF_modal_show').modal('hide');
			display_mtls_dtls_YF();
		
			},
			error	: function(output){
				console.log(output);
			}
		});
		
	});
	
	$('#id_btn_remove_mtls_dtls_YF').click(function(e){
		
		if(confirm($(this).data('confirm'))){
			e.preventDefault();
		} else {
			return false;
		}	
		remove_mtls_dtls_YF(id_mtls_dtls_YF);
		
	});
	
	function remove_mtls_dtls_YF(id_mtls_dtls_CN) {
		
		var data = {
			"action"			 : "remove_mtls_dtls_YF",
			"id"				 : id_mtls_dtls_YF
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data	: data,
			success	: function (data) {
				console.log(data);
				
				notif_success_removed();
				display_mtls_dtls_YF();
			
			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	display_YF_recieved_info();
	function display_YF_recieved_info(){
		
		var data = {
			'action'		: 'display_YF_recieved_info'
		}
		
		data = $.param(data);
		// alert(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				
				var ctr = data['ctr'];

				$('#display_YF_recieved_info').empty();
				
				var content  = '<table id="tbl_YF_recieved_info" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>Unit price in $</th>';
					content += '			<th>Exchange Rate</th>';
					content += '			<th>Unit price in Php</th>';
					content += '			<th>Date Recieved</th>';
					content += '			<th>Supplier</th>';
					content += '			<th>Invoice Number</th>';
					content += '			<th>Recieved Qty</th>';
					content += '			<th>Remarks</th>';
					content += '			<th>Update</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_YF_recieved_info').append(content);
				
				for(i=0;i<ctr;i++){
				
					var view_details_yf = '<button class="btn btn-warning" id="btn_view_rcvd_details_yf" style="border-radius: 0px;" value='+data['rm_yf_pkid'][i]+'> <i class="fa fa-pencil" aria-hidden="true"></i> </button>';

					var values  = '<tr align="center" id='+data['rm_yf_pkid'][i]+'>';
						
						values += '		<td>'+data['mat_product_desc'][i]+'</td>';
						values += '		<td>'+data['mat_product_specs'][i]+'</td>';
						values += '		<td>'+data['mat_uom'][i]+'</td>';
						
						values += '		<td>'+data['mp_unit_price_dollor'][i]+'</td>';
						values += '		<td>'+data['mp_exchange_rate'][i]+'</td>';
						values += '		<td>'+data['mp_unit_price_peso'][i]+'</td>';
						
						values += '		<td>'+data['rm_yf_date_received'][i]+'</td>';
						values += '		<td>'+data['rm_yf_supplier'][i]+'</td>';
						values += '		<td>'+data['rm_yf_invoice_num'][i]+'</td>';
						values += '		<td>'+data['rm_yf_rcv_qty'][i]+'</td>';
						values += '		<td>'+data['rm_yf_remarks'][i]+'</td>';
						
						values += '		<td>'+view_details_yf+'</td>';
						values += '</tr>';

						$('#tbl_YF_recieved_info tbody').append(values);
				}
					
					$("#tbl_YF_recieved_info tbody").on('click','tr #btn_view_rcvd_details_yf', function(e){
						e.preventDefault();
						view_received_details_yf($(this).val());
					});
									
					$('#tbl_YF_recieved_info').DataTable({ 
						paginate: true, 
						aaSorting: [],
					});
					 		 
				
			},
			
			error: function (jqXHR, textStatus, errorThrown){
				console.log('jqXHR:');
				console.log(jqXHR);
				console.log('textStatus:');
				console.log(textStatus);
				console.log('errorThrown:');
				console.log(errorThrown);
			}
		
		});
		
	}
	
	function view_received_details_yf(id_rcvd_dtls_YF) {
		
		var data = {
			"action"		 : "view_received_details_yf",
			"id"			 : id_rcvd_dtls_YF
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				$('#id_uyf_prod_desc').val(data['mat_product_desc']);
				$('#id_uyf_rcv_prod_specs').val(data['mat_product_specs']);
				$('#id_uyf_rcv_unit_price').val(data['mp_unit_price_peso']);
				
				$('#id_uyf_rcv_date').val(data['rm_yf_date_received']);
				$('#id_uyf_rcv_qty').val(data['rm_yf_rcv_qty']);
				$('#id_uyf_supp_name').val(data['rm_yf_supplier']);
				$('#id_uyf_rcv_inv_no').val(data['rm_yf_invoice_num']);
				$('#id_uyf_rcv_remarks').val(data['rm_yf_remarks']);
				
				$('#id_uhidden_pkid_YF_received').val(id_rcvd_dtls_YF);
				$("#id_yf_rcv_modal_update").modal();
						

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	$('#id_form_yf_rcvd_update').submit(function(e){
		e.preventDefault();
		
		var id_rcvd_dtls_YF		= $("#id_uhidden_pkid_YF_received").val();

		var data = {
			'action'			: 'update_recieved_info_yf',
			'id'				: id_rcvd_dtls_YF
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(output){
			
			window.location.reload();
			display_YF_recieved_info();
		
			},
			error	: function(output){
				console.log(output);
			}
		});
		
	});
	
	/* Material Details */
	$('#id_mtls_dtls_desc').change(function () {


		
		if($('#id_mtls_dtls_desc').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_by_id",
				"mat_pkid"	: $('#id_mtls_dtls_desc').val()
			}
			data = $.param(data);
			// alert(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_mtls_dtls_pkid').val(result['mat_pkid']);
					$('#id_mtls_dtls_specs').val(result['mat_product_specs']);
					$('#id_mtls_dtls_uom').val(result['mat_uom']);
					
				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
		} else {
			
			$('#id_mtls_dtls_pkid').val('');
			$('#id_mtls_dtls_specs').val('');
			$('#id_mtls_dtls_uom').val('');
			
		}
	});
	
	$('#id_mtls_dtls_dollor, #id_mtls_dtls_exc, #id_mtls_dtls_peso').on('input',function() { 
		var mtls_dtls_dollor 	= $('#id_mtls_dtls_dollor').val();
		var mtls_dtls_exc 		= $('#id_mtls_dtls_exc').val();
		
		if ( $('#id_mtls_dtls_dollor').val() == '0' || $('#id_mtls_dtls_exc').val() == '0' ){
			
			$('#id_mtls_dtls_peso').val();
			
		}else {
			
			var mtls_dtls_peso = ( parseFloat(mtls_dtls_dollor) * parseFloat(mtls_dtls_exc) );
			// $('#id_mtls_dtls_peso').val((mtls_dtls_peso).toFixed(6));
			$('#id_mtls_dtls_peso').val((mtls_dtls_peso).toFixed(8));
			
		}
			
	});
	
	$('#id_umtls_dtls_dollor, #id_umtls_dtls_exc, #id_umtls_dtls_peso').on('input',function() { 
		var umtls_dtls_dollor 	= $('#id_umtls_dtls_dollor').val();
		var umtls_dtls_exc 		= $('#id_umtls_dtls_exc').val();
		
		if ( $('#id_umtls_dtls_dollor').val() == '0' || $('#id_umtls_dtls_exc').val() == '0' ){
			
			$('#id_umtls_dtls_peso').val();
			
		}else {
			
			var umtls_dtls_peso = ( parseFloat(umtls_dtls_dollor) * parseFloat(umtls_dtls_exc) );
			// $('#id_umtls_dtls_peso').val((umtls_dtls_peso).toFixed(6));
			$('#id_umtls_dtls_peso').val((umtls_dtls_peso).toFixed(8));
			
		}
			
	});
	
	/* TS */
	$('#id_mtls_dtls_desc_TS').change(function () {
		
		if($('#id_mtls_dtls_desc_TS').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_by_price",
				"mp_pkid"	: $('#id_mtls_dtls_desc_TS').val()
			}
			data = $.param(data);
			// alert(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					console.log(result);
					
					$('#id_mtls_dtls_pkid_TS').val(result['mp_pkid']);
					$('#id_mtls_dtls_specs_TS').val(result['mat_product_specs']);
					$('#id_mtls_dtls_uom_TS').val(result['mat_uom']);
					
					$('#id_mtls_dtls_dollor_TS').val(result['mp_unit_price_dollor']);
					$('#id_mtls_dtls_exc_TS').val(result['mp_exchange_rate']);
					$('#id_mtls_dtls_peso_TS').val(result['mp_unit_price_peso']);
					
				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
		} else {
			
			$('#id_mtls_dtls_pkid_TS').val('');
			$('#id_mtls_dtls_specs_TS').val('');
			$('#id_mtls_dtls_uom_TS').val('');
			
			$('#id_mtls_dtls_dollor_TS').val('');
			$('#id_mtls_dtls_exc_TS').val('');
			$('#id_mtls_dtls_peso_TS').val('');
			
		}
	});
	
	$('#id_mtls_dtls_dollor_TS, #id_mtls_dtls_exc_TS, #id_mtls_dtls_peso_TS').on('input',function() { 
		var mtls_dtls_dollor_TS 	= $('#id_mtls_dtls_dollor_TS').val();
		var mtls_dtls_exc_TS 		= $('#id_mtls_dtls_exc_TS').val();
		
		if ( $('#id_mtls_dtls_dollor_TS').val() == '0' || $('#id_mtls_dtls_exc_TS').val() == '0' ){
			
			$('#id_mtls_dtls_peso_TS').val();
			
		}else {
			
			var mtls_dtls_peso_TS = ( parseFloat(mtls_dtls_dollor_TS) * parseFloat(mtls_dtls_exc_TS) );
			$('#id_mtls_dtls_peso_TS').val((mtls_dtls_peso_TS).toFixed(4));
			
		}
			
	});
	
	$('#id_umtls_dtls_dollor_TS, #id_umtls_dtls_exc_TS, #id_umtls_dtls_peso_TS').on('input',function() { 
		var umtls_dtls_dollor_TS 	= $('#id_umtls_dtls_dollor_TS').val();
		var umtls_dtls_exc_TS 		= $('#id_umtls_dtls_exc_TS').val();
		
		if ( $('#id_umtls_dtls_dollor_TS').val() == '0' || $('#id_umtls_dtls_exc_TS').val() == '0' ){
			
			$('#id_umtls_dtls_peso_TS').val();
			
		}else {
			
			var umtls_dtls_peso_TS = ( parseFloat(umtls_dtls_dollor_TS) * parseFloat(umtls_dtls_exc_TS) );
			$('#id_umtls_dtls_peso_TS').val((umtls_dtls_peso_TS).toFixed(4));
			
		}
			
	});
	
	$('#id_ts_rcv_prod_desc').change(function () {
		
		if($('#id_ts_rcv_prod_desc').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_info_by_id",
				"mp_pkid"	: $('#id_ts_rcv_prod_desc').val()
			}
			data = $.param(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_ts_rcv_pkid').val(result['mp_pkid']);
					$('#id_ts_rcv_prod_specs').val(result['mat_product_specs']);
					$('#id_ts_rcv_uom').val(result['mat_uom']);
					
					$('#id_ts_rcv_unit_dollor').val(result['mp_unit_price_dollor']);
					$('#id_ts_rcv_exchange_rate').val(result['mp_exchange_rate']);
					$('#id_ts_rcv_unit_peso').val(result['mp_unit_price_peso']);
					
				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
			
		} else {
			
			$('#id_ts_rcv_pkid').val('');
			$('#id_ts_rcv_prod_specs').val('');
			$('#id_ts_rcv_uom').val('');
			
			$('#id_ts_rcv_unit_dollor').val('');
			$('#id_ts_rcv_exchange_rate').val('');
			$('#id_ts_rcv_unit_peso').val('');
			
		}
	});
	
	$('#id_ts_transf_prod_desc').change(function () {
		
		if($('#id_ts_transf_prod_desc').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_priceTS_by_id",
				"mp_pkid"	: $('#id_ts_transf_prod_desc').val()
			}
			data = $.param(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_ts_transf_pkid').val(result['mp_pkid']);
					$('#id_ts_transf_prod_specs').val(result['mat_product_specs']);
					$('#id_ts_transf_uom').val(result['mat_uom']);
					
					$('#id_ts_transf_unit_dollor').val(result['mp_unit_price_dollor']);
					$('#id_ts_transf_exchange_rate').val(result['mp_exchange_rate']);
					$('#id_ts_transf_unit_peso').val(result['mp_unit_price_peso']);
					$('#id_ts_transf_current_stock').val(result['ts_current_stock']);

				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
			
		} else {
			
			$('#id_ts_rcv_pkid').val('');
			$('#id_ts_rcv_prod_specs').val('');
			$('#id_ts_rcv_uom').val('');
			
			$('#id_ts_rcv_unit_dollor').val('');
			$('#id_ts_rcv_exchange_rate').val('');
			$('#id_ts_rcv_unit_peso').val('');
			
		}
	});
	
	$('#id_form_ts_rcv').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_rcv_TS(serialData);
		
	}); 
	
	function add_rcv_TS(serialData){
	
		var data = {
			'action'	: 'add_rcv_TS'
		}
		
		data = $.param(data) + "&" + serialData;
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				window.location.reload();
				// notif_add_success();
				display_mtls_dtls_TS();
				// $('#id_ts_rcv_modal_show').modal('hide');
				
				$('#id_ts_rcv_prod_desc').val('');
				$('#id_ts_rcv_pkid').val('');
				$('#id_ts_rcv_unit_dollor').val('');
				$('#id_ts_rcv_qty').val('');
				$('#id_ts_supp_name').val('');
				$('#id_ts_rcv_prod_specs').val('');
				$('#id_ts_rcv_exchange_rate').val('');
				$('#id_ts_rcv_inv_no').val('');
				$('#id_ts_rcv_uom').val('');
				$('#id_ts_rcv_unit_peso').val('');
				$('#id_ts_rcv_remarks').val('');

			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}
	
	$('#id_form_ts_transf').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_transf_TS(serialData);
		
	}); 
	
	function add_transf_TS(serialData){
	
		var data = {
			'action'	: 'add_transf_TS'
		}
		
		data = $.param(data) + "&" + serialData;
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				if ( data['msg'] == 'higher than current' ) {
						
					notif_higher_than_stock();
						
				} else {
					
					if ( data['msg1'] == 'no transaction type' ){
					
						notif_no_transaction_type();
						
					} else{
						
						window.location.reload();
						display_mtls_dtls_TS();
						
						$('#id_ts_transf_prod_desc').val('');
						$('#id_ts_transf_pkid').val('');
						$('#id_ts_transf_unit_dollor').val('');
						$('#id_ts_transf_current_stock').val('');
						$('#id_ts_transaction_type').val('');
						$('#id_ts_transf_prod_specs').val('');
						$('#id_ts_transf_exchange_rate').val('');
						$('#id_ts_transf_qty').val('');
						$('#id_ts_transaction_dept').val('');
						$('#id_ts_transf_uom').val('');
						$('#id_ts_transf_unit_peso').val('');
						$('#id_ts_transf_remarks').val('');
						
					}
				}
					
				
			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}
	
	$("#id_ts_transaction_type").change(function() {
		
		var trans_type = $('#id_ts_transaction_type').val();
		
		if ( trans_type == "1") {
			
			$("#id_ts_transaction_dept").prop("disabled", false);
			$("#id_ts_transaction_dept").val('');
		} else{
			$("#id_ts_transaction_dept").val('N/A');
		}
		
	});
				
	/* PPS */
	$('#id_mtls_dtls_desc_PPS').change(function () {
		
		if($('#id_mtls_dtls_desc_PPS').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_by_price",
				"mp_pkid"	: $('#id_mtls_dtls_desc_PPS').val()
			}
			data = $.param(data);
			// alert(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_mtls_dtls_pkid_PPS').val(result['mp_pkid']);
					$('#id_mtls_dtls_specs_PPS').val(result['mat_product_specs']);
					$('#id_mtls_dtls_uom_PPS').val(result['mat_uom']);
					
					$('#id_mtls_dtls_dollor_PPS').val(result['mp_unit_price_dollor']);
					$('#id_mtls_dtls_exc_PPS').val(result['mp_exchange_rate']);
					$('#id_mtls_dtls_peso_PPS').val(result['mp_unit_price_peso']);

					
				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
		} else {
			
			$('#id_mtls_dtls_pkid_PPS').val('');
			$('#id_mtls_dtls_specs_PPS').val('');
			$('#id_mtls_dtls_uom_PPS').val('');
			
			$('#id_mtls_dtls_dollor_PPS').val('');
			$('#id_mtls_dtls_exc_PPS').val('');
			$('#id_mtls_dtls_peso_PPS').val('');
			
		}
	});
	
	$('#id_mtls_dtls_dollor_PPS, #id_mtls_dtls_exc_PPS, #id_mtls_dtls_peso_PPS').on('input',function() { 
		var mtls_dtls_dollor_PPS 	= $('#id_mtls_dtls_dollor_PPS').val();
		var mtls_dtls_exc_PPS 		= $('#id_mtls_dtls_exc_PPS').val();
		
		if ( $('#id_mtls_dtls_dollor_PPS').val() == '0' || $('#id_mtls_dtls_exc_PPS').val() == '0' ){
			
			$('#id_mtls_dtls_peso_PPS').val();
			
		}else {
			
			var mtls_dtls_peso_PPS = ( parseFloat(mtls_dtls_dollor_PPS) * parseFloat(mtls_dtls_exc_PPS) );
			$('#id_mtls_dtls_peso_PPS').val((mtls_dtls_peso_PPS).toFixed(4));
			
		}
			
	});
	
	$('#id_umtls_dtls_dollor_PPS, #id_umtls_dtls_exc_PPS, #id_umtls_dtls_peso_PPS').on('input',function() { 
		var umtls_dtls_dollor_PPS 	= $('#id_umtls_dtls_dollor_PPS').val();
		var umtls_dtls_exc_PPS 		= $('#id_umtls_dtls_exc_PPS').val();
		
		if ( $('#id_umtls_dtls_dollor_PPS').val() == '0' || $('#id_umtls_dtls_exc_PPS').val() == '0' ){
			
			$('#id_umtls_dtls_peso_PPS').val();
			
		}else {
			
			var umtls_dtls_peso_PPS = ( parseFloat(umtls_dtls_dollor_PPS) * parseFloat(umtls_dtls_exc_PPS) );
			$('#id_umtls_dtls_peso_PPS').val((umtls_dtls_peso_PPS).toFixed(4));
			
		}
			
	});
	
	$('#id_pps_rcv_prod_desc').change(function () {
		
		if($('#id_pps_rcv_prod_desc').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_info_by_id",
				"mp_pkid"	: $('#id_pps_rcv_prod_desc').val()
			}
			data = $.param(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_pps_rcv_pkid').val(result['mp_pkid']);
					$('#id_pps_rcv_prod_specs').val(result['mat_product_specs']);
					$('#id_pps_rcv_uom').val(result['mat_uom']);
					
					$('#id_pps_rcv_unit_dollor').val(result['mp_unit_price_dollor']);
					$('#id_pps_rcv_exchange_rate').val(result['mp_exchange_rate']);
					$('#id_pps_rcv_unit_peso').val(result['mp_unit_price_peso']);
					
				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
			
		} else {
			
			$('#id_pps_rcv_pkid').val('');
			$('#id_pps_rcv_prod_specs').val('');
			$('#id_pps_rcv_uom').val('');
			
			$('#id_pps_rcv_unit_dollor').val('');
			$('#id_pps_rcv_exchange_rate').val('');
			$('#id_pps_rcv_unit_peso').val('');
			
		}
	});
	
	$('#id_pps_transf_prod_desc').change(function () {
		
		if($('#id_pps_transf_prod_desc').val() != 0) {
						
			var data = {
				"action"	: "select_item_list_pricePPS_by_id",
				"mp_pkid"	: $('#id_pps_transf_prod_desc').val()
			}
			data = $.param(data);
			// alert(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_pps_transf_pkid').val(result['mp_pkid']);
					$('#id_pps_transf_prod_specs').val(result['mat_product_specs']);
					$('#id_pps_transf_uom').val(result['mat_uom']);
					
					$('#id_pps_transf_unit_dollor').val(result['mp_unit_price_dollor']);
					$('#id_pps_transf_exchange_rate').val(result['mp_exchange_rate']);
					$('#id_pps_transf_unit_peso').val(result['mp_unit_price_peso']);
					$('#id_pps_transf_current_stock').val(result['pps_current_stock']);

				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
			
		} else {
			
			$('#id_pps_rcv_pkid').val('');
			$('#id_pps_rcv_prod_specs').val('');
			$('#id_pps_rcv_uom').val('');
			
			$('#id_pps_rcv_unit_dollor').val('');
			$('#id_pps_rcv_exchange_rate').val('');
			$('#id_pps_rcv_unit_peso').val('');
			$('#id_pps_transf_current_stock').val('');
			
		}
	});
	
	$('#id_form_pps_rcv').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_rcv_PPS(serialData);
		
	}); 
	
	function add_rcv_PPS(serialData){
	
		var data = {
			'action'	: 'add_rcv_PPS'
		}
		
		data = $.param(data) + "&" + serialData;
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				window.location.reload();
				// notif_add_success();
				display_mtls_dtls_PPS();
				// $('#id_pps_rcv_modal_show').modal('hide');
				
				$('#id_pps_rcv_prod_desc').val('');
				$('#id_pps_rcv_pkid').val('');
				$('#id_pps_rcv_unit_dollor').val('');
				$('#id_pps_rcv_qty').val('');
				$('#id_pps_supp_name').val('');
				$('#id_pps_rcv_prod_specs').val('');
				$('#id_pps_rcv_exchange_rate').val('');
				$('#id_pps_rcv_inv_no').val('');
				$('#id_pps_rcv_uom').val('');
				$('#id_pps_rcv_unit_peso').val('');
				$('#id_pps_rcv_remarks').val('');
			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}
	
	$('#id_form_pps_transf').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_transf_PPS(serialData);
		
	}); 
	
	function add_transf_PPS(serialData){
	
		var data = {
			'action'	: 'add_transf_PPS'
		}
		
		data = $.param(data) + "&" + serialData;
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				
				if ( data['msg'] == 'higher than current' ) {
						
					notif_higher_than_stock();
						
				} else {
					
					if ( data['msg1'] == 'no transaction type' ){
					
						notif_no_transaction_type();
						
					} else{
						
						window.location.reload();
						// notif_add_success();
						display_mtls_dtls_PPS();
						// $('#id_pps_transf_modal_show').modal('hide');

						$('#id_pps_transf_prod_desc').val('');
						$('#id_pps_transf_pkid').val('');
						$('#id_pps_transf_unit_dollor').val('');
						$('#id_pps_transf_current_stock').val('');
						$('#id_pps_transaction_type').val('');
						$('#id_pps_transf_prod_specs').val('');
						$('#id_pps_transf_exchange_rate').val('');
						$('#id_pps_transf_qty').val('');
						$('#id_pps_transaction_dept').val('');
						$('#id_pps_transf_uom').val('');
						$('#id_pps_transf_unit_peso').val('');
						$('#id_pps_transf_remarks').val('');
						
					}
				}
				
				
				
			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}
	
	$("#id_pps_transaction_type").change(function() {
		
		var trans_type = $('#id_pps_transaction_type').val();
		
		if ( trans_type == "1") {
			
			$("#id_pps_transaction_dept").prop("disabled", false);
			$("#id_pps_transaction_dept").val('');
		} else{
			$("#id_pps_transaction_dept").val('N/A');
		}
		
	});
	
	/* CN */
	$('#id_mtls_dtls_desc_CN').change(function () {
		
		if($('#id_mtls_dtls_desc_CN').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_by_price",
				"mp_pkid"	: $('#id_mtls_dtls_desc_CN').val()
			}
			data = $.param(data);
			// alert(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_mtls_dtls_pkid_CN').val(result['mp_pkid']);
					$('#id_mtls_dtls_specs_CN').val(result['mat_product_specs']);
					$('#id_mtls_dtls_uom_CN').val(result['mat_uom']);
					
					$('#id_mtls_dtls_dollor_CN').val(result['mp_unit_price_dollor']);
					$('#id_mtls_dtls_exc_CN').val(result['mp_exchange_rate']);
					$('#id_mtls_dtls_peso_CN').val(result['mp_unit_price_peso']);

				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
		} else {
			
			$('#id_mtls_dtls_pkid_CN').val('');
			$('#id_mtls_dtls_specs_CN').val('');
			$('#id_mtls_dtls_uom_CN').val('');
			
			$('#id_mtls_dtls_dollor_CN').val('');
			$('#id_mtls_dtls_exc_CN').val('');
			$('#id_mtls_dtls_peso_CN').val('');
			
		}
	});
	
	$('#id_mtls_dtls_dollor_CN, #id_mtls_dtls_exc_CN, #id_mtls_dtls_peso_CN').on('input',function() { 
		var mtls_dtls_dollor_CN 	= $('#id_mtls_dtls_dollor_CN').val();
		var mtls_dtls_exc_CN		= $('#id_mtls_dtls_exc_CN').val();
		
		if ( $('#id_mtls_dtls_dollor_CN').val() == '0' || $('#id_mtls_dtls_exc_CN').val() == '0' ){
			
			$('#id_mtls_dtls_peso_CN').val();
			
		}else {
			
			var mtls_dtls_peso_CN = ( parseFloat(mtls_dtls_dollor_CN) * parseFloat(mtls_dtls_exc_CN) );
			$('#id_mtls_dtls_peso_CN').val((mtls_dtls_peso_CN).toFixed(4));
			
		}
			
	});
	
	$('#id_umtls_dtls_dollor_CN, #id_umtls_dtls_exc_CN #id_umtls_dtls_peso_CN').on('input',function() { 
		var umtls_dtls_dollor_CN	= $('#id_umtls_dtls_dollor_CN').val();
		var umtls_dtls_exc_CN 		= $('#id_umtls_dtls_exc_CN').val();
		
		if ( $('#id_umtls_dtls_dollor_CN').val() == '0' || $('#id_umtls_dtls_exc_CN').val() == '0' ){
			
			$('#id_umtls_dtls_peso_CN').val();
			
		}else {
			
			var umtls_dtls_peso_CN = ( parseFloat(umtls_dtls_dollor_CN) * parseFloat(umtls_dtls_exc_CN) );
			$('#id_umtls_dtls_peso_CN').val((umtls_dtls_peso_CN).toFixed(4));
			
		}
			
	});
	
	$('#id_cn_rcv_prod_desc').change(function () {
		
		if($('#id_cn_rcv_prod_desc').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_info_by_id",
				"mp_pkid"	: $('#id_cn_rcv_prod_desc').val()
			}
			data = $.param(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_cn_rcv_pkid').val(result['mp_pkid']);
					$('#id_cn_rcv_prod_specs').val(result['mat_product_specs']);
					$('#id_cn_rcv_uom').val(result['mat_uom']);
					
					$('#id_cn_rcv_unit_dollor').val(result['mp_unit_price_dollor']);
					$('#id_cn_rcv_exchange_rate').val(result['mp_exchange_rate']);
					$('#id_cn_rcv_unit_peso').val(result['mp_unit_price_peso']);
					
				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
			
		} else {
			
			$('#id_cn_rcv_pkid').val('');
			$('#id_cn_rcv_prod_specs').val('');
			$('#id_cn_rcv_uom').val('');
			
			$('#id_cn_rcv_unit_dollor').val('');
			$('#id_cn_rcv_exchange_rate').val('');
			$('#id_cn_rcv_unit_peso').val('');
			
		}
	});
	
	$('#id_cn_transf_prod_desc').change(function () {
		
		if($('#id_cn_transf_prod_desc').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_priceCN_by_id",
				"mp_pkid"	: $('#id_cn_transf_prod_desc').val()
			}
			data = $.param(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_cn_transf_pkid').val(result['mp_pkid']);
					$('#id_cn_transf_prod_specs').val(result['mat_product_specs']);
					$('#id_cn_transf_uom').val(result['mat_uom']);
					
					$('#id_cn_transf_unit_dollor').val(result['mp_unit_price_dollor']);
					$('#id_cn_transf_exchange_rate').val(result['mp_exchange_rate']);
					$('#id_cn_transf_unit_peso').val(result['mp_unit_price_peso']);
					$('#id_cn_transf_current_stock').val(result['cn_current_stock']);
					
				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
			
		} else {
			
			$('#id_cn_rcv_pkid').val('');
			$('#id_cn_rcv_prod_specs').val('');
			$('#id_cn_rcv_uom').val('');
			
			$('#id_cn_rcv_unit_dollor').val('');
			$('#id_cn_rcv_exchange_rate').val('');
			$('#id_cn_rcv_unit_peso').val('');
			$('#id_cn_transf_current_stock').val('');
			
		}
	});
	
	$('#id_form_cn_rcv').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_rcv_CN(serialData);
		
	}); 
	
	function add_rcv_CN(serialData){
	
		var data = {
			'action'	: 'add_rcv_CN'
		}
		
		data = $.param(data) + "&" + serialData;
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				window.location.reload();
				// notif_add_success();
				display_mtls_dtls_CN();
				// $('#id_cn_rcv_modal_show').modal('hide');

				$('#id_cn_rcv_prod_desc').val('');
				$('#id_cn_rcv_pkid').val('');
				$('#id_cn_rcv_unit_dollor').val('');
				$('#id_cn_rcv_qty').val('');
				$('#id_cn_supp_name').val('');
				$('#id_cn_rcv_prod_specs').val('');
				$('#id_cn_rcv_exchange_rate').val('');
				$('#id_cn_rcv_inv_no').val('');
				$('#id_cn_rcv_uom').val('');
				$('#id_cn_rcv_unit_peso').val('');
				$('#id_cn_rcv_remarks').val('');
				
			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}
	
	$('#id_form_cn_transf').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_transf_CN(serialData);
		
	}); 
	
	function add_transf_CN(serialData){
	
		var data = {
			'action'	: 'add_transf_CN'
		}
		
		data = $.param(data) + "&" + serialData;
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				if ( data['msg'] == 'higher than current' ) {
						
					notif_higher_than_stock();
						
				} else {
					
					if ( data['msg1'] == 'no transaction type' ){
					
						notif_no_transaction_type();
						
					} else{
						
						window.location.reload();
						// notif_add_success();
						display_mtls_dtls_CN();
						// $('#id_cn_transf_modal_show').modal('hide');

						$('#id_cn_transf_prod_desc').val('');
						$('#id_cn_transf_pkid').val('');
						$('#id_cn_transf_unit_dollor').val('');
						$('#id_cn_transf_current_stock').val('');
						$('#id_cn_transaction_type').val('');
						$('#id_cn_transf_prod_specs').val('');
						$('#id_cn_transf_exchange_rate').val('');
						$('#id_cn_transf_qty').val('');
						$('#id_cn_transaction_dept').val('');
						$('#id_cn_transf_uom').val('');
						$('#id_cn_transf_unit_peso').val('');
						$('#id_cn_transf_remarks').val('');
						
					}
				}
				
			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}
	
	$("#id_cn_transaction_type").change(function() {
		
		var trans_type = $('#id_cn_transaction_type').val();
		
		if ( trans_type == "1") {
			
			$("#id_cn_transaction_dept").prop("disabled", false);
			$("#id_cn_transaction_dept").val('');
		} else{
			$("#id_cn_transaction_dept").val('N/A');
		}
		
	});
	
	/* YF */
	$('#id_mtls_dtls_desc_YF').change(function () {
		
		if($('#id_mtls_dtls_desc_YF').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_by_price",
				"mp_pkid"	: $('#id_mtls_dtls_desc_YF').val()
			}
			data = $.param(data);
			// alert(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_mtls_dtls_pkid_YF').val(result['mp_pkid']);
					$('#id_mtls_dtls_specs_YF').val(result['mat_product_specs']);
					$('#id_mtls_dtls_uom_YF').val(result['mat_uom']);
					
					$('#id_mtls_dtls_dollor_YF').val(result['mp_unit_price_dollor']);
					$('#id_mtls_dtls_exc_YF').val(result['mp_exchange_rate']);
					$('#id_mtls_dtls_peso_YF').val(result['mp_unit_price_peso']);

				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
		} else {
			
			$('#id_mtls_dtls_pkid_YF').val('');
			$('#id_mtls_dtls_specs_YF').val('');
			$('#id_mtls_dtls_uom_YF').val('');
			
			$('#id_mtls_dtls_dollor_YF').val('');
			$('#id_mtls_dtls_exc_YF').val('');
			$('#id_mtls_dtls_peso_YF').val('');

		}
	});
	
	$('#id_mtls_dtls_dollor_YF, #id_mtls_dtls_exc_YF, #id_mtls_dtls_peso_YF').on('input',function() { 
		var mtls_dtls_dollor_YF 	= $('#id_mtls_dtls_dollor_YF').val();
		var mtls_dtls_exc_YF		= $('#id_mtls_dtls_exc_YF').val();
		
		if ( $('#id_mtls_dtls_dollor_YF').val() == '0' || $('#id_mtls_dtls_exc_YF').val() == '0' ){
			
			$('#id_mtls_dtls_peso_YF').val();
			
		}else {
			
			var mtls_dtls_peso_YF = ( parseFloat(mtls_dtls_dollor_YF) * parseFloat(mtls_dtls_exc_YF) );
			$('#id_mtls_dtls_peso_YF').val((mtls_dtls_peso_YF).toFixed(4));
			
		}
			
	});
	
	$('#id_umtls_dtls_dollor_YF, #id_umtls_dtls_exc_YF #id_umtls_dtls_peso_YF').on('input',function() { 
		var umtls_dtls_dollor_YF	= $('#id_umtls_dtls_dollor_YF').val();
		var umtls_dtls_exc_YF 		= $('#id_umtls_dtls_exc_YF').val();
		
		if ( $('#id_umtls_dtls_dollor_YF').val() == '0' || $('#id_umtls_dtls_exc_YF').val() == '0' ){
			
			$('#id_umtls_dtls_peso_YF').val();
			
		}else {
			
			var umtls_dtls_peso_YF = ( parseFloat(umtls_dtls_dollor_YF) * parseFloat(umtls_dtls_exc_YF) );
			$('#id_umtls_dtls_peso_YF').val((umtls_dtls_peso_YF).toFixed(4));
			
		}
			
	});
	
	$('#id_yf_rcv_prod_desc').change(function () {
		
		if($('#id_yf_rcv_prod_desc').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_info_by_id",
				"mp_pkid"	: $('#id_yf_rcv_prod_desc').val()
			}
			data = $.param(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_yf_rcv_pkid').val(result['mp_pkid']);
					$('#id_yf_rcv_prod_specs').val(result['mat_product_specs']);
					$('#id_yf_rcv_uom').val(result['mat_uom']);
					
					$('#id_yf_rcv_unit_dollor').val(result['mp_unit_price_dollor']);
					$('#id_yf_rcv_exchange_rate').val(result['mp_exchange_rate']);
					$('#id_yf_rcv_unit_peso').val(result['mp_unit_price_peso']);
					
				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
			
		} else {
			
			$('#id_yf_rcv_pkid').val('');
			$('#id_yf_rcv_prod_specs').val('');
			$('#id_yf_rcv_uom').val('');
			
			$('#id_yf_rcv_unit_dollor').val('');
			$('#id_yf_rcv_exchange_rate').val('');
			$('#id_yf_rcv_unit_peso').val('');
			
		}
	});
	
	$('#id_yf_transf_prod_desc').change(function () {
		
		if($('#id_yf_transf_prod_desc').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_priceYF_by_id",
				"mp_pkid"	: $('#id_yf_transf_prod_desc').val()
			}
			data = $.param(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_yf_transf_pkid').val(result['mp_pkid']);
					$('#id_yf_transf_prod_specs').val(result['mat_product_specs']);
					$('#id_yf_transf_uom').val(result['mat_uom']);
					
					$('#id_yf_transf_unit_dollor').val(result['mp_unit_price_dollor']);
					$('#id_yf_transf_exchange_rate').val(result['mp_exchange_rate']);
					$('#id_yf_transf_unit_peso').val(result['mp_unit_price_peso']);
					$('#id_yf_transf_current_stock').val(result['yf_current_stock']);
					
				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
			
		} else {
			
			$('#id_yf_rcv_pkid').val('');
			$('#id_yf_rcv_prod_specs').val('');
			$('#id_yf_rcv_uom').val('');
			
			$('#id_yf_rcv_unit_dollor').val('');
			$('#id_yf_rcv_exchange_rate').val('');
			$('#id_yf_rcv_unit_peso').val('');
			$('#id_yf_transf_current_stock').val('');
			
		}
	});
	
	$('#id_form_yf_rcv').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_rcv_YF(serialData);
		
	}); 
	
	function add_rcv_YF(serialData){
	
		var data = {
			'action'	: 'add_rcv_YF'
		}
		
		data = $.param(data) + "&" + serialData;
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				window.location.reload();
				// notif_add_success();
				display_mtls_dtls_YF();
				// $('#id_yf_rcv_modal_show').modal('hide');

				$('#id_yf_rcv_prod_desc').val('');
				$('#id_yf_rcv_pkid').val('');
				$('#id_yf_rcv_unit_dollor').val('');
				$('#id_yf_rcv_qty').val('');
				$('#id_yf_supp_name').val('');
				$('#id_yf_rcv_prod_specs').val('');
				$('#id_yf_rcv_exchange_rate').val('');
				$('#id_yf_rcv_inv_no').val('');
				$('#id_yf_rcv_uom').val('');
				$('#id_yf_rcv_unit_peso').val('');
				$('#id_yf_rcv_remarks').val('');
				
			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}
	
	$('#id_form_yf_transf').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		add_transf_YF(serialData);
		
	}); 
	
	function add_transf_YF(serialData){
	
		var data = {
			'action'	: 'add_transf_YF'
		}
		
		data = $.param(data) + "&" + serialData;
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(data){
				console.log(data);	
				
				if ( data['msg'] == 'higher than current' ) {
						
					notif_higher_than_stock();
						
				} else {
					
					if ( data['msg1'] == 'no transaction type' ){
					
						notif_no_transaction_type();
						
					} else{
						
						window.location.reload();
						// notif_add_success();
						display_mtls_dtls_YF();
						// $('#id_yf_transf_modal_show').modal('hide');

						$('#id_yf_transf_prod_desc').val('');
						$('#id_yf_transf_pkid').val('');
						$('#id_yf_transf_unit_dollor').val('');
						$('#id_yf_transf_current_stock').val('');
						$('#id_yf_transaction_type').val('');
						$('#id_yf_transf_prod_specs').val('');
						$('#id_yf_transf_exchange_rate').val('');
						$('#id_yf_transf_qty').val('');
						$('#id_yf_transaction_dept').val('');
						$('#id_yf_transf_uom').val('');
						$('#id_yf_transf_unit_peso').val('');
						$('#id_yf_transf_remarks').val('');
						
					}
				}
				
			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
						
	}
	
	$("#id_yf_transaction_type").change(function() {
		
		var trans_type = $('#id_yf_transaction_type').val();
		
		if ( trans_type == "1") {
			
			$("#id_yf_transaction_dept").prop("disabled", false);
			$("#id_yf_transaction_dept").val('');
		} else{
			$("#id_yf_transaction_dept").val('N/A');
		}
		
	});
	
	/* Overall */
	display_mtls_dtls_overall();
	function display_mtls_dtls_overall(){
		
		var data = {
			'action'		: 'display_mtls_dtls_overall'
		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				
				var ctr = data['ctr'];
				
				$('#display_mtls_dtls_overall').empty();
				
				var content  = '<table id="tbl_mtls_dtls_overall" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th>ID</th>';
					content += '			<th>Product Description</th>';
					content += '			<th>Specification</th>';
					content += '			<th>UOM</th>';
					content += '			<th>Unit price in $</th>';
					content += '			<th>Exchange Rate</th>';
					content += '			<th>Unit price in Php</th>';
					content += '			<th>EOH Qty</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_mtls_dtls_overall').append(content);
				
				for(i=0;i<ctr;i++){
				
				var values  = '<tr align="center" id='+data['mp_pkid'][i]+'>';
					values += '		<td>'+data['mp_pkid'][i]+'</td>';
					
					values += '		<td>'+data['mat_product_desc'][i]+'</td>';
					values += '		<td>'+data['mat_product_specs'][i]+'</td>';
					values += '		<td>'+data['mat_uom'][i]+'</td>';
					
					values += '		<td>'+data['mp_unit_price_dollor'][i]+'</td>';
					values += '		<td>'+data['mp_exchange_rate'][i]+'</td>';
					values += '		<td>'+data['mp_unit_price_peso'][i]+'</td>';
					
					values += '		<td><font color="green"><b>'+data['ttl_current_stock'][i]+'</font></b></td>';
					values += '</tr>';
					
					$('#tbl_mtls_dtls_overall tbody').append(values);
				}
						
				$('#tbl_mtls_dtls_overall').DataTable({ 
					paginate: true, 
					aaSorting: [],
				});
					 				
			},
			error	: function(data){
				console.log(data);
			}
		});
		
	}
	
	/* Other functions */
	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
	
	function ReplaceNumberWithCommas(NumberWithCommas) {
		var n= NumberWithCommas.toString().split(".");
		n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		return n.join(".");
	}

	/* Withdrawal Report */
	function exportToExcelReport() {
		var expVal 			= $('#drp_dept_report').val();
		var startDate 		= $("#tbox_startDate").val();
		var endDate 		= $("#tbox_endDate").val();
		var requestor 		= $("#id_requestor").val();
				
		if( startDate == '' || endDate == '' || requestor == '' || expVal == '' ) {
			alert("Please check all required fields.");
		
		} else {
			if(expVal == "0"){
				alert("0");
			}
			if(expVal == "1"){
				window.location.href = "reports/TS_withdrawal.php?startDate="+startDate+"&endDate="+endDate+"&requestor="+requestor;
			}
			if(expVal == "2"){
				window.location.href = "reports/PPS_withdrawal.php?startDate="+startDate+"&endDate="+endDate+"&requestor="+requestor;
			}
			if(expVal == "3"){
				window.location.href = "reports/CN_withdrawal.php?startDate="+startDate+"&endDate="+endDate+"&requestor="+requestor;
			}
			if(expVal == "4"){
				window.location.href = "reports/YF_withdrawal.php?startDate="+startDate+"&endDate="+endDate+"&requestor="+requestor;
			}
			if(expVal == "5"){
				window.location.href = "reports/overall_withdrawal.php?startDate="+startDate+"&endDate="+endDate+"&requestor="+requestor;
			}
		}
	}
	
	/* Inventory Report */
	function exportToExcelReport_inventory() {
		var expVal_inv 		= $('#drp_report_inv').val();
		var startDate_inv 	= $("#tbox_startDate_inv").val();
		var endDate_inv		= $("#tbox_endDate_inv").val();
		var drp_remarks		= $("#id_drp_remarks").val();
		
		// alert(	startDate_inv );
		// alert(	endDate_inv );
		
		if( startDate_inv == '' || endDate_inv == '' || expVal_inv == '' || drp_remarks == '') {
			alert("Please check all required fields.");
		
		} else {
			if(expVal_inv == "0"){
				alert("Please select report to export");
			}
			if(expVal_inv == "1"){
				window.location.href = "reports/qty_report.php?startDate_inv="+startDate_inv+"&endDate_inv="+endDate_inv+"&drp_remarks="+encodeURIComponent(drp_remarks);
			}
			if(expVal_inv == "2"){
				window.location.href = "reports/amount_report.php?startDate_inv="+startDate_inv+"&endDate_inv="+endDate_inv+"&drp_remarks="+encodeURIComponent(drp_remarks);
			}
			if(expVal_inv == "3"){
				window.location.href = "reports/pps_qty_report.php?startDate_inv="+startDate_inv+"&endDate_inv="+endDate_inv+"&drp_remarks="+encodeURIComponent(drp_remarks);
			}
			if(expVal_inv == "4"){
				window.location.href = "reports/pps_amount_report.php?startDate_inv="+startDate_inv+"&endDate_inv="+endDate_inv+"&drp_remarks="+encodeURIComponent(drp_remarks);
			}
			if(expVal_inv == "5"){
				window.location.href = "reports/pps_inventory_report.php?startDate_inv="+startDate_inv+"&endDate_inv="+endDate_inv+"&drp_remarks="+encodeURIComponent(drp_remarks);
				// window.location.href = "reports/pps_inventory_report_old.php?startDate_inv="+startDate_inv+"&endDate_inv="+endDate_inv+"&drp_remarks="+encodeURIComponent(drp_remarks);
			}
		}
	}	

	/* notif */
	function notif_add_success(){
		notif({
		msg: "<strong>System: </strong> Successfully Added!",
		type: "success",
		position: "center",
		timeout: "3000"	
		});	
	}
	
	function notif_success_update(){
		notif({
		msg: "<strong>System: </strong> Successfully Updated!",
		type: "success",
		position: "center",
		timeout: "3000"
		});
	}
	
	function notif_success_removed(){
		notif({
		msg: "<strong>System: </strong> Successfully Removed!",
		type: "warning",
		position: "center",
		timeout: "3000"
		});
	}
	
	function notif_higher_than_stock(){
		notif({
		msg: "<strong>System: </strong> Qty is higher than Current Stock, Kindly check.",
		type: "warning",
		position: "center",
		timeout: "3000"
		});
	}
	
	function notif_no_transaction_type(){
		notif({
		msg: "<strong>System: </strong> Please select transaction type.",
		type: "warning",
		position: "center",
		timeout: "3000"
		});
	}
	
	function notif_warning_unselect_for_deletion(){
		notif({
			msg: "<strong>System: </strong> Please select row to delete.",
			type: "warning",
			position: "center",
			timeout: "3000"
		});
	}
	
	$(document).ready(function(){
		
		$('#drp_dept_report').change(function(){
			var drp_dept = $('#drp_dept_report').find(":selected").text();
			$('#id_requestor').val('');
			select_requestor(drp_dept);
			
		});
		
	});
	
	function select_requestor(drp_dept) {
		
		var data = {
			"action"		 : "select_requestor",
			"drp_dept" 		 : drp_dept
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				var ctr = data['ctr'];
				
				$('#id_requestor_list').empty();
				
				for(i=0;i<ctr;i++){
					var html = '<option value='+data['username'][i]+'>'+data['name'][i]+'</option>';
					$('#id_requestor_list').append(html);
				}

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
