<?php
$tabah_aksi = 'aksi/';
$tabah_pelengkap = 'pelengkap/';
$tabah_judul_hal = "";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');
include($tabah_pelengkap.'header-nya.php');


//Functions


// Tabel database
$tabel1 = $prefix_tabel.'_kategori'; //Baca data kategori...
$tabel2 =  $prefix_tabel.'_barang'; //Baca data kategori...
?>


<body>
<div id="wrapper">

<?php include($tabah_pelengkap.'menu-nya.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Kategori Barang</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
           <div class="row">
				<div class="col-lg-12">
				<p>Silahkan untuk menambah, atau mengedit, ataupun menghapus kategori barang Anda di tabel di bawah ini.</p>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
							<asanoertambah class="btn btn-success" >Tambah Kategori&nbsp;&nbsp;<i class="fa fa-plus"></i></asanoertambah>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Kategori</th>
											<th>Keterangan</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
						<?php			
						$query2 = "SELECT * FROM $tabel1 WHERE td_kategori='0' order by kd_kategori ASC";
						if ($result = $conn->query($query2)) 
							{
								/* fetch object array */
								while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
									{
										?>
										<tr>
                                            <td id="<?php echo $row['kd_kategori']; ?>"><?php echo $row['nm_kategori']; ?></td>
                                            <td><?php echo $row['ket_kategori']; ?></td>
											<td>
											<?php 
											if ($row['kd_kategori'] == 0)
											{
												?>
												&nbsp;
												<?php
											}
											else
											{											
												?>
												<asanoeredit class="btn btn-primary btn-xs" id="<?php echo addslashes($row['kd_kategori']); ?>"><i class="fa fa-pencil"></i> Edit</asanoeredit>
												<asanoerhapus class="btn btn-danger btn-xs" id="<?php echo addslashes($row['kd_kategori']); ?>"><i class="fa fa-minus"></i> Hapus</asanoerhapus>
											<?php } ?>
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
                            <asanoertambah class="btn btn-success" >Tambah Kategori&nbsp;&nbsp;<i class="fa fa-plus"></i></asanoertambah>
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
			$("#asanoer-modal").load('confirm-hapus-kate.php?kd_kategori='+this.id);
			$("#asanoer-modal").modal({backdrop: 'static'});
		});
		
		$("asanoeredit").click(function(){	
			$("#asanoer-modal").load('kate-edit.php?kd='+this.id);
			$("#asanoer-modal").modal({backdrop: 'static'});
		});
		
		$("asanoertambah").click(function(){	
			$("#asanoer-modal").load('kate-tambah.php');
			$("#asanoer-modal").modal({backdrop: 'static'});
		});
		
    });
</script>	


</body>

</html>