<?php
$err_nya = "";
$kd = "";
$mainload = false;
$xtemp = false;		

extract($_GET);
$kd_cicilan = $kd;
$tempo_list = $xtemp;

$tabah_aksi = 'aksi/';
$tabah_pelengkap = 'pelengkap/';
$tabah_judul_hal = "TRANSAKSI CICILAN $kd_cicilan";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');
include($tabah_pelengkap.'header-nya.php');

// Tabel database
//$tabel1 = $prefix_tabel.'_kategori'; //Baca data kategori...
$tabel2 = $prefix_tabel.'_barang'; //Baca data barang...
$tabel3 = $prefix_tabel.'_cicilan'; //Baca data cicilan...
$tabel4 = $prefix_tabel.'_peminjam'; //Baca data peminjam...
$tabel5 = $prefix_tabel.'_nilai_cicilan'; //Baca data cicilan...
$tabel8 = $prefix_tabel.'_usaha'; // NAma perusahaan

// Handle error
if ($err_nya!="")
{
	?>
	<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    Kesalahan = <?php echo $err_nya; ?>.
    </div>
	<?php
}

if ($mainload == true)
{
?>
<script>
       window.opener.location.reload();
</script>
<?php
}
/*
$query1 = "SELECT * FROM $tabel2 WHERE kd_barang= '$kd_barang' order by kd_barang ASC";
if ($result = $conn->query($query1)) 
	{
		// fetch object array 
		while ($data = $result->fetch_array(MYSQLI_ASSOC)) 
			{
				$nm_barang=$data['nm_barang'];
			}
			// free result set 
			$result->close();
	}
*/

//Ambil rincian cicilan
$hasil = $conn->query("SELECT * FROM $tabel3 WHERE kd_cicilan = '$kd_cicilan'"); // Mengambil kode
$data = $hasil->fetch_array(MYSQLI_ASSOC); //memecah hasil ke dalam array
$kd_peminjam = $data['kd_peminjam']; //
$tgl_pinjam = $data['tgl_pinjam']; //
$kd_barang = $data['kd_barang']; //
$nil_harga = $data['nil_harga']; //
$td_lunas = $data['td_cicilan']; //
$hasil->close();

//Ambil data peminjam
$qr_peminjam = "SELECT * FROM $tabel4 WHERE kd_peminjam='$kd_peminjam'";
$result = $conn->query($qr_peminjam);
$data = $result->fetch_array(MYSQLI_ASSOC);
$nm_peminjam=$data['nm_peminjam'];
$idc_peminjam=$data['idc_peminjam'];
$amt_peminjam=$data['amt_peminjam'];
$tlp_peminjam=$data['tlp_peminjam'];
$result->close();

//Ambil data barang
$qr_barang = "SELECT * FROM $tabel2 WHERE kd_barang='$kd_barang'";
$result = $conn->query($qr_barang);
$data = $result->fetch_array(MYSQLI_ASSOC);
$nm_barang=$data['nm_barang'];
$result->close();

//Ambil data perusahaan
$qr_usaha = "SELECT * FROM $tabel8 WHERE td_usaha='0'";
$result = $conn->query($qr_usaha);
$data = $result->fetch_array(MYSQLI_ASSOC);
$nm_usaha=$data['nm_usaha'];
$alm_usaha=$data['alm_usaha'];
$logo_usaha = $data['logo_usaha']; // Ektensi JPG
$result->close();

//ambil rincian cicilan uang
$query = "SELECT * FROM $tabel5 WHERE kd_cicilan='$kd_cicilan' ORDER BY cicilanke ASC";
	if ($result = $conn->query($query))
		{
		WHILE($cicilnye = $result->fetch_array(MYSQLI_ASSOC))
			{
				$nilaike[$cicilnye['cicilanke']] = $cicilnye['angka_nilai'];
				$tglke[$cicilnye['cicilanke']] = $cicilnye['tgl_tempo'];
				$td_lunas[$cicilnye['cicilanke']] = $cicilnye['td_lunas'];
			}
		$result->close();
		}
?>

<style type='text/css'>
@media screen {
  #printSection {
      display: none;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
}



  </style>
  
 <script type='text/javascript'>
