<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout {
	protected $ci;
	public $data = [];

	public function __construct() {
        $this->ci =& get_instance();
        $this->title("");
		$this->ci->load->model('common_model');
        $this->data['menus'] = $this->ci->common_model->getMenu();
	}

	public function render($view, $data = []) {
		$data = array_merge($this->data, $data);
		$this->ci->load->view("includes/header", $data);
		$this->ci->load->view($view);
		$this->ci->load->view("includes/footer", $data);
	}

	public function title($title) {
		$this->data['page_title'] = $title . " - Site Adı";
	}

}

/* End of file Layout.php */
/* Location: ./application/libraries/Layout.php */
