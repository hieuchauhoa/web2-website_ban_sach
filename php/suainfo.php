<?php

ini_set('session.auto_start',0);
ini_set('session.cookie_lifetime',0);
session_start();


require('DataProvider.php');
if(isset($_POST['makhachhang']))
{
	$maKH=$_POST['makhachhang'];

		//------------------------Sua trong database khachhang-----------------------------------------------//

	$sql="UPDATE khachhang SET "
	.	"HoTen='".$_POST['hoten']."', "
	.	"Email='".$_POST['email']."', "
	.	"SĐT='".$_POST['sdt']."'  "
	.	"WHERE MaKH='".$_POST['makhachhang']."'";
	DataProvider::executeQuery($sql);
	echo $_POST['duong'];
	echo $_POST['phuong'];
	echo $_POST['quan'];
	echo $_POST['TP'];
	$DiaChi=$_POST['duong'].", "."Phường ".$_POST['phuong'].", "."Quận ".$_POST['quan'].", ".$_POST['TP'];
	echo $DiaChi;
	$_SESSION['login']=array(	'MaKH' => $maKH,
		'TenDangNhap' => $_POST['tendangnhap'],
		'MaQuyen' => $_SESSION['login']['MaQuyen'],
		'HoTen' => $_POST['hoten'],
		'Email' => $_POST['email'],
		'SĐT' => $_POST['sdt'],
		'DiaChi' => $DiaChi,
		'htgh' => 1,
		'httt' => 3);


}

	//------------------------Quay ve trang quanlysanpham.php-----------------------------------------------//

$hostName=$_SERVER['HTTP_HOST'];
$dirURL=rtrim(dirname($_SERVER['PHP_SELF']));
$pageName="giohang.php";
$url="http://".$hostName.$dirURL."/".$pageName;
header("Location:$url");
exit;
?>