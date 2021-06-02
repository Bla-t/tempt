<?php
$tabah_aksi = 'aksi/';
$tabah_pelengkap = 'pelengkap/';
$tabah_part = 'dasbor-part/';
$tabah_judul_hal = "";
include($tabah_pelengkap.'cek-login.php');
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'header-nya.php');

$kd_barang = "";

//Functions


// Tabel database
$tabel1 = $prefix_tabel.'_kategori'; //Baca data kategori...
$tabel2 = $prefix_tabel.'_barang'; //Baca data barang...
$tabel3 = $prefix_tabel.'_cicilan'; //Baca data cicilan...
$tabel4 = $prefix_tabel.'_peminjam'; //Baca data peminjam...

$query1 = "SELECT * FROM $tabel2 WHERE kd_barang= '$kd_barang' order by kd_barang ASC";
if ($result = $conn->query($query1)) 
	{
		/* fetch object array */
		while ($data = $result->fetch_array(MYSQLI_ASSOC)) 
			{
				$nm_barang=$data['nm_barang'];
			}
			/* free result set */
			$result->close();
	}
?>

<body>
<div id="wrapper">

<?php include($tabah_pelengkap.'menu-nya.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard <i class="fa fa-dashboard fa-fw"></i></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<!-- /.row -->
            <?php include($tabah_part."notif-counter.php"); // Baris notifikasi ?> 
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <?php include($tabah_part."chart-area.php"); // Area chart ?> 
                    <!-- /.panel -->
                    <?php include($tabah_part."chart-bar.php"); // Bar chart ?> 
                    <!-- /.panel -->
                    <?php include($tabah_part."time-line.php"); // time line responsivw ?> 
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <?php include($tabah_part."notif-panel.php"); // Baris notifikasi ?> 
                    <!-- /.panel -->
                    <?php include($tabah_part."chart-donut.php"); // Donut chart ?> 
                    <!-- /.panel -->
                    <?php include($tabah_part."chatting.php"); // Panel chatt ?> 
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
 </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
