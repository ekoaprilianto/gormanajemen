<?php
error_reporting(0);
include 'koneksi.php';

$id_lapang = $_POST['id_lapang'];


$simpan = mysql_query("INSERT INTO detail_transaksi VALUES ('', '$id_lapang', '1')") or die (mysql_error());

if ($simpan) {
echo"
<script>
alert ('lapang berhasil di tambahkan');
document.location='tambah_transaksi.php';
</script>";

}