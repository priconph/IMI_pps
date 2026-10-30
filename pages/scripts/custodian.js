
	$.ajaxSetup({
		type	: 'post',
		dataType: 'json',
		url		: '../handler/handler.php',
	});
	
	var name = $('#id_hidden_username').val();

	$(document).ready(function(){
		
		$("#id_req_served_modal").click(function(){
			$('#served_modal_show').modal('show');
		});	
		
		$("#id_req_unserved_modal").click(function(){
			$('#unserved_modal_show').modal('show');
		});	
		
		$("#id_btnSCancel").click(function(){
			$('#served_modal_show').modal('hide');
		});
		
		$("#id_btnUNCancel").click(function(){
			$('#unserved_modal_show').modal('hide');
		});
		
		$("#id_req_close_modal").click(function(){
			window.location.reload();
		});
		
			
	});	
		
	/* Display */
	display_conformed_request();
	function display_conformed_request(){
				
		var data = {
			'action'		: 'display_conformed_request'
		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				
				var ctr = data['ctr'];
				
				$('#display_conformed_request').empty();
				
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
					
				$('#display_conformed_request').append(content);
				
				for(i=0;i<ctr;i++){
				
				if ( data['req_status'][i] == 1){
					var status_lbl = '<div class="ui blue ribbon label">FOR ASSESSMENT</div>';
				} else if ( data['req_status'][i] == 3 ){
					var status_lbl = '<div class="ui orange ribbon label">SERVED AND FOR RECEIVING</div>';
				} else if ( data['req_status'][i] == 4 ){
					var status_lbl = '<div class="ui red ribbon label">PARTIAL ITEMS</div>';
				}
				
				if ( data['req_justification'][i] == 0){
					var just_lbl = 'N/A';
				} else {
					var just_lbl = data['req_justification'][i];
				}
								
				var values  = '<tr id='+data['req_pkid'][i]+'>';
					values += '		<td>'+status_lbl+'</td>';
					values += '		<td align="center">'+data['req_date'][i]+'</td>';
					values += '		<td align="center">'+data['req_item_category'][i]+'</td>';
					values += '		<td>'+just_lbl+'</td>';
					values += '		<td align="center">'+data['req_department'][i]+'</td>';
					values += '		<td>'+data['requestor_name'][i]+'</td>';
					values += '</tr>';
					
					$('#tbl_request tbody').append(values);
				}
				
				$('#tbl_request').DataTable({ 
					paginate: true, 
					aaSorting: [],
					"columns": [
					{ "width": "20%" },
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
				
				if ( data['req_status'] == '3' || data['req_status'] == '5'){
					document.getElementById('id_req_served_modal').style.visibility = 'hidden';				
					document.getElementById('id_req_unserved_modal').style.visibility = 'hidden';				
				}
				
				if ( data['req_status'] == '1'){
					document.getElementById('id_req_unserved_modal').style.visibility = 'hidden';				
				}
								
				$('#id_req_date').val(data['req_date']);
				$('#id_req_dept').val(data['req_department']);
				$('#id_req_section').val(data['req_section']);
				$('#id_req_item_cat').val(data['req_item_category']);
				$('#id_req_ts_product').val(data['req_TS_product']);
				$('#id_req_preparedby').val(data['requestor_name']);
				$('#id_hidden_req_preparedby').val(data['req_prepared_by']);
				$('#id_req_justi').val(data['req_justification']);
				$('#id_req_conformed_remarks').val(data['rem_approved_remarks']);
				// alert(data['rem_approved_remarks']);
				
				$('#id_hidden_fiscal').val(id_request);
				
				$('#tbl_item_list_tbody').empty();
				get_request_conformed_item_list(id_request);
				
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
					
					var ril_remarks = data['ril_remarks'][i];
					
					if ( ril_remarks == 0 ) {
						var remarks_lbl = 'N/A';
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
						html += '	<td><center><font size="2">'+data['ci_req_material_id'][i]+'</font></center></td>';
						html += '	<td><font size="2">'+data['mat_product_desc'][i]+'</font></center></td>';
						html += '	<td><font size="2">'+data['mat_product_specs'][i]+'</font></td>';
						html += '	<td><center><font size="2">'+data['mat_uom'][i]+'</font></center></td>';
						html += '	<td><center><font size="2">'+data['ci_req_qty'][i]+'</font></center></td>';
						html += '	<td><font size="2">'+remarks_lbl+'</font></td>';
						html += '</tr>';
					
					$('#tbl_item_list tbody').append(html);
					
				}
				
			}, error	: function(data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	$('#form_served').submit(function(e){
		e.preventDefault();
				
		var assessed_remarks 	= $('#id_served_remarks').val();

		var data = {
			'action'			: 'served_request',
			'pkid'				: id_request,
			'req_custodian'		: name,
			'remarks'			: assessed_remarks,
			
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(output){
			
				console.log(output);
	
				send_served_request_email(id_request);
				
			},
			error	: function(output){
				console.log(output);
			}
		}); 
		
	});
	
	$('#form_unserved').submit(function(e){
		e.preventDefault();
				
		var unserved_remarks 	= $('#id_unserved_remarks').val();

		var data = {
			'action'			: 'unserved_request',
			'pkid'				: id_request,
			'req_custodian'		: name,
			'remarks'			: unserved_remarks,
			
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		// alert(data);
		$.ajax({
			
			data	: data,
			success	: function(output){
			
				console.log(output);
				
				window.location.reload();
				display_conformed_request();
			
			},
			error	: function(output){
				console.log(output);
			}
		}); 
		
	});
	
	function send_served_request_email(id_request){
		
		var data = {
			'action'	: 'send_served_request_email',
			'pkid'		: id_request
		}

		data = $.param(data);
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(result){
				console.log(result);
				
				// notif_email_success();
				window.location.reload();
				// $('#id_request_modal_show').modal('hide');
				// $('#served_modal_show').modal('hide');
				display_conformed_request();

			},
			error	: function(result){
				alert('Error found in sending email');
				console.log(result);
			}
		});
		
	}
	
	function send_unserved_request_email(id_request){
		
		var data = {
			'action'	: 'send_unserved_request_email',
			'pkid'		: id_request
		}

		data = $.param(data);
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(result){
				console.log(result);
				
				// notif_email_success();
				// $('#id_request_modal_show').modal('hide');
				// $('#unserved_modal_show').modal('hide');
				window.location.reload();
				display_conformed_request();

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
		msg: "<strong>System: </strong> Transaction successful! Email Sent!",
		type: "success",
		position: "center",
		timeout: "3000"
		});
	}
	