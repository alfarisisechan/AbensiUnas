<?php

class MahasiswaModel {
	
	private $table = 'mahasiswa_tbl';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

    public function getMahasiswaById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE nim_mahasiswa=:nim');
		$this->db->bind('nim',$id);
		return $this->db->resultSet();
	}

	public function getJadwalMahasiswaById($id)
	{
		$this->db->query('SELECT * FROM detail_kelas_tbl WHERE nim_mahasiswa =:nim_mahasiswa');
		$this->db->bind('nim_mahasiswa',$id);
		return $this->db->resultSet();
	}
}