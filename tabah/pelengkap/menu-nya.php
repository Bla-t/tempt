<?php
$tabel8 = $prefix_tabel.'_usaha';
	$qry = "SELECT * FROM $tabel8 WHERE td_usaha = '0'";
		$hasil = $conn->query($qry);		
		$data = $hasil->fetch_array(MYSQLI_ASSOC); //memecah hasil ke dalam array
			//$kd_usaha = $data['kd_usaha'];
			$nm_usaha = $data['nm_usaha'];
			$alm_usaha = $data['alm_usaha'];
			$logo_usaha = $data['logo_usaha']; // Ektensi JPG
		$hasil->close();
?>

<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $uri; ?>"><strong><img src="<?php echo $tabah_pelengkap."gambar/$logo_usaha"; ?>" width="30px" height="30px"/>
				&nbsp;&nbsp;<?php echo "$nm_usaha [ $alm_usaha ]"; ?></strong></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $lengkap_user; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li><a href="user-view.php"><i class="fa fa-user fa-fw"></i> Profil Anda</a>
                        </li>
                        <li><a href="user-set.php"><i class="fa fa-gear fa-fw"></i> Pengaturan</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $uri."logout"; ?>"><i class="fa fa-sign-out fa-fw"></i> Keluar</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
			
			 <!-- /.navbar-left -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Cari di sini">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
						<li>
                            <a href="dasbor-utama.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="aplikasi-atur.php"><i class="fa fa-institution fa-fw"></i> Perusahaan</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-database fa-fw"></i> Master Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="barang-list.php"><i class="fa fa-files-o fa-fw"></i>Daftar Barang</a>
                                </li>
                                <li>
                                    <a href="kate-list.php"><i class="fa fa-files-o fa-fw"></i>Daftar Kategori</a>
                                </li>
								<li>
                                    <a href="peminjam-list.php"><i class="fa fa-files-o fa-fw"></i>Daftar Peminjam</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						
				<?php
				$query1 = "SELECT * FROM $tabel1 WHERE td_kategori='0' order by kd_kategori ASC";
				if ($result = $conn->query($query1)) 
				{
					/* fetch object array */
					while ($row = $result->fetch_row()) 
						{
							?>
							<li>
							<a href="#"><i class="fa fa-list fa-fw"></i><?php echo " ".$row[1]; ?><span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
							
					<?php
					$query2 = "SELECT * FROM $tabel2 WHERE kd_kategori='$row[0]' AND td_barang='0' order by kd_barang ASC";
					if ($result2 = $conn->query($query2)) 
					{
						/* fetch object array */
						while ($rowx = $result2->fetch_row()) 
						{
							?>
                                <li>
                                    <a href="pinjam-list.php?kd=<?php echo $rowx[0] ; ?>"><?php echo $rowx[1]; ?></a>
                                </li>
							<?php
						}
						/* free result set */
					$result2->close();
					}
					?>
								</ul>
							</li>
							<?php
						}
					/* free result set */
					$result->close();
				}
				?>
                         <!--<li>
                            <a href="http://demo.asanoer.com/cicilan/download.php" target="_blank"><i class="fa fa-download fa-fw"></i> Download</a>
                        </li>-->		
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<?php
//$conn->close();
?>