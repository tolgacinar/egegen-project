<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

	public function getNews() {
		return $this->db->get("news")->result();
	}

	public function insertNews() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('news_title', 'Haber Başlığı', 'trim|required');
		$this->form_validation->set_rules('news_content', 'Haber İçeriği', 'trim|required');
		if ($_FILES['news_image']['error'] != 0) {
			$this->form_validation->set_rules('news_image', 'Haber Görseli', 'trim|required');
		}
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = FCPATH . 'uploads/news/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('news_image')) {
				$this->error = $this->upload->display_errors();
				return false;
			} else {
				$insertData = [
					"news_title"	=>	$this->input->post("news_title", TRUE),
					"news_content"	=>	$this->input->post("news_title", TRUE),
					"news_image"	=>	str_replace(str_replace("\\", "/", FCPATH), "", $this->upload->data("full_path")),
					"news_status"	=>	true
				];

				$this->db->trans_begin();
				$this->db->insert("news", $insertData);

				$news_id = $this->db->insert_id();

				$this->db->insert("seo_url", [
					"s_type"	=>	"news",
					"s_target"	=>	$news_id,
					"s_url"		=>	"news/" . permalink($this->input->post("news_title", TRUE))
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

	public function deleteNews($news_id) {

		$news = $this->db->get_where("news", ['news_id' => $news_id])->row();
		$this->db->trans_begin();
		$this->db->delete("news", ['news_id' => $news_id]);
		$this->db->delete("seo_url", ['s_type' => 'news', 's_target' => $news_id]);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->error = $this->db->error();
			return false;
		} else {
			$this->db->trans_commit();
			unlink(FCPATH . $news->news_image);
			return true;
		}
	}

}

/* End of file Carousel.php */
/* Location: .//D/xampp/htdocs/egegen/admin/models/Carousel.php */