<?php
class Master_normalisasi_model extends CI_Model
{
    function jumlah_data($q = null)
    {
        $this->db->select('kelola_normalisasi.*,laptop.merk');

        $this->db->from('kelola_normalisasi');
        $this->db->join('laptop', 'kelola_normalisasi.id_laptop = laptop.id_laptop');


        // $this->db->group_start();
        // $this->db->like('id_katalog_rs', $q);
        // $this->db->or_like('totalberat', $q);
        // $this->db->group_end();
        return $this->db->count_all_results();
    }
    function limit_data($limit, $start = 0, $q = null)
    {
        $this->db->order_by('kelola_normalisasi.updated_at', 'desc');

        $this->db->select('
			kelola_normalisasi.*,laptop.merk as merk_laptop
        ');
        $this->db->join('laptop', 'kelola_normalisasi.id_laptop = laptop.id_laptop');


        // $this->db->group_start();
        // $this->db->like('id_katalog_rs', $q);
        // $this->db->or_like('totalberat', $q);
        // $this->db->group_end();
        $this->db->limit($limit, $start);

        return $this->db->get('kelola_normalisasi')->result();
    }



    function data_kriteria()
    {
        return $this->db->get('kelola_kriteria')->result();
    }
    function data_subkriteria()
    {
        return $this->db->get('kelola_subkriteria')->result();
    }

    // get all
    function get_all()
    {
        $this->db->order_by('id_normalisasi', $this->order);
        return $this->db->get('kelola_normalisasi')->result();
    }
}
