<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kendaraan extends CI_Controller {

    function __construct(){
		parent::__construct();
        is_not_login();
        $this->load->library('form_validation');
        $this->load->library('session');
		$this->load->model('Kendaraan_model');
	}

	public function index()
	{
        $data ['title'] = 'VEMO | Kendaraan';
        $data ['kendaraan'] = $this->Kendaraan_model->getDataKendaraan();
        $data ['jenis_kendaraan'] = $this->Kendaraan_model->getJenisKendaraan();
        $data ['tipe_kendaraan'] = $this->Kendaraan_model->getTipeKendaraan();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('kendaraan', $data);
		$this->load->view('templates/footer');
	}

    public function tambah_data(){
        $data = [
            'nama_kendaraan' => $this->input->post('nama_kendaraan'),
            'plat_nomor' => $this->input->post('plat_nomor'),
            'id_jenis_kendaraan' => $this->input->post('id_jenis_kendaraan'),
            'id_tipe_kendaraan' => $this->input->post('id_tipe_kendaraan'),
            'jumlah_konsumsi_bbm' => $this->input->post('jumlah_konsumsi_bbm'),
            'jadwal_servis' => $this->input->post('jadwal_servis')
        ];
        // var_dump($data);die;
        $this->Kendaraan_model->simpan($data);
        $this->session->set_flashdata('pesan', '  <div class="alert alert-success solid alert-dismissible fade show">
                                                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                            </button>
                                                            <strong>Berhasil!</strong> Data berhasil ditambahkan.
                                                        </div>'
                                        );
        redirect(base_url("kendaraan"));
    }

    public function hapus_data($id)
	{
		$this->Kendaraan_model->hapus($id);
        $this->session->set_flashdata('pesan', '  <div class="alert alert-success solid alert-dismissible fade show">
                                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                        </button>
                                                        <strong>Berhasil!</strong> Data berhasil dihapus.
                                                    </div>'
                                    );
		redirect(base_url("kendaraan"));
	}

    public function edit_data($id)
    {
        $data = [
            'id' => $this->input->post('id'),
            'nama_kendaraan' => $this->input->post('nama_kendaraan'),
            'plat_nomor' => $this->input->post('plat_nomor'),
            'id_jenis_kendaraan' => $this->input->post('id_jenis_kendaraan'),
            'id_tipe_kendaraan' => $this->input->post('id_tipe_kendaraan'),
            'jumlah_konsumsi_bbm' => $this->input->post('jumlah_konsumsi_bbm'),
            'jadwal_servis' => $this->input->post('jadwal_servis')
        ];
        $this->Kendaraan_model->update($id, $data);
        $this->session->set_flashdata('pesan', '  <div class="alert alert-success solid alert-dismissible fade show">
                                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                        </button>
                                                        <strong>Berhasil!</strong> Data berhasil diubah.
                                                    </div>'
                                    );
        redirect(base_url("kendaraan"));
    }


    public function update($id, $data)
    {
        return $this->db->update('kendaraan', $data, array('id' => $id));
    }

    public function export_data_excel()
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Data Kendaraan - VEMO');

        foreach (range('A','I') as $coulumnID) {
            $spreadsheet->getActiveSheet()->getColumnDimensions($coulumnID);
        }

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Nama Kendaraan');
        $sheet->setCellValue('C3', 'Plot Nomor');
        $sheet->setCellValue('D3', 'Jenis Kendaraan');
        $sheet->setCellValue('E3', 'Tipe Kendaraan');
        $sheet->setCellValue('F3', 'Jumlah Konsumsi BBM');
        $sheet->setCellValue('G3', 'Jadwal Servis');

        $data = $this->Kendaraan_model->getDataKendaraan();
        $x= 4;
        foreach ($data as $row) {
            $no=1;
            $sheet->setCellValue('A'.$x, $no);
            $sheet->setCellValue('B'.$x, $row['nama_kendaraan']);
            $sheet->setCellValue('C'.$x, $row['plat_nomor']);
            $sheet->setCellValue('D'.$x, $row['jenis_kendaraan']);
            $sheet->setCellValue('E'.$x, $row['tipe_kendaraan']);
            $sheet->setCellValue('F'.$x, $row['jumlah_konsumsi_bbm']);
            $sheet->setCellValue('G'.$x, $row['jadwal_servis']);
            $no++;
            $x++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'data_kendaraan.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename= "'.$filename.'"');
        $writer->save('php://output');
        redirect(base_url("kendaraan"));
    }
}
