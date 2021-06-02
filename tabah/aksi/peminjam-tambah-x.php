<?php
//Otentifikasi user...
$tabah_pelengkap = "../pelengkap/";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');

///////////////////////

// Tabel database
$tabel = $prefix_tabel.'_peminjam';

// Cek input
$kd_peminjam = $_POST['kd_peminjam'];
$nm_peminjam = $_POST['nm_peminjam'];
$idc_peminjam = $_POST['idc_peminjam'];
$amt_peminjam = $_POST['amt_peminjam'];
$tlp_peminjam = $_POST['tlp_peminjam'];
$tgl_simpan = $xDate;
$jam_simpan = $xClock;

// SQL database
$sql = "INSERT INTO $tabel (kd_peminjam,nm_peminjam,idc_peminjam,amt_peminjam,tlp_peminjam,tgl_simpan,jam_simpan)
		VALUES ('$kd_peminjam','$nm_peminjam','$idc_peminjam','$amt_peminjam','$tlp_peminjam','$tgl_simpan','$jam_simpan')"; 
		
		if ($conn->query($sql) === FALSE) 
		{
			$err_nya = $conn->error;
			$conn->close();
			header("location:../peminjam-tambah.php?err_nya=".$err_nya);
		}
		else
		{
			$conn->close();
			header("location:../peminjam-list.php");
		}

//$conn->close();

//header("location:../barang-list.php");
?>