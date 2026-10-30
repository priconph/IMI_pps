
	$.ajaxSetup({
		type	: 'post',
		dataType: 'json',
		url		: '../handler/handler.php',
	});
	
	var name = $('#id_hidden_username').val();

	$(document).ready(function(){
		
		$("#id_req_conforme_modal").click(function(){
			$('#conforme_modal_show').modal('show');
		});	
		
		$("#id_req_revision_modal").click(function(){
			$('#revision_modal_show').modal('show');
		});	
		
		$("#id_req_rejected_modal").click(function(){
			$('#reject_modal_show').modal('show');
		});	
			
		$('#id_btn_add_conf_item').click(function(){
			populate_item_list_by_div();
			$('#id_conf_item_modal_show').modal('show'); 
		});
		
		$("#id_conf_item_modal_show").draggable({
		  handle: ".modal-body"
		   // handle: ".modal-header"
		});
		
		$('#id_req_close_modal').click(function(){
			location.reload();
		});

		$('#id_btn_back_to_dashboard').click(function(){
			window.location.href = "db_selection.php";
		});

	});	
		
	function populate_item_list_by_div() {
		$('#id_ci_prod_desc').empty();
		
		var data = {
			'action'		: 'select_item_list_by_div'
		}
		
		data = $.param(data);	
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(data){
				$('#id_ci_prod_desc').append(data['html_select']);
			},
			error	: function(data){
				console.log(data);
			}
		});
		
	}	
		
	/* Display */
	display_request_for_conformance();
	function display_request_for_conformance(){
		
		var username = $('#id_hidden_username').val();
		
		var data = {
			'action'		: 'display_request_for_conformance',
			'req_conformer'	: username
		}
		
		data = $.param(data);	
		$.ajax({
			
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr = data['ctr'];
				
				$('#display_request_for_conformance').empty();
				
				var content  = '<table id="tbl_request" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th>Status</th>';
					content += '			<th>Date Request</th>';
					content += '			<th>Item Category</th>';
					content += '			<th>Justification</th>';
					content += '			<th>Department</th>';
					content += '			<th>Prepared By</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#display_request_for_conformance').append(content);
				
				for(i=0;i<ctr;i++){

				if ( data['req_status'][i] == 0){
					var status_lbl = '<i class="fa fa-refresh fa-spin fa-2x fa-fw" style="color:blue" title = "FOR YOUR CONFORMANCE"></i>';
				} else if ( data['req_status'][i] == 1 ){
					var status_lbl = '<i class="fa fa-refresh fa-spin fa-2x fa-fw" style="color:orange" aria-hidden="true" title = "FOR ASSESSMENT"></i>';
				} else if ( data['req_status'][i] == 2 ){
					var status_lbl = '<i class="fa fa-random fa-2x" style="color:red" aria-hidden="true" title = "FOR REVISION"></i>';
				} else if ( data['req_status'][i] == 3 ){
					var status_lbl = '<i class="fa fa-mail-reply-all fa-2x" style="color:blue" aria-hidden="true" title = "SERVED AND FOR RECEIVING"></i>';
				} else if ( data['req_status'][i] == 4 ){
					var status_lbl = '<i class="fa fa-flash fa-2x" style="color:red" aria-hidden="true" title = "PARTIAL ITEMS"></i>';
				} else if ( data['req_status'][i] == 5 ){
					var status_lbl = '<i class="fa fa-thumbs-down fa-2x" style="color:red" aria-hidden="true" title = "REJECTED"></i>';
				} else if ( data['req_status'][i] == 6 ){
					var status_lbl = '<i class="fa fa-thumbs-up fa-2x" style="color:green" aria-hidden="true" title = "RECEIVED BY REQUESTOR"></i>';
				} 
							
				if ( data['req_justification'][i] == 0){
					var just_lbl = 'N/A';
				} else {
					var just_lbl = data['req_justification'][i];
				}
				
				var values  = '<tr id='+data['req_pkid'][i]+'>';
					values += '		<td align="center">'+status_lbl+'</td>';
					values += '		<td align="center" >'+data['req_date'][i]+'</td>';
					values += '		<td align="center" >'+data['req_item_category'][i]+'</td>';
					values += '		<td>'+just_lbl+'</td>';
					values += '		<td align="center" >'+data['req_department'][i]+'</td>';
					values += '		<td>'+data['requestor_name'][i]+'</td>';
					values += '</tr>';
					
					$('#tbl_request tbody').append(values);
				}
				
				$('#tbl_request').DataTable({ 
					paginate: true, 
					aaSorting: [],
					"columns": [
					{ "width": "10%" },
					null,
					null,
					null,
					null,
					null
					]
				});
					 
				select_row_request();
				
			},
			error	: function(data){
				console.log(data);
			}
		});
		
	}
	
	/* Select */
	function select_row_request(){
		
		$('#tbl_request tbody').on('click','tr', function(){
			id_request = '';
			$('#tbl_request tbody tr').attr('style','');
			$(this).attr('style','background: #D5F5E3 ;color:black;');
			id_request = this.id;
		});
		
		
		$("#tbl_request tbody").on('dblclick', 'tr', function(){
			$("#modal-body input").val("");	
			select_detailed_request(id_request);
		});		
	}
	
	function select_detailed_request(id_request) {
		
		var data = {
			"action"		 : "select_detailed_request",
			"id"			 : id_request
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				if ( data['req_status'] == '2' || data['req_status'] == '3' || data['req_status'] == '4' || data['req_status'] == '5' || data['req_status'] == '6' || data['req_status'] == '7'){
					document.getElementById('id_req_conforme_modal').style.visibility = 'hidden';				
					document.getElementById('id_req_revision_modal').style.visibility = 'hidden';				
					document.getElementById('id_req_rejected_modal').style.visibility = 'hidden';				
				}
				
				if ( data['req_status'] == '1'){
					document.getElementById('id_req_conforme_modal').style.visibility = 'hidden';	
					document.getElementById('id_req_revision_modal').style.visibility = 'hidden';	
					document.getElementById('id_req_rejected_modal').style.visibility = 'hidden';					
				}
				
				
				$('#id_req_date').val(data['req_date']);
				$('#id_req_dept').val(data['req_department']);
				$('#id_hidden_req_dept').val(data['req_department']);
				$('#id_req_section').val(data['req_section']);
				$('#id_req_item_cat').val(data['req_item_category']);
				$('#id_req_ts_product').val(data['req_TS_product']);
				$('#id_req_preparedby').val(data['requestor_name']);
				$('#id_hidden_req_preparedby').val(data['req_prepared_by']);
				
				if ( data['req_justification'] == '' ){
					$('#id_req_justi').val('N/A');
				}else{
					$('#id_req_justi').val(data['req_justification']);
				}
				
				$('#id_hidden_pkid').val(id_request);
				
				$('#id_hidden_dept').val(data['req_department']);
				$('#id_hidden_department').val(data['req_department']);
				
				$('#tbl_item_list_tbody').empty();
				get_request_item_list(id_request);
				
				get_request_conformed_item_list(id_request);
				$('#tbl_citem_list_tbody').empty();
					
				$('#tbl_remarks_tbody').empty();
				get_remarks(id_request);
				
				$("#id_request_modal_show").modal();

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	function get_request_item_list(id_request) {
		
		var data = {
			"action"		 : "get_request_item_list",
			"id"			 : id_request
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				var ctr = data['ctr'];
				
				for(i=0; i<ctr; i++) {
					
					var remarks  	= data['ril_remarks'][i];
						
					if ( remarks == 0 ) {
						var remarks_lbl = '	N/A ';
					}else{
						var remarks_lbl = data['ril_remarks'][i];
					}	
					
					var html  = '<tr>';
						html += '	<td><font size="2">'+data['mat_product_desc'][i]+'</font></td>';
						html += '	<td><font size="2">'+data['mat_product_specs'][i]+'</font></td>';
						html += '	<td><center><font size="2">'+data['mat_uom'][i]+'</font></center></td>';
						html += '	<td><center><font size="2">'+data['ril_request_qty'][i]+'</font></center></td>';
						html += '	<td><font size="2">'+remarks_lbl+'</font></td>';
						html += '</tr>';
					
					$('#tbl_item_list tbody').append(html);
					
				}
				
			}, error	: function(data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	function get_request_conformed_item_list(id_request) {
		
		var data = {
			"action"		 : "get_request_conformed_item_list",
			"id"			 : id_request
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				var ctr = data['ctr'];
				var req_item_id = data['ci_req_material_id'];
				
				for(i=0; i<ctr; i++) {
					
					var remarks = data['ci_remarks'][i];
					
					if ( remarks == ''){
						var remarks_lbl = 'N/A';
					}else{
						var remarks_lbl = data['ci_remarks'][i];
					}
					
					var html  = '<tr>';
						// html += '	<td><center><font size="2">'+data['ci_req_material_id'][i]+'</font></center></td>';
						html += '	<td><font size="2">'+data['mat_product_desc'][i]+'</font></center></td>';
						html += '	<td><font size="2">'+data['mat_product_specs'][i]+'</font></td>';
						html += '	<td><center><font size="2">'+data['mat_uom'][i]+'</font></center></td>';
						html += '	<td><center><font size="2">'+data['ci_req_qty'][i]+'</font></center></td>';
						html += '	<td><font size="2">'+remarks_lbl+'</font></td>';
						html += '</tr>';
					
					$('#tbl_citem_list tbody').append(html);
					
				}
				
			}, error	: function(data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	function get_remarks(id_request) {
		
		var data = {
			"action"		 : "get_remarks",
			"id"			 : id_request
		}
		
		data = $.param(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				console.log(data);
				
				var ctr = data['ctr'];
				
				for(i=0;i<ctr;i++) {
					
					if ( data['rem_approved_remarks'][i] == ''){
						var app_remarks_lbl = 'N/A';
					}else{
						var app_remarks_lbl = data['rem_approved_remarks'][i];
					}
					
					var html  = '<tr>';
						html += '	<td><font size="2">'+data['approver_name'][i]+'</font></td>';
						html += '	<td><font size="2">'+app_remarks_lbl+'</font></td>';
						html += '	<td><font size="2">'+data['rem_reject_remarks'][i]+'</font></td>';
						html += '	<td><font size="2">'+data['rem_other_remarks'][i]+'</font></td>';
						html += '	<td><central><font size="2">'+data['rem_lastupdate'][i]+'</font></central></td>';
						html += '</tr>';
					
					$('#tbl_remarks tbody').append(html);
					
				}
				
			}, error	: function(data) {
			alert('ERROR: '+data);
			}
		});
	}
			
	$('#id_ci_prod_desc').change(function () {
		
		if($('#id_ci_prod_desc').val() != 0) {
			
			var dept = $('#id_hidden_department').val(); 
			
			if ( dept == 'TS'){
			
				var data = {
					"action"	: "select_item_list_priceTS_by_id",
					"mp_pkid"	: $('#id_ci_prod_desc').val()
				}
				data = $.param(data);
				$.ajax({
					data	: data,
					success	: function (result) {
						console.log(result);
						
						$('#id_ci_pkid').val(result['mp_pkid']);
						$('#id_ci_prod_desc').val(result['mp_pkid']);
						$('#id_ci_specs').val(result['mat_product_specs']);
						$('#id_ci_uom').val(result['mat_uom']);
						$('#id_ci_unit_dollor').val(result['mp_unit_price_dollor']);
						$('#id_ci_exchange_rate').val(result['mp_exchange_rate']);
						$('#id_ci_unit_peso').val(result['mp_unit_price_peso']);
						$('#id_ci_stock_qty').val(result['ttl_current_stock_ts']);
						
					}, error: function (result) {
						alert("ERROR: "+result);
					}
				});
				
			} else if ( dept == 'PPS'){
			
				var data = {
					"action"	: "select_item_list_pricePPS_by_id",
					"mp_pkid"	: $('#id_ci_prod_desc').val()
				}
				data = $.param(data);
				// alert(data);
				$.ajax({
					data	: data,
					success	: function (result) {
						console.log(result);
						
						$('#id_ci_pkid').val(result['mp_pkid']);
						$('#id_ci_prod_desc').val(result['mp_pkid']);
						$('#id_ci_specs').val(result['mat_product_specs']);
						$('#id_ci_uom').val(result['mat_uom']);
						$('#id_ci_unit_dollor').val(result['mp_unit_price_dollor']);
						$('#id_ci_exchange_rate').val(result['mp_exchange_rate']);
						$('#id_ci_unit_peso').val(result['mp_unit_price_peso']);
						$('#id_ci_stock_qty').val(result['ttl_current_stock_pps']);
						
					}, error: function (result) {
						alert("ERROR: "+result);
					}
				});
					
					
					
			} else if ( dept == 'CN'){
			
				var data = {
					"action"	: "select_item_list_priceCN_by_id",
					"mp_pkid"	: $('#id_ci_prod_desc').val()
				}
				data = $.param(data);
				// alert(data);
				$.ajax({
					data	: data,
					success	: function (result) {
						console.log(result);
						
						$('#id_ci_pkid').val(result['mp_pkid']);
						$('#id_ci_prod_desc').val(result['mp_pkid']);
						$('#id_ci_specs').val(result['mat_product_specs']);
						$('#id_ci_uom').val(result['mat_uom']);
						$('#id_ci_unit_dollor').val(result['mp_unit_price_dollor']);
						$('#id_ci_exchange_rate').val(result['mp_exchange_rate']);
						$('#id_ci_unit_peso').val(result['mp_unit_price_peso']);
						$('#id_ci_stock_qty').val(result['ttl_current_stock_cn']);
						
					}, error: function (result) {
						alert("ERROR: "+result);
					}
				});
					
					
					
			} else if ( dept == 'YF'){
			
				var data = {
					"action"	: "select_item_list_priceYF_by_id",
					"mp_pkid"	: $('#id_ci_prod_desc').val()
				}
				data = $.param(data);
				// alert(data);
				$.ajax({
					data	: data,
					success	: function (result) {
						console.log(result);
						
						$('#id_ci_pkid').val(result['mp_pkid']);
						$('#id_ci_prod_desc').val(result['mp_pkid']);
						$('#id_ci_specs').val(result['mat_product_specs']);
						$('#id_ci_uom').val(result['mat_uom']);
						$('#id_ci_unit_dollor').val(result['mp_unit_price_dollor']);
						$('#id_ci_exchange_rate').val(result['mp_exchange_rate']);
						$('#id_ci_unit_peso').val(result['mp_unit_price_peso']);
						$('#id_ci_stock_qty').val(result['ttl_current_stock_yf']);
						
					}, error: function (result) {
						alert("ERROR: "+result);
					}
				});

			} else {
				
				$('#id_ci_pkid').val('');
				$('#id_ci_prod_desc').val('');
				$('#id_ci_specs').val('');
				$('#id_ci_uom').val('');
				$('#id_ci_unit_dollor').val('');
				$('#id_ci_exchange_rate').val('');
				$('#id_ci_unit_peso').val('');
				$('#id_ci_stock_qty').val('');
					
			}
			
			
		}
		
	});
	
	/* Form */	 
	$('#form_conformed').submit(function(e){
		e.preventDefault();
		var serialData = $(this).serialize();
		
		conformed_request(serialData);
		
	}); 
	
	$('#form_revision').submit(function(e){
		e.preventDefault();
				
		var revision_remarks 	= $('#id_revision_remarks').val();

		var data = {
			'action'			: 'revision_request_by_tsCentral',
			'pkid'				: id_request,
			'approver_name'		: name,
			'remarks'			: revision_remarks
			
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		$.ajax({
			
			data	: data,
			success	: function(output){
				console.log(output);
					
				send_revision_request_email_from_conformer(id_request);
				// window.location.reload();
				// display_request_for_conformance();
			
			},
			error	: function(output){
				console.log(output);
			}
		}); 
		
	});
		
	$('#form_rejected').submit(function(e){
		e.preventDefault();
				
		var rejected_remarks 	= $('#id_rejected_remarks').val();

		var data = {
			'action'			: 'rejected_request_by_tsCentral',
			'pkid'				: id_request,
			'approver_name'		: name,
			'remarks'			: rejected_remarks
			
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(output){
				console.log(output);
					
				send_rejected_request_email_from_conformer(id_request);
				// window.location.reload();
				// display_request_for_conformance();
			
			},
			error	: function(output){
				console.log(output);
			}
		}); 
		
	});
	
	$('#id_add_conf_item_modal').click(function(){
		
		 var item_num 				= $('#id_ci_pkid').val();
		 var item_description 		= $('#id_ci_prod_desc').val();
		 var item_description_text 	= $('#id_ci_prod_desc option:selected').text();
		 var item_specs 			= $('#id_ci_specs').val();
		 var uom 					= $('#id_ci_uom').val();
		 var unit_dollor 			= $('#id_ci_unit_dollor').val();
		 var exchange_rate 			= $('#id_ci_exchange_rate').val();
		 var unit_peso 				= $('#id_ci_unit_peso').val();
		 var stock_qty 				= $('#id_ci_stock_qty').val();
		 var quantity_requested 	= $('#id_ci_qty').val();
		 var charge_dept 			= $('#id_ci_charge_dept').val();
		 var remarks 				= $('#id_ci_remarks').val();

		if ( Number(quantity_requested) > Number(stock_qty) ) {
			
			notif_higher_than_stock();
			$('#id_ci_qty').val("");
			
		} else {
			
			if(item_description != "" && item_specs != "" && uom != "" && quantity_requested != "" && charge_dept != "") { 
			var html  = '<tr>';
				html += '	<td><center><font size="2">'+item_num+'</font></center></td>';
				html += '	<td><font size="2"><input type="hidden" value="'+item_description+'">'+item_description_text+'</font></td>';
				html += '	<td><font size="2">'+item_specs+'</font></td>';
				html += '	<td><center><font size="2">'+uom+'</font></center></td>';
				html += '	<td><center><font size="2">'+unit_dollor+'</font></center></td>';
				html += '	<td><center><font size="2">'+exchange_rate+'</font></center></td>';
				html += '	<td><center><font size="2">'+unit_peso+'</font></center></td>';
				html += '	<td><center><font size="2" color="blue">'+quantity_requested+'</font></center></td>';
				html += '	<td><center><font size="2">'+charge_dept+'</font></center></td>';
				html += '	<td><center><font size="2">'+remarks+'</font></center></td>';
				html += '	<td><center><button type="button" class="btn btn-danger btn-sm" btn_remove"><i class="fa fa-trash" aria-hidden="true"></i></button></center></td>';
				html += '</tr></font>';

				$('#tbl_conf_item').append(html);
				$('#id_ci_pkid').val("");
				$('#id_ci_prod_desc').val("");
				$('#id_ci_specs').val("");
				$('#id_ci_uom').val("");
				$('#id_ci_unit_dollor').val("");
				$('#id_ci_unit_peso').val("");
				$('#id_ci_exchange_rate').val("");
				$('#id_ci_stock_qty').val("");
				$('#id_ci_qty').val("");
				$('#id_ci_charge_dept').val("");
				$('#id_ci_remarks').val("");
						
			} else {
				alert("Please check all required fields. Label with '*'");
			}
			
		}
		
		//FUNCTION FOR REMOVING A ROW INTO THE TABLE 
		$('#tbl_conf_item tr').on('click','.btn-danger',function(){ 
			$(this).closest('tr').remove();
		});
		 
	}); 

	/* Update */
	function conformed_request(serialData){
	
		var row = 0; 
		
		$('#tbl_conf_item tr').each(function(row, tr){
			if(row = 1){
				if($(tr).find('td:eq(0)').text() != ""){
					itemValidate = 1;
					return;
				}else{
					itemValidate = 0;
					return;
				}
			}
			row++;
		});
		
		if(itemValidate == 0) {
			
			notif_no_item_request();
			return;
			
		} else if(itemValidate == 1) {
			
			var approved_remarks 	= $('#id_conformed_remarks').val();
			var custodian		 	= $('#id_custodian').val();
			var dept		 		= $('#id_hidden_dept').val();
			
			var data = {
				'action'			: 'conformed_request',
				'pkid'				: id_request,
				'approver_name'		: name,
				'remarks'			: approved_remarks,
				'req_custodian'		: custodian,
				'dept'				: dept
				
			}
			
			data = $.param(data) + "&" + serialData;
			// alert(data);
			$.ajax({
			
				data	: data,
				success	: function(data){
					console.log(data);	
					
					conformed_items_request(id_request, dept);
				
					send_conformed_request_email(id_request);


				},
				error	: function(data){
					console.log(data);
					
				}
				
			});
			
		}	
			
	}
	
	function conformed_items_request(id_request, dept){
		
		$('#tbl_conf_item tbody tr').each(function(){
			
			var data = {
				"action"		: "conformed_items_request",
				"fkid_request"	: id_request,
				"dept"			: dept,
				"item_num"		: $(this).find('td:eq(0)').text(),
				"item_desc"		: $(this).find('td:eq(1)').text(),
				"item_specs"	: $(this).find('td:eq(2)').text(),
				"uom"			: $(this).find('td:eq(3)').text(),
				"unit_dollor"	: $(this).find('td:eq(4)').text(),
				"ex_rate"		: $(this).find('td:eq(5)').text(),
				"unit_peso"		: $(this).find('td:eq(6)').text(),
				"req_qty"		: $(this).find('td:eq(7)').text(),
				"charge_dept"	: $(this).find('td:eq(8)').text(),
				"remarks"		: $(this).find('td:eq(9)').text()
			}
			
			data = $.param(data);
			// alert(data);
			$.ajax({
				data	: data,
				success	: function(data){
					console.log( data );
					
				}, 
				error : function(data){
					console.log(data);
				}
				
			});

		});
		
				
	}
	
	/* Email Notification */
 	function send_conformed_request_email(id_request){
		
		var data = {
			'action'	: 'send_conformed_request_email',
			'pkid'		: id_request
		}

		data = $.param(data);
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(result){
				console.log(result);
				
				window.location.reload();
				// notif_email_success();
				// $('#id_request_modal_show').modal('hide');
				// $('#conforme_modal_show').modal('hide');
				display_request_for_conformance();
				
			},
			error	: function(result){
				alert('Error found in sending email');
				console.log(result);
			}
		});
		
	}

	function send_revision_request_email_from_conformer(id_request){
		
		var data = {
			'action'	: 'send_revision_request_email_from_conformer',
			'pkid'		: id_request
		}

		data = $.param(data);
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(result){
				console.log(result);
				
				window.location.reload();
				// notif_email_revision();
				// $('#id_request_modal_show').modal('hide');
				// $('#revision_modal_show').modal('hide');
				display_request_for_conformance();

			},
			error	: function(result){
				alert('Error found in sending email');
				console.log(result);
			}
		});
		
	}
	
	function send_rejected_request_email_from_conformer(id_request){
		
		var data = {
			'action'	: 'send_rejected_request_email_from_conformer',
			'pkid'		: id_request
		}

		data = $.param(data);
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(result){
				console.log(result);
				
				window.location.reload();
				// notif_email_rejected();
				// $('#id_request_modal_show').modal('hide');
				// $('#reject_modal_show').modal('hide');
				display_request_for_conformance();

			},
			error	: function(result){
				alert('Error found in sending email');
				console.log(result);
			}
		});
		
	}
	
	/* Notif */
	function notif_email_success(){
		notif({
		msg: "<strong>System: </strong> Transaction successful!",
		type: "success",
		position: "center",
		timeout: "3000"
		});	
	
	}
	
	function notif_email_revision(){
		notif({
		msg: "<strong>System: </strong> Email Sent!",
		type: "success",
		position: "center",
		timeout: "3000"
		});
	}
	
	function notif_email_rejected(){
		notif({
		msg: "<strong>System: </strong> Successfully rejected! Email Sent!",
		type: "success",
		position: "center",
		timeout: "3000"
		});
	}
	
	function notif_no_item_request(){
		notif({
		msg: "<strong>System: </strong> There are no item request!",
		type: "warning",
		position: "center",
		timeout: "3000"
		});
	}
	
	function notif_higher_than_stock(){
		notif({
		msg: "<strong>System: </strong> Requested Qty is higher than Current Stock, Kindly check.",
		type: "warning",
		position: "center",
		timeout: "3000"
		});
	}
	
	function notif_no_CUS(){
		notif({
		msg: "<strong>System: </strong> Please input Custodian!",
		type: "warning",
		position: "center",
		timeout: "3000"
		});
	}
	
	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
	
	function ReplaceNumberWithCommas(NumberWithCommas) {
		var n= NumberWithCommas.toString().split(".");
		n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		return n.join(".");
	}

	
	
	
	