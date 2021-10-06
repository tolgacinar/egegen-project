<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents_model extends CI_Model {

	public function getContents() {
		return $this->db->get("contents")->result();
	}

	public function insertContent() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('content_title', 'İçerik Başlığı', 'trim|required');
		$this->form_validation->set_rules('content_text', 'İçerik Metni', 'trim|required');
		if ($_FILES['content_image']['error'] != 0) {
			$this->form_validation->set_rules('content_image', 'İçerik Görseli', 'trim|required');
		}
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = FCPATH . 'uploads/contents/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('content_image')) {
				$this->error = $this->upload->display_errors();
				return false;
			} else {
				$insertData = [
					"content_title"	=>	$this->input->post("content_title", TRUE),
					"content_text"	=>	$this->input->post("content_text", TRUE),
					"content_image"	=>	str_replace(str_replace("\\", "/", FCPATH), "", $this->upload->data("full_path")),
					"content_status"	=>	true
				];

				$this->db->trans_begin();
				$this->db->insert("contents", $insertData);

				$content_id = $this->db->insert_id();

				$this->db->insert("seo_url", [
					"s_type"	=>	"contents",
					"s_target"	=>	$content_id,
					"s_url"		=>	"contents/" . permalink($this->input->post("content_title", TRUE))
				]);

				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
					$this->error = $this->db->error();
					return false;
				} else {
					$this->db->trans_commit();
					return true;
				}
			}
		} else {
			$this->error = validation_errors();
			return false;
		}
	}

	public function deleteContent($content_id) {

		$content = $this->db->get_where("contents", ['content_id' => $content_id])->row();
		$this->db->trans_begin();
		$this->db->delete("contents", ['content_id' => $content_id]);
		$this->db->delete("seo_url", ['s_type' => 'contents', 's_target' => $content_id]);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->error = $this->db->error();
			return false;
		} else {
			$this->db->trans_commit();
			unlink(FCPATH . $content->content_image);
			return true;
		}
	}

}

/* End of file Contents_model.php */
/* Location: .//D/xampp/htdocs/egegen/admin/models/Contents_model.php */