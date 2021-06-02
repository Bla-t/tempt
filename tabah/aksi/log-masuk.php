<?php

$tabah_pelengkap = 'pelengkap/';
include($tabah_pelengkap.'koneksi-nya.php');


//Functions
function pesan_salah()
{
	$str_nya ="
	<div class=\"alert alert-danger alert-dismissable\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">X</button>
        Kemungkinan Salah Nama Anda / Sandi Anda.
    </div>
	";
	return $str_nya;
}

function pesan_masuk()
{
	$str_nya ="
	<div class=\"alert alert-success alert-dismissable\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">X</button>
        Silahkan masuk.
    </div>
	";
	return $str_nya;
}

function pesan_isikan()
{
	$str_nya ="
	<div class=\"alert alert-info alert-dismissable\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">X</button>
        Silahkan isilah Nama dan Sandi.
    </div>
	";
	return $str_nya;
}

// Tabel database
$tabel1 = $prefix_tabel.'_user'; //Baca tabel user...

// Sumber Session PHP = http://www.sitepoint.com/php-sessions/
//$foldernya = 'http://www.asanoer.com/xdr/';
if ((isset($_POST['nm_user'])) AND (isset($_POST['sd_user'])))  //-->> Untuk mencegah akses langsung ke log-masuk.php
	{
		if (($_POST['nm_user'] == '') And ($_POST['sd_user'] == ''))
		{
			$arr = array('alih' => '-', 'pesan' => pesan_isikan(), 'status' => '0');
			echo json_encode($arr);
			exit();
		}
		
		//Ambil jumlah user
		$jml_user = 0;
		$nm_user = $_POST['nm_user'];
		$sd_user = md5($_POST['sd_user']);
		$qry = "SELECT * FROM $tabel1 WHERE nm_user= '$nm_user' AND sd_user = '$sd_user' AND td_user = '0'";
		$hasil = $conn->query($qry);		
		$jml_user = $hasil->num_rows; // cek keberadaan user
		$data = $hasil->fetch_array(MYSQLI_ASSOC); //memecah hasil ke dalam array
		$kd_user = $data['kd_user'];
		$hasil->close();
		
		if ($jml_user == 1)
			{
			// Sukses Login..........
			session_start();
			$_SESSION['authorized'] = $kd_user;
			$arr = array('alih' => $home, 'pesan' => pesan_masuk(), 'status' => '1'); // Login OK
			echo json_encode($arr);
			//echo '{"alih":"dasbor-utama.php","pesan":"'.pesan_masuk().'","status":"1"}';
			exit();
			}
		else
			{
			// Salah Login..........
			$arr = array('alih' => '-', 'pesan' => pesan_salah(), 'status' => '0');
			echo json_encode($arr);
			exit();
			}
	}
	else
	{
	$arr = array('alih' => '-', 'pesan' => "NULL", 'status' => '0');
	echo json_encode($arr);
	}
?>