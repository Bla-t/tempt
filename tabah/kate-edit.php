<?php
$err_nya = "";
$kd = "";
				$nm_kategori = "";
				$kd_kategori = "";
				$ket_barang = "";
				
extract($_GET);
$tabah_aksi = 'aksi/';
$tabah_pelengkap = 'pelengkap/';
$tabah_judul_hal = "";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');
//include($tabah_pelengkap.'header-nya.php');

if ($kd == 0)
{
	header('location:kate-list.php');
	exit;
}
$kd_kategori = $kd;

// Tabel database
$tabel = $prefix_tabel.'_kategori'; //Baca data kategori...
$tabel2 = $prefix_tabel.'_barang'; //Baca data kategori...

if ($err_nya!="")
{
	?>
	<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    Kesalahan = <?php echo $err_nya; ?>.
    </div>
	<?php
}



$query = "SELECT * FROM $tabel WHERE kd_kategori = '$kd_kategori'";
if ($result = $conn->query($query)) 
	{
																					
		/* fetch object array */
		while ($row = $result->fetch_row()) 
			{
				$nm_kategori = $row[1];
				$ket_kategori = $row[2];
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
                        <h1 class="page-header">Edit Kategori Barang</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				
                <div class="col-lg-12">
                  <form action="<?php echo $tabah_aksi; ?>kate-edit-x.php?kd=<?php echo $kd_kategori; ?>" method="post" role="form">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Berikut kategori yang tersimpan, silahkan diedit.
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                        <div class="form-group">
                                            <label>Nama Kategori</label>
                                            <input class="form-control" placeholder="Nama Kategori" name="nm_kategori" value="<?php echo $nm_kategori; ?>">
                                            <p class="help-block">Contoh: Handphone, Televisi, Lain-lain, Taperecorder.</p>
                                        </div>
										<p>&nbsp;</p>
                                        <div class="form-group">
                                            <label>Keterangan</label>
											<p class="help-block">Keterangan terserah Anda.</p>
                                            <textarea class="form-control" rows="3" placeholder="Keterangan" name="ket_kategori"><?php echo $ket_kategori; ?></textarea>
                                        </div>
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

<?php //include($tabah_pelengkap.'footer-nya.php'); ?>
	
</body>

</html>