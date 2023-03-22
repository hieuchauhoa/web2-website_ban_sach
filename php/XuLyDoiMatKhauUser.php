<?php
session_start();
require('common.php');
	if(isLogined()==true)
	{
		if($_SESSION['login']['MaQuyen'] == "1" || $_SESSION['login']['MaQuyen'] == "2" )
		{
				header("Location:admin.php");
		}
		else if(kiemtramatkhau()==false)
		{
				header("Location:doimatkhauUser.php?MaKH=".$_SESSION['login']['MaKH']."&loitrangthai=1");
		}
		else if(kiemtraxacnhanmatkhau()==false)
		{
			header("Location:doimatkhauUser.php?MaKH=".$_SESSION['login']['MaKH']."&loitrangthai=2");
		}
		else 
		{
					//------------------------Sua trong database khachhang-----------------------------------------------//
				
					$sql="UPDATE khachhang SET "	
					.	"MatKhau='".$_POST['mkmoi']."'  "
					.	"WHERE MaKH='".$_SESSION['login']['MaKH']."'";
					DataProvider::executeQuery($sql);
					
					$_SESSION['login']=array(	'TenDangNhap' => $_SESSION['login']['TenDangNhap'],
												'MaQuyen' => $_SESSION['login']['MaQuyen'],
												'TrangThai' => $_SESSION['login']['TrangThai'],
												'HoTen' => $_SESSION['login']['HoTen'],
												'MaKH' => $_SESSION['login']['MaKH'],
												'Email' => $_SESSION['login']['Email'],
												'SĐT' => $_SESSION['login']['SĐT'],
												'MatKhau' => $_POST['mkmoi']);
				
				header("Location:thongtincanhanUser.php");
				//echo "alert('Đổi mật khẩu thành công')";
		}
		
	}
	else if(isLogined()==false)
	{
			header("Location:DangNhap.php");
	}
	
	
	function kiemtramatkhau()
	{
		require('DataProvider.php');
		$matkhau=$_POST['mkcu'];
		$matkhaumoi=$_POST['mkmoi'];
		$xacnhanmk=$_POST['xacnhanmkmoi'];

		$sql="select * from khachhang where MaKH ='".$_SESSION['login']['MaKH']."'";
		$result=DataProvider::executeQuery($sql);
		if(mysqli_num_rows($result)==1)
		{
			$row=mysqli_fetch_array($result);
			if($_POST['mkcu']!=$matkhau)
			{						  
				return false;
			}		
		}
		return true;
	}
	function kiemtraxacnhanmatkhau()
	{
		//require('DataProvider.php');
		$matkhau=$_POST['mkcu'];
		$matkhaumoi=$_POST['mkmoi'];
		$xacnhanmk=$_POST['xacnhanmkmoi'];

		$sql="select * from khachhang where MaKH ='".$_SESSION['login']['MaKH']."'";
		$result=DataProvider::executeQuery($sql);
		if(mysqli_num_rows($result)==1)
		{
			$row=mysqli_fetch_array($result);
			if($_POST['mkcu']==$matkhau && $matkhaumoi!=$xacnhanmk)
			{
				return false;
			}
		}
		return true;
	}
	
?>