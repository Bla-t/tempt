<?php
	$folder_utama = "tabah";
	// Pembuatan BASE URL
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	$path = $_SERVER["REQUEST_URI"];
	$file = basename($path);         // $file is set to filename
	$foldernya = str_replace($file,NULL,$path); // buang nama file php
	$uri .= $foldernya;
	
	session_start();
	$kd_user = $_SESSION['authorized'];
	$qry = "SELECT * FROM tabah_user WHERE kd_user= '$kd_user' AND td_user = '0'";
		$hasil = $conn->query($qry);		
		$jml_user = $hasil->num_rows; // Jumlah penyicil aktip.
		$data = $hasil->fetch_array(MYSQLI_ASSOC); //memecah hasil ke dalam array
		$lengkap_user = $data['lengkap_user'];
		$hasil->close();
	
	//if (!isset($_SESSION['authorized']))
	If ($jml_user == 0)
		{ 
			//echo $uri;
			$conn->close();
			header('location:'.$uri); // index.php
			exit;
		}
	$folder_awal = "https://www.asanoer.com/template/sb-admin-2/";
?>