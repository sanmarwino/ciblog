<?php

class Blog extends CI_Controller {
    
    function __constructor() {
        parent::__constructor();
        $this->load->helper('meta_helper');
    }
    
    function test ($slugname='') {
        // for testing
    }

    function index($slugname='') {

        $this->load->model('blogs_model');

        $data_slug_id = array ('slug_name_id'=> $slugname);
        $slug_id = ($data_slug_id['slug_name_id']);
        $slug_id = (explode("_",$slug_id));
        $slug = $slug_id[0];
        $id = $slug_id[1];
        $posts = $this->blogs_model->get_post($slug,$id); 
        $data['posts'] = $posts[0];
        $meta_title = $data['posts']['meta_title'];
        $meta_description = $data['posts']['meta_description'];
        $data['page'] = "windsgatedev/blog/blog_v";
        $data['meta_contents'] = array("pageTitle" => $meta_title, "meta_description" => $meta_description);

        $this->load->view('windsgatedev/templates/template', $data); 
    }

    public function drafts($offset = 0) {
        if(!$this->session->userdata('logged_in')){
            redirect('');
            }
        $config['total_rows'] = $this->blogs_model->count('draft');
        $config['base_url'] = base_url() . 'blog/drafts/';
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' =>'pagination-link');
        
        $this->pagination->initialize($config);

        $data['blogs'] = $this->blogs_model->get_drafts(FALSE, $config['per_page'], $offset);
        $data['title'] = $this->blogs_model->count('draft') != 0 ? "Latest Drafts" : "No Drafts";
        $data['page'] = "windsgatedev/blog/drafts";
        $data['meta_contents'] = array("pageTitle" => 'Drafts', "meta_description" => '$meta_description');

        $this->load->view('windsgatedev/templates/template', $data);
    }

    function deleted ($offset = 0) {
        if(!$this->session->userdata('logged_in')){
            redirect('');
            }
        $config['total_rows'] = $this->blogs_model->count_del();
        $config['base_url'] = base_url() . 'blog/deleted/';
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' =>'pagination-link');
        
        $this->pagination->initialize($config);

        $data['blogs'] = $this->blogs_model->get_deleted(FALSE, $config['per_page'], $offset);
        $data['title'] = $this->blogs_model->count_del() != 0 ? "Trash" : "Empty Trash";
        $data['page'] = "windsgatedev/blog/deleted";// view
        $data['meta_contents'] = array("pageTitle" => 'Deleted', "meta_description" => '$meta_description');

        $this->load->view('windsgatedev/templates/template', $data);
    }
}