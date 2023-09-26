<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
        // $this->load->model('user_model', 'User');
        $this->load->model('Transaksi_model', 'Transaksi');
    }

    public function index()
    {
        $data['title'] = 'Data Transaksi';
        $data['transaksi'] = $this->Transaksi->select();
        $data['content'] = 'transaksi/view';
        $this->load->view('template/layout/base', $data);
    }

    public function add()
    {
        $data['nomorRekening'] = $this->Transaksi->getAllRekeningWithOwner();
        $data['title'] = 'Tambah Data Transaksi';
        $data['content'] = 'transaksi/add';
        $this->load->view('template/layout/base', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah Data Transaksi';
        $data['transaksi'] = $this->Transaksi->select_by_id($id);
        $data['content'] = 'transaksi/edit';
        $this->load->view('template/layout/base', $data);
    }

    public function create()
    {
    $jenisTransaksi = $this->input->post('jenis');
    $nomorRekening = $this->input->post('rekening');
    $nominal = $this->input->post('nominal');
    $tanggalTransaksi = $this->input->post('tgl');
    $jenisDebetKredit = $this->input->post('dk');

    $dataTransaksi = [
        'jenis' => $jenisTransaksi,
        'nomor_rek' => $nomorRekening,
        'nominal' => $nominal,
        'tgl_transaksi' => $tanggalTransaksi,
        'debet_kredit' => $jenisDebetKredit
    ];

    $createTransaksi = $this->Transaksi->insert($dataTransaksi);

    if (!$createTransaksi) {
        $this->session->set_flashdata('gagal', 'Data transaksi gagal ditambahkan!');
        redirect('transaksi/add');
    }

    $saldoAkhir = $this->Transaksi->updateSaldo($nomorRekening, $jenisDebetKredit, $nominal);

    if ($saldoAkhir !== false) {
        $this->session->set_flashdata('berhasil', 'Data transaksi berhasil ditambahkan!');
        redirect('transaksi');
    } else {
        $this->session->set_flashdata('gagal', 'Data transaksi gagal ditambahkan!');
        redirect('transaksi/add');
    }
    }

    public function update()
    {
        $data = [
            "jenis" => $this->input->post('jenis', true),
            "debet_kredit" => $this->input->post('dk', true),
        ];
        $update = $this->Transaksi->update($data, $this->input->post('id_transaksi', true));

        // Cek Apakah berhasil atau tidak
        if ($update) {
            $this->session->set_flashdata('berhasil', 'Data berhasil diubah!');
            redirect('transaksi');
        }

        $this->session->set_flashdata('gagal', 'Data gagal diubah!');
        redirect('transaksi/edit');
    }

}

