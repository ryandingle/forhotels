<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$data['error'] = '';
						  	
		$data['title'] = 'For Hotels';
		$data['content'] = 'pages/choice';	
		$this->load->view('template/template',$data);
	}
	public function insert_room()
	{
		$data = array(
					'room_name'=>$this->security->xss_clean(strtoupper($this->uri->segment(3))),
					);
		$this->db->insert('room_types',$data);
	}
	public function getinserted_room()
	{
		$this->db->where('room_name',$this->security->xss_clean(strtoupper($this->uri->segment(3))));
		$get = $this->db->get('room_types');
		
		echo json_encode($get->result());
	}
	public function check_existing_room()
	{
		$this->db->where('room_name',$this->security->xss_clean(strtoupper($this->uri->segment(3))));
		$data = $this->db->get('room_types');
		
		echo json_encode($data->result());
	}
	public function get_rooms()
	{
		$this->db->order_by('room_name',"ASC");
		$room_append = $this->db->get('room_types');
		
		echo json_encode($room_append->result());
	}
	public function letter(){
		$data['title'] = 'View Datas';
		$data['content'] = 'pages/view_data';
	
		$config['base_url'] = base_url().'welcome/letter/'.$this->uri->segment(3).'/';
		$this->db->like('h_area_code',$this->uri->segment(3),'after');
		$config['total_rows'] = $this->db->get('hotels')->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['num_links'] = 3;
		
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		$this->db->like('h_area_code',$this->uri->segment(3),'after');
		$data['datas'] = $this->db->get('hotels', $config['per_page'],$this->uri->segment(4));
		$this->load->view('template/template',$data);
	}
	public function insert_data()
	{
		$data = array(
				'h_name'    =>$this->security->xss_clean($_POST['h_name']),
				'h_location'=>$this->security->xss_clean($_POST['h_location']),
				'h_contact' =>$this->security->xss_clean($_POST['h_contact']),
				'h_area_code'=>$this->security->xss_clean($_POST['h_area_code']),
				'h_email'   =>$this->security->xss_clean($_POST['h_email']),
				
				'b_acount1'  =>$this->security->xss_clean($_POST['b_acount1']),
				'b_name1'    =>$this->security->xss_clean($_POST['b_name1']),
				'b_number1'  =>$this->security->xss_clean($_POST['b_number1']),
				'b_count1'  =>$this->security->xss_clean($_POST['b_count1']),
				
				'b_acount2'  =>$this->security->xss_clean($_POST['b_acount2']),
				'b_name2'    =>$this->security->xss_clean($_POST['b_name2']),
				'b_number2'  =>$this->security->xss_clean($_POST['b_number2']),
				'b_count2'  =>$this->security->xss_clean($_POST['b_count2']),
				
				'b_acount3'  =>$this->security->xss_clean($_POST['b_acount3']),
				'b_name3'    =>$this->security->xss_clean($_POST['b_name3']),
				'b_number3'  =>$this->security->xss_clean($_POST['b_number3']),
				'b_count3'  =>$this->security->xss_clean($_POST['b_count3']),
				
				'b_acount4'  =>$this->security->xss_clean($_POST['b_acount4']),
				'b_name4'    =>$this->security->xss_clean($_POST['b_name4']),
				'b_number4'  =>$this->security->xss_clean($_POST['b_number4']),
				'b_count4'  =>$this->security->xss_clean($_POST['b_count4']),
				
				'b_acount5'  =>$this->security->xss_clean($_POST['b_acount5']),
				'b_name5'    =>$this->security->xss_clean($_POST['b_name5']),
				'b_number5'  =>$this->security->xss_clean($_POST['b_number5']),
				'b_count5'  =>$this->security->xss_clean($_POST['b_count5'])
		);
		$inserted = $this->db->insert('hotels', $data);
		
		$this->db->where('h_name',$this->security->xss_clean($_POST['h_name']));
		$get_data = $this->db->get('hotels');
		
		echo json_encode($get_data->result());
	}
	
	public function get_inserted()
	{
		$this->db->where('h_name',$this->security->xss_clean($this->uri->segment(3)));
		$get_data = $this->db->get('hotels');
		echo json_encode($get_data->result());
	}
	
	public function add_section()
	{
		$data['error'] = '';
						  	
		$data['title'] = 'Add Datas';
		$data['content'] = 'pages/insert_data';	
		$this->load->view('template/template',$data);
	}
	public function search_section()
	{
		$data['title'] = 'Search Datas';
		$data['content'] = 'pages/search_data';	
	
		$config['base_url'] = base_url().'welcome/view_data/';
		$config['total_rows'] = $this->db->get('hotels')->num_rows();
		$config['per_page'] = 10; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		$this->db->order_by('id','DESC');
		$data['datas'] = $this->db->get('hotels',$config['per_page'],$this->uri->segment(3));
		
		$this->load->view('template/template',$data);
	}
	
	public function get_edit()
	{
		$this->db->where('id',$this->uri->segment(3));
		$get = $this->db->get('hotels');
		
		$data['error'] = '';
						  	
		$data['title'] = 'Edit Data';
		$data['content'] = 'pages/edit_data';
		$data['sep'] = $get;	
		
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
	public function get_data()
	{
		$this->db->where('id',$this->uri->segment(3));
		$get = $this->db->get('hotels');
		echo json_encode($get->result());
	}
	
	public function update_seperate()
	{
		$a = $this->uri->segment(3);
		$b = $this->uri->segment(4);
		
		if($this->uri->segment(5) == 'update_hotel'){			
			$data = array(
				'new_room'	 => strtoupper($_POST['h_t_room']),
				'h_p_rate'   => $_POST['h_p_rate'],
				'h_c_rate'   => $_POST['contracted_rate'],
				'h_d_rate'   => $_POST['h_d_rate'],							
				'h_vp'       => $_POST['h_vp'],
				'h_vp_less'  => $_POST['h_vp_less'],
				'h_pr'       => $_POST['h_pr'],
				'h_n_payment'=> $_POST['h_n_payment'],	
				'h_rate_per_room'  => $_POST['h_rate_per_room'],
			);
			
			$this->db->where('from_hotel',$b);
			$this->db->where('room_count',$a);
			$this->db->set($data);
			$update = $this->db->update('added_rooms');
			
			for($date = 1;$date <= 30;$date++){
				$date_loop = array(
					'val'.$date.'' => $_POST['val'.$date.'']
				);
				$this->db->where('from_hotel',$b);
				$this->db->where('room_count',$a);
				$this->db->set($date_loop);
				$this->db->update('added_rooms');
			}
		}else{	
			$datas = array(
				'room_count' => $a,
				'from_hotel' => $b,
				'new_room'	 =>	$this->security->xss_clean(strtoupper($_POST['h_t_room'])),
				'h_p_rate'   => $this->security->xss_clean($_POST['h_p_rate']),
				'h_c_rate'   =>	$this->security->xss_clean($_POST['contracted_rate']),
				'h_d_rate'   =>	$this->security->xss_clean($_POST['h_d_rate']),							
				'h_vp'       =>	$this->security->xss_clean($_POST['h_vp']),
				'h_vp_less'  =>	$this->security->xss_clean($_POST['h_vp_less']),
				'h_pr'       =>	$this->security->xss_clean($_POST['h_pr']),
				'h_n_payment'=>	$this->security->xss_clean($_POST['h_n_payment']),	
				'h_rate_per_room'=>	$this->security->xss_clean($_POST['h_rate_per_room']),
			);
			//$this->db->set($datas);
			$insert = $this->db->insert('added_rooms',$datas);
			if($insert){
				for($date = 1;$date <= 30;$date++){
					$date_loop = array(
						'val'.$date.'' => $_POST['val'.$date.'']
					);
					$this->db->where('from_hotel',$b);
					$this->db->where('room_count',$a);
					$this->db->set($date_loop);
					$this->db->update('added_rooms');
				}
			}
		}
			
	}
	
	public function get_seperate()
	{
		$a = $this->uri->segment(3);
		$b = $this->uri->segment(4);
		
		$this->db->where('from_hotel',$b);
		$this->db->where('room_count',$a);
		$get = $this->db->get('added_rooms');
		
		echo json_encode($get->result());
	}
	
	public function update_edit()
	{
		$config = $this->load->config('upload');
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('h_name','Hotel Name','required|trim|xss_clean');
		$this->form_validation->set_rules('h_loc','Hotel Location','required|trim|xss_clean');
		$this->form_validation->set_rules('h_cont','Hotel Contact no.','required|trim|xss_clean');
		$this->form_validation->set_rules('h_email','Hotel email Address','required|trim|xss_clean');
		$this->form_validation->set_rules('h_p_rate','Published Rate','required|trim|xss_clean');
		$this->form_validation->set_rules('h_d_rate','Discount Rate','required|trim|xss_clean');
		$this->form_validation->set_rules('h_n_payment1','No of payment','required|trim|xss_clean');
		$this->form_validation->set_rules('h_t_room1','Type of room','required|trim|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			$this->update_error();
		}
		else
		{
			if (!$this->upload->do_upload())
			{
				$data = array(
					'h_name'   	 	=> $this->input->post('h_name'),
					'h_email'    	=> $this->input->post('h_email'),
					'h_contact'  	=> $this->input->post('h_cont'),
					'h_location' 	=> $this->input->post('h_loc'),
					'h_area_code' 	=> $this->input->post('h_area_code'),
					'h_inclusions' 	=> $this->input->post('h_inclusions'),
					'h_t_room'   	=> strtoupper($this->input->post('h_t_room1')),
					'h_n_payment'	=> $this->input->post('h_n_payment1'),
					'h_p_rate'   	=> $this->input->post('h_p_rate'),
					'h_c_rate'   	=> $this->input->post('contracted_rate'),
					'h_d_rate'   	=> $this->input->post('h_d_rate'),
					'h_rate_per_room'  => $this->input->post('rate_per_room'),
					'h_vp'       	=> $this->input->post('vp'),
					'h_vp_less'  	=> $this->input->post('vp_less'),
					'h_pr'       	=> $this->input->post('pr'),
				);
				
				for($banks = 1; $banks <= 5;$banks++){
					$banks_loop = array(							
						'b_acount'.$banks.''  	=> $this->input->post('b_acount'.$banks.''),
						'b_name'.$banks.''    	=> $this->input->post('b_name'.$banks.''),
						'b_number'.$banks.''  	=> $this->input->post('b_number'.$banks.''),
					);
					$this->db->set($banks_loop);
					$this->db->where('id',$this->uri->segment(3));
					$this->db->update('hotels');
				}
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
				redirect('welcome/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'?success='.$this->uri->segment(3).'');
			}
			else
			{
				$config = $this->load->config('upload');
				$this->load->library('upload', $config);
				$datas = $this->upload->data();
				$filename = $datas['file_name'];
				
				$data = array(
					'h_name'   	 	=> $this->input->post('h_name'),
					'h_email'    	=> $this->input->post('h_email'),
					'h_contact'  	=> $this->input->post('h_cont'),
					'h_location' 	=> $this->input->post('h_loc'),
					'h_area_code' 	=> $this->input->post('h_area_code'),
					'h_inclusions' 	=> $this->input->post('h_inclusions'),
					'h_t_room'   	=> strtoupper($this->input->post('h_t_room1')),
					'h_n_payment'	=> $this->input->post('h_n_payment1'),
					'h_contract'    => $filename,
					'h_p_rate'   	=> $this->input->post('h_p_rate'),
					'h_c_rate'   	=> $this->input->post('contracted_rate'),
					'h_d_rate'   	=> $this->input->post('h_d_rate'),
					'h_vp'       	=> $this->input->post('vp'),
					'h_vp_less'  	=> $this->input->post('vp_less'),
					'h_pr'       	=> $this->input->post('pr'),
					'h_rate_per_room'  => $this->input->post('rate_per_room'),
				);
				
				for($banks = 1; $banks <= 5;$banks++){
					$banks_loop = array(							
						'b_acount'.$banks.''  	=> $this->input->post('b_acount'.$banks.''),
						'b_name'.$banks.''    	=> $this->input->post('b_name'.$banks.''),
						'b_number'.$banks.''  	=> $this->input->post('b_number'.$banks.''),
					);
					$this->db->set($banks_loop);
					$this->db->where('id',$this->uri->segment(3));
					$this->db->update('hotels');
				}
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
				redirect('welcome/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'?success='.$this->uri->segment(3).'');
			}
			
		}			
	}
	public function update_data()
	{
		$data = array(
			'h_name'=>$_POST['h_name'],
			'h_location'=>$_POST['h_loc'],
			'h_contact'=>$_POST['h_cont'],
			'h_email'=>$_POST['h_email'],
			'h_p_rate'=>$_POST['h_p_rate'],
			'h_d_rate'=>$_POST['h_d_rate'],
			'h_c_rate'=>$_POST['h_c_rate'],
			'h_n_payment'=>$_POST['h_n_payment'],
			'h_t_room'=>$_POST['h_t_room'],
			'h_val'=>$_POST['h_val'],
			'h_income'=>$_POST['h_income'],
		);
		$this->db->set($data);
		$this->db->where('id',$this->uri->segment(3));
		$update = $this->db->update('hotels');
		echo json_encode($update->result());
	}
	public function live_data()
	{
		$this->db->order_by('id','DESC');
		$this->db->get('hotels');
	}
	public function view_data()
	{
		$data['title'] = 'View Datas';
		$data['content'] = 'pages/view_data';
	
		$config['base_url'] = base_url().'welcome/view_data/';
		$config['total_rows'] = $this->db->get('hotels')->num_rows();
		$config['per_page'] = 10; 
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		$this->db->order_by('id','DESC');
		$data['datas'] = $this->db->get('hotels',$config['per_page'],$this->uri->segment(3));
			
		$this->load->view('template/template',$data);
	}
	public function delete_data()
	{
		$this->db->where('id', $this->uri->segment(3));
		$data = $this->db->delete('hotels');
		
		$this->db->where('from_hotel', $this->uri->segment(3));
		$data = $this->db->delete('added_rooms');
		return true;
	}
	public function get_added_rooms()
	{
		$this->db->where('from_hotel',$this->uri->segment(3));
		$data = $this->db->get('added_rooms');
		echo json_encode($data->result());
	}
	public function get_search()
	{
		$this->db->like('h_name',$this->uri->segment(3));
		//$this->db->or_like('h_location',$this->uri->segment(3));
		//$this->db->order_by('h_name',"ASC");
		$data = $this->db->get('hotels',70);
		echo json_encode($data->result());
	}
	
	public function success(){
		$data['error'] = '<div id="error" class="form-group alert alert-success alert-dismissable" style="font-size: 13px;">
					  	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  Successfull added!
					  	  </div>';
							
		$data['title'] = 'For Hotels Sample';
		$data['content'] = 'pages/insert_data';	
		$this->load->view('template/template',$data);
	}
	public function call_error(){
		$data['error'] = '<div id="error" class="form-group alert alert-danger" style="font-size: 13px;">
					  <small>'.validation_errors().''.$this->upload->display_errors().'</small>
					  </div>';
							
		$data['title'] = 'For Hotels Sample';
		$data['content'] = 'pages/insert_data';	
		$this->load->view('template/template',$data);
	}
	public function update_error(){
		$this->db->where('id',$this->uri->segment(3));
		$get = $this->db->get('hotels');
		$data['error'] = '<div id="error" class="form-group alert alert-danger" style="font-size: 13px;">
					  <small>'.validation_errors().''.$this->upload->display_errors().'</small>
					  </div>';
							
		$data['title'] = 'Update error';
		$data['content'] = 'pages/edit_data';
		$data['sep'] = $get;	
		
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
	public function backup()
	{
		$prefs = array(     
				'format'      => 'zip',             
				'filename'    => date("Y-m-d-H-i-s").'hotel_backup.sql'
			  );


		$backup =& $this->dbutil->backup($prefs); 

		$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
		$save = 'admin_tool/databases/'.$db_name;
		write_file($save, $backup);
		$this->load->helper('download');
		force_download($db_name, $backup);
	}
	public function delete_added_room()
	{
		$this->db->where('room_count',$this->uri->segment(3));
		$this->db->where('from_hotel',$this->uri->segment(4));
		$this->db->delete('added_rooms');
		return true;
	}
	public function filtered(){
		$from = $this->input->post('start');
		$end =  $this->input->post('end');
		if($from > 100 or $end > 100){
			$data['filterror'] = '<div class="alert alert-warning">Unable to complete request! max percentage(%) is 100<br></div>';
		}else if($from == '' or $end == ''){
			$data['filterror'] = '';
			$from = 0;
			$end  =  100;
		}else if(!is_numeric($from) or !is_numeric($end)){
			$data['filterror'] = '<div class="alert alert-warning">Unable to complete request!<br></div>';
		}
		else{
			$data['filterror'] = '';
		}
		//else{
			$data['title'] = 'View Datas | Fitered';
			$data['content'] = 'pages/view_data_filtered';
		
			$config['base_url'] = base_url().'welcome/filtered/';
			$config['per_page'] = 10; 
			$this->db->where("h_d_rate BETWEEN ".$from." AND ".$end."");
			$config['total_rows'] = $this->db->get('hotels')->num_rows();
			$config['uri_segment'] = 3;
			$config['num_links'] = 3;
			
			$this->pagination->initialize($config);
			
			$data['links'] = $this->pagination->create_links();
			
			$data['from'] = $from;
			$data['end'] = $end;
			$data['links'] = $this->pagination->create_links();
			$this->db->order_by('id','DESC');
			$this->db->where("h_d_rate BETWEEN ".$from." AND ".$end."");
			$data['datas'] = $this->db->get('hotels',$config['per_page'],$this->uri->segment(3));
				
			$this->load->view('template/template',$data);
		//}
		
	}
	public function acount(){
		$data['title'] = 'My acount | Admin';
		$data['content'] = 'pages/acount';
		$this->load->view('template/template',$data);
	}
	public function get_acount(){
		$this->db->where('id',$this->uri->segment(3));
		$get = $this->db->get('user');
		echo json_encode($get->result());
	}
	public function update_acount(){
		$data = array(
			'fullname'=>$this->security->xss_clean($_POST['fullname']),
			'username'=>$this->security->xss_clean($_POST['username']),
			'password'=>sha1($this->security->xss_clean($_POST['password'])),
		);
		$this->db->where('id',$this->uri->segment(3));
		$this->db->set($data);
		$this->db->update('user');
	}
	
	public function file_viewer()
	{
		$this->load->view('ViewerJS-latest/index');
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		//$this->rememberme->deleteCookie();
		delete_cookie('ci_session');
		$random = rand(000000,1234567790);
		redirect(base_url().'?logout=true?id='.sha1($random."wala lang pampa aning lang").'?secret_id=delete?cookie=deleted?session='.sha1($random."wala lang pampa aning lang").'','refresh');
	}
	private function check()
	{
		if($this->session->userdata('logged_in')){
			return true;
		}
		else redirect('login');
	}
}