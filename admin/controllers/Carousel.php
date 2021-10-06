<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('carousel_model', 'carousel');
	}

	public function index() {
		$this->load->model('carousel_model', 'carousel');
		$data = [
			"slides"	=>	$this->carousel->getSlides(),
		];
		$this->layout->render("carousel/list", $data);
	}

	public function create() {
		$data = [];
		if (isset($_POST) && !empty($_POST)) {
			if ($this->carousel->insertCarousel()) {
				redirect('admin/carousel','refresh');
			}else {
				$data['error'] = $this->carousel->error;
			}
		}
		$this->layout->render("carousel/create", $data);
	}

	public function delete($slide_id) {
		if ($this->carousel->deleteCarousel($slide_id)) {
			redirect('admin/carousel','refresh');
		}
	}

}

/* End of file Carousel.php */
/* Location: .//D/xampp/htdocs/egegen/admin/controllers/Carousel.php */