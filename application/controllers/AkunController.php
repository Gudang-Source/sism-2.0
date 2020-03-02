<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class AkunController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Akun');
		if($this->session->has_userdata('session_id')==null){
			redirect('login');
		}
	}
	public function index() {
		$data['akun'] = $this->Akun->tampil_semua_user();

		$this->load->view('templates/header');
		$this->load->view('akun/index',$data);
		$this->load->view('templates/footer');
	}
	public function hapus($id){
		$where = array('user_id' => $id);
		$this->Akun->hapus_akun($where, 'akun');
		redirect('akun');
	}
	public function edit($id) {
		$where = array('user_id' => $id);
		$data['akun'] =$this->Akun->edit_akun($where)->result();
//		$this->load->view('surat/edit', $data);
//		$id=$this->uri->segment(3);
//		$data['surat'] =$this->Surat->get_one($id)->row_array();
		$this->load->view('templates/header');
		$this->load->view('akun/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update($id) {
//		$where = array('surat_id' => $id);
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array(
			'username' => $username,
			'password' => md5($password),
		);
		$where = array(
			'user_id' => $id
		);
		$this->Akun->update_akun($where, $data,'akun');
		redirect('akun');
	}
	public function buat(){
		if (isset($_POST['simpan'])){

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$alamat = $this->input->post('alamat');
			$tanggal = $this->input->post('tanggal_lahir');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$tempat = $this->input->post('tempat_lahir');
			$jabatan = $this->input->post('user_jabatan');
			$nope = $this->input->post('user_nope');
			$nama_lengkap = $this->input->post('nama_lengkap');
			$data = array(
				'username' => $username,
				'password' => $password,
				'alamat' => $alamat,
				'jenis_kelamin' => $jenis_kelamin,
				'user_level' => 'Pegawai',
				'alamat' => $alamat,
				'user_tanggal' => $tanggal,
				'user_tempat' => $tempat,
				'user_jabatan' => $jabatan,
				'user_nope' => $nope,
				'nama_lengkap' => $nama_lengkap
			);
			$simpan = $this->Akun->buat_akun($data);
			if ($simpan>0) {
				$this->session->set_flashdata('alert','berhasil_buat_surat');
				redirect('akun');
			}
			else{
				redirect('akun');
			}
		}


	}
}
