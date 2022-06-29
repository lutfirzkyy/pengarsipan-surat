<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_model {

	function ambilPengguna()
    {
        return $this->session->userdata('user_id');
    }

    //fungsi cek level
    function is_role()
    {
        return $this->session->userdata('role');
    }

    //fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
	}

	public function tugas($id){
		$query = $this->db->query("SELECT * FROM surat_tugas WHERE id='$id'");
		return $result = $query->row_array();
    }

	public function izin($id){
		$query = $this->db->query("SELECT * FROM surat_izin WHERE id='$id'");
		return $result = $query->row_array();
    }
	public function sppd($id){
		$query = $this->db->query("SELECT * FROM sppd WHERE id='$id'");
		return $result = $query->row_array();
    }

	public function hitung_disposisi_surat()
	{   
    	$query = $this->db->query("SELECT * FROM disposisi_surat");
    		if($query->num_rows() > 0){
				return $query->num_rows();
			}else{
				return 0;
			}
	}

	public function hitung_sppd()
	{   

    	$query = $this->db->query("SELECT * FROM sppd where verifikasi = 'Belum Diverifikasi'");
    		if($query->num_rows() > 0){
				return $query->num_rows();
			}else{
				return 0;
			}
	}
	
	public function hitung_surat_keluar()
	{   

    	$query = $this->db->query("SELECT * FROM surat_keluar where verifikasi = 'Diajukan'");
    		if($query->num_rows() > 0){
				return $query->num_rows();
			}else{
				return 0;
			}
	}
	
	

	public function hitung_surat_tugas()
	{   

    	$query = $this->db->query("SELECT * FROM surat_tugas where verifikasi = 'Diajukan'");
    		if($query->num_rows() > 0){
				return $query->num_rows();
			}else{
				return 0;
			}
	}

	public function hitung_surat_izin()
	{   

    	$query = $this->db->query("SELECT * FROM surat_izin where verifikasi = 'Diajukan'");
    		if($query->num_rows() > 0){
				return $query->num_rows();
			}else{
				return 0;
			}
	}
	
}
