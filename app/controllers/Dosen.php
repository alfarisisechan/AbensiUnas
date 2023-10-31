<?php

class Dosen extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			header('location: '. base_url . '/login');
			exit;
		}
	} 
	public function index()
	{
		$data['title'] = 'Halaman Dosen';
		$id = $_SESSION['username'];
		$data['dosen'] = $this->model('DosenModel')->getDosenById($id);
		$data['matakuliah'] = $this->model('MataKuliahModel')->getKelasByNid($id);
		$data['MhsKodeMK'] = $this->model('DosenModel')->getMahasiswaByNid($id);
		$this->view('template/headers',$data);
		$this->view('dosen/home',$data);
		$this->view('template/footers',$data);
	}

    public function cariMhsMK()
    {
		$data['title'] = 'Halaman Dosen';
        $id = $_SESSION['username'];
		$a = $_POST['kode_mk'];
		$slice = explode("|", $a);
		$mk = $slice[0];
		$namaMK = $slice[1];
		$dari = $_POST['dari'];
		$ke = $_POST['ke'];
		$data['kode'] = $mk;
		$data['namaMK'] = $namaMK;
		$data['dosen'] = $this->model('DosenModel')->getDosenById($id);
        $data['matakuliah'] = $this->model('MataKuliahModel')->getKelasByNid($id);
        $data['MhsKodeMK'] = $this->model('DosenModel')->getMahasiswaByMK($mk,$id,$dari,$ke);
		$_SESSION['kode_mk'] = $mk;
		$_SESSION['nama_mk'] = $namaMK;
		$this->view('template/headers',$data);
		$this->view('dosen/mk',$data);
		$this->view('template/footers',$data);
    }

	public function Export()
    {
		$data['title'] = 'Halaman Dosen';
		$mk = $_SESSION['kode_mk'];
		$namaMK = $_SESSION['nama_mk'];
		$id = $_SESSION['username'];
		$data['username'] = $id;
		$data['kode_mk'] = $mk;
		$data['namaMK'] = $namaMK;
        $data['MhsKodeMK'] = $this->model('DosenModel')->getMahasiswaByTotal($mk,$id);
		// $data['MhsKodeMK'] = $this->model('DosenModel')->getMahasiswaByMK($mk,$id);
		$this->view('dosen/export',$data);
    }

	public function cariMhs()
    {
		$data['title'] = 'Halaman Dosen';
		$id = $_SESSION['username'];
		$data['dosen'] = $this->model('DosenModel')->getDosenById($id);
		$data['matakuliah'] = $this->model('MataKuliahModel')->getKelasByNid($id);
		$data['MhsKodeMK'] = $this->model('DosenModel')->getMahasiswaByNid($id);
		$this->view('template/headers',$data);
		$this->view('dosen/cari',$data);
		$this->view('template/footers',$data);
    }

	public function ubah_password()
	{
		$id = $_SESSION['username'];
		$password = $_POST['password'];
		$this->model('UserModel')->ubahPassword($id, $password);
		Flasher::setMessage('Berhasil','Ubah password berhasil','success');
	}

	public function ubah_kehadiran()
	{
		$nid = $_SESSION['username'];
		$nim = $_POST['nim'];
		$kodeAbsensi = $_POST['kode_absensi'];
		$status = $_POST['status'];
		$kodeMK = $_POST['kode_mk'];
		$this->model('DosenModel')->ubahStatusKehadiran($nid, $nim, $status, $kodeMK, $kodeAbsensi);
		Flasher::setMessage('Berhasil','Update status kehadiran','success');
	}
	
}