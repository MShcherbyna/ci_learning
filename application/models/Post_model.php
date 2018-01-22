<?php 
class Post_model extends CI_Model 
{
	public function __construct() {
		$this->load->database();
	}

	public function get_posts($slug = FALSE) {
		if($slug === FALSE) {
			$this->db->order_by('id','DESC');
			$query = $this->db->get('posts'); // posts - table name;
			return $query->result_array();
		}

		$query = $this->db->get_where('posts',array('slug' => $slug));
		return $query->row_array();
	}

	public function set_post() {
		$slug = lcfirst(url_title($this->input->post('title')));

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'body' => $this->input->post('body')
		);

		return $this->db->insert('posts',$data);
	}

	public function delete_post($id) {
		$this->db->where('id',$id);
		$this->db->delete('posts');
		return true;
	}
}
