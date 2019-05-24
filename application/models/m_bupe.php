<?php
class M_bupe extends CI_Model{
    
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
    
    function ambil_data_produk(){
        $query = $this->db->query("SELECT * FROM produk");
		//return $query->result();
		return $query->result_array();
    }
    
    function ambil_data_penjualan(){
        $query = $this->db->query("SELECT * FROM transaksi_pj");
		//return $query->result();
		return $query->result_array();
    }
    
    function ambil_data_pembelian(){
        $query = $this->db->query("SELECT * FROM transaksi_pb");
		//return $query->result();
		return $query->result_array();
    }
    
    function ambil_data_pengeluaran(){
        $query = $this->db->query("SELECT * FROM pengeluaran");
		//return $query->result();
		return $query->result_array();
    }

    function ambil_data_customer(){
        $query = $this->db->query("SELECT * FROM customer");
		//return $query->result();
		return $query->result_array();
    }
    
    function ambil_data_sales(){
        $query = $this->db->query("SELECT * FROM sales");
		//return $query->result();
		return $query->result_array();
    }
    function ambil_data_laporanpb(){
        $query = $this->db->query("SELECT * FROM transaksi_pb");
        //return $query->result();
        return $query->result_array();
    }

}
?>
