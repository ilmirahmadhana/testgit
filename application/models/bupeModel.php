<?php
class bupeModel extends CI_Model {
	
	function get_table(){
        return $this->db->get("tm_mahasiswa");
    }
    
	function get_prodi(){
		$query = $this->db->query("SELECT * FROM tm_prodi");
		//return $query->result();
		return $query->result_array();
	}
	
	function get_data(){
		$query = $this->db->query("SELECT * FROM tm_mahasiswa,tm_prodi,tm_gol WHERE tm_mahasiswa.tm_prodi_id = tm_prodi.id AND tm_mahasiswa.tm_gol_id = tm_gol.id");
		//return $query->result();
		return $query->result_array();
	}
	
	function get_gol(){
		$query = $this->db->query("SELECT * FROM tm_gol");
		//return $query->result();
		return $query->result_array();
	}
	
	function get_data_edit(){
        $nim = $_GET['nim'];
		$query = $this->db->query("SELECT * FROM tm_mahasiswa WHERE nim='$nim'");
		//return $query->result();
		return $query->result_array();
	}
	
	function input($data){
        //pemanggilan array pada controller
        $nim = $data['nim'];
        $nama = $data['nama'];
        $prodi = $data['tm_prodi_id'];
        $gol = $data['tm_gol_id'];
        //akhir pemanggilan array
		$query = $this->db->query("INSERT INTO tm_mahasiswa VALUES('$nim','$nama','$prodi','$gol')");
		//return $query->result();
		//return $query->result_array();
        return $query;
	}
	
	function delete(){
        $nim = $_GET['nim'];
		$query = $this->db->query("DELETE from tm_mahasiswa WHERE nim='$nim'");
        return $query;
	}
	
	function update($data){
        //pemanggilan array pada controller
        $nim = $data['nim'];
        $nama = $data['nama'];
        $prodi = $data['tm_prodi_id'];
        $gol = $data['tm_gol_id'];
        //akhir pemanggilan array
        $query = $this->db->query("UPDATE tm_mahasiswa SET nama='$nama',tm_prodi_id='$prodi',tm_gol_id='$gol' WHERE nim='$nim'");
        return $query;
	}
}