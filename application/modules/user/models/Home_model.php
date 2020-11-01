<?php
class Home_model extends CI_Model
{
    function get_data()
    {
        return null;
    }
    function data_rekomendasi()
    {
        return $this->db->get('kelola_normalisasi')->result();
    }
}
