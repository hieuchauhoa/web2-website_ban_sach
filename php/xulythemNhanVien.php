<?php
	ini_set('session.auto_start',0);
	ini_set('session.cookie_lifetime',0);
	session_start();
	require('common.php');
	//kiểm tra đã đăng nhập chưa
	//chưa đn
	if(isLogined()==false)
	{
			header("Location:dangnhapAdmin.php");
	}
	//đã đang nhập
	else if(isLogined()==true)
	{
		// kiểm tra đây là khách hàng thì về trang chủ kh
		if($_SESSION['login']['MaQuyen'] != "1" && $_SESSION['login']['MaQuyen'] != "2" )
			header("Location:../index.php");
		//kiểm tra nếu là manager thì về trang admin.php,vì đây là trang của admin
		else if($_SESSION['login']['MaQuyen']=="2")
			header("Location:admin.php");
		else
		{
			require('DataProvider.php');
			if(isset($_GET['manv']))
			{
				if($_GET['loai']=="admin")
				{
					$sql="INSERT INTO nhanvien VALUES ( ";
					$sql=$sql."'".addslashes($_GET['manv'])."', ";
					$sql=$sql."'".addslashes($_GET['name'])."', ";
					$sql=$sql."'".addslashes($_GET['username'])."', ";
					$sql=$sql."'".addslashes($_GET['pass'])."', ";		
					$sql=$sql."'".addslashes($_GET['email'])."', ";
					$sql=$sql."'".addslashes($_GET['phone'])."', ";
					$sql=$sql."'0', ";
					$sql=$sql."'1') ";
					DataProvider::executeQuery($sql);	
				}
				else if($_GET['loai']=="manager")
				{
					$sql="INSERT INTO nhanvien VALUES ( ";
					$sql=$sql."'".addslashes($_GET['manv'])."', ";
					$sql=$sql."'".addslashes($_GET['name'])."', ";
					$sql=$sql."'".addslashes($_GET['username'])."', ";
					$sql=$sql."'".addslashes($_GET['pass'])."', ";		
					$sql=$sql."'".addslashes($_GET['email'])."', ";
					$sql=$sql."'".addslashes($_GET['phone'])."', ";
					$sql=$sql."'0', ";
					$sql=$sql."'2') ";
					DataProvider::executeQuery($sql);	
				}
				
			}
					
				header("Location:quanlynhanvien.php");
		}
		
	}
	
?>

