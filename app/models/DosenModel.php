<?php

class DosenModel {
	
	private $table = 'dosen_tbl';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

    public function getDosenById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE nid_dosen=:nid');
		$this->db->bind('nid',$id);
		return $this->db->resultSet();
	}


	public function getMahasiswaByNid($id)
	{
		$this->db->query('SELECT * FROM absensi_tbl WHERE nid_dosen = '.$id.'');
		return $this->db->resultSet();
	}

	public function getKelasByNid($id)
	{
		$this->db->query('SELECT * FROM kelas_tbl, mk_tbl WHERE kelas_tbl.kode_mk = mk_tbl.kode_mk AND kelas_tbl.nid_dosen =:nid');
		$this->db->bind('nid',$id);
		return $this->db->resultSet();
	}

	public function getMahasiswaByMK($mk,$id,$dari,$ke)
	{
		$this->db->query("SELECT * FROM absensi_tbl WHERE kode_mk=:kode_mk AND nid_dosen =:nid AND tanggal BETWEEN '".$dari."' AND '".$ke."'");
		$this->db->bind('kode_mk',$mk);
		$this->db->bind('nid',$id);
		return $this->db->resultSet();
	}

	public function getMahasiswaByTotal($mk,$id)
	{
		$this->db->query("SELECT *, COUNT(*) AS total FROM absensi_tbl WHERE kode_mk=:kode_mk AND nid_dosen =:nid AND status_absensi = 'Hadir' GROUP BY nama_mahasiswa");
		$this->db->bind('kode_mk',$mk);
		$this->db->bind('nid',$id);
		return $this->db->resultSet();
	}
	
	public function ubahStatusKehadiran($nid, $nim, $status, $kodeMK, $kodeAbsensi)
	{
		$query = "UPDATE absensi_tbl SET status_absensi =:status WHERE nim_mahasiswa = :nim AND kode_mk =:kode_mk AND nid_dosen =:nid AND kode_absensi =:kode_absensi";
		$this->db->query($query);
		$this->db->bind('nid', $nid);
		$this->db->bind('nim', $nim);
		$this->db->bind('status', $status);
		$this->db->bind('kode_mk', $kodeMK);
		$this->db->bind('kode_absensi', $kodeAbsensi);
		$this->db->execute();
		return $this->db->rowCount();
	}
}