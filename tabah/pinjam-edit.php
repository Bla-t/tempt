<?php
$err_nya = "";
$kd = "";	// kode cicilan

extract($_GET);
$kd_cicilan = $kd;

$tabah_aksi = 'aksi/';
$tabah_pelengkap = 'pelengkap/';
$tabah_judul_hal = "";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');
include($tabah_pelengkap.'header-nya.php');

// Tabel database
//$tabel1 = $prefix_tabel.'_kategori'; //Baca data kategori...
$tabel2 = $prefix_tabel.'_barang'; //Baca data barang...
$tabel3 = $prefix_tabel.'_cicilan'; //Baca data cicilan...
$tabel4 = $prefix_tabel.'_peminjam'; //Baca data peminjam...
$tabel5 = $prefix_tabel.'_nilai_cicilan'; //rincian uang cicilan...

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

//Ambil kode cicilan
$query1 = "SELECT * FROM $tabel3 WHERE kd_cicilan='$kd_cicilan'";
$hasil = $conn->query($query1); 
$data = $hasil->fetch_array(MYSQLI_ASSOC); //memecah hasil ke dalam array
	$kd_peminjam_lama = $data['kd_peminjam'];
	$tgl_pinjam = $data['tgl_pinjam'];
	$kd_barang = $data['kd_barang'];
	$nil_harga = $data['nil_harga'];
$hasil->close();

//Ambil data nama barang sesuai klik.
$query1 = "SELECT * FROM $tabel2 WHERE kd_barang='$kd_barang'";
$result = $conn->query($query1);
$data = $result->fetch_array(MYSQLI_ASSOC);
$nm_barang=$data['nm_barang'];
$result->close();

$query = "SELECT * FROM $tabel5 WHERE kd_cicilan='$kd_cicilan' order by cicilanke ASC";
if ($result = $conn->query($query)) 
{
	/* fetch object array */
	While ($cicil = $result->fetch_array(MYSQLI_ASSOC)) 
	{
		$angka_nilai_[$cicil['cicilanke']] = $cicil['angka_nilai'];
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
						<h1 class="page-header">Tabah Mandiri Cicilan No.<?php echo $kd_cicilan; ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
					<div class="col-lg-12">
                        Berikut adalah isian untuk mengedit cicilan :&nbsp;<b><?php echo $nm_barang; ?></b>.
                    </div>
                    <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                  <form name="cicilan" action="<?php echo $tabah_aksi; ?>pinjam-edit-x.php" method="post" role="form">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Cicilan Baru
                        </div>
                        <div class="panel-body">
                            <div class="row">
										<input type="hidden" name="kd_cicilan" value="<?php echo $kd_cicilan; ?>">
										<p>&nbsp;</p>
										<div class="form-group">
											<label>Nama Peminjam</label>
											<select class="form-control"  name="kd_peminjam">
											<?php
												$query = "SELECT * FROM $tabel4 WHERE td_peminjam='0' order by kd_peminjam ASC";
												if ($result = $conn->query($query)) 
													{
														/* fetch object array */
														while ($data = $result->fetch_array(MYSQLI_ASSOC)) 
															{
																($kd_peminjam_lama == $data['kd_peminjam']) ? $pilihan = "Selected" : $pilihan = "" ;
																echo '<option value="'.$data['kd_peminjam'].'" '.$pilihan.'>'.$data['nm_peminjam'].'</option>'.PHP_EOL;
															}
															/* free result set */
															$result->close();
													}
													?>
											</select>
											<p class="help-block">Nama lengkap peminjam sesuai KTP / SIM.</p>
                                        </div>
										<p>&nbsp;</p>
										<label>Tanggal Peminjaman</label>
										<div class="form-group  input-group">
											<a class="input-group-addon"  href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.cicilan.tgl_pinjam);return false;"><i class="fa  fa-calendar fa-fw"></i></a>
											<input class="form-control" placeholder="Masukkan Tanggal" name="tgl_pinjam" value="<?php echo $tgl_pinjam; ?>" onClick="if(self.gfPop)gfPop.fPopCalendar(document.cicilan.tgl_pinjam);return false;"/>
										</div>
										
											<input type="hidden" name="kd_barang" value="<?php echo $kd_barang; ?>">
										<p>&nbsp;</p>
										<label>Total Harga</label>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Harga" name="nil_harga" value="<?php echo $nil_harga; ?>" />
										</div>
										<p>&nbsp;</p>
											<label>Masukkan Masing-masing Nilai Cicilan:</label>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Nilai Cicilan #1" name="angka_nilai_1" value="<?php echo $angka_nilai_['1']; ?>" />
										</div>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Nilai Cicilan #2" name="angka_nilai_2" value="<?php echo $angka_nilai_['2']; ?>" />
										</div>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Nilai Cicilan #3" name="angka_nilai_3" value="<?php echo $angka_nilai_['3']; ?>" />
										</div>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Nilai Cicilan #4" name="angka_nilai_4" value="<?php echo $angka_nilai_['4']; ?>" />
										</div>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Nilai Cicilan #5" name="angka_nilai_5" value="<?php echo $angka_nilai_['5']; ?>" />
										</div>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Nilai Cicilan #6" name="angka_nilai_6" value="<?php echo $angka_nilai_['6']; ?>" />
										</div>
										<p>&nbsp;</p>
                            </div>
							<!-- /.row -->
						</div>
						<!-- /.panel-body -->
						<div class="panel-footer">
						<p class="text-center">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SIMPAN</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-primary" onClick="batal()"><i class="fa fa-repeat"></i> BATAL?</button>
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
		if (confirm('Batalkan ini?') == true) 
		{
			window.open('pinjam-list.php?kd=<?php echo $kd_barang; ?>','_self');
		}
	}
	
</script>
	  <!--  PopCalendar(tag name and id must match) Tags should not be enclosed in tags other than the html body tag. -->
	<iframe width=174 height=189 name="gToday:normal:<?php echo $tabah_pelengkap; ?>kalender/agenda.js" id="gToday:normal:<?php echo $tabah_pelengkap; ?>kalender/agenda.js" src="<?php echo $tabah_pelengkap; ?>kalender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>
</body>

</html>

<?php
$conn->close();
?>