<?php
$tabah_aksi = 'aksi/';
$tabah_pelengkap = 'pelengkap/';
$tabah_judul_hal = "";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');
include($tabah_pelengkap.'header-nya.php');


//Functions


// Tabel database
$tabel1 = $prefix_tabel.'_kategori'; //
$tabel2 = $prefix_tabel.'_barang'; //
$tabel_peminjam = $prefix_tabel.'_peminjam'; //Baca data peminjam...

?>

<body>
<div id="wrapper">

<?php include($tabah_pelengkap.'menu-nya.php'); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Peminjam / Kreditur</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
           <div class="row">
				<div class="col-lg-12">
				<p>Inilah nama-nama dan alamat peminjam / kreditur.</p>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <asanoertambah class="btn btn-success">Peminjam&nbsp;&nbsp;<i class="fa fa-plus"></i></asanoertambah>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
											<th>Telpon</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
						<?php			
						$query1 = "SELECT * FROM $tabel_peminjam WHERE td_peminjam='0' order by kd_peminjam ASC";
						if ($result = $conn->query($query1)) 
							{
								/* fetch object array */
								while ($tabah_data = $result->fetch_array(MYSQLI_ASSOC)) 
									{
										?>
										<tr>
                                            <td><?php echo $tabah_data['kd_peminjam']; ?></td>
                                            <td id="<?php echo $tabah_data['kd_peminjam']; ?>"><?php echo $tabah_data['nm_peminjam']; ?></td>
                                            <td><?php echo $tabah_data['amt_peminjam']; ?></td>
											<td><?php echo $tabah_data['tlp_peminjam']; ?></td>
											<td>
												<asanoeredit class="btn btn-primary btn-xs" id="<?php echo addslashes($tabah_data['kd_peminjam']); ?>"><i class="fa fa-pencil"></i> Edit</asanoeredit>
												<asanoerhapus class="btn btn-danger btn-xs" id="<?php echo addslashes($tabah_data['kd_peminjam']); ?>"><i class="fa fa-minus"></i> Hapus</asanoerhapus>
											</td>
                                        </tr>
										<?php
									}
									/* free result set */
									$result->close();
							}
						?>
									</tbody>
								</table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
						<div class="panel-footer">
                            <asanoertambah class="btn btn-success">Peminjam&nbsp;&nbsp;<i class="fa fa-plus"></i></asanoertambah>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
				
            
            <!-- /.container-fluid -->
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	<!-- Modal HTML -->

	<div id="asanoer-modal" class="modal fade"></div>

	<!-- /////////Modal HTML -->

<?php include($tabah_pelengkap.'footer-nya.php'); ?>

   <!--  MODAL JS -->
<script type="text/javascript">
    $(document).ready(function(){
		$("asanoerhapus").click(function(){	
			$("#asanoer-modal").load('confirm-hapus-peminjam.php?kd_peminjam='+this.id);
			$("#asanoer-modal").modal({backdrop: 'static'});
		});
		
		$("asanoeredit").click(function(){	
			$("#asanoer-modal").load('peminjam-edit.php?kd='+this.id);
			$("#asanoer-modal").modal({backdrop: 'static'});
		});
		
		$("asanoertambah").click(function(){	
			$("#asanoer-modal").load('peminjam-tambah.php');
			$("#asanoer-modal").modal({backdrop: 'static'});
		});
		
    });
</script>
	

</body>

</html>

<?php
$conn->close();
?>