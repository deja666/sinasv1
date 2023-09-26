<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    private $table = 'transaksi';
    private $id = 'id_transaksi';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function select()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getAllRekeningWithOwner() {
        $query = $this->db->select('CONCAT(nomor_rek, " A.N ", nama_tabungan) as full_name')->get('tabungan');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }

    public function select_by_id($id)
    {
        return $this->db->get_where($this->table, [$this->id => $id])->row_array();
    }

    public function updateSaldo($nomorRekening, $jenisDebetKredit, $nominal)
    {
       
        $this->db->select('saldo_terakhir');
        $this->db->where('nomor_rek', $nomorRekening);
        $query = $this->db->get('tabungan');

        if ($query->num_rows() == 1) {
            $row = $query->row();
            $saldoTerakhir = $row->saldo_terakhir;

            
            if ($jenisDebetKredit == 'Debet') {
                $saldoBaru = $saldoTerakhir + $nominal;
            } elseif ($jenisDebetKredit == 'Kredit') {
                $saldoBaru = $saldoTerakhir - $nominal;
            } else {
                
                return false;
            }

           
            $this->db->where('nomor_rek', $nomorRekening);
            $this->db->update('tabungan', ['saldo_terakhir' => $saldoBaru]);

            return $saldoBaru; 
        }

        return false; 
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, [$this->id => $id]);
    }

}


