<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    private $table = 'customer';
    private $id = 'id_customer';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function select()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function select_by_id($id)
    {
        return $this->db->get_where($this->table, [$this->id => $id])->row_array();
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, [$this->id => $id]);
    }

    public function delete($id)
    {
        $this->db->delete($this->table, [$this->id => $id]);
    }
}

