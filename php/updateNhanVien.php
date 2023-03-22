<?php

	ini_set('session.auto_start',0);
	ini_set('session.cookie_lifetime',0);
	session_start();
	
	
	require('DataProvider.php');
	if(isset($_POST['manhanvien']))
	{
		$maNV=$_POST['manhanvien'];
		
		//------------------------Sua trong database khachhang-----------------------------------------------//
		
		$sql="UPDATE nhanvien SET "
		.	"HoTen='".$_POST['hoten']."', "
		.	"Email='".$_POST['email']."', "
		.	"SĐT='".$_POST['sdt']."'  "
		.	"WHERE MaNhanVien='".$_POST['manhanvien']."'";
		DataProvider::executeQuery($sql);
		
		$_SESSION['login']=array(	'MaNhanVien' => $maNV,
									'TenDangNhap' => $_SESSION['login']['TenDangNhap'],
									'MaQuyen' => $_SESSION['login']['MaQuyen'],
									'HoTen' => $_POST['hoten'],
									'Email' => $_POST['email'],
									'SĐT' => $_POST['sdt']);

		
	}
		
	//------------------------Quay ve trang quanlysanpham.php-----------------------------------------------//
	
	$hostName=$_SERVER['HTTP_HOST'];
	$dirURL=rtrim(dirname($_SERVER['PHP_SELF']));
	$pageName="thongtincanhanAdmin.php";
	$url="http://".$hostName.$dirURL."/".$pageName;
	header("Location:$url");
	exit;
?>