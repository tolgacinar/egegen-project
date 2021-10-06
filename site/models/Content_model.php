<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_model extends CI_Model {

	public function getContent($url) {
		$url = "content/" . $url;
		$content = $this->db
		->where(["seo_url.s_type" => "content", "seo_url.s_url" => $url])
		->join("seo_url", "contents.content_id = seo_url.s_target")
		->get("contents")
		->row();
		
		return $content;
	}

}

/* End of file Content_model.php */
/* Location: ./application/modules/site/models/Content_model.php */