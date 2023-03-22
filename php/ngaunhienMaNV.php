<?php
	require("DataProvider.php");
	if(isset($_GET['cho']) && isset($_GET['loai']))
	{
		$manv=NgauNhienMaNV();
		while(KiemTraTrung($manv)==false)
		{
			$manv=NgauNhienMaNV();
		}
		echo $manv;
	}
	
	
	function NgauNhienMaNV()
	{
			$manv="";
			$maso=rand(100,1000);
			if($_GET['loai']=="admin")
				$manv= "A".$maso;
			else if($_GET['loai']=="manager")
				$manv= "M".$maso;
			
			
			return $manv;
	}
	function KiemTraTrung($manv)
	{
		$sql="select * from nhanvien ";
		$result=DataProvider::executeQuery($sql);
		while($row=mysqli_fetch_array($result))
		{
			if($row['MaNhanVien']==$manv)
				return false;
		}
		return true;
	}
?>