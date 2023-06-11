<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function iduser($id)
	{
		return $this->db->get_where('users', ['id_user' => $id])->row_array();
	}

	public function getPetugas() 
	{
		$this->db->order_by('id_user', 'DESC');
		$this->db->where('akses', 'Petugas');

		return $this->db->get('users')->result_array();

	}

	public function tambahPetugas()
	{

		$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'akses' => 'Petugas',
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];
		$this->db->insert('users', $data);

		// $id_pengiriman = $this->db->insert_id();
		

	
	}

	public function editPetugas()
	{

		$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),


			];
		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('users', $data);
	}

	public function hapusPetugas($id) 
	{

	    $this->db->delete('users', ['id_user' => $id]);
	}



	public function getWarga() 
	{
		$this->db->order_by('id_user', 'DESC');
		$this->db->where('akses', 'Warga');

		return $this->db->get('users')->result_array();

	}

	public function tambahWarga()
	{

		$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'akses' => 'Warga',
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];
		$this->db->insert('users', $data);

		// $id_pengiriman = $this->db->insert_id();
		

	
	}

	public function editWarga()
	{

		$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),


			];
		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('users', $data);
	}

	public function hapusWarga($id) 
	{

	    $this->db->delete('users', ['id_user' => $id]);
	}




}