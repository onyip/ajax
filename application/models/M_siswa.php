<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_siswa extends CI_Model{


	public function get_siswa()
	{
		return $this->db->get('tb_siswa')->result();
	}

	public function by_id($where)
	{
		return $this->db->get_where('tb_siswa', $where)->result();
	}

	public function update($where, $data)
	{
		$this->db->update('tb_siswa', $data, $where);
	}

	public function tambah($data)
	{
		$this->db->insert('tb_siswa', $data);
	}

	public function hapus($where)
	{
		$this->db->delete('tb_siswa', $where);
	}








}