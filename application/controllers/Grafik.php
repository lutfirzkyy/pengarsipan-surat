<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->database();
        $this->load->model('m_login');
		$this->load->helper('url');
        }
	
	public function index()
	{
		$this->load->view('content_grafik');
	}

}
