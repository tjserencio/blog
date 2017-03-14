<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public $blog_title;
    public $blog_description;
    public $blog_timestamp;
    public $blog_owner;

    public function get_details($blog_id = null)
    {
    	if($blog_id == null) return;

    	$this->db->where('blog_id', $blog_id);
    	return $this->db->get('blog_post')->row();
    }

    public function get_last_ten_entries()
    {
    	$this->db->where('blog_owner', $this->session->userdata('userid'));
        return $this->db->get('blog_post', 10)->result();
    }

    public function insert_entry()
    {
        $this->blog_title       = $_POST['title']; // please read the below note
        $this->blog_description = $_POST['content'];
        $this->blog_timestamp   = time();
        $this->blog_owner       = $this->session->userdata('userid');

        return $this->db->insert('blog_post', $this);
    }

    public function update_entry()
    {
    	$this->blog_title       = $_POST['title'];
        $this->blog_description = $_POST['content'];
        $this->blog_timestamp   = time();
        $this->blog_owner       = $this->session->userdata('userid');

        return $this->db->update('blog_post', $this, array('blog_id' => $_POST['blog_id']));
    }

}