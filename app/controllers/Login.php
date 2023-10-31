<?php

class Login extends Controller {
	public function index()
	{
		$data['title'] = 'Halaman Login';
		$this->view('template/headers', $data);
		$this->view('auth/login', $data);
		$this->view('template/footers', $data);
	}

	public function prosesLogin() {
		if($row = $this->model('LoginModel')->checkLogin($_POST) > 0 ) {
			if($row = $this->model('LoginModel')->checkLoginRole($_POST)) {
				if($row['role'] == 'Admin') {
					$_SESSION['username'] = $row['username'];
					$_SESSION['role'] 	  = $row['role'];
					$_SESSION['session_login'] = 'sudah_login';
					header('location: '. base_url . '/Admin');
				} else if($row['role'] == 'Mahasiswa') {
					$_SESSION['username'] = $row['username'];
					$_SESSION['role'] 	  = $row['role'];
					$_SESSION['session_login'] = 'sudah_login';
					header('location: '. base_url . '/Mahasiswa');
				} else if($row['role'] == 'Dosen') {
					$_SESSION['username'] = $row['username'];
					$_SESSION['role'] 	  = $row['role'];
					$_SESSION['session_login'] = 'sudah_login';
					header('location: '. base_url . '/Dosen');
				}
			}  
		} else {
			Flasher::setMessage('Error','username dan password yang anda masukan salah!','error');
			header('location: '. base_url . '/login');
			exit;	
		}
	}
}