<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
		parent::__construct();
        is_not_login();
        $this->load->library('form_validation');
        $this->load->library('session');
		$this->load->model('Dashboard_model');
	}
    
	public function index()
	{
        $data ['title'] = 'VEMO | Dashboard';
        $data ['jumlah_kendaraan'] = $this->Dashboard_model->getJumlahKendaraan();
        $data ['jumlah_pemesanan'] = $this->Dashboard_model->getJumlahPemesanan();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}
}