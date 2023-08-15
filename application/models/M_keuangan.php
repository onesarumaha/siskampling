<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keuangan extends CI_Model {

	public function idIuran($id)
	{
		return $this->db->get_where('data_keuangan', ['id_keuangan' => $id])->row_array();
	}

	public function getKeuangan() 
	{
		$this->db->order_by('id_keuangan', 'DESC');
		$this->db->where('status', 'Approve');

		return $this->db->get('data_keuangan')->result_array();
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
    	$no_transaksi = 'PEM - ' . random_string('numeric',2) . date('imyhis');



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

	public function editBuktiPem()
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

	public function editReject()
	{

		$data = [
				'ket' => htmlspecialchars($this->input->post('ket', true)),
				'status' => 'Reject',
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

	public function getPengeluaran() 
	{
		$this->db->order_by('id_keuangan', 'DESC');

		$this->db->where('jns_trans', 'Pengeluaran');

		return $this->db->get('data_keuangan')->result_array();
	}


	public function buktiBayarpengeluaran()
	{

		$gambar = $this->upload->data();
        $gambar = $gambar['file_name'];
    	$no_transaksi1 = 'PEN - ' . random_string('numeric',2) . date('imyhis');

		$data = [
				'no_transaksi' => $no_transaksi1,
				'tgl' => date('Y-m-d'),
				'jns_trans' => 'Pengeluaran',
				'kategori_trans' => htmlspecialchars($this->input->post('kategori_trans', true)),
				'nominal' => htmlspecialchars($this->input->post('nominal', true)),
				'status' => 'Menunggu',
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
				'status' => 'Menunggu',
				'bukti' => $gambar,
		];
		$this->db->where('id_keuangan', $this->input->post('id_keuangan'));
		$this->db->update('data_keuangan', $data);
	}

	public function getApprove() 
	{
		$this->db->order_by('id_keuangan', 'DESC');

		$this->db->where('status', 'Menunggu');

		return $this->db->get('data_keuangan')->result_array();
	}

	public function Updateapprove($id, $data) 
	{
		$this->db->where('id_keuangan', $id);
		return $this->db->update('data_keuangan', $data);
	}







}


