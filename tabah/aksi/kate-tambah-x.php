<?php
//Otentifikasi user...
$tabah_pelengkap = "../pelengkap/";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');

//////////////////////////////////////////////////

// Tabel database
$tabel = $prefix_tabel.'_kategori';

// Cek input
//$kd_kategori = $_POST['kd_kategori'];
$nm_kategori = $_POST['nm_kategori'];
$ket_kategori = $_POST['ket_kategori'];
$tgl_simpan = $xDate;
$jam_simpan = $xClock;

// SQL database
$sql = "INSERT INTO $tabel (nm_kategori,ket_kategori,tgl_simpan,jam_simpan)
		VALUES ('$nm_kategori','$ket_kategori','$tgl_simpan','$jam_simpan')"; 
		
		if ($conn->query($sql) === FALSE) 
		{
			$err_nya = $conn->error;
			$conn->close();
			header("location:../kate-tambah.php?err_nya=".$err_nya);
		}
		else
		{
			$conn->close();
			header("location:../kate-list.php");
		}

//$conn->close();

//header("location:../barang-list.php");
?>