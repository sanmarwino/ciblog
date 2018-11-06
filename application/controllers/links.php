<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Links extends CI_Controller {

	function __construct() {
        parent::__construct(); 
        $this->load->helper('meta_helper');  
    }

	public function index() {
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data = meta_data();  

		switch ($record_num) {
			case "about-us":
				$data['page'] = "windsgatedev/about";
				$data['meta_contents'] = array("pageTitle" => $data['title_about'], "meta_description" => $data['meta_about']);
				$this->load->view('windsgatedev/templates/template', $data);
				break;
			case "career":
				$data['page'] = "windsgatedev/career";
				$data['meta_contents'] = array("pageTitle" => $data['title_career'], "meta_description" => $data['meta_career']);
				$this->load->view('windsgatedev/templates/template', $data);
				break;
			case "contact":
				$data['page'] = "windsgatedev/contact";
				$data['meta_contents'] = array("pageTitle" => $data['title_contact'], "meta_description" => $data['meta_contact']);
				$this->load->view('windsgatedev/templates/template', $data);
				break;
			case "biomentrics":
				$data['page'] = "windsgatedev/services/biometrics";
				$data['meta_contents'] = array("pageTitle" => $data['title_biometrics'], "meta_description" => $data['meta_biometrics']);
				$this->load->view('windsgatedev/templates/template', $data);
				break;
			case "software-development":
				$data['page'] = "windsgatedev/services/software-development";
				$data['meta_contents'] = array("pageTitle" => $data['title_software_development'], "meta_description" => $data['meta_software_development']);
				$this->load->view('windsgatedev/templates/template', $data);
				break;
			case "blog":
				$this->load->model('blogs_model');
        		$data['posts'] = $this->blogs_model->get_posts();
        		$data['title'] = count($data['posts']) != 0 ? "Blog Section" : "No Published Posts";
				$data['page'] = "windsgatedev/blog/index";
				$data['meta_contents'] = array("pageTitle" => $data['title_blog'], "meta_description" => $data['meta_default']);
				$this->load->view('windsgatedev/templates/template', $data);
				break;
			case "admin":
				$data['page'] = "windsgatedev/users/login";
				$data['meta_contents'] = array("pageTitle" => $data['title_admin'], "meta_description" => $data['meta_default']);
				$this->load->view('windsgatedev/templates/template', $data);
				break;
			default:
				$data['page'] = "windsgatedev/index";
				$data['meta_contents'] = array("pageTitle" => $data['title_default'], "meta_description" => $data['meta_default']);
				$this->load->view('windsgatedev/templates/template', $data);
				break;
		}
	}
}
