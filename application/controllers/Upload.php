<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('m_siswa');

	}

	public function index()
	{
		$data['siswa'] = $this->m_siswa->get_siswa();
		$this->load->view('upload/index', $data);
	}

	public function add()
	{
		$this->load->view('upload/add');
	}

	public function insert()
	{
		$data 	= [
			'fullname' 	=> $this->input->post('fullname'),
			'username' 	=> $this->input->post('username'),
			'password' 	=> $this->input->post('password'),
			'religion' 	=> $this->input->post('religion'),
			'address'  	=> $this->input->post('alamat'),
			'gender'   	=> $this->input->post('gender'),
			'foto'   	=> $this->do_upload(),
			'is_active' => $this->input->post('status')
		];

		$this->m_siswa->tambah($data);
		redirect('upload');
	}


	public function update($id)
	{
		$where 		   = ['id' => $id];
		$data['siswa'] = $this->m_siswa->by_id($where);
		$this->load->view('upload/update', $data);
	}

	public function edit()
	{
		$where = ['id' => $this->input->post('id')];
		$data 	= [
			'fullname' 	=> $this->input->post('fullname'),
			'username' 	=> $this->input->post('username'),
			'password' 	=> $this->input->post('password'),
			'religion' 	=> $this->input->post('religion'),
			'address'  	=> $this->input->post('alamat'),
			'gender'   	=> $this->input->post('gender'),
			'foto'   	=> $this->do_upload(),
			'is_active' => $this->input->post('status')
		];

		$this->m_siswa->update($where, $data);
		redirect('upload');

	}

	public function delete($id)
	{
		$where = ['id' => $id];
		$this->m_siswa->hapus($where);
		redirect('upload');
	}

	function do_upload() {
		$this->load->library('upload');
		$config['upload_path'] 		= './asset/img/';
		$config['allowed_types'] 	= 'jpg|png|jpeg'; 
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);
		if(!empty($_FILES['foto']['name'])){

			if ($this->upload->do_upload('foto')){
				$gbr = $this->upload->data();
				$config['image_library']	= 'gd2';
				$config['source_image']		= './asset/img/'.$gbr['file_name'];
				$config['create_thumb']		= FALSE;
				$config['maintain_ratio']	= FALSE;
				$config['quality']			= '50%';
				$config['width']			= 470;
				$config['height']			= 300;
				$config['new_image']		= './asset/img/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$gambar=$gbr['file_name'];
				return $gambar;
			}

		}else{
			$gambar = null;
			return $gambar;
		}

	}
}