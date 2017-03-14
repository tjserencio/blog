<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$userid = $this->session->userdata('userid');

		if(!$userid) redirect('welcome');

		$blogs  = $this->Blog_model->get_last_ten_entries();

		$this->load->view('blog', array('blog' => $blogs));
	}

	public function add_entry()
	{
		$isSuccess = $this->Blog_model->insert_entry();

		if($isSuccess) $this->index();
	}

	public function update_entry()
	{
		$this->Blog_model->update_entry();

		redirect('blog/details/' . $_POST['blog_id']);
	}

	public function delete_entry($blog_id = null)
	{
		if($blog_id == null) redirect('blog');

		$this->db->delete('blog_post', array('blog_id' => $blog_id));
		redirect('/blog');
	}

	public function add_comment()
	{
		$this->Comment_model->insert_entry();

		redirect('blog/details/' . $_POST['blog_id']);
	}

	public function update_comment($blog_id)
	{
		$this->Comment_model->update_entry();

		redirect('blog/details/' . $blog_id);
	}

	public function delete_comment($blog_id = null, $comment_id = null)
	{
		if($blog_id == null) redirect('blog');

		$this->db->delete('blog_comments', array('comment_id' => $comment_id));
		redirect('/blog/details/'. $blog_id);
	}

	public function details($blog_id = null, $isupdate = false)
	{
		if($blog_id == null) redirect('blog');

		$query  = $this->Blog_model->get_details($blog_id);
		$comment = $this->Comment_model->get_last_ten_entries($blog_id);
		$userid = $this->session->userdata('userid');

		$this->load->view('blog_details', array(
											'details'  => $query,
											'comment'  => $comment,
											'userid'   => $userid,
											'isupdate' => $isupdate));
	}
}
