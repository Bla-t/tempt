<?php
//Otentifikasi user...
$tabah_pelengkap = "../pelengkap/";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');

/////////////
$kd = "";		
extract($_GET);
$kd_kategori = $kd;
if ($kd_kategori == 0)
	{
		header("location:../kate-list.php");
		exit;
	}

// Tabel database
$tabel = $prefix_tabel.'_kategori';

// Cek input
$nm_kategori = $_POST['nm_kategori'];
$ket_kategori = $_POST['ket_kategori'];
//$tgl_simpan = $xDate;
//$jam_simpan = $xClock;

// SQL database
$sql = "UPDATE $tabel SET
		nm_kategori = '$nm_kategori',
		ket_kategori = '$ket_kategori'
		WHERE kd_kategori='$kd_kategori'"; 		
		if ($conn->query($sql) === FALSE) 
		{
			$err_nya = $conn->error;
			$conn->close();
			header("location:../kate-edit.php?err_nya=".$err_nya);
		}
		else
		{
			$conn->close();
			header("location:../kate-list.php");
		}

//$conn->close();

//header("location:../barang-list.php");
?>