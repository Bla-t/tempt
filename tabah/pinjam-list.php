<?php
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
//Functions


// Tabel database
$tabel1 = $prefix_tabel.'_kategori'; //Baca data kategori...
$tabel2 = $prefix_tabel.'_barang'; //Baca data barang...
$tabel3 = $prefix_tabel.'_cicilan'; //Baca data cicilan...
$tabel4 = $prefix_tabel.'_peminjam'; //Baca data peminjam...

$query1 = "SELECT * FROM $tabel2 WHERE kd_barang= '$kd_barang' order by kd_barang ASC";
if ($result = $conn->query($query1)) 
	{
		/* fetch object array */
		while ($data = $result->fetch_array(MYSQLI_ASSOC)) 
			{
				$nm_barang=$data['nm_barang'];
			}
			/* free result set */
			$result->close();
	}
?>

<body>
<div id="wrapper">

<?php include($tabah_pelengkap.'menu-nya.php'); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Cicilan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
           <div class="row">
				<div class="col-lg-12">
				<p>Nama-nama yang menyicil&nbsp;<b><?php echo $nm_barang; ?></b></p>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-success" onclick="window.open('pinjam-tambah.php?kd=<?php echo $kd_barang; ?>','_self')">Tambah?&nbsp;&nbsp;<i class="fa fa-plus"></i></button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="alert alert-danger">
                                            <th>Kode</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Nama Peminjam</th>
                                            <td align="right"><B>Harga Barang</B></td>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
						<?php		
						$countne = 0;
						$total = 0;
						$xquery = "SELECT * FROM $tabel3 WHERE kd_barang='$kd_barang' AND td_cicilan='0' order by kd_cicilan ASC";
						if ($result = $conn->query($xquery)) 
							{
								/* fetch object array */
								while ($data = $result->fetch_array(MYSQLI_ASSOC)) 
									{
									$countne = $countne + 1;
										?>
										<tr>
                                            <td id="<?php echo $data['kd_cicilan']; ?>"><?php echo $data['kd_cicilan']; ?></td>
											<?php $tglne = date_create($data["tgl_pinjam"]); ?>
                                            <td><?php echo date_format($tglne,"d-M-Y"); ?></td>
                                            <td>
											<?php
											$kd_peminjam = $data['kd_peminjam'];
											$query1 = "SELECT * FROM $tabel4 WHERE kd_peminjam='$kd_peminjam'";
											if ($result1 = $conn->query($query1))
											{
												if($nama = $result1->fetch_array(MYSQLI_ASSOC))
												{
													echo $nama['nm_peminjam'];
												}
												$result1->close();
											}
											?>
											</td>
											<td align="right"><?php echo "Rp. ".number_format($data['nil_harga']); ?></td>
											<?php $total = $total + $data['nil_harga']; ?>
											<td>
												<button class="btn btn-xs" onClick="view(<?php echo $data['kd_cicilan']; ?>)"><i class="fa  fa-search "></i></a>
												<button type="button" class="btn btn-primary btn-xs" onclick="window.open('pinjam-edit.php?kd=<?php echo $data['kd_cicilan']; ?>', '_self')"><i class="fa fa-pencil"></i></button>
												<button type="button" class="btn btn-danger btn-xs" onclick="del('<?php echo $data['kd_cicilan']; ?>')"><i class="fa fa-minus"></i></button>												
											</td>
                                        </tr>
										<?php
									}
									if ($total != 0) // jika total <> 0
									{
									?>
									<tr class="alert alert-info">
                                            <td></td>
                                            <td></td>
											<td align="right"><B>Total :</B></td>
											<td align="right"><?php echo "Rp. ".number_format($total); ?></td>
											<td></td>
                                        </tr>
									<?php
									}
								}
							/* free result set */
							$result->close();
							if ($countne == 0) // jika tidak ada data dalam database
								{
								?>
								</tr>
									<td colspan="5">
									<div class="alert alert-info alert-dismissable">
								    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">[X]</button>
									    Belum ada yang nyicil&nbsp;<b><?php echo $nm_barang; ?></b>&nbsp;
										<button type="button" class="btn btn-success btn-xs" onclick="window.open('pinjam-tambah.php?kd=<?php echo $kd_barang; ?>','_self')">Tambah?&nbsp;&nbsp;<i class="fa fa-plus"></i></button>
									</div>
									</td>
								</tr>
								<?php
								}
								?>
									</tbody>
								</table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
						<div class="panel-footer">
                            <button type="button" class="btn btn-success" onclick="window.open('pinjam-tambah.php?kd=<?php echo $kd_barang; ?>','_self')">Tambah?&nbsp;&nbsp;<i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
				
            
            <!-- /.container-fluid -->
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include($tabah_pelengkap.'footer-nya.php'); ?>
	
	<!-- Deletion to COnfirm - asanoer.com -->

<script>
function del(kodenya) {
    var x=document.getElementById(kodenya).innerHTML;
	//x = x.replace(/'/g, "\\'");
    if (confirm('Apa benar "'+x+'" akan dihapus?') == true) {
        window.open('<?php echo $tabah_aksi; ?>pinjam-del.php?kd_cicilan='+kodenya,'_self');
    }
}

function view(kode)
		{
			window.open('pinjam-view.php?kd='+kode,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=750px,height=400px')
		}
</script>
	

</body>

</html>

<?php
$conn->close();
?>