<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['count_user'] = $this->db->count_all('user');
        $data['count_customer'] = $this->db->count_all('customer');
        $data['count_tabungan'] = $this->db->count_all('tabungan');
        $data['count_transaksi'] = $this->db->count_all('transaksi');
        $data['content'] = 'home';
        $this->load->view('template/layout/base', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}

