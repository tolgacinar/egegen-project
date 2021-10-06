<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index() {
		$data = [
			"slides"	=>	$this->home_model->getSlides(),
			"contents"	=>	$this->home_model->getContents(),
			"news"		=>	$this->home_model->getNews(3)
		];
		$this->layout->title("Anasayfa");
		$this->layout->render("home", $data);
	}

	public function fetch_news() {
		if ($this->input->is_ajax_request() && !empty($_POST)) {
			$post = $this->input->post(NULL, TRUE);
			$limit = (int) $this->input->post("limit");
			$offset = (int) $this->input->post("offset");
			$news = $this->home_model->getNews($limit, $offset);
			if (empty($news)) {
				$this->output->set_content_type('application/json')->set_output(json_encode([
					"status"	=>	false
				]));
			}else {
				if ($offset + $limit >= $this->home_model->countNews()) {
					$last = true;
				}else {
					$last = false;
				}
				$this->output->set_content_type('application/json')->set_output(json_encode([
					"status"	=>	true,
					"offset"	=>	$offset,
					"news"		=>	$this->home_model->getNews($limit, $offset),
					"last"		=>	$last
				]));
			}
		}
	}
}
