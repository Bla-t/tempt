<?php
$err_nya = "";
$kd = "";		

extract($_GET);
$kd_barang = $kd;

$tabah_aksi = 'aksi/';
$tabah_pelengkap = 'pelengkap/';
$tabah_judul_hal = "";
$opsi_hf=array("datepicker_css"=>true,"datepicker_js"=>true); // Opsi pemakaian CSS dan JS
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');
include($tabah_pelengkap.'header-nya.php');

// Tabel database
$tabel1 = $prefix_tabel.'_kategori'; //Baca data kategori...
$tabel2 = $prefix_tabel.'_barang'; //Baca data barang...
$tabel3 = $prefix_tabel.'_cicilan'; //Baca data cicilan...
$tabel4 = $prefix_tabel.'_peminjam'; //Baca data peminjam...

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
/*
$query1 = "SELECT * FROM $tabel2 WHERE kd_barang= '$kd_barang' order by kd_barang ASC";
if ($result = $conn->query($query1)) 
	{
		// fetch object array 
		while ($data = $result->fetch_array(MYSQLI_ASSOC)) 
			{
				$nm_barang=$data['nm_barang'];
			}
			// free result set 
			$result->close();
	}
*/

//Ambil data nama barang sesuai klik.
$query1 = "SELECT * FROM $tabel2 WHERE kd_barang='$kd_barang' order by kd_barang ASC";
$result = $conn->query($query1);
$data = $result->fetch_array(MYSQLI_ASSOC);
$nm_barang=$data['nm_barang'];
$result->close();

//Ambil kode cicilan terakhir yang masuk terus ditambah 1
$hasil = $conn->query("SELECT MAX(kd_cicilan) AS kode FROM $tabel3"); // Mengambil kode
$maks = $hasil->fetch_array(MYSQLI_ASSOC); //memecah hasil ke dalam array
($maks['kode'] == 0) ? $kd_cicilan = 1000000 : $kd_cicilan = $maks['kode']+1; //
$hasil->close();
?>

<body>
<div id="wrapper">

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tambah Transaksi Cicilan No.<?php echo $kd_cicilan; ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
					<div class="col-lg-12">
                        Berikut adalah isian untuk menambah cicilan :&nbsp;<b><?php echo $nm_barang; ?></b>.
                    </div>
                    <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                  <form name="cicilan" action="<?php echo $tabah_aksi; ?>pinjam-tambah-x.php" method="post" role="form">
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
												$query = "SELECT * FROM $tabel4 WHERE td_peminjam='0' order by nm_peminjam ASC";
												if ($result = $conn->query($query)) 
													{
														/* fetch object array */
														while ($data = $result->fetch_array(MYSQLI_ASSOC)) 
															{
																echo '<option value="'.$data['kd_peminjam'].'">'.$data['nm_peminjam'].'</option>'.PHP_EOL;
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
											<a class="input-group-addon"  href="#"><i class="fa  fa-calendar fa-fw"></i></a>
											<input id="x-tanggalnya" class="form-control" placeholder="Masukkan Tanggal" name="tgl_pinjam" value="<?php echo $xDate; ?>" />
										</div>
											<input type="hidden" name="kd_barang" value="<?php echo $kd_barang; ?>">
										<p>&nbsp;</p>
										<label>Total Harga</label>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Harga" name="nil_harga" />
										</div>
										<p>&nbsp;</p>
											<label>Masukkan Masing-masing Nilai Cicilan:</label>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Nilai Cicilan #1" name="angka_nilai_1">
										</div>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Nilai Cicilan #2" name="angka_nilai_2">
										</div>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Nilai Cicilan #3" name="angka_nilai_3">
										</div>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Nilai Cicilan #4" name="angka_nilai_4">
										</div>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Nilai Cicilan #5" name="angka_nilai_5">
										</div>
										<div class="form-group  input-group">
											<a class="input-group-addon"><i class="fa fa-fw">Rp.</i></a>
											<input class="form-control" placeholder="Nilai Cicilan #6" name="angka_nilai_6">
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
$(document).ready(function(){
	/////////// DATA PICKER
	$('#x-tanggalnya').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                }).on('changeDate', function (ev) {
				// Sumber : https://msdn.microsoft.com/en-us/library/ff743760%28v=vs.94%29.aspx
					var date = new Date(this.value);
					var dob = date.getFullYear();
					var date = new Date();
					var today = date.getFullYear();
					var age = today - dob;
					$('#usia').val(age+" tahun");
				});
});	
</script>
</body>
</html>
<?php
$conn->close();
?>