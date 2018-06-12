<?php
    $connection = mysqli_connect("localhost","root","","iiita-placement");

    if(isset($_REQUEST['submit'])){
        $data = array();
        $jobid = $_REQUEST['jobid'];
        $companyid = $_REQUEST['companyid'];
          
        $select_query = "SELECT * FROM relations WHERE company_id='$companyid' AND job_id='$jobid'";
        $check = mysqli_query($connection,$select_query);

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Europe/London');

        if (PHP_SAPI == 'cli')
            die('This example should only be run from a Web Browser');

        /** Include PHPExcel */
        require_once 'libraries/phpexcel/Classes/PHPExcel.php';


        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                                     ->setLastModifiedBy("Maarten Balliauw")
                                     ->setTitle("Office 2007 XLSX Test Document")
                                     ->setSubject("Office 2007 XLSX Test Document")
                                     ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Test result file");


        // Add some data

            //To set the width of the column.
                foreach(range('A','F') as $columnID) {
                    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
                        ->setAutoSize(true);
                }

                $objPHPExcel->getActiveSheet()->getStyle("A1:F1")->getFont()->setBold(true);

                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A1', 'S.no')
                            ->setCellValue('B1', 'Name')
                            ->setCellValue('C1', 'Roll number')
                            ->setCellValue('D1', 'Phone number')
                            ->setCellValue('E1', 'Alternate Email')
                            ->setCellValue('F1', 'Date of birth');


                    $i = 3;
            if(mysqli_num_rows($check)>0){
                
                    while($aray = mysqli_fetch_array($check)){
                    
                        $student_id = $aray['student_id'];
                        $get_student = "SELECT * FROM students WHERE student_id='$student_id'";
                        $check1 = mysqli_query($connection,$get_student);
                        $student_info = mysqli_fetch_array($check1);

                        $name = $student_info['student_name'];
                        $rollnum = $student_info['student_roll_no'];
                        $email = $student_info['student_email'];
                        $contact = $student_info['student_contact'];
                        $dob = $student_info['date-of-birth'];

                        $objPHPExcel->setActiveSheetIndex(0)
                                    ->setCellValue('A'.$i, $i-2)
                                    ->setCellValue('B'.$i, $name)
                                    ->setCellValue('C'.$i, $rollnum)
                                    ->setCellValue('D'.$i, $contact)
                                    ->setCellValue('E'.$i, $email)
                                    ->setCellValue('F'.$i, $dob);

                        $i++;

                    };
        
            }
            else{

            }
        
        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Simple');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="students_list.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

?>