<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukupenjualan extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        //load model bupeModel
        $this->load->model('m_bupe');
    }
    
	function index(){
		$this->load->view('v_login');
    }
		  
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->m_bupe->cek_login("user",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("beranda"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('bukupenjualan'));
	}
    
    function beranda(){
        $this->load->view('beranda');
    }
    
    function lupa_password(){
        $this->load->view('lupa-password');
    }
    
    function buat_akun(){
        $this->load->view('buat-akun');
    }
    
}
?>