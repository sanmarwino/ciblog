<?php
	class Posts extends CI_Controller{

		public function __construct() {
	        parent::__construct(); 
	        $this->load->helper('meta_helper');  
		}
		
		public function test () {
			$id = "269";
			$result = $this->post_model->check_if_deleted($id);
			echo var_dump($result);

		}

		public function index($offset = 0) {
			if(!$this->session->userdata('logged_in')){
			redirect('');
			}

			$dat = meta_data();
			$config['total_rows'] = $this->post_model->count('published');
			$config['base_url'] = base_url() . 'posts/index/';
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' =>'pagination-link');
	
			$this->pagination->initialize($config);

			$data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset );
			$data['page'] = "windsgatedev/posts/index";
			$data['title'] = $this->post_model->count('published') != 0 ? "Latest Posts" : "No Published Posts";
			$data['meta_contents'] = array("pageTitle" => $dat['title_posts'], "meta_description" => $dat['meta_default']);

			$this->load->view('windsgatedev/templates/template', $data);
		}

		public function view($id = NULL) {
			$data = meta_data();
			$data['post'] = $this->post_model->get_posts($id);
			$meta_title = $data['post']['meta_title'];
			$meta_description = $data['post']['meta_description'];
			$post_id = $data['post']['id'];
			$data['comments'] = $this->comment_model->get_comments($post_id);

			if(empty($data['post'])) {
				show_404();
			}

			$isdeleted = $this->post_model->check_if_deleted($id); //check if post was deleted
			if ($isdeleted == 1){
				$data['page'] = "windsgatedev/posts/view_del";
			} else {
				$data['page'] = "windsgatedev/posts/view";
			}
			

			$data['title'] = $data['post']['title'];
			$data['meta_contents'] = array("pageTitle" => $meta_title, "meta_description" => $meta_description);

			$this->load->view('windsgatedev/templates/template', $data);
		}
	
		public function create() {
			if(!$this->session->userdata('logged_in')){
				redirect('');
			}
			
			$dat = meta_data();

			$data['title'] = 'Create Post';

			// save input data whenever input validation runs
			$data['title1'] = $this->input->post('title');
			$data['meta_description1'] = $this->input->post('meta_description');
			$data['body'] = $this->input->post('body');
			$data['author'] = $this->input->post('author');

			$data['categories'] = $this->post_model->get_categories();

			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('body','Body','required');
			$this->form_validation->set_rules('meta_description','Meta Description','required');
			$this->form_validation->set_rules('author','Author','required');

			if($this->form_validation->run() === FALSE) {
				$data['page'] = "windsgatedev/posts/create";
				$data['meta_contents'] = array("pageTitle" => $dat['title_view_posts'], "meta_description" => $dat['meta_default']);
				$this->load->view('windsgatedev/templates/template', $data);

			} else{
				//upload Image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '10048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()) {
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
					$this->session->set_flashdata(array('mssg'=>'Please provide post image', 'type' => 'danger'));
					
					$data['page'] = "windsgatedev/posts/create";
					$data['meta_contents'] = array("pageTitle" => $dat['title_view_posts'], "meta_description" => $dat['meta_default']);
					$this->load->view('windsgatedev/templates/template', $data);
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];

					$this->post_model->create_post($post_image);
					$this->session->set_flashdata(array('mssg'=>'Your post has been created', 'type' => 'success'));
					$redirect = $this->input->post('post_status') == 'published' ? 'posts' : 'blog/drafts';
					redirect($redirect);
				}
				
			}
		}

		public function delete($id, $post_status) {
			// Check if login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->post_model->delete_post($id);

			//Set message
			$this->session->set_flashdata(array('mssg'=>'Your post has been deleted', 'type' => 'danger'));
			$redirect = $post_status == 'published' ? 'posts' : 'blog/drafts';
			redirect($redirect);
		}

		public function delete_post_in_db ($id) {
			$this->post_model->delete_post_in_db($id);
			redirect('blog/deleted');
		}

	  	function edit($id) {
	  		$dat = meta_data();

			// Check if login
			if(!$this->session->userdata('logged_in'))
				redirect('users/login');

			$data['post'] = $this->post_model->get_posts($id);
			$data['disabled'] = false;

			// // Check user
			// if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id'])
			// 	$data['disabled'] = true;

			$data['categories'] = $this->post_model->get_categories();

			if(empty($data['post']))
				show_404(); 

			$data['title'] = 'Edit Post';
			$data['page'] = "windsgatedev/posts/edit";
			$data['meta_contents'] = array("pageTitle" => $dat['title_edit_posts'], "meta_description" => $dat['meta_default']);

			$this->load->view('windsgatedev/templates/template', $data);
		}

		function update() {
			// Check if login
			if(!$this->session->userdata('logged_in'))
				redirect('users/login');
                
                //////////Upload image/////////////////
                $config['upload_path'] = './assets/images/posts';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload()) { // upload a default image when error occur during upload
                    $error = array('error' => $this->upload->display_errors());
                    $post_image = 'noimage.jpeg';
                } else {
                    $data = array ('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name']; // to be saved in database
                }
                //////////Upload image/////////////////

			$this->post_model->update_post($post_image);

			//Set message
			$this->session->set_flashdata(array('mssg'=>'Your post has been updated', 'type' => 'success'));
			$redirect = $this->input->post('post_status') == 'published' ? 'posts' : 'blog/drafts';
			redirect($redirect);
		}

		function restore ($id) {
			// Check if login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->post_model->restore($id);

			//Set message
			$this->session->set_flashdata(array('mssg'=>'Your post has been restored', 'type' => 'success'));

			$post_status = $this->post_model->check_post_status($id);
			$redirect = $post_status == 'published' ? 'posts' : 'blog/drafts';
			redirect($redirect);
		}

	}