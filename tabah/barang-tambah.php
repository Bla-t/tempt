<?php

//Silahkan di Buka Lagi ya :

//http://www.asanoer.com/artikel/aplikasi-php-mysql-cicilan-barang-enam-bulan-dengan-boostrap-v-1-1.html

//Salam,
//asanoer.com

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
                        <h1 class="page-header">Tambah Barang Anda Di sini</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				
                <div class="col-lg-12">
                  <form action="<?php echo $tabah_aksi; ?>barang-tambah-x.php" method="post" role="form">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Barang
                        </div>
                        <div class="panel-body">
                            <div class="row">
										<div class="form-group">
                                            <label>Kategori</label>
											<select class="form-control"  name="kd_kategori">
									<?php
									$query = "SELECT * FROM $tabel WHERE td_kategori='0' order by kd_kategori ASC";
									if ($result = $conn->query($query)) 
										{
																					
											/* fetch object array */
											while ($row = $result->fetch_row()) 
												{
													echo '<option value="'.$row[0].'">'.$row[1].'</option>';
												}

											/* free result set */
											$result->close();
										}

									?>
											</select>
											<p class="help-block">Kategori dari barang yang dikredit.</p>
                                        </div>
										<p>&nbsp;</p>
									<?php /*
                                        <div class="form-group">
                                            <label>Kode Barang</label>
                                            <input class="form-control" placeholder="Kode Barang" name="kd_barang">
                                            <p class="help-block">Masukkan kode barang, jangan sama dengan sebelumnya.</p>
                                        </div>
										<p>&nbsp;</p>
									*/ 	?>
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input class="form-control" placeholder="Nama Barang" name="nm_barang">
                                            <p class="help-block">Sesuaikan dengan barang yang dikredit.</p>
                                        </div>
										<p>&nbsp;</p>
                                        <div class="form-group">
                                            <label>Keterangan</label>
											<p class="help-block">Keterangan terserah Anda.</p>
                                            <textarea class="form-control" rows="3" placeholder="Keterangan"  name="ket_barang"></textarea>
                                        </div>
							</div>
							<!-- /.row -->
						</div>
						<!-- /.panel-body -->
						<div class="panel-footer">
						<p class="text-center">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SIMPAN</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-repeat"></i> BATAL</button>
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