<?php

//Silahkan di Buka :

//http://www.asanoer.com/artikel/aplikasi-php-mysql-cicilan-barang-enam-bulan-dengan-boostrap-v-1-1.html

//Salam,
//asanoer.com

$err_nya = "";
$kd = "";
				$nm_barang = "";
				$kd_kategori = "";
				$ket_barang = "";
				
extract($_GET);
$tabah_aksi = 'aksi/';
$tabah_pelengkap = 'pelengkap/';
$tabah_judul_hal = "";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');
include($tabah_pelengkap.'header-nya.php');

$kd_barang = $kd;

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



$query = "SELECT * FROM $tabel2 WHERE kd_barang = '$kd_barang'";
if ($result = $conn->query($query)) 
	{
																					
		/* fetch object array */
		while ($row = $result->fetch_row()) 
			{
				$nm_barang = $row[1];
				$kd_kategori = $row[2];
				$ket_barang = $row[3];
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
                        <h1 class="page-header">Edit Data Barang Anda Di sini</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				
                <div class="col-lg-12">
                  <form action="<?php echo $tabah_aksi; ?>barang-edit-x.php?kd=<?php echo $kd_barang; ?>" method="post" role="form">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Barang
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
											while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
												{
													$select = "";
													if ($row['kd_kategori'] == $kd_kategori) {$select = " selected";}
													echo '<option value="'.$row['kd_kategori'].'"'.$select.'>'.$row['nm_kategori'].'</option>';
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
                                            <input class="form-control" placeholder="Nama Barang" name="nm_barang" value="<?php echo $nm_barang; ?>">
                                            <p class="help-block">Sesuaikan dengan barang yang dikredit.</p>
                                        </div>
										<p>&nbsp;</p>
                                        <div class="form-group">
                                            <label>Keterangan</label>
											<p class="help-block">Keterangan terserah Anda.</p>
                                            <textarea class="form-control" rows="3" placeholder="Keterangan"  name="ket_barang"><?php echo $ket_barang; ?></textarea>
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