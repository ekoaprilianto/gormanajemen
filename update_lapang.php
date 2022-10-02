<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$hari = $_POST['hari'];
$harga = $_POST['harga'];



$simpan = mysql_query("update lapang set nama_lapang='$nama',hari='$hari',harga='$harga' where id_lapang='$id'");

if($simpan){
	echo "
	<script>
	alert('data berhasil diupdate');
document.location='lapang.php';
	</script>";
}
?>