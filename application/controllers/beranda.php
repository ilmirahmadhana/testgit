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
<<<<<<< HEAD
    
=======
	function pengeluaran(){
		$data = array('data'=>$this->m_bupe->ambil_data_pengeluaran());
		$this->load->view('v_pengeluaran',$data);
	}

    function pembelian(){
		$this->load->view('v_pembelian');
	}
>>>>>>> 73d7f8038040a55d4fc712b7cc135e7becb96e83
    function produk(){
        $data = array('data'=>$this->m_bupe->ambil_data_produk());
        $this->load->view('v_produk',$data);
    }
<<<<<<< HEAD
    
    function pengeluaran(){
        $data = array('data'=>$this->m_bupe->ambil_data_pengeluaran());
        $this->load->view('v_pengeluaran',$data);
    }
=======

>>>>>>> 73d7f8038040a55d4fc712b7cc135e7becb96e83
}
?>