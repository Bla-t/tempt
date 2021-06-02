<?php
$tabah_aksi = 'aksi/';
$tabah_pelengkap = 'pelengkap/';
$tabah_part = 'dasbor-part/';
$tabah_judul_hal = "";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');
include($tabah_pelengkap.'header-nya.php');

$kd_barang = "";

//Functions


// Tabel database
$tabel1 = $prefix_tabel.'_kategori'; //Baca data kategori...
$tabel2 = $prefix_tabel.'_barang'; //Baca data barang...
$tabel3 = $prefix_tabel.'_cicilan'; //Baca data cicilan...
$tabel4 = $prefix_tabel.'_peminjam'; //Baca data peminjam...
$tabel5 = $prefix_tabel.'_nilai_cicilan'; //uang cicilan...

//Ambil jumlah penyicil
$qry = "SELECT * FROM $tabel4 WHERE td_peminjam = '0'";
$hasil = $conn->query($qry);
$jml_peminjam = $hasil->num_rows; // Jumlah penyicil aktip.
$hasil->close();

//Ambil jumlah jatuh tempo
$qry = "SELECT * FROM $tabel5 WHERE td_lunas = '0' AND tgl_tempo <= '$xDate'";
$hasil = $conn->query($qry);
$jml_tempo = $hasil->num_rows; // Jumlah jatuh tempo
$hasil->close();

//Ambil jumlah barang
$qry = "SELECT * FROM $tabel2 WHERE td_barang = '0'";
$hasil = $conn->query($qry);
$jml_barang = $hasil->num_rows; // Jumlah barang.
$hasil->close();
?>

<body>
<div id="wrapper">

<?php include($tabah_pelengkap.'menu-nya.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Dashboard <i class="fa fa-dashboard fa-fw"></i></h1>
					</div>
                    <!-- /.col-lg-12 -->
                </div>
			<!-- /.row -->
            <?php include($tabah_part."notif-counter.php"); // Baris notifikasi ?> 
            <!-- /.row -->
			<?php include($tabah_part."notif-panel.php"); // Baris notifikasi ?> 
            <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include($tabah_pelengkap.'footer-nya.php'); ?>

</body>

</html>
