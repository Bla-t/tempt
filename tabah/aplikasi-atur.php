<?php
//$err_nya = "";
//$kd = "";	
$simpan = "";	

extract($_GET);
//$kd_cicilan = $kd;

$tabah_aksi = 'aksi/';
$tabah_pelengkap = 'pelengkap/';
$tabah_judul_hal = "";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');
include($tabah_pelengkap.'header-nya.php');

// Tabel database
$tabel1 = $prefix_tabel.'_kategori'; //Baca data kategori...
$tabel2 = $prefix_tabel.'_barang'; //Baca data barang...
//$tabel3 = $prefix_tabel.'_cicilan'; //Baca data cicilan...
//$tabel4 = $prefix_tabel.'_peminjam'; //Baca data peminjam...
//$tabel5 = $prefix_tabel.'_nilai_cicilan'; //Baca data cicilan...
//$tabel6 = $prefix_tabel.'_user'; // Baca user....
//$tabel7 = $prefix_tabel.'_user_sbg';
//$tabel8 = $prefix_tabel.'_usaha';
?>
<!-- Custom CSS -->
    <link href="<?php echo $tabah_pelengkap; ?>jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
<body>
<div id="wrapper">

<?php include($tabah_pelengkap.'menu-nya.php'); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa  fa-institution"></i> Berikut Detail Perusahaan Anda</h1>
						<?php
						// Handle Sukses
						if ($simpan == "true")
						{
						?>
							<div class="alert<?php echo " ".$alertnya." ";?>alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
								<?php echo $alert;?>
							</div>
						<?php
						}?>
                    </div>
                    <!-- /.col-lg-12 -->
					<div class="col-lg-12">
                        &nbsp;
                    </div>
                    <!-- /.col-lg-12 -->
                <div class="col-lg-12">
				<form action="<?php echo $tabah_aksi; ?>aplikasi-atur-x.php" method="post" role="form" enctype="multipart/form-data">
				<fieldset>
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                           <strong>Detail Perusahaan :</strong>
                        </div>
                        <div class="panel-body">
                        
                            <div class="row">
							<div class="col-lg-6">
							
								<div class="table-responsive">
                                <table class="table">
									<tr>
									<?php
									IF ($logo_usaha != "takberlogo.jpg")
										{
									?>
											<td>
												<label class="form-control">
													<input value="" name="hapus_gambar" type="checkbox">&nbsp;Hapus Logo? (di bawah ini adalah logo tersimpan)
												</label><br/> 
												<img src="<?php echo $tabah_pelengkap."gambar/$logo_usaha"; ?>"/>
												<input value="<?php echo $logo_usaha; ?>" name="logo_usaha" type="hidden">
												<input value="berlogo" name="status" type="hidden">	
											</td>
									<?php
										}
									else
										{
									?>
										<td><label>logo (50px X 50px)</label>
										
										<div class="fileinput fileinput-new input-group" data-provides="fileinput">
										  <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
										  <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Pilih Logo</span><span class="fileinput-exists">Ganti?</span><input name="logo_file" type="file" accept="image/jpeg, image/png, image/gif"></span>
										  <a href="#" class="input-group-addon btn btn-success fileinput-exists" data-dismiss="fileinput">Buang</a>
										</div>
											<input value="takberlogo" name="status" type="hidden">
										</td>	
									<?php	
										}									
									?>
										
									</tr>
									<tr>
										<td><label>Nama Perusahaan Anda</label>
										<input class="form-control" type="text" name="nm_usaha" value="<?php echo $nm_usaha; ?>"></td>
									</tr>
									<tr>
										<td><label>Alamat</label>
										<textarea class="form-control" name="alm_usaha"><?php echo $alm_usaha; ?></textarea></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
									</tr>
								</table>
								</div>
							</div>
                           </div>
							<!-- /.row -->
						</div>
						<!-- /.panel-body -->
						<div class="panel-footer">
						<p class="text-center">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SIMPAN</button>&nbsp;&nbsp;
						</p>	
						</div>
					</div>
					<!-- /.panel-primary -->
				</fieldset>
				</form>
				</div>
                <!-- /.col-lg-12 -->
				</div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
<?php include($tabah_pelengkap.'footer-nya.php'); ?>	
	<!-- Custom Theme JavaScript -->
    <script src="<?php echo $tabah_pelengkap; ?>jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
	
	<script>
	function batal() 
	{
		//if (confirm('Batalkan ini?') == true) 
		//{
			//window.open('pinjam-list.php?kd=<?php echo $kd_barang; ?>','_self');
			window.close();
		//}
	}
	
</script>

</body>

</html>

<?php
$conn->close();
?>