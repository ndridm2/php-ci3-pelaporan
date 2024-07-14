<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Pembelajaran extends CI_Model
{

    // tampil tampil
    public function tampil_data()
    {
        return $this->db->get('pembelajaran');
        return $this->db->get()->num_rows();
    }

	// get all data
	public function tampil_all_data()
    {
        $this->db->select('*');
		$this->db->from('pembelajaran');
		$this->db->join('guru', 'pembelajaran.guru_id = guru.id');
		$this->db->order_by('guru_id', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
    }

    // tambah
    public function tambah_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // edit
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    // update
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // hapus
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

	

}
