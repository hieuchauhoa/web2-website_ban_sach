<?php
	session_start();
	
	if(isset($_REQUEST['dangnhap']) && $_REQUEST['dangnhap']=="1")
	{
		if(login()==true)
		{
			if(kiemtratrangthai()==false)
			{
				header("Location:xulydangnhapUser.php?dangxuat=1&loitrangthai=1");
			}
			else
				header("Location:./thanhtoan.php");
		}
		else
		{
			header("Location:giohang.php?loidangnhap=1");
		}
		
		
	}
	else if(isset($_REQUEST['dangxuat']) && $_REQUEST['dangxuat']=="1")
	{
		$_SESSION['login']= NULL;
		if(isset($_REQUEST['loitrangthai']) && $_REQUEST['loitrangthai']=="1")
		{
			header("Location:giohang.php.php?loitrangthai=1");
		}
		else 
		header("Location:./thanhtoan.php");
	}
	
	function login()
	{
		
		require('DataProvider.php');
		$tendangnhap=.addslashes($_POST['username']);
		$matkhau=.addslashes($_POST['pass']);
		
		$sql="select * from khachhang where TenDangNhap='".$tendangnhap."'";
		$result=DataProvider::executeQuery($sql);
		if(mysqli_num_rows($result)==1)
		{
			$row=mysqli_fetch_array($result);
			if($row['MatKhau']==$matkhau)
			{
				$_SESSION['login']=array('TenDangNhap' => $tendangnhap,
										  'MaQuyen' => $row['MaQuyen'],
										  'TrangThai' => $row['TrangThai'],
										  'HoTen' => $row['HoTen'],
										  'MaKH' => $row['MaKH'],
										  'Email' => $row['Email'],
										  'SĐT' => $row['SĐT'],
											'DiaChi'=>'',
											'Phivanchuyen' => 25000);
										  
				return true;
			}
		}
		return false;
			
	}
	
	function kiemtratrangthai()
	{
		//require('DataProvider.php');
		$tendangnhap=$_POST['username'];
		$sql="select * from khachhang where TenDangNhap='".$tendangnhap."'";
		$result=DataProvider::executeQuery($sql);
		if(mysqli_num_rows($result)==1)
		{
			$row=mysqli_fetch_array($result);
			if($row['TrangThai']=='1')
			{						  
				return false;
			}
		}
		return true;
	}
?>