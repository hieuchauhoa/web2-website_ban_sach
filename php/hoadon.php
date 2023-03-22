<?php 
	/**
	 * 
	 */
	class Chitiet 
	{
		
		public static function ChitietHD($MaKH)
		{
			$s="";
			$sql="SELECT * FROM `hoadon` WHERE MAKH='".$MaKH."' ORDER BY `hoadon`.`NgayDatHang` ASC";
			$result=DataProvider::executeQuery($sql);
			while ($row=mysqli_fetch_array($result)) {
				if($row['HinhThucThanhToan']==1){
					$httt="Thẻ ngân hàng";
				}
				if($row['HinhThucThanhToan']==2){
					$httt="Thẻ...";
				}
				if($row['HinhThucThanhToan']==3){
					$httt="Thanh toán khi nhận hàng";
				}
				if($row['HinhThucGiaoHang']==1){
					$htgh="Giao hàng bình thường";
				}
				if($row['HinhThucGiaoHang']==2){
					$htgh="Giao hàng nhanh";
				}
				$x='<span class="glyphicon glyphicon-ok"></span>';
				if($row['TinhTrang']=="Chưa thanh toán xong"){
					$x='<button type="submit" class="btn btn-danger" id="'.$row['MaHD'].'" onclick="hd(`'.$row['MaHD'].'`)">Xoá</button>';
				}
				$s=$s.'<tr>
				<td>'.$x.'</td>
				<td><a href="chitiethd.php?MaHD='.$row['MaHD'].'&MaKH='.$row['MaKH'].'">
				<span class="glyphicon glyphicon-list-alt"></span>
				</a></td>
				<td>'.$row['MaHD'].'</td>
				<td>'.$row['NgayDatHang'].'</td>
				<td>'.$row['DiaChi'].'</td>
				<td>'.$httt.'</td>
				<td>'.$htgh.'</td>
				<td>'.$row['TongSoLuong'].'</td>
				<td>'.number_format($row['TongTien']).'đ</td>
				<td>'.$row['TinhTrang'].'</td> 
				</tr>'	;
			}
			return $s;
		}
		public static function KTKH($MaKH){
			require 'DataProvider.php';
			$sql="SELECT MAKH FROM `hoadon` WHERE MAKH='".$MaKH."'";
			$result=DataProvider::executeQuery($sql);
			$row=mysqli_fetch_array($result);
			if(empty($row)){
				return 0;
			}
			return 1;
		}
		public static function thongtinchitiet($MaHD){
			$s="";
			$sql="SELECT `MATHELOAI`,`TENSACH`,`HinhAnh`,`SoLuong`,`Gia`,`TongTienCT`,`chitiethoadon`.`MaSach` FROM `chitiethoadon`,`sach` WHERE `chitiethoadon`.`MaSach`=`sach`.`MaSach` AND MAHD='".$MaHD."'";
			$result=DataProvider::executeQuery($sql);
			while ($row=mysqli_fetch_array($result)) {
				if($row["MATHELOAI"]=="NN"){
					$s=$s.'<tr>
					<td><a href="chitietsach.php?theloai=ngoaingu&masach='.$row["MaSach"].'"><img class="biasach" src="../images/ngoaingu/'.$row["HinhAnh"].'" alt=""></a></td>
					<td>'.$row["TENSACH"].'</td>
					<td>'.number_format($row["Gia"]).'đ</td>
					<td>'.$row["SoLuong"].'</td>
					<td>'.number_format($row["TongTienCT"]).'đ</td>
					</tr>';	
				}
				if($row["MATHELOAI"]=="KT"){
					$s=$s.'<tr>
					<td><a href="chitietsach.php?theloai=kinhte&masach='.$row["MaSach"].'"><img class="biasach" src="../images/kinhte/'.$row["HinhAnh"].'" alt=""></a></td>
					<td>'.$row["TENSACH"].'</td>
					<td>'.number_format($row["Gia"]).'đ</td>
					<td>'.$row["SoLuong"].'</td>
					<td>'.number_format($row["TongTienCT"]).'đ</td>
					</tr>';	
				}
				if($row["MATHELOAI"]=="KNS"){
					$s=$s.'<tr>
					<td><a href="chitietsach.php?theloai=kynangsong&masach='.$row["MaSach"].'"><img class="biasach" src="../images/kynangsong/'.$row["HinhAnh"].'" alt=""></a></td>
					<td>'.$row["TENSACH"].'</td>
					<td>'.number_format($row["Gia"]).'đ</td>
					<td>'.$row["SoLuong"].'</td>
					<td>'.number_format($row["TongTienCT"]).'đ</td>
					</tr>';	
				}
				if($row["MATHELOAI"]=="LS"){
					$s=$s.'<tr>
					<td><a href="chitietsach.php?theloai=lichsu&masach='.$row["MaSach"].'"><img class="biasach" src="../images/lichsu/'.$row["HinhAnh"].'" alt=""></a></td>
					<td>'.$row["TENSACH"].'</td>
					<td>'.number_format($row["Gia"]).'đ</td>
					<td>'.$row["SoLuong"].'</td>
					<td>'.number_format($row["TongTienCT"]).'đ</td>
					</tr>';	
				}
				if($row["MATHELOAI"]=="CN"){
					$s=$s.'<tr>
					<td><a href="chitietsach.php?theloai=chuyennganh&masach='.$row["MaSach"].'"><img class="biasach" src="../images/chuyennganh/'.$row["HinhAnh"].'" alt=""></a></td>
					<td>'.$row["TENSACH"].'</td>
					<td>'.number_format($row["Gia"]).'đ</td>
					<td>'.$row["SoLuong"].'</td>
					<td>'.number_format($row["TongTienCT"]).'đ</td>
					</tr>';	
				}
				if($row["MATHELOAI"]=="TN"){
					$s=$s.'<tr>
					<td><a href="chitietsach.php?theloai=thieunhi&masach='.$row["MaSach"].'"><img class="biasach" src="../images/thieunhi/'.$row["HinhAnh"].'" alt=""></a></td>
					<td>'.$row["TENSACH"].'</td>
					<td>'.number_format($row["Gia"]).'đ</td>
					<td>'.$row["SoLuong"].'</td>
					<td>'.number_format($row["TongTienCT"]).'đ</td>
					</tr>';	
				}
				if($row["MATHELOAI"]=="TT"){
					$s=$s.'<tr>
					<td><a href="chitietsach.php?theloai=tuoiteen&masach='.$row["MaSach"].'"><img class="biasach" src="../images/tuoiteen/'.$row["HinhAnh"].'" alt=""></a></td>
					<td>'.$row["TENSACH"].'</td>
					<td>'.number_format($row["Gia"]).'đ</td>
					<td>'.$row["SoLuong"].'</td>
					<td>'.number_format($row["TongTienCT"]).'đ</td>
					</tr>';	
				}
				if($row["MATHELOAI"]=="VH"){
					$s=$s.'<tr>
					<td><a href="chitietsach.php?theloai=vanhoc&masach='.$row["MaSach"].'"><img class="biasach" src="../images/vanhoc/'.$row["HinhAnh"].'" alt=""></a></td>
					<td>'.$row["TENSACH"].'</td>
					<td>'.number_format($row["Gia"]).'đ</td>
					<td>'.$row["SoLuong"].'</td>
					<td>'.number_format($row["TongTienCT"]).'đ</td>
					</tr>';	
				}
			}
			return $s;

		}
		public static function KTHD($MaHD,$MaKH){
			$sql="SELECT MAHD FROM `hoadon` WHERE MAKH='".$MaKH."' and MAHD='".$MaHD."'";
			$result=DataProvider::executeQuery($sql);
			$row=mysqli_fetch_array($result);
			if(!empty($row)){
				return 1;
			}
			return 0;
		}
	}
	?>