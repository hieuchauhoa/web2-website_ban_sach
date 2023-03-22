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
		//kiểm tra nếu là admin thì về trang admin.php, đây là trang của manager
		else if($_SESSION['login']['MaQuyen']=="1")
			header("Location:admin.php");
		else
		{
			require('DataProvider.php');
			if(isset($_GET['masach']))
			{
				//xoa hinh anh 
				$hinhanh="";
				$matheloai="";
				$sql="select * from sach where MaSach='".$_GET['masach']."' ";
				$result=DataProvider::executeQuery($sql);
				if(mysqli_num_rows($result)==1)
				{
					while($row=mysqli_fetch_array($result))
					{
						$matheloai=$row['MaTheLoai'];
						$hinhanh=$row['HinhAnh'];
					}
				}
				$imageURL="";
					if($matheloai=="NN")
						$imageURL="../images/ngoaingu/".$hinhanh;
					else if($matheloai=="KT")
						$imageURL="../images/kinhte/".$hinhanh;
					else if($matheloai=="KNS")
						$imageURL="../images/kynangsong/".$hinhanh;
					else if($matheloai=="LS")
						$imageURL="../images/lichsu/".$hinhanh;
					else if($matheloai=="CN")
						$imageURL="../images/chuyennganh/".$hinhanh;
					else if($matheloai=="TN")
						$imageURL="../images/thieunhi/".$hinhanh;
					else if($matheloai=="TT")
						$imageURL="../images/tuoiteen/".$hinhanh;
					else if($matheloai=="VH")
						$imageURL="../images/vanhoc/".$hinhanh;
				
				//xoa sach
				$sql="DELETE FROM sach WHERE MaSach='".$_GET['masach']."'";
				DataProvider::executeQuery($sql);
				$sql="DELETE FROM chitietsach WHERE MaSach='".$_GET['masach']."'";
				DataProvider::executeQuery($sql);
			}
			header("Location:quanlysanpham.php");
		}
	}
	
?>