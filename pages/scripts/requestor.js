
	$.ajaxSetup({
		type	: 'post',
		dataType: 'json',
		url		: '../handler/handler.php',
	});

	var id_request = '';

	$(document).ready(function(){
			
		$('#id_btn_add_request_modal').click(function(){
			$('#id_request_modal_show').modal('show');
		});
		
		$('#id_btn_add_item').click(function(){
			$('#id_item_modal_show').modal('show'); 
		});
		
		$('#id_ubtn_add_item').click(function(){
			$('#id_uitem_modal_show').modal('show'); 
		});
			
		$('#id_add_item_modal').click(function(){
			 var item_num 				= $('#id_item_num').val();
			 var item_description 		= $('#id_item_description').val();
			 var item_description_text 	= $('#id_item_description option:selected').text();
			 var item_specs 			= $('#id_item_specs').val();
			 var uom 					= $('#id_uom').val();
			 var quantity_requested 	= $('#id_quantity_requested').val();
			 var remarks 				= $('#id_remarks').val();
			 var hidden_no 				= $('#id_hidden_no').val();
		 
			if(item_description != "" && item_specs != "" && uom != "" && quantity_requested != "") { 
				var html  = '<tr>';
					html += '	<td><center><font size="2">'+item_num+'</font></center></td>';
					html += '	<td><center><font size="2"><input type="hidden" value="'+item_description+'">'+item_description_text+'</font></center></td>';
					html += '	<td><center><font size="2">'+item_specs+'</font></center></td>';
					html += '	<td><center><font size="2">'+uom+'</font></center></td>';
					html += '	<td><center><font size="2">'+quantity_requested+'</font></center></td>';
					html += '	<td><center><font size="2">'+remarks+'</font></center></td>';
					html += '	<td><center><button type="button" class="btn btn-danger btn-sm" btn_remove"><i class="fa fa-trash" aria-hidden="true"></i></button></center></td>';
					html += '	<td><center><font size="2">'+hidden_no+'</font></center></td>';
					html += '</tr></font>';

				$('#tbl_item_list').append(html);
				$('#id_item_num').val("");
				$('#id_item_description').val("");
				$('#id_item_specs').val("");
				$('#id_uom').val("");
				$('#id_quantity_requested').val("");
				$('#id_remarks').val("");
						
			} else {
				alert("Please check all required fields.");
			}
			
			//FUNCTION FOR REMOVING A ROW INTO THE TABLE 
			$('#tbl_item_list tr').on('click','.btn-danger',function(){ 
				$(this).closest('tr').remove();
			});
		 
		}); 
		
		$('#id_uadd_item_modal').click(function(){
			 var uitem_num 				= $('#id_uitem_num').val();
			 var uitem_description 		= $('#id_uitem_description').val();
			 var uitem_description_text = $('#id_uitem_description option:selected').text();
			 var uitem_specs 			= $('#id_uitem_specs').val();
			 var uuom 					= $('#id_uuom').val();
			 var uquantity_requested 	= $('#id_uquantity_requested').val();
			 var uremarks 				= $('#id_uremarks').val();
			 var uhidden_no 			= $('#id_uhidden_no').val();

			if(uitem_description != "" && uitem_specs != "" && uuom != "" && uquantity_requested != "") { 
				var html  = '<tr>';
					html += '	<td><center><font size="2">'+uitem_num+'</font></center></td>';
					html += '	<td><font size="2"><input type="hidden" value="'+uitem_description+'">'+uitem_description_text+'</font></td>';
					html += '	<td><center><font size="2">'+uitem_specs+'</font></center></td>';
					html += '	<td><center><font size="2">'+uuom+'</font></center></td>';
					html += '	<td><center><font size="2">'+uquantity_requested+'</font></center></td>';
					html += '	<td><font size="2">'+uremarks+'</font></td>';
					html += '	<td><center><button type="button" class="btn btn-danger btn-sm" btn_uremove"><i class="fa fa-trash" aria-hidden="true"></i></button></center></td>';
					html += '	<td><center><font size="2">'+uhidden_no+'</font></center></td>';
					html += '</tr></font>';

				$('#tbl_uitem_list').append(html);
				$('#id_uitem_num').val("");
				$('#id_uitem_description').val("");
				$('#id_uitem_specs').val("");
				$('#id_uuom').val("");
				$('#id_uquantity_requested').val("");
				$('#id_uremarks').val("");

			} else {
				alert("Please check all required fields.");
			}
			
			//FUNCTION FOR REMOVING A ROW INTO THE TABLE 
			$('#tbl_uitem_list tr').on('click','.btn-danger',function(){ 
				$(this).closest('tr').remove();
			});
		 
		}); 

		$('#id_btn_remove_request').click(function(e){
			
			if(confirm($(this).data('confirm'))){
				e.preventDefault();
			} else {
				return false;
			}	
			remove_request(id_request);		
		});
		
		$('#id_req_close_modal').click(function(){
			location.reload();
		});
		
		$('#id_ureq_close_modal').click(function(){
			location.reload();
		});
		
		$('#id_btnSRCancel').click(function(){
			location.reload();
		});
		
		$('#id_btn_conformed_request').click(function(e){
			
			if(confirm($(this).data('confirm'))){
				e.preventDefault();
			} else {
				return false;
			}	
			conformed_request_by_requestor(id_request);		
		});
		
		/* Form Add */
		$('#id_form_request').submit(function(e){
			e.preventDefault();
			var serialData = $(this).serialize();
			
			add_request_info(serialData);
			
		}); 
		
		$('#id_form_update_request').submit(function(e){
			e.preventDefault();
			
			var row = 0; 
		
			$('#tbl_uitem_list tr').each(function(row, tr){
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
			
			if(itemValidate == 0){
				
				notif_no_item_request();
				return;
				
			} else if(itemValidate == 1) {
				
				
				var pkid	= $('#id_uhidden_id').val();
				var data = {
					'action'			: 'update_request',
					'id'				: pkid
				}
				
				data = $.param(data) + "&" + $(this).serialize();
				// alert(data);
				$.ajax({
					
					data	: data,
					success	: function(data){
					console.log(data);
					
						
						var pkid	= $('#id_uhidden_id').val();
						add_new_request_item_info(pkid);
		
					
						send_email_update_from_requestor(pkid);
					
					},
					error	: function(output){
						console.log(output);
					}
				});
			
			
				
				
			}

		});
		 
	});
			
	$('#id_req_dept').change(function(){
		
		var req_dept 		= $('#id_req_dept').val();
		var hidden_username = $('#id_hidden_username').val();
		
		if ( req_dept == 'TS' ){
				
			// if ( hidden_username == 'claaust'){
			if ( hidden_username == 'elomani' || hidden_username == 'lbabella'){
			
				$('#id_req_ts_product').val('Test Sockets');
			
			}else{
				$('#id_req_ts_product').val('Burn-In Sockets');
			}
			
		} else {
			
			$('#id_req_ts_product').val('N/A');
			
		}
		
	});
	
	$('#id_ureq_dept').change(function(){
		
		var req_dept = $('#id_ureq_dept').val();
		
		if ( req_dept == 'TS' ){
			
			$('#id_ureq_ts_product').keyup(function(e){
				var key_pressed = e.which;
				if(key_pressed != 38 && key_pressed != 40){
					var pattern = $(this).val();
					get_update_TS_Section(pattern);
				}
			});
			
			$('#id_ureq_ts_product').val('');

		} else {
			
			$('#id_ureq_ts_product').val('N/A');
			
		}
	});
	
	$('#id_item_description').change(function () {
		
		if($('#id_item_description').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_by_id",
				"mat_pkid"	: $('#id_item_description').val()
			}
			data = $.param(data);
			// alert(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_item_num').val(result['mat_pkid']);
					$('#id_item_specs').val(result['mat_product_specs']);
					$('#id_uom').val(result['mat_uom']);
					
				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
		} else {
			
			$('#id_item_num').val('');
			$('#id_item_specs').val('');
			$('#id_uom').val('');
			$('#id_hidden_no').val('');
			
		}
	});
	
	$('#id_uitem_description').change(function () {
		
		if($('#id_uitem_description').val() != 0) {
			
			var data = {
				"action"	: "select_item_list_by_id",
				"mat_pkid"	: $('#id_uitem_description').val()
			}
			data = $.param(data);
			// alert(data);
			$.ajax({
				data	: data,
				success	: function (result) {
					
					$('#id_uitem_num').val(result['mat_pkid']);
					$('#id_uitem_specs').val(result['mat_product_specs']);
					$('#id_uuom').val(result['mat_uom']);
					
				}, error: function (result) {
					alert("ERROR: "+result);
				}
			});
		} else {
			
			$('#id_uitem_num').val('');
			$('#id_uitem_specs').val('');
			$('#id_uuom').val('');
			
		}
	});
	
	/* Add */
	function add_request_info(serialData){
	
		var row = 0; 
		
		//Validate if first there are no item requested
		$('#tbl_item_list tr').each(function(row, tr){
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
		
		if(itemValidate == 0){
			notif_no_item_request();
			// alert("There are no item request");
			return;
		}else if(itemValidate == 1){
		
			var data = {
				'action'	: 'add_request_info'
			}
			
			data = $.param(data) + "&" + serialData;
			$.ajax({
			
				data	: data,
				success	: function(data){
					console.log(data);	
					
						if ( data['msg'] == 'no Dept' ) {
							notif_no_dept();
							
						} else {
							var pkid = data['req_pkid'];
							
							add_request_item_info(pkid);
							
							send_email_from_requestor(pkid);
			
						}					
				},
				error	: function(data){
					console.log(data);
					
				}
				
			});
			
		}	
			
	}
	
	function add_request_item_info(pkid){
		
		$('#tbl_item_list tbody tr').each(function(){
			
			var data = {
				"action"		: "add_request_item_info",
				"fkid_request"	: pkid,
				"item_num"		: $(this).find('td:eq(0)').text(),
				"item_desc"		: $(this).find('td:eq(1)').text(),
				"item_specs"	: $(this).find('td:eq(2)').text(),
				"uom"			: $(this).find('td:eq(3)').text(),
				"qty"			: $(this).find('td:eq(4)').text(),
				"remarks"		: $(this).find('td:eq(5)').text(),
				"id"			: $(this).find('td:eq(7)').text()
			}
			
			data = $.param(data);
			// alert(data);
			$.ajax({
				data	: data,
				success	: function(data){
					console.log(data);
					
				}, 
				error : function(data){
					console.log(data);
				}
				
			});
			
			
		});
		
				
	}
	
	function add_new_request_item_info(pkid){
		
		$('#tbl_uitem_list tbody tr').each(function(){
			
			var data = {
				"action"		: "add_new_request_item_info",
				"fkid_request"	: pkid,
				"item_num"		: $(this).find('td:eq(0)').text(),
				"item_desc"		: $(this).find('td:eq(1)').text(),
				"item_specs"	: $(this).find('td:eq(2)').text(),
				"uom"			: $(this).find('td:eq(3)').text(),
				"qty"			: $(this).find('td:eq(4)').text(),
				"remarks"		: $(this).find('td:eq(5)').text(),
				"id"			: $(this).find('td:eq(7)').text()
			}
			
			data = $.param(data);
			// alert(data);
			$.ajax({
				data	: data,
				success	: function(data){
					console.log(data);
					
				}, 
				error : function(data){
					console.log(data);
				}
				
			});
			
		});
	
	}
	
	/* Update */
	function conformed_request_by_requestor(id_request) {
		
		var data = {
			"action"			 : "conformed_request_by_requestor",
			"id"				 : id_request
			
		}
		
		data = $.param(data);
		$.ajax({
			data		: data,
			success	: function (data) {
				console.log(data);
				
				send_email_conformed_from_requestor(id_request);
				// window.location.reload();
				// display_request();
			
			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	/* Remove */
	function remove_request(id_request) {
		
		var data = {
			"action"			 : "remove_request",
			"id"				 : id_request
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data	: data,
			success	: function (data) {
				console.log(data);
				
			notif_success_removed();
			display_request();
			
			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	function remove_item(id_request, tr) {
		
		var data = {
			"action"			 : "remove_item",
			"id"				 : id_request
		}
		
		data = $.param(data);
		// alert(data);
		$.ajax({
			data	: data,
			success	: function (data) {
				console.log(data);
				
			notif_success_removed();
			display_request();
			
			tr.remove();
			
			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	/* Display */
	display_request();
	function display_request(){
		
		var username = $('#id_hidden_username').val();
		
		var data = {
			'action'			: 'display_request',
			'req_prepared_by'	: username

		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr = data['ctr'];
			
				$('#container_request_summary').empty();
				
				var content  = '<table id="tbl_request" class="table table-striped table-hover table-compact cell-border" width="100%" style="font-size: 9pt; border: solid 1px gray;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th>Status</th>';
					content += '			<th>Date</th>';
					content += '			<th>Item Category</th>';
					content += '			<th>Justification</th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#container_request_summary').append(content);
				
				for(i=0;i<ctr;i++){
				
				if ( data['req_status'][i] == 0){
					var status_lbl = '<div class="ui blue ribbon label">FOR CONFORMANCE (CENTRAL)</div>';
				} else if ( data['req_status'][i] == 1 ){
					var status_lbl = '<div class="ui orange ribbon label">FOR ASSESSMENT (CUSTODIAN)</div>';
				} else if ( data['req_status'][i] == 2 ){
					var status_lbl = '<div class="ui red ribbon label">FOR REVISION</div>';
				} else if ( data['req_status'][i] == 3 ){
					var status_lbl = '<div class="ui blue ribbon label">SERVED AND FOR RECEIVING</div>';
				} else if ( data['req_status'][i] == 4 ){
					var status_lbl = '<div class="ui red ribbon label">PARTIAL ITEMS</div>';
				} else if ( data['req_status'][i] == 5 ){
					var status_lbl = '<div class="ui red ribbon label">REJECTED BY CENTRAL</div>';
				} else if ( data['req_status'][i] == 6 ){
					var status_lbl = '<div class="ui green ribbon label">RECEIVED</div>';
				}
				
				if ( data['req_justification'][i] == 0){
					var just_lbl = 'N/A';
				} else {
					var just_lbl = data['req_justification'][i];
				}
				
				var values  = '<tr id='+data['req_pkid'][i]+'>';
					values += '		<td>'+status_lbl+'</td>';
					values += '		<td align="center" >'+data['req_date'][i]+'</td>';
					values += '		<td align="center" >'+data['req_item_category'][i]+'</td>';
					values += '		<td>'+just_lbl+'</td>';
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
				
				
				if ( data['req_status'] == '0' || data['req_status'] == '1' || data['req_status'] == '2' || data['req_status'] == '4' || data['req_status'] == '5' || data['req_status'] == '6'){
					document.getElementById('id_btn_conformed_request').style.visibility = 'hidden';				
				}
				
				if ( data['req_status'] == '0' || data['req_status'] == '2' ){
					document.getElementById('id_ubtn_add_item').style.visibility = 'visible';			
					document.getElementById('id_ureq_update_modal').style.visibility = 'visible';				
				}else{
					$("#id_ureq_dept").prop('disabled', true);
					$("#id_ureq_section").prop('disabled', true);
					$("#id_ureq_justi").prop('disabled', true);
					$("#id_ureq_ts_product").prop('disabled', true);
					
					document.getElementById('id_ubtn_add_item').style.visibility = 'hidden';				
					document.getElementById('id_ureq_update_modal').style.visibility = 'hidden';				
				}
				
				if ( data['req_TS_product'] == '0' ){
					$('#id_ureq_ts_product').val('N/A');
				} else {
					$('#id_ureq_ts_product').val(data['req_TS_product']);
				}
				
				$('#id_uhidden_status').val(data['req_status']);	
				$('#id_ureq_date').val(data['req_date']);
				$('#id_ureq_dept').val(data['req_department']);
				$('#id_ureq_section').val(data['req_section']);
				$('#id_ureq_item_cat').val(data['req_item_category']);
				$('#id_uhidden_req_preparedby').val(data['req_prepared_by']);
				
				if ( data['req_justification'] == '' ){
					$('#id_ureq_justi').val('N/A');
				}else{
					$('#id_ureq_justi').val(data['req_justification']);
				}
				
				$('#id_uhidden_id').val(id_request);
				
					
					get_request_item_list(id_request);
					$('#tbl_uitem_list_tbody').empty();
					
					get_request_conformed_item_list(id_request);
					$('#tbl_citem_list_tbody').empty();
					
					
				$('#tbl_remarks_tbody').empty();
				get_remarks(id_request);
				
				$("#id_update_request_modal_show").modal();

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
				
				var ctr 		= data['ctr'];
					
				for(i=0; i<ctr; i++) {
					
					var status  	= data['req_status'][i];
						
					if ( status == 0 || status == 2) {
						var removed_btn = '	<button type="button" class="btn btn-danger btn-sm" id="btn_remove_item" value="'+data['ril_pkid'][i]+'" data-confirm="Are you sure you want to delete this item?" ><i class="fa fa-trash" aria-hidden="true"></i></button> ';
					}else{
						var removed_btn = '	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button> ';
					}	

					var remarks  	= data['ril_remarks'][i];
						
					if ( remarks == 0 ) {
						var remarks_lbl = '	N/A ';
					}else{
						var remarks_lbl = data['ril_remarks'][i];
					}	
					
					var html  = '<tr id='+data['ril_pkid'][i]+'>';
						html += '	<td><center><font size="2">'+data['ril_fkid_material_list'][i]+'</font></center></td>';
						html += '	<td><font size="2">'+data['mat_product_desc'][i]+'</font></td>';
						html += '	<td><font size="2">'+data['mat_product_specs'][i]+'</font></td>';
						html += '	<td><center><font size="2">'+data['mat_uom'][i]+'</font></center></td>';
						html += '	<td><center><font size="2">'+data['ril_request_qty'][i]+'</font></center></td>';
						html += '	<td><font size="2">'+remarks_lbl+'</font></td>';
						html += '	<td><center>'+removed_btn+'</center></td>';
						html += '</tr>';
					
					$('#tbl_uitem_list tbody').append(html);
					
				}
				
				$("#tbl_uitem_list tbody").on('click', '#btn_remove_item', function(e){ 
					e.preventDefault();
					
					var tr = $(this).closest('tr');
					
					if(confirm($(this).data('confirm'))){
						remove_item($(this).val(), tr);
					} else {
						return false;
					}
				});
				
				
				
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
		// alert(data);
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
						html += '	<td><center><font size="2">'+data['rem_lastupdate'][i]+'</font><center></td>';
						html += '</tr>';
					
					$('#tbl_remarks tbody').append(html);
					
				}
				
			}, error	: function(data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	function get_TS_Section(pattern){

		var data = {
			'action'		: 'get_TS_Section',
			'pattern'		: pattern
		}

		data = $.param(data) + "&" + $(this).serialize();

		$.ajax({
			data	: data,
			success	: function(data){
				
				var ctr = data['ctr'];

				$('#id_ts_product').empty();

				for(i=0;i<ctr;i++){
					var html = '<option>'+data['section'][i]+'</option>';
					$('#id_ts_product').append(html);
				}

			},
			error	: function(data){
				alert("Handler Failed!");
				console.log(data);
			}

		});
	}
	
	function get_update_TS_Section(pattern){

		var data = {
			'action'		: 'get_TS_Section',
			'pattern'		: pattern
		}

		data = $.param(data) + "&" + $(this).serialize();

		$.ajax({
			data	: data,
			success	: function(data){
				
				var ctr = data['ctr'];

				$('#id_uts_product').empty();

				for(i=0;i<ctr;i++){
					var html = '<option>'+data['section'][i]+'</option>';
					$('#id_uts_product').append(html);
				}

			},
			error	: function(data){
				alert("Handler Failed!");
				console.log(data);
			}

		});
	}
	
	/* Email Notification */
	function send_email_from_requestor(pkid){
				
		var data = {
			'action'	: 'send_email_from_requestor',
			'pkid'		: pkid
		}

		data = $.param(data);
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(result){
				console.log(result);
				
				window.location.reload();
				display_request();

			},
			error	: function(result){
				alert('Error found in sending email');
				console.log(result);
			}
		});
		
	}
	
	function send_email_update_from_requestor(pkid){
				
		var data = {
			'action'	: 'send_email_update_from_requestor',
			'pkid'		: pkid
		}

		data = $.param(data);
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(result){
				console.log(result);
				
				window.location.reload();
				display_request();

			},
			error	: function(result){
				alert('Error found in sending email');
				console.log(result);
			}
		});
		
	}
	
	function send_email_conformed_from_requestor(id_request){
		
		var data = {
			'action'	: 'send_email_conformed_from_requestor',
			'pkid'		: id_request
		}

		data = $.param(data);
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(result){
				console.log(result);
				
				window.location.reload();
				display_request();

			},
			error	: function(result){
				alert('Error found in sending email');
				console.log(result);
			}
		});
		
	}
	
	/* Notif */
	function notif_success(){
		notif({
		msg: "<strong>System: </strong> Successfully Added!",
		type: "success",
		position: "center",
		timeout: "3000"
		});
	}
	
	function notif_conformed(){
		notif({
		msg: "<strong>System: </strong> Successfully Conformed! Email sent!",
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
	
	function notif_no_dept(){
		notif({
		msg: "<strong>System: </strong> Please select Department!",
		type: "warning",
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
	
	function notif_email_success(){
		notif({
		msg: "<strong>System: </strong> Transaction successful! Email sent!",
		type: "success",
		position: "center",
		timeout: "3000"
		});
	}
	
	function notif_success_update(){
		notif({
		msg: "<strong>System: </strong> Successfully Updated! Email sent!",
		type: "success",
		position: "center",
		timeout: "3000"
		});
	}
	
	
	
	
	
	
	
	