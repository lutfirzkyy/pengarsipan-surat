<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homedinas extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //load model m_login
        $this->load->model('m_login');
        //cek session dan level user
        if($this->m_login->is_role() != 'kepala dinas'){
            redirect('login/');
        }
	}
	
	public function index()
	{
		
		$data['hitung_disposisi_surat'] = $this->m_login->hitung_disposisi_surat();
		$data['hitung_surat_keluar'] = $this->m_login->hitung_surat_keluar();
		$data['hitung_sppd'] = $this->m_login->hitung_sppd();
		$data['hitung_surat_tugas'] = $this->m_login->hitung_surat_tugas();
		$data['hitung_surat_izin'] = $this->m_login->hitung_surat_izin();
		$this->load->view('content_home_dinas',$data);
		// $this->load->view('content_home_dinas');
	}

	public function logout()
  {
   $this->session->sess_destroy();
   
   redirect('login');
  }
}
