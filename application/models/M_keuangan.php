<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keuangan extends CI_Model {

	public function idIuran($id)
	{
		return $this->db->get_where('data_keuangan', ['id_keuangan' => $id])->row_array();
	}

	public function getPemasukan() 
	{
		$this->db->order_by('id_keuangan', 'DESC');

		$this->db->where('jns_trans', 'Pemasukan');

		return $this->db->get('data_keuangan')->result_array();
	}


	public function buktiBayar()
	{

		$gambar = $this->upload->data();
        $gambar = $gambar['file_name'];
    	$no_transaksi = random_int(1, 9) . date('imyhis');

		$data = [
				'no_transaksi' => $no_transaksi,
				'tgl' => date('Y-m-d'),
				'jns_trans' => 'Pemasukan',
				'kategori_trans' => htmlspecialchars($this->input->post('kategori_trans', true)),
				'nominal' => htmlspecialchars($this->input->post('nominal', true)),
				'status' => 'Approve',
				'ket' => htmlspecialchars($this->input->post('ket', true)),
				'bukti' => $gambar,
		];
		$this->db->insert('data_keuangan', $data);

	
	}

	public function editBukti()
	{
		$gambar = $this->upload->data();
        $gambar = $gambar['file_name'];

		$data = [
				'tgl' => date('Y-m-d'),
				'kategori_trans' => htmlspecialchars($this->input->post('kategori_trans', true)),
				'nominal' => htmlspecialchars($this->input->post('nominal', true)),
				'ket' => htmlspecialchars($this->input->post('ket', true)),
				'bukti' => $gambar,
		];
		$this->db->where('id_keuangan', $this->input->post('id_keuangan'));
		$this->db->update('data_keuangan', $data);
	}



	public function hapus($id) 
	{

	    $this->db->where('id_keuangan',$id);
	    $query = $this->db->get('data_keuangan');
	    $row = $query->row();

	    unlink("./assets/bukti_bayar/$row->bukti");

	    $this->db->delete('data_keuangan', ['id_keuangan' => $id]);
	}

}


