<?php
//read data URL
extract($_GET); 

//Otentifikasi user...
$tabah_pelengkap = "../pelengkap/";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');

// Tabel database
$tabel = $prefix_tabel.'_barang';

// Cek input
$kd_barang_hapus = $kd_barang;

// SQL database

$sql = "UPDATE $tabel SET td_barang='1' WHERE kd_barang='$kd_barang_hapus'"; 
		
		if ($conn->query($sql) === FALSE) 
		{
			echo "Error HAPUS to : $tabel KODE BARANG = $kd_barang_hapus<br> $conn->error";
			$conn->close();
		}
		else
		{
			$conn->close();
			header("location:../barang-list.php");
		}

//$conn->close();

//header("location:../barang-list.php");
?>