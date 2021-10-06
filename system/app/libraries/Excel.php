<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel {

	protected $ci;
	protected $spreadsheet;

	public function __construct() {
		$this->ci =& get_instance();
		$this->spreadsheet = new Spreadsheet;
	}

	public function listToExcel($list, $fields) {
		$sheet = $this->spreadsheet->getActiveSheet();
		$range = range("A", "Z");
		
		foreach ($list as $key => $value) {
			$nkey = 0;
			foreach ($value as $k => $v) {
				if (in_array($k, $fields)) {
					$sheet->setCellValue($range[$nkey] . ($key+1), strip_tags($v));
					$nkey++;
				}
			}
		}
		$writer = new Xlsx($this->spreadsheet);
		$filename = date("Y-m-d-h-i-s");

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	

}

/* End of file Excel.php */
/* Location: .//D/xampp/htdocs/egegen/system/app/libraries/Excel.php */
