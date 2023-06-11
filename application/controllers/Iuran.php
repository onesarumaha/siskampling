<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iuran extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_user');
		$this->load->model('M_iuran');

		if($this->session->userdata('akses')!= "Admin" & $this->session->userdata('akses')!="Petugas" & $this->session->userdata('akses')!="Kepala Kelurahan" ) {
			redirect(base_url('auth'));
		}
		
	}
	
	public function index()
	{
		$data['title'] = 'Data Iuran';
		$data['iuran'] = $this->M_iuran->getIuran();
		$data['warga'] = $this->M_user->getWarga();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/tab', $data);
		$this->load->view('layout/setting');
		$this->load->view('iuran/index');
		$this->load->view('layout/footer');
	}

	public function submit_iuran()
	{
		$data['title'] = 'Data Iuran';
		$data['iuran'] = $this->M_iuran->getIuran();
		$data['warga'] = $this->M_user->getWarga();
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();

		$config['upload_path']          = './assets/bukti_bayar/';
        $config['allowed_types']        = 'gif|jpg|png|JPEG';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);
        
        if(!$this->upload->do_upload('bukti_byr'))
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('iuran/index');
			$this->load->view('layout/footer');
		}else{
			
			$this->M_iuran->buktiBayar();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('iuran'));
		}

    }

    public function edit_iuran($id)
	{
		$data['title'] = 'Data Iuran';
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();
		$data['iuran'] = $this->M_iuran->getIuran();
		$data['warga'] = $this->M_user->getWarga();

		$config['upload_path']          = './assets/bukti_bayar/';
        $config['allowed_types']        = 'gif|jpg|png|JPEG';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);
        

		if(! $this->upload->do_upload('bukti_byr'))
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('iuran/index', $data);
			$this->load->view('layout/footer');
		}else{
			
			$this->M_iuran->editBukti();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('iuran'));
		}	
    }


	public function hapus_iuran($id)
	{
		$this->M_iuran->hapusIuran($id);
      	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('iuran'));
	}




















}
