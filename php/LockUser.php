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
		//kiểm tra có là admin hay không
		else if($_SESSION['login']['MaQuyen']=="2")
			header("Location:admin.php");
		else
		{
			require('DataProvider.php');
			if(isset($_GET['MaKH']) && isset($_GET['TrangThai']) ) 
			{
				//cap nhat trang thai 
				if($_GET['TrangThai']=='0')
				{
				$sql="UPDATE khachhang SET TrangThai='1' where MaKH='".$_GET['MaKH']."'";
				DataProvider::executeQuery($sql);
				}
				
				else if($_GET['TrangThai']=='1')
				{
				$sql="UPDATE khachhang SET TrangThai='0' where MaKH='".$_GET['MaKH']."'";
				DataProvider::executeQuery($sql);
				}
			}
		}
	}
	
	
?>