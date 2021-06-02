<?php
$err_nya = "";
extract($_GET);
$tabah_aksi = 'aksi/';
$tabah_pelengkap = 'pelengkap/';
$tabah_judul_hal = "";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');
include($tabah_pelengkap.'header-nya.php');

// Tabel database
$tabel = $prefix_tabel.'_kategori'; //Baca data kategori...
$tabel2 = $prefix_tabel.'_peminjam'; //

//Ambil kode peminjam baru
$hasil = $conn->query("SELECT MAX(kd_peminjam) AS kode FROM $tabel2"); //
$maks = $hasil->fetch_array(MYSQLI_ASSOC); //memecah hasil ke dalam array
($maks['kode'] == 0) ? $kd_peminjam = 10000 : $kd_peminjam = $maks['kode']+1; //
$hasil->close();


if ($err_nya!="")
{
	?>
	<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    Kesalahan = <?php echo $err_nya; ?>.
    </div>
	<?php
}
?>

<body>
<div id="wrapper">

    

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Menambah Peminjam Baru No.<?php echo $kd_peminjam; ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				
                <div class="col-lg-12">
                  <form action="<?php echo $tabah_aksi; ?>peminjam-tambah-x.php" method="post" role="form">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Peminjam
                        </div>
                        <div class="panel-body">
                            <div class="row">
									<input type="hidden" name="kd_peminjam" value="<?php echo $kd_peminjam; ?>">
										<p>&nbsp;</p>
										<div class="form-group">
											<label>Nama Peminjam</label>
											<input class="form-control" placeholder="Nama Peminjam Di sini" name="nm_peminjam">
											<p class="help-block">Nama lengkap peminjam sesuai KTP / SIM.</p>
                                        </div>
										<p>&nbsp;</p>
										<div class="form-group">
											<label>Nomor KTP / SIM</label>
											<input class="form-control" placeholder="Nomor KTP / SIM" name="idc_peminjam">
										</div>
										<p>&nbsp;</p>
										<div class="form-group">
											<label>Alamat KTP / SIM</label>
											 <textarea class="form-control" rows="3" placeholder="Alamat Lengkap KTP / SIM"  name="amt_peminjam"></textarea>
										</div>
										<p>&nbsp;</p>		
										<div class="form-group">
											<label>Nomor Telpon</label>
											<input class="form-control" placeholder="Nomor Telpon Peminjam" name="tlp_peminjam">
										</div>
										<p>&nbsp;</p>
                            </div>
							<!-- /.row -->
						</div>
						<!-- /.panel-body -->
						<div class="panel-footer">
						<p class="text-center">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SIMPAN</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-repeat"></i> BATAL?</button>
						</p>	
						</div>
					</div>
					<!-- /.panel-primary -->
                 </form>
				</div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
<?php include($tabah_pelengkap.'footer-nya.php'); ?>

</body>

</html>

<?php
$conn->close();
?>