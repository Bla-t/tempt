<?php
//Otentifikasi user...
$tabah_pelengkap = "../pelengkap/";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');

///////////////////////

// Tabel database
$tabel = $prefix_tabel.'_barang';

// Cek input
//$kd_barang = $_POST['kd_barang'];
$nm_barang = $_POST['nm_barang'];
$kd_kategori = $_POST['kd_kategori'];
$ket_barang = $_POST['ket_barang'];
$tgl_simpan = $xDate;
$jam_simpan = $xClock;

// SQL database
$sql = "INSERT INTO $tabel (nm_barang,kd_kategori,ket_barang,tgl_simpan,jam_simpan)
		VALUES ('$nm_barang','$kd_kategori','$ket_barang','$tgl_simpan','$jam_simpan')"; 
		
		if ($conn->query($sql) === FALSE) 
		{
			$err_nya = $conn->error;
			$conn->close();
			header("location:../barang-tambah.php?err_nya=".$err_nya);
		}
		else
		{
			$conn->close();
			header("location:../barang-list.php");
		}

//$conn->close();

//header("location:../barang-list.php");
?>