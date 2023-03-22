<?php 
	ini_set('session.auto_start',0);
	ini_set('session.cookie_lifetime',0);
	session_start();
	require('common.php');
	if(isLogined()==false)
	{
			header("Location:DangNhap.php");
	}
	//đã đang nhập
	if(isLogined()==true)
		
		if($_SESSION['login']['MaQuyen'] == "1" || $_SESSION['login']['MaQuyen'] == "2" )
		{
				header("Location:admin.php");
		}
		else
		{
			require('DataProvider.php');
			if(isset($_GET['MaHD']) && isset($_GET['MaSach']) )
			{
				//cap nhat trang thai chi tiet hoa don
				$sql="UPDATE chitiethoadon SET TinhTrangCT='Đã hủy hàng' where chitiethoadon.MaHD='".$_GET['MaHD']."' and chitiethoadon.MaSach='".$_GET['MaSach']."'";
				DataProvider::executeQuery($sql);
				header("Location:ChiTietDonHang.php?MaHD=".$_GET['MaHD']."&MaKH=".$_SESSION['login']['MaKH']);
			}
		}
		
 ?>