<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    private $table_teller = 'user';

    public function cekTeller($username)
    {
        return $this->db->get_where($this->table_teller, ['username' => $username])->row_array();
    }
}


/* End of file Auth_model.php and path \application\models\Auth_model.php */
