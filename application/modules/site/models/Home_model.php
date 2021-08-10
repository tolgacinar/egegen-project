<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getSlides() {
		return $this->db->where('slide_status', 1)->get("slides")->result();
	}

	public function getContents() {
		return $this->db
		->select("contents.*, seo_url.s_url")
		->where(["contents.content_status" => 1, "seo_url.s_type" => "content"])
		->join("seo_url", "contents.content_id = seo_url.s_target", "left")
		->get("contents")
		->result();
	}

	public function getNews($limit = 0, $offset = 0) {
		return $this->db
		->where(["news.news_status" => 1, "seo_url.s_type" => "news"])
		->limit($limit, $offset)
		->join("seo_url", "news.news_id = seo_url.s_target", "left")
		->get("news")
		->result();
	}

	public function countNews() {
		return $this->db->get_where("news", ["news_status" => 1])->num_rows();
	}

}

/* End of file Home_model.php */
/* Location: ./application/modules/site/models/Home_model.php */