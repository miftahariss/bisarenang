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

    function getBlog($offset, $limit, $exclude = ''){
    	if(is_array($exclude)){
    		$this->db->where_not_in('id',$exclude);
    	}
    	$this->db->where('status', 1);
    	$this->db->order_by('created_date', 'desc');
    	$query = $this->db->get('blog',$limit,$offset);

    	return $query->result();
    }
}