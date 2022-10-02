   <script>
  window.load = print_d();
    function print_d(){
      window.print();
    }
</script>

 <?php
                    include 'koneksi.php';
                    
                                    $d = mysql_query("select *from transaksi, pelanggan where transaksi.id_pelanggan = pelanggan.id_pelanggan and transaksi.id_transaksi='$_GET[id]'") or die (mysql_error());
                                 $r = mysql_fetch_array($d);
                                    ?>
            <!-- Advanced Form Start -->
        <div class="advanced-form-area mg-b-15">
            <div class="container-fluid">
             
               
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list mt-b-30">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd" align="center">
                                    <div class='pull-right'><?php echo"";?> </div><br>
                                    <table border="0" width="80%" style="margin-left: 10%; margin-right: 10%">
                                        <tr>
                                            <td align="center" style="padding-top: 15px">
                                                <h1>BUG'S FUTSAL<h1>
                                                
                                            <td>
                                        </tr>
                                        
                                    </table>

                                    
                                    <hr width="80%"></hr><hr width="80%" style="margin-top: -12px"></hr>
                                </div>

                            </div>
                            <table border='0' style="font-size: 12px; margin-left: 10%" width="45%" height="10%">
                                <tr height="5%">
                                    <th width="15%">ID Transaksi </th><th width="2%"> : </th><td width="30%"><?php echo $r['id_transaksi']; ?></td>
                                </tr> 
                <tr height="5%">
                                    <th width="15%" >Nama Pelanggan </th><th width="2%"> : </th><td width="30%"><?php echo $r['nama_pelanggan']; ?></td>
                                </tr>
                 <tr height="5%">
                    <tr height="5%">
                                    <th width="15%" >Tanggal </th><th width="2%"> : </th><td width="30%"><?php echo $r['tanggal']; ?></td>
                                </tr>
                 <tr height="5%">
                                   
                            </table>
                            
                            <center>
                            <table id="" class="table table-bordered table-striped" style="width:80%; margin-top: 12px; font-size: 12px; position: center; margin-bottom:25px; margin-left: 25px; margin-right: 25px;" border="1">
                                        <thead>
                                            <tr>
                                               
                                                <th>No</th>
                                                <th>Nama Lapang</th>

                                                <th>Harga </th>

                                            </tr >
                                        </thead>
                                        <tbody>
                                             
                    
               <?php
               error_reporting(0);
               $no=1;
                                                   $d1 = mysql_query("select *from detail_transaksi, lapang, transaksi where transaksi.id_transaksi = detail_transaksi.id_transaksi and detail_transaksi.id_lapang = lapang.id_lapang and transaksi.id_transaksi='$r[id_transaksi]'") or die (mysql_error());
                                    while($r2 = mysql_fetch_array($d1)){
                                      $total = $r2['total'];
                                         ?>

          
         
                                            <tr style="font-size: 12px" align="center">
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $r2['nama_lapang']; ?> </td>
<td>Rp.<?php echo number_format($r2['harga'],2,".", ","); ?></td>
</tr>
<?php  $no++;} ?>
<tr>
  <td colspan="2" align="right">Subtotal</td>
  <td align="center">Rp. <?php echo number_format($total,2,".", ",");?></td>
</tr>
                                                
                                              
                                                </center></tbody></table>
                            
                         
                         <br><br><br><br><br>
                            <div style='border-bottom:1px dashed #ccc; margin-top: 10px; width: 80%; margin-bottom: 10px'></div>
