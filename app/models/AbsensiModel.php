<?php

class AbsensiModel {
	
	private $table = 'absensi_tbl';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

    public function Absensi($mk,$namaMK,$nid,$kelas,$namaDosen,$username,$name,$date,$times,$jarak,$filename)
    {
        $query = "INSERT INTO absensi_tbl (kode_mk,nama_mk,kode_kelas,nid_dosen,nama_dosen,nim_mahasiswa,nama_mahasiswa,tanggal,jam,jarak,bukti_absensi,status_absensi) 
		values('$mk','$namaMK','$kelas','$nid','$namaDosen','$username','$name','$date','$times','$jarak','$filename','Hadir')";
		$this->db->query($query);
		$this->db->execute();
		return $this->db->rowCount();
    }

	public function CekAbsensi()
	{
		$query = "SELECT * FROM absensi_tbl";
		$this->db->query($query);
		$data =  $this->db->single();
		return $data;
	}
}