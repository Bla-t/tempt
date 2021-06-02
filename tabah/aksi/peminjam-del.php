<?php
//read data URL
extract($_GET); 

//Otentifikasi user...
$tabah_pelengkap = "../pelengkap/";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');

// Tabel database
$tabel = $prefix_tabel.'_peminjam';

// Cek input
$kd_peminjam_hapus = $kd_peminjam;

// SQL database

$sql = "UPDATE $tabel SET td_peminjam='1' WHERE kd_peminjam='$kd_peminjam_hapus'"; 
		
		if ($conn->query($sql) === FALSE) 
		{
			echo "Error HAPUS to : $tabel KODE PEMINJAM = $kd_peminjam_hapus<br> $conn->error";
			$conn->close();
		}
		else
		{
			$conn->close();
			header("location:../peminjam-list.php");
		}
?>