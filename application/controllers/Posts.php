<?php

class Posts extends CI_Controller 
{
	public function index()
	{	
		$data['title'] = "Latest Posts";

		$data['posts'] = $this->post_model->get_posts();

		$this->load->view('templates/header');
		$this->load->view('posts/index',$data);
		$this->load->view('templates/footer');
	}

    public function view($slug = NULL) {
        $data['posts'] = $this->post_model->get_posts($slug);

        if(empty($data['posts'])) {
            show_404();
        }

        $data['title'] =  $data['posts']['title'];

        $this->load->view('templates/header');
        $this->load->view('posts/view',$data);
        $this->load->view('templates/footer');
	}
	
	public function create() {
		$data['title'] = 'Create Post';
		$data['cetogories'] = $this->post_model->get_categories();

		$this->form_validation
			->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[50]');
		// $this->form_validation
		// 	->set_rules('slug', 'Slug', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation
			->set_rules('body', 'Body', 'trim|required|min_length[5]');
		
		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('posts/create',$data);
			$this->load->view('templates/footer');
		} else {
			
			$config['upload_path'] = './assets/images/posts';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
				$post_img = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_img = $_FILES['userfile']['name'];
			}
			$this->post_model->set_post($post_img);
			redirect('posts');
		}
		
	}

	public function delete($id) {
		$this->post_model->delete_post($id);
		redirect('/posts');
	}

	public function edit($slug) {
		$data['posts'] = $this->post_model->get_posts($slug);
		$data['cetogories'] = $this->post_model->get_categories();
		
		if(empty($data['posts'])) {
			show_404();
		}

		$data['title'] =  "Edit Post";

		$this->load->view('templates/header');
		$this->load->view('posts/edit',$data);
		$this->load->view('templates/footer');
	}

	public function update() {
		$this->post_model->update_post();
		redirect('/posts');
	}
}
