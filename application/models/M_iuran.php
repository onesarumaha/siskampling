<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_iuran extends CI_Model {

	public function idIuran($id)
	{
		return $this->db->get_where('data_iuran', ['id_iuran' => $id])->row_array();
	}

	public function getIuran() 
	{
		$this->db->order_by('id_iuran', 'DESC');


		$this->db->select('*');
		$this->db->from('data_iuran');
		$this->db->join('users', 'users.id_user = data_iuran.id_user');

		return $query = $this->db->get()->result_array();
	}


	public function buktiBayar()
	{

		$gambar = $this->upload->data();
        $gambar = $gambar['file_name'];
    	$no_tagihan = random_int(1, 9) . date('imyhis');

		$data = [
				'no_tagihan' => $no_tagihan,
				'id_user' => htmlspecialchars($this->input->post('id_user', true)),
				'tgl' => htmlspecialchars($this->input->post('tgl', true)),
				'jenis_iuran' => htmlspecialchars($this->input->post('jenis_iuran', true)),
				'nominal' => htmlspecialchars($this->input->post('nominal', true)),
				'metode_byr' => htmlspecialchars($this->input->post('metode_byr', true)),
				'bukti_byr' => $gambar,
		];
		$this->db->insert('data_iuran', $data);

	
	}

	public function editBukti()
	{
		$gambar = $this->upload->data();
        $gambar = $gambar['file_name'];

		$data = [
				'id_user' => htmlspecialchars($this->input->post('id_user', true)),
				'tgl' => htmlspecialchars($this->input->post('tgl', true)),
				'jenis_iuran' => htmlspecialchars($this->input->post('jenis_iuran', true)),
				'nominal' => htmlspecialchars($this->input->post('nominal', true)),
				'metode_byr' => htmlspecialchars($this->input->post('metode_byr', true)),
				'bukti_byr' => $gambar,
		];
		$this->db->where('id_iuran', $this->input->post('id_iuran'));
		$this->db->update('data_iuran', $data);
	}



	public function hapusIuran($id) 
	{

	    $this->db->where('id_iuran',$id);
	    $query = $this->db->get('data_iuran');
	    $row = $query->row();

	    unlink("./assets/bukti_bayar/$row->bukti_byr");

	    $this->db->delete('data_iuran', ['id_iuran' => $id]);
	}

}


