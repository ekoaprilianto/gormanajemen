<?php
error_reporting(0);
include 'koneksi.php';

$tgl_transaksi = $_POST['tgl_transaksi'];
$id_pelanggan = $_POST['id_pelanggan'];

$sql = mysql_query("SELECT max(id_transaksi) from transaksi") or die (mysql_error());
      
      // menjadikannya array
      
      $data = mysql_fetch_array($sql);
      
      // jika $datakode
      
      if ($data) {
       $nilaikode = substr($data[0], 1);
       
       // menjadikan $nilaikode ( int )
       
       $kode = (int) $nilaikode;
       
       // setiap $kode di tambah 1
       
       $kode = $kode + 1;
       $ID = "T".str_pad($kode, 4, "0", STR_PAD_LEFT);
      
      } else {
      
       $$ID = "T0001";
      
      }
$update = mysql_query ("update detail_transaksi set id_transaksi = '$ID' where id_transaksi=''");
 

$rsql = mysql_query("select SUM(harga) as total from detail_transaksi, lapang where detail_transaksi.id_lapang = lapang.id_lapang and detail_transaksi.id_transaksi='$ID'");
$rarray = mysql_fetch_array($rsql);		
$simpan = mysql_query("INSERT INTO transaksi VALUES ('$ID', '$tgl_transaksi','$id_pelanggan',  '$rarray[total]')") or die (mysql_error());



if ($simpan) {
echo"
<script>
alert ('transaksi berhasil di tambahkan');
document.location='transaksi.php';
</script>";
}
