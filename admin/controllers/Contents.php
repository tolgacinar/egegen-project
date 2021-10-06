<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('contents_model', 'contents');
	}

	public function index() {
		$data = [
			"contents"	=>	$this->contents->getContents(),
		];
		$this->layout->render("contents/list", $data);
	}

	public function create() {
		$data = [];
		if (isset($_POST) && !empty($_POST)) {
			if ($this->contents->insertContent()) {
				redirect('admin/contents','refresh');
			}else {
				$data['error'] = $this->contents->error;
			}
		}
		$this->layout->render("contents/create", $data);
	}

	public function delete($content_id) {
		if ($this->contents->deleteContent($content_id)) {
			redirect('admin/contents','refresh');
		}
	}

	public function excel() {
		$this->load->library('excel');
		$this->excel->listToExcel($this->contents->getContents(), ["content_title", "content_text", "content_image"]);
	}
}

/* End of file Contents.php */
/* Location: .//D/xampp/htdocs/egegen/admin/controllers/Contents.php */