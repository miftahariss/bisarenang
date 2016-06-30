<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_frontend extends CI_Model {
	function __construct() {
        parent::__construct();
    }

    function headline($limit){
    	$this->db->where('headline', 1);
    	$this->db->where('status', 1);
    	$this->db->order_by('created_date', 'desc');
    	$this->db->limit($limit);
    	$query = $this->db->get('blog');

    	return $query->result();
    }

    function getDetailBlog($title){
    	$this->db->where('permalink', $title);
    	$this->db->where('status', 1);
    	$query = $this->db->get('blog');

    	return $query->result();
    }

    function getDetailBasic($title){
        $this->db->where('permalink', $title);
        $this->db->where('status', 1);
        $query = $this->db->get('basic');

        return $query->result();
    }

    function getBlog($offset, $limit, $exclude = ''){
    	if(is_array($exclude)){
    		$this->db->where_not_in('id',$exclude);
    	}
    	$this->db->where('status', 1);
    	$this->db->order_by('created_date', 'desc');
    	$query = $this->db->get('blog',$limit,$offset);

    	return $query->result();
    }

    function getSafety(){
        $this->db->where('status', 1);
        $this->db->order_by('created_date', 'desc');
        $query = $this->db->get('safety');

        return $query->result();
    }

    function getBasic($offset, $limit){
        $this->db->where('status', 1);
        $this->db->order_by('created_date', 'desc');
        $query = $this->db->get('basic',$limit,$offset);

        return $query->result();
    }

    function getProgram($id = '', $headline = ''){
        if($id != ''){
            $this->db->where('id', $id);
        }
        if($headline != ''){
            $this->db->where('headline', $headline);
        }
        $this->db->where('status', 1);
        $this->db->order_by('created_date', 'desc');
        $query = $this->db->get('program');

        return $query->result();
    }

    function getProgramLevel($id){
        $this->db->where('id_program', $id);
        $this->db->where('status', 1);
        $this->db->order_by('level', 'asc');
        $query = $this->db->get('program_level');

        return $query->result();
    }

    function getDetailProgramLevel($title){
        $this->db->where('permalink', $title);
        $this->db->where('status', 1);
        $query = $this->db->get('program_level');

        return $query->result();
    }

    function cekProgram($id){
        $this->db->where('id_program', $id);
        $this->db->where('status', 1);
        $query = $this->db->get('program_level');

        return $query->result();
    }

    function getAbout(){
      $this->db->where('status', 1);
      $query = $this->db->get('about');

      return $query->result();
    }

    /* COUNT BLOG MEDIA */
    function get_count($id) {
        $this->db->where('counter_blog_id', $id);
        $query = $this->db->get('blog_counter');
        return $query->result_array();
    }

    function count_view($data, $id) {
        $this->db->where('counter_blog_id', $id);
        $this->db->update('blog_counter', $data);
    }

    function save_count_view($data) {
        $this->db->insert('blog_counter', $data);
    }
    /* END OF COUNT BLOG MEDIA */
}