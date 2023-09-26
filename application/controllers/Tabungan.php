<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabungan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
        // $this->load->model('user_model', 'User');
        $this->load->model('tabungan_model', 'Tabungan');
    }

    public function index()
    {
        $data['title'] = 'Data Tabungan';
        $data['tabungan'] = $this->Tabungan->select();
        $data['content'] = 'tabungan/view';
        $this->load->view('template/layout/base', $data);
    }

    public function add()
    {
        function generateRandomREK() {
            $min = 1000000000; 
            $max = 9999999999; 
            return mt_rand($min, $max);
        }
        $nomorREK=generateRandomREK();
        $data['nomorREK'] = $nomorREK;
        $data['cifs'] = $this->Tabungan->getAllCIFsWithFullName();

        $data['title'] = 'Tambah Data Tabungan';
        $data['content'] = 'tabungan/add';
        $this->load->view('template/layout/base', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah Data Tabungan';
        $data['tabungan'] = $this->Tabungan->select_by_id($id);
        $data['content'] = 'tabungan/edit';
        $this->load->view('template/layout/base', $data);
    }

    public function create()
    {
        $nomorCIF = $this->input->post('cif');
        $data = [
            "nama_tabungan" => $this->input->post('nama', true),
            "nomor_rek" => $this->input->post('rekening', true),
            "nomorCIF" => $nomorCIF,
            "tgl_pembukaan" => $this->input->post('buka', true),
            "saldo_terakhir" => $this->input->post('saldo', true),

        ];
        $create = $this->Tabungan->insert($data);

        // Cek Apakah berhasil atau tidak
        if ($create) {
            $this->session->set_flashdata('berhasil', 'Data berhasil ditambahkan!');
            redirect('tabungan');
        }

        $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
        redirect('tabungan/add');
    }

    public function update()
    {
        $data = [
            "nama_tabungan" => $this->input->post('nama', true),
            "tgl_penutupan" => $this->input->post('tutup', true),
        ];
        $update = $this->Tabungan->update($data, $this->input->post('id_tabungan', true));

        // Cek Apakah berhasil atau tidak
        if ($update) {
            $this->session->set_flashdata('berhasil', 'Data berhasil diubah!');
            redirect('tabungan');
        }

        $this->session->set_flashdata('gagal', 'Data gagal diubah!');
        redirect('tabungan/add');
    }

    public function delete($id)
    {
        $this->Tabungan->delete($id);
        $this->session->set_flashdata('berhasil', 'Data berhasil dihapus!');
        redirect('tabungan');
    }
}

