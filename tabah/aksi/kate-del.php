<?php
//read data URL
extract($_GET);

//Otentifikasi user...
$tabah_pelengkap = "../pelengkap/";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');

if ($kd_kategori == 0)
{
	header("location:../kate-list.php");
	exit;
}


// Tabel database
$tabel = $prefix_tabel.'_kategori';
$tabel2 = $prefix_tabel.'_barang';

// Cek input
$kd_kategori_hapus = $kd_kategori;

// SQL database

$sql = "UPDATE $tabel SET td_kategori='1' WHERE kd_kategori='$kd_kategori_hapus'"; 
		
		if ($conn->query($sql) === FALSE) 
		{
			echo "Error HAPUS to : $tabel KODE KATEGORI = $kd_kategori_hapus<br> $conn->error";
			$conn->close();
		}
		else
		{
			//$conn->close();
			$kd_kat = (string)$kd_kategori_hapus; // Integer to string
			$sql = "UPDATE $tabel2 SET kd_kategori='0' WHERE kd_kategori='$kd_kat'";
			if ($conn->query($sql) === FALSE) 
			{
				echo "Error GANTI to : $tabel2 KODE KATEGORI = $kd_kategori_hapus<br> $conn->error";
				$conn->close();
			}
			else
			{
				$conn->close();
				header("location:../kate-list.php");
			}	
		}
?>