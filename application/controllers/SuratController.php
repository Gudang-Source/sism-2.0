<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 5/28/2019
 * Time: 3:21 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('SuratModel');
		$this->load->model('Surat');
		if($this->session->has_userdata('session_id')==null){
			redirect('login');
		}
	}
	public function index() {
		$data['surat'] = $this->Surat->tampil_surat();


		$this->load->view('templates/header');
		$this->load->view('surat/index', $data);
		$this->load->view('templates/footer');
	}
	public function buat() {
		if (isset($_POST['simpan'])) {
			$config['upload_path'] = './assets/upload/upload_gambar/';
			$config['allowed_types'] = 'pdf';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('upload')) {
				$error = array('error' => $this->upload->display_errors());

				$this->session->set_flashdata('alert', 'gagal_upload_foto');
				redirect('surat');
			} else {
				$foto = $this->upload->data('file_name');
//				var_dump($foto);
//				exit();

				$asal_surat = $this->input->post('asal_surat');
				$tanggal_surat = $this->input->post('tanggal_surat');
				$perihal_surat = $this->input->post('perihal');
				$nomor_surat = $this->input->post('nomor_surat');
				$isi_singkat = $this->input->post('isi_singkat');
				$keterangan = $this->input->post('keterangan');
				$data = array(
					'surat_foto' => $foto,
					'masuk_asal' => $asal_surat,
					'masuk_tanggal' => $tanggal_surat,
					'masuk_perihal' => $perihal_surat,
					'masuk_nomor' => $nomor_surat,
					'masuk_isi_singkat' => $isi_singkat,
					'masuk_keterangan' => $keterangan,
				);
				$simpan = $this->Surat->buat_surat($data);
				if ($simpan > 0) {
					$this->session->set_flashdata('alert', 'berhasil_buat_surat');
					redirect('surat');
				} else {
					redirect('surat');
				}
			}
		}

		}

//	public function lihat($id){
//
//
////		// Store the file name into variable
////		$file = 'http://localhost/SIS_KBB/assets/upload/upload_gambar/5_61791405865749710031.pdf';
////		$filename = '5_61791405865749710031.pdf';
//
//		// The location of the PDF file
//		// on the server
//		$filename = "C:\xampp\htdocs\SIS_KBB\assets\upload\upload_gambar\5_61791405865749710031.pdf";
//
//		// Header content type
//		header("Content-type: application/pdf");
//
//		header("Content-Length: " . filesize($filename));
//
//		// Send the file to the browser.
//		readfile($filename);
//
//
//
////		$data['surat']=$this->Surat->lihat_surat($id);
////		$this->load->view('templates/header');
////		$this->load->view('surat/lihat', $data);
////		$this->load->view('templates/footer');
//	}

	public function hapus($id){
		$where = array('masuk_id' => $id);
		$this->Surat->hapus_surat($where, 'surat');
		$this->session->set_flashdata('alert','berhasil_menghapus_surat');
		redirect('surat');
	}

	public function edit($id) {
		$where = array('masuk_id' => $id);
		$data['surat'] =$this->Surat->edit_surat($where)->result();

		$this->load->view('templates/header');
		$this->load->view('surat/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update($id) {

		$asal_surat = $this->input->post('asal_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$perihal_surat = $this->input->post('perihal');
		$nomor_surat = $this->input->post('nomor_surat');
		$isi_singkat = $this->input->post('isi_singkat');
		$keterangan = $this->input->post('keterangan');
		$data = array(
			'masuk_asal' => $asal_surat,
			'masuk_tanggal' => $tanggal_surat,
			'masuk_perihal' => $perihal_surat,
			'masuk_nomor' => $nomor_surat,
			'masuk_isi_singkat' => $isi_singkat,
			'masuk_keterangan' => $keterangan,
		);
		$where = array(
			'masuk_id' => $id
		);
		$this->Surat->update_surat($where, $data,'surat');

		$this->session->set_flashdata('alert','berhasil_edit_surat');
		redirect('surat');
	}
//	public function disposisi($id){
//		$data['id']=$id;
//		if (isset($_POST['Kirim'])){
//			$tujuan=$this->input->post('tujuan_disposisi');
//			$catatan=$this->input->post('catatan');
//			$data_disposisi= array(
//				'surat_tujuan_disposisi' => $tujuan,
//				'surat_catatan' => $catatan,
//				'surat_disposisi' => 'Jawab'
//			);
//			$where = array(
//				'surat_id' => $id
//			);
//			$this->Surat->update_surat($where, $data_disposisi);
//
//			$this->session->set_flashdata('alert','berhasil_disposisi_surat');
//			redirect('surat');
//		}
//		$this->load->view('templates/header');
//		$this->load->view('surat/disposisi',$data);
//		$this->load->view('templates/footer');
//	}
//	public  function tampil_disposisi(){
//		$data['surat'] = $this->Surat->tampil_surat();
//
//		$this->load->view('templates/header');
//		$this->load->view('surat/tampil_disposisi',$data);
//		$this->load->view('templates/footer');
//	}
	public function tolak_surat(){
		$id = $this->input->post('id');
		$data_disposisi = array(
			'surat_disposisi' => 'Tolak',
			"surat_keterangan"=>$this->input->post('keterangan'),
		);

		$where = array(
			'surat_id' => $id
		);
		$this->Surat->update_surat($where, $data_disposisi);
		$this->session->set_flashdata('alert','berhasil_menolak_surat');
		redirect('surat');
	}
//	public function simpan_surat($id){
//		$data_disposisi = array(
//			'surat_disposisi' => 'Simpan'
//		);
//
//		$where = array(
//			'surat_id' => $id
//		);
//		$this->Surat->update_surat($where, $data_disposisi);
//		$this->session->set_flashdata('alert','berhasil_simpan_surat');
//		redirect('surat');
//	}
	public function laporan(){
		if (isset($_POST['lihat'])){
			$tanggal1 = $this->input->post('tanggal1');
			$tanggal2 = $this->input->post('tanggal2');

			$data['laporan'] = $this->SuratModel->view_laporan('dbsurat_surat_masuk','masuk_tanggal',$tanggal1,$tanggal2);
			$data['tanggal1'] = $tanggal1;
			$data['tanggal2'] = $tanggal2;
			$this->load->view('templates/header');
			$this->load->view('surat/arsip',$data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
			$this->load->view('surat/laporan');
			$this->load->view('templates/footer');
		}

	}
}

