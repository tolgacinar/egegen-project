<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel_model extends CI_Model {

	public function getSlides() {
		return $this->db->get("slides")->result();
	}

	public function insertCarousel() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('slide_title', 'Slide Başlığı', 'trim|required');
		if ($_FILES['slide_image']['error'] != 0) {
			$this->form_validation->set_rules('slide_image', 'Slide Görseli', 'trim|required');
		}
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = FCPATH . 'uploads/slides/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('slide_image')) {
				$this->error = $this->upload->display_errors();
				return false;
			}else {
				$insertData = [
					"slide_title"	=>	$this->input->post("slide_title", TRUE),
					"slide_image"	=>	str_replace(str_replace("\\", "/", FCPATH), "", $this->upload->data("full_path")),
					"slide_status"	=>	true
				];

				if ($this->db->insert("slides", $insertData)) {
					return true;
				}else {
					$this->error = $this->db->error();
				}
			}
		} else {
			$this->error = validation_errors();
			return false;
		}
	}

	public function deleteCarousel($slide_id) {
		$slide = $this->db->get_where("slides", ['slide_id' => $slide_id])->row();
		if ($this->db->delete("slides", ['slide_id' => $slide_id])) {
			unlink(FCPATH . $slide->slide_image);
			return true;
		}
	}

}

/* End of file Carousel.php */
/* Location: .//D/xampp/htdocs/egegen/admin/models/Carousel.php */