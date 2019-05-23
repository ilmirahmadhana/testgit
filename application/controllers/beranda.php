<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Beranda extends CI_Controller{
 
	function __construct(){
        parent::__construct();
	    //load model bupeModel
        $this->load->model('m_bupe');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("bukupenjualan"));
		}
	}
 
	function index(){
		$this->load->view('v_beranda');
	}
    
    function produk(){
        $data = array('data'=>$this->m_bupe->ambil_data_produk());
        $this->load->view('v_produk',$data);
    }
}

?>