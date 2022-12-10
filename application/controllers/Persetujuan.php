<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persetujuan extends CI_Controller {

    function __construct(){
		parent::__construct();
        is_not_login();
        $this->load->library('form_validation');
        $this->load->library('session');
		$this->load->model('Persetujuan_model');
	}

	public function index()
	{
        $data ['title'] = 'VEMO | Persetujuan';
        $data ['persetujuan'] = $this->Persetujuan_model->getDataPersetujuan();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('persetujuan/index', $data);
		$this->load->view('templates/footer');
	}

    public function edit_data($id_pemesanan)
    {
        $data = [
            'id_status_pemesanan' => 2
        ];
        $this->Persetujuan_model->update($id_pemesanan, $data);
        $this->session->set_flashdata('pesan', '  <div class="alert alert-success solid alert-dismissible fade show">
                                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                        </button>
                                                        <strong>Berhasil!</strong> Data berhasil diubah.
                                                    </div>'
                                    );
        redirect(base_url("persetujuan"));
    }
}