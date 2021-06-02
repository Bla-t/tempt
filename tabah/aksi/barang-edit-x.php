<?php
//Otentifikasi user...
$tabah_pelengkap = "../pelengkap/";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');

/////////////
$kd = "";		
extract($_GET);
$kd_barang = $kd;



// Tabel database
$tabel = $prefix_tabel.'_barang';

// Cek input
//$kd_barang = $_POST['kd_barang'];
$nm_barang = $_POST['nm_barang'];
$kd_kategori = $_POST['kd_kategori'];
$ket_barang = $_POST['ket_barang'];
//$tgl_simpan = $xDate;
//$jam_simpan = $xClock;

// SQL database
$sql = "UPDATE $tabel SET
		nm_barang = '$nm_barang',
		kd_kategori = '$kd_kategori',
		ket_barang = '$ket_barang'
		WHERE kd_barang='$kd_barang'"; 		
		if ($conn->query($sql) === FALSE) 
		{
			$err_nya = $conn->error;
			$conn->close();
			header("location:../barang-edit.php?err_nya=".$err_nya);
		}
		else
		{
			$conn->close();
			header("location:../barang-list.php");
		}

//$conn->close();

//header("location:../barang-list.php");
?>