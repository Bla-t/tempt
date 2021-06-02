<?php
//Otentifikasi user...
$tabah_pelengkap = "../pelengkap/";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');

///////////////////////
//$daysnya = "30 days";

// Tabel database
//$tabel1 = $prefix_tabel.'_barang';
//$tabel2 = $prefix_tabel.'_cicilan';
$tabel3 = $prefix_tabel.'_nilai_cicilan';
//$tabel4 = $prefix_tabel.'_peminjam';

// Cek input
$kd_cicilan = $_POST['kd_cicilan'];
(isset($_POST['cicil1'])) ? $cicil1 = '1' : $cicil1 = '0';
(isset($_POST['cicil2'])) ? $cicil2 = '1' : $cicil2 = '0';
(isset($_POST['cicil3'])) ? $cicil3 = '1' : $cicil3 = '0';
(isset($_POST['cicil4'])) ? $cicil4 = '1' : $cicil4 = '0';
(isset($_POST['cicil5'])) ? $cicil5 = '1' : $cicil5 = '0';
(isset($_POST['cicil6'])) ? $cicil6 = '1' : $cicil6 = '0';

// SQL Rincian Cicilan
$sql_rincian = "UPDATE $tabel3 SET td_lunas = '$cicil1' WHERE kd_cicilan = '$kd_cicilan' AND cicilanke='1'";
if ($conn->query($sql_rincian) === FALSE) { $err_nya = $err_nya.$conn->error."<br/>";}
$sql_rincian = "UPDATE $tabel3 SET td_lunas = '$cicil2' WHERE kd_cicilan = '$kd_cicilan' AND cicilanke='2'";
if ($conn->query($sql_rincian) === FALSE) { $err_nya = $err_nya.$conn->error."<br/>";} 
$sql_rincian = "UPDATE $tabel3 SET td_lunas = '$cicil3' WHERE kd_cicilan = '$kd_cicilan' AND cicilanke='3'";
if ($conn->query($sql_rincian) === FALSE) { $err_nya = $err_nya.$conn->error."<br/>";} 
$sql_rincian = "UPDATE $tabel3 SET td_lunas = '$cicil4' WHERE kd_cicilan = '$kd_cicilan' AND cicilanke='4'";
if ($conn->query($sql_rincian) === FALSE) { $err_nya = $err_nya.$conn->error."<br/>";} 
$sql_rincian = "UPDATE $tabel3 SET td_lunas = '$cicil5' WHERE kd_cicilan = '$kd_cicilan' AND cicilanke='5'";
if ($conn->query($sql_rincian) === FALSE) { $err_nya = $err_nya.$conn->error."<br/>";} 
$sql_rincian = "UPDATE $tabel3 SET td_lunas = '$cicil6' WHERE kd_cicilan = '$kd_cicilan' AND cicilanke='6'";
if ($conn->query($sql_rincian) === FALSE) { $err_nya = $err_nya.$conn->error."<br/>";} 

		//if ($err_nya != "") 
		//{
		//	$conn->close();
		//	header("location:../pinjam-view.php?err_nya=".$err_nya."&kd=".$kd_cicilan."&xtemp=true");
		//}
		//else
		//{

			$conn->close();
			header("location:../pinjam-view.php?kd=".$kd_cicilan."&xtemp=true&mainload=true");
			exit;
		//}
?>
		