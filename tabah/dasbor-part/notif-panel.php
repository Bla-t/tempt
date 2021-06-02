<div class="row">
		<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Panel-panel Notifikasi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
							<?php if ($jml_peminjam == 0) { ?>
								<a href="peminjam-tambah.php" class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> Belum ada peminjam yang terdaftar.
									<span class="pull-right text-muted small"><em>Klik Untuk Menambahkan</em>
                                    </span>
                                </a>
							<?php } ?>
							<?php if ($jml_tempo == 0) { ?>
								<div class="list-group-item">
                                    <i class="fa fa-calendar fa-fw"></i> Tidak ada tertagih pada hari ini.
                                    <span class="pull-right text-muted small"><em>Tanggal:&nbsp;<?php $tglne = date_create($xDate); echo date_format($tglne,"d-M-Y"); ?></em>
                                    </span>
                                </div>
							<?php } ?>
							<?php if ($jml_barang == 0) { ?>
								<a href="barang-tambah.php" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> Belum ada barang.
                                    <span class="pull-right text-muted small"><em>Klik Untuk Menambahkan</em>
                                    </span>
                                </a>
							<?php } ?>
                            </div>
                            <!-- /.list-group -->
                            <!-- a href="#" class="btn btn-default btn-block" onclick="alert('Belum ada..')">Tampilkan Semua</a -->
                        </div>
                        <!-- /.panel-body -->
       </div>
</div>