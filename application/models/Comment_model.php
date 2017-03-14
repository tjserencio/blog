<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

    public $blog_id;
    public $comment_title;
    public $comment_details;
    public $comment_user;
    public $comment_timestamp;

    public function get_last_ten_entries($blog_id)
    {
    	$query = $this->db->query("SELECT * FROM blog_comments INNER JOIN users ON comment_user = user_id ORDER BY comment_timestamp DESC");

        return ($query->num_rows() > 0) ? $query->result() : null;
    }

    public function insert_entry()
    {
        $this->blog_id           = $_POST['blog_id'];
        $this->comment_title     = $_POST['title']; // please read the below note
        $this->comment_details   = $_POST['comment'];
        $this->comment_timestamp = time();
        $this->comment_user      = $this->session->userdata('userid');

        return $this->db->insert('blog_comments', $this);
    }

    public function update_entry()
    {
    	$this->blog_id           = $blog_id;
        $this->comment_title     = $_POST['title']; // please read the below note
        $this->comment_details   = $_POST['comment'];
        $this->comment_timestamp = time();
        $this->comment_user      = $this->session->userdata('userid');

        return $this->db->update('blog_comments', $this, array('comment_id' => $_POST['comment_id']));
    }

}