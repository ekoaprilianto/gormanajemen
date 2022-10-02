<?php
include 'koneksi.php';

$hapus = mysql_query("delete from lapang where id_lapang='$_GET[id]'");

if ($hapus){
	echo "
	<script>
	alert('data berhasil dihapus');
	document.location='lapang.php';
	</script>";
}
?>