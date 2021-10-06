<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('content_model');
	}

	public function content_detail($url) {
		$content = $this->content_model->getContent($url);
		if (empty($content)) {
			show_404();
		}
		$this->load->library('breadcrumb');
		$this->breadcrumb->add("Yazılar", "#");
		$this->breadcrumb->add($content->content_title, $content->s_url);
		$data = [
			"content"		=>	$content,
			"breadcrumb"	=>	$this->breadcrumb->render()
		];

		$this->layout->title($content->content_title);
		$this->layout->render("content_detail", $data);
	}
}
