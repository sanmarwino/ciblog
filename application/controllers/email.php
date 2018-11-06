<?php
    class Email extends CI_Controller {

        function __construct() {
            parent::__construct();   
        }

        function index() {
            $config = array();  
            $config['protocol'] = 'smtp';  
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';  
            $config['smtp_user'] = 'vcodaste@gmail.com';  
            $config['smtp_pass'] = 'viczenDC123.';  
            $config['smtp_port'] = 465;  
            $config['mailtype'] = 'html';

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($_REQUEST['email'], $_REQUEST['name']);
            $this->email->to('viczenc@windsgate.com'); 
            $this->email->subject('Email Test');
            $this->email->message($_REQUEST['comments']);  
            $this->email->send();
            echo $this->email->print_debugger();
            $this->load->view('windsgatedev/contact');
        }
    }