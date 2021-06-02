<?php

//Silahkan di Buka Lagi ya :

//http://www.asanoer.com/artikel/aplikasi-php-mysql-cicilan-barang-enam-bulan-dengan-boostrap-v-1-1.html

//Salam,
//asanoer.com

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

$query1 = "SELECT * FROM $tabel1 order by kd_kategori ASC";
if ($result = $conn->query($query1)) 
	{
		/* fetch object array */
		while ($row = $result->fetch_row()) 
			{
				$kd_kategori["$row[0]"] = $row[1];//echo '<option value="'.$row[0].'">'.$row[1].'</option>';
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
                        <h1 class="page-header">Daftar Barang Anda</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
           <div class="row">
				<div class="col-lg-12">
				<p>Silahkan untuk menambah, atau mengedit, ataupun menghapus barang Anda di tabel di bawah ini.</p>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <asanoertambah class="btn btn-success">Data Barang Anda&nbsp;&nbsp;<i class="fa fa-plus"></i></asanoertambah>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
						<?php			
						$query2 = "SELECT * FROM $tabel2 WHERE td_barang='0' order by kd_barang ASC";
						if ($result = $conn->query($query2)) 
							{
								/* fetch object array */
								while ($row = $result->fetch_row()) 
									{
										?>
										<tr>
                                            <td><?php echo $row[0]; ?></td>
                                            <td id="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></td>
                                            <td><?php echo $kd_kategori["$row[2]"]; ?></td>
											<td>
												<asanoeredit class="btn btn-primary btn-xs" id="<?php echo addslashes($row[0]); ?>"><i class="fa fa-pencil"></i></asanoeredit>
												<asanoerhapus class="btn btn-danger btn-xs" id="<?php echo addslashes($row[0]); ?>"><i class="fa fa-minus"></i></asanoerhapus>
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
                            <asanoertambah class="btn btn-success">Data Barang Anda&nbsp;&nbsp;<i class="fa fa-plus"></i></asanoertambah>
                        </div>
                    </div>
                    <!-- /.panel -->
					</div>
            </div>
		</div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

	<!-- Modal HTML -->

	<div id="asanoer-modal" class="modal fade"></div>

	<!-- /////////Modal HTML -->
	
<?php include($tabah_pelengkap.'footer-nya.php'); ?>
	
	<!-- Deletion to COnfirm - asanoer.com -->



   <!--  MODAL JS -->
<script type="text/javascript">
    $(document).ready(function(){
		$("asanoerhapus").click(function(){	
			$("#asanoer-modal").load('confirm-hapus-barang.php?kd_barang='+this.id);
			$("#asanoer-modal").modal({backdrop: 'static'});
		});
		
		$("asanoeredit").click(function(){	
			$("#asanoer-modal").load('barang-edit.php?kd='+this.id);
			$("#asanoer-modal").modal({backdrop: 'static'});
		});
		
		$("asanoertambah").click(function(){	
			$("#asanoer-modal").load('barang-tambah.php');
			$("#asanoer-modal").modal({backdrop: 'static'});
		});
		
    });
</script>	
	

</body>

</html>

<?php
$conn->close();
?>