<?php 

require '../config/database.php';
require '../assets/lib/PHPExcel/Classes/PHPExcel.php';


    //excel
    //Preparacion BD Consulta automatica
    $stmt = $BD->prepare("SELECT * FROM inscripciones");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    
     if($result > 1)
     {    
        $objPHPExcel = new PHPExcel();
        //Properties file
        $objPHPExcel->getProperties()
        ->setCreator('Generado por Sistema')
        ->setTitle('Archivo de inscripciones')
        ->setDescription('Documento')
        ->setSubject("Hoja de calculo de Microsoft Excel 97-2003")
        ->setKeywords('Excel')
        ->setCategory('Inscripciones');

        //View name file
        $objPHPExcel-> setActiveSheetIndex(0);
        $objPHPExcel-> getActiveSheet()->setTitle('Vista de las inscripciones');

        //styles head
        $objPHPExcel->getActiveSheet()
        ->getStyle('A1:F1')
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setARGB('DFBF91');

        //Dimencions width and height
        $rowsExcel = 1;
        $columnsExcel = array("A","B","C","D","E","F","G","H");
        $count = count($columnsExcel);
        for ($i = 0; $i < $count; ++$i){
        $objPHPExcel->getActiveSheet()->getRowDimension($rowsExcel)->setRowHeight(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension($columnsExcel[$i])->setWidth(20);
        }
         //Create json
         json_encode($result);
         $data = json_decode(json_encode($result),true);
        $i=2;
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nombre');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Apellidos');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Edad');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Teléfono');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Correo');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Asignación');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Abonó');
        foreach ($data as $value) {
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $value['id']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $value['nombre']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $value['apellidos']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $value['edad']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $value['telefono']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $value['correo']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $value['asignacion']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $value['abono']);
        $i++;
        }
        
        //type file
        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header('Content-Disposition: attachment; filename="Inscripciones.xls" ');
        header('Cache-Control: max-age=0');

        //output
        $objWrite = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWrite->save('php://output');
    }