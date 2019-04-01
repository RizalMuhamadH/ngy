<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index(){
		if ($this->session->userdata('logged') !=TRUE) {
			$this->load->view('login');
		} else {
			redirect('dashboard');
		}
	}
        
	public function login(){
		redirect('dashboard');
	}
        
	public function logout(){
		redirect('auth');
	}
}