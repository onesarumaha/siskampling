<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {

	public function iduser($id)
	{
		return $this->db->get_where('users', ['id_user' => $id])->row_array();
	}

	public function getJadwal() 
	{

		$this->db->select('*');
		$this->db->from('data_jadwal');
		$this->db->join('users', 'users.id_user = data_jadwal.id_user');

		return $query = $this->db->get()->result_array();
	}


	public function getJadwalSenin() 
	{

		$this->db->select('*');
		$this->db->from('data_jadwal');
		$this->db->join('users', 'users.id_user = data_jadwal.id_user');
		$this->db->where('hari', 'Senin');

		return $query = $this->db->get()->result_array();
	}

	public function getJadwalSelasa() 
	{
		$this->db->select('*');
		$this->db->from('data_jadwal');
		$this->db->join('users', 'users.id_user = data_jadwal.id_user');
		$this->db->where('hari', 'Selasa');
		
		return $query = $this->db->get()->result_array();
	}

	public function getJadwalRabu() 
	{
		$this->db->select('*');
		$this->db->from('data_jadwal');
		$this->db->join('users', 'users.id_user = data_jadwal.id_user');
		$this->db->where('hari', 'Rabu');
		
		return $query = $this->db->get()->result_array();
	}

	public function getJadwalKamis() 
	{
		$this->db->select('*');
		$this->db->from('data_jadwal');
		$this->db->join('users', 'users.id_user = data_jadwal.id_user');
		$this->db->where('hari', 'Kamis');
		
		return $query = $this->db->get()->result_array();
	}

	public function getJadwalJumat() 
	{
		$this->db->select('*');
		$this->db->from('data_jadwal');
		$this->db->join('users', 'users.id_user = data_jadwal.id_user');
		$this->db->where('hari', 'Jumat');
		
		return $query = $this->db->get()->result_array();
	}

	public function getJadwalSabtu() 
	{
		$this->db->select('*');
		$this->db->from('data_jadwal');
		$this->db->join('users', 'users.id_user = data_jadwal.id_user');
		$this->db->where('hari', 'Sabtu');
		
		return $query = $this->db->get()->result_array();
	}

	public function getJadwalMinggu() 
	{
		$this->db->select('*');
		$this->db->from('data_jadwal');
		$this->db->join('users', 'users.id_user = data_jadwal.id_user');
		$this->db->where('hari', 'Minggu');
		
		return $query = $this->db->get()->result_array();
	}

	public function tambahJadwal()
	{

		$data = [
				'id_user' => htmlspecialchars($this->input->post('id_user', true)),
				'hari' => htmlspecialchars($this->input->post('hari', true)),
				'shift' => htmlspecialchars($this->input->post('shift', true)),
		];
		$this->db->insert('data_jadwal', $data);

		// $id_pengiriman = $this->db->insert_id();
		

	
	}



	public function hapusJadwal($id) 
	{

	    $this->db->delete('data_jadwal', ['id_jadwal' => $id]);
	}

}


