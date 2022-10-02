<script>
  window.load = print_d();
    function print_d(){
      window.print();
    }
</script>
   <h4 class="page-head-line" align="center"> 
    <table align="center">
    <tr>
       <td> 
       </td>
    <td align="center">
        <h3><br>LAPORAN PENDAPATAN TRANSAKSI <br> BUG'S FUTSAL</h3></h4></td>
    </tr></table>

            <table width="100%" border="1">
                    <thead>
                       <tr>
                                           <th>ID Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pelanggan</th>
                                            <th>No. Telepon Pelanggan</th>
                                            <th>Detail</th>
                                            <th>Total Harga</th>
                                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'koneksi.php';
                    
                                    $d = mysql_query("select *from detail_transaksi, lapang, transaksi,pelanggan where transaksi.id_pelanggan = pelanggan.id_pelanggan and transaksi.id_transaksi = detail_transaksi.id_transaksi and detail_transaksi.id_lapang = lapang.id_lapang and transaksi.tanggal between '$_POST[dari]' and '$_POST[sampai]' group by transaksi.id_transaksi") or die (mysql_error());
                                    while($arr = mysql_fetch_array($d)){
                                    ?>
                                        <tr >
                                            <td><?php echo $arr['id_transaksi'];?></td>
                                            <td><?php echo $arr['tanggal'];?></td>
                                            <td><?php echo $arr['nama_pelanggan'];?></td>
                                            <td><?php echo $arr['no_hp'];?></td>

                                            <td>
                                                 <?php
                                                   $d1 = mysql_query("select *from detail_transaksi, lapang	 where detail_transaksi.id_lapang	 = lapang	.id_lapang	  and detail_transaksi.id_transaksi='$arr[id_transaksi]'") or die (mysql_error());
                                    while($arr1 = mysql_fetch_array($d1)){?>
                                    <?php echo $arr1['nama_lapang'];?> (<?php echo $arr1['hari'];?>) <br>
                                        <?php } ?>
                                    </td>
                                            <td>Rp. <?php echo number_format($arr['total']);?></td>
                                            
                                            
                                        </tr>
                                        <?php 
                                        error_reporting(0);
                                        $subtotal += $arr['total']; } ?>

                                    </tbody>
                                        <tr>
                                            <td colspan="5" align="right">Total Pendapatan:</td>
                                            <td>Rp. <?php echo number_format($subtotal);?>
                                            </td>
                                        </tr>

                                </table>
                   <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
   