<?php 
session_start();
require 'DataProvider.php';
if(isset($_GET['MaKH'])){
		//echo $row['MaHD'];
	$MaHD="HD".rand(1, 100000);
	$sql="SELECT MaHD FROM `hoadon` WHERE MaHD='".$MaHD."'";
	$result=DataProvider::executeQuery($sql);
	$row=mysqli_fetch_array($result);
	while (!empty($row['MaHD'])) {
		$MaHD="";
		$MaHD="HD".rand(1,100000);
		$sql="SELECT MaHD FROM `hoadon` WHERE MaHD='".$MaHD."'";
		$result=DataProvider::executeQuery($sql);
		$row=mysqli_fetch_array($result);
	}
	echo $_GET['MaKH'];
	echo $_GET['DiaChi'];
	echo $_GET['TongSoLuong'];
	echo $_GET['TinhTrang'];
	echo $_GET['htthanhtoan'];
	echo $_GET['htgiaohang'];
	echo $_GET['TongTien'];
	echo $_GET['htgiaohang'];
	$date = date("Y-m-d")." ".date("h:i:s");
	$insertHD="INSERT INTO `hoadon`(`MaHD`, `MaKH`, `NgayDatHang`, `DiaChi`, `HinhThucThanhToan`, `HinhThucGiaoHang`, `TongSoLuong`, `TongTien`, `TinhTrang`) VALUES ('".$MaHD."','".$_GET['MaKH']."','".$date."','".$_GET['DiaChi']."','".$_GET['htthanhtoan']."','".$_GET['htgiaohang']."','".$_GET['TongSoLuong']."','".$_GET['TongTien']."','".$_GET['TinhTrang']."')";
	DataProvider::executeQuery($insertHD);

	foreach ($_SESSION['cart'] as $key => $value) {
		$insertCTHD="INSERT INTO `chitiethoadon`(`MaHD`, `MaSach`, `SoLuong`, `TongTienCT`, `NgayGiaoHang`, `TinhTrangCT`) VALUES ('".$MaHD."','".$key."','".$_SESSION['cart'][$key]['sl']."','".$_SESSION['cart'][$key]['sl']*$_SESSION['cart'][$key]['gia']."','".$date."','Hàng đang nhập từ kho')";
		DataProvider::executeQuery($insertCTHD);
	}
	unset($_SESSION['cart']);
	header("Location:DonHang.php");
}
?>