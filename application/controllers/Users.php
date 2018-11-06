<?php
	class Users extends CI_Controller{

		function __construct() {
	        parent::__construct(); 
	        $this->load->helper('meta_helper');  
	    }
		
	    public function index(){
	    	if(!$this->session->userdata('logged_in')){
			redirect('');
			}
			
			$dat = meta_data();
			$data['title'] = 'Change Password';
			$data['categories'] = $this->category_model->get_categories();
			$data['page'] = "windsgatedev/users/password";
			$data['meta_contents'] = array("pageTitle" => $dat['title_admin'], "meta_description" => $dat['meta_default']);
			
			$this->load->view('windsgatedev/templates/template', $data);


	    }
		public function register() {
			// if(!$this->session->userdata('logged_in')){
			// redirect('');
			// }
			$data['title'] = "Sign Up";

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('username','Userame','required|callback_check_username_exists');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('password2','Confirm Password','matches[password]');

			if($this->form_validation->run() === FALSE) {
				$this->load->view('windsgatedev/templates/header');
				$this->load->view('windsgatedev/users/register',$data);
				$this->load->view('windsgatedev/templates/footer');
			} else {
				//Encrypt password
				$enc_password = md5($this->input->post('password'));
				$this->user_model->register($enc_password);

				// Set message 
				$this->session->set_flashdata(array('mssg'=>'You are now registered and can log in', 'type' => 'success'));

				redirect('posts');
			}
		}
			// Log in user
		public function login() {
			$dat = meta_data();
	
			$this->form_validation->set_rules('username','Userame','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run() === FALSE) {
				$data['page'] = "windsgatedev/users/login";
				$data['meta_contents'] = array("pageTitle" => $dat['title_admin'], "meta_description" => $dat['meta_default']);
				$this->load->view('windsgatedev/templates/template', $data);
			} else {
				// Get username
				$username = $this->input->post('username');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));
				// Login user
				$user_id= $this->user_model->login($username, $password);

				if($user_id) {
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					$config['total_rows'] = $this->post_model->count('published');
					$config['base_url'] = base_url() . 'posts/index/';
					$config['per_page'] = 3;
					$config['uri_segment'] = 3;
					$config['attributes'] = array('class' =>'pagination-link');
					// Init Pagination
					$this->pagination->initialize($config);
					
					$data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], 0 );
					$data['title'] = $this->post_model->count('published') ? "Latest Posts" : "No Published Posts";
					$data['page'] = "windsgatedev/posts/index";
					$data['meta_contents'] = array("pageTitle" => $dat['title_admin'], "meta_description" => $dat['meta_default']);
					$this->session->set_flashdata(array('mssg'=>'You are now logged in', 'type' => 'success'));
					$this->load->view('windsgatedev/templates/template', $data);
		
				} else {
					// Set message 
					$this->session->set_flashdata(array('mssg'=>'Login is invalid', 'type' => 'danger'));

					redirect('users/login');
				}
			}
		}

		// Log user out
		public function logout() {
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			// Set message 
			$this->session->set_flashdata(array('mssg'=>'You are now logged out', 'type' => 'success'));

			redirect('users/login');
		}

		// Check if unsername exists
		public function check_username_exists($username) {
			$this->form_validation->set_message(array('mssg'=>'That username is taken. Please choose a different one', 'type' => 'danger'));

			if($this->user_model->check_username_exists($username)) {
				return true;
			} else {
				return false;
			}
		}

		// update pass 
		public function update_pw() {
			$data['title'] = 'Change Password';

            //set validation rules
            $this->form_validation->set_rules('cur_password','Current Password','required|callback_check_cur_pw_correct');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('password2','Password2','matches[password]');
            
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('windsgatedev/templates/header');
				$this->load->view('windsgatedev/users/password',$data);
				$this->load->view('windsgatedev/templates/footer');
            } else { 

                $enc_cur_password = $this->input->post('cur_password'); 
                $this->load->model('user_model');
				$this->user_model->update_pw($enc_cur_password); 
				
				redirect('users/update_pw')   ; // go to the published page
			}	
		}

		// check_cur_pw_correct
		public function check_cur_pw_correct($cur_pw) {
			$this->form_validation->set_message('mssg','Current password is incorrect. Please type correct password');

			$enc_cur_pw = md5($cur_pw);

            $this->load->model('user_model');
            if ($this->user_model->check_cur_pw_correct($enc_cur_pw)) {

				$this->session->set_flashdata(array('mssg'=>'Your password has been changed', 'type' => 'success'));

                return true;
            } else {
                return false;
            }

		}

	}