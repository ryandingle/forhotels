<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contract extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','calendar'));
		$this->load->library('pagination','upload');
		$this->load->config('pagination');
		$this->load->dbutil();
		$this->load->helper(array('date','file'));
		$this->load->model('model');
		$this->check();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    	$this->output->set_header('Pragma: no-cache');
	}
	public function index()
	{
		show_404();
	}
	public function view_contract()
	{
		$data['title'] = 'Add contract';
		$data['content'] = 'pages/add_contract';
		$data['error'] = '';
		
		$this->db->where('id',$this->uri->segment(3));
		$data['info'] = $this->db->get('hotels');
		
		$this->load->view('template/template', $data);
	}
	public function add_contract()
	{
		$config = $this->load->config('upload');
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('h_p_rate','Published Rate','required|trim|xss_clean');
		$this->form_validation->set_rules('h_d_rate','Discount Rate','required|trim|xss_clean');
		$this->form_validation->set_rules('h_n_payment1','No of pax','required|trim|xss_clean');
		$this->form_validation->set_rules('h_t_room1','Type of room','required|trim|xss_clean');
		$this->form_validation->set_rules('h_income','Income','trim|xss_clean');
		$this->form_validation->set_rules('h_c_rate','contracted rate','trim|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			$this->update_error();
		}
		else
		{			
			$config = $this->load->config('upload');
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload())
			{	
				$data = array(
					'h_inclusions' 	=> $this->input->post('h_inclusions'),
					'h_t_room'   	=> $this->input->post('h_t_room1'),
					'h_n_payment'	=> $this->input->post('h_n_payment1'),
					
					'h_p_rate'   	=> $this->input->post('h_p_rate'),
					'h_c_rate'   	=> $this->input->post('contracted_rate'),
					'h_d_rate'   	=> $this->input->post('h_d_rate'),
					'h_income'   	=> $this->input->post('income'),
					
					'h_vp'       	=> $this->input->post('vp'),
					'h_vp_less'  	=> $this->input->post('vp_less'),
					'h_pr'       	=> $this->input->post('pr'),
					'h_rate_per_room'       	=> $this->input->post('rate_per_room'),
				);
				for($date = 1;$date <= 30;$date++){
					$date_loop = array(
						'val'.$date.'' => $this->input->post('val'.$date.''),
					);
					$this->db->set($date_loop);
					$this->db->where('id',$this->uri->segment(3));
					$this->db->update('hotels');
				}
				$this->db->set($data);
				$this->db->where('id',$this->uri->segment(3));
				$this->db->update('hotels');

				redirect('welcome/view_data?success='.$this->uri->segment(3).'');
			}
			else
			{
				$config = $this->load->config('upload');
				$this->load->library('upload', $config);
				$datas = $this->upload->data();
				$filename = $datas['file_name'];
				$data = array(
					'h_inclusions' 	=> $this->input->post('h_inclusions'),
					'h_t_room'   	=> $this->input->post('h_t_room1'),
					'h_n_payment'	=> $this->input->post('h_n_payment1'),
					
					'h_p_rate'   	=> $this->input->post('h_p_rate'),
					'h_c_rate'   	=> $this->input->post('contracted_rate'),
					'h_d_rate'   	=> $this->input->post('h_d_rate'),
					'h_income'   	=> $this->input->post('income'),
					
					'h_vp'       	=> $this->input->post('vp'),
					'h_vp_less'  	=> $this->input->post('vp_less'),
					'h_pr'       	=> $this->input->post('pr'),
					'h_rate_per_room' => $this->input->post('rate_per_room'),
					
					'h_contract'    => $filename,
				);
				for($date = 1;$date <= 30;$date++){
					$date_loop = array(
						'val'.$date.'' => $this->input->post('val'.$date.''),
					);
					$this->db->set($date_loop);
					$this->db->where('id',$this->uri->segment(3));
					$this->db->update('hotels');
				}
				$this->db->set($data);
				$this->db->where('id',$this->uri->segment(3));
				$this->db->update('hotels');

				redirect('welcome/view_data?success='.$this->uri->segment(3).'');
			}
		}			
	}
	public function contract_success()
	{
		redirect('welcome/view_data?contract_details=added_success');
	}
	public function update_error(){
		$data['title'] = 'Add contract error';
		$data['content'] = 'pages/add_contract';
		
		$this->db->where('id',$this->uri->segment(3));
		$data['info'] = $this->db->get('hotels');
		
		$data['error'] = '<div id="error" class="form-group alert alert-danger" style="font-size: 13px;margin-top: 5%;">
					  <small>'.validation_errors().''.$this->upload->display_errors().'</small>
					  </div>';
					  
		//for last row
		$this->db->where('from_hotel',$this->uri->segment(3));
		$query = $this->db->get('added_rooms');
		$row = $query->last_row();
		if(empty($row->room_count))
		{
			$data['row_last'] = 1;
		}
		else
		{
			$data['row_last'] = $row->room_count;
		}
		
		$this->load->view('template/template',$data);
	}
	private function check()
	{
		if($this->session->userdata('logged_in')){
			return true;
		}
		else redirect('login');
	}
}