<?php
class Dashboard_model extends CI_Model
{
    function data_admin()
    {
        return $this->db->from('admin')->count_all_results();;
    }
    function data_laptop()
    {
        return $this->db->from('laptop')->count_all_results();;
    }
    function data_kriteria()
    {
        return $this->db->from('kelola_kriteria')->count_all_results();;
    }
    function data_nilai()
    {
        return $this->db->from('kelola_subkriteria')->count_all_results();;
    }
}
