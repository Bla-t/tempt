<?php
//extract($_GET); 
//$chkbox = $_POST['chk'];
	
// Waktu & Tanggal
$xWaktu = gmdate("d-m-20y H:i:s",time()+60*60*7);
//////////////////////////////////////////////
$xDate = substr ($xWaktu, 0, 10);
$tgl = explode("-",$xDate);
$xDate = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
////////////////////////////////////////////////////////
$xClock = Strstr($xWaktu," ");
$xClock = substr ($xClock, 1);


//// Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
// Sumber = http://www.w3schools.com/php/php_mysql_insert.asp
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Koneksi Gagal : " . $conn->connect_error);
}

/// Prefix tabel
$prefix_tabel = "tabah";
?>