<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];


$sql = mysql_query("SELECT max(id_pelanggan) from pelanggan") or die (mysql_error());
      
      // menjadikannya array
      
      $data = mysql_fetch_array($sql);
      
      // jika $datakode
      
      if ($data) {
       $nilaikode = substr($data[0], 1);
       
       // menjadikan $nilaikode ( int )
       
       $kode = (int) $nilaikode;
       
       // setiap $kode di tambah 1
       
       $kode = $kode + 1;
       $ID = "P".str_pad($kode, 4, "0", STR_PAD_LEFT);
      
      } else {
      
       $$ID = "P0001";
      
      }
$simpan = mysql_query("insert into pelanggan values ('$ID','$nama','$alamat','$no_hp')");

if($simpan){
	echo "
	<script>
	alert('data berhasil disimpan');
document.location='pelanggan.php';
	</script>";
}
?>