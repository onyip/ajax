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
		//
		$path_dir = './asset/img/';
		//
		$this->load->library('upload');
		$config['upload_path'] 		= $path_dir;
		$config['allowed_types'] 	= 'jpg|png|jpeg'; 
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);
		if(!empty($_FILES['foto']['name'])){

			if ($this->upload->do_upload('foto')){
				// $gbr = $this->upload->data();
				$gbr = array('upload_data' => $this->upload->data());
				//
				$name_image = $path_dir.$gbr['upload_data']['file_name'];
				$size = getimagesize($name_image);
				$width = $size[0];
				$height = $size[1];
				//
				$wd = $width/3;
				$hg = $height/3;
				// echo round($hg), round($wd); die();
				$config['image_library']	= 'gd2';
				$config['source_image']		= $gbr['upload_data']['full_path'];
				$config['create_thumb']		= FALSE;
				$config['maintain_ratio']	= FALSE;
				$config['quality']			= '50%';
				$config['width']			= round($wd);
				$config['height']			= round($hg);
				$config['new_image']		= './asset/img/'.$gbr['upload_data']['file_name'];
				// echo ($gbr['upload_data']['file_name']); die();
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$lasimg = $this->input->post('lasimg');
				unlink("./asset/img/$lasimg");
				$gambar=$gbr['upload_data']['file_name'];
				return $gambar;
			}

		}else{
			$gambar = $this->input->post('lasimg');
			return $gambar;
		}

	}
}