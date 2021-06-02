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
$tabel5 = $prefix_tabel.'_nilai_cicilan'; //Baca data peminjam...
?>

<body>
<div id="wrapper">

<?php include($tabah_pelengkap.'menu-nya.php'); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Penyicil Yang Tertagih Jatuh Tempo</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
           <div class="row">
				<div class="col-lg-12">
				<p>Nama-nama yang terkena jatuh tempo sampai:&nbsp;<B><?php $tglne = date_create($xDate); echo date_format($tglne,"d-M-Y"); ?></B></p>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            &nbsp;
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="alert alert-danger">
                                            <th>Kode</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Nama Peminjam</th>
											<th>Cicilan Ke</th>
                                            <td align="right"><B>Tertagih</B></td>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
						<?php		
						$countne = 0;
						$total = 0;
						$xquery = "SELECT * FROM $tabel5 WHERE td_lunas = '0' AND tgl_tempo <= '$xDate' order by kd_nilai ASC";
						if ($result = $conn->query($xquery)) 
							{
								/* fetch object array */
								while ($data = $result->fetch_array(MYSQLI_ASSOC)) 
									{
									$countne = $countne + 1;
									$kd_cicilan = $data['kd_cicilan'];
									$cicilanke = $data['cicilanke'];
									$angka_nilai = $data['angka_nilai'];
									$tgl_tempo = $data['tgl_tempo'];
									$qry = "SELECT * FROM $tabel3 WHERE kd_cicilan='$kd_cicilan' AND td_cicilan = '0'";
									$hasil = $conn->query($qry);
									if ($dt = $hasil->fetch_array(MYSQLI_ASSOC))
										{
											$kd_peminjam = $dt['kd_peminjam'];
											//$tgl_pinjam = $dt['tgl_pinjam'];
											//$nil_harga = $dt['nil_harga']; 
										}	
									$hasil->close();
										?>
										<tr>
                                            <td id="<?php echo $kd_cicilan; ?>"><?php echo $kd_cicilan; ?></td>
                                            <td><?php $tglne = date_create($tgl_tempo); echo date_format($tglne,"d-M-Y"); ?></td>
                                            <td>
											<?php
											$query1 = "SELECT * FROM $tabel4 WHERE kd_peminjam='$kd_peminjam'";
											$result1 = $conn->query($query1);
											$nama = $result1->fetch_array(MYSQLI_ASSOC);
											echo $nama['nm_peminjam'];
											$result1->close();
											?>
											</td>
											<td>Cicilan Ke-<?php echo $cicilanke; ?></td>
											<td align="right"><?php echo "Rp. ".number_format((int)$angka_nilai); ?></td>
											<?php $total = $total + (int)$angka_nilai; ?>
											<td>
												<button class="btn btn-xs btn-success" onClick="view(<?php echo $kd_cicilan; ?>)"><i class="fa  fa-search "></i> Detail</a>
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
									<div class="alert alert-success alert-dismissable">
								    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">[X]</button>
										Tidak ada yang tertagih jatuh tempo hari ini.
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
                            &nbsp;
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
			window.open('pinjam-view.php?kd='+kode+'&xtemp=true','targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=750px,height=400px')
		}
</script>
	

</body>

</html>

<?php
$conn->close();
?>