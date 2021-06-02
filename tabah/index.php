<?php
$page = "";
$folder_utama ="tabah";
$home = 'dasbor-utama.php';
extract($_GET);

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	$foldernya = $_SERVER["REQUEST_URI"]; 
	$uri .= $foldernya;

//pemecah URL berdasarkan garis miring --- sudah dikonfigurasi pada .htaccess
$url_utuh = $uri;
$url = explode("/",$url_utuh);

// Pencari index folder utama
$x = 0;
$max = 10;
while($x <= $max)
{
    IF ($url[$x] == $folder_utama) 
		{
		$ut = $x;
		$x = $max;
		}
    $x++;
} 
unset($x);unset($max);unset($url_utuh);
$ut++;
(ISSET($url[$ut])) ? $a= $url[$ut]: $a = "";// page
$ut++;
(ISSET($url[$ut])) ? $b= $url[$ut]: $b = "";// lainnya
$ut++;
(ISSET($url[$ut])) ? $c= $url[$ut]: $c = "";// lainnya
$ut++;
(ISSET($url[$ut])) ? $d= $url[$ut]: $d = "";//
$ut++;
(ISSET($url[$ut])) ? $e= $url[$ut]: $e = "";// 
$ut++;
(ISSET($url[$ut])) ? $f= $url[$ut]: $f = "";// 
/*
$x=0;
echo $url_utuh."<br/>";
echo "a=$a b=$b c=$c d=$d e=$e f=$f<br/>";
echo "a=$url[$x] b=$url[$x] c=$url[$x] d=$url[$x] e=$url[$x] f=$url[$x]";
exit;
*/

if ($a != "") {$page = $a;}
switch ($page) {
	case "":
		session_start();
		If (isset($_SESSION['authorized']))
			{header('location:'.$home); } // home login
		else
			{header("location:login"); } // page login
		exit;
    case "logout":
		$folder_awal = "https://www.asanoer.com/template/sb-admin-2/";
		session_start();
        session_destroy();
		include('login.php'); // home login
		exit;
        break;
    case "login":
		$folder_awal = "https://www.asanoer.com/template/sb-admin-2/";
		session_start();
		If (!isset($_SESSION['authorized']))
			{ include('login.php'); }
		else
			{ header('location:'.$home);}
        exit;
        break;
//	case "authorized":
//		header('location:'.$home); // home login
//       exit;
//        break;
	case "log-masuk.txt":
		include('aksi/log-masuk.php'); // home login
        exit;
        break;
  //   default:
		// include('no-page.php'); // home login
  //       exit;
  //       break;
        break;
}
?>