<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bug's Futsal - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php 
        include 'menu.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                  

                  

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Transaksi</h6>
                        </div>

                        <div class="card-body">
                             <form action="simpan_lapang2.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Pilih Lapang</label>
    <select name="id_lapang" class="form-control">
  <?php 
  include 'koneksi.php';
  $sq = mysql_query("select *from lapang") or die (mysql_error());
  while($l = mysql_fetch_array($sq)){
  ?>
  <option value="<?php echo $l['id_lapang'];?>"><?php echo $l['nama_lapang'];?> (<?php echo $l['hari'];?>)</option>
  <?php } ?>
  </select>
  </div>

  
   
  <button type="submit" class="btn btn-success">Tambahkan lapang </button>  
                       
</form><br>

 <table id="example1" class="table table-btransaksied table-striped">
                    <thead>
                       <tr>
                                            <th>No</th>
                                            <th>Nama lapang</th>
                                            <th>Harga</th>
                                             <th>Aksi</th>
                                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                                    $d = mysql_query("select *from detail_transaksi, lapang where detail_transaksi.id_lapang=lapang.id_lapang and detail_transaksi.id_transaksi=''") or die (mysql_error());
                                    while($arr = mysql_fetch_array($d)){
                                    ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $arr['nama_lapang'];?> (<?php echo $arr['hari'];?>)</td>
                                            <td>Rp. <?php echo number_format($arr['harga']);?></td>

                                        <td> <a href="hapus_lapang2.php?id=<?php echo $arr['id_lapang'];?>" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </a></td>
                                            
                                            
                                        </tr>
                                        <?php $no++;} ?>
                                    </tbody>
                                </table>
                                <form action="simpan_transaksi.php" method="post">
 <div class="form-group">
    <label for="exampleInputPassword1">Tanggal Transaksi</label>
    <input type="date" class="form-control" name="tgl_transaksi" />
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Nama Pelanggan</label>
   <select name="id_pelanggan" class="form-control">
    <option> - Pilih Pelanggan -</option>
    <?php 
    include 'koneksi.php';
    $g=mysql_query("select *from pelanggan");
    while ($t=mysql_fetch_array($g)) {
    ?>
       <option value="<?php echo $t['id_pelanggan'];?>"><?php echo $t['nama_pelanggan'];?></option>
       <?php } ?>
   </select>
  </div>
   <button type="submit" class="btn btn-primary">Simpan</button>  <button type="reset" class="btn btn-danger btn-google">Batal</button>
     </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                    <!-- Content Row -->
                

                    <!-- Content Row -->


                   

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Bug's Futsal 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>