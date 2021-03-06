<?php

/**
 * Description of acladmin
 *
 * @author digit002
 */
class Acladmin extends CI_Controller {

    private $limit = 10;

    public function __construct() {
        parent::__construct();
        $this->load->model('acladminmodel');
        //$this->load->helper('video');

        if (!$this->session->userdata('login')) {
            redirect('admin/cmsauth');
        }
        $this->sess_id = $this->session->userdata('user_id');

        // Login
//        if (!isset($_SERVER['PHP_AUTH_USER'])) {
//            header('WWW-Authenticate: Basic realm="Basic Authentication" ');
//            header('HTTP/1.0 401 Unautorized');
//            exit();
//        } else {
//            if ($_SERVER['PHP_AUTH_USER'] != 'digit' || $_SERVER['PHP_AUTH_PW'] != 'digit002') {
//                header('WWW-Authenticate: Basic realm="Basic Authentication" ');
//            }
//        }
    }

    public function get_youtube_id_from_url($url)
    {
        if (stristr($url,'youtu.be/'))
            {preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4]; }
        else 
            {@preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD); return $IDD[5]; }
    }

    private function onlyAdmin() {
        if ($this->session->userdata('role') != 1) {
            redirect('admin/acladmin');
        }
    }

    public function index() {
        $data['page'] = 'home';
        $data['title'] = 'Home';
        $this->load->view('acladmin/main', $data);
    }

    private function upload_gallery() {
        $this->load->library('image_lib');
        $format_upload = '';
        $files = $_FILES;
        $cpt = count($_FILES['galleryfile']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $rename = url_title(time()) . $i;

            $_FILES['galleryfile']['name'] = $files['galleryfile']['name'][$i];
            $_FILES['galleryfile']['type'] = $files['galleryfile']['type'][$i];
            $_FILES['galleryfile']['tmp_name'] = $files['galleryfile']['tmp_name'][$i];
            $_FILES['galleryfile']['error'] = $files['galleryfile']['error'][$i];
            $_FILES['galleryfile']['size'] = $files['galleryfile']['size'][$i];

            if (isset($_FILES['galleryfile']['name']) && $_FILES['galleryfile']['name'] != "") {

                $base_path = APPPATH . '../asset_admin/assets/uploads/cover/';
                chmod($base_path, 0777);
                $ori_path = $base_path . 'original/';

                $size = array(
                    array('width' => '150', 'height' => '150', 'type' => 'small'),
                    array('width' => '300', 'height' => '300', 'type' => 'medium'),
                    array('width' => '650', 'height' => '650', 'type' => 'large'),
                );

                //UPLOAD ORG IMAGE
                $config = array(
                    'upload_path' => $ori_path,
                    'allowed_types' => 'gif|jpg|jpeg|png',
                    'max_size' => '2048'
                );
                $this->load->library('upload', $config);
                $this->upload->do_upload('galleryfile');

                foreach ($size as $value) {

                    $image_data = $this->upload->data();

                    //RESIZE IMAGE
                    $config_thumb = array(
                        'image_library' => 'gd2',
                        'source_image' => $image_data['full_path'],
                        'new_image' => $base_path . $value["type"],
                        'create_thumb' => false,
                        'maintain_ratio' => true,
                        'width' => $value['width'],
                        'height' => $value['width']
                    );

                    $this->image_lib->initialize($config_thumb);
                    if (!$this->image_lib->resize()) {
                        echo $this->image_lib->display_errors();
                    }

                    //CROPING
                    switch ($value['type']) {
                        case 'small':
                            $meta_image['small'] = $base_path . 'small' . '/' . $rename . $image_data['file_ext'];
                            break;
                        case 'medium':
                            $meta_image['medium'] = $base_path . 'medium' . '/' . $rename . $image_data['file_ext'];
                            break;
                        case 'large':
                            $meta_image['large'] = $base_path . 'large' . '/' . $rename . $image_data['file_ext'];
                            break;
                    }

                    $config_crop = array(
                        'image_library' => 'gd2',
                        'source_image' => $base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext'],
                        'new_image' => $base_path . $value["type"] . '/' . $rename . $image_data['file_ext'],
                        'create_thumb' => false,
                        'maintain_ratio' => true,
                    );

                    $this->image_lib->initialize($config_crop);
                    if (!$this->image_lib->crop()) {
                        echo $this->image_lib->display_errors();
                    }

                    //DELETE RESIZE IMAGE
                    unlink($base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext']);
                    $this->image_lib->clear();
                }

                rename($image_data['full_path'], $ori_path . $rename . $image_data['file_ext']);
                $format_upload[] = $rename . $image_data['file_ext'];
            }
        }

        return $format_upload;
    }

    /**
     * Upload images
     * @return string
     */
    private function upload() {
        $this->load->library('image_lib');
        $format_upload = '';
        $rename = url_title(time());
        if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != "") {

            $base_path = APPPATH . '../asset_admin/assets/uploads/cover/';
            chmod($base_path, 0777);
            $ori_path = $base_path . 'original/';

            $size = array(
                array('width' => '150', 'height' => '150', 'type' => 'small'),
                array('width' => '300', 'height' => '300', 'type' => 'medium'),
                array('width' => '650', 'height' => '650', 'type' => 'large'),
            );

            //UPLOAD ORG IMAGE
            $config = array(
                'upload_path' => $ori_path,
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '2048'
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload();

            foreach ($size as $value) {

                $image_data = $this->upload->data();

                //RESIZE IMAGE
                $config_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => $image_data['full_path'],
                    'new_image' => $base_path . $value["type"],
                    'create_thumb' => false,
                    'maintain_ratio' => true,
                    'width' => $value['width'],
                    'height' => $value['width']
                );

                $this->image_lib->initialize($config_thumb);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }

                //CROPING
                switch ($value['type']) {
                    case 'small':
                        $meta_image['small'] = $base_path . 'small' . '/' . $rename . $image_data['file_ext'];
                        break;
                    case 'medium':
                        $meta_image['medium'] = $base_path . 'medium' . '/' . $rename . $image_data['file_ext'];
                        break;
                    case 'large':
                        $meta_image['large'] = $base_path . 'large' . '/' . $rename . $image_data['file_ext'];
                        break;
                }

                $config_crop = array(
                    'image_library' => 'gd2',
                    'source_image' => $base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext'],
                    'new_image' => $base_path . $value["type"] . '/' . $rename . $image_data['file_ext'],
                    'create_thumb' => false,
                    'maintain_ratio' => true,
                );

                $this->image_lib->initialize($config_crop);
                if (!$this->image_lib->crop()) {
                    echo $this->image_lib->display_errors();
                }

                //DELETE RESIZE IMAGE
                unlink($base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext']);
                $this->image_lib->clear();
            }

            rename($image_data['full_path'], $ori_path . $rename . $image_data['file_ext']);
            $format_upload = $rename . $image_data['file_ext'];
        }

        return $format_upload;
    }

    private function upload_beginner() {
        $this->load->library('image_lib');
        $format_upload = '';
        $rename = url_title('beginner_'.time());
        if (isset($_FILES['userfile_beginner']['name']) && $_FILES['userfile_beginner']['name'] != "") {

            $base_path = APPPATH . '../asset_admin/assets/uploads/cover/';
            chmod($base_path, 0777);
            $ori_path = $base_path . 'original/';

            $size = array(
                array('width' => '150', 'height' => '150', 'type' => 'small'),
                array('width' => '300', 'height' => '300', 'type' => 'medium'),
                array('width' => '650', 'height' => '650', 'type' => 'large'),
            );

            //UPLOAD ORG IMAGE
            $config = array(
                'upload_path' => $ori_path,
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '2048'
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile_beginner');

            foreach ($size as $value) {

                $image_data = $this->upload->data();

                //RESIZE IMAGE
                $config_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => $image_data['full_path'],
                    'new_image' => $base_path . $value["type"],
                    'create_thumb' => false,
                    'maintain_ratio' => true,
                    'width' => $value['width'],
                    'height' => $value['width']
                );

                $this->image_lib->initialize($config_thumb);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }

                //CROPING
                switch ($value['type']) {
                    case 'small':
                        $meta_image['small'] = $base_path . 'small' . '/' . $rename . $image_data['file_ext'];
                        break;
                    case 'medium':
                        $meta_image['medium'] = $base_path . 'medium' . '/' . $rename . $image_data['file_ext'];
                        break;
                    case 'large':
                        $meta_image['large'] = $base_path . 'large' . '/' . $rename . $image_data['file_ext'];
                        break;
                }

                $config_crop = array(
                    'image_library' => 'gd2',
                    'source_image' => $base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext'],
                    'new_image' => $base_path . $value["type"] . '/' . $rename . $image_data['file_ext'],
                    'create_thumb' => false,
                    'maintain_ratio' => true,
                );

                $this->image_lib->initialize($config_crop);
                if (!$this->image_lib->crop()) {
                    echo $this->image_lib->display_errors();
                }

                //DELETE RESIZE IMAGE
                unlink($base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext']);
                $this->image_lib->clear();
            }

            rename($image_data['full_path'], $ori_path . $rename . $image_data['file_ext']);
            $format_upload = $rename . $image_data['file_ext'];
        }

        return $format_upload;
    }

    private function upload_intermediate() {
        $this->load->library('image_lib');
        $format_upload = '';
        $rename = url_title('intermediate_'.time());
        if (isset($_FILES['userfile_intermediate']['name']) && $_FILES['userfile_intermediate']['name'] != "") {

            $base_path = APPPATH . '../asset_admin/assets/uploads/cover/';
            chmod($base_path, 0777);
            $ori_path = $base_path . 'original/';

            $size = array(
                array('width' => '150', 'height' => '150', 'type' => 'small'),
                array('width' => '300', 'height' => '300', 'type' => 'medium'),
                array('width' => '650', 'height' => '650', 'type' => 'large'),
            );

            //UPLOAD ORG IMAGE
            $config = array(
                'upload_path' => $ori_path,
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '2048'
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile_intermediate');

            foreach ($size as $value) {

                $image_data = $this->upload->data();

                //RESIZE IMAGE
                $config_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => $image_data['full_path'],
                    'new_image' => $base_path . $value["type"],
                    'create_thumb' => false,
                    'maintain_ratio' => true,
                    'width' => $value['width'],
                    'height' => $value['width']
                );

                $this->image_lib->initialize($config_thumb);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }

                //CROPING
                switch ($value['type']) {
                    case 'small':
                        $meta_image['small'] = $base_path . 'small' . '/' . $rename . $image_data['file_ext'];
                        break;
                    case 'medium':
                        $meta_image['medium'] = $base_path . 'medium' . '/' . $rename . $image_data['file_ext'];
                        break;
                    case 'large':
                        $meta_image['large'] = $base_path . 'large' . '/' . $rename . $image_data['file_ext'];
                        break;
                }

                $config_crop = array(
                    'image_library' => 'gd2',
                    'source_image' => $base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext'],
                    'new_image' => $base_path . $value["type"] . '/' . $rename . $image_data['file_ext'],
                    'create_thumb' => false,
                    'maintain_ratio' => true,
                );

                $this->image_lib->initialize($config_crop);
                if (!$this->image_lib->crop()) {
                    echo $this->image_lib->display_errors();
                }

                //DELETE RESIZE IMAGE
                unlink($base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext']);
                $this->image_lib->clear();
            }

            rename($image_data['full_path'], $ori_path . $rename . $image_data['file_ext']);
            $format_upload = $rename . $image_data['file_ext'];
        }

        return $format_upload;
    }

    private function upload_advanced() {
        $this->load->library('image_lib');
        $format_upload = '';
        $rename = url_title('advanced_'.time());
        if (isset($_FILES['userfile_advanced']['name']) && $_FILES['userfile_advanced']['name'] != "") {

            $base_path = APPPATH . '../asset_admin/assets/uploads/cover/';
            chmod($base_path, 0777);
            $ori_path = $base_path . 'original/';

            $size = array(
                array('width' => '150', 'height' => '150', 'type' => 'small'),
                array('width' => '300', 'height' => '300', 'type' => 'medium'),
                array('width' => '650', 'height' => '650', 'type' => 'large'),
            );

            //UPLOAD ORG IMAGE
            $config = array(
                'upload_path' => $ori_path,
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '2048'
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile_advanced');

            foreach ($size as $value) {

                $image_data = $this->upload->data();

                //RESIZE IMAGE
                $config_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => $image_data['full_path'],
                    'new_image' => $base_path . $value["type"],
                    'create_thumb' => false,
                    'maintain_ratio' => true,
                    'width' => $value['width'],
                    'height' => $value['width']
                );

                $this->image_lib->initialize($config_thumb);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }

                //CROPING
                switch ($value['type']) {
                    case 'small':
                        $meta_image['small'] = $base_path . 'small' . '/' . $rename . $image_data['file_ext'];
                        break;
                    case 'medium':
                        $meta_image['medium'] = $base_path . 'medium' . '/' . $rename . $image_data['file_ext'];
                        break;
                    case 'large':
                        $meta_image['large'] = $base_path . 'large' . '/' . $rename . $image_data['file_ext'];
                        break;
                }

                $config_crop = array(
                    'image_library' => 'gd2',
                    'source_image' => $base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext'],
                    'new_image' => $base_path . $value["type"] . '/' . $rename . $image_data['file_ext'],
                    'create_thumb' => false,
                    'maintain_ratio' => true,
                );

                $this->image_lib->initialize($config_crop);
                if (!$this->image_lib->crop()) {
                    echo $this->image_lib->display_errors();
                }

                //DELETE RESIZE IMAGE
                unlink($base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext']);
                $this->image_lib->clear();
            }

            rename($image_data['full_path'], $ori_path . $rename . $image_data['file_ext']);
            $format_upload = $rename . $image_data['file_ext'];
        }

        return $format_upload;
    }

    private function upload_foto() {
        $this->load->library('image_lib');
        $format_upload = '';
        $rename = url_title(time());
        if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != "") {

            $base_path = APPPATH . '../asset_admin/assets/uploads/cover/';
            chmod($base_path, 0777);
            $ori_path = $base_path . 'original/';

            $size = array(
                array('width' => '150', 'height' => '150', 'type' => 'small'),
                array('width' => '300', 'height' => '300', 'type' => 'medium'),
                array('width' => '650', 'height' => '650', 'type' => 'large'),
            );

            //UPLOAD ORG IMAGE
            $config = array(
                'upload_path' => $ori_path,
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size' => '2048'
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload();

            foreach ($size as $value) {

                $image_data = $this->upload->data();

                //RESIZE IMAGE
                $config_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => $image_data['full_path'],
                    'new_image' => $base_path . $value["type"],
                    'create_thumb' => false,
                    'maintain_ratio' => true,
                    'width' => $value['width'],
                    'height' => $value['width']
                );

                $this->image_lib->initialize($config_thumb);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }

                //CROPING
                switch ($value['type']) {
                    case 'small':
                        $meta_image['small'] = $base_path . 'small' . '/' . $rename . $image_data['file_ext'];
                        break;
                    case 'medium':
                        $meta_image['medium'] = $base_path . 'medium' . '/' . $rename . $image_data['file_ext'];
                        break;
                    case 'large':
                        $meta_image['large'] = $base_path . 'large' . '/' . $rename . $image_data['file_ext'];
                        break;
                }

                $config_crop = array(
                    'image_library' => 'gd2',
                    'source_image' => $base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext'],
                    'new_image' => $base_path . $value["type"] . '/' . $rename . $image_data['file_ext'],
                    'create_thumb' => false,
                    'maintain_ratio' => true,
                );

                $this->image_lib->initialize($config_crop);
                if (!$this->image_lib->crop()) {
                    echo $this->image_lib->display_errors();
                }

                //DELETE RESIZE IMAGE
                unlink($base_path . $value["type"] . '/' . $image_data['raw_name'] . $image_data['file_ext']);
                $this->image_lib->clear();
            }

            rename($image_data['full_path'], $ori_path . $rename . $image_data['file_ext']);
            $format_upload = $rename . $image_data['file_ext'];
        }

        return $format_upload;
    }

    public function add_blog() {
        $permalink = url_title($this->input->post('title'), 'dash', true);
        if ($this->input->post('submit')) {
            // validation
            $valid = $this->form_validation;
            $valid->set_rules('title', 'Judul', 'required');
            $valid->set_rules('short_desc', 'Short Desc', 'required');
            $valid->set_rules('body', 'Isi', 'required');
            if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] == "") {
                $valid->set_rules('userfile', 'Foto', 'required');
            }

            if ($valid->run() == false) {
                // run
            } else {

                $format_upload = $this->upload();
                $video_id = $this->get_youtube_id_from_url($this->input->post('video_id'));
                $data = array(
                    'id_account' => 1,
                    'title' => $this->input->post('title'),
                    'short_desc' => $this->input->post('short_desc'),
                    'body' => $this->input->post('body'),
                    'filename' => $format_upload,
                    'video_id' => $video_id,
                    'headline' => $this->input->post('headline') ? 1 : 0,
                    'permalink' => $permalink.'.html',
                    'created_date' => time(),
                    'modified_date' => null,
                    'created_by' => $this->sess_id,
                    'modified_by' => null,
                    'status' => 1,
                );

                $id = $this->acladminmodel->addBlog($data);
                // if ($id) {
                //     $gallery = $this->upload_gallery();
                //     $this->acladminmodel->addGalleryArticle($gallery, $id);
                // }
                redirect('admin/acladmin/view_blog');
            }
        }
        $data['page'] = 'add_blog';
        $data['title'] = 'Tambah Blog Baru';

        $data['content'] = $this->load->view('acladmin/module/add_blog', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function add_basic() {
        $permalink = url_title($this->input->post('title'), 'dash', true);
        if ($this->input->post('submit')) {
            // validation
            $valid = $this->form_validation;
            $valid->set_rules('title', 'Judul', 'required');
            $valid->set_rules('short_desc', 'Short Desc', 'required');
            $valid->set_rules('body', 'Isi', 'required');
            if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] == "") {
                $valid->set_rules('userfile', 'Foto', 'required');
            }

            if ($valid->run() == false) {
                // run
            } else {

                $format_upload = $this->upload();
                $video_id = $this->get_youtube_id_from_url($this->input->post('video_id'));
                $data = array(
                    'id_account' => 1,
                    'title' => $this->input->post('title'),
                    'short_desc' => $this->input->post('short_desc'),
                    'body' => $this->input->post('body'),
                    'filename' => $format_upload,
                    'video_id' => $video_id,
                    //'headline' => $this->input->post('headline') ? 1 : 0,
                    'permalink' => $permalink.'.html',
                    'created_date' => time(),
                    'modified_date' => null,
                    'created_by' => $this->sess_id,
                    'modified_by' => null,
                    'status' => 1,
                );

                $id = $this->acladminmodel->addBasic($data);
                // if ($id) {
                //     $gallery = $this->upload_gallery();
                //     $this->acladminmodel->addGalleryArticle($gallery, $id);
                // }
                redirect('admin/acladmin/view_basic');
            }
        }
        $data['page'] = 'add_basic';
        $data['title'] = 'Tambah Basic Baru';

        $data['content'] = $this->load->view('acladmin/module/add_basic', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function add_program(){
        $permalink = url_title($this->input->post('title'), 'dash', true);
        $permalink_beginner = url_title($this->input->post('title_beginner'), 'dash', true);
        $permalink_intermediate = url_title($this->input->post('title_intermediate'), 'dash', true);
        $permalink_advanced = url_title($this->input->post('title_advanced'), 'dash', true);
        if ($this->input->post('submit')) {
            // validation
            $valid = $this->form_validation;
            $valid->set_rules('title', 'Judul', 'required');
            $valid->set_rules('short_desc', 'Short Desc', 'required');
            $valid->set_rules('title_beginner', 'Judul', 'required');
            $valid->set_rules('short_desc_beginner', 'Short Desc', 'required');
            $valid->set_rules('body_beginner', 'Isi', 'required');
            $valid->set_rules('title_intermediate', 'Judul', 'required');
            $valid->set_rules('short_desc_intermediate', 'Short Desc', 'required');
            $valid->set_rules('body_intermediate', 'Isi', 'required');
            $valid->set_rules('title_advanced', 'Judul', 'required');
            $valid->set_rules('short_desc_advanced', 'Short Desc', 'required');
            $valid->set_rules('body_advanced', 'Isi', 'required');
            if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] == "") {
                $valid->set_rules('userfile', 'Foto', 'required');
            }

            if ($valid->run() == false) {
                // run
            } else {

                $format_upload = $this->upload();
                $format_upload_beginner = $this->upload_beginner();
                $format_upload_intermediate = $this->upload_intermediate();
                $format_upload_advanced = $this->upload_advanced();
                //$video_id = $this->get_youtube_id_from_url($this->input->post('video_id'));
                $data = array(
                    'id_account' => 1,
                    'title' => $this->input->post('title'),
                    'short_desc' => $this->input->post('short_desc'),
                    'filename' => $format_upload,
                    'headline' => $this->input->post('headline') ? 1 : 0,
                    'permalink' => $permalink.'.html',
                    'created_date' => time(),
                    'modified_date' => null,
                    'created_by' => $this->sess_id,
                    'modified_by' => null,
                    'status' => 1,
                );

                $id = $this->acladminmodel->addProgram($data);

                $data_beginner = array(
                    'id_program' => $id,
                    'level' => 1,
                    'id_account' => 1,
                    'title' => $this->input->post('title_beginner'),
                    'short_desc' => $this->input->post('short_desc_beginner'),
                    'body' => $this->input->post('body_beginner'),
                    'filename' => $format_upload_beginner,
                    'permalink' => $permalink_beginner.'.html',
                    'created_date' => time(),
                    'modified_date' => null,
                    'created_by' => $this->sess_id,
                    'modified_by' => null,
                    'status' => 1,
                );

                $data_intermediate = array(
                    'id_program' => $id,
                    'level' => 2,
                    'id_account' => 1,
                    'title' => $this->input->post('title_intermediate'),
                    'short_desc' => $this->input->post('short_desc_intermediate'),
                    'body' => $this->input->post('body_intermediate'),
                    'filename' => $format_upload_intermediate,
                    'permalink' => $permalink_intermediate.'.html',
                    'created_date' => time(),
                    'modified_date' => null,
                    'created_by' => $this->sess_id,
                    'modified_by' => null,
                    'status' => 1,
                );

                $data_advanced = array(
                    'id_program' => $id,
                    'level' => 3,
                    'id_account' => 1,
                    'title' => $this->input->post('title_advanced'),
                    'short_desc' => $this->input->post('short_desc_advanced'),
                    'body' => $this->input->post('body_advanced'),
                    'filename' => $format_upload_advanced,
                    'permalink' => $permalink_advanced.'.html',
                    'created_date' => time(),
                    'modified_date' => null,
                    'created_by' => $this->sess_id,
                    'modified_by' => null,
                    'status' => 1,
                );

                $this->acladminmodel->addProgramLevel($data_beginner, $data_intermediate, $data_advanced);
                // if ($id) {
                //     $gallery = $this->upload_gallery();
                //     $this->acladminmodel->addGalleryArticle($gallery, $id);
                // }
                redirect('admin/acladmin/view_program');
            }
        }
        $data['page'] = 'add_program';
        $data['title'] = 'Tambah Program Baru';

        $data['content'] = $this->load->view('acladmin/module/add_program', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function add_program_artikel(){
        $id_program = $this->uri->segment(4);
        $permalink = url_title($this->input->post('title'), 'dash', true);
        if ($this->input->post('submit')) {
            // validation
            $valid = $this->form_validation;
            $valid->set_rules('title', 'Judul', 'required');
            $valid->set_rules('short_desc', 'Short Desc', 'required');
            $valid->set_rules('level', 'Level', 'required');
            $valid->set_rules('body', 'Isi', 'required');
            if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] == "") {
                $valid->set_rules('userfile', 'Foto', 'required');
            }

            if ($valid->run() == false) {
                // run
            } else {

                $this->db->where('level', $this->input->post('level'));
                $this->db->where('id_program', $id_program);
                $this->db->where('status', 1);
                $cekartikel = $this->db->get('program_level');

                if ($cekartikel->num_rows() > 0) {
                    echo "<script>window.alert('Artikel dengan level ini sudah ada')</script>";
                    echo "<meta http-equiv='refresh' content='0;URL=" . base_url('admin/acladmin/add_program_artikel') . "/".$id_program."' />";
                    exit;
                }

                $format_upload = $this->upload();
                //$video_id = $this->get_youtube_id_from_url($this->input->post('video_id'));
                $data = array(
                    'id_account' => 1,
                    'id_program' => $id_program,
                    'level' => $this->input->post('level'),
                    'title' => $this->input->post('title'),
                    'short_desc' => $this->input->post('short_desc'),
                    'body' => $this->input->post('body'),
                    'filename' => $format_upload,
                    'permalink' => $permalink.'.html',
                    'created_date' => time(),
                    'modified_date' => null,
                    'created_by' => $this->sess_id,
                    'modified_by' => null,
                    'status' => 1,
                );

                $id = $this->acladminmodel->addProgramArtikel($data);

                redirect('admin/acladmin/edit_program/'.$id_program);
            }
        }
        $data['page'] = 'add_program_artikel';
        $data['title'] = 'Tambah Artikel Program Baru';

        $data['content'] = $this->load->view('acladmin/module/add_program_artikel', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function add_safety() {
        $permalink = url_title($this->input->post('title'), 'dash', true);
        if ($this->input->post('submit')) {
            // validation
            $valid = $this->form_validation;
            $valid->set_rules('title', 'Judul', 'required');
            $valid->set_rules('short_desc', 'Short Desc', 'required');
            if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] == "") {
                $valid->set_rules('userfile', 'Foto', 'required');
            }

            if ($valid->run() == false) {
                // run
            } else {

                $format_upload = $this->upload();
                //$video_id = $this->get_youtube_id_from_url($this->input->post('video_id'));
                $data = array(
                    'id_account' => 1,
                    'title' => $this->input->post('title'),
                    'short_desc' => $this->input->post('short_desc'),
                    'filename' => $format_upload,
                    'permalink' => $permalink.'.html',
                    'created_date' => time(),
                    'modified_date' => null,
                    'created_by' => $this->sess_id,
                    'modified_by' => null,
                    'status' => 1,
                );

                $id = $this->acladminmodel->addSafety($data);
                // if ($id) {
                //     $gallery = $this->upload_gallery();
                //     $this->acladminmodel->addGalleryArticle($gallery, $id);
                // }
                redirect('admin/acladmin/view_safety');
            }
        }
        $data['page'] = 'add_safety';
        $data['title'] = 'Tambah Safety Swim Baru';

        $data['content'] = $this->load->view('acladmin/module/add_safety', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function add_slider() {
        $permalink = url_title($this->input->post('title'), 'dash', true);
        if ($this->input->post('submit')) {
            // validation
            $valid = $this->form_validation;
            $valid->set_rules('title', 'Judul', 'required');
            if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] == "") {
                //$valid->set_rules('userfile', 'Foto', 'required');
            }

            if ($valid->run() == false) {
                // run
            } else {

                $format_upload = $this->upload();
                $data = array(
                    'id_account' => 1,
                    'title' => $this->input->post('title'),
                    'link' => $this->input->post('link'),
                    'filename' => $format_upload,
                    'permalink' => $permalink,
                    'created_date' => time(),
                    'modified_date' => null,
                    'created_by' => $this->sess_id,
                    'modified_by' => null,
                    'status' => 1,
                );

                $id = $this->acladminmodel->addSlider($data);
//                if ($id) {
//                    $gallery = $this->upload_gallery();
//                    $this->acladminmodel->addGalleryArticle($gallery, $id);
//                }
                redirect('admin/acladmin/view_slider');
            }
        }
        $data['page'] = 'add_slider';
        $data['title'] = 'Tambah Slider Baru';

        $data['content'] = $this->load->view('acladmin/module/add_slider', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function view_blog() {
        $data['headline'] = $this->input->get('filter') ? $this->input->get('filter') : '1';
        $this->load->library('pagination');
        $config['base_url'] = site_url('admin/acladmin/view_blog');
        $config['per_page'] = $this->limit;
        $config['total_rows'] = $this->acladminmodel->countBlog(1);
        $config['uri_segment'] = 4;
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4) ? $this->uri->segment(4) : '');
        $data['media'] = $this->acladminmodel->fetchBlog($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['page'] = 'view_blog';
        $data['title'] = 'Blog';
        $data['content'] = $this->load->view('acladmin/module/view_blog', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function view_safety() {
        $data['headline'] = $this->input->get('filter') ? $this->input->get('filter') : '1';
        $this->load->library('pagination');
        $config['base_url'] = site_url('admin/acladmin/view_safety');
        $config['per_page'] = $this->limit;
        $config['total_rows'] = $this->acladminmodel->countSafety(1);
        $config['uri_segment'] = 4;
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4) ? $this->uri->segment(4) : '');
        $data['media'] = $this->acladminmodel->fetchSafety($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['page'] = 'view_safety';
        $data['title'] = 'Safety Swim';
        $data['content'] = $this->load->view('acladmin/module/view_safety', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function view_basic() {
        $data['headline'] = $this->input->get('filter') ? $this->input->get('filter') : '1';
        $this->load->library('pagination');
        $config['base_url'] = site_url('admin/acladmin/view_basic');
        $config['per_page'] = $this->limit;
        $config['total_rows'] = $this->acladminmodel->countBasic(1);
        $config['uri_segment'] = 4;
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4) ? $this->uri->segment(4) : '');
        $data['media'] = $this->acladminmodel->fetchBasic($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['page'] = 'view_basic';
        $data['title'] = 'Basic';
        $data['content'] = $this->load->view('acladmin/module/view_basic', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function view_program() {
        $data['headline'] = $this->input->get('filter') ? $this->input->get('filter') : '1';
        $this->load->library('pagination');
        $config['base_url'] = site_url('admin/acladmin/view_program');
        $config['per_page'] = $this->limit;
        $config['total_rows'] = $this->acladminmodel->countProgram(1);
        $config['uri_segment'] = 4;
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4) ? $this->uri->segment(4) : '');
        $data['media'] = $this->acladminmodel->fetchProgram($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['page'] = 'view_program';
        $data['title'] = 'Blog';
        $data['content'] = $this->load->view('acladmin/module/view_program', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function view_slider() {
        $data['headline'] = $this->input->get('filter') ? $this->input->get('filter') : '1';
        $data['banner'] = $this->acladminmodel->fetchSlider();
        $data['page'] = 'view_slider';
        $data['title'] = 'Slider';
        $data['content'] = $this->load->view('acladmin/module/view_slider', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function view_about() {
        $data['headline'] = $this->input->get('filter') ? $this->input->get('filter') : '1';
        $data['banner'] = $this->acladminmodel->fetchAbout();
        $data['page'] = 'view_about';
        $data['title'] = 'Store';
        $data['content'] = $this->load->view('acladmin/module/view_about', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function edit_blog() {
        $id = $this->uri->segment(4);
        if ($id) {
            $permalink = url_title($this->input->post('title'), 'dash', true);
            if ($this->input->post('submit')) {
                $valid = $this->form_validation;
                $valid->set_rules('title', 'Judul', 'required');
                $valid->set_rules('short_desc', 'Short Desc', 'required');
                $valid->set_rules('body', 'Isi', 'required');

                if ($valid->run() == false) {
                    // show error in view
                } else {
                    $format_upload = $this->upload();
                    $video_id = $this->get_youtube_id_from_url($this->input->post('video_id'));
                    if ($format_upload != "") {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'body' => $this->input->post('body'),
                            'filename' => $format_upload,
                            'video_id' => '',
                            'headline'         => $this->input->post('headline') ? 1 : 0,
                            'permalink' => $permalink.'.html',
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateBlog($data, $id);
                    } else {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'body' => $this->input->post('body'),
                            'filename' => '',
                            'video_id' => $video_id,
                            'headline'         => $this->input->post('headline') ? 1 : 0,
                            'permalink' => $permalink.'.html',
                            'meta_keywords' => $this->input->post('meta_keywords'),
                            'meta_description' => $this->input->post('meta_description'),
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateBlog($data, $id);
                    }

                    // $gallery = $this->upload_gallery();
                    // $this->acladminmodel->addGalleryArticle($gallery, $id);

                    redirect('admin/acladmin/view_blog');
                }
            }
            $data['page'] = 'edit_blog';
            $data['title'] = 'Edit Blog';
            $data['article'] = $this->acladminmodel->getIdBlog($id);
            //$data['photos']  = $this->acladminmodel->getIdGalleryArticle($id);
            
            $data['content'] = $this->load->view('acladmin/module/edit_blog', $data, true);
            $this->load->view('acladmin/main', $data);
        } else {
            redirect('admin/acladmin/view_blog');
        }
    }

    public function edit_safety() {
        $id = $this->uri->segment(4);
        if ($id) {
            $permalink = url_title($this->input->post('title'), 'dash', true);
            if ($this->input->post('submit')) {
                $valid = $this->form_validation;
                $valid->set_rules('title', 'Judul', 'required');
                $valid->set_rules('short_desc', 'Short Desc', 'required');

                if ($valid->run() == false) {
                    // show error in view
                } else {
                    $format_upload = $this->upload();
                    //$video_id = $this->get_youtube_id_from_url($this->input->post('video_id'));
                    if ($format_upload != "") {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'filename' => $format_upload,
                            'permalink' => $permalink.'.html',
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateSafety($data, $id);
                    } else {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'permalink' => $permalink.'.html',
                            'meta_keywords' => $this->input->post('meta_keywords'),
                            'meta_description' => $this->input->post('meta_description'),
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateSafety($data, $id);
                    }

                    // $gallery = $this->upload_gallery();
                    // $this->acladminmodel->addGalleryArticle($gallery, $id);

                    redirect('admin/acladmin/view_safety');
                }
            }
            $data['page'] = 'edit_safety';
            $data['title'] = 'Edit Safety';
            $data['article'] = $this->acladminmodel->getIdSafety($id);
            //$data['photos']  = $this->acladminmodel->getIdGalleryArticle($id);
            
            $data['content'] = $this->load->view('acladmin/module/edit_safety', $data, true);
            $this->load->view('acladmin/main', $data);
        } else {
            redirect('admin/acladmin/view_safety');
        }
    }

    public function edit_basic() {
        $id = $this->uri->segment(4);
        if ($id) {
            $permalink = url_title($this->input->post('title'), 'dash', true);
            if ($this->input->post('submit')) {
                $valid = $this->form_validation;
                $valid->set_rules('title', 'Judul', 'required');
                $valid->set_rules('short_desc', 'Short Desc', 'required');
                $valid->set_rules('body', 'Isi', 'required');

                if ($valid->run() == false) {
                    // show error in view
                } else {
                    $format_upload = $this->upload();
                    $video_id = $this->get_youtube_id_from_url($this->input->post('video_id'));
                    if ($format_upload != "") {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'body' => $this->input->post('body'),
                            'filename' => $format_upload,
                            'video_id' => '',
                            //'headline'         => $this->input->post('headline') ? 1 : 0,
                            'permalink' => $permalink.'.html',
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateBasic($data, $id);
                    } else {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'body' => $this->input->post('body'),
                            'filename' => '',
                            'video_id' => $video_id,
                            //'headline'         => $this->input->post('headline') ? 1 : 0,
                            'permalink' => $permalink.'.html',
                            'meta_keywords' => $this->input->post('meta_keywords'),
                            'meta_description' => $this->input->post('meta_description'),
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateBasic($data, $id);
                    }

                    // $gallery = $this->upload_gallery();
                    // $this->acladminmodel->addGalleryArticle($gallery, $id);

                    redirect('admin/acladmin/view_basic');
                }
            }
            $data['page'] = 'edit_basic';
            $data['title'] = 'Edit Basic';
            $data['article'] = $this->acladminmodel->getIdBasic($id);
            //$data['photos']  = $this->acladminmodel->getIdGalleryArticle($id);
            
            $data['content'] = $this->load->view('acladmin/module/edit_basic', $data, true);
            $this->load->view('acladmin/main', $data);
        } else {
            redirect('admin/acladmin/view_basic');
        }
    }

    public function edit_program() {
        $id = $this->uri->segment(4);
        if ($id) {
            $permalink = url_title($this->input->post('title'), 'dash', true);
            if ($this->input->post('submit')) {
                $valid = $this->form_validation;
                $valid->set_rules('title', 'Judul', 'required');
                $valid->set_rules('short_desc', 'Short Desc', 'required');

                if ($valid->run() == false) {
                    // show error in view
                } else {
                    $format_upload = $this->upload();
                    //$video_id = $this->get_youtube_id_from_url($this->input->post('video_id'));
                    if ($format_upload != "") {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'filename' => $format_upload,
                            'headline' => $this->input->post('headline') ? 1 : 0,
                            'permalink' => $permalink.'.html',
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateProgram($data, $id);
                    } else {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'headline'   => $this->input->post('headline') ? 1 : 0,
                            'permalink' => $permalink.'.html',
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateProgram($data, $id);
                    }

                    // $gallery = $this->upload_gallery();
                    // $this->acladminmodel->addGalleryArticle($gallery, $id);

                    redirect('admin/acladmin/view_program');
                }
            }
            $data['page'] = 'edit_program';
            $data['title'] = 'Edit Program';
            $data['article'] = $this->acladminmodel->getIdProgram($id);
            $data['artikel_program'] = $this->acladminmodel->fetchProgramArtikel($id);
            // $data['program_beginner'] = $this->acladminmodel->getIdProgramLevel($id, 1);
            // //var_dump($data['program_beginner']);exit;
            // $data['program_intermediate'] = $this->acladminmodel->getIdProgramLevel($id, 2);
            // $data['program_advanced'] = $this->acladminmodel->getIdProgramLevel($id, 3);

            //$data['photos']  = $this->acladminmodel->getIdGalleryArticle($id);
            
            $data['content'] = $this->load->view('acladmin/module/edit_program', $data, true);
            $this->load->view('acladmin/main', $data);
        } else {
            redirect('admin/acladmin/view_program');
        }
    }

    public function edit_program_artikel() {
        $id = $this->uri->segment(4);
        $id_program = $this->uri->segment(5);
        if ($id) {
            $permalink = url_title($this->input->post('title'), 'dash', true);
            if ($this->input->post('submit')) {
                $valid = $this->form_validation;
                $valid->set_rules('title', 'Judul', 'required');
                $valid->set_rules('short_desc', 'Short Desc', 'required');
                $valid->set_rules('level', 'Level', 'required');
                $valid->set_rules('body', 'Isi', 'required');

                if ($valid->run() == false) {
                    // show error in view
                } else {
                    $format_upload = $this->upload();
                    //$video_id = $this->get_youtube_id_from_url($this->input->post('video_id'));
                    if ($format_upload != "") {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'level' => $this->input->post('level'),
                            'body' => $this->input->post('body'),
                            'filename' => $format_upload,
                            'permalink' => $permalink.'.html',
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateProgramArtikel($data, $id);
                    } else {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'level' => $this->input->post('level'),
                            'body' => $this->input->post('body'),
                            'permalink' => $permalink.'.html',
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateProgramArtikel($data, $id);
                    }

                    redirect('admin/acladmin/edit_program/'.$id_program);
                }
            }
            $data['page'] = 'edit_program_artikel';
            $data['title'] = 'Edit Program Artikel';
            $data['article'] = $this->acladminmodel->getIdProgramArtikel($id);
            
            $data['content'] = $this->load->view('acladmin/module/edit_program_artikel', $data, true);
            $this->load->view('acladmin/main', $data);
        } else {
            redirect('admin/acladmin/edit_program/'.$id_program);
        }
    }

    public function edit_program_level() {
        $id_program = $this->uri->segment(4);
        $id_program_level = $this->uri->segment(5);
        $level = $this->uri->segment(6);
        if ($id_program) {
            $permalink = url_title($this->input->post('title'), 'dash', true);
            if ($this->input->post('submit')) {
                $valid = $this->form_validation;
                $valid->set_rules('title', 'Judul', 'required');
                $valid->set_rules('short_desc', 'Short Desc', 'required');
                $valid->set_rules('body', 'Isi', 'required');

                if ($valid->run() == false) {
                    // show error in view
                } else {
                    $format_upload = $this->upload();
                    //$video_id = $this->get_youtube_id_from_url($this->input->post('video_id'));
                    if ($format_upload != "") {
                        $data = array(
                            'id' => $id_program_level,
                            'id_program' => $id_program,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'body' => $this->input->post('body'),
                            'filename' => $format_upload,
                            'permalink' => $permalink.'.html',
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateProgramLevel($data, $id_program_level);
                    } else {
                        $data = array(
                            'id' => $id_program_level,
                            'id_program' => $id_program,
                            'title' => $this->input->post('title'),
                            'short_desc' => $this->input->post('short_desc'),
                            'body' => $this->input->post('body'),
                            'permalink' => $permalink.'.html',
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateProgramLevel($data, $id_program_level);
                    }

                    // $gallery = $this->upload_gallery();
                    // $this->acladminmodel->addGalleryArticle($gallery, $id);

                    redirect('admin/acladmin/edit_program/'.$id_program);
                }
            }
            $data['page'] = 'edit_program_level';
            $data['title'] = 'Edit Program Level';
            $data['article'] = $this->acladminmodel->getIdProgramLevel($id_program, $level);
            //var_dump($data['article']->filename);exit;

            //$data['photos']  = $this->acladminmodel->getIdGalleryArticle($id);
            
            $data['content'] = $this->load->view('acladmin/module/edit_program_level', $data, true);
            $this->load->view('acladmin/main', $data);
        } else {
            redirect('admin/acladmin/edit_program/'.$id_program);
        }
    }

    public function edit_slider() {
        $id = $this->uri->segment(4);
        if ($id) {
            $permalink = url_title($this->input->post('title'), 'dash', true);
            if ($this->input->post('submit')) {
                $valid = $this->form_validation;
                $valid->set_rules('title', 'Judul', 'required');

                if ($valid->run() == false) {
                    // show error in view
                } else {
                    $format_upload = $this->upload();
                    if ($format_upload != "") {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'link' => $this->input->post('link'),
                            'filename' => $format_upload,
                            'permalink' => $permalink,
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateSlider($data, $id);
                    } else {
                        $data = array(
                            'id' => $id,
                            'title' => $this->input->post('title'),
                            'link' => $this->input->post('link'),
                            'permalink' => $permalink,
                            'modified_date' => time(),
                            'modified_by' => $this->sess_id,
                            'status' => 1
                        );
                        $this->acladminmodel->updateSlider($data, $id);
                    }

//                    $gallery = $this->upload_gallery();
//                    $this->acladminmodel->addGalleryArticle($gallery, $id);

                    redirect('admin/acladmin/view_slider');
                }
            }
            $data['page'] = 'edit_slider';
            $data['title'] = 'Edit Slider';
            $data['article'] = $this->acladminmodel->getIdSlider($id);
            //$data['photos']  = $this->acladminmodel->getIdGalleryArticle($id);

            $data['content'] = $this->load->view('acladmin/module/edit_slider', $data, true);
            $this->load->view('acladmin/main', $data);
        } else {
            redirect('admin/acladmin/view_slider');
        }
    }

    public function edit_about() {
        $id = $this->uri->segment(4);
        if ($id) {
            if ($this->input->post('submit')) {
                $valid = $this->form_validation;
                $valid->set_rules('title', 'Judul', 'required');
                $valid->set_rules('short_desc', 'Short Description', 'required');
                $valid->set_rules('body', 'Isi', 'required');

                if ($valid->run() == false) {
                    // show error in view
                } else {
                        $data = array(
                                'id' => $id,
                                'title' => $this->input->post('title'),
                                'short_desc' => $this->input->post('short_desc'),
                                'body' => $this->input->post('body'),
                                'modified_date' => time(),
                                'modified_by' => $this->sess_id,
                                'status' => 1
                            );
                        $this->acladminmodel->updateAbout($data, $id);

//                    $gallery = $this->upload_gallery();
//                    $this->acladminmodel->addGalleryArticle($gallery, $id);

                    redirect('admin/acladmin/view_about');
                }
            }
            $data['page'] = 'edit_about';
            $data['title'] = 'Edit About';
            $data['article'] = $this->acladminmodel->getIdAbout($id);
            //$data['photos']  = $this->acladminmodel->getIdGalleryArticle($id);

            $data['content'] = $this->load->view('acladmin/module/edit_about', $data, true);
            $this->load->view('acladmin/main', $data);
        } else {
            redirect('admin/acladmin/view_about');
        }
    }

    public function delete_blog() {
        if ($this->uri->segment(4)) {
            $data = array('status' => 0);
            $id = $this->uri->segment(4);
            $this->acladminmodel->deleteBlog($data, $id);
            redirect('admin/acladmin/view_blog');
        } else {
            redirect('admin/acladmin/view_blog');
        }
    }

    public function delete_safety() {
        if ($this->uri->segment(4)) {
            $data = array('status' => 0);
            $id = $this->uri->segment(4);
            $this->acladminmodel->deleteSafety($data, $id);
            redirect('admin/acladmin/view_safety');
        } else {
            redirect('admin/acladmin/view_safety');
        }
    }

    public function delete_program_artikel() {
        if ($this->uri->segment(4)) {
            $data = array('status' => 0);
            $id = $this->uri->segment(4);
            $id_program = $this->uri->segment(5);
            $this->acladminmodel->deleteProgramArtikel($data, $id);
            redirect('admin/acladmin/edit_program/'.$id_program);
        } else {
            redirect('admin/acladmin/view_blog/'.$id_program);
        }
    }

    public function delete_slider() {
        if ($this->uri->segment(4)) {
            $data = array('status' => 0);
            $id = $this->uri->segment(4);
            $this->acladminmodel->deleteSlider($data, $id);
            redirect('admin/acladmin/view_slider');
        } else {
            redirect('admin/acladmin/view_slider');
        }
    }
    
    public function add_user() {
        $this->onlyAdmin();

        if ($this->input->post('submit')) {
            // validation
            $valid = $this->form_validation;
            $valid->set_rules('name', 'Nama User', 'required');
            $valid->set_rules('email', 'Email', 'required|valid_email');
            $valid->set_rules('role', 'Hak Akses', 'required');
            $valid->set_rules('password', 'Password', 'min_length[5]|required');
            $valid->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]');

            if ($valid->run() == false) {
                // run
            } else {
                $name = $this->input->post('name');
                $email = $this->input->post('email');

                //cek user/email exist
                $exist = $this->userEmailExist($name, $email);

                if (!$exist) {
                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'role' => $this->input->post('role'),
                        'password' => sha1(md5($this->input->post('password'))),
                        'created_date' => time(),
                        'modified_date' => null,
                        'status' => 1
                    );

                    $this->acladminmodel->addUser($data);
                    redirect('admin/acladmin/view_user');
                }
            }
        }
        $data['page'] = 'add_user';
        $data['title'] = 'Tambah User Baru';
        $data['content'] = $this->load->view('acladmin/module/add_user', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    /**
     * check user/email
     */
    public function userEmailExist($name, $email, $id = false) {
        //check username
        $username = $this->acladminmodel->checkUsernameExist($name, $id);

        if ($username->num_rows() > 0) {
            $this->session->set_flashdata('error', 'Nama User Sudah Digunakan');
            redirect(getenv('HTTP_REFERER'));
        }

        //check email
        $email = $this->acladminmodel->checkEmailExist($email, $id);

        if ($email->num_rows > 0) {
            $this->session->set_flashdata('error', 'Email Sudah Digunakan');
            redirect(getenv('HTTP_REFERER'));
        }

        return false;
    }

    /**
     * list user
     * status 1
     */
    public function view_user() {
        $this->onlyAdmin();

        $this->load->library('pagination');
        $config['base_url'] = site_url('admin/acladmin/view_user');
        $config['per_page'] = $this->limit;
        $config['total_rows'] = $this->acladminmodel->countUser(1);
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4) ? $this->uri->segment(4) : '');
        $data['list'] = $this->acladminmodel->fetchUser($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['page'] = 'view_user';
        $data['title'] = 'User';
        $data['content'] = $this->load->view('acladmin/module/view_user', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    /**
     * edit user
     */
    public function edit_user() {
        $this->onlyAdmin();

        $id = $this->uri->segment(4);
        if ($id) {
            if ($this->input->post('submit')) {
                // validation
                $valid = $this->form_validation;
                $valid->set_rules('name', 'Nama User', 'required');
                $valid->set_rules('email', 'Email', 'required|valid_email');
                $valid->set_rules('role', 'Hak Akses', 'required');
                $valid->set_rules('password', 'Password', 'min_length[5]|required');
                $valid->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]');

                if ($valid->run() == false) {
                    // run
                } else {
                    $name = $this->input->post('name');
                    $email = $this->input->post('email');

                    //cek user/email exist
                    $exist = $this->userEmailExist($name, $email, $id);

                    if (!$exist) {
                        $data = array(
                            'name' => $name,
                            'email' => $email,
                            'role' => $this->input->post('role'),
                            'modified_date' => time(),
                            'status' => 1
                        );

                        $password = $this->input->post('password');
                        $old_password = $this->input->post('oldpass');

                        if ($password != $old_password)
                            $data['password'] = sha1(md5($password));

                        $this->acladminmodel->updateUser($data, $id);
                        redirect('admin/acladmin/view_user');
                    }
                }
            }
            $id = $this->uri->segment(4);
            $data['edit'] = $this->acladminmodel->getIdUser($id);
            $data['page'] = 'edit_user';
            $data['title'] = 'Edit User';
            $data['content'] = $this->load->view('acladmin/module/add_user', $data, true);
        } else {
            redirect('admin/acladmin/view_user');
        }
        $this->load->view('acladmin/main', $data);
    }

    /**
     * edit user
     */
    public function edit_password() {
        if ($this->input->post('submit')) {
            // validation
            $valid = $this->form_validation;
            $valid->set_rules('old_password', 'Password Lama', 'required');
            $valid->set_rules('new_password', 'Password Baru', 'min_length[5]|required');
            $valid->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[new_password]');

            if ($valid->run() == false) {
                // run
            } else {

                $cek_password = $this->acladminmodel->checkPassword($this->input->post('old_password'));
                if ($cek_password) {
                    $data = array(
                        'password' => sha1(md5($this->input->post('new_password'))),
                        'modified_date' => time()
                    );
                    $id = $this->session->userdata('user_id');
                    $this->acladminmodel->updateUser($data, $id);
                    $this->session->set_flashdata('success', 'Berhasil Ubah Password');
                } else {
                    $this->session->set_flashdata('error', 'Password Lama Salah');
                }
                redirect(getenv('HTTP_REFERER'));
            }
        }
        $data['page'] = 'edit_password';
        $data['title'] = 'Edit Password';
        $data['content'] = $this->load->view('acladmin/module/edit_password', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    /**
     * delete channel
     * change status 1 to 0
     */
    public function delete_user() {
        $this->onlyAdmin();

        if ($this->uri->segment(4)) {
            $data = array('status' => 0);
            $id = $this->uri->segment(4);
            $this->acladminmodel->deleteUser($data, $id);
        }
        redirect('admin/acladmin/view_user');
    }

    /**
     * list channel status 0
     */
    public function archive_user() {
        $this->onlyAdmin();

        $this->load->library('pagination');
        $config['base_url'] = site_url('admin/acladmin/archive_user');
        $config['per_page'] = $this->limit;
        $config['total_rows'] = $this->acladminmodel->countUser(0);
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4) ? $this->uri->segment(4) : '');
        $data['content'] = $this->acladminmodel->fetchArchiveUser($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['page'] = 'archive_user';
        $data['title'] = 'Arsip User';
        $data['content'] = $this->load->view('acladmin/module/archive_user', $data, true);
        $this->load->view('acladmin/main', $data);
    }

    public function active_user() {
        $this->onlyAdmin();

        if ($this->uri->segment(4)) {
            $id = $this->uri->segment(4);
            $data = array('status' => 1);
            $this->acladminmodel->activeUser($data, $id);
        }
        redirect('admin/acladmin/view_user');
    }

    /*     * ***************** END OFF USER ***************** */
}
