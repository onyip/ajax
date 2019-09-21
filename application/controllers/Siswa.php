<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_siswa');

	}

	
	public function index()
	{
		$this->load->view('index');
	}


	public function get_siswa()
	{
		$data =	$this->m_siswa->get_siswa();
		echo json_encode($data);
	}


	public function get_byID() 
	{
		$id 	= $this->input->post('id');
		$where  = ['id' => $id];
		$by_id  = $this->m_siswa->by_id($where);
		echo json_encode($by_id);
	}

	public function update()
	{
		$id 	= $this->input->post('id');
		$where  = ['id' => $id];
		$data 	= [
			'fullname' 	=> $this->input->post('fullname'),
			'username' 	=> $this->input->post('username'),
			'password' 	=> $this->input->post('password'),
			'religion' 	=> $this->input->post('religion'),
			'address'  	=> $this->input->post('alamat'),
			'gender'   	=> $this->input->post('gender'),
			'is_active' => $this->input->post('status')
		];

		$this->m_siswa->update($where, $data);

		
		$mesage = ['status' => true];
		echo json_encode($mesage);
		
	}

	public function tambah()
	{
		$data = [
			'fullname' 	=> $this->input->post('fullname'),
			'username' 	=> $this->input->post('username'),
			'password' 	=> $this->input->post('password'),
			'religion' 	=> $this->input->post('religion'),
			'address' 	=> $this->input->post('alamat'),
			'gender' 	=> $this->input->post('gender'),
			'is_active' => $this->input->post('status')
		];

		$this->m_siswa->tambah($data);

		
		$mesage = ['status' => true];
		echo json_encode($mesage);
		
	}

	public function hapus()
	{
		$id 	= $this->input->post('id');
		$where  = ['id' => $id];

		$this->m_siswa->hapus($where);

		
		$mesage = ['status' => true];
		echo json_encode($mesage);
		
	}
}
