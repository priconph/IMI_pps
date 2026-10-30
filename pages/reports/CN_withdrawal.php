<?php
    require('../../../media/PHPExcel.php'); //change this with your OOP path
    
	session_start();
    $startDate 	= $_GET['startDate'];
    $endDate 	= $_GET['endDate'];
    $requestor 	= $_GET['requestor'];
   
   $datetoday = date("F j, Y"); 
   
    //Database Connection
    mysql_connect('localhost', 'root', 'r@p1d0nl1n3');
    // mysql_select_db('db_imi_test');
    mysql_select_db('db_imi');

    //Create new PHPExcel Page
    $objPHPExcel = new PHPExcel;
    $objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
    
	//Font Size: Global
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(11);

    //Create Sheet
    $objWorkSheet = $objPHPExcel->getActiveSheet();
    $title = "CN Withdrawal"; //set title cont.
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
       // 'borders' => array(
        // 'allborders' => array(
          // 'style' => PHPExcel_Style_Border::BORDER_THIN //set borders
        // )
      // ),
	  'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID, //set back color
        'color' => array('rgb'=>'F5CBA7'),
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
	
	 $styleTotal = array(
      'borders' => array(
        'allborders' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN //set borders
        )
      )
    );

   //Horizontal
    $objWorkSheet->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objWorkSheet->getStyle('A2:G2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objWorkSheet->getStyle('A3:G3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    //Vertical
    $objWorkSheet->getStyle('A1:G1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objWorkSheet->getStyle('A2:G2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objWorkSheet->getStyle('A3:G3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 
    //Set width: Static
    $objWorkSheet->getColumnDimension('A')->setWidth(15);
    $objWorkSheet->getColumnDimension('B')->setWidth(35);
    $objWorkSheet->getColumnDimension('C')->setWidth(25);
    $objWorkSheet->getColumnDimension('D')->setWidth(10);
    $objWorkSheet->getColumnDimension('E')->setWidth(10);
    $objWorkSheet->getColumnDimension('F')->setWidth(20);
    $objWorkSheet->getColumnDimension('G')->setWidth(25);
	
    //Border
    $objWorkSheet->getStyle('A1:G1')->applyFromArray($styleHeader);
    $objWorkSheet->getStyle('A2:G2')->applyFromArray($styleHeader);
    $objWorkSheet->getStyle('A3:G3')->applyFromArray($styleHeader1);

    //Wrap Text
    $objWorkSheet->getStyle('A3:G3')->getAlignment()->setWrapText(true);

    //Set height: Static 
	$objPHPExcel->getActiveSheet()->setAutoFilter('A3:G3');
	
    //Set font size
    $objWorkSheet->getStyle('A2:G2')->getFont()->setSize(10);
    $objWorkSheet->getStyle('A3:G3')->getFont()->setSize(12);

    //Merge Cells
    $objWorkSheet->mergeCells('A1:G1');
    $objWorkSheet->mergeCells('A2:G2');
      
    //DEFAULT Values
    $objWorkSheet->setCellValue('A1', 'CN WITHDRAWAL REPORT');
    $objWorkSheet->setCellValue('A2', 'As of '.$datetoday.' ');
    $objWorkSheet->setCellValue('A3', 'DATE REQUESTED');
    $objWorkSheet->setCellValue('B3', 'ITEM DESCRIPTION');
    $objWorkSheet->setCellValue('C3', 'ITEM SPECS');
    $objWorkSheet->setCellValue('D3', 'UOM');
    $objWorkSheet->setCellValue('E3', 'QTY');
    $objWorkSheet->setCellValue('F3', 'AMOUNT');
    $objWorkSheet->setCellValue('G3', 'REQUESTOR');
   
		 $ctrRow = 4;
		//Horizontal
		$objWorkSheet->getStyle('A:G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//Vertical
		$objWorkSheet->getStyle('A:G')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

	    //Border
		$objWorkSheet->getStyle('A'.$ctrRow.':G'.$ctrRow)->applyFromArray($styleArray);
	
		//Wrap Text
		$objWorkSheet->getStyle('A'.$ctrRow.':G'.$ctrRow)->getAlignment()->setWrapText(true);

        //Set font size
	 	$objWorkSheet->getStyle('A'.$ctrRow)->getFont()->setSize(10);
				
			$sql = "SELECT a.*, SUM(a.withdraw_qty) as ttl_req_qty, MONTH(a.date) as req_month, YEAR(a.date) as req_year, b.name as requestor_name
					FROM vw_request_details a
					INNER JOIN db_rapid.tbl_useraccounts b on b.username = a.requested_by
					WHERE a.department = 'CN' AND a.requested_by = '$requestor' AND (a.date BETWEEN '$startDate' AND '$endDate')
					GROUP BY a.material_withdraw_id, MONTH(a.date), YEAR(a.date) ASC 
					ORDER BY a.date ASC";

		$result = mysql_query($sql);
        while ($row = mysql_fetch_array($result))
        {
					
			//title  
            $objWorkSheet->getStyle('A1:G1')->getFont()->setBold(true)->setSize(16);
            $objWorkSheet->getStyle('A3:G3')->getFont()->setBold(true);
			
			//Horizontal
			$objWorkSheet->getStyle('A:G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			//Vertical
			$objWorkSheet->getStyle('A:G')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			//Border
			$objWorkSheet->getStyle('A'.$ctrRow.':G'.$ctrRow)->applyFromArray($styleArray);
			
           //Wrap Text
            $objWorkSheet->getStyle('A'.$ctrRow.':G'.$ctrRow)->getAlignment()->setWrapText(true);

            //Set font size
            $objWorkSheet->getStyle('A'.$ctrRow.':G'.$ctrRow)->getFont()->setSize(10);
		
            // Set value
			$unit_price_peso = $row['unit_price_peso'];
            
			$objWorkSheet->setCellValue('A'.$ctrRow, $row['date']);
            $objWorkSheet->setCellValue('B'.$ctrRow, $row['product_desc']);
            $objWorkSheet->setCellValue('C'.$ctrRow, $row['product_specs']);
            $objWorkSheet->setCellValue('D'.$ctrRow, $row['uom']);
            $objWorkSheet->setCellValue('E'.$ctrRow, $row['ttl_req_qty']);
            $objWorkSheet->setCellValue('F'.$ctrRow, $row['unit_price_peso']);
			$objWorkSheet->getStyle('F'.$ctrRow)->getNumberFormat()->setFormatCode('#,##0.0000');
            $objWorkSheet->setCellValue('G'.$ctrRow, $row['requestor_name']);
			$ctrRow++;
			
        } 
		
		$Total = $ctrRow - 1;
		
		$objWorkSheet->getStyle('D'.$ctrRow.':F'.$ctrRow)->applyFromArray($styleTotal);
		$objWorkSheet->getStyle('D'.$ctrRow.':F'.$ctrRow)->getFont()->setBold(true);
		
		//Set Value
		$objWorkSheet->setCellValue('D'.$ctrRow, 'TOTAL');
		$objWorkSheet->setCellValue('E'.$ctrRow, "=SUM(E4:E".$Total.")");
		$objWorkSheet->getStyle('E'.$ctrRow)->getNumberFormat()->setFormatCode('#,##0');
		$objWorkSheet->setCellValue('F'.$ctrRow, "=SUM(F4:F".$Total.")");
		$objWorkSheet->getStyle('F'.$ctrRow)->getNumberFormat()->setFormatCode('#,##0.0000');
	
	ob_end_clean();
		
    //SAVING
    $writer = new PHPExcel_Writer_Excel2007($objPHPExcel);
    unset($styleArray);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=CN Withdrawal Report ('.date("Y/m/d").').xls'); // used for excel 2003 format
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); // used for excel 2003 format
    $objWriter->save('php://output');
?>