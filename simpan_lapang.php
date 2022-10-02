<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$hari = $_POST['hari'];
$harga = $_POST['harga'];



$simpan = mysql_query("insert into lapang values ('','$nama','$hari','$harga')");

if($simpan){
	echo "
	<script>
	alert('data berhasil disimpan');
document.location='lapang.php';
	</script>";
}
?>