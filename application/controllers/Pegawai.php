<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD','email');
		
	}

	public function _example_output($output = null)
	{
		$this->load->view('content_crud_pegawai',(array)$output);
	}
	

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function filter_sppd(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$id=$this->session->userdata("nik");
		$crud->basic_model->set_custom_query("SELECT * FROM sppd where nik = '$id' AND verifikasi='Ya'");

		$crud->set_table('sppd');
		$crud->set_subject('Data Surat Perintah Perjalanan Dinas');
		$crud->set_field_upload('lampiran','assets/uploads/images');
		$crud->add_action('Cetak Surat Perjalanan Dinas',base_url('/assets/print.png'),'laporan/sppd');

		// $crud->unset_operations();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$output->output = str_replace('title="Cetak Surat Perjalanan Dinas"', 'title ="Cetak Surat Perjalanan Dinas" target="_blank"', $output->output);
		$this->_example_output($output);
	}

	public function sppd(){
        $data['data']=$this->m_login->sppd($this->uri->segment(3));
        $this->load->view('rekap/sppd',$data);
	}

	

	public function surat_tugas(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$id=$this->session->userdata("nik");
		$crud->basic_model->set_custom_query("SELECT * FROM surat_tugas where nik = '$id' AND verifikasi='Diizinkan'");

		$crud->set_table('surat_tugas');
		$crud->set_subject('Data Surat Tugas');
		$crud->set_field_upload('lampiran','assets/uploads/images');
		$crud->add_action('Cetak Surat Tugas',base_url('/assets/print.png'),'laporan/tugas');

		// $crud->unset_operations();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$output->output = str_replace('title="Cetak Surat Tugas"', 'title ="Cetak Surat Tugas" target="_blank"', $output->output);
		$this->_example_output($output);
	}

	public function tugas(){
        $data['data']=$this->m_login->tugas($this->uri->segment(3));
        $this->load->view('rekap/tugas',$data);
	}

	
	public function logout()
	{
	 $this->session->sess_destroy();
	 
	 redirect('login');
	}
  


}
