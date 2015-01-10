<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','calendar'));
		$this->load->library('pagination','upload');
		$this->load->config('pagination');
		$this->load->dbutil();
		$this->load->helper(array('date','file','cookie'));
		$this->load->model('model');
		$this->check();
		//$this->check_exist_cookie();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    	$this->output->set_header('Pragma: no-cache');
	}
	public function index()
	{
		$data['title']   = 'Welcome please login as admin';
		$data['content'] = 'pages/login_view';
		$data['error']   = '';
		
		$this->load->view('template/template', $data);
	}
	public function validate()
	{
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		if($this->form_validation->run() == FALSE){
			$this->error();
		}
		else{
			$username = $this->input->security->xss_clean($this->input->post('username'));
			$password = $this->input->security->xss_clean($this->input->post('password'));
			
			$this->db->where('username',$username);
			$this->db->where('password',sha1($password));
			$user = $this->db->get('user');
			
			if($user->num_rows() == 1){
				$row = $user->row();

				if(!$this->input->post('netid')){
					$this->session->sess_expiration = 7200;
                	$this->session->sess_expire_on_close = TRUE;
				}

				$data = array(
							'logged_in' => TRUE,
							'username'  => $row->username,
							'id'  => $row->id,
							//'active' => 'on'
							 );
				$this->session->set_userdata($data);
				redirect('welcome');	
			}
			else{
				redirect('login/u_error?login=failed');
			}
			
		}
	}
	
	public function error()
	{
		$data['title']   = 'Welcome please login as admin';
		$data['content'] = 'pages/login_view';
		$data['error'] = '<div id="error" class="form-group alert alert-danger" style="font-size: 13px;">
					  <small>'.validation_errors().'</small>
					  </div>';
		
		$this->load->view('template/template', $data);
	}
	public function u_error()
	{
		$data['title']   = 'Welcome please login as admin';
		$data['content'] = 'pages/login_view';
		$data['error'] = '<div id="error" class="form-group alert alert-danger" style="font-size: 13px;">
					  <small>Invalid username or password.</small>
					  </div>';
		
		$this->load->view('template/template', $data);
	}
	/*private function check_exist_cookie()
	{
		$this->db->where('netid','on');
		$cookie = $this->db->get('ci_cookies');
		$row = $cookie->row();
		if($cookie->num_rows() == 1){
			$new_sess = array(
						'logged_in'=> TRUE,
						'active'=> $row->netid,
					);
			$this->session->set_userdata($new_sess);
			redirect('welcome');	
		}
	}*/
	private function check()
	{
		if($this->session->userdata('logged_in')) redirect('welcome');
		else return true;
	}
}