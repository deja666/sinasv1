<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
        // $this->load->model('user_model', 'User');
        $this->load->model('customer_model', 'Customer');
    }

    public function index()
    {
        $data['title'] = 'Data Customer';
        $data['customer'] = $this->Customer->select();
        $data['content'] = 'customer/view';
        $this->load->view('template/layout/base', $data);
    }
    

    public function add()
    {
        function generateRandomNIP() {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $nip = '';
            $length = 18;
        
            for ($i = 0; $i < $length; $i++) {
                $nip .= $characters[rand(0, strlen($characters) - 1)];
            }
        
            return $nip;
        }
        function generateRandomCIF() {
            $min = 10000000; 
            $max = 99999999; 
            return mt_rand($min, $max);
        }
        $nomorCIF = generateRandomCIF();
        $nomorNIP = generateRandomNIP();
        $data['nomorCIF'] = $nomorCIF;
        $data['nomorNIP'] = $nomorNIP;

        $data['title'] = 'Tambah Data Customer';
        $data['content'] = 'customer/add';
        $this->load->view('template/layout/base', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Ubah Data customer';
        $data['customer'] = $this->Customer->select_by_id($id);
        $data['content'] = 'customer/edit';
        $this->load->view('template/layout/base', $data);
    }

   
    public function create()
    {
        
        $data = [
            "nama_customer" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "tgl_lahir" => $this->input->post('lahir', true),
            "jk" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "nomorCIF" => $this->input->post('cif', true),
        ];
        $create = $this->Customer->insert($data);

        // Cek Apakah berhasil atau tidak
        if ($create) {
            $this->session->set_flashdata('berhasil', 'Data berhasil ditambahkan!');
            redirect('customer');
        }

        $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
        redirect('customer/add');
    }

    public function update()
    {
        $data = [
            "nama_customer" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "tgl_lahir" => $this->input->post('lahir', true),
            "jk" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "nomorCIF" => $this->input->post('cif', true),
            
        ];
        $update = $this->Customer->update($data, $this->input->post('id_customer', true));

        // Cek Apakah berhasil atau tidak
        if ($update) {
            $this->session->set_flashdata('berhasil', 'Data berhasil diubah!');
            redirect('customer');
        }

        $this->session->set_flashdata('gagal', 'Data gagal diubah!');
        redirect('customer/edit');
    }

    public function delete($id)
    {
        $this->Customer->delete($id);
        $this->session->set_flashdata('berhasil', 'Data berhasil dihapus!');
        redirect('customer');
    }
}

