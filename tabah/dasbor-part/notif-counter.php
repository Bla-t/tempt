	<div class="row">
		<?php if ($jml_peminjam >= 1) { ?>
		<?php ////////////////////////////////////////// ?>
			<a href="peminjam-list.php">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-archive fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jml_peminjam; ?></div>
                                    <div>Jumlah Stok Barang</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Tampilkan Detail</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
			<?php }
			if ($jml_tempo >= 1) {
			?>
			<?php ////////////////////////////////////////// ?>
            <a href="tempo-list.php">
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clipboard fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jml_tempo; ?></div>
                                    <div>Laporan Pengiriman</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Tampilkan Semua</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
			<?php }
			?>

<?php ////////////////////////////////////////// ?><?php ////////////////////////////////////////// ?>			

			<?php if ($jml_barang >= 1) { ?>
            <a href="barang-list.php">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jml_barang; ?></div>
                                    <div>Laporan Pembelian</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Tampilkan</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </a>
				<?php } ?>
<?php ///////////////////////////////////////// ?><?php ////////////////////////////////////////// ?>			
	</div>