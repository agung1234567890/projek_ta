<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rekomendasi_laptop_model extends CI_Model
{
    function data_normalisasi()
    {
        return $this->db->get('kelola_normalisasi')->result();
    }
}

/* End of file Rekomendasi_laptop_model.php */
