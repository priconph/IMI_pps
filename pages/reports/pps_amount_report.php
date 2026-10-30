<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    require('../../../media/PHPExcel.php'); //change this with your OOP path
    
	session_start();
	$startDate_inv 	= $_GET['startDate_inv'];
    $endDate_inv    = $_GET['endDate_inv'];
    $drp_remarks	= $_GET['drp_remarks'];
    $cMonth 		= date("m");  
    $cYear 			= date("Y");  
	
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
    mysql_select_db('db_imi_test');

    $objPHPExcel = new PHPExcel;
    $objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
    
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);

    $objWorkSheet = $objPHPExcel->getActiveSheet();
    $title = "PPS IMI Amount Report"; //set title cont.
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

    $styleHeader1 = array( 
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID, //set back color yellow
        'color' => array('rgb'=>'9ACD32'),
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
    $objWorkSheet->getColumnDimension('S')->setWidth(10);
    $objWorkSheet->getColumnDimension('T')->setWidth(10);
    $objWorkSheet->getColumnDimension('U')->setWidth(10);
    $objWorkSheet->getColumnDimension('V')->setWidth(10);
    $objWorkSheet->getColumnDimension('W')->setWidth(10);
    $objWorkSheet->getColumnDimension('X')->setWidth(10);
    $objWorkSheet->getColumnDimension('Y')->setWidth(10);
    $objWorkSheet->getColumnDimension('Z')->setWidth(10);
    $objWorkSheet->getColumnDimension('AA')->setWidth(10);
    $objWorkSheet->getColumnDimension('AB')->setWidth(15);
    $objWorkSheet->getColumnDimension('AC')->setWidth(15);
    $objWorkSheet->getColumnDimension('AD')->setWidth(15);
    $objWorkSheet->getColumnDimension('AE')->setWidth(15);
	
  
    $objWorkSheet->setCellValue('A1', 'PPS INDIRECT MATERIALS CONSUMPTION REPORT');
    $objWorkSheet->setCellValue('A2', "Month of: $scur_month_lbl");
    $objWorkSheet->setCellValue('A3', 'ITEM NAME');
    $objWorkSheet->setCellValue('B3', 'UOM');
    $objWorkSheet->setCellValue('C3', 'UNIT PRICE $');
    $objWorkSheet->setCellValue('D3', 'CENTERAL BOH');
    $objWorkSheet->setCellValue('E3', 'PROD. BOH');
    $objWorkSheet->setCellValue('F3', 'TOTAL BOH');
    $objWorkSheet->setCellValue('G3', 'INVOICE NO.');
    $objWorkSheet->setCellValue('H3', "RECEIVED QTY");
    $objWorkSheet->setCellValue('I3', 'CENTRAL QTY ISSUED');
    $objWorkSheet->setCellValue('J3', 'ACTUAL USAGE');
    $objWorkSheet->setCellValue('K3', 'EOH');
    $objWorkSheet->setCellValue('K4', 'PROD');
    $objWorkSheet->setCellValue('L4', 'CENTAL');
    $objWorkSheet->setCellValue('M3', 'OVERALL TOTAL EOH');
    $objWorkSheet->setCellValue('N3', 'ROP');
	$objWorkSheet->setCellValue('O3', 'FOR PR');
	$objWorkSheet->setCellValue('P3', 'MONTHLY ACTUAL USAGE');
	$objWorkSheet->setCellValue('P4', 'APR');
	$objWorkSheet->setCellValue('Q4', 'MAY');
	$objWorkSheet->setCellValue('R4', 'JUNE');
	$objWorkSheet->setCellValue('S4', 'JUL');
	$objWorkSheet->setCellValue('T4', 'AUG');
	$objWorkSheet->setCellValue('U4', 'SEPT');
	$objWorkSheet->setCellValue('V4', 'OCT');
	$objWorkSheet->setCellValue('W4', 'NOV');
	$objWorkSheet->setCellValue('X4', 'DEC');
	$objWorkSheet->setCellValue('Y4', 'JAN');
	$objWorkSheet->setCellValue('Z4', 'FEB');
	$objWorkSheet->setCellValue('AA4', 'MAR');
	$objWorkSheet->setCellValue('AB3', 'Ave. Month Consumption');
	$objWorkSheet->setCellValue('AB4', '(B = A/3mos.)');
	$objWorkSheet->setCellValue('AC3', 'Daily Usage AMC');
	$objWorkSheet->setCellValue('AC4', '(C=B/30days)');
	$objWorkSheet->setCellValue('AD3', 'Safety Stock Daily Usage');
	$objWorkSheet->setCellValue('AD4', '(D=Cx30days)');
	$objWorkSheet->setCellValue('AE3', 'New ROP Daily Usage');
	$objWorkSheet->setCellValue('AE4', '(E=Cx90days)');
	
	//-title  

    $objWorkSheet->getStyle('A1:AE1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objWorkSheet->getStyle('A3:AE4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
    $objWorkSheet->getStyle('A1:AE1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objWorkSheet->getStyle('A3:AE4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 	

    $objWorkSheet->getStyle('A3:AE4')->applyFromArray($styleArray);
    $objWorkSheet->getStyle('A1:AE2')->applyFromArray($OutlineStyle);

    $objWorkSheet->getStyle('A1:AE4')->getAlignment()->setWrapText(true);
   
    $objWorkSheet->mergeCells('A1:AE1');
    $objWorkSheet->mergeCells('A2:AE2');
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
    $objWorkSheet->mergeCells('P3:AA3');


    $objWorkSheet->getStyle('A1:AE1')->getFont()->setBold(true)->setSize(16);
    $objWorkSheet->getStyle('A2:AE2')->getFont()->setBold(true)->setSize(10);
    $objWorkSheet->getStyle('A3:AE4')->getFont()->setBold(true);

    $objWorkSheet->getStyle('AB3:AE4')->applyFromArray($styleHeader1);

	
		$ctrRow = 5;

		$objWorkSheet->getStyle('D:F')->getNumberFormat()->setFormatCode('#,##0;[black](#,##0)');
		$objWorkSheet->getStyle('H:AE')->getNumberFormat()->setFormatCode('#,##0;[black](#,##0)');

			
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
			$objWorkSheet->getStyle('A'.$ctrRow.':AE'.$ctrRow)->applyFromArray($styleArray);
			
            // Set value
            $objWorkSheet->setCellValue('A'.$ctrRow, $row['mat_product_desc']);
            $objWorkSheet->setCellValue('B'.$ctrRow, $row['mat_uom']);
            $objWorkSheet->setCellValue('C'.$ctrRow, $row['mp_unit_price_dollor']);
			$objWorkSheet->getStyle('C'.$ctrRow)->getNumberFormat()->setFormatCode('0.0000');

			$objWorkSheet->setCellValue('F'.$ctrRow, '=D'.$ctrRow.'+E'.$ctrRow);
			$objWorkSheet->setCellValue('J'.$ctrRow, '=I'.$ctrRow.'-K'.$ctrRow.'+E'.$ctrRow);
			$objWorkSheet->setCellValue('L'.$ctrRow, '=SUM(D'.$ctrRow.'+H'.$ctrRow.')-I'.$ctrRow);
			$objWorkSheet->setCellValue('M'.$ctrRow, '=L'.$ctrRow.'+K'.$ctrRow);
			$objWorkSheet->setCellValue('N'.$ctrRow, '=AE'.$ctrRow);
			$objWorkSheet->setCellValue('O'.$ctrRow, '=IF(M'.$ctrRow.'>N'.$ctrRow.',0,(AE'.$ctrRow.'))');
			$objWorkSheet->setCellValue('AB'.$ctrRow, '=AVERAGE(P'.$ctrRow.':AA'.$ctrRow.')');  
			$objWorkSheet->setCellValue('AC'.$ctrRow, '=AB'.$ctrRow.'/30');  
			$objWorkSheet->setCellValue('AD'.$ctrRow, '=AC'.$ctrRow.'/30');  
			$objWorkSheet->setCellValue('AE'.$ctrRow, '=AC'.$ctrRow.'/90'); 

			$objWorkSheet->getStyle('D'.$ctrRow.':F'.$ctrRow)->getNumberFormat()->setFormatCode('#,##0.00;[red](#,##0.00)');
			$objWorkSheet->getStyle('H'.$ctrRow.':AE'.$ctrRow)->getNumberFormat()->setFormatCode('#,##0.00;[red](#,##0.00)');
 


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
				
				$ttl_pps_eoh_prv_month = $row_a['ttl_pps_eoh_prv_month'];
				$ttl_amnt_pps_eoh_prv_month = $ttl_pps_eoh_prv_month * $mp_unit_price_dollor;
				$objWorkSheet->setCellValue('D'.$ctrRow, $ttl_amnt_pps_eoh_prv_month);
			}

			/* Production BOH previous month */ 
			$sql_a2 = "SELECT c.ppi_eoh 
					FROM `tbl_material_list` a 
					INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
					INNER JOIN tbl_pps_product_inventory c ON c.ppi_fkid_mlp = b.mp_pkid
					WHERE a.mat_pps_product = '1' AND
					c.ppi_date < '$startDate_inv' AND 
					c.ppi_fkid_mlp = '$mp_pkid' AND 
					c.logdel = '0'
						GROUP BY c.ppi_fkid_mlp
						ORDER BY a.mat_product_desc ASC";
				
			$result_a2 = mysql_query($sql_a2);
			if ($row_a2 = mysql_fetch_array($result_a2)) {
				
				$ppi_eoh = $row_a2['ppi_eoh'];
				$ttl_amnt_ppi_eoh = $ppi_eoh * $mp_unit_price_dollor;
				$objWorkSheet->setCellValue('E'.$ctrRow, $ttl_amnt_ppi_eoh);

			}

			/* Production EOH current month */ 
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
								
				$ppi_eoh = $row_a3['ppi_eoh'];
				$ttl_amnt_ppi_eoh = $ppi_eoh * $mp_unit_price_dollor;
				$objWorkSheet->setCellValue('K'.$ctrRow, $ttl_amnt_ppi_eoh);

			}

			/* Receive */
			$sql_b = "SELECT c.*, SUM(c.rm_pps_rcv_qty) as rm_pps_rcv_qty_ttl
					FROM `tbl_material_list` a 
					INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
					INNER JOIN tbl_receive_materials_PPS c ON c.rm_pps_fkid_material = b.mp_pkid
					WHERE a.mat_pps_product = '1' AND 
					(c.rm_pps_date_received BETWEEN '$startDate_inv' AND '$endDate_inv') AND 
					rm_pps_fkid_material = '$mp_pkid' AND 
					c.rm_pps_remarks <> 'Central BOH'
					GROUP BY c.rm_pps_fkid_material
					ORDER BY `c`.`rm_pps_remarks` ASC";	
								
			$result_b = mysql_query($sql_b);
			while ($row_b = mysql_fetch_array($result_b)) {
				
			    $objWorkSheet->getStyle('G'.$ctrRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				$objWorkSheet->setCellValue('G'.$ctrRow, $row_b['rm_pps_invoice_num']);
				
				$rm_pps_rcv_qty_ttl = $row_b['rm_pps_rcv_qty_ttl'];
				$ttl_amnt_rm_pps_rcv_qty_ttl = $rm_pps_rcv_qty_ttl * $mp_unit_price_dollor;
				$objWorkSheet->setCellValue('H'.$ctrRow, $ttl_amnt_rm_pps_rcv_qty_ttl);
			
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

				$trans_pps_product_ttl_out = $row_c['trans_pps_product_ttl_out'];
				$ttl_amnt_trans_pps_product_ttl_out = $trans_pps_product_ttl_out * $mp_unit_price_dollor;
				$objWorkSheet->setCellValue('I'.$ctrRow, $ttl_amnt_trans_pps_product_ttl_out);

			}

			/* MAU */
			$sql_d = "SELECT SUM(c.trans_pps_out) as trans_pps_product_ttl_mau, 
					MONTH(c.trans_pps_date_transaction) AS trans_pps_month_transaction,
					YEAR(c.trans_pps_date_transaction) AS trans_pps_year_transaction
						FROM  tbl_material_list a
						INNER JOIN tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 
						INNER JOIN tbl_PPS_transaction c ON c.trans_pps_fkid_material = b.mp_pkid
						WHERE a.mat_pps_product = '1' AND
								c.trans_pps_type = '2' AND 
								c.trans_pps_fkid_material = '$mp_pkid' AND 
								YEAR(c.trans_pps_date_transaction) = '$cYear' AND 
								c.trans_pps_dept = '' AND 
								c.trans_pps_logdel = '0'
						GROUP BY c.trans_pps_fkid_material ASC";				
						
			$result_d = mysql_query($sql_d);
			if ($row_d = mysql_fetch_array($result_d)) {
				
				if ( $row_d['trans_pps_month_transaction'] == '4'){
					$trans_pps_product_ttl_mau = $row_d['trans_pps_product_ttl_mau'];
					$ttl_amnt_trans_pps_product_ttl_mau = $trans_pps_product_ttl_mau * $mp_unit_price_dollor;
					$objWorkSheet->setCellValue('P'.$ctrRow, $ttl_amnt_trans_pps_product_ttl_mau);
				}else if ( $row_d['trans_pps_month_transaction'] == '5'){
					$trans_pps_product_ttl_mau = $row_d['trans_pps_product_ttl_mau'];
					$ttl_amnt_trans_pps_product_ttl_mau = $trans_pps_product_ttl_mau * $mp_unit_price_dollor;
					$objWorkSheet->setCellValue('Q'.$ctrRow, $ttl_amnt_trans_pps_product_ttl_mau);
				}else if ( $row_d['trans_pps_month_transaction'] == '6'){
					$trans_pps_product_ttl_mau = $row_d['trans_pps_product_ttl_mau'];
					$ttl_amnt_trans_pps_product_ttl_mau = $trans_pps_product_ttl_mau * $mp_unit_price_dollor;
					$objWorkSheet->setCellValue('R'.$ctrRow, $ttl_amnt_trans_pps_product_ttl_mau);
				}else if ( $row_d['trans_pps_month_transaction'] == '7'){
					$trans_pps_product_ttl_mau = $row_d['trans_pps_product_ttl_mau'];
					$ttl_amnt_trans_pps_product_ttl_mau = $trans_pps_product_ttl_mau * $mp_unit_price_dollor;
					$objWorkSheet->setCellValue('S'.$ctrRow, $ttl_amnt_trans_pps_product_ttl_mau);
				}else if ( $row_d['trans_pps_month_transaction'] == '8'){
					$trans_pps_product_ttl_mau = $row_d['trans_pps_product_ttl_mau'];
					$ttl_amnt_trans_pps_product_ttl_mau = $trans_pps_product_ttl_mau * $mp_unit_price_dollor;
					$objWorkSheet->setCellValue('T'.$ctrRow, $ttl_amnt_trans_pps_product_ttl_mau);
				}else if ( $row_d['trans_pps_month_transaction'] == '9'){
					$trans_pps_product_ttl_mau = $row_d['trans_pps_product_ttl_mau'];
					$ttl_amnt_trans_pps_product_ttl_mau = $trans_pps_product_ttl_mau * $mp_unit_price_dollor;
					$objWorkSheet->setCellValue('U'.$ctrRow, $ttl_amnt_trans_pps_product_ttl_mau);
				}else if ( $row_d['trans_pps_month_transaction'] == '10'){
					$trans_pps_product_ttl_mau = $row_d['trans_pps_product_ttl_mau'];
					$ttl_amnt_trans_pps_product_ttl_mau = $trans_pps_product_ttl_mau * $mp_unit_price_dollor;
					$objWorkSheet->setCellValue('V'.$ctrRow, $ttl_amnt_trans_pps_product_ttl_mau);
				}else if ( $row_d['trans_pps_month_transaction'] == '11'){
					$trans_pps_product_ttl_mau = $row_d['trans_pps_product_ttl_mau'];
					$ttl_amnt_trans_pps_product_ttl_mau = $trans_pps_product_ttl_mau * $mp_unit_price_dollor;
					$objWorkSheet->setCellValue('W'.$ctrRow, $ttl_amnt_trans_pps_product_ttl_mau);
				}else if ( $row_d['trans_pps_month_transaction'] == '12'){
					$trans_pps_product_ttl_mau = $row_d['trans_pps_product_ttl_mau'];
					$ttl_amnt_trans_pps_product_ttl_mau = $trans_pps_product_ttl_mau * $mp_unit_price_dollor;
					$objWorkSheet->setCellValue('X'.$ctrRow, $ttl_amnt_trans_pps_product_ttl_mau);
				}else if ( $row_d['trans_pps_month_transaction'] == '1'){
					$trans_pps_product_ttl_mau = $row_d['trans_pps_product_ttl_mau'];
					$ttl_amnt_trans_pps_product_ttl_mau = $trans_pps_product_ttl_mau * $mp_unit_price_dollor;
					$objWorkSheet->setCellValue('Y'.$ctrRow, $ttl_amnt_trans_pps_product_ttl_mau);
				}else if ( $row_d['trans_pps_month_transaction'] == '2'){
					$trans_pps_product_ttl_mau = $row_d['trans_pps_product_ttl_mau'];
					$ttl_amnt_trans_pps_product_ttl_mau = $trans_pps_product_ttl_mau * $mp_unit_price_dollor;
					$objWorkSheet->setCellValue('Z'.$ctrRow, $ttl_amnt_trans_pps_product_ttl_mau);
				}else if ( $row_d['trans_pps_month_transaction'] == '3'){
					$trans_pps_product_ttl_mau = $row_d['trans_pps_product_ttl_mau'];
					$ttl_amnt_trans_pps_product_ttl_mau = $trans_pps_product_ttl_mau * $mp_unit_price_dollor;
					$objWorkSheet->setCellValue('AA'.$ctrRow, $ttl_amnt_trans_pps_product_ttl_mau);
				}				
			}
		


			$ctrRow++;
        }
        if ($ctrRow >= 5 ){
        	for ($y=5; $y <= $ctrRow-1; $y++) { 
				for($col = 'P'; $col !== 'AB'; $col++) {
					$val = $objWorkSheet->getCell($col.$y)->getValue();
					if(!$val){
						$objWorkSheet->setCellValue($col.$y, '0');
					}
				}
			}
        }
        

		/* TOTAL */
		$Total = $ctrRow - 1;
	
		$objWorkSheet->getStyle('D'.$ctrRow.':AE'.$ctrRow)->applyFromArray($styleArray);
		$objWorkSheet->getStyle('D'.$ctrRow.':AE'.$ctrRow)->getFont()->setBold(true);
		$objWorkSheet->getStyle('D'.$ctrRow.':AE'.$ctrRow)->getNumberFormat()->setFormatCode('#,##0.00;[red](#,##0.00)');
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
		$objWorkSheet->setCellValue('S'.$ctrRow, "=SUM(S5:S".$Total.")");
		$objWorkSheet->setCellValue('T'.$ctrRow, "=SUM(T5:T".$Total.")");
		$objWorkSheet->setCellValue('U'.$ctrRow, "=SUM(U5:U".$Total.")");
		$objWorkSheet->setCellValue('V'.$ctrRow, "=SUM(V5:V".$Total.")");
		$objWorkSheet->setCellValue('W'.$ctrRow, "=SUM(W5:W".$Total.")");
		$objWorkSheet->setCellValue('X'.$ctrRow, "=SUM(X5:X".$Total.")");
		$objWorkSheet->setCellValue('Y'.$ctrRow, "=SUM(Y5:Y".$Total.")");
		$objWorkSheet->setCellValue('Z'.$ctrRow, "=SUM(Z5:Z".$Total.")");
		$objWorkSheet->setCellValue('AA'.$ctrRow, "=SUM(AA5:AA".$Total.")");
		$objWorkSheet->setCellValue('AB'.$ctrRow, "=SUM(AB5:AB".$Total.")");
		$objWorkSheet->setCellValue('AC'.$ctrRow, "=SUM(AC5:AC".$Total.")");
		$objWorkSheet->setCellValue('AD'.$ctrRow, "=SUM(AD5:AD".$Total.")");
		$objWorkSheet->setCellValue('AE'.$ctrRow, "=SUM(AE5:AE".$Total.")");

		
		$Total++;

		/* Signatories */
		$ctrRow1 = $Total + 3;
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
		$objWorkSheet->setCellValue('N'.$ctrRow3, ' LEANDER G. MARANAN');	
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