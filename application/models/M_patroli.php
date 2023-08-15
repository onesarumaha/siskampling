<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_patroli extends CI_Model {

	public function idPatroli($id)
	{
		return $this->db->get_where('data_patroli', ['id_patroli' => $id])->row_array();
	}

	public function getPatroli() 
	{
		$this->db->order_by('id_patroli', 'DESC');


		$this->db->select('*');
		$this->db->from('data_patroli');
		$this->db->join('users', 'users.id_user = data_patroli.id_user');

		return $query = $this->db->get()->result_array();
	}

	public function getPatrolia() 
	{
		$today = date('Y-m-d'); 

		$this->db->select('*');
		$this->db->from('data_patroli');
		$this->db->join('users', 'users.id_user = data_patroli.id_user');
		$this->db->where('DATE(tgl)', $today); 
		$this->db->order_by('id_patroli', 'DESC');
		$this->db->limit(5);

		$query = $this->db->get();
		return $query->result_array();

	}

	public function tambahPatroli()
	{

		$data = [
				'id_user' => htmlspecialchars($this->input->post('id_user', true)),
				'tgl' => date('Y-m-d'),
				'waktu' => htmlspecialchars($this->input->post('waktu', true)),
				'ket' => htmlspecialchars($this->input->post('ket', true)),
		];
		$this->db->insert('data_patroli', $data);

	}


	public function editPatroli()
	{

		$data = [
				'id_user' => htmlspecialchars($this->input->post('id_user', true)),
				'waktu' => htmlspecialchars($this->input->post('waktu', true)),
				'ket' => htmlspecialchars($this->input->post('ket', true)),
			];
		$this->db->where('id_patroli', $this->input->post('id_patroli'));
		$this->db->update('data_patroli', $data);
	}



	public function hapusIuran($id) 
	{

	    $this->db->where('id_iuran',$id);
	    $query = $this->db->get('data_iuran');
	    $row = $query->row();

	    unlink("./assets/bukti_bayar/$row->bukti_byr");

	    $this->db->delete('data_iuran', ['id_iuran' => $id]);
	}

	public function hapusPatroli($id) 
	{

	    $this->db->delete('data_patroli', ['id_patroli' => $id]);
	}

}


