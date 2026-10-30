<?php
    require('../../../media/PHPExcel.php'); //change this with your OOP path
    
	session_start();
	$startDate_inv 	= $_GET['startDate_inv'];
    $endDate_inv    = $_GET['endDate_inv'];
    $drp_remarks	= $_GET['drp_remarks'];

	
	// $startDate_inv 	= '2019-01-28';
    // $endDate_inv 	= '2019-02-20';
		
    $prev_month = date('m', strtotime($endDate_inv." -1 month"));
	if ( $prev_month == '1'){
		$prev_month_lbl = 'January';
	}else if ( $prev_month == '2'){
		$prev_month_lbl = 'February';
	}else if ( $prev_month == '3'){
		$prev_month_lbl = 'March';
	}else if ( $prev_month == '4'){
		$prev_month_lbl = 'April';
	}else if ( $prev_month == '5'){
		$prev_month_lbl = 'May';
	}else if ( $prev_month == '6'){
		$prev_month_lbl = 'June';
	}else if ( $prev_month == '7'){
		$prev_month_lbl = 'July';
	}else if ( $prev_month == '8'){
		$prev_month_lbl = 'August';
	}else if ( $prev_month == '9'){
		$prev_month_lbl = 'September';
	}else if ( $prev_month == '10'){
		$prev_month_lbl = 'October';
	}else if ( $prev_month == '11'){
		$prev_month_lbl = 'November';
	}else if ( $prev_month == '12'){
		$prev_month_lbl = 'December';
	}
	
    // $cur_month = date('m', strtotime($startDate_inv));
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
	
    //Database Connection
    mysql_connect('localhost', 'root', 'r@p1d0nl1n3');
    mysql_select_db('db_imi');

    //Create new PHPExcel Page
    $objPHPExcel = new PHPExcel;
    $objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
    
	//Font Size: Global
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(9);

    //Create Sheet
    $objWorkSheet = $objPHPExcel->getActiveSheet();
    $title = "IMI Quantity Report"; //set title cont.
    $objWorkSheet->setTitle($title); //set title cont.

    //FORMAT
    //Border Style
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

	$styleHeader = array(
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
	
	$styleHeader1 = array(
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
	
	$styleHeader2 = array( // RECEIVED
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID, //set back color
        'color' => array('rgb'=>'00FF00'),
        )
    );
	
	$styleHeader3 = array( // BOH
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID, //set back color
        'color' => array('rgb'=>'00FFFF'),
        )
    );
	
	$styleHeader4 = array( // TTL BOH AND RECEIVED
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID, //set back color
        'color' => array('rgb'=>'FFA500'),
        )
    );
	
	$styleHeader5 = array( // ISSUE TO AND ENDING
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID, //set back color
        'color' => array('rgb'=>'C3FDB8'),
        )
    );
	
	$styleTotal = array(
      'borders' => array(
        'allborders' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN //set borders
        )
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID, //set back color
        'color' => array('rgb'=>'FCF3CF'),
        )
    );
	
	$styleTotal2 = array( 
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID, //set back color
        'color' => array('rgb'=>'FCF3CF'),
        )
    );
	
	$OutlineStyle = array(
	  'borders' => array(
		'outline' => array(
		  'style' => PHPExcel_Style_Border::BORDER_MEDIUM
		)
	  )
	);

	
   //Horizontal
    $objWorkSheet->getStyle('A3:AK3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objWorkSheet->getStyle('G3:AK3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objWorkSheet->getStyle('G4:AK4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    //Vertical
    $objWorkSheet->getStyle('A3:AK3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objWorkSheet->getStyle('G3:AK3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objWorkSheet->getStyle('G4:AK4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 
    //Set width: Static
    $objWorkSheet->getColumnDimension('A')->setWidth(22);
    $objWorkSheet->getColumnDimension('B')->setWidth(17);
    $objWorkSheet->getColumnDimension('C')->setWidth(11);
    $objWorkSheet->getColumnDimension('D')->setWidth(8);
    $objWorkSheet->getColumnDimension('E')->setWidth(13);
    $objWorkSheet->getColumnDimension('F')->setWidth(7);
    $objWorkSheet->getColumnDimension('G')->setWidth(7);
    $objWorkSheet->getColumnDimension('H')->setWidth(7);
    $objWorkSheet->getColumnDimension('I')->setWidth(7);
    $objWorkSheet->getColumnDimension('J')->setWidth(7);
    $objWorkSheet->getColumnDimension('K')->setWidth(7);
	
    $objWorkSheet->getColumnDimension('L')->setWidth(25);
    $objWorkSheet->getColumnDimension('M')->setWidth(25);
    $objWorkSheet->getColumnDimension('N')->setWidth(7);
    $objWorkSheet->getColumnDimension('O')->setWidth(7);
    $objWorkSheet->getColumnDimension('P')->setWidth(7);
    $objWorkSheet->getColumnDimension('Q')->setWidth(7);
    $objWorkSheet->getColumnDimension('R')->setWidth(7);
	
    $objWorkSheet->getColumnDimension('S')->setWidth(7);
    $objWorkSheet->getColumnDimension('T')->setWidth(7);
    $objWorkSheet->getColumnDimension('U')->setWidth(7);
    $objWorkSheet->getColumnDimension('V')->setWidth(7);
    $objWorkSheet->getColumnDimension('W')->setWidth(12);
	
    $objWorkSheet->getColumnDimension('X')->setWidth(8);
    $objWorkSheet->getColumnDimension('Y')->setWidth(7);
    $objWorkSheet->getColumnDimension('Z')->setWidth(7);
    $objWorkSheet->getColumnDimension('AA')->setWidth(7);
	
    $objWorkSheet->getColumnDimension('AB')->setWidth(7);
	$objWorkSheet->getColumnDimension('AC')->setWidth(7);
    $objWorkSheet->getColumnDimension('AD')->setWidth(7);
    $objWorkSheet->getColumnDimension('AE')->setWidth(7);
    $objWorkSheet->getColumnDimension('AF')->setWidth(13);
	
    $objWorkSheet->getColumnDimension('AG')->setWidth(8);
    $objWorkSheet->getColumnDimension('AH')->setWidth(8);
    $objWorkSheet->getColumnDimension('AI')->setWidth(8);
    $objWorkSheet->getColumnDimension('AJ')->setWidth(8);
    $objWorkSheet->getColumnDimension('AK')->setWidth(8);
	
    //Border
    $objWorkSheet->getStyle('A1:AK2')->applyFromArray($OutlineStyle);
    $objWorkSheet->getStyle('A3:AK3')->applyFromArray($styleHeader1);
    $objWorkSheet->getStyle('A4:AK4')->applyFromArray($styleHeader1);
    $objWorkSheet->getStyle('G4:AK4')->applyFromArray($styleHeader1);
    $objWorkSheet->getStyle('L3:V3')->applyFromArray($styleHeader2);
    $objWorkSheet->getStyle('L4:V4')->applyFromArray($styleHeader2);
    $objWorkSheet->getStyle('G3:K3')->applyFromArray($styleHeader3);
    $objWorkSheet->getStyle('G4:K4')->applyFromArray($styleHeader3);
    $objWorkSheet->getStyle('X3:AA3')->applyFromArray($styleHeader3);
    $objWorkSheet->getStyle('X4:AA4')->applyFromArray($styleHeader3);
    $objWorkSheet->getStyle('W3:W4')->applyFromArray($styleHeader4);
    $objWorkSheet->getStyle('AF3:AF4')->applyFromArray($styleHeader4);
    $objWorkSheet->getStyle('AK3:AK4')->applyFromArray($styleHeader4);
    $objWorkSheet->getStyle('AB3:AE3')->applyFromArray($styleHeader5);
    $objWorkSheet->getStyle('AB4:AE4')->applyFromArray($styleHeader5);
    $objWorkSheet->getStyle('AG3:AJ3')->applyFromArray($styleHeader5);
    $objWorkSheet->getStyle('AG4:AJ4')->applyFromArray($styleHeader5);

    //Wrap Text
    $objWorkSheet->getStyle('A3:A4')->getAlignment()->setWrapText(true);
    $objWorkSheet->getStyle('C3:C4')->getAlignment()->setWrapText(true);
    $objWorkSheet->getStyle('D3:D4')->getAlignment()->setWrapText(true);
    $objWorkSheet->getStyle('E3:E4')->getAlignment()->setWrapText(true);
    $objWorkSheet->getStyle('K3:K4')->getAlignment()->setWrapText(true);
    $objWorkSheet->getStyle('R3:R4')->getAlignment()->setWrapText(true);
    $objWorkSheet->getStyle('S3:S3')->getAlignment()->setWrapText(true);
    $objWorkSheet->getStyle('AB3:AB3')->getAlignment()->setWrapText(true);
    $objWorkSheet->getStyle('W3:W4')->getAlignment()->setWrapText(true);
    $objWorkSheet->getStyle('AF3:AF4')->getAlignment()->setWrapText(true);
    $objWorkSheet->getStyle('AK3:AK3')->getAlignment()->setWrapText(true);

	$objWorkSheet->getStyle('K')->getFont()->setBold(true);
	$objWorkSheet->getStyle('R')->getFont()->setBold(true);
	$objWorkSheet->getStyle('W')->getFont()->setBold(true);
	$objWorkSheet->getStyle('AF')->getFont()->setBold(true);
	$objWorkSheet->getStyle('AK')->getFont()->setBold(true);

    $objWorkSheet->getStyle('A3:F4')->applyFromArray($OutlineStyle);
    $objWorkSheet->getStyle('G3:K4')->applyFromArray($OutlineStyle);
    $objWorkSheet->getStyle('L3:V4')->applyFromArray($OutlineStyle);
    $objWorkSheet->getStyle('W3:W4')->applyFromArray($OutlineStyle);
    $objWorkSheet->getStyle('X3:AA4')->applyFromArray($OutlineStyle);
    $objWorkSheet->getStyle('AB3:AE4')->applyFromArray($OutlineStyle);
    $objWorkSheet->getStyle('AF3:AF4')->applyFromArray($OutlineStyle);
    $objWorkSheet->getStyle('AG3:AJ4')->applyFromArray($OutlineStyle);
    $objWorkSheet->getStyle('AK3:AK4')->applyFromArray($OutlineStyle);
   
    //Set font size
    $objWorkSheet->getStyle('A2:AK2')->getFont()->setSize(11);
    $objWorkSheet->getStyle('A3:AK3')->getFont()->setSize(10);

    //Merge Cells
    $objWorkSheet->mergeCells('A1:AK1');
    $objWorkSheet->mergeCells('A2:AK2');
    $objWorkSheet->mergeCells('A3:A4');
    $objWorkSheet->mergeCells('B3:B4');
    $objWorkSheet->mergeCells('C3:C4');
    $objWorkSheet->mergeCells('D3:D4');
    $objWorkSheet->mergeCells('E3:E4');
    $objWorkSheet->mergeCells('F3:F4');
	
    $objWorkSheet->mergeCells('G3:J3');
    $objWorkSheet->mergeCells('K3:K4');
    $objWorkSheet->mergeCells('L3:L4');
    $objWorkSheet->mergeCells('M3:M4');
    $objWorkSheet->mergeCells('N3:Q3');
    $objWorkSheet->mergeCells('R3:R4');
	
	$objWorkSheet->mergeCells('S3:V3');
    $objWorkSheet->mergeCells('W3:W4');
   
   $objWorkSheet->mergeCells('X3:AA3');
   $objWorkSheet->mergeCells('AB3:AE3');
   
   $objWorkSheet->mergeCells('AF3:AF4');
   $objWorkSheet->mergeCells('AG3:AJ3');
   $objWorkSheet->mergeCells('AK3:AK4');
   
    //DEFAULT Values
    $objWorkSheet->setCellValue('A1', 'Operations Division - Indirect Materials Monthly Inventory Report');
    $objWorkSheet->setCellValue('A2', "Period Covered: $startDate_inv ~ $endDate_inv");
    $objWorkSheet->setCellValue('A3', 'PRODUCT DESCRIPTION');
    $objWorkSheet->setCellValue('B3', 'SPECIFICATION');
    $objWorkSheet->setCellValue('C3', 'UNIT PRICE ($)');
    $objWorkSheet->setCellValue('D3', 'EXC. RATE');
    $objWorkSheet->setCellValue('E3', 'UNIT PRICE (Php)');
    $objWorkSheet->setCellValue('F3', 'UOM');
	
    $objWorkSheet->setCellValue('G3', "$prev_month_lbl EOH");
    $objWorkSheet->setCellValue('G4', 'TS');
    $objWorkSheet->setCellValue('H4', 'PPS');
    $objWorkSheet->setCellValue('I4', 'CN');
    $objWorkSheet->setCellValue('J4', 'YF');
    $objWorkSheet->setCellValue('K3', 'TTL QTY');
	
	$objWorkSheet->setCellValue('L3', 'SUPPLIER');
	$objWorkSheet->setCellValue('M3', 'INVOICE NO.');
	$objWorkSheet->setCellValue('N3', "$cur_month_lbl Received");
    $objWorkSheet->setCellValue('N4', 'TS');
    $objWorkSheet->setCellValue('O4', 'PPS');
    $objWorkSheet->setCellValue('P4', 'CN');
    $objWorkSheet->setCellValue('Q4', 'YF');
    $objWorkSheet->setCellValue('R3', 'TTL QTY');
	
    $objWorkSheet->setCellValue('S3', 'TTL EOH + RCVD');
    $objWorkSheet->setCellValue('S4', 'TS');
    $objWorkSheet->setCellValue('T4', 'PPS');
    $objWorkSheet->setCellValue('U4', 'CN');
    $objWorkSheet->setCellValue('V4', 'YF');
    
	$objWorkSheet->setCellValue('W3', 'TTL EOH + RCVD QTY');

	$objWorkSheet->setCellValue('X3', 'TRANSFER TO');
	$objWorkSheet->setCellValue('X4', 'TS');
    $objWorkSheet->setCellValue('Y4', 'PPS');
    $objWorkSheet->setCellValue('Z4', 'CN');
    $objWorkSheet->setCellValue('AA4', 'YF');
	
	$objWorkSheet->setCellValue('AB3', 'ISSUE TO');
	$objWorkSheet->setCellValue('AB4', 'TS');
    $objWorkSheet->setCellValue('AC4', 'PPS');
    $objWorkSheet->setCellValue('AD4', 'CN');
    $objWorkSheet->setCellValue('AE4', 'YF');
    $objWorkSheet->setCellValue('AF3', 'TTL ISSUED QTY');

	$objWorkSheet->setCellValue('AG3', 'ENDING');
	$objWorkSheet->setCellValue('AG4', 'TS');
    $objWorkSheet->setCellValue('AH4', 'PPS');
    $objWorkSheet->setCellValue('AI4', 'CN');
    $objWorkSheet->setCellValue('AJ4', 'YF');
    $objWorkSheet->setCellValue('AK3', 'EOH QTY');
	
		$ctrRow = 5;

		$objWorkSheet->getStyle('G:K')->getNumberFormat()->setFormatCode('#,##0;[black](#,##0)');
		$objWorkSheet->getStyle('N:AK')->getNumberFormat()->setFormatCode('#,##0;[black](#,##0)');

		//Border
		$objWorkSheet->getStyle('A'.$ctrRow.':AK'.$ctrRow)->applyFromArray($styleArray);
		
        //Set font size
	 	$objWorkSheet->getStyle('A'.$ctrRow)->getFont()->setSize(10);
			
			
		$sql = "SELECT a.*, b.* FROM tbl_material_list a 
				INNER JOIN  tbl_material_list_price b ON b.mp_fkid_material_list = a.mat_pkid 	
				WHERE a.mat_logdel = '0' and b.mp_logdel = '0' 
				ORDER BY a.mat_product_desc, a.mat_product_specs ASC";
					
		$result = mysql_query($sql);
        while ($row = mysql_fetch_array($result)) {
			
			$mp_pkid 		= $row['mp_pkid'];
				
			//title  
            $objWorkSheet->getStyle('A1:AK1')->getFont()->setBold(true)->setSize(16);
            $objWorkSheet->getStyle('A2:AK2')->getFont()->setBold(true)->setSize(10);
            $objWorkSheet->getStyle('A3:AK4')->getFont()->setBold(true);
			
			$objWorkSheet->getStyle('M'.$ctrRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objWorkSheet->getStyle('M'.$ctrRow)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			//Border
			$objWorkSheet->getStyle('A'.$ctrRow.':AK'.$ctrRow)->applyFromArray($styleArray);

            //Set font size
            $objWorkSheet->getStyle('A'.$ctrRow.':AK'.$ctrRow)->getFont()->setSize(9);
			
            // Set value
            $objWorkSheet->setCellValue('A'.$ctrRow, $row['mat_product_desc']);
            $objWorkSheet->setCellValue('B'.$ctrRow, $row['mat_product_specs']);
            $objWorkSheet->setCellValue('C'.$ctrRow, $row['mp_unit_price_dollor']);
			$objWorkSheet->getStyle('C'.$ctrRow)->getNumberFormat()->setFormatCode('$0.000000');
            $objWorkSheet->setCellValue('D'.$ctrRow, $row['mp_exchange_rate']);
			$objWorkSheet->getStyle('D'.$ctrRow)->getNumberFormat()->setFormatCode('0.000');
            $objWorkSheet->setCellValue('E'.$ctrRow, $row['mp_unit_price_peso']);
			$objWorkSheet->getStyle('E'.$ctrRow)->getNumberFormat()->setFormatCode('#,##0.0000');
            $objWorkSheet->setCellValue('F'.$ctrRow, $row['mat_uom']);

			/* TS */
			/* EOH previous month */
			$sql1 = "SELECT (SUM(a.trans_ts_in) - SUM(a.trans_ts_out)) AS ttl_ts_eoh_prv_month
						FROM tbl_TS_transaction a
						LEFT JOIN vw_material_list b ON b.mp_pkid = a.trans_ts_fkid_material 
						WHERE a.trans_ts_date_transaction < '$startDate_inv' AND a.trans_ts_fkid_material = '$mp_pkid' AND a.trans_ts_logdel = '0'
						GROUP BY a.trans_ts_fkid_material
						ORDER BY b.mat_product_desc ASC";
			
			$result1 = mysql_query($sql1);
			if ($row1 = mysql_fetch_array($result1)) {
								
				$objWorkSheet->setCellValue('G'.$ctrRow, $row1['ttl_ts_eoh_prv_month']);
				// $objWorkSheet->setCellValue('G'.$ctrRow, $sql1);

			}
			
			/* Receive */
			//-02222020
			// $sql1a = "SELECT rm_ts_fkid_material, rm_ts_supplier, rm_ts_invoice_num, group_concat(rm_ts_invoice_num SEPARATOR ' / ') AS rm_ts_invoice_num_lbl, SUM( rm_ts_rcv_qty ) AS rm_ts_rcv_qty_ttl
			// 			FROM tbl_receive_materials_TS
			// 			WHERE (rm_ts_date_received BETWEEN '$startDate_inv' AND '$endDate_inv') AND rm_ts_logdel = '0' AND rm_ts_fkid_material =  '$mp_pkid'
			// 			GROUP BY rm_ts_fkid_material ASC";	

			$sql1a = "SELECT rm_ts_fkid_material, group_concat(rm_ts_supplier SEPARATOR ' / ') AS rm_ts_supplier, rm_ts_invoice_num, group_concat(rm_ts_invoice_num SEPARATOR ' / ') AS rm_ts_invoice_num_lbl, SUM( rm_ts_rcv_qty ) AS rm_ts_rcv_qty_ttl
						FROM tbl_receive_materials_TS
						WHERE (rm_ts_date_received BETWEEN '$startDate_inv' AND '$endDate_inv') AND rm_ts_logdel = '0' AND rm_ts_fkid_material =  '$mp_pkid'
						GROUP BY rm_ts_fkid_material ASC";	
								
			$result1a = mysql_query($sql1a);
			while ($row1a = mysql_fetch_array($result1a)) {
				
				$objWorkSheet->setCellValue('L'.$ctrRow, $row1a['rm_ts_supplier']);
				$objWorkSheet->setCellValue('M'.$ctrRow, $row1a['rm_ts_invoice_num_lbl']);
				$objWorkSheet->setCellValue('N'.$ctrRow, $row1a['rm_ts_rcv_qty_ttl']);
				// $objWorkSheet->setCellValue('N'.$ctrRow, $sql1a);
			
			}
			
			/* WITHDRAW */
			$sql1b = "SELECT SUM(trans_ts_out) as trans_ts_ttl_out 
						FROM tbl_TS_transaction 
						WHERE trans_ts_type = '2' AND 
								trans_ts_fkid_material = '$mp_pkid' AND 
								(trans_ts_date_transaction BETWEEN '$startDate_inv' AND '$endDate_inv') AND trans_ts_dept = '' AND trans_ts_logdel = '0'
						GROUP BY trans_ts_fkid_material ASC";	
						
			$result1b = mysql_query($sql1b);
			if ($row1b = mysql_fetch_array($result1b)) {
				
				$trans_ts_ttl_out = $row1b['trans_ts_ttl_out'];
				
				$objWorkSheet->setCellValue('AB'.$ctrRow, $row1b['trans_ts_ttl_out']);

			}
			
			/* TRANSFER */
			$sql1cc= "SELECT SUM(trans_ts_in) as ts_ttl_in_transfer, SUM(trans_ts_out) as ts_ttl_out_transfer FROM tbl_TS_transaction 
					WHERE trans_ts_type = '1' AND trans_ts_fkid_material = '$mp_pkid' AND (trans_ts_date_transaction BETWEEN '$startDate_inv' AND '$endDate_inv') AND trans_ts_logdel = '0'";	 

			$result1cc = mysql_query($sql1cc);
			while ($row1cc = mysql_fetch_array($result1cc)) {
				
				$ts_ttl_in_transfer 	= $row1cc['ts_ttl_in_transfer'];
				$ts_ttl_out_transfer 	= $row1cc['ts_ttl_out_transfer'];
				
				$ts_ttl_transfer = $ts_ttl_in_transfer - $ts_ttl_out_transfer;
				
				if ( $ts_ttl_transfer == 0 ){
					$objWorkSheet->setCellValue('X'.$ctrRow, 0);
				}else{
					$objWorkSheet->setCellValue('X'.$ctrRow, $ts_ttl_transfer);
				}
				
			}
					
			
			/* PPS */
			/* EOH previous month */ 
			$sql2 = "SELECT (SUM(a.trans_pps_in) - SUM(a.trans_pps_out)) AS ttl_pps_eoh_prv_month
						FROM tbl_PPS_transaction a
						LEFT JOIN vw_material_list b ON b.mp_pkid = a.trans_pps_fkid_material 
						WHERE a.trans_pps_date_transaction < '$startDate_inv' AND a.trans_pps_fkid_material = '$mp_pkid' AND a.trans_pps_logdel = '0'
						GROUP BY a.trans_pps_fkid_material
						ORDER BY b.mat_product_desc ASC";
				
			$result2 = mysql_query($sql2);
			if ($row2 = mysql_fetch_array($result2)) {
								
				$objWorkSheet->setCellValue('H'.$ctrRow, $row2['ttl_pps_eoh_prv_month']);

			}
			
			/* Receive */
			//-02222020
			// $sql2a = "SELECT rm_pps_fkid_material, rm_pps_supplier, rm_pps_invoice_num, group_concat(rm_pps_invoice_num SEPARATOR ' / ') AS rm_pps_invoice_num_lbl, SUM( rm_pps_rcv_qty ) AS rm_pps_rcv_qty_ttl
			// 			FROM tbl_receive_materials_PPS
			// 			WHERE (rm_pps_date_received BETWEEN '$startDate_inv' AND '$endDate_inv') AND rm_pps_logdel = '0' AND rm_pps_fkid_material =  '$mp_pkid'
			// 			GROUP BY rm_pps_fkid_material ASC";	
			$sql2a = "SELECT rm_pps_fkid_material, group_concat(rm_pps_supplier SEPARATOR ' / ') AS rm_pps_supplier, rm_pps_invoice_num, group_concat(rm_pps_invoice_num SEPARATOR ' / ') AS rm_pps_invoice_num_lbl, SUM( rm_pps_rcv_qty ) AS rm_pps_rcv_qty_ttl
						FROM tbl_receive_materials_PPS
						WHERE (rm_pps_date_received BETWEEN '$startDate_inv' AND '$endDate_inv') AND rm_pps_logdel = '0' AND rm_pps_fkid_material =  '$mp_pkid'
						GROUP BY rm_pps_fkid_material ASC";	
								
			$result2a = mysql_query($sql2a);
			while ($row2a = mysql_fetch_array($result2a)) {
				
				$objWorkSheet->setCellValue('L'.$ctrRow, $row2a['rm_pps_supplier']);
				$objWorkSheet->setCellValue('M'.$ctrRow, $row2a['rm_pps_invoice_num_lbl']);
				$objWorkSheet->setCellValue('O'.$ctrRow, $row2a['rm_pps_rcv_qty_ttl']);
			
			}
			
			/* WITHDRAW */
			$sql2b = "SELECT SUM(trans_pps_out) as trans_pps_ttl_out 
						FROM tbl_PPS_transaction WHERE trans_pps_type = '2' AND 
								trans_pps_fkid_material = '$mp_pkid' AND 
								(trans_pps_date_transaction BETWEEN '$startDate_inv' AND '$endDate_inv') AND trans_pps_dept = '' AND trans_pps_logdel = '0'
						GROUP BY trans_pps_fkid_material ASC";				
						
			$result2b = mysql_query($sql2b);
			if ($row2b = mysql_fetch_array($result2b)) {
				
				$trans_pps_ttl_out = $row2b['trans_pps_ttl_out'];
				
				$objWorkSheet->setCellValue('AC'.$ctrRow, $row2b['trans_pps_ttl_out']);
				
			}
			
			/* TRANSFER */
			$sql2cc= "SELECT SUM(trans_pps_in) as pps_ttl_in_transfer, SUM(trans_pps_out) as pps_ttl_out_transfer FROM tbl_PPS_transaction 
						WHERE trans_pps_type = '1' AND trans_pps_fkid_material = '$mp_pkid' AND (trans_pps_date_transaction BETWEEN '$startDate_inv' AND '$endDate_inv') AND trans_pps_logdel = '0' ";	 

			$result2cc = mysql_query($sql2cc);
			while ($row2cc = mysql_fetch_array($result2cc)) {
				
				$pps_ttl_in_transfer 	= $row2cc['pps_ttl_in_transfer'];
				$pps_ttl_out_transfer 	= $row2cc['pps_ttl_out_transfer'];
				
				$pps_ttl_transfer = $pps_ttl_in_transfer - $pps_ttl_out_transfer;
				
				if ( $pps_ttl_transfer == 0 ){
					$objWorkSheet->setCellValue('Y'.$ctrRow, 0);						
				}else{
					$objWorkSheet->setCellValue('Y'.$ctrRow, $pps_ttl_transfer);
				}
				
			}
			
			
			/* CN */
			/* EOH previous month */
			$sql3 = "SELECT (SUM(a.trans_cn_in) - SUM(a.trans_cn_out)) AS ttl_cn_eoh_prv_month
						FROM tbl_CN_transaction a
						LEFT JOIN vw_material_list b ON b.mp_pkid = a.trans_cn_fkid_material 
						WHERE a.trans_cn_date_transaction < '$startDate_inv' AND a.trans_cn_fkid_material = '$mp_pkid' AND a.trans_cn_logdel = '0'
						GROUP BY a.trans_cn_fkid_material
						ORDER BY b.mat_product_desc ASC";

			$result3 = mysql_query($sql3);
			if ($row3 = mysql_fetch_array($result3)) {
				
				$objWorkSheet->setCellValue('I'.$ctrRow, $row3['ttl_cn_eoh_prv_month']);

			}
			
			/* Receive */
			//- 02222020
			// $sql3a = "SELECT rm_cn_fkid_material, rm_cn_supplier, rm_cn_invoice_num, group_concat(rm_cn_invoice_num SEPARATOR ' / ') AS rm_cn_invoice_num_lbl, SUM( rm_cn_rcv_qty ) AS rm_cn_rcv_qty_lbl
			// 			FROM tbl_receive_materials_CN
			// 			WHERE (rm_cn_date_received BETWEEN '$startDate_inv' AND '$endDate_inv') AND rm_cn_logdel = '0' AND rm_cn_fkid_material =  '$mp_pkid'
			// 			GROUP BY rm_cn_fkid_material ASC";

			$sql3a = "SELECT rm_cn_fkid_material, group_concat(rm_cn_supplier SEPARATOR ' / ') AS rm_cn_supplier, rm_cn_invoice_num, group_concat(rm_cn_invoice_num SEPARATOR ' / ') AS rm_cn_invoice_num_lbl, SUM( rm_cn_rcv_qty ) AS rm_cn_rcv_qty_lbl
						FROM tbl_receive_materials_CN
						WHERE (rm_cn_date_received BETWEEN '$startDate_inv' AND '$endDate_inv') AND rm_cn_logdel = '0' AND rm_cn_fkid_material =  '$mp_pkid'
						GROUP BY rm_cn_fkid_material ASC";							
								
			$result3a = mysql_query($sql3a);
			while ($row3a = mysql_fetch_array($result3a)) {
				
				$objWorkSheet->setCellValue('L'.$ctrRow, $row3a['rm_cn_supplier']);
				$objWorkSheet->setCellValue('M'.$ctrRow, $row3a['rm_cn_invoice_num_lbl']);
				$objWorkSheet->setCellValue('P'.$ctrRow, $row3a['rm_cn_rcv_qty_lbl']);
			
			}
			
			/* WITHDRAW */
			$sql3b = "SELECT SUM(trans_cn_out) as trans_cn_ttl_out 
						FROM tbl_CN_transaction WHERE trans_cn_type = '2' AND 
								trans_cn_fkid_material = '$mp_pkid' AND 
								(trans_cn_date_transaction BETWEEN '$startDate_inv' AND '$endDate_inv') AND trans_cn_dept = '' AND trans_cn_logdel = '0'
						GROUP BY trans_cn_fkid_material ASC";	 				
						
			$result3b = mysql_query($sql3b);
			if ($row3b = mysql_fetch_array($result3b)) {
				
				$objWorkSheet->setCellValue('AD'.$ctrRow, $row3b['trans_cn_ttl_out']);

			}
			
			/* TRANSFER */			
			$sql3cc= "SELECT SUM(trans_cn_in) as cn_ttl_in_transfer, SUM(trans_cn_out) as cn_ttl_out_transfer FROM tbl_CN_transaction 
						WHERE trans_cn_type = '1' AND trans_cn_fkid_material = '$mp_pkid' AND (trans_cn_date_transaction BETWEEN '$startDate_inv' AND '$endDate_inv') AND trans_cn_logdel = '0'";	 

			$result3cc = mysql_query($sql3cc);
			while ($row3cc = mysql_fetch_array($result3cc)) {
				
				$cn_ttl_in_transfer 	= $row3cc['cn_ttl_in_transfer'];
				$cn_ttl_out_transfer 	= $row3cc['cn_ttl_out_transfer'];
				
				$cn_ttl_transfer = $cn_ttl_in_transfer - $cn_ttl_out_transfer;
				
				if ( $cn_ttl_transfer == 0 ){
					$objWorkSheet->setCellValue('Z'.$ctrRow, 0);
				}else{
					$objWorkSheet->setCellValue('Z'.$ctrRow, $cn_ttl_transfer);
				}
				
			}
			
			
			/* YF */
			/* EOH previous month */
			$sql4 = "SELECT (SUM(a.trans_yf_in) - SUM(a.trans_yf_out)) AS ttl_yf_eoh_prv_month
						FROM tbl_YF_transaction a
						LEFT JOIN vw_material_list b ON b.mp_pkid = a.trans_yf_fkid_material 
						WHERE a.trans_yf_date_transaction < '$startDate_inv' AND a.trans_yf_fkid_material = '$mp_pkid' AND a.trans_yf_logdel = '0'
						GROUP BY a.trans_yf_fkid_material
						ORDER BY b.mat_product_desc ASC";

			$result4 = mysql_query($sql4);
			if ($row4 = mysql_fetch_array($result4)) {
								
				$objWorkSheet->setCellValue('J'.$ctrRow, $row4['ttl_yf_eoh_prv_month']);

			}
						
			/* Receive */	
			//-02222020
			// $sql4a = "SELECT rm_yf_fkid_material, rm_yf_supplier, rm_yf_invoice_num, group_concat(rm_yf_invoice_num SEPARATOR ' / ') AS rm_yf_invoice_num_lbl, SUM( rm_yf_rcv_qty ) AS rm_yf_rcv_qty_lbl
			// 			FROM tbl_receive_materials_YF
			// 			WHERE (rm_yf_date_received BETWEEN '$startDate_inv' AND '$endDate_inv') AND rm_yf_logdel = '0' AND rm_yf_fkid_material =  '$mp_pkid'
			// 			GROUP BY rm_yf_fkid_material ASC";	
			
			$sql4a = "SELECT rm_yf_fkid_material, group_concat(rm_yf_supplier SEPARATOR ' / ') AS rm_yf_supplier, rm_yf_invoice_num, group_concat(rm_yf_invoice_num SEPARATOR ' / ') AS rm_yf_invoice_num_lbl, SUM( rm_yf_rcv_qty ) AS rm_yf_rcv_qty_lbl
						FROM tbl_receive_materials_YF
						WHERE (rm_yf_date_received BETWEEN '$startDate_inv' AND '$endDate_inv') AND rm_yf_logdel = '0' AND rm_yf_fkid_material =  '$mp_pkid'
						GROUP BY rm_yf_fkid_material ASC";	
								
			$result4a = mysql_query($sql4a);
			while ($row4a = mysql_fetch_array($result4a)) {
				
				$objWorkSheet->setCellValue('L'.$ctrRow, $row4a['rm_yf_supplier']);
				$objWorkSheet->setCellValue('M'.$ctrRow, $row4a['rm_yf_invoice_num_lbl']);
				$objWorkSheet->setCellValue('Q'.$ctrRow, $row4a['rm_yf_rcv_qty_lbl']);
			
			}
			
			/* WITHDRAW */
			$sql4b = "SELECT SUM(trans_yf_out) as trans_yf_ttl_out 
						FROM tbl_YF_transaction WHERE trans_yf_type = '2' AND 
								trans_yf_fkid_material = '$mp_pkid' AND 
								(trans_yf_date_transaction BETWEEN '$startDate_inv' AND '$endDate_inv') AND trans_yf_dept = '' AND trans_yf_logdel = '0'	
						GROUP BY trans_yf_fkid_material ASC";	 				
						
			$result4b = mysql_query($sql4b);
			if ($row4b = mysql_fetch_array($result4b)) {
				
				$objWorkSheet->setCellValue('AE'.$ctrRow, $row4b['trans_yf_ttl_out']);

			}
			
			/* TRANSFER */
			$sql4cc= "SELECT SUM(trans_yf_in) as yf_ttl_in_transfer, SUM(trans_yf_out) as yf_ttl_out_transfer FROM tbl_YF_transaction 
						WHERE trans_yf_type = '1' AND trans_yf_fkid_material = '$mp_pkid' AND (trans_yf_date_transaction BETWEEN '$startDate_inv' AND '$endDate_inv') AND trans_yf_logdel = '0'";	 

			$result4cc = mysql_query($sql4cc);
			while ($row4cc = mysql_fetch_array($result4cc)) {
									
				$yf_ttl_in_transfer 	= $row4cc['yf_ttl_in_transfer'];
				$yf_ttl_out_transfer 	= $row4cc['yf_ttl_out_transfer'];
				
				$yf_ttl_transfer = $yf_ttl_in_transfer - $yf_ttl_out_transfer;
				
				if ( $yf_ttl_transfer == 0 ){
					$objWorkSheet->setCellValue('AA'.$ctrRow, 0);
				}else{
					$objWorkSheet->setCellValue('AA'.$ctrRow, $yf_ttl_transfer);
				}
			}
			
			/* FORMULA */
			$objWorkSheet->setCellValue('K'.$ctrRow, '=G'.$ctrRow.'+H'.$ctrRow.'+I'.$ctrRow.'+J'.$ctrRow);
			$objWorkSheet->getStyle('K'.$ctrRow)->applyFromArray($styleTotal2);

			$objWorkSheet->setCellValue('R'.$ctrRow, '=N'.$ctrRow.'+O'.$ctrRow.'+P'.$ctrRow.'+Q'.$ctrRow);
			$objWorkSheet->getStyle('R'.$ctrRow)->applyFromArray($styleTotal2);

			$objWorkSheet->setCellValue('S'.$ctrRow, '=G'.$ctrRow.'+N'.$ctrRow);
			$objWorkSheet->setCellValue('T'.$ctrRow, '=H'.$ctrRow.'+O'.$ctrRow);
			$objWorkSheet->setCellValue('U'.$ctrRow, '=I'.$ctrRow.'+P'.$ctrRow);
			$objWorkSheet->setCellValue('V'.$ctrRow, '=J'.$ctrRow.'+Q'.$ctrRow);
			$objWorkSheet->setCellValue('W'.$ctrRow, '=K'.$ctrRow.'+R'.$ctrRow);
			$objWorkSheet->getStyle('W'.$ctrRow)->applyFromArray($styleTotal2);

			$objWorkSheet->setCellValue('AF'.$ctrRow, '=AB'.$ctrRow.'+AC'.$ctrRow.'+AD'.$ctrRow.'+AE'.$ctrRow);
			$objWorkSheet->getStyle('AF'.$ctrRow)->applyFromArray($styleTotal2);

			$objWorkSheet->setCellValue('AG'.$ctrRow, '=SUM(S'.$ctrRow.',X'.$ctrRow.')-AB'.$ctrRow);
			$objWorkSheet->setCellValue('AH'.$ctrRow, '=SUM(T'.$ctrRow.',Y'.$ctrRow.')-AC'.$ctrRow);
			$objWorkSheet->setCellValue('AI'.$ctrRow, '=SUM(U'.$ctrRow.',Z'.$ctrRow.')-AD'.$ctrRow);
			$objWorkSheet->setCellValue('AJ'.$ctrRow, '=SUM(V'.$ctrRow.',AA'.$ctrRow.')-AE'.$ctrRow);
			
			$objWorkSheet->setCellValue('AK'.$ctrRow, '=W'.$ctrRow.'-AF'.$ctrRow);
			$objWorkSheet->getStyle('AK'.$ctrRow)->applyFromArray($styleTotal2);
			
			$ctrRow++;
        }
		
		$objWorkSheet->getStyle('G5:K'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('L5:V'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('W5'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('X5:AA'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('AB5:AE'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('AF5'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('AG5:AJ'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('AK5:AK'.$ctrRow)->applyFromArray($OutlineStyle);
		
		/* TOTAL */
		$Total = $ctrRow - 1;
		
		$objWorkSheet->mergeCells('E'.$ctrRow.':F'.$ctrRow);
		$objWorkSheet->getStyle('E'.$ctrRow.':AK'.$ctrRow)->applyFromArray($styleTotal);
		$objWorkSheet->getStyle('E'.$ctrRow.':AK'.$ctrRow)->getFont()->setBold(true);
		$objWorkSheet->getStyle('F'.$ctrRow)->getFont()->setBold(true);
		$objWorkSheet->getStyle('E'.$ctrRow.':F'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('G'.$ctrRow.':K'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('L'.$ctrRow.':V'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('W'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('X'.$ctrRow.':AA'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('AB'.$ctrRow.':AE'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('AB'.$ctrRow.':AE'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('AG'.$ctrRow.':AJ'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('AF'.$ctrRow)->applyFromArray($OutlineStyle);
		$objWorkSheet->getStyle('AK'.$ctrRow)->applyFromArray($OutlineStyle);
		
		// Set Value
		$objWorkSheet->setCellValue('E'.$ctrRow, 'TOTAL');
		$objWorkSheet->setCellValue('G'.$ctrRow, "=SUM(G5:G".$Total.")");
		$objWorkSheet->setCellValue('H'.$ctrRow, "=SUM(H5:H".$Total.")");
		$objWorkSheet->setCellValue('I'.$ctrRow, "=SUM(I5:I".$Total.")");
		$objWorkSheet->setCellValue('J'.$ctrRow, "=SUM(J5:J".$Total.")");
		$objWorkSheet->setCellValue('K'.$ctrRow, "=SUM(K5:K".$Total.")");
		$objWorkSheet->getStyle('K'.$ctrRow)->applyFromArray($styleTotal2);
		$objWorkSheet->getStyle('K'.$ctrRow)->getFont()->setBold(true);
		
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
		$objWorkSheet->setCellValue('AF'.$ctrRow, "=SUM(AF5:AF".$Total.")");
		$objWorkSheet->setCellValue('AG'.$ctrRow, "=SUM(AG5:AG".$Total.")");
		$objWorkSheet->setCellValue('AH'.$ctrRow, "=SUM(AH5:AH".$Total.")");
		$objWorkSheet->setCellValue('AI'.$ctrRow, "=SUM(AI5:AI".$Total.")");
		$objWorkSheet->setCellValue('AJ'.$ctrRow, "=SUM(AJ5:AJ".$Total.")");
		
		$Total++;
		
		$objWorkSheet->setCellValue('AK'.$ctrRow, "=W".$Total."-AF".$Total);
        
        //- REMARKS 04072020
        $ctrRow1 = $Total + 3;

        $objWorkSheet->setCellValue('B'.$ctrRow1, 'REMARKS:');  
        $objWorkSheet->getStyle('B'.$ctrRow1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objWorkSheet->getStyle('B'.$ctrRow1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objWorkSheet->getStyle('B'.$ctrRow1.':B'.$ctrRow1)->getFont()->setBold(true)->setSize(10);
        
        $objWorkSheet->setCellValue('C'.$ctrRow1, $drp_remarks);
        $objWorkSheet->getStyle('C'.$ctrRow1)->getFont()->setSize(10);
        
        $ctrRow1++; 

	ob_end_clean();
		
    //SAVING
    $writer = new PHPExcel_Writer_Excel2007($objPHPExcel);
    unset($styleArray);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=IMI Quantity Report ('.date("Y/m/d").').xls'); // used for excel 2003 format
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); // used for excel 2003 format
    $objWriter->save('php://output');
?>