<?php
class Master_nilai_model extends CI_Model
{
    function jumlah_data($q = null)
    {
        $this->db->select('kelola_subkriteria.*');

        $this->db->from('kelola_subkriteria');
        $this->db->join('laptop', 'kelola_subkriteria.id_laptop = laptop.id_laptop');

        // $this->db->group_start();
        // $this->db->like('id_katalog_rs', $q);
        // $this->db->or_like('totalberat', $q);
        // $this->db->group_end();
        return $this->db->count_all_results();
    }
    function limit_data($limit, $start = 0, $q = null)
    {
        $this->db->order_by('kelola_subkriteria.updated_at', 'desc');

        $this->db->select('
			kelola_subkriteria.*,laptop.merk as merk_laptop
		');
        $this->db->join('laptop', 'kelola_subkriteria.id_laptop = laptop.id_laptop');

        // $this->db->group_start();
        // $this->db->like('id_katalog_rs', $q);
        // $this->db->or_like('totalberat', $q);
        // $this->db->group_end();
        $this->db->limit($limit, $start);

        return $this->db->get('kelola_subkriteria')->result();
    }

    // get all
    function get_all()
    {
        $this->db->order_by('id_subkriteria', $this->order);
        return $this->db->get('kelola_subkriteria')->result();
    }
}
