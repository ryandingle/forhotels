<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banks extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','calendar'));
		$this->load->library('pagination','upload');
		$this->load->config('pagination');
		$this->load->dbutil();
		$this->load->helper(array('date','file'));
		$this->load->model('model');
		//$this->check();
	}
	public function index()
	{
		show_404();
	}
	public function bank1()
	{
		$this->db->where('hotel_id',$this->uri->segment(3)/*$_POST['h_id']*/);
		$this->db->where('b_count',1);
		$data = $this->db->get('bank');
		
		echo json_encode($data->result());
	}
	public function bank2()
	{
		$this->db->where('hotel_id',$this->uri->segment(3)/*$_POST['h_id']*/);
		$this->db->where('b_count',2);
		$data = $this->db->get('bank');
		
		echo json_encode($data->result());
	}
	public function bank3()
	{
		$this->db->where('hotel_id',$this->uri->segment(3)/*$_POST['h_id']*/);
		$this->db->where('b_count',3);
		$data = $this->db->get('bank');
		
		echo json_encode($data->result());
	}
	public function bank4()
	{
		$this->db->where('hotel_id',$this->uri->segment(3)/*$_POST['h_id']*/);
		$this->db->where('b_count',4);
		$data = $this->db->get('bank');
		
		echo json_encode($data->result());
	}
	public function bank5()
	{
		$this->db->where('hotel_id',$this->uri->segment(3)/*$_POST['h_id']*/);
		$this->db->where('b_count',5);
		$data = $this->db->get('bank');
		
		echo json_encode($data->result());
	}
	private function check()
	{
		if(!$this->session->userdata('logged_in')) return false;
		else return true;
	}
}