<?php
	require("DataProvider.php");
	if(isset($_GET['cho']) )
	{
		$makh=NgauNhienMaKH();
		while(KiemTraTrung($makh)==false)
		{
			$makh=NgauNhienMaKH();
		}
		echo $makh;
	}
	
	
	function NgauNhienMaKH()
	{
			$makh="";
			$maso=rand(100,1000);
			$makh="KH".$maso;
			
			
			return $makh;
	}
	function KiemTraTrung($makh)
	{
		$sql="select * from khachhang ";
		$result=DataProvider::executeQuery($sql);
		while($row=mysqli_fetch_array($result))
		{
			if($row['MaKH']==$makh)
				return false;
		}
		return true;
	}
?>