//<![CDATA[
//$(window).load(function(){
//document.getElementById("btnPrint").onclick = function() {
function btnprint() 
{
	printElement(document.getElementById("cetak_ini_0"));
    //printElement(document.getElementById("cetak_ini_1"), true, "<br/>");
	printElement(document.getElementById("cetak_ini_2"), true, "<br/>");
	printElement(document.getElementById("cetak_ini_3"), true, "<br/>");
    //printElement(document.getElementById("printThisToo"), true, "<hr />");
    window.print();
}

function printElement(elem, append, delimiter) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    if (append !== true) {
        $printSection.innerHTML = "";
    }

    else if (append === true) {
        if (typeof(delimiter) === "string") {
            $printSection.innerHTML += delimiter;
        }
        else if (typeof(delimiter) === "object") {
            $printSection.appendChlid(delimiter);
        }
    }

    $printSection.appendChild(domClone);
}
//});
//]]> 
</script>

<body>
<div id="wrapper">

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
					<div class="col-lg-12" style="visibility:show;"id="cetak_ini_0">
						<table border="0">
							<tr>
								<td rowspan="2"><img src="<?php echo $tabah_pelengkap."gambar/".$logo_usaha; ?>"/>&nbsp;&nbsp;</td>
								<td><p><h3><?php echo $nm_usaha; ?></h3></p></td>
							</tr>
							<tr><td><p><?php echo $alm_usaha; ?></p></td></tr>
						</table>	
					</div>
                    <!-- /.col-lg-12 -->
					<div class="col-lg-12" id="cetak_ini_2">
                        <p class="text-right"><B>Cicilan No. <?php echo $kd_cicilan; ?></B></p>
                    </div>
                    <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                            Rincian-rincian
							<p class="text-right">
							<a class="btn btn-default" id="btnPrint" onClick="btnprint()"><i class="fa  fa-print"></i> CETAK</a>
							<a class="btn btn-default" onClick="batal()"><i class="fa fa-repeat"></i> TUTUP</a>
							</p>
                        </div>
                        <div class="panel-body" id="cetak_ini_3">
                            <div class="row">
								<div class="table-responsive">
                                <table class="table">
									<tr><?php if ($tempo_list == true) {$colspan = 'colspan="4"';} else {$colspan = 'colspan="3"';} ?>
										<td <?php echo $colspan; ?>><br/>
											Saya yang bertanda tangan di bawah ini :
										</td>	
									</tr>	
									<tr>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
										<td>:</td>
										<td><?php echo $nm_peminjam; ?></td>
										<?php if ($tempo_list == true) { ?><td>&nbsp;</td> <?php } ?>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;Nomor ID</td>
										<td>:</td>
										<td><?php echo $idc_peminjam; ?></td>
										<?php if ($tempo_list == true) { ?><td>&nbsp;</td> <?php } ?>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;Telpon</td>
										<td>:</td>
										<td><?php echo $tlp_peminjam; ?></td>
										<?php if ($tempo_list == true) { ?><td>&nbsp;</td> <?php } ?>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
										<td>:</td>
										<td><?php echo $amt_peminjam; ?></td>
										<?php if ($tempo_list == true) { ?><td>&nbsp;</td> <?php } ?>
									</tr>
									<tr><?php if ($tempo_list == true) {$colspan = 'colspan="4"';} else {$colspan = 'colspan="3"';} ?>
										<td <?php echo $colspan; ?>><br/><br/>
											Pada tanggal :&nbsp<?php $tglne = date_create($tgl_pinjam); echo date_format($tglne,"d-M-Y");?>&nbsp;telah melakukan penyicilan:
										</td>	
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;Barang</td>
										<td>:</td>
										<td><?php echo $nm_barang; ?></td>
										<?php if ($tempo_list == true) { ?><td>&nbsp;</td> <?php } ?>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;Harga</td>
										<td>:</td>
										<td><?php echo "Rp. ".number_format($nil_harga); ?></td>
										<?php if ($tempo_list == true) { ?><td>&nbsp;</td> <?php } ?>
									</tr>
									<?php
									/*
									<tr>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;Lunas</td>
										<td>:</td>
										<td><?php echo ($td_lunas == "0") ? "Belum" : "Lunas"; ?></td>
									</tr>
									*/
									?>
									<?php if ($tempo_list == true) 
									{
										$colspan = 'colspan="4"';
										?>
											<form action="<?php echo $tabah_aksi; ?>pinjam-view-x.php" method="post" role="form">
											<input type="hidden" value="<?php echo $kd_cicilan; ?>" name="kd_cicilan">
										<?php
									} 
									else 
									{
										$colspan = 'colspan="3"';
									} 
									?>
									<tr><?php if ($tempo_list == true) {$colspan = 'colspan="4"';} else {$colspan = 'colspan="3"';} ?>
										<td <?php echo $colspan; ?>><br/><br/>
											Dengan rincian jatuh tempo dan pembyaran berikut :
										</td>	
									</tr>
									<?php if (($tglke['1'] <= $xDate) && ($td_lunas['1'] == 0)) {$rowinfo='title="Jatuh Tempo" class="alert alert-danger"'; $info = '--> Jatuh Tempo'; } else {$rowinfo=''; $info = '';}  ?>
									<tr <?php echo $rowinfo; ?>>
										<?php $tglne = date_create($tglke['1']); ?>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date_format($tglne,"d-M-Y"); ?></td>
										<td>:</td>
										<td><?php echo "Rp. ".number_format((int)$nilaike['1'])." ".$info; ?> </td>
										<!------------------------------------------------------------------------>
										<?php if ($tempo_list == true) { ?>
										<td>
										<?php if ($td_lunas['1'] == 0) { ?>
											<label style="cursor:pointer;">
												<input type="checkbox" value="" name="cicil1" />&nbsp;Lunas?
											</label>
										<?php }else{ ?>
												<input type="hidden" value="1" name="cicil1" />Lunas
										<?php } ?>
										</td> <?php } ?>
										<!------------------------------------------------------------------------>										
									</tr>
									<?php if (($tglke['2'] <= $xDate) && ($td_lunas['2'] == 0)) {$rowinfo='title="Jatuh Tempo" class="alert alert-danger"'; $info = '--> Jatuh Tempo'; } else {$rowinfo=''; $info = '';}  ?>
									<tr <?php echo $rowinfo; ?>>
										<?php $tglne = date_create($tglke['2']); ?>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date_format($tglne,"d-M-Y"); ?></td>
										<td>:</td>
										<td><?php echo "Rp. ".number_format((int)$nilaike['2'])." ".$info; ?></td>
										<!------------------------------------------------------------------------>
										<?php if ($tempo_list == true) { ?>
										<td>
										<?php if ($td_lunas['2'] == 0) { ?>
											<label style="cursor:pointer;">
												<input type="checkbox" value="" name="cicil2"/> Lunas?
											</label>
										<?php }else{ ?>
												<input type="hidden" value="1" name="cicil2"/> Lunas
										<?php } ?>
										</td> <?php } ?>
										<!------------------------------------------------------------------------>	
									</tr>
									<?php if (($tglke['3'] <= $xDate) && ($td_lunas['3'] == 0)) {$rowinfo='title="Jatuh Tempo" class="alert alert-danger"'; $info = '--> Jatuh Tempo'; } else {$rowinfo=''; $info = '';}  ?>
									<tr <?php echo $rowinfo; ?>>
										<?php $tglne = date_create($tglke['3']); ?>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date_format($tglne,"d-M-Y"); ?></td>
										<td>:</td>
										<td><?php echo "Rp. ".number_format((int)$nilaike['3'])." ".$info; ?></td>
										<!------------------------------------------------------------------------>
										<?php if ($tempo_list == true) { ?>
										<td>
										<?php if ($td_lunas['3'] == 0) { ?>
											<label style="cursor:pointer;">
												<input type="checkbox" value="" name="cicil3"/> Lunas?
											</label>
										<?php }else{ ?>
												<input type="hidden" value="1" name="cicil3"/> Lunas
										<?php } ?>
										</td> <?php } ?>
										<!------------------------------------------------------------------------>	
									</tr>
									<?php if (($tglke['4'] <= $xDate) && ($td_lunas['4'] == 0)) {$rowinfo='title="Jatuh Tempo" class="alert alert-danger"'; $info = '--> Jatuh Tempo'; } else {$rowinfo=''; $info = '';}  ?>
									<tr <?php echo $rowinfo; ?>>
										<?php $tglne = date_create($tglke['4']); ?>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date_format($tglne,"d-M-Y"); ?></td>
										<td>:</td>
										<td><?php echo "Rp. ".number_format((int)$nilaike['4'])." ".$info; ?></td>
										<!------------------------------------------------------------------------>
										<?php if ($tempo_list == true) { ?>
										<td>
										<?php if ($td_lunas['4'] == 0) { ?>
											<label style="cursor:pointer;">
												<input type="checkbox" value="1" name="cicil4"> Lunas?
											</label>
										<?php }else{ ?>
												<input type="hidden" value="1" name="cicil4"> Lunas
										<?php } ?>
										</td> <?php } ?>
										<!------------------------------------------------------------------------>	
									</tr>
									<?php if (($tglke['5'] <= $xDate) && ($td_lunas['5'] == 0)) {$rowinfo='title="Jatuh Tempo" class="alert alert-danger"'; $info = '--> Jatuh Tempo';} else {$rowinfo=''; $info = '';}  ?>
									<tr <?php echo $rowinfo; ?>>
										<?php $tglne = date_create($tglke['5']); ?>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date_format($tglne,"d-M-Y"); ?></td>
										<td>:</td>
										<td><?php echo "Rp. ".number_format((int)$nilaike['5'])." ".$info; ?></td>	
										<!------------------------------------------------------------------------>
										<?php if ($tempo_list == true) { ?>
										<td>
										<?php if ($td_lunas['5'] == 0) { ?>
										<label style="cursor:pointer;">
												<input type="checkbox" value="" name="cicil5"> Lunas?
										</label>
										<?php }else{ ?>
												<input type="hidden" value="1" name="cicil5"> Lunas
										<?php } ?>
										</td> <?php } ?>
										<!------------------------------------------------------------------------>	
									</tr>
									<?php if (($tglke['6'] <= $xDate) && ($td_lunas['6'] == 0)) {$rowinfo='title="Jatuh Tempo" class="alert alert-danger"'; $info = '--> Jatuh Tempo'; } else {$rowinfo=''; $info = '';}  ?>
									<tr <?php echo $rowinfo; ?>>
										<?php $tglne = date_create($tglke['6']); ?>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date_format($tglne,"d-M-Y"); ?></td>
										<td>:</td>
										<td><?php echo "Rp. ".number_format((int)$nilaike['6'])." ".$info; ?></td>	
										<!------------------------------------------------------------------------>
										<?php if ($tempo_list == true) { ?>
										<td>
										<?php if ($td_lunas['6'] == 0) { ?>
											<label style="cursor:pointer;">
												<input type="checkbox" value="" name="cicil6"/> Lunas?
											</label>
										<?php }else{ ?>
												<input type="hidden" value="1" name="cicil6"/> Lunas
										<?php } ?>
										</td> <?php } ?>
										<!------------------------------------------------------------------------>	
									</tr>
									<tr><?php if ($tempo_list == true) {$colspan = 'colspan="4"';} else {$colspan = 'colspan="3"';} ?>
										<td <?php echo $colspan; ?>>&nbsp;
										</td>	
									</tr>
								</table>
							</div>
                            </div>
							<!-- /.row -->
						</div>
						<!-- /.panel-body -->
						<div class="panel-footer">
							<p class="text-right">
								<?php if ($tempo_list == true) { ?> <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SIMPAN PERUBAHAN</button>&nbsp;&nbsp;</form> <?php } ?>
								<a class="btn btn-default" id="btnPrint" onClick="btnprint()"><i class="fa  fa-print"></i> CETAK</a>
								<a class="btn btn-default" onClick="batal()"><i class="fa fa-repeat"></i> TUTUP</a>
							</p>	
						</div>
					</div>
					<!-- /.panel-primary -->
				</div>
                <!-- /.col-lg-12 -->
				</div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
<?php include($tabah_pelengkap.'footer-nya.php'); ?>
	
	<script>
	function batal() 
	{
		//if (confirm('Batalkan ini?') == true) 
		//{
			//window.open('pinjam-list.php?kd=<?php echo $kd_barang; ?>','_self');
			window.close();
		//}
	}
	
</script>

</body>

</html>

<?php
$conn->close();
?>