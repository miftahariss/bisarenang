<?php

/**
 * Created by PhpStorm.
 * User: digitalmedia
 * Date: 12/24/14
 * Time: 2:18 PM
 */
class Cmsauth extends CI_Controller {

    public function index() {
        $this->load->view('acladmin/login');
    }

    public function check() {
        $this->load->model('acladminmodel');
        $user = $this->input->post('email');
        $pass = sha1(md5($this->input->post('password')));

        $login = $this->acladminmodel->checkLogin($user, $pass);

        $row = $login->row();
        if ($login->num_rows() == 1) {
            $session = array('user_id' => $row->id, 'name' => $row->name,
                             'login' => true, 'role' => $row->role);
            $this->session->set_userdata($session);

            //kcfinder
            session_start();
            $_SESSION['ses_kcfinder']=array();
            $_SESSION['ses_kcfinder']['disabled'] = false;
            // $_SESSION['ses_kcfinder']['uploadURL'] = URL_EDITOR;
            @$_SESSION['ses_kcfinder']['uploadURL'] = URL_EDITOR;
            @$_SESSION['ses_kcfinder']['uploadDir'] = DIR_EDITOR;

            redirect('backend/acladmin');
        }
        $this->session->set_flashdata('error', 'User dan Password Salah');
        redirect('backend/cmsauth');
    }

    function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('login');
        $this->session->sess_destroy();

        //kcfinder session
        session_start();
        unset($_SESSION['ses_kcfinder']);

        redirect('backend/cmsauth');
    }
}