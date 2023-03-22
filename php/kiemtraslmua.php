<?php 
session_start();
$slNhap = $_GET['sl'];
$masach = $_GET['masach'];
if(empty($_SESSION['cart'][$masach]['sl'])){
	$slMua=0;
}
else{
	$slMua = $_SESSION['cart'][$masach]['sl'];
}
$slKT = $slMua + $slNhap;
echo $slKT;	
?>