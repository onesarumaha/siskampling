<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_patroli extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_user');
		$this->load->model('M_patroli');

		if($this->session->userdata('akses')!= "Admin" & $this->session->userdata('akses')!="Petugas" & $this->session->userdata('akses')!="Kepala Kelurahan" ) {
			redirect(base_url('auth'));
		}
		
	}
	
	public function index()
	{
		$data['title'] = 'Data Patroli';
		$data['patroli'] = $this->M_patroli->getPatroli();
		$data['warga'] = $this->M_user->getPetugas();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/tab', $data);
		$this->load->view('layout/setting');
		$this->load->view('patroli/index');
		$this->load->view('layout/footer');
	}

	public function submit_patroli()
	{
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();
		$data['title'] = 'Data Patroli';
		$data['patroli'] = $this->M_patroli->getPatroli();
		$data['warga'] = $this->M_user->getPetugas();


		$this->form_validation->set_rules('id_user', 'Petugas', 'trim|required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('patroli/index');
			$this->load->view('layout/footer');
		}else{
			$this->M_patroli->tambahPatroli();
			$this->session->set_flashdata('notif', 'Disimpan');
            redirect(base_url('Data_patroli/'));
		}	
	}

 	public function edit_patroli()
	{
		$data['title'] = 'Data Patroli';
		$data['patroli'] = $this->M_patroli->getPatroli();
		$data['warga'] = $this->M_user->getPetugas();
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();


		if(  !$this->form_validation->run() == FALSE)
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('patroli/index');
			$this->load->view('layout/footer');
		}else{
			
			$this->M_patroli->editPatroli();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('Data_patroli'));
		}	
    }

	public function hapus_patroli($id)
	{
		$this->M_patroli->hapusPatroli($id);
      	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('Data_patroli/'));
	}




}