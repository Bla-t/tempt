<?php
//Otentifikasi user...
$tabah_pelengkap = "../pelengkap/";
include($tabah_pelengkap.'koneksi-nya.php');
include($tabah_pelengkap.'cek-login.php');

// Tabel database
//$tabel1 = $prefix_tabel.'_kategori'; //Baca data kategori...
//$tabel2 = $prefix_tabel.'_barang'; //Baca data barang...
//$tabel3 = $prefix_tabel.'_cicilan'; //Baca data cicilan...
//$tabel4 = $prefix_tabel.'_peminjam'; //Baca data peminjam...
//$tabel5 = $prefix_tabel.'_nilai_cicilan'; //Baca data cicilan...
$tabel6 = $prefix_tabel.'_user'; // Baca user....
//$tabel7 = $prefix_tabel.'_user_sbg';

// Cek input
$lengkap_user = $_POST['lengkap_user'];
//$nm_user = $_POST['nm_user'];
if($_POST["sd_user"] != '') { $a = 1; $sd_user = $_POST["sd_user"]; } else { $a = 0; }
$email_user = $_POST['email_user'];
$sbg_user = $_POST['sbg_user'];
$tlp_user = $_POST['tlp_user'];

$err_nya =0;
// SQL Cicilan
if ($a==1)
{
	$sd_user = md5($sd_user);
	$sql_ = "UPDATE $tabel6 SET
			lengkap_user	= '$lengkap_user',
			sd_user			= '$sd_user',
			email_user		= '$email_user',
			sbg_user		= '$sbg_user',
			tlp_user		= '$tlp_user'
			WHERE kd_user	= '$kd_user'";
}
else
{
	$sql_ = "UPDATE $tabel6 SET
			lengkap_user	= '$lengkap_user',
			email_user		= '$email_user',
			sbg_user		= '$sbg_user',
			tlp_user		= '$tlp_user'
			WHERE kd_user	= '$kd_user'";
}

			if ($conn->query($sql_) === FALSE) 
			{
				$err_nya = $conn->error;
				$conn->close();
				//header("location:../user-set.php?err_nya=".$err_nya."&kd=".$kd_barang);
				echo $err_nya;
			}
			else
			{
				$conn->close();
				header("location:../user-set.php?simpan=true");
				//echo $err_nya;
			}
?>
		