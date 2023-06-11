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




















}
