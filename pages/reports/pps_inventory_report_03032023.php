<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    require('../../../media/PHPExcel.php'); //change this with your OOP path
    
	session_start();
	$startDate_inv 	= $_GET['startDate_inv'];
    $endDate_inv    = $_GET['endDate_inv'];
    $drp_remarks	= $_GET['drp_remarks'];

    $year = date('Y');
    // echo $year;
    // exit;
	$cYear = date('Y', strtotime($startDate_inv));
   	$cMonth = date('m', strtotime($startDate_inv));

	$lastmonthBOH = date('Y-m-d', strtotime($startDate_inv." -1 month "));
	
	//- last 3 months
	$last3monthBOH 		= date('Y-m-d', strtotime($startDate_inv." -4 month "));		
	$startDate_3m 		= date('Y-m-01', strtotime($startDate_inv." -3 month "));
	$endDate_3m 		= date('Y-m-01', strtotime($startDate_inv." -2 month"));
	$endDate_3m 		= date('Y-m-d', strtotime($endDate_3m." -1 day"));

	// echo $last3monthBOH.' '.$startDate_3m.' '.$endDate_3m;
	// exit;
	
    $cYear_3m 	= date('Y', strtotime($startDate_inv." -3 month "));
    $cMonth_3m 	= date('m', strtotime($startDate_inv." -3 month "));
   
   //- last 2 months
   	// $last2monthBOH 		= date('Y-m-d', strtotime($startDate_inv." -3 month "));	//-0703	
   	$last2monthBOH 		= date('m', strtotime($startDate_inv." -3 month "));	//-0703	
	$startDate_2m 		= date('Y-m-01', strtotime($startDate_inv." -2 month "));
	$endDate_2m 		= date('Y-m-01', strtotime($startDate_inv." -1 month"));
	$endDate_2m 		= date('Y-m-d', strtotime($endDate_2m." -1 day"));

	// echo $last2monthBOH.' '.$cYear_3m;
	// exit;

    $cYear_2m 	= date('Y', strtotime($startDate_inv." -2 month "));
    $cMonth_2m 	= date('m', strtotime($startDate_inv." -2 month "));
	
	// echo $cMonth_2m.' '.$cYear_2m;
	// exit;

    //- last 1 month
  	$last1monthBOH 		= date('Y-m-d', strtotime($startDate_inv." -2 month "));		
	$startDate_1m 		= date('Y-m-01', strtotime($startDate_inv." -1 month "));
	$endDate_1m 		= date('Y-m-01', strtotime($startDate_inv));
	$endDate_1m 		= date('Y-m-d', strtotime($endDate_1m." -1 day"));

    $last1yrBOH 	= date('Y', strtotime($startDate_inv." -1 month "));

    $cYear_1m 	= date('Y', strtotime($startDate_inv." -1 month "));
    $cMonth_1m 	= date('m', strtotime($startDate_inv." -1 month "));

