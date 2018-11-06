<?php
	class Categories extends CI_Controller {

		function __construct() {
	        parent::__construct(); 
	        $this->load->helper('meta_helper');  
	    }

		public function test($id='') { 
			$data['title'] = $this->category_model->get_category($id)->name;
			$data['posts'] = $this->post_model->get_posts_by_category($id);

			echo var_dump($data);
		}
		
		public function index() {
			if(!$this->session->userdata('logged_in')){
			redirect('');
			}
			
			$dat = meta_data();
			$data['title'] = 'Categories';
			$data['categories'] = $this->category_model->get_categories();
			$data['page'] = "windsgatedev/categories/index";
			$data['meta_contents'] = array("pageTitle" => $dat['title_admin'], "meta_description" => $dat['meta_default']);
			
			$this->load->view('windsgatedev/templates/template', $data);
		}

		public function create() {
			$data['title'] = 'Create Catergory';
			$dat = meta_data();

			// Check if login
			if(!$this->session->userdata('logged_in'))
				redirect('users/login');

			$this->form_validation->set_rules('name','Name','required');
			
			if($this->form_validation->run() === FALSE) {
				redirect('categories');
			} else {
				if(!$this->category_model->checkCategory($this->input->post('name'))){
					$this->category_model->create_category();
					$this->session->set_flashdata(array('mssg'=>'Your category has been created', 'type' => 'success'));
				} else 
					$this->session->set_flashdata(array('mssg'=>'Category already exists!', 'type' => 'danger'));
					
				redirect('categories');
			}
		}

		function posts($id) {
			$data['title'] = $this->category_model->get_category($id)->name;
			$data['posts'] = $this->post_model->get_posts_by_category($id);
			$data['meta_description'] = "";

			$this->load->view('windsgatedev/templates/header',$data);
			$this->load->view('windsgatedev/posts/index',$data);
			$this->load->view('windsgatedev/templates/footer');
		}

		public function delete($id) {
			if(!$this->session->userdata('logged_in'))
				redirect('users/login');
			
			$this->category_model->delete_category($id);
			$this->session->set_flashdata(array('mssg'=>'Your category has been deleted', 'type' => 'danger'));
			redirect('categories'); 
		}
	}