<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Pelaporan extends CI_Model
{

    // tampil tampil produk
    public function tampil_data()
    {
        $this->db->select('*');
		$this->db->from('pelaporan');
		$this->db->join('guru', 'pelaporan.guru_id = guru.id');
		$this->db->join('kehadiran', 'pelaporan.guru_id = kehadiran.kehadiran_id');
		$query = $this->db->get();
		return $query->result_array();
    }
	
    // tambah
    public function tambah_data($data, $table)
    {
        $this->db->insert($table, $data);
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
