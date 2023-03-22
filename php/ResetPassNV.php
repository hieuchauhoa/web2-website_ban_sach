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
			if(isset($_GET['MaNhanVien']) ) 
			{
				//dat lai mat khau mac dinh 
				
				$sql="UPDATE nhanvien SET MatKhau='123456' where MaNhanVien='".$_GET['MaNhanVien']."'";
				DataProvider::executeQuery($sql);
	
			}
		}
	}
	
	
?>