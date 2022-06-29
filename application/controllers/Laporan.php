<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD','pdf');
		// $this->load->library('pdf');
		
	}

	public function _example_output($output = null)
	{
		$this->load->view('content_crud_admin',(array)$output);
	}
	

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
	public function grafik()
	{
		$this->load->view('content_grafik');
	}
	public function rekap_grafik() 
	{
		$this->load->view('rekap/rekap_grafik');
	}

	function format_num($value, $row){
		return 'Rp' .number_format($value, 0,",",".");
	}

	
	public function pegawai(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM pegawai where role = 'pegawai'");

		 $crud->set_table('pegawai');
		 $crud->set_subject('Data Pegawai');	
		 $crud->required_fields('username','password','nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','no_telepon','alamat','jabatan');

		$crud->change_field_type('password', 'password');
		
		 $crud->set_field_upload('foto','assets/uploads/images');

		$crud->field_type('role','hidden','pegawai');
 
		 $crud->unset_columns('role');
		 $crud->unset_operations();
				 
		 $output = $crud->render();
		$this->load->view('laporan/pegawai',(array)$output);
	}

	
	public function rekap_pegawai(){
		$data = array();
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from pegawai where role = 'pegawai' ORDER BY id ASC")->result();
		}else {
			$data['data']=$this->db->query("SELECT * from pegawai where role = 'pegawai' AND jabatan = '$filter' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_pegawai',$data);

	}

	
	public function kegiatan_pegawai(){
		$crud = new grocery_CRUD();
		$crud->set_table('kegiatan_pegawai');
		$crud->set_subject('Data Kegiatan Pegawai');	
		$crud->required_fields('kode_kegiatan','nik','nama','no_telepon','jabatan','nama_kegiatan','tanggal_kegiatan','tempat_kegiatan','alamat_kegiatan');

		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/kegiatan_pegawai',(array)$output);
	}

	
	public function rekap_kegiatan_pegawai(){
		$data = array();
		$bulan=$this->input->post('bulan');
	
		if ($bulan == 'Semua') {
			$data['data']=$this->db->query("SELECT * from kegiatan_pegawai ORDER BY id ASC")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from kegiatan_pegawai where tanggal_kegiatan LIKE '$bulan-%' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_kegiatan_pegawai',$data);

	}

	
	public function surat_masuk(){
		$crud = new grocery_CRUD();
		$crud->set_table('surat_masuk');
		$crud->set_subject('Data Surat Masuk');
		$crud->set_field_upload('lampiran','assets/uploads/images');

		// $crud->unset_operations();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$this->load->view('laporan/surat_masuk',(array)$output);
	}

	public function rekap_surat_masuk(){
		$data = array();
		$bulan=$this->input->post('bulan');
	
		if ($bulan == 'Semua') {
			$data['data']=$this->db->query("SELECT * from surat_masuk ORDER BY id ASC")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from surat_masuk where tanggal_surat LIKE '$bulan-%' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_surat_masuk',$data);

	}

	public function disposisi(){
		$crud = new grocery_CRUD();
		$crud->set_table('disposisi_surat');
		$crud->set_subject('Data Disposisi Surat Masuk');
		$crud->set_field_upload('lampiran','assets/uploads/images');

		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/disposisi',(array)$output);
	}

	public function rekap_disposisi(){
		$data = array();
		$bulan=$this->input->post('bulan');
	
		if ($bulan == 'Semua') {
			$data['data']=$this->db->query("SELECT * from disposisi_surat")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from disposisi_surat where tanggal_surat LIKE '$bulan-%'")->result();
		}

		$this->load->view('rekap/rekap_disposisi',$data);

	}

	public function surat_keluar(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		 
		$crud->basic_model->set_custom_query("SELECT * FROM surat_keluar where verifikasi='Diizinkan'");

		$crud->set_table('surat_keluar');
		$crud->set_subject('Data Surat Keluar');
		$crud->set_field_upload('lampiran','assets/uploads/images');

		// $crud->unset_operations();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$this->load->view('laporan/surat_keluar',(array)$output);
	}

	public function rekap_surat_keluar(){
		$data = array();
		$bulan=$this->input->post('bulan');
	
		if ($bulan == 'Semua') {
			$data['data']=$this->db->query("SELECT * from surat_keluar where verifikasi = 'Diizinkan'")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from surat_keluar where tanggal_surat LIKE '$bulan-%' AND verifikasi = 'Diizinkan'")->result();
		}

		$this->load->view('rekap/rekap_surat_keluar',$data);

	}

	public function surat_balasan(){
		$crud = new grocery_CRUD();
		$crud->set_table('surat_balasan');
		$crud->set_subject('Data Surat Balasan');

		// $crud->unset_operations();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$this->load->view('laporan/surat_balasan',(array)$output);
	}

	public function rekap_surat_balasan(){
		$data = array();
		$bulan=$this->input->post('bulan');
	
		if ($bulan == 'Semua') {
			$data['data']=$this->db->query("SELECT * from surat_balasan")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from surat_balasan where tanggal LIKE '$bulan-%'")->result();
		}
		$this->load->view('rekap/rekap_surat_balasan',$data);
	}

	public function filter_sppd(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		 
		$crud->basic_model->set_custom_query("SELECT * FROM sppd where verifikasi='Ya'");

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
		$this->load->view('laporan/sppd',(array)$output);
	}

	public function sppd(){
        $data['data']=$this->m_login->sppd($this->uri->segment(3));
        $this->load->view('rekap/sppd',$data);
	}

	// public function rekap_sppd(){
	// 		$data = array();
	// 		$tanggal1=$this->input->post('tanggal1');
	// 		$tanggal2=$this->input->post('tanggal2');
			
	// 		$data['data']=$this->db->query("SELECT * from sppd where tanggal_surat BETWEEN '$tanggal1' AND '$tanggal2' AND verifikasi = 'Ya' ORDER BY id ASC")->result();
			
	// 		$this->load->view('rekap/rekap_sppd',$data);
	// }

	public function rekap_sppd(){
		$data = array();
		$bulan=$this->input->post('bulan');
	
		if ($bulan == 'Semua') {
			$data['data']=$this->db->query("SELECT * from sppd where verifikasi = 'Ya'")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from sppd where tanggal_surat LIKE '$bulan-%' AND verifikasi = 'Ya'")->result();
		}

		$this->load->view('rekap/rekap_sppd',$data);

	}
	

	public function surat_tugas(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		 
		$crud->basic_model->set_custom_query("SELECT * FROM surat_tugas where verifikasi='Diizinkan'");

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
		$this->load->view('laporan/surat_tugas',(array)$output);
	}

	public function tugas(){
        $data['data']=$this->m_login->tugas($this->uri->segment(3));
        $this->load->view('rekap/tugas',$data);
	}

	// public function rekap_surat_tugas(){
	// 		$data = array();
	// 		$tanggal1=$this->input->post('tanggal1');
	// 		$tanggal2=$this->input->post('tanggal2');
			
	// 		$data['data']=$this->db->query("SELECT * from surat_tugas where tanggal_surat BETWEEN '$tanggal1' AND '$tanggal2' AND verifikasi = 'Diizinkan' ORDER BY id ASC")->result();
			
	// 		$this->load->view('rekap/rekap_surat_tugas',$data);
	// }

	public function rekap_surat_tugas(){
		$data = array();
		$bulan=$this->input->post('bulan');
	
		if ($bulan == 'Semua') {
			$data['data']=$this->db->query("SELECT * from surat_tugas where verifikasi = 'Diizinkan'")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from surat_tugas where tanggal_surat LIKE '$bulan-%' AND verifikasi = 'Diizinkan'")->result();
		}

		$this->load->view('rekap/rekap_surat_tugas',$data);

	}
	
	public function filter_surat_izin(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		 
		$crud->basic_model->set_custom_query("SELECT * FROM surat_izin where verifikasi='Diizinkan'");

		$crud->set_table('surat_izin');
		$crud->set_field_upload('lampiran','assets/uploads/images');
		$crud->add_action('Cetak Surat Izin',base_url('/assets/print.png'),'laporan/izin');

		// $crud->unset_operations();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$output->output = str_replace('title="Cetak Surat Izin"', 'title ="Cetak Surat Izin" target="_blank"', $output->output);
		$this->load->view('laporan/filter_surat_izin',(array)$output);
	}

	public function izin(){
        $data['data']=$this->m_login->izin($this->uri->segment(3));
        $this->load->view('rekap/izin',$data);
	}

	public function rekap_surat_izin(){
			$data = array();
			$tanggal1=$this->input->post('tanggal1');
			$tanggal2=$this->input->post('tanggal2');
			
			$data['data']=$this->db->query("SELECT * from surat_izin where tanggal_surat BETWEEN '$tanggal1' AND '$tanggal2' AND verifikasi = 'Diizinkan' ORDER BY id ASC")->result();
			
			$this->load->view('rekap/rekap_surat_izin',$data);
		}
	
	// public function filter_surat_izin(){
	// 	$crud = new grocery_CRUD();
	// 	$crud->set_table('surat_izin');
	// 	$crud->unset_columns(array('yang_memberi_izin','yang_meminta_izin','alamat_perintah','alamat_izin','nama_perintah','nama_izin','jabatan_perintah','alamat_perintah','nik_izin'));
		
	// 	$crud->set_field_upload('lampiran','assets/uploads/images');

		// $crud->unset_operations();
		// $crud->unset_add();
		// $crud->unset_delete();
		// $crud->unset_edit();
		// $crud->unset_print();
		// $crud->unset_clone();
		// $crud->unset_export();

	// 	$output = $crud->render();
	// 	$this->load->view('laporan/filter_surat_izin',(array)$output);
	// }
	
	// public function rekap_filter_surat_izin(){
	// 	$data = array();
	// 	$tahun=$this->input->post('tahun');
	
	// 	if ($tahun == 'semua') {
	// 		$data['data']=$this->db->query("SELECT * from surat_izin ORDER BY id ASC")->result();
	// 	}else {
	// 	$data['data']=$this->db->query("SELECT * from surat_izin where YEAR(tanggal_surat) =  '$tahun' ORDER BY id ASC")->result();
	// 	}
	// 	$this->load->view('rekap/rekap_filter_surat_izin',$data);
	// }

}
