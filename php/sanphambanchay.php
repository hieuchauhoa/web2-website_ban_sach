<?php
	require("php/DataProvider.php");
	
	//san pham ban chay
	$sql="select *,sum(ct.SoLuong) as 'SL' from chitiethoadon ct,sach s where ct.MaSach=s.MaSach "; 
	$sql=$sql." group by ct.MaSach order by sum(ct.SoLuong) DESC LIMIT 5 ";
	$result=DataProvider::executeQuery($sql);
	echo '<div class="bar"> <div class="tieude">Sách bán chạy</div>	</div>';
	$s="<div style='padding-left:10px'>";
							while($row=mysqli_fetch_array($result))
							{
									$s=$s. "<div class='sach'>"
											."<a href='php/chitietsach.php?";
										if($row['MaTheLoai']=="NN")
										{
											$s=$s."theloai=ngoaingu&masach=" . $row['MaSach'] ."'>"
												 ."<img src='images/ngoaingu/" . $row['HinhAnh']  ."'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="KT")
										{
											$s=$s."theloai=kinhte&masach=" . $row['MaSach'] ."'>"
												."<img src='images/kinhte/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="KNS")
										{
											$s=$s."theloai=kynangsong&masach=" . $row['MaSach'] ."'>"
												."<img src='images/kynangsong/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="LS")
										{
											$s=$s."theloai=lichsu&masach=" . $row['MaSach'] ."'>"
												."<img src='images/lichsu/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="CN")
										{
											$s=$s."theloai=chuyennganh&masach=" . $row['MaSach'] ."'>"
												."<img src='images/chuyennganh/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="TN")
										{
											$s=$s."theloai=thieunhi&masach=" . $row['MaSach'] ."'>"
												."<img src='images/thieunhi/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="TT")
										{
											$s=$s."theloai=tuoiteen&masach=" . $row['MaSach'] ."'>"
												."<img src='images/tuoiteen/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="VH")
										{
											$s=$s."theloai=vanhoc&masach=" . $row['MaSach'] ."'>"
												."<img src='images/vanhoc/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
											
										$s=$s."</div>";
										
							}
							$s=$s."</div>";
							echo $s;
	
	
	/// san pham moi phat hanh
	
	$sql="select * from chitietsach cts,sach s where cts.MaSach=s.MaSach "; 
	$sql=$sql." order by NgayPhatHanh DESC LIMIT 5 ";
	$result=DataProvider::executeQuery($sql);
	echo '<div class="bar"> <div class="tieude">Sách mới</div>	</div>';
	$s="<div style='padding-left:10px'>";
							while($row=mysqli_fetch_array($result))
							{
									$s=$s. "<div class='sach'>"
											."<a href='php/chitietsach.php?";
										if($row['MaTheLoai']=="NN")
										{
											$s=$s."theloai=ngoaingu&masach=" . $row['MaSach'] ."'>"
												 ."<img src='images/ngoaingu/" . $row['HinhAnh']  ."'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="KT")
										{
											$s=$s."theloai=kinhte&masach=" . $row['MaSach'] ."'>"
												."<img src='images/kinhte/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="KNS")
										{
											$s=$s."theloai=kynangsong&masach=" . $row['MaSach'] ."'>"
												."<img src='images/kynangsong/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="LS")
										{
											$s=$s."theloai=lichsu&masach=" . $row['MaSach'] ."'>"
												."<img src='images/lichsu/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="CN")
										{
											$s=$s."theloai=chuyennganh&masach=" . $row['MaSach'] ."'>"
												."<img src='images/chuyennganh/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="TN")
										{
											$s=$s."theloai=thieunhi&masach=" . $row['MaSach'] ."'>"
												."<img src='images/thieunhi/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="TT")
										{
											$s=$s."theloai=tuoiteen&masach=" . $row['MaSach'] ."'>"
												."<img src='images/tuoiteen/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="VH")
										{
											$s=$s."theloai=vanhoc&masach=" . $row['MaSach'] ."'>"
												."<img src='images/vanhoc/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
											
										$s=$s."</div>";
										
							}
							$s=$s."</div>";
							echo $s;
?>