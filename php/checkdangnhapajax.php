<?php 
session_start();
require('common.php');
if(isLogined()==true){
	if($_SESSION['login']['MaQuyen'] == "1" || $_SESSION['login']['MaQuyen'] == "2" )
	{
		header("Location:admin.php");
	}
	echo "true";
}
else{
	echo "false";
}
?>