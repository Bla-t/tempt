<?php
$err_nya = "";
$kd = "";		

extract($_GET);
$kd_cicilan = $kd;

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
$tabel6 = $prefix_tabel.'_user'; // Baca user....

// Handle error
if ($err_nya!="")
{
	?>
	<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    Kesalahan = <?php echo $err_nya; ?>.
    </div>
	<?php
}

	$qry = "SELECT * FROM $tabel6 WHERE kd_user= '$kd_user' AND td_user = '0'";
		$hasil = $conn->query($qry);		
		//$jml_user = $hasil->num_rows; // Jumlah penyicil aktip.
		$data = $hasil->fetch_array(MYSQLI_ASSOC); //memecah hasil ke dalam array
			$lengkap_user = $data['lengkap_user'];
			$nm_user = $data['nm_user'];
			$sd_user = 'Tersimpan';
			$email_user = $data['email_user'];
			$sbg_user = $data['sbg_user'];
			$tlp_user = $data['tlp_user'];
			$tgl_simpan = $data['tgl_simpan'];
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
                        <h1 class="page-header"><img src="<?php echo $tabah_pelengkap."gambar/$logo_usaha"; ?>">&nbsp;Kode Anda No.<?php echo $kd_user; ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
					<div class="col-lg-12" id="cetak_ini_2">
                        Berikut rincian Anda:</b>
                    </div>
                    <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                            &nbsp;
                        </div>
                        <div class="panel-body" id="cetak_ini_3">
                            <div class="row">
								<div class="table-responsive">
                                <table class="table">
									<tr>
										<td><br/>
											Rincian Login Anda :
										</td>	
									</tr>	
									<tr>
										<td><label>Nama Pengguna / Login Anda</label>
										<p class="form-control"><?php echo $nm_user; ?></p></td>
									</tr>
									<tr>
										<td><label>Sandi Anda</label>
										<p class="form-control"><?php echo $sd_user; ?></p></td>
									</tr>
									<tr>
										<td><label>Sebagai</label>
										<?php
											$qry = "SELECT * FROM tabah_user_sbg WHERE kd_sbg= '$sbg_user'";
											$hasil = $conn->query($qry);		
											//$jml_user = $hasil->num_rows; // Jumlah penyicil aktip.
											$data = $hasil->fetch_array(MYSQLI_ASSOC); //memecah hasil ke dalam array
												$nm_sbg = $data['nm_sbg'];
											$hasil->close();
										?>
										<p class="form-control"><?php echo $nm_sbg; ?></p></td>
									</tr>
									<tr>
										<td><br/>
											Rincian Lengkap Anda:
										</td>	
									</tr>
									<tr>
										<td><label>Nama Lengkap Anda</label>
										<p class="form-control"><?php echo $lengkap_user; ?></p></td>
									</tr>
									<tr>
										<td><label>Email Anda</label>
										<p class="form-control"><?php echo $email_user; ?></p></td>
									</tr>
									<tr>
										<td><label>Telpon</label>
										<p class="form-control"><?php echo $tlp_user; ?></p></td>
									</tr>
									<tr>
										<?php $tglne = date_create($tgl_simpan); ?>
										<td><label>Terdaftar pada</label>
										<p class="form-control"><?php echo date_format($tglne,"d-M-Y"); ?></p></td>										
									</tr>
									<tr>
										<td>&nbsp;
										</td>	
									</tr>
								</table>
							</div>
                            </div>
							<!-- /.row -->
						</div>
						<!-- /.panel-body -->
						<div class="panel-footer">
							<p class="text-center">
								<a href="user-set.php" class="btn btn-primary"><i class="fa fa-save"></i> EDIT</a>
							</p>	
						</div>
					</div>
					<!-- /.panel-primary -->
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