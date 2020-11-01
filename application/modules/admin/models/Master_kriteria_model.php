<?php
class Master_kriteria_model extends CI_Model
{
    function jumlah_data($q = null)
    {
        $this->db->select('kelola_kriteria.*');

        $this->db->from('kelola_kriteria');

        // $this->db->group_start();
        // $this->db->like('id_katalog_rs', $q);
        // $this->db->or_like('totalberat', $q);
        // $this->db->group_end();
        return $this->db->count_all_results();
    }
    function limit_data($limit, $start = 0, $q = null)
    {
        $this->db->order_by('kelola_kriteria.updated_at', 'desc');

        $this->db->select('
			kelola_kriteria.*
		');

        // $this->db->group_start();
        // $this->db->like('id_katalog_rs', $q);
        // $this->db->or_like('totalberat', $q);
        // $this->db->group_end();
        $this->db->limit($limit, $start);

        return $this->db->get('kelola_kriteria')->result();
    }



    // get all
    function get_all()
    {
        $this->db->order_by('id_kriteria', $this->order);
        return $this->db->get('kelola_kriteria')->result();
    }
}
