<?php $host="localhost";
$username="root";
$password="";
$db="absensi_db";
$db_link=mysqli_connect($host, $username, $password, $db);
$mk = $_POST['kodeMK'];
$sliceMK = explode("|", $mk);
$kodeMK = $sliceMK[0];
$namaMK = $sliceMK[1];
	$query = mysqli_query($db_link, "SELECT * FROM kelas_tbl WHERE kode_mk = '$kodeMK' ");
	$output = '<option value="">Pilih Kode Kelas</option>';
	while($row = mysqli_fetch_array($query)){
		$output .= '<option value="'.$row["kode_kelas"].'">'.$row["kode_kelas"].'</option>';
	}
echo  $output;
?>