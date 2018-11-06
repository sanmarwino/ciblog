<?php
	class Pages extends CI_Controller {
		public function view($page = 'home') { //default 
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))
				show_404(); //check if view this page

			$data['title'] = ucfirst($page); //data array pass in the view

			$this->load->view('templates/header'); //load the views
			$this->load->view('pages/'.$page, $data); 
			$this->load->view('templates/footer');
		}
	}