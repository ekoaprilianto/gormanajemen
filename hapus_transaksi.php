<?php
include 'koneksi.php';
$hapus = mysql_query("delete from transaksi where id_transaksi = '$_GET[id]'") or die (mysql_error());

mysql_query("delete from detail_transaksi where id_transaksi = '$_GET[id]'");
if ($hapus){
	echo "
	<script>
	alert('Data berhasil dihapus');
	document.location='transaksi.php';
	</script>";
}
?>