// echo $last1monthBOH.' '.$last1yrBOH;
// 	exit;

    // $max_date = date('Y-m-01', strtotime($endDate_1m.' +1 month'));
    // $endDate_1m = date('Y-m-d', strtotime($max_date.' -1 day'));


	// echo $startDate_3m;
	// echo $endDate_3m;
	// exit;	

	//- get last 3 months for MAU	
	$pps_1prev_month = date('m', strtotime($startDate_inv." -1 month"));
	if ( $pps_1prev_month == '1'){
		$pps_1prev_month = 'January';
	}else if ( $pps_1prev_month == '2'){
		$pps_1prev_month = 'February';
	}else if ( $pps_1prev_month == '3'){
		$pps_1prev_month = 'March';
	}else if ( $pps_1prev_month == '4'){
		$pps_1prev_month = 'April';
	}else if ( $pps_1prev_month == '5'){
		$pps_1prev_month = 'May';
	}else if ( $pps_1prev_month == '6'){
		$pps_1prev_month = 'June';
	}else if ( $pps_1prev_month == '7'){
		$pps_1prev_month = 'July';
	}else if ( $pps_1prev_month == '8'){
		$pps_1prev_month = 'August';
	}else if ( $pps_1prev_month == '9'){
		$pps_1prev_month = 'September';
	}else if ( $pps_1prev_month == '10'){
		$pps_1prev_month = 'October';
	}else if ( $pps_1prev_month == '11'){
		$pps_1prev_month = 'November';
	}else if ( $pps_1prev_month == '12'){
		$pps_1prev_month = 'December';
	}
	$pps_2prev_month = date('m', strtotime($startDate_inv." -2 month"));
	if ( $pps_2prev_month == '1'){
		$pps_2prev_month = 'January';
	}else if ( $pps_2prev_month == '2'){
		$pps_2prev_month = 'February';
	}else if ( $pps_2prev_month == '3'){
		$pps_2prev_month = 'March';
	}else if ( $pps_2prev_month == '4'){
		$pps_2prev_month = 'April';
	}else if ( $pps_2prev_month == '5'){
		$pps_2prev_month = 'May';
	}else if ( $pps_2prev_month == '6'){
		$pps_2prev_month = 'June';
	}else if ( $pps_2prev_month == '7'){
		$pps_2prev_month = 'July';
	}else if ( $pps_2prev_month == '8'){
		$pps_2prev_month = 'August';
	}else if ( $pps_2prev_month == '9'){
		$pps_2prev_month = 'September';
	}else if ( $pps_2prev_month == '10'){
		$pps_2prev_month = 'October';
	}else if ( $pps_2prev_month == '11'){
		$pps_2prev_month = 'November';
	}else if ( $pps_2prev_month == '12'){
		$pps_2prev_month = 'December';
	}
	$pps_3prev_month = date('m', strtotime($startDate_inv." -3 month"));
	if ( $pps_3prev_month == '1'){
		$pps_3prev_month = 'January';
	}else if ( $pps_3prev_month == '2'){
		$pps_3prev_month = 'February';
	}else if ( $pps_3prev_month == '3'){
		$pps_3prev_month = 'March';
	}else if ( $pps_3prev_month == '4'){
		$pps_3prev_month = 'April';
	}else if ( $pps_3prev_month == '5'){
		$pps_3prev_month = 'May';
	}else if ( $pps_3prev_month == '6'){
		$pps_3prev_month = 'June';
	}else if ( $pps_3prev_month == '7'){
		$pps_3prev_month = 'July';
	}else if ( $pps_3prev_month == '8'){
		$pps_3prev_month = 'August';
	}else if ( $pps_3prev_month == '9'){
		$pps_3prev_month = 'September';
	}else if ( $pps_3prev_month == '10'){
		$pps_3prev_month = 'October';
	}else if ( $pps_3prev_month == '11'){
		$pps_3prev_month = 'November';
	}else if ( $pps_3prev_month == '12'){
		$pps_3prev_month = 'December';
	}


   $scur_month = date('m', strtotime($startDate_inv));
	if ( $scur_month == '1'){
		$scur_month_lbl = 'January';
	}else if ( $scur_month == '2'){
		$scur_month_lbl = 'February';
	}else if ( $scur_month == '3'){
		$scur_month_lbl = 'March';
	}else if ( $scur_month == '4'){
		$scur_month_lbl = 'April';
	}else if ( $scur_month == '5'){
		$scur_month_lbl = 'May';
	}else if ( $scur_month == '6'){
		$scur_month_lbl = 'June';
	}else if ( $scur_month == '7'){
		$scur_month_lbl = 'July';
	}else if ( $scur_month == '8'){
		$scur_month_lbl = 'August';
	}else if ( $scur_month == '9'){
		$scur_month_lbl = 'September';
	}else if ( $scur_month == '10'){
		$scur_month_lbl = 'October';
	}else if ( $scur_month == '11'){
		$scur_month_lbl = 'November';
	}else if ( $scur_month == '12'){
		$scur_month_lbl = 'December';
	}


   $cur_month = date('m', strtotime($endDate_inv));
	if ( $cur_month == '1'){
		$cur_month_lbl = 'January';
	}else if ( $cur_month == '2'){
		$cur_month_lbl = 'February';
	}else if ( $cur_month == '3'){
		$cur_month_lbl = 'March';
	}else if ( $cur_month == '4'){
		$cur_month_lbl = 'April';
	}else if ( $cur_month == '5'){
		$cur_month_lbl = 'May';
	}else if ( $cur_month == '6'){
		$cur_month_lbl = 'June';
	}else if ( $cur_month == '7'){
		$cur_month_lbl = 'July';
	}else if ( $cur_month == '8'){
		$cur_month_lbl = 'August';
	}else if ( $cur_month == '9'){
		$cur_month_lbl = 'September';
	}else if ( $cur_month == '10'){
		$cur_month_lbl = 'October';
	}else if ( $cur_month == '11'){
		$cur_month_lbl = 'November';
	}else if ( $cur_month == '12'){
		$cur_month_lbl = 'December';
	}

 
    mysql_connect('localhost', 'root', 'r@p1d0nl1n3');
    mysql_select_db('db_imi_pps');

    $objPHPExcel = new PHPExcel;
    $objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
    
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

    // $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setVisible(false);
    $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setVisible(false);
    $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setVisible(false);
    $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setVisible(false);


    $objWorkSheet = $objPHPExcel->getActiveSheet();
    $title = "PPS IMI Quantity Report"; //set title cont.
    $objWorkSheet->setTitle($title); //set title cont.

    $styleArray = array(
      'borders' => array(
        'allborders' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN //set borders
        )
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID, //set back color
        'color' => array('rgb'=>'FFFFFF'),
        )
    );

    $OutlineStyle = array(
	  'borders' => array(
		'outline' => array(
		  'style' => PHPExcel_Style_Border::BORDER_THIN
		)
	  )
	);

 

    $objWorkSheet->getColumnDimension('A')->setWidth(25);
    $objWorkSheet->getColumnDimension('B')->setWidth(10);
    $objWorkSheet->getColumnDimension('C')->setWidth(15);
    $objWorkSheet->getColumnDimension('D')->setWidth(10);
    $objWorkSheet->getColumnDimension('E')->setWidth(10);
    $objWorkSheet->getColumnDimension('F')->setWidth(10);
    $objWorkSheet->getColumnDimension('G')->setWidth(15);
    $objWorkSheet->getColumnDimension('H')->setWidth(10);
    $objWorkSheet->getColumnDimension('I')->setWidth(10);
    $objWorkSheet->getColumnDimension('J')->setWidth(10);
    $objWorkSheet->getColumnDimension('K')->setWidth(10);
    $objWorkSheet->getColumnDimension('L')->setWidth(10);
    $objWorkSheet->getColumnDimension('M')->setWidth(10);
    $objWorkSheet->getColumnDimension('N')->setWidth(10);
    $objWorkSheet->getColumnDimension('O')->setWidth(10);
    $objWorkSheet->getColumnDimension('P')->setWidth(10);
    $objWorkSheet->getColumnDimension('Q')->setWidth(10);
    $objWorkSheet->getColumnDimension('R')->setWidth(10);
    $objWorkSheet->getColumnDimension('S')->setWidth(15);
    $objWorkSheet->getColumnDimension('T')->setWidth(15);
    $objWorkSheet->getColumnDimension('U')->setWidth(15);
    $objWorkSheet->getColumnDimension('V')->setWidth(15);
	
  
    $objWorkSheet->setCellValue('A1', 'PPS INDIRECT MATERIALS CONSUMPTION REPORT');
    $objWorkSheet->setCellValue('A2', "Month of: $scur_month_lbl $cYear");
    $objWorkSheet->setCellValue('A3', 'ITEM NAME');
    $objWorkSheet->setCellValue('B3', 'UOM');
    $objWorkSheet->setCellValue('C3', 'UNIT PRICE $');
    $objWorkSheet->setCellValue('D3', 'CENTRAL BOH');
    $objWorkSheet->setCellValue('E3', 'PROD. BOH');
    $objWorkSheet->setCellValue('F3', 'TOTAL BOH');
    $objWorkSheet->setCellValue('G3', 'INVOICE NO.');
    $objWorkSheet->setCellValue('H3', "RECEIVED QTY");
    $objWorkSheet->setCellValue('I3', 'CENTRAL QTY ISSUED');
    $objWorkSheet->setCellValue('J3', 'ACTUAL USAGE');
    $objWorkSheet->setCellValue('K3', 'EOH');
    $objWorkSheet->setCellValue('K4', 'PROD');
    $objWorkSheet->setCellValue('L4', 'CENTRAL');
    $objWorkSheet->setCellValue('M3', 'OVERALL TOTAL EOH');
    $objWorkSheet->setCellValue('N3', 'ROP');
	$objWorkSheet->setCellValue('O3', 'FOR PR');
	$objWorkSheet->setCellValue('P3', 'MONTHLY ACTUAL USAGE');
	$objWorkSheet->setCellValue('P4', $pps_3prev_month);
	$objWorkSheet->setCellValue('Q4', $pps_2prev_month);
	$objWorkSheet->setCellValue('R4', $pps_1prev_month);
	$objWorkSheet->setCellValue('S3', 'Ave. Month Consumption');
	$objWorkSheet->setCellValue('S4', '(B = A/3mos.)');
	$objWorkSheet->setCellValue('T3', 'Daily Usage AMC');
	$objWorkSheet->setCellValue('T4', '(C=B/30days)');
	$objWorkSheet->setCellValue('U3', 'Safety Stock Daily Usage');
	$objWorkSheet->setCellValue('U4', '(D=Cx30days)');
	$objWorkSheet->setCellValue('V3', 'New ROP Daily Usage');
	$objWorkSheet->setCellValue('V4', '(E=Cx90days)');
	
	//-title  
    $objWorkSheet->getStyle('A1:V1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objWorkSheet->getStyle('A3:V4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
    $objWorkSheet->getStyle('A1:V1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objWorkSheet->getStyle('A3:V4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 	

    $objWorkSheet->getStyle('A3:V4')->applyFromArray($styleArray);
    $objWorkSheet->getStyle('A1:V2')->applyFromArray($OutlineStyle);

    $objWorkSheet->getStyle('A1:V4')->getAlignment()->setWrapText(true);
   
    $objWorkSheet->mergeCells('A1:V1');
    $objWorkSheet->mergeCells('A2:V2');
    $objWorkSheet->mergeCells('A3:A4');
    $objWorkSheet->mergeCells('B3:B4');
    $objWorkSheet->mergeCells('C3:C4');
    $objWorkSheet->mergeCells('D3:D4');
    $objWorkSheet->mergeCells('E3:E4');
    $objWorkSheet->mergeCells('F3:F4');
    $objWorkSheet->mergeCells('G3:G4');
    $objWorkSheet->mergeCells('H3:H4');
    $objWorkSheet->mergeCells('I3:I4');
    $objWorkSheet->mergeCells('J3:J4');
    $objWorkSheet->mergeCells('K3:L3');
    $objWorkSheet->mergeCells('M3:M4');
    $objWorkSheet->mergeCells('N3:N4');
    $objWorkSheet->mergeCells('O3:O4');
    $objWorkSheet->mergeCells('P3:R3');

    $objWorkSheet->getStyle('A1:V1')->getFont()->setBold(true)->setSize(16);
    $objWorkSheet->getStyle('A2:V2')->getFont()->setBold(true)->setSize(10);
    $objWorkSheet->getStyle('A3:V4')->getFont()->setBold(true);


		$ctrRow = 5;
			
		$sql = "SELECT a.*, b.* FROM tbl_material_list a 
				INNER JOIN  tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 	
				WHERE a.mat_logdel = '0' and 
				b.mp_logdel = '0' and
				a.mat_pps_product = '1'
				ORDER BY a.mat_product_desc, a.mat_product_specs ASC";
					
		$result = mysql_query($sql);
        while ($row = mysql_fetch_array($result)) {
			
			$mp_pkid 				= $row['mp_pkid'];
			$mp_unit_price_dollor 	= $row['mp_unit_price_dollor'];
				
			//Border
			$objWorkSheet->getStyle('A'.$ctrRow.':V'.$ctrRow)->applyFromArray($styleArray);
			
            // Set value
            $objWorkSheet->setCellValue('A'.$ctrRow, $row['mat_product_desc']);
            $objWorkSheet->setCellValue('B'.$ctrRow, $row['mat_uom']);
            $objWorkSheet->setCellValue('C'.$ctrRow, $row['mp_unit_price_dollor']);
			$objWorkSheet->getStyle('C'.$ctrRow)->getNumberFormat()->setFormatCode('0.0000');

			$objWorkSheet->setCellValue('F'.$ctrRow, '=D'.$ctrRow.'+E'.$ctrRow);
			$objWorkSheet->setCellValue('J'.$ctrRow, '=I'.$ctrRow.'-K'.$ctrRow.'+E'.$ctrRow);
			$objWorkSheet->setCellValue('L'.$ctrRow, '=SUM(D'.$ctrRow.'+H'.$ctrRow.')-I'.$ctrRow);
			$objWorkSheet->setCellValue('M'.$ctrRow, '=L'.$ctrRow.'+K'.$ctrRow);
			$objWorkSheet->setCellValue('N'.$ctrRow, '=V'.$ctrRow);
			$objWorkSheet->setCellValue('O'.$ctrRow, '=IF(M'.$ctrRow.'>N'.$ctrRow.',0,(V'.$ctrRow.'))');
			$objWorkSheet->setCellValue('S'.$ctrRow, '=AVERAGE(P'.$ctrRow.':R'.$ctrRow.')');  
			$objWorkSheet->setCellValue('T'.$ctrRow, '=S'.$ctrRow.'/30');  
			$objWorkSheet->setCellValue('U'.$ctrRow, '=T'.$ctrRow.'*30');  
			$objWorkSheet->setCellValue('V'.$ctrRow, '=T'.$ctrRow.'*90');  

			$objWorkSheet->getStyle('D'.$ctrRow.':F'.$ctrRow)->getNumberFormat()->setFormatCode('#,##0;[red](#,##0)');
			$objWorkSheet->getStyle('H'.$ctrRow.':V'.$ctrRow)->getNumberFormat()->setFormatCode('#,##0;[red](#,##0)');

			/* Central BOH previous month */ 
			$sql_a = "SELECT c.*, (SUM(c.trans_pps_in) - SUM(c.trans_pps_out)) AS ttl_pps_eoh_prv_month
					FROM `tbl_material_list` a 
					INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
					INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
					WHERE a.mat_pps_product = '1' AND
					c.trans_pps_date_transaction < '$startDate_inv' AND 
					c.trans_pps_fkid_material = '$mp_pkid' AND 
					c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material
						ORDER BY a.mat_product_desc ASC";
				
			$result_a = mysql_query($sql_a);
			if ($row_a = mysql_fetch_array($result_a)) {
								
				$objWorkSheet->setCellValue('D'.$ctrRow, $row_a['ttl_pps_eoh_prv_month']);

			}

			/* Production BOH previous month */ 
			$sql_a2 = "SELECT c.ppi_eoh
					FROM `tbl_material_list` a 
					INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
					INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
					WHERE a.mat_pps_product = '1' AND
					MONTH(c.ppi_date) = MONTH('$lastmonthBOH') AND 
					-- YEAR(c.ppi_date) = '$cYear' AND 
					YEAR(c.ppi_date) = '$cYear_1m' AND 
					c.ppi_fkid_mlp = '$mp_pkid' AND 
					c.logdel = '0'
						GROUP BY c.ppi_fkid_mlp
						ORDER BY a.mat_product_desc ASC";
				
			$result_a2 = mysql_query($sql_a2);
			if ($row_a2 = mysql_fetch_array($result_a2)) {
								
				$objWorkSheet->setCellValue('E'.$ctrRow, $row_a2['ppi_eoh']);

			}

			/* Production EOH previous month */ 
			$sql_a3 = "SELECT c.ppi_eoh 
					FROM `tbl_material_list` a 
					INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
					INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
					WHERE a.mat_pps_product = '1' AND
					MONTH(c.ppi_date) = '$cMonth' AND 
					YEAR(c.ppi_date) = '$cYear' AND 
					c.ppi_fkid_mlp = '$mp_pkid' AND 
					c.logdel = '0'
						GROUP BY c.ppi_fkid_mlp
						ORDER BY a.mat_product_desc ASC";
				
			$result_a3 = mysql_query($sql_a3);
			if ($row_a3 = mysql_fetch_array($result_a3)) {
								
				$objWorkSheet->setCellValue('K'.$ctrRow, $row_a3['ppi_eoh']);

			}

			/* Receive */
			$sql_b = "SELECT c.*, SUM(c.rm_pps_rcv_qty) as rm_pps_rcv_qty_ttl, group_concat(rm_pps_invoice_num SEPARATOR ' / ') AS rm_pps_invoice_num
					FROM `tbl_material_list` a 
					INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
					INNER JOIN tbl_receive_materials_PPS c ON c.rm_pps_fkid_material = b.mp_pkid
					WHERE a.mat_pps_product = '1' AND 
					(c.rm_pps_date_received BETWEEN '$startDate_inv' AND '$endDate_inv') AND 
					rm_pps_fkid_material = '$mp_pkid' AND 
					(c.rm_pps_remarks <> 'Central BOH' or 
					c.rm_pps_remarks <> 'July Actual Usage' or 
					c.rm_pps_remarks <> 'August Actual Usage' or 
					c.rm_pps_remarks <> 'September Actual Usage')
					GROUP BY c.rm_pps_fkid_material
					ORDER BY `c`.`rm_pps_remarks` ASC";	
								
			$result_b = mysql_query($sql_b);
			while ($row_b = mysql_fetch_array($result_b)) {
				
			    $objWorkSheet->getStyle('G'.$ctrRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				$objWorkSheet->setCellValue('G'.$ctrRow, $row_b['rm_pps_invoice_num']);
				$objWorkSheet->setCellValue('H'.$ctrRow, $row_b['rm_pps_rcv_qty_ttl']);
			
			}

			/* Withdraw */
			$sql_c = "SELECT SUM(c.trans_pps_out) as trans_pps_product_ttl_out 
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								(c.trans_pps_date_transaction BETWEEN '$startDate_inv' AND '$endDate_inv') AND 
								c.trans_pps_dept = '' AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material ASC";				
						
			$result_c = mysql_query($sql_c);
			if ($row_c = mysql_fetch_array($result_c)) {
								
				$objWorkSheet->setCellValue('I'.$ctrRow, $row_c['trans_pps_product_ttl_out']);
				
			}

			/* MAU */
			// $sql_d = "SELECT SUM(c.trans_pps_out) as trans_pps_product_ttl_mau, 
			// 		MONTH(c.trans_pps_date_transaction) AS trans_pps_month_transaction,
			// 		YEAR(c.trans_pps_date_transaction) AS trans_pps_year_transaction
			// 			FROM  tbl_material_list a
			// 			INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
			// 			INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
			// 			WHERE a.mat_pps_product = '1' AND
			// 					c.trans_pps_type = '2' AND 
			// 					c.trans_pps_fkid_material = '$mp_pkid' AND 
			// 					YEAR(c.trans_pps_date_transaction) = '$cYear' AND 
			// 					c.trans_pps_dept = '' AND 
			// 					c.trans_pps_logdel = '0'
			// 			GROUP BY c.trans_pps_fkid_material, MONTH(c.trans_pps_date_transaction) ASC";				
			
			//- last 3 months
			$sql_d = "SELECT 
					  (SELECT c.ppi_eoh
						FROM `tbl_material_list` a 
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
						MONTH(c.ppi_date) = MONTH('$last3monthBOH') AND
						YEAR(c.ppi_date) = '$cYear_3m' AND   
						c.ppi_fkid_mlp = '$mp_pkid' AND 
						c.logdel = '0'
							GROUP BY c.ppi_fkid_mlp
							ORDER BY a.mat_product_desc ASC) as boh,

						(SELECT SUM(c.trans_pps_out) as trans_pps_product_ttl_out 
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								(c.trans_pps_date_transaction BETWEEN '$startDate_3m' AND '$endDate_3m') AND 
								c.trans_pps_dept = '' AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material ASC)as qty_issued,

						(SELECT c.ppi_eoh 
						FROM `tbl_material_list` a 
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
						MONTH(c.ppi_date) = '$cMonth_3m' AND 
						YEAR(c.ppi_date) = '$cYear_3m' AND 
						c.ppi_fkid_mlp = '$mp_pkid' AND 
						c.logdel = '0'
							GROUP BY c.ppi_fkid_mlp
							ORDER BY a.mat_product_desc ASC) as eoh,

					MONTH(c.trans_pps_date_transaction) AS trans_pps_month_transaction,
					YEAR(c.trans_pps_date_transaction) AS trans_pps_year_transaction
						
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								
								(c.trans_pps_dept = '' or 
								c.trans_pps_dept = 'N/A') AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material
						";	
						
			$result_d = mysql_query($sql_d);
			if ($row_d = mysql_fetch_array($result_d)) {
								
					$boh 		= $row_d['boh'];
					$qty_issued = $row_d['qty_issued'];
					$eoh 		= $row_d['eoh'];

					$usage1 	= $qty_issued - $eoh;
					$usage2 	= $usage1 + $boh;

				$objWorkSheet->setCellValue('P'.$ctrRow, $usage2);	

			}

			//- last 2 months
			$sql_d = "SELECT 
					  (SELECT c.ppi_eoh
						FROM `tbl_material_list` a 
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
						MONTH(c.ppi_date) = '$last2monthBOH' AND 
						YEAR(c.ppi_date) = '$cYear_3m' AND
						c.ppi_fkid_mlp = '$mp_pkid' AND 
						c.logdel = '0'
							GROUP BY c.ppi_fkid_mlp
							ORDER BY a.mat_product_desc ASC) as boh,

						(SELECT SUM(c.trans_pps_out) as trans_pps_product_ttl_out 
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								(c.trans_pps_date_transaction BETWEEN '$startDate_2m' AND '$endDate_2m') AND 
								c.trans_pps_dept = '' AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material ASC)as qty_issued,

						(SELECT c.ppi_eoh
						FROM `tbl_material_list` a 
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
						MONTH(c.ppi_date) = '$cMonth_2m' AND 
						YEAR(c.ppi_date) = '$cYear_2m' AND 
						c.ppi_fkid_mlp = '$mp_pkid' AND 
						c.logdel = '0'
							GROUP BY c.ppi_fkid_mlp
							ORDER BY a.mat_product_desc ASC) as eoh,

					MONTH(c.trans_pps_date_transaction) AS trans_pps_month_transaction,
					YEAR(c.trans_pps_date_transaction) AS trans_pps_year_transaction
						
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								
								(c.trans_pps_dept = '' or 
								c.trans_pps_dept = 'N/A') AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material
						";	
			
			$result_d = mysql_query($sql_d);
			if ($row_d = mysql_fetch_array($result_d)) {
								
					$boh 		= $row_d['boh'];
					$qty_issued = $row_d['qty_issued'];
					$eoh 		= $row_d['eoh'];


					$usage1 	= $qty_issued - $eoh;
					$usage2 	= $usage1 + $boh;		
					
				
				$objWorkSheet->setCellValue('Q'.$ctrRow, $usage2);	

			}

			//- last 1 month
			$sql_d = "SELECT 

					  (SELECT c.ppi_eoh
						FROM tbl_material_list a 
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
						MONTH(c.ppi_date) = MONTH('$last1monthBOH') AND 
						YEAR(c.ppi_date) = '$last1yrBOH' AND  
						-- MONTH(c.ppi_date) = '12' AND 
						-- YEAR(c.ppi_date) = '2021' AND  
						c.ppi_fkid_mlp = '$mp_pkid' AND 
						c.logdel = '0'
							GROUP BY c.ppi_fkid_mlp
							ORDER BY a.mat_product_desc ASC) as boh,

						(SELECT SUM(c.trans_pps_out) as trans_pps_product_ttl_out 
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								(c.trans_pps_date_transaction BETWEEN '$startDate_1m' AND '$endDate_1m') AND 
								c.trans_pps_dept = '' AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material ASC)as qty_issued,

						(SELECT c.ppi_eoh 
						FROM `tbl_material_list` a 
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
						MONTH(c.ppi_date) = '$cMonth_1m' AND 
						YEAR(c.ppi_date) = '$cYear_1m' AND 
						c.ppi_fkid_mlp = '$mp_pkid' AND 
						c.logdel = '0'
							GROUP BY c.ppi_fkid_mlp
							ORDER BY a.mat_product_desc ASC) as eoh,

					MONTH(c.trans_pps_date_transaction) AS trans_pps_month_transaction,
					YEAR(c.trans_pps_date_transaction) AS trans_pps_year_transaction
						
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								
								(c.trans_pps_dept = '' or 
								c.trans_pps_dept = 'N/A') AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material
						";	
						
			$result_d = mysql_query($sql_d);
			if ($row_d = mysql_fetch_array($result_d)) {
								
					$boh 		= $row_d['boh'];
					$qty_issued = $row_d['qty_issued'];
					$eoh 		= $row_d['eoh'];

					$usage1 	= $qty_issued - $eoh;
					$usage2 	= $usage1 + $boh;

				$objWorkSheet->setCellValue('R'.$ctrRow, $usage2);	

			}

		
			$ctrRow++;
        }
        
        if ($ctrRow >= 5 ){
        	for ($y=5; $y <= $ctrRow-1; $y++) { 
				for($col = 'P'; $col !== 'S'; $col++) {
					$val = $objWorkSheet->getCell($col.$y)->getValue();
					if(!$val){
						$objWorkSheet->setCellValue($col.$y, '0');
					}
				}
			}
        }
        

		/* TOTAL */
		$Total = $ctrRow - 1;
	
		$objWorkSheet->getStyle('D'.$ctrRow.':V'.$ctrRow)->applyFromArray($styleArray);
		$objWorkSheet->getStyle('D'.$ctrRow.':V'.$ctrRow)->getFont()->setBold(true);
		$objWorkSheet->getStyle('D'.$ctrRow.':V'.$ctrRow)->getNumberFormat()->setFormatCode('#,##0;[red](#,##0)');
		$objWorkSheet->setCellValue('D'.$ctrRow, "=SUM(D5:D".$Total.")");
		$objWorkSheet->setCellValue('E'.$ctrRow, "=SUM(E5:E".$Total.")");
		$objWorkSheet->setCellValue('F'.$ctrRow, "=SUM(F5:F".$Total.")");
		$objWorkSheet->setCellValue('H'.$ctrRow, "=SUM(H5:H".$Total.")");
		$objWorkSheet->setCellValue('I'.$ctrRow, "=SUM(I5:I".$Total.")");
		$objWorkSheet->setCellValue('J'.$ctrRow, "=SUM(J5:J".$Total.")");
		$objWorkSheet->setCellValue('K'.$ctrRow, "=SUM(K5:K".$Total.")");
		$objWorkSheet->setCellValue('L'.$ctrRow, "=SUM(L5:L".$Total.")");
		$objWorkSheet->setCellValue('M'.$ctrRow, "=SUM(M5:M".$Total.")");
		$objWorkSheet->setCellValue('N'.$ctrRow, "=SUM(N5:N".$Total.")");
		$objWorkSheet->setCellValue('O'.$ctrRow, "=SUM(O5:O".$Total.")");
		$objWorkSheet->setCellValue('P'.$ctrRow, "=SUM(P5:P".$Total.")");
		$objWorkSheet->setCellValue('Q'.$ctrRow, "=SUM(Q5:Q".$Total.")");
		$objWorkSheet->setCellValue('R'.$ctrRow, "=SUM(R5:R".$Total.")");
		$objWorkSheet->setCellValue('S'.$ctrRow, "=AVERAGE(P".$ctrRow.":R".$ctrRow.")");
		$objWorkSheet->setCellValue('T'.$ctrRow, "=SUM(T5:T".$Total.")");
		$objWorkSheet->setCellValue('U'.$ctrRow, "=SUM(U5:U".$Total.")");
		$objWorkSheet->setCellValue('V'.$ctrRow, "=SUM(V5:V".$Total.")");
		
		$Total++;


		//--------------------------- Amount Report ---------------------------------------//
		$ctrRow_amnt = $Total + 3;

	    $objWorkSheet->setCellValue('A'.$ctrRow_amnt, 'ITEM NAME');
	    $objWorkSheet->setCellValue('B'.$ctrRow_amnt, 'UOM');
	    $objWorkSheet->setCellValue('C'.$ctrRow_amnt, 'UNIT PRICE $');
	    $objWorkSheet->setCellValue('D'.$ctrRow_amnt, 'CENTRAL BOH AMNT');
	    $objWorkSheet->setCellValue('E'.$ctrRow_amnt, 'PROD. BOH AMNT');
	    $objWorkSheet->setCellValue('F'.$ctrRow_amnt, 'TOTAL BOH AMNT');
	    $objWorkSheet->setCellValue('G'.$ctrRow_amnt, 'INVOICE NO.');
	    $objWorkSheet->setCellValue('H'.$ctrRow_amnt, "RECEIVED AMNT");
	    $objWorkSheet->setCellValue('I'.$ctrRow_amnt, 'ACTUAL AMNT ISSUED');
	    $objWorkSheet->setCellValue('J'.$ctrRow_amnt, 'ACTUAL AMNT USED');
	    $objWorkSheet->setCellValue('K'.$ctrRow_amnt, 'EOH');
	    $objWorkSheet->setCellValue('K'.($ctrRow_amnt+1), 'PROD AMNT');
	    $objWorkSheet->setCellValue('L'.($ctrRow_amnt+1), 'CENTRAL AMNT');
	    $objWorkSheet->setCellValue('M'.$ctrRow_amnt, 'OVERALL TOTAL EOH');
	    $objWorkSheet->setCellValue('N'.$ctrRow_amnt, 'ROP');
		$objWorkSheet->setCellValue('O'.$ctrRow_amnt, 'FOR PR');
		$objWorkSheet->setCellValue('P'.$ctrRow_amnt, 'MONTHLY ACTUAL USAGE');
		$objWorkSheet->setCellValue('P'.($ctrRow_amnt+1), $pps_3prev_month);
		$objWorkSheet->setCellValue('Q'.($ctrRow_amnt+1), $pps_2prev_month);
		$objWorkSheet->setCellValue('R'.($ctrRow_amnt+1), $pps_1prev_month);
		$objWorkSheet->setCellValue('S'.$ctrRow_amnt, 'Ave. Month Consumption');
		$objWorkSheet->setCellValue('S'.($ctrRow_amnt+1), '(B = A/3mos.)');
		$objWorkSheet->setCellValue('T'.$ctrRow_amnt, 'Daily Usage AMC');
		$objWorkSheet->setCellValue('T'.($ctrRow_amnt+1), '(C=B/30days)');
		$objWorkSheet->setCellValue('U'.$ctrRow_amnt, 'Safety Stock Daily Usage');
		$objWorkSheet->setCellValue('U'.($ctrRow_amnt+1), '(D=Cx30days)');
		$objWorkSheet->setCellValue('V'.$ctrRow_amnt, 'New ROP Daily Usage');
		$objWorkSheet->setCellValue('V'.($ctrRow_amnt+1), '(E=Cx90days)');

		//-title  
	    $objWorkSheet->getStyle('A'.$ctrRow_amnt.':V'.($ctrRow_amnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	    $objWorkSheet->getStyle('A'.$ctrRow_amnt.':V'.($ctrRow_amnt+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	 	
	    $objWorkSheet->getStyle('A'.$ctrRow_amnt.':V'.($ctrRow_amnt+1))->applyFromArray($styleArray);

	    $objWorkSheet->getStyle('A'.$ctrRow_amnt.':V'.($ctrRow_amnt+1))->getAlignment()->setWrapText(true);
	    $objWorkSheet->getStyle('A'.$ctrRow_amnt.':V'.($ctrRow_amnt+1))->getFont()->setBold(true);

	    $objWorkSheet->mergeCells('A'.$ctrRow_amnt.':A'.($ctrRow_amnt+1));
	    $objWorkSheet->mergeCells('B'.$ctrRow_amnt.':B'.($ctrRow_amnt+1));
	    $objWorkSheet->mergeCells('C'.$ctrRow_amnt.':C'.($ctrRow_amnt+1));
	    $objWorkSheet->mergeCells('D'.$ctrRow_amnt.':D'.($ctrRow_amnt+1));
	    $objWorkSheet->mergeCells('E'.$ctrRow_amnt.':E'.($ctrRow_amnt+1));
	    $objWorkSheet->mergeCells('F'.$ctrRow_amnt.':F'.($ctrRow_amnt+1));
	    $objWorkSheet->mergeCells('G'.$ctrRow_amnt.':G'.($ctrRow_amnt+1));
	    $objWorkSheet->mergeCells('H'.$ctrRow_amnt.':H'.($ctrRow_amnt+1));
	    $objWorkSheet->mergeCells('I'.$ctrRow_amnt.':I'.($ctrRow_amnt+1));
	    $objWorkSheet->mergeCells('J'.$ctrRow_amnt.':J'.($ctrRow_amnt+1));
	    $objWorkSheet->mergeCells('K'.$ctrRow_amnt.':L'.$ctrRow_amnt);
	    $objWorkSheet->mergeCells('M'.$ctrRow_amnt.':M'.($ctrRow_amnt+1));
	    $objWorkSheet->mergeCells('N'.$ctrRow_amnt.':N'.($ctrRow_amnt+1));
	    $objWorkSheet->mergeCells('O'.$ctrRow_amnt.':O'.($ctrRow_amnt+1));
	    $objWorkSheet->mergeCells('P'.$ctrRow_amnt.':R'.$ctrRow_amnt);

		$ctrRow_amnt = $ctrRow_amnt + 2;

		$sql_amnt = "SELECT a.*, b.* FROM tbl_material_list a 
				INNER JOIN  tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 	
				WHERE a.mat_logdel = '0' and 
				b.mp_logdel = '0' and
				a.mat_pps_product = '1'
				ORDER BY a.mat_product_desc, a.mat_product_specs ASC";
					
		$result_amnt = mysql_query($sql_amnt);
        while ($row_amnt = mysql_fetch_array($result_amnt)) {
			
			$mp_pkid 				= $row_amnt['mp_pkid'];
			$mp_unit_price_dollor 	= $row_amnt['mp_unit_price_dollor'];
				
			//Border
			$objWorkSheet->getStyle('A'.$ctrRow_amnt.':V'.$ctrRow_amnt)->applyFromArray($styleArray);
			
            // Set value
            $objWorkSheet->setCellValue('A'.$ctrRow_amnt, $row_amnt['mat_product_desc']);
            $objWorkSheet->setCellValue('B'.$ctrRow_amnt, $row_amnt['mat_uom']);
            $objWorkSheet->setCellValue('C'.$ctrRow_amnt, $row_amnt['mp_unit_price_dollor']);
			$objWorkSheet->getStyle('C'.$ctrRow_amnt)->getNumberFormat()->setFormatCode('0.0000');

			$objWorkSheet->setCellValue('F'.$ctrRow_amnt, '=D'.$ctrRow_amnt.'+E'.$ctrRow_amnt);
			$objWorkSheet->setCellValue('J'.$ctrRow_amnt, '=I'.$ctrRow_amnt.'-K'.$ctrRow_amnt.'+E'.$ctrRow_amnt);
			$objWorkSheet->setCellValue('L'.$ctrRow_amnt, '=SUM(D'.$ctrRow_amnt.'+H'.$ctrRow_amnt.')-I'.$ctrRow_amnt);
			$objWorkSheet->setCellValue('M'.$ctrRow_amnt, '=L'.$ctrRow_amnt.'+K'.$ctrRow_amnt);
			$objWorkSheet->setCellValue('N'.$ctrRow_amnt, '=V'.$ctrRow_amnt);
			$objWorkSheet->setCellValue('O'.$ctrRow_amnt, '=IF(M'.$ctrRow_amnt.'>N'.$ctrRow_amnt.',0,(V'.$ctrRow_amnt.'))');
			$objWorkSheet->setCellValue('S'.$ctrRow_amnt, '=AVERAGE(P'.$ctrRow_amnt.':R'.$ctrRow_amnt.')');  
			$objWorkSheet->setCellValue('T'.$ctrRow_amnt, '=S'.$ctrRow_amnt.'/30');  
			$objWorkSheet->setCellValue('U'.$ctrRow_amnt, '=T'.$ctrRow_amnt.'*30');  
			$objWorkSheet->setCellValue('V'.$ctrRow_amnt, '=T'.$ctrRow_amnt.'*90');  

			$objWorkSheet->getStyle('D'.$ctrRow_amnt.':F'.$ctrRow_amnt)->getNumberFormat()->setFormatCode('#,##0.00;[red](#,##0.00)');
			$objWorkSheet->getStyle('H'.$ctrRow_amnt.':V'.$ctrRow_amnt)->getNumberFormat()->setFormatCode('#,##0.00;[red](#,##0.00)');
 


			/* Central BOH previous month */ 
			$sql_amnt_a = "SELECT c.*, (SUM(c.trans_pps_in) - SUM(c.trans_pps_out)) AS ttl_pps_eoh_prv_month
					FROM `tbl_material_list` a 
					INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
					INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
					WHERE a.mat_pps_product = '1' AND
					c.trans_pps_date_transaction < '$startDate_inv' AND 
					c.trans_pps_fkid_material = '$mp_pkid' AND 
					c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material
						ORDER BY a.mat_product_desc ASC";
				
			$result_amnt_a = mysql_query($sql_amnt_a);
			if ($row_amnt_a = mysql_fetch_array($result_amnt_a)) {
				
				$ttl_pps_eoh_prv_month = $row_amnt_a['ttl_pps_eoh_prv_month'];
				$ttl_amnt_pps_eoh_prv_month = $ttl_pps_eoh_prv_month * $mp_unit_price_dollor;
				$objWorkSheet->setCellValue('D'.$ctrRow_amnt, $ttl_amnt_pps_eoh_prv_month);
			}

			/* Production BOH previous month */ 
			$sql_amnt_a2 = "SELECT c.ppi_eoh 
					FROM `tbl_material_list` a 
					INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
					INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
					WHERE a.mat_pps_product = '1' AND
					MONTH(c.ppi_date) = MONTH('$lastmonthBOH') AND 
					-- YEAR(c.ppi_date) = '$cYear' AND 
					YEAR(c.ppi_date) = '$cYear_1m' AND 
					c.ppi_fkid_mlp = '$mp_pkid' AND 
					c.logdel = '0'
						GROUP BY c.ppi_fkid_mlp
						ORDER BY a.mat_product_desc ASC";
				
			$result_amnt_a2 = mysql_query($sql_amnt_a2);
			if ($row_amnt_a2 = mysql_fetch_array($result_amnt_a2)) {
				
				$ppi_eoh = $row_amnt_a2['ppi_eoh'];
				$ttl_amnt_ppi_eoh = $ppi_eoh * $mp_unit_price_dollor;
				$objWorkSheet->setCellValue('E'.$ctrRow_amnt, $ttl_amnt_ppi_eoh);

			}

			/* Production EOH current month */ 
			$sql_amnt_a3 = "SELECT c.ppi_eoh 
					FROM `tbl_material_list` a 
					INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
					INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
					WHERE a.mat_pps_product = '1' AND
					MONTH(c.ppi_date) = '$cMonth' AND 
					YEAR(c.ppi_date) = '$cYear' AND 
					c.ppi_fkid_mlp = '$mp_pkid' AND 
					c.logdel = '0'
						GROUP BY c.ppi_fkid_mlp
						ORDER BY a.mat_product_desc ASC";
				
			$result_amnt_a3 = mysql_query($sql_amnt_a3);
			if ($row_amnt_a3 = mysql_fetch_array($result_amnt_a3)) {
								
				$ppi_eoh = $row_amnt_a3['ppi_eoh'];
				$ttl_amnt_ppi_eoh = $ppi_eoh * $mp_unit_price_dollor;
				$objWorkSheet->setCellValue('K'.$ctrRow_amnt, $ttl_amnt_ppi_eoh);

			}

			/* Receive */
			$sql_amnt_b = "SELECT c.*, SUM(c.rm_pps_rcv_qty) as rm_pps_rcv_qty_ttl, group_concat(rm_pps_invoice_num SEPARATOR ' / ') AS rm_pps_invoice_num
					FROM `tbl_material_list` a 
					INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
					INNER JOIN tbl_receive_materials_PPS c ON c.rm_pps_fkid_material = b.mp_pkid
					WHERE a.mat_pps_product = '1' AND 
					(c.rm_pps_date_received BETWEEN '$startDate_inv' AND '$endDate_inv') AND 
					rm_pps_fkid_material = '$mp_pkid' AND 
					(c.rm_pps_remarks <> 'Central BOH' or 
					c.rm_pps_remarks <> 'July Actual Usage' or 
					c.rm_pps_remarks <> 'August Actual Usage' or 
					c.rm_pps_remarks <> 'September Actual Usage')
					GROUP BY c.rm_pps_fkid_material
					ORDER BY `c`.`rm_pps_remarks` ASC";	
								
			$result_amnt_b = mysql_query($sql_amnt_b);
			while ($row_amnt_b = mysql_fetch_array($result_amnt_b)) {
				
			    $objWorkSheet->getStyle('G'.$ctrRow_amnt)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				$objWorkSheet->setCellValue('G'.$ctrRow_amnt, $row_amnt_b['rm_pps_invoice_num']);
				
				$rm_pps_rcv_qty_ttl = $row_amnt_b['rm_pps_rcv_qty_ttl'];
				$ttl_amnt_rm_pps_rcv_qty_ttl = $rm_pps_rcv_qty_ttl * $mp_unit_price_dollor;
				$objWorkSheet->setCellValue('H'.$ctrRow_amnt, $ttl_amnt_rm_pps_rcv_qty_ttl);
			
			}

			/* Withdraw */
			$sql_amnt_c = "SELECT SUM(c.trans_pps_out) as trans_pps_product_ttl_out 
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								(c.trans_pps_date_transaction BETWEEN '$startDate_inv' AND '$endDate_inv') AND 
								c.trans_pps_dept = '' AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material ASC";				
						
			$result_amnt_c = mysql_query($sql_amnt_c);
			if ($row_amnt_c = mysql_fetch_array($result_amnt_c)) {

				$trans_pps_product_ttl_out = $row_amnt_c['trans_pps_product_ttl_out'];
				$ttl_amnt_trans_pps_product_ttl_out = $trans_pps_product_ttl_out * $mp_unit_price_dollor;
				$objWorkSheet->setCellValue('I'.$ctrRow_amnt, $ttl_amnt_trans_pps_product_ttl_out);

			}

			/* MAU */
			// $sql_amnt_d = "SELECT SUM(c.trans_pps_out) as trans_pps_product_ttl_mau, 
			// 		MONTH(c.trans_pps_date_transaction) AS trans_pps_month_transaction,
			// 		YEAR(c.trans_pps_date_transaction) AS trans_pps_year_transaction
			// 			FROM  tbl_material_list a
			// 			INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
			// 			INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
			// 			WHERE a.mat_pps_product = '1' AND
			// 					c.trans_pps_type = '2' AND 
			// 					c.trans_pps_fkid_material = '$mp_pkid' AND 
			// 					YEAR(c.trans_pps_date_transaction) = '$cYear' AND 
			// 					c.trans_pps_dept = '' AND 
			// 					c.trans_pps_logdel = '0'
			// 			GROUP BY c.trans_pps_fkid_material ASC";				
						
			// $result_amnt_d = mysql_query($sql_amnt_d);
			// if ($row_amnt_d = mysql_fetch_array($result_amnt_d)) {

			// 	$trans_pps_month_transaction = $row_amnt_d['trans_pps_month_transaction'];
   //  			$pps_prev_month_trans = date('m', strtotime($trans_pps_month_transaction." -1 month"));

			// 	$objWorkSheet->setCellValue('P'.$ctrRow_amnt, $pps_prev_month_trans);
			// 	$objWorkSheet->setCellValue('Q'.$ctrRow_amnt, $pps_prev_month_trans);
			// 	$objWorkSheet->setCellValue('R'.$ctrRow_amnt, $pps_prev_month_trans);

			// }

			//- last 3 months
			$sql_amnt_d = "SELECT 
					  (SELECT c.ppi_eoh
						FROM `tbl_material_list` a 
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
						MONTH(c.ppi_date) = MONTH('$last3monthBOH') AND
						YEAR(c.ppi_date) = '$cYear_3m' AND 
						c.ppi_fkid_mlp = '$mp_pkid' AND 
						c.logdel = '0'
							GROUP BY c.ppi_fkid_mlp
							ORDER BY a.mat_product_desc ASC) as boh,

						(SELECT SUM(c.trans_pps_out) as trans_pps_product_ttl_out 
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								(c.trans_pps_date_transaction BETWEEN '$startDate_3m' AND '$endDate_3m') AND 
								c.trans_pps_dept = '' AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material ASC)as qty_issued,

						(SELECT c.ppi_eoh 
						FROM `tbl_material_list` a 
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
						MONTH(c.ppi_date) = '$cMonth_3m' AND 
						YEAR(c.ppi_date) = '$cYear_3m' AND 
						c.ppi_fkid_mlp = '$mp_pkid' AND 
						c.logdel = '0'
							GROUP BY c.ppi_fkid_mlp
							ORDER BY a.mat_product_desc ASC) as eoh,

					MONTH(c.trans_pps_date_transaction) AS trans_pps_month_transaction,
					YEAR(c.trans_pps_date_transaction) AS trans_pps_year_transaction
						
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								
								(c.trans_pps_dept = '' or 
								c.trans_pps_dept = 'N/A') AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material
						";	
						
			$result_amnt_d = mysql_query($sql_amnt_d);
			if ($row_amnt_d = mysql_fetch_array($result_amnt_d)) {
								
					$boh 		= $row_amnt_d['boh'];
					$qty_issued = $row_amnt_d['qty_issued'];
					$eoh 		= $row_amnt_d['eoh'];

					$usage1 	= $qty_issued - $eoh;
					$usage2 	= $usage1 + $boh;
					$usage3 	= $usage2 * $mp_unit_price_dollor;

				$objWorkSheet->setCellValue('P'.$ctrRow_amnt, $usage3);	

			}

			//- last 2 months
			$sql_amnt_d = "SELECT 
					  (SELECT c.ppi_eoh
						FROM `tbl_material_list` a 
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
						MONTH(c.ppi_date) = '$last2monthBOH' AND
						YEAR(c.ppi_date) = '$cYear_3m' AND 
						c.ppi_fkid_mlp = '$mp_pkid' AND 
						c.logdel = '0'
							GROUP BY c.ppi_fkid_mlp
							ORDER BY a.mat_product_desc ASC) as boh,

						(SELECT SUM(c.trans_pps_out) as trans_pps_product_ttl_out 
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								(c.trans_pps_date_transaction BETWEEN '$startDate_2m' AND '$endDate_2m') AND 
								c.trans_pps_dept = '' AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material ASC)as qty_issued,

						(SELECT c.ppi_eoh 
						FROM `tbl_material_list` a 
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
						MONTH(c.ppi_date) = '$cMonth_2m' AND 
						YEAR(c.ppi_date) = '$cYear_2m' AND 
						c.ppi_fkid_mlp = '$mp_pkid' AND 
						c.logdel = '0'
							GROUP BY c.ppi_fkid_mlp
							ORDER BY a.mat_product_desc ASC) as eoh,

					MONTH(c.trans_pps_date_transaction) AS trans_pps_month_transaction,
					YEAR(c.trans_pps_date_transaction) AS trans_pps_year_transaction
						
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								
								(c.trans_pps_dept = '' or 
								c.trans_pps_dept = 'N/A') AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material
						";	
						
			$result_amnt_d = mysql_query($sql_amnt_d);
			if ($row_amnt_d = mysql_fetch_array($result_amnt_d)) {
								
					$boh 		= $row_amnt_d['boh'];
					$qty_issued = $row_amnt_d['qty_issued'];
					$eoh 		= $row_amnt_d['eoh'];

					$usage1 	= $qty_issued - $eoh;
					$usage2 	= $usage1 + $boh;
					$usage3 	= $usage2 * $mp_unit_price_dollor;

				$objWorkSheet->setCellValue('Q'.$ctrRow_amnt, $usage3);	

			}

			//- last 1 month
			$sql_amnt_d = "SELECT 
					  (SELECT c.ppi_eoh
						FROM `tbl_material_list` a 
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
						MONTH(c.ppi_date) = MONTH('$last1monthBOH') AND 
						YEAR(c.ppi_date) = '$last1yrBOH' AND 
						c.ppi_fkid_mlp = '$mp_pkid' AND 
						c.logdel = '0'
							GROUP BY c.ppi_fkid_mlp
							ORDER BY a.mat_product_desc ASC) as boh,

						(SELECT SUM(c.trans_pps_out) as trans_pps_product_ttl_out 
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								(c.trans_pps_date_transaction BETWEEN '$startDate_1m' AND '$endDate_1m') AND 
								c.trans_pps_dept = '' AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material ASC)as qty_issued,

						(SELECT c.ppi_eoh 
						FROM `tbl_material_list` a 
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
						MONTH(c.ppi_date) = '$cMonth_1m' AND 
						YEAR(c.ppi_date) = '$cYear_1m' AND 
						c.ppi_fkid_mlp = '$mp_pkid' AND 
						c.logdel = '0'
							GROUP BY c.ppi_fkid_mlp
							ORDER BY a.mat_product_desc ASC) as eoh,

					MONTH(c.trans_pps_date_transaction) AS trans_pps_month_transaction,
					YEAR(c.trans_pps_date_transaction) AS trans_pps_year_transaction
						
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								
								(c.trans_pps_dept = '' or 
								c.trans_pps_dept = 'N/A') AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material
						";	
						
			$result_amnt_d = mysql_query($sql_amnt_d);
			if ($row_amnt_d = mysql_fetch_array($result_amnt_d)) {
								
					$boh 		= $row_amnt_d['boh'];
					$qty_issued = $row_amnt_d['qty_issued'];
					$eoh 		= $row_amnt_d['eoh'];

					$usage1 	= $qty_issued - $eoh;
					$usage2 	= $usage1 + $boh;
					$usage3 	= $usage2 * $mp_unit_price_dollor;

				$objWorkSheet->setCellValue('R'.$ctrRow_amnt, $usage3);	

			}



			$ctrRow_amnt++;
        }
        
        
        if ($ctrRow_amnt >=11  ){
        	for ($y=$Total+5; $y <= $ctrRow_amnt-1; $y++) { 
				for($col = 'P'; $col !== 'S'; $col++) {
					$val = $objWorkSheet->getCell($col.$y)->getValue();
					if(!$val){
						$objWorkSheet->setCellValue($col.$y, '0');
					}
				}
			}
        }


		/* TOTAL */
		$Total_amnt1 = $ctrRow_amnt - $Total + 5;
		$Total_amnt = $ctrRow_amnt - 1;
	
		$objWorkSheet->getStyle('D'.$ctrRow_amnt.':V'.$ctrRow_amnt)->applyFromArray($styleArray);
		$objWorkSheet->getStyle('D'.$ctrRow_amnt.':V'.$ctrRow_amnt)->getFont()->setBold(true);
		$objWorkSheet->getStyle('D'.$ctrRow_amnt.':V'.$ctrRow_amnt)->getNumberFormat()->setFormatCode('#,##0.00;[red](#,##0.00)');
		// $objWorkSheet->setCellValue('D'.$ctrRow_amnt, "=SUM(D31:D".$Total_amnt.")");
		$objWorkSheet->setCellValue('D'.$ctrRow_amnt, "=SUM(D".$Total_amnt1.":D".$Total_amnt.")");
		$objWorkSheet->setCellValue('E'.$ctrRow_amnt, "=SUM(E".$Total_amnt1.":E".$Total_amnt.")");
		$objWorkSheet->setCellValue('F'.$ctrRow_amnt, "=SUM(F".$Total_amnt1.":F".$Total_amnt.")");
		// $objWorkSheet->setCellValue('G'.$ctrRow_amnt, "=SUM(G".$Total_amnt1.":G".$Total_amnt.")");
		$objWorkSheet->setCellValue('H'.$ctrRow_amnt, "=SUM(H".$Total_amnt1.":H".$Total_amnt.")");
		$objWorkSheet->setCellValue('I'.$ctrRow_amnt, "=SUM(I".$Total_amnt1.":I".$Total_amnt.")");
		$objWorkSheet->setCellValue('J'.$ctrRow_amnt, "=SUM(J".$Total_amnt1.":J".$Total_amnt.")");
		$objWorkSheet->setCellValue('K'.$ctrRow_amnt, "=SUM(K".$Total_amnt1.":K".$Total_amnt.")");
		$objWorkSheet->setCellValue('L'.$ctrRow_amnt, "=SUM(L".$Total_amnt1.":L".$Total_amnt.")");
		$objWorkSheet->setCellValue('M'.$ctrRow_amnt, "=SUM(M".$Total_amnt1.":M".$Total_amnt.")");
		$objWorkSheet->setCellValue('N'.$ctrRow_amnt, "=SUM(N".$Total_amnt1.":N".$Total_amnt.")");
		$objWorkSheet->setCellValue('O'.$ctrRow_amnt, "=SUM(O".$Total_amnt1.":O".$Total_amnt.")");
		$objWorkSheet->setCellValue('P'.$ctrRow_amnt, "=SUM(P".$Total_amnt1.":P".$Total_amnt.")");
		$objWorkSheet->setCellValue('Q'.$ctrRow_amnt, "=SUM(Q".$Total_amnt1.":Q".$Total_amnt.")");
		$objWorkSheet->setCellValue('R'.$ctrRow_amnt, "=SUM(R".$Total_amnt1.":R".$Total_amnt.")");
		$objWorkSheet->setCellValue('S'.$ctrRow_amnt, "=SUM(S".$Total_amnt1.":S".$Total_amnt.")");
		$objWorkSheet->setCellValue('T'.$ctrRow_amnt, "=SUM(T".$Total_amnt1.":T".$Total_amnt.")");
		$objWorkSheet->setCellValue('U'.$ctrRow_amnt, "=SUM(U".$Total_amnt1.":U".$Total_amnt.")");
		$objWorkSheet->setCellValue('V'.$ctrRow_amnt, "=SUM(V".$Total_amnt1.":V".$Total_amnt.")");

		
		$Total_amnt++;


		//------------------------------------ End amount ------------------------------//

		/* Signatories */
		$ctrRow1 = $Total_amnt + 3;
		$ctrRow2 = $ctrRow1 + 3;
        $ctrRow3 = $ctrRow2 + 1;
		$ctrRow4 = $ctrRow3 + 1;

		//- REMARKS
        $objWorkSheet->setCellValue('B'.$ctrRow1, 'REMARKS:');  
        $objWorkSheet->setCellValue('C'.$ctrRow1, $drp_remarks);
		$objWorkSheet->getStyle('C'.$ctrRow1)->getFont()->setBold(true)->setSize(10);
		
		$objWorkSheet->setCellValue('B'.$ctrRow2, 'PREPARED BY:');	
		$objWorkSheet->setCellValue('C'.$ctrRow3, ' CHERYL R. TANAY');	
		$objWorkSheet->setCellValue('C'.$ctrRow4, ' TS - Jr. Supervisor');	
		$objWorkSheet->getStyle('C'.$ctrRow3)->getFont()->setBold(true)->setSize(10);
		
		$objWorkSheet->setCellValue('F'.$ctrRow2, 'CONFORMED BY:');	
		$objWorkSheet->setCellValue('G'.$ctrRow3, ' JOHN DOMINIC E. SAROL');	
		$objWorkSheet->setCellValue('G'.$ctrRow4, ' PPS Personnel');	
		$objWorkSheet->getStyle('G'.$ctrRow3)->getFont()->setBold(true)->setSize(10);
		
		$objWorkSheet->setCellValue('J'.$ctrRow3, ' MILLYWEL T. LAURAL');	
		$objWorkSheet->setCellValue('J'.$ctrRow4, ' PPS Sr. Supervisor');	
		$objWorkSheet->getStyle('J'.$ctrRow3)->getFont()->setBold(true)->setSize(10);

		$objWorkSheet->setCellValue('M'.$ctrRow2, 'CHECKED BY:');	
		$objWorkSheet->setCellValue('N'.$ctrRow3, ' EDISON JR F. VALENCIA');	
		$objWorkSheet->setCellValue('N'.$ctrRow4, ' PPS Manager');	
		$objWorkSheet->getStyle('N'.$ctrRow3)->getFont()->setBold(true)->setSize(10);

		$objWorkSheet->setCellValue('Q'.$ctrRow2, 'APPROVED BY:');	
		$objWorkSheet->setCellValue('R'.$ctrRow3, ' JOEL C. PADULLO');	
		$objWorkSheet->setCellValue('R'.$ctrRow4, ' VP - Production Division');	
		$objWorkSheet->getStyle('R'.$ctrRow3)->getFont()->setBold(true)->setSize(10);
			
		$ctrRow1++; 
		$ctrRow2++; 
		$ctrRow3++;         
        $ctrRow4++; 

	ob_end_clean();
		
    //SAVING
    $writer = new PHPExcel_Writer_Excel2007($objPHPExcel);
    unset($styleArray);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=PPS IMI Quantity Report ('.date("Y/m/d").').xls'); // used for excel 2003 format
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); // used for excel 2003 format
    $objWriter->save('php://output');
?>