<?php

class MataKuliahModel {
	
	private $table = 'mk_tbl';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

    public function getMK()
	{
		$this->db->query('SELECT * FROM mk_tbl');
		return $this->db->resultSet();
	}

	public function getKelas($mk)
	{
		$this->db->query('SELECT * FROM kelas_tbl WHERE kode_mk=:kode_mk');
		$this->db->bind('kode_mk',$mk);
		return $this->db->resultSet();
	}


	public function getKelasByNid($id)
	{
		$this->db->query('SELECT * FROM kelas_tbl, mk_tbl WHERE kelas_tbl.kode_mk = mk_tbl.kode_mk AND kelas_tbl.nid_dosen =:nid');
		$this->db->bind('nid',$id);
		return $this->db->resultSet();
	}

	public function getKelasByNid2($id)
	{
		$this->db->query('SELECT * FROM kelas_tbl, mk_tbl WHERE kelas_tbl.kode_mk = mk_tbl.kode_mk AND kelas_tbl.nid_dosen =:nid');
		$this->db->bind('nid',$id);
		return $this->db->resultSet();
	}

	public function getMKById()
	{
		$this->db->query('SELECT * FROM mk_tbl, kelas_tbl, detail_kelas_tbl WHERE kelas_tbl.kode_mk = mk_tbl.kode_mk AND detail_kelas_tbl.nid_dosen = kelas_tbl.nid_dosen');
		return $this->db->resultSet();
	}

	public function getMKByIdNim($id)
	{
		$this->db->query('SELECT * FROM detail_kelas_tbl WHERE nim_mahasiswa =:nim');
		$this->db->bind('nim',$id);
		return $this->db->resultSet();
	}

	public function getKelasById($id, $mk)
	{
		$this->db->query('SELECT * FROM detail_kelas_tbl WHERE nim_mahasiswa =:nim AND kode_mk =:kode_mk');
		$this->db->bind('nim',$id);
		$this->db->bind('kode_mk',$mk);
		return $this->db->resultSet();
	}
}	