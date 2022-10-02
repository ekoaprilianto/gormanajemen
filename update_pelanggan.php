<?php
include 'koneksi.php';

$id=$_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

$simpan = mysql_query("update pelanggan set nama_pelanggan='$nama',alamat='$alamat',no_hp='$no_hp' where id_pelanggan='$id'");

if($simpan){
	echo "
	<script>
	alert('data berhasil diupdate');
document.location='pelanggan.php';
	</script>";
}
?>