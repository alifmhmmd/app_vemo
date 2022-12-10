<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
		$this->load->model('Akun_model');
	}
    
	public function index()
	{
        $data ['title'] = 'VEMO | Kelola Akun';
        $data ['akun'] = $this->Akun_model->getDataAkun();
        $data ['departemen'] = $this->Akun_model->getDepartemen();
        $data ['user_role'] = $this->Akun_model->getRole();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('akun/index', $data);
		$this->load->view('templates/footer');
	}

    public function tambah_data(){
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama'), true),
            'username' => htmlspecialchars($this->input->post('username'), true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'id_departemen' => htmlspecialchars($this->input->post('id_departemen'), true),
            'id_role' => htmlspecialchars($this->input->post('id_role'), true)
        ];
        // var_dump($data);die;
        $this->Akun_model->simpan($data);
        $this->session->set_flashdata('pesan', '  <div class="alert alert-success solid alert-dismissible fade show">
                                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                        </button>
                                                        <strong>Berhasil!</strong> Pengguna baru berhasil ditambahkan.
                                                    </div>'
                                    );
        redirect('akun');
    }
    
    public function hapus_data($id_user)
	{
		$this->Akun_model->hapus($id_user);
        $this->session->set_flashdata('pesan', '  <div class="alert alert-success solid alert-dismissible fade show">
                                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                        </button>
                                                        <strong>Berhasil!</strong> Data berhasil dihapus.
                                                    </div>'
                                    );
		redirect(base_url("akun"));
	}
}