<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Akun extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function tampil_semua_user(){
		$this->db->from('dbsurat_user');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_user($user)
	{
		return $this->db->get_where('dbsurat_user',$user);
	}
	public function hapus_akun($where) {
		$this->db->where($where);
		$this->db->delete('dbsurat_user');
	}
	public function edit_akun($where) {
		return $this->db->get_where('dbsurat_user',$where);
	}
	public function update_akun($where,$data){
		$this->db->where($where);
		$this->db->update('dbsurat_user',$data);
	}
	public function buat_akun($data){
		$this->db->insert('dbsurat_user', $data);
		return $this->db->affected_rows();
	}

}
