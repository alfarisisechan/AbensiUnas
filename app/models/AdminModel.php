<?php

class AdminModel {
	
	private $table = 'user_tbl';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

    public function getDataUserAll()
	{
		$this->db->query('SELECT * FROM ' . $this->table . '');
		return $this->db->resultSet();
	}

	public function getDataDosen()
	{
		$this->db->query('SELECT * FROM dosen_tbl');
		return $this->db->resultSet();
	}

	public function getDataMahasiswa()
	{
		$this->db->query('SELECT * FROM mahasiswa_tbl');
		return $this->db->resultSet();
	}

	public function getDataMataKuliah()
	{
		$this->db->query('SELECT * FROM mk_tbl');
		return $this->db->resultSet();
	}

	public function getDataKelas()
	{
		$this->db->query('SELECT * FROM kelas_tbl');
		return $this->db->resultSet();
	}

	public function getDataDetailKelas()
	{
		$this->db->query('SELECT * FROM detail_kelas_tbl');
		return $this->db->resultSet();
	}

	public function cekUsername($username){
		$this->db->query("SELECT * FROM user_tbl WHERE username = :username");
		$this->db->bind('username', $username);
		return $this->db->single();
	}

	public function cekKodeMK($kodeMK){
		$this->db->query("SELECT * FROM mk_tbl WHERE kode_mk = :kode_mk");
		$this->db->bind('kode_mk', $kodeMK);
		return $this->db->single();
	}

	public function cekKodeKelas($kodeKelas, $kodeMK, $nidDosen){
		$this->db->query("SELECT * FROM kelas_tbl WHERE kode_mk =:kode_mk AND kode_kelas = :kode_kelas AND nid_dosen =:nid_dosen");
		$this->db->bind('kode_mk', $kodeMK);
		$this->db->bind('kode_kelas', $kodeKelas);
		$this->db->bind('nid_dosen', $nidDosen);
		return $this->db->single();
	}

	public function cekDetailKelas($kodeKelas, $kodeMK, $nidDosen, $nimMahasiswa){
		$this->db->query("SELECT * FROM detail_kelas_tbl WHERE kode_mk =:kode_mk AND kode_kelas = :kode_kelas AND nid_dosen =:nid_dosen AND nim_mahasiswa =:nim_mahasiswa");
		$this->db->bind('kode_mk', $kodeMK);
		$this->db->bind('kode_kelas', $kodeKelas);
		$this->db->bind('nid_dosen', $nidDosen);
		$this->db->bind('nim_mahasiswa', $nimMahasiswa);
		return $this->db->single();
	}

