<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 5/28/2019
 * Time: 3:20 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function buat_surat($data){
		$this->db->insert('dbsurat_surat_masuk', $data);
		return $this->db->affected_rows();
	}

	public function  tampil_surat(){
		$this->db->from('dbsurat_surat_masuk');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_surat($id){
		$this->db->from('dbsurat_surat_masuk');
		$this->db->where('masuk_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function hapus_surat($where) {
		$this->db->where($where);
		$this->db->delete('dbsurat_surat_masuk');
	}

	public function edit_surat($where) {
		return $this->db->get_where('dbsurat_surat_masuk',$where);
	}
	public function update_surat($where,$data){
		$this->db->where($where);
		$this->db->update('dbsurat_surat_masuk',$data);
	}

	public function total_surat(){
		$this->db->from('dbsurat_surat_masuk');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function view_laporan($table,$column,$date1,$date2){
		$query = "select * from $table where $column between '$date1' and '$date2'";
		return $this->db->query($query)->result_array();
	}

//	public function total_surat_setuju(){
//		$this->db->from('dbsurat_skck');
//		$this->db->where('surat_disposisi','Jawab');
//		$query = $this->db->get();
//		return $query->num_rows();
//	}
//	public function total_surat_tolak(){
//		$this->db->from('dbsurat_skck');
//		$this->db->where('surat_disposisi','Tolak');
//		$query = $this->db->get();
//		return $query->num_rows();
//	}

}
