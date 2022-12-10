<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
		$this->load->model('Auth_model');
	}

    public function index()
	{
        
        $data ['title'] = 'VEMO | Login';
		$this->load->view('auth/index', $data);
	}

    public function do_login(){
        $username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($username) {
            //cek password
			if (password_verify($password, $user['password'])) {
				$data = [
					'nama' => $user['nama'],
					'username' => $user['username'],
					'id_departemen' => $user['id_departemen'],
					'id_role' => $user['id_role']
				];
                if ($user['id_role'] == 1) {
					$this->session->set_userdata($data);
					redirect(base_url('dashboard'));
				} else {
                    $this->session->set_userdata($data);
					redirect(base_url('persetujuan'));
                }
            }else{
				$this->session->set_flashdata('pesan', '  <div class="alert alert-danger solid alert-dismissible fade show">
                                                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                            </button>
                                                            <strong>Gagal!</strong> Password anda salah!!
                                                        </div>'
                                        );
			redirect('auth');
            }
        }else {
			$this->session->set_flashdata('pesan', '  <div class="alert alert-danger solid alert-dismissible fade show">
                                                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                            </button>
                                                            <strong>Gagal!</strong> Akun tidak ditemukan.
                                                        </div>'
                                        );
			redirect('auth');
        }
    }

    public function logout()
	{
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('id_departemen');
		$this->session->unset_userdata('id_role');

		$this->session->set_flashdata('pesan', '  <div class="alert alert-success solid alert-dismissible fade show">
                                                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                            </button>
                                                            <strong>Berhasil!</strong> Anda telah logout.
                                                        </div>'
                                        );
			redirect('auth');
	}
}