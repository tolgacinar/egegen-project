<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getMenu() {
		return json_decode($this->db->get_where("settings", ['set_key' => 'menu'])->row()->set_val);
		// return $this->buildTree($this->db->where("menu_status", 1)->get("menu")->result());
		
	}

	public function buildTree($elements, $parent = 0) {
		$return = [];
		foreach ($elements as $element) {
			if ($element->menu_parent == $parent) {
				$children = $this->buildTree($elements, $element->menu_id);
				if ($children) {
					$element->children = $children;
				}else {
					$element->children = null;
				}

				$return[] = $element;
			}
		}
		return $return;
	}

	public function getSlides() {
		return $this->db->where('slide_status', 1)->get("slides")->result();
	}



}

/* End of file Common.php */
/* Location: ./application/modules/site/models/Common.php */