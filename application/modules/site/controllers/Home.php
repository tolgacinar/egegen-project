<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	public function index() {
		$this->load->library('layout');
		$this->layout->site("home");
	}
}
