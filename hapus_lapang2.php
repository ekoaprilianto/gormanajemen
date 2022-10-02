<?php
include 'koneksi.php';
$hapus = mysql_query("delete from detail_transaksi where id_lapang = '$_GET[id]' and id_transaksi=''") or die (mysql_error());

if ($hapus){
	echo "
	<script>
	alert('Data berhasil dihapus');
	document.location='tambah_transaksi.php';
	</script>";
}
?>