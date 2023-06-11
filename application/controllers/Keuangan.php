<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_user');
		$this->load->model('M_keuangan');

		if($this->session->userdata('akses')!= "Admin" & $this->session->userdata('akses')!="Petugas" & $this->session->userdata('akses')!="Kepala Kelurahan" ) {
			redirect(base_url('auth'));
		}
		
	}
	
	public function index()
	{
		$data['title'] = 'Data Keuangan';
		$data['masuk'] = $this->M_keuangan->getPemasukan();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/tab', $data);
		$this->load->view('layout/setting');
		$this->load->view('keuangan/index');
		$this->load->view('layout/footer');
	}

	public function submit_keuangan()
	{
		$data['title'] = 'Data Keuangan';
		$data['masuk'] = $this->M_keuangan->getPemasukan();
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();

		$config['upload_path']          = './assets/bukti_bayar/';
        $config['allowed_types']        = 'gif|jpg|png|JPEG';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);
        
        if(!$this->upload->do_upload('bukti'))
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('keuangan/index');
			$this->load->view('layout/footer');
		}else{
			
			$this->M_keuangan->buktiBayar();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('Keuangan'));
		}

    }

    public function submit_pemasukan()
	{
		$data['title'] = 'Data Keuangan';
		$data['masuk'] = $this->M_keuangan->getPemasukan();
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();

		$config['upload_path']          = './assets/bukti_bayar/';
        $config['allowed_types']        = 'gif|jpg|png|JPEG';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);
        

		if( !$this->upload->do_upload('bukti'))
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('keuangan/index', $data);
			$this->load->view('layout/footer');
		}else{
			
			$this->M_keuangan->editBukti();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('keuangan'));
		}	
    }


	public function hapus_masuk($id)
	{
		$this->M_keuangan->hapus($id);
      	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('Keuangan'));
	}




















}
