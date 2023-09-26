<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
       
        $this->load->model('Mutasi_model', 'Mutasi');
    }

    public function index()
    {
        $data['title'] = 'Data Mutasi';
        $data['listNomorRekening'] = $this->Mutasi->getAllNomorRekening();
        $data['hasil'] = $this->Mutasi->getMutasiByNoRekening($this->input->get('norek'));
        $data['content'] = 'mutasi/view';
        $this->load->view('template/layout/base', $data);
    }

    

}

