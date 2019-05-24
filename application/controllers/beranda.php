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

    function pembelian(){
		$this->load->view('v_pembelian');
	}

    function produk(){
        $data = array('data'=>$this->m_bupe->ambil_data_produk());
        $this->load->view('v_produk',$data);
    }
    
    function transaksi_penjualan(){
        $this->load->view('v_transaksi-penjualan');
    }
    
    function transaksi_pembelian(){
        $this->load->view('v_transaksi-pembelian');
    }
    
    function pembayaran_piutang(){
        $data = array('data'=>$this->m_bupe->ambil_data_piutang());
        $this->load->view('v_pembayaran-piutang',$data);
    }

    function list_transaksi_penjualan(){
        $data = array('data'=>$this->m_bupe->ambil_data_penjualan());
        $this->load->view('v_list-transaksi-penjualan',$data);
    }
    
    function list_transaksi_pembelian(){
        $data = array('data'=>$this->m_bupe->ambil_data_pembelian());
        $this->load->view('v_list-transaksi-pembelian',$data);
    }
    
    function pengeluaran(){
        $data = array('data'=>$this->m_bupe->ambil_data_pengeluaran());
        $this->load->view('v_pengeluaran',$data);
    }
    
    function kontak_customer(){
        $data = array('data'=>$this->m_bupe->ambil_data_customer());
        $this->load->view('v_kontak-customer',$data);
    }
    
    function kontak_sales(){
        $data = array('data'=>$this->m_bupe->ambil_data_sales());
        $this->load->view('v_kontak-sales',$data);
    }
    
    function laporan_penjualan(){
        $data = array('data'=>$this->m_bupe->ambil_data_sales());
        $this->load->view('v_kontak-sales',$data);
    }
    
    function laporan_pembelian(){
        $data = array('data'=>$this->m_bupe->ambil_data_laporanpb());
        $this->load->view('v_laporan-pembelian',$data);
    }

}
?>