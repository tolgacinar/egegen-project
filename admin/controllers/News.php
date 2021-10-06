<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('news_model', 'news');
	}

	public function index() {
		$data = [
			"news"	=>	$this->news->getNews(),
		];
		$this->layout->render("news/list", $data);
	}

	public function create() {
		$data = [];
		if (isset($_POST) && !empty($_POST)) {
			if ($this->news->insertNews()) {
				redirect('admin/news','refresh');
			}else {
				$data['error'] = $this->news->error;
			}
		}
		$this->layout->render("news/create", $data);
	}

	public function delete($news_id) {
		if ($this->news->deleteNews($news_id)) {
			redirect('admin/news','refresh');
		}
	}

}

/* End of file News.php */
/* Location: .//D/xampp/htdocs/egegen/admin/controllers/News.php */