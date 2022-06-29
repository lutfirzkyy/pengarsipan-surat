<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeAdmin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //load model m_login
        $this->load->model('m_login');
        //cek session dan level user
        if($this->m_login->is_role() != 'admin'){
            redirect('login/');
        }
	}
	
	public function index()
	{
		
		// $data['total_karyawan'] = $this->m_login->hitung_karyawan();
		// $data['total_pendapatan'] = $this->m_login->hitung_pendapatan();
		// $data['total_pembayaran'] = $this->m_login->hitung_pembayaran();
		// $data['total_pengeluaran'] = $this->m_login->hitung_pengeluaran();
		// $data['total_hutang'] = $this->m_login->hitung_hutang();
		// $this->load->view('content_home_admin',$data);
		$this->load->view('content_home_admin');
	}

	public function logout()
  {
   $this->session->sess_destroy();
   
   redirect('login');
  }
}
