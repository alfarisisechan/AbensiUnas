<?php

class Mahasiswa extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			header('location: '. base_url . '/login');
			exit;
		}
	} 
	public function index()
	{
		$id = $_SESSION['username'];
		$data['title'] = 'Halaman Absensi';
		$data['mahasiswa'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
		$data['jadwal'] = $this->model('MahasiswaModel')->getJadwalMahasiswaById($id);
		$this->view('template/headers',$data);
		$this->view('mahasiswa/home',$data);
		$this->view('template/footers',$data);
	}

	public function ubah_password()
	{
		$id = $_SESSION['username'];
		$password = $_POST['password'];
		$this->model('UserModel')->ubahPassword($id, $password);
		Flasher::setMessage('Berhasil','Ubah password berhasil','success');
		header('location: '. base_url . '/mahasiswa/home');
		exit;
	}

	public function absensi()
	{
		$id = $_SESSION['username'];
		$data['title'] = 'Halaman Absensi';
		$data['mahasiswa'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
		$this->view('template/headers',$data);
		$this->view('mahasiswa/absensi',$data);
		$this->view('template/footers',$data);
	}

	public function fail()
	{
		$id = $_SESSION['username'];
		$data['title'] = 'Halaman Absensi';
		$data['mahasiswa'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
		$this->view('template/headers',$data);
		$this->view('mahasiswa/absensi_fail',$data);
		$this->view('template/footers',$data);
	}

	public function cek_lokasi()
	{
	  $radiusBumi = 6371000;
	  $latitudeMahasiswa = $_POST['latitude'];
	  $longitudeMahasiswa = $_POST['longitude'];
	  $latKampus = deg2rad(-6.281065778916218);
	  $lonKampus = deg2rad(106.83929090063673);
	  $latUser = deg2rad($latitudeMahasiswa);
	  $lonUser = deg2rad($longitudeMahasiswa);
	  $latitudeDelta = $latUser - $latKampus;
	  $longitudeDelta = $lonUser - $lonKampus;
	  $sudut = 2 * asin(sqrt(pow(sin($latitudeDelta / 2), 2) +
	  cos($latKampus) * cos($latUser) * pow(sin($longitudeDelta / 2), 2)));
	  $jarak = $sudut * $radiusBumi;
	  if($jarak > 50) {
		Flasher::setMessage('','Lokasi anda terlalu jauh dari area kampus!','error');
		header('location: '. base_url . '/Mahasiswa/fail');
	  } else {
		$_SESSION['jarak'] = $jarak;
		$_SESSION['namaMHS'] = $_POST['nama'];
		header('location: '. base_url . '/Mahasiswa/pilih_mata_kuliah');
	  }
  }
    public function pilih_mata_kuliah()
	{
		$id = $_SESSION['username'];
		$data['title'] = 'Halaman Absensi';
		$data['mahasiswa'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
        $data['matakuliah'] = $this->model('MataKuliahModel')->getMKByIdNim($id);
		$this->view('template/headers',$data);
		$this->view('mahasiswa/pilih_matakuliah',$data);
		$this->view('template/footers',$data);
	}

	public function pilih_kelas()
	{
		$data['title'] = 'Halaman Absensi';
		$id = $_SESSION['username'];
		$a = $_POST['kode_mk'];
		$slice = explode("|", $a);
		$mk = $slice[0];
		$namaMK = $slice[1];
		$_SESSION['kode_mk'] = $mk;
		$_SESSION['nama_mk'] = $namaMK;
		$data['mahasiswa'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
		$data['kelas'] = $this->model('MataKuliahModel')->getKelasById($id, $mk);
		$this->view('template/headers',$data);
		$this->view('mahasiswa/pilih_kelas',$data);
		$this->view('template/footers',$data);
	}

	public function ambil_bukti()
	{
		$id = $_SESSION['username'];
		$data['title'] = 'Halaman Absensi';
		$a = $_POST['kode_mk'];
		$slice = explode("|", $a);
		$_SESSION['kode_kelas'] = $slice[0];
		$_SESSION['nid'] = $slice[1];
		$namaDosen = $slice[2];
		$_SESSION['nama_dosen'] = $namaDosen;
		$data['mahasiswa'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
		$this->view('template/headers',$data);
		$this->view('mahasiswa/ambil_bukti',$data);
		$this->view('template/footers',$data);
	}

	public function simpan_bukti()
	{
		$username = $_SESSION['username'];
		$name = $_SESSION['namaMHS'];
		$mk = $_SESSION['kode_mk'];
		$namaMK = $_SESSION['nama_mk'];
		$kelas = $_SESSION['kode_kelas'];
		$nid = $_SESSION['nid'];
		$namaDosen = $_SESSION['nama_dosen'];
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d');
		$jarak = $_SESSION['jarak'];
		
		$time = new DateTime( 'now', new DateTimeZone('Asia/Jakarta'));
		$times = $time->format('H:i:s');
		
		$filename = uniqid(rand(), true) . '.jpg';
		$filepath = 'image/bukti_kehadiran/';

		if(!is_dir($filepath))
			mkdir($filepath);
		if(isset($_FILES['webcam'])){	
			$row = $this->model('AbsensiModel')->CekAbsensi();
			if($row['tanggal'] == $date AND $row['kode_mk'] == $mk AND $row['nim_mahasiswa'] == $username){
				Flasher::setMessage('Gagal','Anda Sudah Mengisi Absensi Hari Ini','error');
				$_SESSION['status_absensi'] = 'Sudah';
			} else {
				move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);
				$this->model('AbsensiModel')->Absensi($mk,$namaMK,$nid,$kelas,$namaDosen,$username,$name,$date,$times,$jarak,$filename);
				}
			}
	}

	public function cek_status_absensi()
	{
		if($_SESSION['status_absensi'] == 'Sudah'){
			Flasher::setMessage('Gagal','Anda Sudah Mengisi Absensi','error');
			header('location: '. base_url . '/mahasiswa/pilih_mata_kuliah');
			unset($_SESSION['status_absensi']);
		} else {
			Flasher::setMessage('Berhasil','Berhasil Mengisi Absensi','success');
			header('location: '. base_url . '/mahasiswa/absensi_berhasil');
		}
	}

	public function absensi_berhasil()
	{
	  $id = $_SESSION['username'];
	  $data['title'] = 'Halaman Absensi';
	  $data['mahasiswa'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
	  session_destroy();
	  $this->view('template/headers',$data);
	  $this->view('mahasiswa/absensi_berhasil',$data);
	  $this->view('template/footers',$data);
	}


}