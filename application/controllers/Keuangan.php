<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require FCPATH . '/vendor/autoload.php';
// use Dompdf\Dompdf;
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
		$data['title'] = 'Data Keuangan / Pemasukan';
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
		$data['title'] = 'Data Keuangan / Pemasukan';
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
		$data['title'] = 'Data Keuangan / Pemasukan';
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
			
			$this->M_keuangan->editBuktiPem();
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

	public function pengeluaran()
	{
		$data['title'] = 'Data Keuangan / Pengeluaran';
		$data['keluar'] = $this->M_keuangan->getPengeluaran();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/tab', $data);
		$this->load->view('layout/setting');
		$this->load->view('keuangan/pengeluaran');
		$this->load->view('layout/footer');
	}

	public function submit_pengeluaran()
	{
		$data['title'] = 'Data Keuangan / Pengeluaran';
		$data['keluar'] = $this->M_keuangan->getPengeluaran();
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
			$this->load->view('keuangan/pengeluaran');
			$this->load->view('layout/footer');
		}else{
			
			$this->M_keuangan->buktiBayarpengeluaran();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('Keuangan/pengeluaran'));
		}

    }

    public function submit_editpengeluaran()
	{
		$data['title'] = 'Data Keuangan / Pemasukan';
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
            redirect(base_url('keuangan/pengeluaran'));
		}	
    }

    public function hapus_keluar($id)
	{
		$this->M_keuangan->hapus($id);
      	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('Keuangan/pengeluaran'));
	}

	public function approve()
	{
		$data['title'] = 'Data Keuangan / Approve';
		$data['approve'] = $this->M_keuangan->getApprove();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/tab', $data);
		$this->load->view('layout/setting');
		$this->load->view('keuangan/approve');
		$this->load->view('layout/footer');
	}

	public function approve_keuangan($id)
	{
		$data  = array(
	         'status'      => 'Approve'
	      
	      );

	      $res = $this->M_keuangan->Updateapprove($id, $data);

	      if($res > 0){
	      $this->session->set_flashdata('notif', ' Approve');	
	        redirect(base_url('Keuangan/approve/'));
	      }else{
	       // kalau error 
	      }
	}

	 public function submit_reject()
	{
		$data['title'] = 'Data Keuangan / Approve';
		$data['approve'] = $this->M_keuangan->getApprove();
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();


        $this->load->library('upload', $config);
        

		if( $this->upload->do_upload('bukti'))
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('keuangan/approve');
			$this->load->view('layout/footer');
		}else{
			
			$this->M_keuangan->editReject();
			$this->session->set_flashdata('notif', ' Direject');
            redirect(base_url('keuangan/approve'));
		}	
    }

	public function laporan()
	{
		$data['title'] = 'Laporan Keuangan';
		$data['keuangan'] = $this->M_keuangan->getKeuangan();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/tab', $data);
		$this->load->view('layout/setting');
		$this->load->view('keuangan/laporan');
		$this->load->view('layout/footer');
	}

 	public function laporan_full()
	{
		$data = array(
			'title' => 'Laporan Keuangan'
		);

		// $dompdf = new Dompdf();
		$data['keuangan'] = $this->M_keuangan->getKeuangan();
		$this->load->view('keuangan/full', $data);


	}

	public function laporan_periode()
	{
		$data['title'] = "Laporan Periode";
		$data['query'] = $this->db->get_where('users',['akses' => $this->session->userdata('akses')])->row_array();
		$data['keuangan'] = $this->M_keuangan->getKeuangan();
		

		$this->form_validation->set_rules('tgl_1', 'Tanggal Awal', 'trim|required');
		$this->form_validation->set_rules('tgl_2', 'Tanggal Akhir', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/tab', $data);
			$this->load->view('layout/setting');
			$this->load->view('keuangan/laporan');
			$this->load->view('layout/footer');
		}else{
			

			$data['keuangan'] = $this->M_keuangan->getKeuangan();
			$html = $this->load->view('keuangan/periode', $data);
			
		}


	}





















}
