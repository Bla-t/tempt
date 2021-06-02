<?php
//Otentifikasi user...
$tabah_pelengkap = "../pelengkap/";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');

///////////////////////
$daysnya = "30 days";

// Tabel database
//$tabel1 = $prefix_tabel.'_barang';
$tabel2 = $prefix_tabel.'_cicilan';
$tabel3 = $prefix_tabel.'_nilai_cicilan';
//$tabel4 = $prefix_tabel.'_peminjam';

// Cek input
//$kd_peminjam = $_POST['kd_peminjam'];
$kd_cicilan = $_POST['kd_cicilan'];
$kd_peminjam = $_POST['kd_peminjam'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$kd_barang = $_POST['kd_barang'];
$nil_harga = $_POST['nil_harga'];
$tgl_simpan = $xDate;
$jam_simpan = $xClock;
$angka_nilai_1 = $_POST['angka_nilai_1'];
$angka_nilai_2 = $_POST['angka_nilai_2'];
$angka_nilai_3 = $_POST['angka_nilai_3'];
$angka_nilai_4 = $_POST['angka_nilai_4'];
$angka_nilai_5 = $_POST['angka_nilai_5'];
$angka_nilai_6 = $_POST['angka_nilai_6'];

/*
Date add from : http://www.w3schools.com/php/func_date_date_add.asp
$date=date_create("2013-03-15");
date_add($date,date_interval_create_from_date_string("40 days"));
echo date_format($date,"Y-m-d");
*/

$datene = date_create($tgl_pinjam);
$tgl__1 = date_add($datene, date_interval_create_from_date_string($daysnya));
$tgl_jatuh_1 = date_format($tgl__1,"Y-m-d");
$tgl__2 = date_add($datene, date_interval_create_from_date_string($daysnya));
$tgl_jatuh_2 = date_format($tgl__2,"Y-m-d");
$tgl__3 = date_add($datene, date_interval_create_from_date_string($daysnya));
$tgl_jatuh_3 = date_format($tgl__3,"Y-m-d");
$tgl__4 = date_add($datene, date_interval_create_from_date_string($daysnya));
$tgl_jatuh_4 = date_format($tgl__4,"Y-m-d");
$tgl__5 = date_add($datene, date_interval_create_from_date_string($daysnya));
$tgl_jatuh_5 = date_format($tgl__5,"Y-m-d");
$tgl__6 = date_add($datene, date_interval_create_from_date_string($daysnya));
$tgl_jatuh_6 = date_format($tgl__6,"Y-m-d");

/*
$tgl_jatuh_1 = date_add(date_create($tgl_pinjam),date_interval_create_from_date_string("30 days"));
$tgl_jatuh_2 = date_add(date_create($tgl_jatuh_1),date_interval_create_from_date_string("30 days"));
$tgl_jatuh_3 = date_add(date_create($tgl_jatuh_2),date_interval_create_from_date_string("30 days"));
$tgl_jatuh_4 = date_add(date_create($tgl_jatuh_3),date_interval_create_from_date_string("30 days"));
$tgl_jatuh_5 = date_add(date_create($tgl_jatuh_4),date_interval_create_from_date_string("30 days"));
$tgl_jatuh_6 = date_add(date_create($tgl_jatuh_5),date_interval_create_from_date_string("30 days"));
*/

// SQL Cicilan
$sql_cicilan = "INSERT INTO $tabel2 (kd_cicilan,kd_peminjam,tgl_pinjam,kd_barang,nil_harga,tgl_simpan,jam_simpan)
		VALUES ('$kd_cicilan','$kd_peminjam','$tgl_pinjam','$kd_barang','$nil_harga','$tgl_simpan','$jam_simpan')"; 
// SQL Rincian Cicilan
$sql_rincian = "INSERT INTO $tabel3 (`kd_cicilan`, `cicilanke`, `angka_nilai`, `tgl_tempo`)
		VALUES 
		('$kd_cicilan','1','$angka_nilai_1','$tgl_jatuh_1'),
		('$kd_cicilan','2','$angka_nilai_2','$tgl_jatuh_2'),
		('$kd_cicilan','3','$angka_nilai_3','$tgl_jatuh_3'),
		('$kd_cicilan','4','$angka_nilai_4','$tgl_jatuh_4'),
		('$kd_cicilan','5','$angka_nilai_5','$tgl_jatuh_5'),
		('$kd_cicilan','6','$angka_nilai_6','$tgl_jatuh_6')
		";

		if ($conn->query($sql_cicilan) === FALSE) 
		{
			$err_nya = $conn->error;
			$conn->close();
			header("location:../pinjam-tambah.php?err_nya=".$err_nya."&kd=".$kd_barang);
		}
		else
		{
			if ($conn->query($sql_rincian) === FALSE) 
			{
				$err_nya = $conn->error;
				$conn->close();
				header("location:../pinjam-tambah.php?err_nya=".$err_nya."&kd=".$kd_barang);
			}
			else
			{
				$conn->close();
				header("location:../pinjam-list.php?kd=".$kd_barang);
			}
		}
?>
		