<?php
	require("DataProvider.php");
	if(isset($_GET['cho']) && isset($_GET['ma']))
	{
		$masach=NgauNhienMaSach();
		while(KiemTraTrung($masach)==false)
		{
			$masach=NgauNhienMaSach();
		}
		echo $masach;
	}
	
	
	function NgauNhienMaSach()
	{
			
			$maso=rand(100,100000);
			$masach="";
			if($_GET['ma']=="NN")
				$masach= "NN".$maso;
			else if($_GET['ma']=="KT")
				$masach= "KT".$maso;
			else if($_GET['ma']=="KNS")
				$masach= "KNS".$maso;
			else if($_GET['ma']=="LS")
				$masach= "LS".$maso;
			else if($_GET['ma']=="CN")
				$masach= "CN".$maso;
			else if($_GET['ma']=="TN")
				$masach= "TN".$maso;
			else if($_GET['ma']=="TT")
				$masach= "TT".$maso;
			else if($_GET['ma']=="VH")
				$masach= "VH".$maso;
			
			return $masach;
	}
	function KiemTraTrung($masach)
	{
		$sql="select * from sach ";
		$result=DataProvider::executeQuery($sql);
		while($row=mysqli_fetch_array($result))
		{
			if($row['MaSach']==$masach)
				return false;
		}
		return true;
	}
?>