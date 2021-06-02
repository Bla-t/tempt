<?php
$err_nya = "";
$kd = "";	
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
$tabel6 = $prefix_tabel.'_user'; // Baca user....
$tabel7 = $prefix_tabel.'_user_sbg';


	$qry = "SELECT * FROM $tabel6 WHERE kd_user= '$kd_user' AND td_user = '0'";
		$hasil = $conn->query($qry);		
		//$jml_user = $hasil->num_rows; // Jumlah penyicil aktip.
		$data = $hasil->fetch_array(MYSQLI_ASSOC); //memecah hasil ke dalam array
			$lengkap_user = $data['lengkap_user'];
			$nm_user = $data['nm_user'];
			//$sd_user = 'Tersimpan';
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
						<?php
						// Handle sukses
						if ($simpan == "true")
						{
						?>
							<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
							Tersimpan....
							</div>
						<?php
						}?>
                    </div>
                    <!-- /.col-lg-12 -->
					<div class="col-lg-12">
                        Silahkan edit rincian Anda :</b>
                    </div>
                    <!-- /.col-lg-12 -->
                <div class="col-lg-12">
				<form action="<?php echo $tabah_aksi; ?>user-set-x.php" method="post" role="form">
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                            &nbsp;
                        </div>
                        <div class="panel-body">
                            <div class="row">
							<div class="col-lg-6">
							Rincian Login Anda :
								<div class="table-responsive">
                                <table class="table">	
									<tr>
										<td><label>Nama Pengguna / Login Anda</label>
										<p class="form-control"><?php echo $nm_user; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;==> Tidak dapat diubah.</p></td>
									</tr>
									<tr>
										<td><label>Sandi Anda</label>
										<input type="password" name="sd_user" value="" class="form-control"></td>
									</tr>
									<tr>
										<td><label>Sebagai</label>
										<select name="sbg_user" class="form-control">
										<?php
										$query = "SELECT * FROM $tabel7";
										if ($result = $conn->query($query)) 
										{
											/* fetch object array */
											while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
												{
													$select = "";
													if ($row['kd_sbg'] == $sbg_user) {$select = " selected";}
													echo '<option value="'.$row['kd_sbg'].'"'.$select.'>'.$row['nm_sbg'].'</option>';
												}
											/* free result set */
											$result->close();
										}

										?>
										</select>
										</td>
										<tr>
										<td>&nbsp;
										</td>	
									</tr>
									</tr>
								</table>
							</div>
							</div>
							<div class="col-lg-6">
							Rincian Lengkap Anda:
								<div class="table-responsive">
                                <table class="table">
									<tr>
										<td><label>Nama Lengkap Anda</label>
										<input type="text" name="lengkap_user" value="<?php echo $lengkap_user; ?>" class="form-control"></td>
									</tr>
									<tr>
										<td><label>Email Anda</label>
										<input type="text" name="email_user" value="<?php echo $email_user; ?>" class="form-control"></td>
									</tr>
									<tr>
										<td><label>Telpon</label>
										<input type="text" name="tlp_user" value="<?php echo $tlp_user; ?>" class="form-control"></td>
									</tr>
									<tr>
										<td>&nbsp;
										</td>	
									</tr>
								</table>
							</div>
							</div>
							<!-- /.col-lg-6 -->
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