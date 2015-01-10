<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_checker extends CI_Controller {
		
	public function index()
	{
		show_404();
	}
	public function check_session()
	{
		if(!$this->session->userdata('logged_in')){ 
			//return true;
			echo 0;
		}else{
			echo 1; 
			//return false;
		}
	}
}