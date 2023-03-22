<?php 
	session_start();
	if(isset($_GET['httt'])){
		$_SESSION['login']['httt']=$_GET['httt'];
		echo $_SESSION['login']['httt'];
	}	
 ?>