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
    
    function ambil_data_piutang(){
        $query = $this->db->query("SELECT piutang.id_piutang,piutang.jml_hutang,piutang.tgl_jthtempo,piutang.ket,transaksi_pj.id_customer,customer.nm_customer FROM piutang INNER JOIN transaksi_pj ON piutang.id_piutang = transaksi_pj.id_piutang INNER JOIN customer ON transaksi_pj.id_customer = customer.id_customer WHERE jml_hutang > 0");
		//return $query->result();
		return $query->result_array();
    }
 
    function ambil_data_hutang(){
        $query = $this->db->query(" SELECT * FROM hutang WHERE jml_hutang > 0");
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
    function ambil_data_laporanpj(){
        $query = $this->db->query("SELECT * FROM transaksi_pj");
        //return $query->result();
        return $query->result_array();
    }
}
?>
