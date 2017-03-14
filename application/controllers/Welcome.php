<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->session->sess_destroy();
		$this->load->view('welcome_message');
	}

	public function signin()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$query = $this->db->query("SELECT user_id FROM users WHERE username = ? AND password = ?", array($username, $password));

		if($query->num_rows() > 0) {
			$query = $query->row();
			$this->session->set_userdata('userid', $query->user_id);
			redirect('/blog');
		} else {
			$this->load->view('welcome_message', ["error" => "Username and/or password is incorrect."]);
		}
	}

	public function register($validate = false)
	{
		$data = array();

		if($validate) {
			$name         = $this->input->post('name');
			$email        = $this->input->post('email');
			$password     = $this->input->post('password');
			$confpassword = $this->input->post('confpassword');

			$this->form_validation->set_rules('email', 'Email', 'is_unique[users.username]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confpassword', 'Confirm Password', 'required|matches[password]');

			if ($this->form_validation->run()) {
				$data = [
					"fullname" => $name,
					"username" => $email,
					"password" => md5($password)
				];

				$userid = $this->db->insert('users', $data);

				if($userid) {
					$this->session->set_userdata('userid', $userid);
					redirect('/blog');
				}
			}
		}

		return $this->load->view('register');
	}
}
