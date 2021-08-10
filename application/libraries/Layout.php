<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout {
	protected $ci;
	public $data = [];

	public function __construct() {
        $this->ci =& get_instance();
	}

	public function site($view, $data = []) {
		$data = array_merge($this->data, $data);
		$this->ci->load->view("includes/header", $data);
		$this->ci->load->view($view);
		$this->ci->load->view("includes/footer", $data);
	}

}

/* End of file Layout.php */
/* Location: ./application/libraries/Layout.php */
