<?php
//Otentifikasi user...
$tabah_pelengkap = "../pelengkap/";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');

/////////////
$kd = "";		
extract($_GET);
$kd_peminjam = $kd;

// Tabel database
$tabel = $prefix_tabel.'_peminjam';

// Cek input
$nm_peminjam = $_POST['nm_peminjam'];
$idc_peminjam = $_POST['idc_peminjam'];
$amt_peminjam = $_POST['amt_peminjam'];
$tlp_peminjam = $_POST['tlp_peminjam'];
//$tgl_simpan = $xDate;
//$jam_simpan = $xClock;

// SQL database
$sql = "UPDATE $tabel SET
		nm_peminjam = '$nm_peminjam',
		idc_peminjam = '$idc_peminjam',
		amt_peminjam = '$amt_peminjam',
		tlp_peminjam = '$tlp_peminjam'
		WHERE kd_peminjam='$kd_peminjam'"; 		
		if ($conn->query($sql) === FALSE) 
		{
			$err_nya = $conn->error;
			$conn->close();
			header("location:../peminjam-edit.php?err_nya=".$err_nya);
		}
		else
		{
			$conn->close();
			header("location:../peminjam-list.php");
		}
?>