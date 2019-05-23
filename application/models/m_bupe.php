<?php
class M_bupe extends CI_Model{
    
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
	
}
=======
	}
    
    function ambil_data_produk(){
        $query = $this->db->query("SELECT * FROM produk");
		//return $query->result();
		return $query->result_array();
    }
}
?>
