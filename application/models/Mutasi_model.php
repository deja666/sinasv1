<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi_model extends CI_Model
{

    private $table = 'transaksi';
    private $id = 'id_transaksi';
    private $norek = 'nomor_rek';

    public function select()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function select_by_id($norek=null)
    {
        $this->db->select('nomor_rek');
        $this->db->from('transaksi');
        if (!empty($norek)) {
        $this->db->where('id_transaksi', $norek);
    }
    $this->db->order_by('transaksi.tgl_transaksi', 'DESC'); 
    return $this->db->get()->result();
    }

    public function getMutasiByNoRekening($nomor_rek)
{
    
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->where('nomor_rek', $nomor_rek);
    $this->db->order_by('tgl_transaksi', 'DESC'); 
    $query = $this->db->get();
    return $query->result_array();
}

public function getAllNomorRekening()
{
    $this->db->select('nomor_rek');
    $this->db->from('tabungan'); 
    $query = $this->db->get();
    
    $nomorRekening = $query->result_array();
    $listNomorRekening = array();
    foreach ($nomorRekening as $row) {
        $listNomorRekening[] = $row['nomor_rek'];
    }

    return $listNomorRekening;
}

}


/* End of file User_model.php and path \application\models\User_model.php */
