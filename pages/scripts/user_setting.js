
	$.ajaxSetup({
		type	: 'post',
		dataType: 'json',
		url		: '../handler/handler.php',
	});
	
	var id_user_setting = '';

	$(document).ready(function(){
		
		$("#id_btn_add_new_user").click(function(){
			$('#id_new_user_modal_show').modal('show');
		});	
		
		$('#id_btn_back_to_dashboard').click(function(){
			window.location.href = "db_selection.php";
		});

	});	
		
	/* Display */
	display_user_setting();
	function display_user_setting(){
		
		var data = {
			'action'	: 'display_user_setting'
		}
		
		data = $.param(data);		
		$.ajax({
			
			data	: data,
			success	: function(data){
				// console.log(data);
				
				var ctr = data['ctr'];
				
				$('#container_display_user_setting').empty();
				
				var content  = '<table id="tbl_user_setting" class="table table-striped table-hover" style="padding: 20px; margin-right: 20px; font-size: 12px;">';
					content += '	<thead>';
					content += '		<tr>';
					content += '			<th><center>STATUS</center></th>';
					content += '			<th><center>REQUESTOR NAME</center></th>';
					content += '			<th><center>REQUESTOR USERNAME</center></th>';
					content += '			<th><center>SUPERIOR NAME</center></th>';
					content += '			<th><center>SUPERIOR USERNAME</center></th>';
					content += '			<th><center>ACTIONS</center></th>';
					content += '		</tr>';
					content += '	</thead>';
					content += '	<tbody>';
					content += '	</tbody>';
					content += '</table>';
					
				$('#container_display_user_setting').append(content);
				
				for(i=0;i<ctr;i++){
							
				var edit_user_setting 		= '<button class="btn btn-link" id="btn_edit_user_setting" style="border-radius: 0px;" title= "Edit user setting" value='+data['id'][i]+'> <i class="fa fa-pencil-square-o" style="color:#0D2DEA"></i> </button>';
				var delete_user_setting	 	= '<button class="btn btn-link" id="btn_delete_user_setting" style="border-radius: 0px;" title= "Delete user setting" value='+data['id'][i]+' data-confirm="Are you sure you want to delete this user?"> <i class="fa fa-trash" style="color:#FF0000"></i> </button>';
				
				var logdel = data['logdel'][i];
				if ( logdel == '0'){
					var logdel_lbl = '<font color="green"><b> Active </b></font>';
				}else if ( logdel == '1'){
					var logdel_lbl = '<font color="red"><b> Inactive </b></font>';
				}
				
				var values  = '<tr id='+data['id'][i]+'>';
					values += '		<td><center>'+logdel_lbl+'</center></td>';
					values += '		<td><center>'+data['requestor_name'][i]+'</center></td>';
					values += '		<td><center>'+data['requestor_username'][i]+'</center></td>';
					values += '		<td><center>'+data['superior_name'][i]+'</center></td>';
					values += '		<td><center>'+data['superior_username'][i]+'</center></td>';
					values += '		<td><center>'+edit_user_setting+ '' +delete_user_setting+'</center></td>';
					values += '</tr>';
					
					$('#tbl_user_setting tbody').append(values);
				}
				
				$("#tbl_user_setting tbody").on('click','tr #btn_edit_user_setting', function(e){
					e.preventDefault();
					view_edit_user_setting($(this).val());	
				});
				
				$("#tbl_user_setting tbody").on('click','tr #btn_delete_user_setting', function(e){
					
					if(confirm($(this).data('confirm'))){
						e.preventDefault();
					} else {
						return false;
					}	
		
					view_delete_user_setting($(this).val());	
					
				});
				
				$('#tbl_user_setting').DataTable({ 
					paginate: true, 
					aaSorting: [],
				 });
				 				
			},
			error	: function(data){
				console.log(data);
			}
		});
		
	}
	
	function view_edit_user_setting(id_user_setting) {
		
		var data = {
			"action"		 : "view_edit_user_setting",
			"id"			 : id_user_setting
		}
		
		data = $.param(data);
		$.ajax({
			data		: data,
			success		: function (data) {
				// console.log(data);
				
				$('#id_urequestor_name').val(data['requestor_name']);
				$('#id_uhidden_req_username').val(data['requestor_username']);
				$('#id_usuperior_name').val(data['superior_name']);
				$('#id_uhidden_superior_username').val(data['superior_username']);
				
				$('#hidden_id_user_setting').val(id_user_setting);
				$("#id_update_user_modal_show").modal();		

			}, error	: function (data) {
			alert('ERROR: '+data);
			}
		});
	}
	
	$('#id_form_update_user').submit(function(e){
		
		if(confirm($(this).data('confirm'))){
			e.preventDefault();
		} else {
			return false;
		}	
		
		id_user_setting = $('#hidden_id_user_setting').val();
		
		var data = {
			'action'			: 'update_user_setting',
			'id'				: id_user_setting
		}
		
		data = $.param(data) + "&" + $(this).serialize();
		$.ajax({
			
			data	: data,
			success	: function(output){
				// console.log(output);
				
				notif_success_update();
				$('#id_update_user_modal_show').modal('hide');
				
				display_user_setting();
		
			},
			error	: function(output){
				console.log(output);
			}
		});
		
	});
	
	$('#id_form_new_user').submit(function(e){
		
		if(confirm($(this).data('confirm'))){
			e.preventDefault();
		} else {
			return false;
		}	
		
		var serialData = $(this).serialize();
		add_user_setting(serialData);
		
	}); 
		
	function add_user_setting(serialData){
	
		var data = {
			'action'	: 'add_user_setting'
		}
		
		data = $.param(data) + "&" + serialData;
		// alert(data);
		$.ajax({
		
			data	: data,
			success	: function(data){
				// console.log(data);
			
				notif_successfully_added();
				$('#id_new_user_modal_show').modal('hide');
				display_user_setting();
				
			},
			error	: function(data){
				console.log(data);
				
			}
			
		});
	
	}
	
	/* ADD - Datalist for Requestor */
	$('input#id_requestor_name').keyup(function(e){
		
		var key_requestor = e.which;
		if(key_requestor != 38 && key_requestor != 40){
			var requestor_pattern = $(this).val();
			getRequestor(requestor_pattern);
		}
		
	});
	
	function getRequestor(requestor_pattern){

		var data = {
			'action'		: 'getRequestor',
			'pattern'		: requestor_pattern
		}

		data = $.param(data);
		// alert(data);
		$.ajax({
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr = data['ctr'];

				$('#id_list_requestor_name').empty();
				$('#id_hidden_req_username').val("");
				
				for(i=0;i<ctr;i++){
					var html = '<option>'+data['name'][i]+'</option>';
					$('#id_hidden_req_username').val("");
					$('#id_hidden_req_username').val(data['username'][i]);
					$('#id_list_requestor_name').append(html);
				}
				

			},
			error	: function(data){
				alert("Handler Failed!");
				console.log(data);
			}

		});
	}

	/* ADD - Datalist for Superior */
	$('input#id_superior_name').keyup(function(e){
		
		var key_superior = e.which;
		if(key_superior != 38 && key_superior != 40){
			var superior_pattern = $(this).val();
			getSuperior(superior_pattern);
		}
		
	});
	
	function getSuperior(superior_pattern){

		var data = {
			'action'		: 'getRequestor',
			'pattern'		: superior_pattern
		}

		data = $.param(data);
		$.ajax({
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr = data['ctr'];

				$('#id_list_superior_name').empty();
				$('#id_hidden_superior_username').val("");
				
				for(i=0;i<ctr;i++){
					var html = '<option>'+data['name'][i]+'</option>';
					$('#id_hidden_superior_username').val("");
					$('#id_hidden_superior_username').val(data['username'][i]);
					$('#id_list_superior_name').append(html);
				}
				

			},
			error	: function(data){
				alert("Handler Failed!");
				console.log(data);
			}

		});
	}
	
	/* UPDATE - Datalist for Requestor */
	$('input#id_urequestor_name').keyup(function(e){
		
		var key_urequestor = e.which;
		if(key_urequestor != 38 && key_urequestor != 40){
			var urequestor_pattern = $(this).val();
			getURequestor(urequestor_pattern);
		}
		
	});
	
	function getURequestor(urequestor_pattern){

		var data = {
			'action'		: 'getRequestor',
			'pattern'		: urequestor_pattern
		}

		data = $.param(data);
		$.ajax({
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr = data['ctr'];

				$('#id_ulist_requestor_name').empty();
				$('#id_uhidden_req_username').val("");
				
				for(i=0;i<ctr;i++){
					var html = '<option>'+data['name'][i]+'</option>';
					$('#id_uhidden_req_username').val("");
					$('#id_uhidden_req_username').val(data['username'][i]);
					$('#id_ulist_requestor_name').append(html);
				}
				

			},
			error	: function(data){
				alert("Handler Failed!");
				console.log(data);
			}

		});
	}

	/* UPDATE - Datalist for Superior */
	$('input#id_usuperior_name').keyup(function(e){
		
		var key_usuperior = e.which;
		if(key_usuperior != 38 && key_usuperior != 40){
			var usuperior_pattern = $(this).val();
			getUSuperior(usuperior_pattern);
		}
		
	});
	
	function getUSuperior(usuperior_pattern){

		var data = {
			'action'		: 'getRequestor',
			'pattern'		: usuperior_pattern
		}

		data = $.param(data);
		$.ajax({
			data	: data,
			success	: function(data){
				console.log(data);
				
				var ctr = data['ctr'];

				$('#id_ulist_superior_name').empty();
				$('#id_uhidden_superior_username').val("");
				
				for(i=0;i<ctr;i++){
					var html = '<option>'+data['name'][i]+'</option>';
					$('#id_uhidden_superior_username').val("");
					$('#id_uhidden_superior_username').val(data['username'][i]);
					$('#id_ulist_superior_name').append(html);
				}
				

			},
			error	: function(data){
				alert("Handler Failed!");
				console.log(data);
			}

		});
	}
	
	function view_delete_user_setting(id_user_setting) {
		
		var data = {
			"action"			 : "delete_user_setting",
			"id"				 : id_user_setting
		}
		
		data = $.param(data);
		$.ajax({
			data	: data,
			success	: function (result) {
				console.log(result);
				
				notif_success_removed();
				display_user_setting();
			
			}, error	: function (result) {
			alert('ERROR: '+result);
			}
		});
	}
	
	/* Notif */
	function notif_successfully_added(){
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
		type: "success",
		position: "center",
		timeout: "3000"
		});
	}
	
	