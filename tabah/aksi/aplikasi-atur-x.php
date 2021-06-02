<?php
//Otentifikasi user...
$tabah_pelengkap = "../pelengkap/";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');

///////////////////////

// Tabel database
$tabel8 = $prefix_tabel.'_usaha';

// Cek input
$nm_usaha = $_POST['nm_usaha'];
$alm_usaha = $_POST['alm_usaha'];
$status = $_POST['status'];
IF($status == "berlogo")
{
	IF (isset($_POST['hapus_gambar']))
	{
		//$logo_file = $tabah_pelengkap."gambar/".$_POST['logo_usaha'];
		//(file_exists($logo_file)) ? unlink($logo_file):NULL;
		$upload = "0";
	} 
	else 
	{
		$logo_usaha = $_POST['logo_usaha'];
		$upload = "1";
	}
}
IF($status == "takberlogo")
{
$upload = "0";
$filter = "0";
		IF ($_FILES['logo_file']['name'] != "")
		{
		IF (($_FILES["logo_file"]["type"] == "image/jpeg") || ($_FILES["logo_file"]["type"] == "image/jpg") || ($_FILES["logo_file"]["type"] == "image/gif") || ($_FILES["logo_file"]["type"] == "image/png")) { $filter = "1"; }
			IF ($filter == "1")
			{
			$target_dir = $tabah_pelengkap."gambar/";
			$target_file = $target_dir . basename($_FILES["logo_file"]["name"]);
			if (move_uploaded_file($_FILES['logo_file']['tmp_name'], $target_file)) 
			{
				$logo_usaha = basename($_FILES["logo_file"]["name"]);
				$upload = "1";
			} 
				
			}  else { header("location:../aplikasi-atur.php?simpan=true&alertnya=alert-danger&alert=Error : Logo harus jenis GIF, JPG, PNG");exit; }
		}
}
$tgl_simpan = $xDate;
$jam_simpan = $xClock;

//Ambil kode peminjam baru
$hasil = $conn->query("SELECT MAX(kd_usaha) AS kode FROM $tabel8"); //
$maks = $hasil->fetch_array(MYSQLI_ASSOC); //memecah hasil ke dalam array
$kd_usaha= $maks['kode']; //
$hasil->close();

$td=0;
IF ($upload == "0")
{
	// SQL database
	$sql = "INSERT INTO $tabel8 (nm_usaha,alm_usaha,tgl_simpan,jam_simpan)
			VALUES ('$nm_usaha','$alm_usaha','$tgl_simpan','$jam_simpan')";
}
IF ($upload == "1")
{
	// SQL database
	$sql = "INSERT INTO $tabel8 (nm_usaha,alm_usaha,logo_usaha,tgl_simpan,jam_simpan)
			VALUES ('$nm_usaha','$alm_usaha','$logo_usaha','$tgl_simpan','$jam_simpan')";
}
		if ($conn->query($sql) === FALSE) 
		{
			$err_nya = $conn->error;
			$conn->close();
			echo $err_nya;
			//header("location:../barang-tambah.php?err_nya=".$err_nya);
			$td=1;
		}
		
$sql = "UPDATE $tabel8 SET
		td_usaha = '1'
		WHERE kd_usaha = '$kd_usaha'"; 
		
		if ($conn->query($sql) === FALSE) 
		{
			$err_nya = $conn->error;
			$conn->close();
			//echo $err_nya;
			header("location:../aplikasi-atur.php?simpan=true&alertnya=alert-danger&alert=Gagal");
			$td=1;
		}

		if ($td==0)
		{
			$conn->close();
			header("location:../aplikasi-atur.php?simpan=true&alertnya=alert-success&alert=Tersimpan");
		}

//$conn->close();

//header("location:../barang-list.php");
?>