<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes_ipress_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Reportes_ipress_m');
	}


	public function index()
	{
		$this->load->view('reportes/Reportes_ipress_v');
	}

	public function grafico_1()
	{
		$r = $this->db->query("select red_salud.red_salud as red, COUNT(ipress) as cantidad FROM red_salud INNER JOIN microred ON microred.red = red_salud.id_red INNER JOIN ipress ON ipress.microred = microred.id_microred GROUP BY microred.red ")->result();
		echo json_encode($r);
	}

	public function exportar_ipress()
	{
		
		require_once APPPATH . 'libraries/Classes/PHPExcel.php';

		$objPHPExcel = new PHPExcel();	
		$objPHPExcel->getProperties()
		->setCreator("MDH")
		->setLastModifiedBy("Códigos de Programación")
		->setTitle("Excel en PHP")
		->setSubject("Documento de Trabajo")
		->setDescription("Documento generado con PHPExcel")
		->setKeywords("excel phpexcel php")
		->setCategory("Practicas Profesional II");
		//propiedades de la hoja
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setTitle('Hoja 1');
		// Se combinan campos de A1:G1
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'LISTADO DE LOS INTITUCIONES PRESTADORAS DE SERVICIOS DE SALUD IPRESS (GORESAM)');
		$objPHPExcel->getActiveSheet()->setCellValue('A2', 'REGION  SAN MARTIN 2016  ');
		$objPHPExcel->getActiveSheet()->setCellValue('A3', 'REDES DE SALUD');
		$objPHPExcel->getActiveSheet()->setCellValue('B3', 'MICRORRED');
 		$objPHPExcel->getActiveSheet()->setCellValue('B4', 'N°');
 		$objPHPExcel->getActiveSheet()->setCellValue('C4', 'NOMBRE');
 		$objPHPExcel->getActiveSheet()->setCellValue('D3', 'Nro');
 		$objPHPExcel->getActiveSheet()->setCellValue('E3', 'TIPO');
 		$objPHPExcel->getActiveSheet()->setCellValue('F3', 'CATEG.');
 		$objPHPExcel->getActiveSheet()->setCellValue('G3', 'NOMBRE DE IPRESS');
 		$objPHPExcel->getActiveSheet()->setCellValue('H3', 'CODIGO RENIPRESS');
 		$objPHPExcel->getActiveSheet()->setCellValue('I3', 'Ubicación del EESS');
 		$objPHPExcel->getActiveSheet()->setCellValue('I5', 'Provincia');
 		$objPHPExcel->getActiveSheet()->setCellValue('J5', 'Distrito');
 		$objPHPExcel->getActiveSheet()->setCellValue('K3', 'Nº Resolución');
 		$objPHPExcel->getActiveSheet()->setCellValue('L3', 'Fecha');
		$objPHPExcel->getActiveSheet()->mergeCells('A1:L1');
		$objPHPExcel->getActiveSheet()->mergeCells('A2:L2');
		$objPHPExcel->getActiveSheet()->mergeCells('A3:A5');
		$objPHPExcel->getActiveSheet()->mergeCells('B3:C3');
		$objPHPExcel->getActiveSheet()->mergeCells('B4:B5');
		$objPHPExcel->getActiveSheet()->mergeCells('C4:C5');
		$objPHPExcel->getActiveSheet()->mergeCells('D3:D5');
		$objPHPExcel->getActiveSheet()->mergeCells('E3:E5');
		$objPHPExcel->getActiveSheet()->mergeCells('F3:F5');
		$objPHPExcel->getActiveSheet()->mergeCells('G3:G5');
		$objPHPExcel->getActiveSheet()->mergeCells('H3:H5');
		$objPHPExcel->getActiveSheet()->mergeCells('I3:J4');
		$objPHPExcel->getActiveSheet()->mergeCells('K3:K5');
		$objPHPExcel->getActiveSheet()->mergeCells('L3:L5');
		$titulo = array(
			'font' => array(
				'name'      => 'Calibri',
				'bold'      => true,
				'italic'    => false,
				'strike'    => false,
				'size' =>13
			),
			'fill' => array(
				'type'  => PHPExcel_Style_Fill::FILL_SOLID
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_NONE
				)
			),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			)
		);
		$subtitulo1 = array(
			'font' => array(
				'name'  => 'calibri',
				'bold'  => true,
				'size' =>10,
				'color' => array(
					'rgb' => '000000
'
				)
			),
			//fill = fondo de celda
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' =>array('rgb' => 'ffbb99')
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_MEDIUM	//BORDER_MEDIUM , BORDER_THIN , BORDER_NONE grosor del borde
				)
			),
			'alignment' =>  array(
				'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'wrap'  => true,
			)
		);
		$estiloTitulovertical = array(
			'font' => array(
				'name'  => 'calibri',
				'bold'  => true,
				'size' => 10,
				'color' => array(
					'rgb' => '000000
'
				)
			),
			//fill = fondo de celda
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN	//BORDER_MEDIUM , BORDER_THIN , BORDER_NONE grosor del borde
				)
			),
			'alignment' =>  array(
				'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'rotation'   => 90,
			)
		);

		//tamaño de celdas
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(11);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(7);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(23);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(13);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(18);
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(34);
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(12);
//		$objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(45);

		//stylos de celdas
		$objPHPExcel->getActiveSheet()->getStyle('A1:L1')->applyFromArray($titulo);
		$objPHPExcel->getActiveSheet()->getStyle('A2:L2')->applyFromArray($titulo);
		$objPHPExcel->getActiveSheet()->getStyle('A3:A5')->applyFromArray($subtitulo1);
		$objPHPExcel->getActiveSheet()->getStyle('B3:C3')->applyFromArray($subtitulo1);
		$objPHPExcel->getActiveSheet()->getStyle('B4:B5')->applyFromArray($subtitulo1);
		$objPHPExcel->getActiveSheet()->getStyle('C4:C5')->applyFromArray($subtitulo1);
		$objPHPExcel->getActiveSheet()->getStyle('D3:D5')->applyFromArray($subtitulo1);
		$objPHPExcel->getActiveSheet()->getStyle('E3:E5')->applyFromArray($subtitulo1);
		$objPHPExcel->getActiveSheet()->getStyle('F3:F5')->applyFromArray($subtitulo1);
		$objPHPExcel->getActiveSheet()->getStyle('G3:G5')->applyFromArray($subtitulo1);
		$objPHPExcel->getActiveSheet()->getStyle('H3:H5')->applyFromArray($subtitulo1);
		$objPHPExcel->getActiveSheet()->getStyle('I3:J4')->applyFromArray($subtitulo1);
		$objPHPExcel->getActiveSheet()->getStyle('I5')->applyFromArray($subtitulo1);
		$objPHPExcel->getActiveSheet()->getStyle('J5')->applyFromArray($subtitulo1);
 		$objPHPExcel->getActiveSheet()->getStyle('K3:K5')->applyFromArray($subtitulo1);
 		$objPHPExcel->getActiveSheet()->getStyle('L3:L5')->applyFromArray($subtitulo1);

// Agregar en celda A1 valor string
/*		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'PHPExcel');

// Agregar en celda A2 valor numerico
		$objPHPExcel->getActiveSheet()->setCellValue('A2', 12345.6789);

// Agregar en celda A3 valor boleano
		$objPHPExcel->getActiveSheet()->setCellValue('A3', TRUE);

// Agregar a Celda A4 una formula
		$objPHPExcel->getActiveSheet()->setCellValue('A4', '=CONCATENATE(A1, " ", A2)');
*/
		//formato XLSX
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Disposition: attachment;filename="Lista_ipress.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');

		//FORMATO XLS

		/*header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Excel.xls"');
		header('Cache-Control: max-age=0');
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');*/





	}

}
