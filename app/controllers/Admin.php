<?php

class Admin extends Controller {
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			header('location: '. base_url . '/login');
			exit;
		}
	} 
	public function index()
	{
		$data['title'] = 'Halaman Admin';
		$username = $_SESSION['username'];
		$data['user'] = $this->model('AdminModel')->getDataUserAll();
		$this->view('template/headers',$data);
		$this->view('admin/user',$data);
		$this->view('template/footers',$data);
	}

	public function dosen()
	{
		$data['title'] = 'Halaman Admin';
		$username = $_SESSION['username'];
		$data['dosen'] = $this->model('AdminModel')->getDataDosen();
		$this->view('template/headers',$data);
		$this->view('admin/dosen',$data);
		$this->view('template/footers',$data);
	}

	public function mahasiswa()
	{
		$data['title'] = 'Halaman Admin';
		$username = $_SESSION['username'];
		$data['mahasiswa'] = $this->model('AdminModel')->getDataMahasiswa();
		$this->view('template/headers',$data);
		$this->view('admin/mahasiswa',$data);
		$this->view('template/footers',$data);
	}

	public function matakuliah()
	{
		$data['title'] = 'Halaman Admin';
		$username = $_SESSION['username'];
		$data['matakuliah'] = $this->model('AdminModel')->getDataMataKuliah();
		$this->view('template/headers',$data);
		$this->view('admin/matakuliah',$data);
		$this->view('template/footers',$data);
	}

	public function kelas()
	{
		$data['title'] = 'Halaman Admin';
		$username = $_SESSION['username'];
		$data['kelas'] = $this->model('AdminModel')->getDataKelas();
		$data['matakuliah'] = $this->model('AdminModel')->getDataMataKuliah();
		$data['dosen'] = $this->model('AdminModel')->getDataDosen();
		$this->view('template/headers',$data);
		$this->view('admin/kelas',$data);
		$this->view('template/footers',$data);
	}

	public function detailKelas()
	{
		$data['title'] = 'Halaman Admin';
		$username = $_SESSION['username'];
		$data['kelas'] = $this->model('AdminModel')->getDataKelas();
		$data['matakuliah'] = $this->model('AdminModel')->getDataMataKuliah();
		$data['dosen'] = $this->model('AdminModel')->getDataDosen();
		$data['mahasiswa'] = $this->model('AdminModel')->getDataMahasiswa();
		$data['detail'] = $this->model('AdminModel')->getDataDetailKelas();
		$this->view('template/headers',$data);
		$this->view('admin/detail_kelas',$data);
		$this->view('template/footers',$data);
	}

	public function showData()
	{
		$this->view('admin/show_data');
	}

	public function Data()
	{
		$this->view('admin/data_data');
	}
	

	public function DataDosen()
	{
		$this->view('admin/data_dosen');
	}

	public function cariUser()
	{
		$data['title'] = 'Halaman Admin';
		$username = $_SESSION['username'];
		$this->view('template/headers',$data);
		$this->view('admin/cari_user',$data);
		$this->view('template/footers',$data);
	}

	public function cariDosen()
	{
		$data['title'] = 'Halaman Admin';
		$username = $_SESSION['username'];
		$this->view('template/headers',$data);
		$this->view('admin/cari_dosen',$data);
		$this->view('template/footers',$data);
	}

	public function cariMahasiswa()
	{
		$data['title'] = 'Halaman Admin';
		$username = $_SESSION['username'];
		$this->view('template/headers',$data);
		$this->view('admin/cari_mahasiswa',$data);
		$this->view('template/footers',$data);
	}

	public function cariMataKuliah()
	{
		$data['title'] = 'Halaman Admin';
		$username = $_SESSION['username'];
		$this->view('template/headers',$data);
		$this->view('admin/cari_matakuliah',$data);
		$this->view('template/footers',$data);
	}

	public function cariKelas()
	{
		$data['title'] = 'Halaman Admin';
		$username = $_SESSION['username'];
		$data['kelas'] = $this->model('AdminModel')->getDataKelas();
		$data['matakuliah'] = $this->model('AdminModel')->getDataMataKuliah();
		$data['dosen'] = $this->model('AdminModel')->getDataDosen();
		$this->view('template/headers',$data);
		$this->view('admin/cari_kelas',$data);
		$this->view('template/footers',$data);
	}

	public function cariDetailKelas()
	{
		$data['title'] = 'Halaman Admin';
		$username = $_SESSION['username'];
		$data['kelas'] = $this->model('AdminModel')->getDataKelas();
		$data['matakuliah'] = $this->model('AdminModel')->getDataMataKuliah();
		$data['dosen'] = $this->model('AdminModel')->getDataDosen();
		$data['mahasiswa'] = $this->model('AdminModel')->getDataMahasiswa();
		$data['detail'] = $this->model('AdminModel')->getDataDetailKelas();
		$this->view('template/headers',$data);
		$this->view('admin/cari_detail_kelas',$data);
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

    public function hapus($id){
		if( $this->model('AdminModel')->deleteUser($id) > 0 ) {
			Flasher::setMessage('','Data Berhasil Dihapus','success');
			header('location: '. base_url . '/Admin');
			exit;			
		}else{
			Flasher::setMessage('','Data Gagal Dihapus','error');
			header('location: '. base_url . '/Admin');
			exit;	
		}
	}

	public function hapusDosen($id){
		if($this->model('AdminModel')->deleteUser($id) > 0 ) {
			Flasher::setMessage('','Data Berhasil Dihapus','success');
			header('location: '. base_url . '/Admin/dosen');
			exit;			
		}else{
			Flasher::setMessage('','Data Gagal Dihapus','error');
			header('location: '. base_url . '/Admin/dosen');
			exit;	
		}
	}

	public function hapusMahasiswa($id){
		if($this->model('AdminModel')->deleteUser($id) > 0 ) {
			Flasher::setMessage('','Data Berhasil Dihapus','success');
			header('location: '. base_url . '/Admin/mahasiswa');
			exit;			
		}else{
			Flasher::setMessage('','Data Gagal Dihapus','error');
			header('location: '. base_url . '/Admin/mahasiswa');
			exit;	
		}
	}

	public function hapusMataKuliah($id){
		if($this->model('AdminModel')->deleteMataKuliah($id) > 0 ) {
			Flasher::setMessage('','Mata Kuliah Berhasil Dihapus','success');
			header('location: '. base_url . '/Admin/matakuliah');
			exit;			
		}else{
			Flasher::setMessage('','Data Gagal Dihapus','error');
			header('location: '. base_url . '/Admin/matakuliah');
			exit;	
		}
	}

	public function hapusKelas($id){
		if($this->model('AdminModel')->deleteKelas($id) > 0 ) {
			Flasher::setMessage('','Kelas Berhasil Dihapus','success');
			header('location: '. base_url . '/Admin/kelas');
			exit;			
		}else{
			Flasher::setMessage('','Data Gagal Dihapus','error');
			header('location: '. base_url . '/Admin/kelas');
			exit;	
		}
	}

	public function hapusDetailKelas($id){
		if($this->model('AdminModel')->deleteDetailKelas($id) > 0 ) {
			Flasher::setMessage('','Detail Kelas Berhasil Dihapus','success');
			header('location: '. base_url . '/Admin/detailkelas');
			exit;			
		}else{
			Flasher::setMessage('','Data Gagal Dihapus','error');
			header('location: '. base_url . '/Admin/detailkelas');
			exit;	
		}
	}

    public function ubah_data_user()
	{
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$this->model('AdminModel')->ubahDataUser($id, $username, $password, $role);
		Flasher::setMessage('Berhasil','Update Data User','success');
		exit;
	}

	public function ubah_data_dosen()
	{
		$username 	= $_POST['username'];
		$id			= $_POST['id'];
		$nid		= $username;
		$name		= $_POST['nama'];
		$this->model('AdminModel')->ubahDataDosen($nid, $name, $id);
		Flasher::setMessage('Berhasil','Update Data Dosen','success');
		exit;
	}

	public function ubah_data_mahasiswa()
	{
		$username 	= $_POST['username'];
		$id			= $_POST['id'];
		$nim		= $username;
		$name		= $_POST['nama'];
		$this->model('AdminModel')->ubahDataMahasiswa($nim, $name, $id);
		Flasher::setMessage('Berhasil','Update Data Mahasiswa','success');
		exit;
	}

	public function ubah_mata_kuliah()
	{
		$kodeMK 		= $_POST['kode_mk'];
		$name			= $_POST['nama_mk'];
		$this->model('AdminModel')->ubahMataKuliah($kodeMK, $name);
		Flasher::setMessage('Berhasil','Update Mata Kuliah','success');
		exit;
	}

	public function ubah_kelas()
	{
		$idKelas = $_POST['id_kelas'];
		$kodeKelas = $_POST['kode_kelas'];

		$mk = $_POST['kode_mk'];
		$sliceMK = explode("|", $mk);
		$kodeMK = $sliceMK[0];
		$namaMK = $sliceMK[1];

		$dosen = $_POST['nid_dosen'];
		$sliceDosen = explode("|", $dosen);
		$nidDosen = $sliceDosen[0];
		$namaDosen = $sliceDosen[1];

		$row = $this->model('AdminModel')->cekKodeKelas($kodeKelas, $kodeMK, $nidDosen);
		if($row['kode_kelas'] == $kodeKelas AND $row['kode_mk'] == $kodeMK AND $row['nid_dosen'] == $nidDosen){
				Flasher::setMessage('Error','Kode Kelas sudah pernah digunakan!','error');
				exit;
			} else {
				$this->model('AdminModel')->ubahKelas($idKelas, $kodeKelas, $kodeMK, $namaMK, $nidDosen, $namaDosen);
				Flasher::setMessage('Berhasil','Update Kelas','success');
				exit;
		}
	}

	public function ubah_detail_kelas()
	{
		$idDetailKelas = $_POST['id_detail_kelas'];
		$kodeKelas = $_POST['kode_kelas'];

		$mk = $_POST['kode_mk'];
		$sliceMK = explode("|", $mk);
		$kodeMK = $sliceMK[0];
		$namaMK = $sliceMK[1];

		$dosen = $_POST['nid_dosen'];
		$sliceDosen = explode("|", $dosen);
		$nidDosen = $sliceDosen[0];
		$namaDosen = $sliceDosen[1];

		$mahasiswa = $_POST['nim_mahasiswa'];
		$sliceMahasiswa = explode("|", $mahasiswa);
		$nimMahasiswa = $sliceMahasiswa[0];
		$namaMahasiswa = $sliceMahasiswa[1];

		$row = $this->model('AdminModel')->cekDetailKelas($kodeKelas, $kodeMK, $nidDosen, $nimMahasiswa);
		if($row['kode_kelas'] == $kodeKelas AND $row['kode_mk'] == $kodeMK AND $row['nid_dosen'] == $nidDosen AND $row['nim_mahasiswa'] == $nimMahasiswa){
				Flasher::setMessage('Error','Kode Kelas sudah pernah digunakan!','error');
				exit;
			} else {
		$this->model('AdminModel')->ubahDetailKelas($idDetailKelas, $kodeKelas, $kodeMK, $namaMK, $nidDosen, $namaDosen, $nimMahasiswa, $namaMahasiswa);
		Flasher::setMessage('Berhasil','Update Kelas','success');
		exit;
		}
	}

	public function tambah_data_user()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$name = $_POST['nama'];
		$row = $this->model('AdminModel')->cekUsername($username);
		if($row['username'] == $username){
			Flasher::setMessage('Error','Username yang anda masukan sudah pernah digunakan!','error');
			header('location: '. base_url . '/admin');
			exit;
		} else {
			if(isset($name)){
				if($_POST['role'] == "Dosen"){
					$this->model('AdminModel')->tambahDataUser($username, $password, $role);
					$this->model('AdminModel')->tambahDataDosen($username, $name);
					Flasher::setMessage('Berhasil','Tambah Data User','success');
					header('location: '. base_url . '/admin');
					exit;
				} else {
					$this->model('AdminModel')->tambahDataUser($username, $password, $role);
					$this->model('AdminModel')->tambahDataMahasiswa($username, $name);
					Flasher::setMessage('Berhasil','Tambah Data User','success');
					header('location: '. base_url . '/admin');
					exit;
				}
			} else {
			$this->model('AdminModel')->tambahDataUser($username, $password, $role);
			Flasher::setMessage('Berhasil','Tambah Data User','success');
			header('location: '. base_url . '/admin');
			exit;
			}
		}
	}

	public function tambah_data_dosen()
	{
		$username = $_POST['nid'];
		$name = $_POST['nama'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$row = $this->model('AdminModel')->cekUsername($username);
		if($row['username'] == $username){
			Flasher::setMessage('Error','Username yang anda masukan sudah pernah digunakan!','error');
			header('location: '. base_url . '/admin/dosen');
			exit;
		} else {
			$this->model('AdminModel')->tambahDataUser($username, $password, $role);
			$this->model('AdminModel')->tambahDataDosen($username, $name);
			Flasher::setMessage('Berhasil','Tambah Data Dosen','success');
			header('location: '. base_url . '/admin/dosen');
			exit;
		}
	}

		public function tambah_data_mahasiswa()
		{
			$username = $_POST['nim'];
			$name = $_POST['nama'];
			$password = $_POST['password'];
			$role = $_POST['role'];
			$row = $this->model('AdminModel')->cekUsername($username);
			if($row['username'] == $username){
				Flasher::setMessage('Error','Username yang anda masukan sudah pernah digunakan!','error');
				header('location: '. base_url . '/admin/mahasiswa');
				exit;
			} else {
				$this->model('AdminModel')->tambahDataUser($username, $password, $role);
				$this->model('AdminModel')->tambahDataMahasiswa($username, $name);
				Flasher::setMessage('Berhasil','Tambah Data Mahasiswa','success');
				header('location: '. base_url . '/admin/mahasiswa');
				exit;
			}
		}

		public function tambah_mata_kuliah()
		{
			$kodeMK = $_POST['kode_mk'];
			$name = $_POST['nama_mk'];
			$row = $this->model('AdminModel')->cekKodeMK($kodeMK);
			if($row['kode_mk'] == $kodeMK){
				Flasher::setMessage('Error','Kode Mata Kuliah sudah pernah digunakan!','error');
				header('location: '. base_url . '/admin/matakuliah');
				exit;
			} else {
				$this->model('AdminModel')->tambahMataKuliah($kodeMK, $name);
				Flasher::setMessage('Berhasil','Tambah Mata Kuliah','success');
				header('location: '. base_url . '/admin/matakuliah');
				exit;
			}
		}

		public function tambah_kelas()
		{
			$kodeKelas = $_POST['kode_kelas'];

			$mk = $_POST['kode_mk'];
			$sliceMK = explode("|", $mk);
			$kodeMK = $sliceMK[0];
			$namaMK = $sliceMK[1];

			$dosen = $_POST['nid_dosen'];
			$sliceDosen = explode("|", $dosen);
			$nidDosen = $sliceDosen[0];
			$namaDosen = $sliceDosen[1];

			$row = $this->model('AdminModel')->cekKodeKelas($kodeKelas, $kodeMK, $nidDosen);
			if($row['kode_kelas'] == $kodeKelas AND $row['kode_mk'] == $kodeMK AND $row['nid_dosen'] == $nidDosen){
				Flasher::setMessage('Error','Kode Kelas sudah pernah digunakan!','error');
				header('location: '. base_url . '/admin/kelas');
				exit;
			} else {
			$this->model('AdminModel')->tambahKelas($kodeKelas, $kodeMK, $namaMK, $nidDosen, $namaDosen);
				Flasher::setMessage('Berhasil','Tambah Kelas','success');
				header('location: '. base_url . '/admin/kelas');
				exit;
			}
		}

		public function tambah_detail_kelas()
		{
			$kodeKelas = $_POST['kode_kelas'];

			$mk = $_POST['kode_mk'];
			$sliceMK = explode("|", $mk);
			$kodeMK = $sliceMK[0];
			$namaMK = $sliceMK[1];

			$dosen = $_POST['nid_dosen'];
			$sliceDosen = explode("|", $dosen);
			$nidDosen = $sliceDosen[0];
			$namaDosen = $sliceDosen[1];

			$mahasiswa = $_POST['nim_mahasiswa'];
			$sliceMahasiswa = explode("|", $mahasiswa);
			$nimMahasiswa = $sliceMahasiswa[0];
			$namaMahasiswa = $sliceMahasiswa[1];

			$row = $this->model('AdminModel')->cekDetailKelas($kodeKelas, $kodeMK, $nidDosen, $nimMahasiswa);
			if($row['kode_kelas'] == $kodeKelas AND $row['kode_mk'] == $kodeMK AND $row['nid_dosen'] == $nidDosen AND $row['nim_mahasiswa'] == $nimMahasiswa){
				Flasher::setMessage('Error','Data Sudah Ada!','error');
				header('location: '. base_url . '/admin/detailkelas');
				exit;
			} else {
			$this->model('AdminModel')->tambahDetailKelas($kodeKelas, $kodeMK, $namaMK, $nidDosen, $namaDosen, $nimMahasiswa, $namaMahasiswa);
				Flasher::setMessage('Berhasil','ditambahkan','success');
				header('location: '. base_url . '/admin/detailkelas');
				exit;
			}
		}
}