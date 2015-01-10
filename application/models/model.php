<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination','upload');
		$config = $this->load->config('upload');
		$this->load->library('upload', $config);
	}

}
;?>