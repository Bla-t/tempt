<?php
$err_nya = "";
$kd = "";
				$nm_peminjam = "";
				$idc_peminjam = "";
				$amt_peminjam = "";
				$tlp_peminjam = "";
				
extract($_GET);
$tabah_aksi = 'aksi/';
$tabah_pelengkap = 'pelengkap/';
$tabah_judul_hal = "";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');
include($tabah_pelengkap.'header-nya.php');

$kd_peminjam = $kd;

// Tabel database
$tabel1 = $prefix_tabel.'_peminjam'; //Baca data peminjam

if ($err_nya!="")
{
	?>
	<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    Kesalahan = <?php echo $err_nya; ?>.
    </div>
	<?php
}



$query = "SELECT * FROM $tabel1 WHERE kd_peminjam = '$kd_peminjam'";
if ($result = $conn->query($query)) 
	{														
		/* fetch object array */
		while ($data = $result->fetch_array(MYSQLI_ASSOC)) 
			{
				$nm_peminjam = $data['nm_peminjam'];
				$idc_peminjam = $data['idc_peminjam'];
				$amt_peminjam = $data['amt_peminjam'];
				$tlp_peminjam = $data['tlp_peminjam'];
			}
		/* free result set */
		$result->close();
	}
?>

<body>
<div id="wrapper">

    

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Berikut Nama dan Alamat Peminjam</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				
                <div class="col-lg-12">
                  <form action="<?php echo $tabah_aksi; ?>peminjam-edit-x.php?kd=<?php echo $kd_peminjam; ?>" method="post" role="form">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Peminjam
                        </div>
                        <div class="panel-body">
                            <div class="row">
										<p>&nbsp;</p>
										<div class="form-group">
											<label>Nama Peminjam</label>
											<input class="form-control" placeholder="Nama Peminjam Di sini" name="nm_peminjam" value="<?php echo $nm_peminjam; ?>">
											<p class="help-block">Nama lengkap peminjam sesuai KTP / SIM.</p>
                                        </div>
										<p>&nbsp;</p>
										<div class="form-group">
											<label>Nomor KTP / SIM</label>
											<input class="form-control" placeholder="Nomor KTP / SIM" name="idc_peminjam" value="<?php echo $idc_peminjam; ?>">
										</div>
										<p>&nbsp;</p>
										<div class="form-group">
											<label>Alamat KTP / SIM</label>
											 <textarea class="form-control" rows="3" placeholder="Alamat Lengkap KTP / SIM"  name="amt_peminjam"><?php echo $amt_peminjam; ?></textarea>
										</div>
										<p>&nbsp;</p>		
										<div class="form-group">
											<label>Nomor Telpon</label>
											<input class="form-control" placeholder="Nomor Telpon Peminjam" name="tlp_peminjam" value="<?php echo $tlp_peminjam; ?>">
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