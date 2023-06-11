<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_user');

		if($this->session->userdata('akses')!= "Admin" & $this->session->userdata('akses')!="Petugas" & $this->session->userdata('akses')!="Kepala Kelurahan" ) {
			redirect(base_url('auth'));
		}
		
	}
	
	public function index()
	{
		$data['title'] = 'Data Warga';
		$data['warga'] = $this->M_user->getWarga();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/tab', $data);
		$this->load->view('layout/setting');
		$this->load->view('users/warga');
		$this->load->view('layout/footer');
	}

	public function submit_warga()
	{
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();
		$data['title'] = 'Data Warga';

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
      		$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('users/petugas');
			$this->load->view('layout/footer');
		}else{
			$this->M_user->tambahWarga();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('User/'));
		}	
	}

	public function edit_warga($id)
	{
		$data['title'] = "Data Warga";
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();
		$data['petugas'] = $this->M_user->getPetugas();



		if( !$this->form_validation->run() == FALSE)
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
    		$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('users/petugas');
			$this->load->view('layout/footer');
		}else{
			$this->M_user->editWarga();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('User/'));
		}	
    }

    public function hapus_warga($id)
	{
		$this->M_user->hapusWarga($id);
      	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('User/'));
	}

	public function Petugas()
	{
		$data['title'] = 'Data Petugas';
		$data['petugas'] = $this->M_user->getPetugas();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/tab', $data);
		$this->load->view('layout/setting');
		$this->load->view('users/petugas', $data);
		$this->load->view('layout/footer');
	}

	public function submit_petugas()
	{
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();
		$data['title'] = 'Data Petugas';

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('users/petugas');
			$this->load->view('layout/footer');
		}else{
			$this->M_user->tambahPetugas();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('User/petugas'));
		}	
	}

	public function edit_petugas($id)
	{
		$data['title'] = "Data Petugas";
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();
		$data['petugas'] = $this->M_user->getPetugas();



		if( !$this->form_validation->run() == FALSE)
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
  			$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('users/petugas');
			$this->load->view('layout/footer');
		}else{
			$this->M_user->editPetugas();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('User/petugas'));
		}	
    }

	public function hapus_petugas($id)
	{
		$this->M_user->hapusPetugas($id);
      	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('User/petugas'));
	}


















}
