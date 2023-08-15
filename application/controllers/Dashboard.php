<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_user');
		$this->load->model('M_jadwal');
		$this->load->model('M_patroli');
		if($this->session->userdata('akses')!= "Admin" & $this->session->userdata('akses')!="Petugas" & $this->session->userdata('akses')!="Kepala Kelurahan" ) {
			redirect(base_url('auth'));
		}
		
	}
	
	public function index()
	{
		$data['title'] = 'Dashboard';

		$data['senin'] = $this->M_jadwal->getJadwalSenin();
		$data['selasa'] = $this->M_jadwal->getJadwalSelasa();
		$data['rabu'] = $this->M_jadwal->getJadwalRabu();
		$data['kamis'] = $this->M_jadwal->getJadwalKamis();
		$data['jumat'] = $this->M_jadwal->getJadwalJumat();
		$data['sabtu'] = $this->M_jadwal->getJadwalSabtu();
		$data['minggu'] = $this->M_jadwal->getJadwalMinggu();

		$data['shift'] = $this->M_jadwal->getGantiShifta();
		$data['petugas'] = $this->M_user->getPetugas();
		$data['patroli'] = $this->M_patroli->getPatrolia();
		$data['jadwalDas'] = $this->M_jadwal->getJadwalDash();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/tab', $data);
		$this->load->view('layout/setting');
		$this->load->view('dashboard/index', $data);
		$this->load->view('layout/footer');
	}


















}
