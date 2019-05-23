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
 
		$this->load->view('v_beranda');
	}
<<<<<<< HEAD
	function pengeluaran(){
		$this->load->view('v_pengeluaran');
	}
=======
<<<<<<< .merge_file_a12028
    
    function produk(){
        $data = array('data'=>$this->m_bupe->ambil_data_produk());
        $this->load->view('v_produk',$data);
    }
}

=======
>>>>>>> daff0689968de2ec034d4c3c320fc3cc8c3b310c
	}
>>>>>>> .merge_file_a01628
?>