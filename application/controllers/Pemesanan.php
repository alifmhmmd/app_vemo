<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    function __construct(){
		parent::__construct();
        is_not_login();
        $this->load->library('form_validation');
        $this->load->library('session');
		$this->load->model('Pemesanan_model');
	}
	public function index()
	{
        $data ['title'] = 'VEMO | Pemesanan';
        $data ['pemesanan'] = $this->Pemesanan_model->getDataPemesanan();
        $data ['departemen'] = $this->Pemesanan_model->getDepartemen();
        $data ['kendaraan'] = $this->Pemesanan_model->getKendaraan();
        $data ['status_pemesanan'] = $this->Pemesanan_model->getStatusPemesanan();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('pemesanan/index', $data);
		$this->load->view('templates/footer');
	}

    public function tambah_data(){
        $data = [
            'kode_pemesanan' => $this->input->post('kode_pemesanan'),
            'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan'),
            'nama_pemesan' => $this->input->post('nama_pemesan'),
            'id_departemen' => $this->input->post('id_departemen'),
            'no_handphone' => $this->input->post('no_handphone'),
            'id' => $this->input->post('id'),
            'driver' => $this->input->post('driver'),
            'id_status_pemesanan' => 1
        ];
        // var_dump($data);die;
        $this->Pemesanan_model->simpan($data);
        $this->session->set_flashdata('pesan', '  <div class="alert alert-success solid alert-dismissible fade show">
                                                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                            </button>
                                                            <strong>Berhasil!</strong> Data berhasil ditambahkan.
                                                        </div>'
                                        );
        redirect(base_url("pemesanan"));
    }
    
    public function hapus_data($id_pemesanan)
	{
		$this->Pemesanan_model->hapus($id_pemesanan);
        $this->session->set_flashdata('pesan', '  <div class="alert alert-success solid alert-dismissible fade show">
                                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                        </button>
                                                        <strong>Berhasil!</strong> Data berhasil dihapus.
                                                    </div>'
                                    );
		redirect(base_url("pemesanan"));
	}

    public function edit_data($id_pemesanan)
    {
        $data = [
            'id_pemesanan' => $this->input->post('id_pemesanan'),
            'kode_pemesanan' => $this->input->post('kode_pemesanan'),
            'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan'),
            'nama_pemesan' => $this->input->post('nama_pemesan'),
            'id_departemen' => $this->input->post('id_departemen'),
            'no_handphone' => $this->input->post('no_handphone'),
            'id' => $this->input->post('id'),
            'driver' => $this->input->post('driver'),
            'id_status_pemesanan' => $this->input->post('id_status_pemesanan')
        ];
        $this->Pemesanan_model->update($id_pemesanan, $data);
        $this->session->set_flashdata('pesan', '  <div class="alert alert-success solid alert-dismissible fade show">
                                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                        </button>
                                                        <strong>Berhasil!</strong> Data berhasil diubah.
                                                    </div>'
                                    );
        redirect(base_url("pemesanan"));
    }
}
