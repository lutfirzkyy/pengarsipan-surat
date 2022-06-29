<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dinas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD','email');
		
	}

	public function _example_output($output = null)
	{
		$this->load->view('content_crud_dinas',(array)$output);
	}
	

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
	
	function cek_no_surat_masuk($post_array){
		$no_surat= $post_array['no_surat'];
		$i = $this->db->query("SELECT * FROM surat_masuk where no_surat = '$no_surat'")->num_rows();
		if($i == 0 ){
		 return true;
		}else{
		 return false;
		}
	}

	
	public function disposisi_surat(){
		$crud = new grocery_CRUD();
		 $crud->set_table('disposisi_surat');
		 $crud->set_subject('Data Disposisi Surat Masuk');	
		 $crud->required_fields('no_surat','tanggal_surat','pengirim','perihal','sifat','tanggal_disposisi','isi_disposisi');
		 
		 $crud->callback_add_field('no_surat',function(){
			return '  <input type="text" id="no_surat" readonly name="no_surat"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#disposisiModal"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('no_surat',function($value, $primary_key){
			return '  <input type="text" id="no_surat" readonly value="'.$value.'" name="no_surat"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#disposisiModal"><b>Cari Data</b></button>';});
		
			$crud->callback_add_field('tanggal_surat',function(){
				return '  <input type="text" id="tanggal_surat" readonly name="tanggal_surat" style="height: 40px;">';});
				
			$crud->callback_edit_field('tanggal_surat',function($value, $primary_key){
				return '  <input type="text" id="tanggal_surat" readonly value="'.$value.'" name="tanggal_surat" style="height: 40px;">';});
	
			$crud->callback_add_field('pengirim',function(){
				return '  <input type="text" id="pengirim" readonly name="pengirim" style="height: 40px; width: 500px;">';});
				
			$crud->callback_edit_field('pengirim',function($value, $primary_key){
				return '  <input type="text" id="pengirim" readonly value="'.$value.'" name="pengirim" style="height: 40px; width: 500px;">';});
		
			$crud->callback_add_field('perihal',function(){
				return '  <input type="text" id="perihal" readonly name="perihal" style="height: 40px; width: 500px;">';});
				
			$crud->callback_edit_field('perihal',function($value, $primary_key){
				return '  <input type="text" id="perihal" readonly value="'.$value.'" name="perihal" style="height: 40px; width: 500px;">';});
	
			$crud->callback_add_field('sifat',function(){
				return '  <input type="text" id="sifat" readonly name="sifat" style="height: 40px; width: 500px;">';});
				
			$crud->callback_edit_field('sifat',function($value, $primary_key){
				return '  <input type="text" id="sifat" readonly value="'.$value.'" name="sifat" style="height: 40px; width: 500px;">';});
		
				$crud->unset_print();
				$crud->unset_clone();
				$crud->unset_export();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}

	public function verifikasi_ya($id){
		$ganti = array(
				"verifikasi" => 'Diizinkan',
			);
		$this->db->update('surat_keluar',$ganti,array('id' => $id));
		Redirect('dinas/surat_keluar');
	}
	
	public function verifikasi_tidak($id){
		$ganti = array(
				"verifikasi" => 'Tidak Diizinkan',
			);
		$this->db->update('surat_keluar',$ganti,array('id' => $id));
		Redirect('dinas/surat_keluar');
	}

	public function surat_keluar(){
		$crud = new grocery_CRUD();
		$crud->set_table('surat_keluar');
		$crud->set_subject('Data Surat Keluar');	
		$crud->required_fields('no_surat','tujuan','tanggal_surat','tanggal_terima','sifat','perihal');
		$crud->field_type('sifat','enum',array('BIASA', 'RAHASIA', 'SANGAT RAHASIA', 'SEGERA', 'PENTING'));

		// $crud->field_type('verifikasi','enum',array('Diajukan','Diizinkan','Tidak Diizinkan'));

		$crud->add_action('Verifikasi Ya',base_url('/assets/setuju.png'),'dinas/verifikasi_ya');
		$crud->add_action('Verifikasi Tidak',base_url('/assets/cancel.png'),'dinas/verifikasi_tidak');
		
		$crud->set_field_upload('lampiran','assets/uploads/images');

		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$this->_example_output($output);
	}

	public function sppd_verifikasi_ya($id){
		$ganti = array(
				"verifikasi" => 'Ya',
			);
		$this->db->update('sppd',$ganti,array('id' => $id));
		Redirect('dinas/sppd');
	}
	
	public function sppd_verifikasi_tidak($id){
		$ganti = array(
				"verifikasi" => 'Tidak',
			);
		$this->db->update('sppd',$ganti,array('id' => $id));
		Redirect('dinas/sppd');
	}

	public function sppd(){
		$crud = new grocery_CRUD();
		$crud->set_table('sppd');
		$crud->set_subject('Data Surat Perintah Perjalanan Dinas');	
		$crud->required_fields('no_surat','tanggal_surat','tujuan','maksud','lampiran','tanggal_berangkat','tanggal_kembali','keperluan');
		
		$crud->field_type('verifikasi','enum',array('Belum Diverifikasi','Ya','Tidak'));
		$crud->set_field_upload('lampiran','assets/uploads/images');

		$crud->add_action('SPPD Verifikasi Ya',base_url('/assets/setuju.png'),'dinas/sppd_verifikasi_ya');
		$crud->add_action('SPPD Verifikasi Tidak',base_url('/assets/cancel.png'),'dinas/sppd_verifikasi_tidak');

		$crud->unset_columns('tanggal_surat');

		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_read();
		$crud->unset_delete();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$this->_example_output($output);
	}
	
	public function tugas_verifikasi_ya($id){
		$ganti = array(
				"verifikasi" => 'Diizinkan',
			);
		$this->db->update('surat_tugas',$ganti,array('id' => $id));
		Redirect('dinas/surat_tugas');
	}
	
	public function tugas_verifikasi_tidak($id){
		$ganti = array(
				"verifikasi" => 'Tidak Diizinkan',
			);
		$this->db->update('surat_tugas',$ganti,array('id' => $id));
		Redirect('dinas/surat_tugas');
	}

	public function surat_tugas(){
		$crud = new grocery_CRUD();
		$crud->set_table('surat_tugas');
		$crud->set_subject('Data Surat Tugas');	
		$crud->required_fields('no_surat','tanggal_surat','tujuan','maksud','lampiran','tanggal_berangkat','tanggal_kembali','keperluan');
		
		$crud->field_type('verifikasi','enum',array('Diajukan','Diizinkan','Tidak Diizinkan'));

		$crud->callback_edit_field('no_surat',function($value, $primary_key){
			return '  <input type="text" id="no_surat" readonly value="'.$value.'" name="no_surat" style="height: 40px; width: 500px;">';});

		$crud->add_action('Tugas Verifikasi Ya',base_url('/assets/setuju.png'),'dinas/tugas_verifikasi_ya');
		$crud->add_action('Tugas Verifikasi Tidak',base_url('/assets/cancel.png'),'dinas/tugas_verifikasi_tidak');
			

		$crud->set_field_upload('lampiran','assets/uploads/images');
		
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_read();
		$crud->unset_delete();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$this->_example_output($output);
	}

	public function surat_izin(){
		$crud = new grocery_CRUD();
		$crud->set_table('surat_izin');
		$crud->set_subject('Data Surat Izin');	
		$crud->required_fields('no_surat','tanggal_surat','tanggal_terima','nik','nama','tanggal_berangkat','jabatan','tanggal_mulai_izin','tanggal_selesai_izin','tanggal_mulai_izin');

		$crud->field_type('verifikasi','enum',array('Diajukan','Diizinkan','Tidak Diizinkan'));
		
		$crud->callback_edit_field('no_surat',function($value, $primary_key){
			return '  <input type="text" id="no_surat" readonly value="'.$value.'" name="no_surat" style="height: 40px; width: 500px;">';});
			

		$crud->set_field_upload('lampiran','assets/uploads/images');
		
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$this->_example_output($output);
	}

	////////batas
	public function logout()
	{
	 $this->session->sess_destroy();
	 
	 redirect('login');
	}
  


}
