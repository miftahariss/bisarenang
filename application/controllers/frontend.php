<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frontend extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('m_frontend');
        $this->load->library('breadcrumb');
    }

    function index(){
    	$data['base'] = 'Home';

        $data['content_headline'] = $this->m_frontend->headline(3);
        
        foreach($data['content_headline'] as $i){
            $headline_id[] = $i->id;
        }

        $data['content_blog'] = $this->m_frontend->getBlog(0, 4, $headline_id);

        //var_dump($data['content_blog']);exit;

    	$data['mainpage'] = 'frontend/home';
    	$this->load->view('frontend/templates', $data);
    }

    function blog(){
        $data['base'] = 'Blog';

        $data['mainpage'] = 'frontend/blog';
        $this->load->view('frontend/templates', $data);
    }

    function blogdetail(){
        $data['base'] = 'Blog';

        $title = $this->uri->segment(2);

        $data['content_detail'] = $this->m_frontend->getDetailBlog($title);

        if ($data['content_detail'] == FALSE) {
            redirect(show_404());
        }

        $data['mainpage'] = 'frontend/blogdetail';
        $this->load->view('frontend/templates', $data);
    }

    function safetyswim(){
        $data['base'] = 'Safetyswim';

        $data['mainpage'] = 'frontend/safetyswim';
        $this->load->view('frontend/templates', $data);
    }

    function program(){
        $data['base'] = 'Program';

        $data['mainpage'] = 'frontend/program';
        $this->load->view('frontend/templates', $data);
    }

    function basicswim(){
        $data['base'] = 'Program';

        $data['mainpage'] = 'frontend/basicswim';
        $this->load->view('frontend/templates', $data);
    }

    function swimmingfit(){
        $data['base'] = 'Program';

        $data['mainpage'] = 'frontend/swimmingfit';
        $this->load->view('frontend/templates', $data);
    }

    function contact(){
        $data['base'] = 'Contact';

        $data['mainpage'] = 'frontend/contact';
        $this->load->view('frontend/templates', $data);
    }

    function about(){
        $data['base'] = 'About';

        $data['mainpage'] = 'frontend/about';
        $this->load->view('frontend/templates', $data);
    }
}