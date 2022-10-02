  <?php   include('koneksi.php');
$label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
 
for($bulan = 1;$bulan < 13;$bulan++)
{
    $query = mysql_query("select sum(detail_transaksi.jumlah) as jumlah from detail_transaksi, transaksi where MONTH(transaksi.tanggal)='$bulan' and detail_transaksi.id_transaksi = transaksi.id_transaksi");
    $row = mysql_fetch_array($query);
    $jumlah_produk[] = $row['jumlah'];
}
?>
    <script type="text/javascript" src="Chart.js"></script>

                                <div class="card-body">
    <div style="width: 800px;height: 800px">
        <canvas id="myChart"></canvas>
    </div>
 
 
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($label); ?>,
                datasets: [{
                    label: 'Grafik Penjualan',
                    data: <?php echo json_encode($jumlah_produk); ?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>