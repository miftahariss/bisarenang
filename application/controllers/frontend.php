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
        $data['program_headline'] = $this->m_frontend->getProgram('', 1);
        
        $headline_id = '';
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

        $this->breadcrumbs->push('Home', '/');
        $this->breadcrumbs->push('Safety To Swim', '/safetyswim');

        $data['content_safety'] = $this->m_frontend->getSafety();
        //var_dump($data['content_safety']);exit;

        $data['mainpage'] = 'frontend/safetyswim';
        $this->load->view('frontend/templates', $data);
    }

    function program(){
        $data['base'] = 'Program';

        $this->breadcrumbs->push('Home', '/');
        $this->breadcrumbs->push('Program', '/program');

        $data['content_program'] = $this->m_frontend->getProgram('', '');
        //var_dump($data['content_program']);exit;

        $data['mainpage'] = 'frontend/program';
        $this->load->view('frontend/templates', $data);
    }

    function programdetail(){
        $data['base'] = 'Program';

        $title = $this->uri->segment(3);

        $data['content_detail'] = $this->m_frontend->getDetailProgramLevel($title);
        if(count($data['content_detail']) < 1 || $title == FALSE){
            redirect('pagenotfound');
        }
        $data['program_title'] = $this->m_frontend->getProgram($data['content_detail'][0]->id_program,
            '');

        $this->breadcrumbs->push('Home', '/');
        $this->breadcrumbs->push('Program', '/program');
        $this->breadcrumbs->push($data['content_detail'][0]->title, $data['content_detail'][0]->permalink);

        $data['mainpage'] = 'frontend/programdetail';
        $this->load->view('frontend/templates', $data);

    }

    function contact(){
        $data['base'] = 'Contact';

        $this->breadcrumbs->push('Home', '/');
        $this->breadcrumbs->push('Contact', '/contact');

        require_once APPPATH."/third_party/recaptchalib.php";

        $data['siteKey'] = "6LefQSETAAAAAF8zYXNeFwEV7bVQWg1v6-NCzbO_";
        $secret = "6LefQSETAAAAAD1NlnboPgbhT6W3Kg8enggbfGcZ";
        // reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
        $data['lang'] = "en";
        // The response from reCAPTCHA
        $resp = null;
        // The error code from reCAPTCHA, if any
        $error = null;
        $reCaptcha = new ReCaptcha($secret);
        // Was there a reCAPTCHA response?
        if ($this->input->post('g-recaptcha-response')) {
            $resp = $reCaptcha->verifyResponse(
                    $_SERVER["REMOTE_ADDR"], $this->input->post('g-recaptcha-response')
            );
        }

        if ($this->input->post('submit')) {
            //validation
            $valid = $this->form_validation;
            $valid->set_rules('name', 'name', 'required');
            $valid->set_rules('email', 'Email', 'strtolower|required|valid_email');
            $valid->set_rules('message', 'Message', 'required|min_length[3]');

            if ($valid->run() == false) {
                
            } else {
                if ($resp != null && $resp->success) {
                    // $config = array(
                    //     'protocol' => 'smtp',
                    //     'smtp_host' => 'smtp.mailgun.org',
                    //     'smtp_port' => 587,
                    //     'smtp_user' => 'postmaster@gramediamajalah.com',
                    //     'smtp_pass' => '7df21f61bff564ffd1eef1ca8f991ff7',
                    //     'mailtype' => 'text',
                    //     'charset' => 'utf-8',
                    //     'wordwrap' => true
                    // );

                    $config = array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.gmail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'miftahariss15@gmail.com',
                        'smtp_pass' => 'apaajaboleh0804',
                        'mailtype' => 'text',
                        'charset' => 'utf-8',
                        'wordwrap' => true
                    );

                    $this->load->library('email');

                    $this->email->initialize($config);

                    $this->email->set_newline("\r\n");
                    $this->email->from($this->input->post('email'), $this->input->post('name'));
                    $this->email->to('info@bisarenang.com');
                    $this->email->cc('bisarenang.id@gmail.com');
                    $this->email->subject($this->input->post('name'));

                    $isi = "Name: ".$this->input->post('name')."\n"."Email: ".$this->input->post('email')."\n"."\n\n"."Message: \n".$this->input->post('message');
                    $this->email->message($isi);
                    if ($this->email->send()) {
                        $this->session->set_flashdata('success', 'Email Sent');
                        redirect(current_url());
                    } else {
                        show_error($this->email->print_debugger());
                    }
                } else {
                    echo "<script>alert('Wrong captcha, please try again.');</script>";
                }
            }
        }

        $data['mainpage'] = 'frontend/contact';
        $this->load->view('frontend/templates', $data);
    }

    function about(){
        $data['base'] = 'About';

        $this->breadcrumbs->push('Home', '/');
        $this->breadcrumbs->push('About', '/about');

        $data['content_about'] = $this->m_frontend->getAbout();

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