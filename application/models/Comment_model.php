<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public $title;
    public $owner;
    public $content;
    public $date;

    public function get_last_ten_entries()
    {
    	$this->db->where('blog_owner', $this->session->userdata('userid'));
        $query = $this->db->get('blog_posts', 10);
        return $query->result();
    }

    public function insert_entry()
    {
        $this->blog_title       = $_POST['title']; // please read the below note
        $this->blog_description = $_POST['content'];
        $this->blog_timestamp   = time();
        $this->blog_owner       = $this->session->userdata('userid');

        $this->db->insert('blog_post', $this);
    }

    public function update_entry()
    {
    	$this->blog_title       = $_POST['title'];
        $this->blog_description = $_POST['content'];
        $this->blog_timestamp   = time();
        $this->blog_owner       = $this->session->userdata('userid');

        $this->db->update('blog_post', $this, array('blog_id' => $_POST['id']));
    }

}