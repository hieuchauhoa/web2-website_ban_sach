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
				header("Location:../index.php");
		}
		else
		{
			header("Location:DangNhap.php?loidangnhap=1");
		}
		
		
	}
	else if(isset($_REQUEST['dangxuat']) && $_REQUEST['dangxuat']=="1")
	{
		$_SESSION['login']= NULL;
		if(isset($_REQUEST['loitrangthai']) && $_REQUEST['loitrangthai']=="1")
		{
			header("Location:DangNhap.php?loitrangthai=1");
			}
		else 
		header("Location:../index.php");
	}
	
	function login()
	{
		
		require('DataProvider.php');
		$tendangnhap=$_POST['username'];
		$matkhau=$_POST['pass'];
		//$matkhau=mysql_real_escape_string($matkhau); //dong lenh nay da bi remove tu phien ban php 5.5
		//ko the su dung pre_replace loc chuoi vi day la dang nhap

		$sql="select * from khachhang where TenDangNhap='{$tendangnhap}' AND MatKhau='{$matkhau}';";
		echo $sql;
		//$result=DataProvider::executeQuery($sql);//loi sqli tai dong lenh huy' or '1'='1
		$result=DataProvider::Get_InfoKH($tendangnhap,$matkhau);

		// if(mysqli_num_rows($result)==1)
		// {
		// 	$row=mysqli_fetch_array($result);
		// 	if($row['MatKhau']==$matkhau)
		// 	{
		// 		$_SESSION['login']=array('TenDangNhap' => $tendangnhap,
		// 								  'MaQuyen' => $row['MaQuyen'],
		// 								  'TrangThai' => $row['TrangThai'],
		// 								  'HoTen' => $row['HoTen'],
		// 								  'MaKH' => $row['MaKH'],
		// 								  'Email' => $row['Email'],
		// 								  'SĐT' => $row['SĐT'],
		// 									'DiaChi'=>'',
		// 									'htgh' => 1,
		// 									'httt' => 3);
										  
		// 		return true;
		// 	}
		// }
		if(!empty($row=mysqli_fetch_array($result))){
			$_SESSION['login']=array('TenDangNhap' => $tendangnhap,
										  'MaQuyen' => $row['MaQuyen'],
										  'TrangThai' => $row['TrangThai'],
										  'HoTen' => $row['HoTen'],
										  'MaKH' => $row['MaKH'],
										  'Email' => $row['Email'],
										  'SĐT' => $row['SĐT'],
											'DiaChi'=>'',
											'htgh' => 1,
											'httt' => 3);
										  
				return true;
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