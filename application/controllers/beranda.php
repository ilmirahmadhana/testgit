<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Beranda extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("bukupenjualan"));
		}
	}
 
	function index(){
		$this->load->view('v_beranda');
	}
	function index(){
		$this->load->view('v_pembayaran-hutang');
	}
}

?>