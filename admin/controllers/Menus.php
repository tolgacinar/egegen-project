<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends MX_Controller {

	public function index() {
		
		$this->layout->render("menu/builder");
	}

	public function save_menu() {
		if ($this->input->post("menu")) {
			if($this->db->update("settings", ['set_val' => $this->input->post("menu")], ['set_key' => "menu"])) {
				return $this->output->set_content_type('application/json')->set_output(json_encode([
					"status"	=>	true,
				]));
			}else {
				return $this->output->set_content_type('application/json')->set_output(json_encode([
					"status"	=>	false,
				]));
			}
		}
	}

	public function get_menu() {
		return $this->output->set_content_type('application/json')->set_output($this->db->get_where("settings", ['set_key' => "menu"])->row()->set_val);
	}
}

/* End of file Menus.php */
/* Location: ./application/modules/admin/controllers/Menus.php */