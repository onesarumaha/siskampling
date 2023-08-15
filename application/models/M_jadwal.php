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

	public function getJadwalDash() 
	{

		$this->db->select('users.nama, GROUP_CONCAT(data_jadwal.hari) AS hari');
	    $this->db->from('data_jadwal');
	    $this->db->join('users', 'users.id_user = data_jadwal.id_user');
	    $this->db->group_by('users.id_user, users.nama');

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

	public function getGantiShift() 
	{
		$this->db->where('approve', 'Diproses');
		$this->db->select('*');
		$this->db->from('ganti_shift');
		$this->db->join('users', 'users.id_user = ganti_shift.nama_pemohon');
		
		$username = $this->session->userdata['username'];
		$this->db->where('nama_pengganti', $username);

		return $query = $this->db->get()->result_array();
	}

	public function getGantiShifta() 
	{
		$this->db->where('approve', 'Ya');
		$this->db->select('*');
		$this->db->from('ganti_shift');
		$this->db->join('users', 'users.id_user = ganti_shift.nama_pemohon');
		
		return $query = $this->db->get()->result_array();
	}

	public function ajuanShift()
	{

		$data = [
				'nama_pemohon' => htmlspecialchars($this->input->post('nama_pemohon', true)),
				'nama_pengganti' => htmlspecialchars($this->input->post('nama_pengganti', true)),
				'tgl' => htmlspecialchars($this->input->post('tgl', true)),
				'alasan' => htmlspecialchars($this->input->post('alasan', true)),
				'approve' => 'Diproses',
		];
		$this->db->insert('ganti_shift', $data);

		$message = '
			<h1 align="center">PERMOHONAN PERGANTIAN SHIFT</h1>
			<label>
				"Selamat Malam Rekan '.$this->input->post("nama_pengganti").'"
			</label>
			<table border="1" width="100%" cellpadding="5">
				<tr>
					<td width="30%">Nama Petugas</td>
					<td width="70%">'.$this->input->post("pemohon").'</td>
				</tr>
				<tr>
					<td width="30%">Tanggal Izin</td>
					<td width="70%">'.date("l, d F Y", strtotime($this->input->post("tgl"))).'</td>
				</tr>
				<tr>
					<td width="30%">Alasan</td>
					<td width="70%">'.$this->input->post("alasan").'</td>
				</tr>
			</table>

			<label>
				Segera melakukan Approval atau tolak pada sistem, klik tombol dibawah ini ! <br>
			</label>
			<div style="text-align: center; margin-top: 10px;">
				<a href="http://localhost/skripsi9/">
					<button style="background-color: blue; color: white; font-size: 18px; padding: 10px 20px; border: none; border-radius: 5px;">Klik di sini</button>
				</a>
			</div>
			';

		 $config = Array(
		      	'protocol' => 'smtp',
	            'smtp_host' => 'ssl://smtp.googlemail.com',
	            'smtp_port' => 465,
	            'smtp_user' => 'wantri1998@gmail.com',
	            'smtp_pass' => 'fjjkmqvztrcfcoyf',
	            'mailtype' => 'html',
	            'charset' => 'iso-8859-1'
		    );

          $this->load->library('email', $config);
          $this->email->initialize($config);

          	$this->email->set_newline("\r\n");
		    $this->email->from('wantri1998@gmail.com', 'Perumahan Prima Indah');
		    $this->email->to($this->input->post("email"));
		    $this->email->subject('Permohonan Penggantian Shift ');
	        $this->email->message($message);

          if($this->email->send()) {
              	// $this->session->set_flashdata('notif', ' Dikirim');
        		// redirect	(base_url('pelanggan/bukti_pembayaran/'));
          }
          else {
               show_error($this->email->print_debugger());
          }
	}

	public function approvePemohon($id, $data) 
	{
		$this->db->where('id_ganti_shift', $id);
		return $this->db->update('ganti_shift', $data);
	}
	public function tolakPemohon($id, $data) 
	{
		$this->db->where('id_ganti_shift', $id);
		return $this->db->update('ganti_shift', $data);
	}



}