    public function deleteUser($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE username=:username');
		$this->db->bind('username',$id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function deleteMataKuliah($id)
	{
		$this->db->query('DELETE FROM mk_tbl WHERE kode_mk=:kode_mk');
		$this->db->bind('kode_mk',$id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function deleteKelas($id)
	{
		$this->db->query('DELETE FROM kelas_tbl WHERE id_kelas=:id_kelas');
		$this->db->bind('id_kelas',$id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function deleteDetailKelas($id)
	{
		$this->db->query('DELETE FROM detail_kelas_tbl WHERE id_detail_kelas=:id_detail_kelas');
		$this->db->bind('id_detail_kelas',$id);
		$this->db->execute();
		return $this->db->rowCount();
	}

    public function ubahDataUser($id, $username, $password, $role)
	{
		$query = "UPDATE user_tbl SET username =:username, password =:password, role =:role WHERE id_user =:id_user";
		$this->db->query($query);
		$this->db->bind('id_user', $id);
		$this->db->bind('username', $username);
		$this->db->bind('password', $password);
		$this->db->bind('role', $role);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function ubahDataDosen($nid, $name, $id)
	{
		$query = "UPDATE dosen_tbl SET nid_dosen =:nid_dosen, nama_dosen =:nama_dosen WHERE id_dosen =:id_dosen";
		$this->db->query($query);
		$this->db->bind('nid_dosen', $nid);
		$this->db->bind('nama_dosen', $name);
		$this->db->bind('id_dosen', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function ubahDataMahasiswa($nim, $name, $id)
	{
		$query = "UPDATE mahasiswa_tbl SET nim_mahasiswa =:nim_mahasiswa, nama_mahasiswa =:nama_mahasiswa WHERE id_mahasiswa =:id_mahasiswa";
		$this->db->query($query);
		$this->db->bind('nim_mahasiswa', $nim);
		$this->db->bind('nama_mahasiswa', $name);
		$this->db->bind('id_mahasiswa', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function ubahMataKuliah($kodeMK, $name)
	{
		$query = "UPDATE mk_tbl SET kode_mk =:kode_mk, nama_mk =:nama_mk WHERE kode_mk =:kode_mk";
		$this->db->query($query);
		$this->db->bind('kode_mk', $kodeMK);
		$this->db->bind('nama_mk', $name);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function ubahKelas($idKelas, $kodeKelas, $kodeMK, $namaMK, $nidDosen, $namaDosen)
	{
		$query = "UPDATE kelas_tbl SET kode_kelas =:kode_kelas, kode_mk =:kode_mk, nama_mk =:nama_mk, nid_dosen =:nid_dosen, nama_dosen =:nama_dosen WHERE id_kelas =:id_kelas";
		$this->db->query($query);
		$this->db->bind('id_kelas', $idKelas);
		$this->db->bind('kode_kelas', $kodeKelas);
		$this->db->bind('kode_mk', $kodeMK);
		$this->db->bind('nama_mk', $namaMK);
		$this->db->bind('nid_dosen', $nidDosen);
		$this->db->bind('nama_dosen', $namaDosen);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function ubahDetailKelas($idDetailKelas, $kodeKelas, $kodeMK, $namaMK, $nidDosen, $namaDosen, $nimMahasiswa, $namaMahasiswa)
	{
		$query = "UPDATE detail_kelas_tbl SET kode_kelas =:kode_kelas, kode_mk =:kode_mk, nama_mk =:nama_mk, nid_dosen =:nid_dosen, nama_dosen =:nama_dosen, nim_mahasiswa =:nim_mahasiswa, nama_mahasiswa =:nama_mahasiswa WHERE id_detail_kelas =:id_detail_kelas";
		$this->db->query($query);
		$this->db->bind('id_detail_kelas', $idDetailKelas);
		$this->db->bind('kode_kelas', $kodeKelas);
		$this->db->bind('kode_mk', $kodeMK);
		$this->db->bind('nama_mk', $namaMK);
		$this->db->bind('nid_dosen', $nidDosen);
		$this->db->bind('nama_dosen', $namaDosen);
		$this->db->bind('nim_mahasiswa', $nimMahasiswa);
		$this->db->bind('nama_mahasiswa', $namaMahasiswa);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function tambahDataUser($username, $password, $role)
	{
		$query = "INSERT INTO user_tbl (username, password, role) VALUES (:username,:password,:role)";
		$this->db->query($query);
		$this->db->bind('username', $username);
		$this->db->bind('password', $password);
		$this->db->bind('role', $role);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function tambahDataDosen($username, $name)
	{
		$query = "INSERT INTO dosen_tbl (nid_dosen, nama_dosen) VALUES (:nid,:nama_dosen)";
		$this->db->query($query);
		$this->db->bind('nid', $username);
		$this->db->bind('nama_dosen', $name);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function tambahDataMahasiswa($username, $name)
	{
		$query = "INSERT INTO mahasiswa_tbl (nim_mahasiswa, nama_mahasiswa) VALUES (:nim,:nama_mahasiswa)";
		$this->db->query($query);
		$this->db->bind('nim', $username);
		$this->db->bind('nama_mahasiswa', $name);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function tambahMataKuliah($kodeMK, $name)
	{
		$query = "INSERT INTO mk_tbl (kode_mk, nama_mk) VALUES (:kode_mk,:nama_mk)";
		$this->db->query($query);
		$this->db->bind('kode_mk', $kodeMK);
		$this->db->bind('nama_mk', $name);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function tambahKelas($kodeKelas, $kodeMK, $namaMK, $nidDosen, $namaDosen)
	{
		$query = "INSERT INTO kelas_tbl (kode_kelas,kode_mk, nama_mk, nid_dosen, nama_dosen) VALUES (:kode_kelas,:kode_mk,:nama_mk,:nid_dosen,:nama_dosen)";
		$this->db->query($query);
		$this->db->bind('kode_kelas', $kodeKelas);
		$this->db->bind('kode_mk', $kodeMK);
		$this->db->bind('nama_mk', $namaMK);
		$this->db->bind('nid_dosen', $nidDosen);
		$this->db->bind('nama_dosen', $namaDosen);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function tambahDetailKelas($kodeKelas, $kodeMK, $namaMK, $nidDosen, $namaDosen, $nimMahasiswa, $namaMahasiswa)
	{
		$query = "INSERT INTO detail_kelas_tbl (kode_kelas,kode_mk, nama_mk, nid_dosen, nama_dosen, nim_mahasiswa, nama_mahasiswa) VALUES (:kode_kelas,:kode_mk,:nama_mk,:nid_dosen,:nama_dosen,:nim_mahasiswa,:nama_mahasiswa)";
		$this->db->query($query);
		$this->db->bind('kode_kelas', $kodeKelas);
		$this->db->bind('kode_mk', $kodeMK);
		$this->db->bind('nama_mk', $namaMK);
		$this->db->bind('nid_dosen', $nidDosen);
		$this->db->bind('nama_dosen', $namaDosen);
		$this->db->bind('nim_mahasiswa', $nimMahasiswa);
		$this->db->bind('nama_mahasiswa', $namaMahasiswa);
		$this->db->execute();
		return $this->db->rowCount();
	}
}