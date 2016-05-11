<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frontend extends CI_Controller {
	function __construct() {
        parent::__construct();
        //$this->load->model('m_frontend');
    }

    function index(){
    	$data['base'] = 'Home';

    	$data['mainpage'] = 'frontend/home';
    	$this->load->view('frontend/templates', $data);
    }

    function blog(){
        $data['base'] = 'Blog';

        $data['mainpage'] = 'frontend/blog';
        $this->load->view('frontend/templates', $data);
    }

    function safetyswim(){
        $data['base'] = 'Safetyswim';

        $data['mainpage'] = 'frontend/safetyswim';
        $this->load->view('frontend/templates', $data);
    }
}