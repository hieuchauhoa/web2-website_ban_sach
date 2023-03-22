<?php 
	/**
	 * 
	 */
	class diachi 
	{
		public function showdiachi($makh){
			require 'DataProvider.php';
			$sql="SELECT Diachi
			      FROM hoadon
			      where MAKH='".$makh."'";
			$result=DataProvider::executeQuery($sql);
			$diachi  = array();
			foreach ($result as $key => $value) {
				array_push($diachi, $value);
			}
			if(!empty($diachi)){
				$dc = implode(($diachi[count($diachi)-1]));//Lấy String trong mảng
				return $dc;
			}
		}
	}
 ?>	