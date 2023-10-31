<?php $host="localhost";
$username="root";
$password="";
$db="absensi_db";
$db_link=mysqli_connect($host, $username, $password, $db);
$query=mysqli_query($db_link, "SELECT * FROM mk_tbl");
$output='<option value="">Pilih Nama Mata Kuliah</option>';

while($row=mysqli_fetch_array($query)) {
	$output .='<option value="'.$row["kode_mk"].'|'.$row["nama_mk"].'">'.$row["nama_mk"].'</option>';
}

echo $output;
?>