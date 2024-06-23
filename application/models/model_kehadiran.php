<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kehadiran extends CI_Model
{

	// tampil tampil produk
	public function tampil_data()
	{
		$this->db->select('*');
		$this->db->from('kehadiran');
		$this->db->join('guru', 'kehadiran.guru_id = guru.id');
		$this->db->where('role = 3');
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


	public function getKehadiranGuru()
	{
		$query = $this->db->query("
        SELECT *
        FROM kehadiran k
        JOIN guru g ON k.guru_id = g.id
        WHERE g.role = 3;
    ");

		if ($query->num_rows() > 0) {
			return $query->result_array(); // Return results as an associative array
		} else {
			return []; // Return empty array if no results found
		}
	}

	public function countKehadiran()
	{
		$this->db->select('*');
        $this->db->from('kehadiran');
        return $this->db->get()->num_rows();
	}

}
