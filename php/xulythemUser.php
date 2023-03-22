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
			if(isset($_POST['makh']))
			{
				$sql="INSERT INTO khachhang VALUES ( ";
				$sql=$sql."'".addslashes($_POST['makh'])."', ";
				$sql=$sql."'".addslashes($_POST['name'])."', ";
				$sql=$sql."'".addslashes($_POST['username'])."', ";
				$sql=$sql."'".addslashes($_POST['pass'])."', ";		
				$sql=$sql."'".addslashes($_POST['email'])."', ";
				$sql=$sql."'".addslashes($_POST['phone'])."', ";
				$sql=$sql."'0', ";
				$sql=$sql."'0') ";
				DataProvider::executeQuery($sql);	
			}
					
				header("Location:quanlykhachhang.php");
		}
		
	}
	
?>

