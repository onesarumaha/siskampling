<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_user');
		$this->load->model('M_jadwal');

		if($this->session->userdata('akses')!= "Admin" & $this->session->userdata('akses')!="Petugas" & $this->session->userdata('akses')!="Kepala Kelurahan" ) {
			redirect(base_url('auth'));
		}
		
	}
	
	public function index()
	{
		$data['title'] = 'Jadwal Patroli';
		$data['jadwal'] = $this->M_jadwal->getJadwal();
		$data['petugas'] = $this->M_user->getPetugas();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/tab', $data);
		$this->load->view('layout/setting');
		$this->load->view('jadwal/index');
		$this->load->view('layout/footer');
	}

	public function submit_jadwal()
	{
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();
		$data['title'] = 'Jadwal Patroli';
		$data['petugas'] = $this->M_user->getPetugas();


		$this->form_validation->set_rules('id_user', 'Petugas', 'trim|required');
		$this->form_validation->set_rules('hari', 'Hari', 'trim|required');
		$this->form_validation->set_rules('shift', 'Shift', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('jadwal/index');
			$this->load->view('layout/footer');
		}else{
			$this->M_jadwal->tambahJadwal();
			$this->session->set_flashdata('notif', ' Dibuat');
            redirect(base_url('Jadwal/'));
		}	
	}


	public function hapus_jadwal($id)
	{
		$this->M_jadwal->hapusJadwal($id);
      	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('Jadwal'));
	}

	public function ganti_shift()
	{
		$data['title'] = 'Pergantian Shift';
		$data['jadwal'] = $this->M_jadwal->getGantiShift();
		$data['petugas'] = $this->M_user->getPetugas();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/tab', $data);
		$this->load->view('layout/setting');
		$this->load->view('jadwal/ganti_shift');
		$this->load->view('layout/footer');
	}

	public function submit_pengajuan_pergantian_shift()
	{
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();
		$data['title'] = 'Jadwal Patroli';
		$data['title'] = 'Pergantian Shift';
		$data['jadwal'] = $this->M_jadwal->getGantiShift();
		$data['petugas'] = $this->M_user->getPetugas();


		$this->form_validation->set_rules('alasan', 'Alasan', 'trim|required');
		$this->form_validation->set_rules('tgl', 'Tanggal Izin', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('jadwal/ganti_shift');
			$this->load->view('layout/footer');
		}else{
			$this->M_jadwal->ajuanShift();
			$this->session->set_flashdata('notif', ' Berhasil');
            redirect(base_url('Jadwal/ganti_shift'));
		}	
	}

	public function approve_shift()
	{
		$data['title'] = 'Pergantian Shift';
		$data['jadwal'] = $this->M_jadwal->getGantiShift();
		$data['petugas'] = $this->M_user->getPetugas();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/tab', $data);
		$this->load->view('layout/setting');
		$this->load->view('jadwal/approve_shift');
		$this->load->view('layout/footer');
	}

	public function approve_permohonan($id)
	{
		$data  = array(
	         'approve'      => 'Ya'
	      
	      );

	      $res = $this->M_jadwal->approvePemohon($id, $data);

	      if($res > 0){
	      $this->session->set_flashdata('notif', ' Approve');	
	        redirect(base_url('Jadwal/approve_shift/'));
	      }else{
	       // kalau error 
	      }
	}

	public function tolak_permohonan($id)
	{
		$data  = array(
	         'approve'      => 'Tolak'
	      
	      );

	      $res = $this->M_jadwal->tolakPemohon($id, $data);

	      if($res > 0){
	      $this->session->set_flashdata('notif', ' Ditolak');	
	        redirect(base_url('Jadwal/approve_shift/'));
	      }else{
	       // kalau error 
	      }
	}




















}
