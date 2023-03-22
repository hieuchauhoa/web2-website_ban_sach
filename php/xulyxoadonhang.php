<?php 
	require 'DataProvider.php';
	$xoahd="DELETE FROM `hoadon` WHERE MAHD='".$_GET['MaHD']."'";
	$xoacthd="DELETE FROM `hoadon` WHERE MAHD='".$_GET['MaHD']."'";
	echo $xoahd;
	echo $xoacthd;
	DataProvider::executeQuery($xoahd);
	DataProvider::executeQuery($xoacthd);
	header("Location:chitiethd.php");
 ?>