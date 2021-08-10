<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	public function index() {
		$this->layout->title("Anasayfa");
		$this->layout->render("home");
	}
}
