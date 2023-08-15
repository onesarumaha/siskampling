<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Login | Perumahan Prima Indah';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('auth/login',$data);
		}else{
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if($user) {
			if(password_verify($password, $user['password'])) { 
				$data = [
					'username' => $user['username'],
					'akses' => $user['akses'],
					'nama' => $user['nama'],
					'id_user' => $user['id_user'],
				];
				$this->session->set_userdata($data);
				if($user['akses'] == 'Admin' ) {
					redirect(base_url('Dashboard'));
				}elseif($user['akses'] == 'Kepala Kelurahan') {
					redirect(base_url('Dashboard'));
				}elseif($user['akses'] == 'Petugas') {
					redirect(base_url('Dashboard'));
				}
			}else{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
 			 Password Salah !</div>');
        		redirect(base_url('auth'));
			}
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
 			 Username Salah !</div>');
        	redirect(base_url('auth'));
		}
	}

	public function daftar()
	{
		$data['title'] = 'Daftar | Perumahan Prima Indah';
		$this->load->view('auth/daftar', $data);
	}

	public function submit_daftar()
	{
		if($this->session->userdata('username')) {
			redirect('Auth');
		}

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
			'required' => 'Nama Harus Diisi',
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
				'is_unique' => 'Username sudah terdaftar!',
				'required' => 'Username Harus Diisi'
		]);
		$this->form_validation->set_rules('password','Password','required|trim|min_length[5]|matches[password2]', [
				'matches' => 'Password Tidak Sesuai',
				'min_length' => 'Password terlalu pendek minimal 5 karakter',
				'required' => 'Password Harus Diisi'
		]);
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password]',[
			'matches' => 'Password Harus Sama',
			'required' => 'Konfirmasi Password Harus Diisi'
		]);
		
		if($this->form_validation->run() == false){
			$data['title'] = 'Daftar | Perumahan Prima Indah';
			$this->load->view('Auth/daftar',$data);

		}else{

			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

				'akses' => 'Kepala Kelurahan'
			];

			$this->db->insert('users', $data);


			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
 			 Login Berhasil, Silahkan Login !</div>');
			redirect('Auth');

		}
	}



	public function logout()
	{
		
		$this->session->sess_destroy();


		$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
 			 Login Berhasil, Silahkan Login !</div>');
        redirect(base_url('Auth'));
	}










}
