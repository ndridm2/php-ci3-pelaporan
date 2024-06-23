<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Guru extends CI_Model
{

	// tampil tampil produk
	public function tampil_data()
	{
		return $this->db->get('guru');
		return $this->db->get()->num_rows();
	}
	public function tampil_dataguru()
	{
		return $this->db->get_where('guru', 'role = 3');
		return $this->db->get()->num_rows();
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

	public function countGuru()
	{
		$this->db->select('*');
        $this->db->from('guru');
        $this->db->where('role', 3);
        return $this->db->get()->num_rows();
	}
}
