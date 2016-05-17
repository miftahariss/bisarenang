 <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frontend extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('m_frontend');
        $this->load->library('breadcrumbs');
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

        $this->breadcrumbs->push('Home', '/');
        $this->breadcrumbs->push('Blog', '/blog');

        // unshift crumb
        //$this->breadcrumbs->unshift('Home', '/');

        $limit = 6;

        $this->db->where_in('status', array('1'));
        $this->db->order_by("created_date", "desc");
        $this->db->limit($limit, $this->uri->segment(2));
        $blog_query = $this->db->get('blog');
        $data['blog'] = $blog_query->result_array();

        $this->db->where_in('status', array('1'));
        $query_total = $this->db->get('blog');
        $data['total'] = $query_total->num_rows();

        $this->load->library('pagination');
        $config['base_url'] = site_url('blog');
        $config['total_rows'] = $data['total'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 2;
        $config['num_links'] = 2;
        $config['prev_link'] = '<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="material-icons">chevron_right</i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_link'] = '';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        $config['first_link'] = '';
        $config['first_tag_open'] = '';
        $config['first_tag_close'] = '';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $this->pagination->initialize($config);
        $data['page_links'] = $this->pagination->create_links();

        $data['mainpage'] = 'frontend/blog';
        $this->load->view('frontend/templates', $data);
    }

    function blogdetail(){
        $data['base'] = 'Blog';

        $title = $this->uri->segment(2);

        $data['content_detail'] = $this->m_frontend->getDetailBlog($title);
        $content_detail = $data['content_detail'];

        if ($content_detail == FALSE) {
            redirect('pagenotfound');
        }

        $this->breadcrumbs->push('Home', '/');
        $this->breadcrumbs->push('Blog', '/blog');
        $this->breadcrumbs->push($content_detail[0]->title, $content_detail[0]->permalink);

        $this->updateCount($content_detail[0]->id);

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

    function pagenotfound(){
        $this->output->set_status_header('404'); // setting header to 404
        $this->load->view('frontend/pagenotfound');//loading view
    }

    function updateCount($id) {
        $query = $this->m_frontend->get_count($id);

        if (count($query) > 0) {
            $counter = array(
                'counter_count' => $query[0]['counter_count'] + 1,
                'counter_count_date' => date('Y-m-d H:i:s')
            );

            $this->m_frontend->count_view($counter, $id);
        } else {
            $counter = array(
                'counter_blog_id' => $id,
                'counter_count' => 1,
                'counter_count_date' => date('Y-m-d H:i:s')
            );

            $this->m_frontend->save_count_view($counter);
        }
    }
}