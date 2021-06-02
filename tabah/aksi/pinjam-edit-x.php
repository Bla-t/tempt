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
echo $tgl_jatuh_1."<br/>";
echo $tgl_jatuh_2."<br/>";
echo $tgl_jatuh_3."<br/>";
echo $tgl_jatuh_4."<br/>";
echo $tgl_jatuh_5."<br/>";
echo $tgl_jatuh_6."<br/>";
*/
$err_nya =0;
// SQL Cicilan
$sql_cicilan = "UPDATE $tabel2 SET
				kd_peminjam	= '$kd_peminjam',
				tgl_pinjam	= '$tgl_pinjam',
				nil_harga	= '$nil_harga',
				kd_peminjam = '$kd_peminjam'
				WHERE kd_cicilan ='$kd_cicilan'";
if ($conn->query($sql_cicilan) === FALSE) {	$err_nya = $err_nya.$conn->error."<br/>";} // else { $conn->close(); }
				
// SQL Rincian Cicilan
$sql_rincian = "UPDATE $tabel3 SET angka_nilai = '$angka_nilai_1', tgl_tempo = '$tgl_jatuh_1' WHERE kd_cicilan = '$kd_cicilan' AND cicilanke='1'";
if ($conn->query($sql_rincian) === FALSE) { $err_nya = $err_nya.$conn->error."<br/>";} 
$sql_rincian = "UPDATE $tabel3 SET angka_nilai = '$angka_nilai_2', tgl_tempo = '$tgl_jatuh_2' WHERE kd_cicilan = '$kd_cicilan' AND cicilanke='2'";
if ($conn->query($sql_rincian) === FALSE) { $err_nya = $err_nya.$conn->error."<br/>";} 
$sql_rincian = "UPDATE $tabel3 SET angka_nilai = '$angka_nilai_3', tgl_tempo = '$tgl_jatuh_3' WHERE kd_cicilan = '$kd_cicilan' AND cicilanke='3'";
if ($conn->query($sql_rincian) === FALSE) { $err_nya = $err_nya.$conn->error."<br/>";} 
$sql_rincian = "UPDATE $tabel3 SET angka_nilai = '$angka_nilai_4', tgl_tempo = '$tgl_jatuh_4' WHERE kd_cicilan = '$kd_cicilan' AND cicilanke='4'";
if ($conn->query($sql_rincian) === FALSE) { $err_nya = $err_nya.$conn->error."<br/>";} 
$sql_rincian = "UPDATE $tabel3 SET angka_nilai = '$angka_nilai_5', tgl_tempo = '$tgl_jatuh_5' WHERE kd_cicilan = '$kd_cicilan' AND cicilanke='5'";
if ($conn->query($sql_rincian) === FALSE) { $err_nya = $err_nya.$conn->error."<br/>";} 
$sql_rincian = "UPDATE $tabel3 SET angka_nilai = '$angka_nilai_6', tgl_tempo = '$tgl_jatuh_6' WHERE kd_cicilan = '$kd_cicilan' AND cicilanke='6'";
if ($conn->query($sql_rincian) === FALSE) { $err_nya = $err_nya.$conn->error."<br/>";} 

if ($err_nya != "")
{
	echo "Gagal, update cicilan kode $kd_cicilan ..!!... <br/>Silahkan hubungi Khasan...";exit;
}
header("location:../pinjam-list.php?kd=".$kd_barang);
/*
		if ($conn->query($sql_cicilan) === FALSE) 
		{
			$err_nya = $conn->error;
			$conn->close();
			//header("location:../pinjam-edit.php?err_nya=".$err_nya."&kd=".$kd_barang);
			echo $err_nya;
		}
		else
		{
			if ($conn->query($sql_rincian) === FALSE) 
			{
				$err_nya = $conn->error;
				$conn->close();
				//header("location:../pinjam-edit.php?err_nya=".$err_nya."&kd=".$kd_barang);
				echo $err_nya;
			}
			else
			{
				$conn->close();
				//header("location:../pinjam-list.php?kd=".$kd_barang);
				echo $err_nya;
			}
		}
*/
?>
		