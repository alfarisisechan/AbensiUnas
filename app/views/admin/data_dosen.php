<?php $host="localhost";
$username="root";
$password="";
$db="absensi_db";
$db_link=mysqli_connect($host, $username, $password, $db);
$mk = $_POST['kodeMK'];
$kodeKelas = $_POST['kodeKelas'];
$sliceMK = explode("|", $mk);
$kodeMK = $sliceMK[0];
$namaMK = $sliceMK[1];
	$query = mysqli_query($db_link, "SELECT * FROM kelas_tbl WHERE kode_mk = '$kodeMK' AND kode_kelas = '$kodeKelas' ");
	$output = '<option value="">Pilih Nama Dosen</option>';
	while($row = mysqli_fetch_array($query)){
		$output .= '<option value="'.$row["nid_dosen"].'|'.$row["nama_dosen"].'">'.$row["nama_dosen"].'</option>';
	}
echo  $output;
?>