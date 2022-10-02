<?php
include 'koneksi.php';

$hapus = mysql_query("delete from pelanggan where id_pelanggan='$_GET[id]'");

if ($hapus){
	echo "
	<script>
	alert('data berhasil dihapus');
	document.location='pelanggan.php';
	</script>";
}
?>