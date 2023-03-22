<?php

class UserBill 
{
	public static function showUserBill()
	{
		//require('DataProvider.php');
		if(isset($_GET['tinhtrang']))
			$tt=$_GET['tinhtrang'];
		else $tt="";
					if( $tt=="")
					{		//  Đếm số lượng hóa đơn 
							$sql="select COUNT(*) as numRows from hoadon where MaKH='".$_SESSION['login']['MaKH']."'";
							$result=DataProvider::executeQuery($sql);
							$row=mysqli_fetch_array($result);
							$numRows=$row['numRows'];
							
							//  Xác định số hóa đơn tối đa hiện lên trong 1 trang
							$rowsPerPage=10;
							
							//  Lấy số trang hiện hành
							$pageNum=1;
							if(isset($_GET['page']))
							{
								$pageNum=$_GET['page'];
							}
							
							//  Lấy sản phẩm trong 1 trang
							$offset=($pageNum-1)*$rowsPerPage;
							$sql="select * from hoadon hd, khachhang kh  where hd.MaKH=kh.MaKH and kh.MaKH='".$_SESSION['login']['MaKH']."' order by NgayDatHang DESC LIMIT ".$offset.",".$rowsPerPage;
							
							//  Tính tổng số trang sẽ hiện thị
							$maxPage=ceil($numRows/$rowsPerPage);
							
							//  Lấy link của trang
							$sefl="DonHang.php?tinhtrang=&page=";
							$nav="";
							
							for($page=1;$page<=$maxPage;$page++)
							{
								if($maxPage>=10 && $page>=$pageNum-2 && $page<=$pageNum+2)
								{
									if($page==$pageNum-2 && $page>1)
										$nav=$nav."<li><span>...</span></li>";
									if($page==$pageNum)
										$nav=$nav."<li class='active'><span>". $page."</span></li>";
									else
										$nav=$nav."<li><a href='".$sefl.$page."'>". $page."</a></li>";
									if($page==$pageNum+2 && $page<$maxPage)
										$nav=$nav."<li><span>...</span></li>";
								}
								else if($maxPage<10)
								{
									if($page==$pageNum)
										$nav=$nav."<li class='active'><span>". $page."</span></li>";
									else
										$nav=$nav."<li><a href='".$sefl.$page."'>". $page."</a></li>";
								}
							}
							
							if($pageNum>1)
							{
								$page=$pageNum-1;
								$prev="<li><a href='".$sefl.$page."'><i class='fa fa-angle-left fa-fw'></i></a></li>";
								$first="<li><a href='".$sefl."1'><i class='fa fa-angle-double-left fa-fw'></i></a></li>";
							}
							else
							{
								$prev="";
								$first="";
							}

							if($pageNum<$maxPage)
							{
								$page=$pageNum+1;
								$next="<li><a href='".$sefl.$page."'><i class='fa fa-angle-right fa-fw'></i></a></li>";
								$last="<li><a href='".$sefl.$maxPage."'><i class='fa fa-angle-double-right fa-fw'></i></a></li>";
							}
							else
							{
								$next="";
								$last="";
							}		
							
							//  Hiện sản phẩm
							$result=DataProvider::executeQuery($sql);
							$i=1;
							
							$s="<div class='table-responsive' id='gg'>
										<table class='table table-striped table-bordered table-hover'>
											<thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã hóa đơn</th>
                                                    <th>Mã khách hàng</th>
                                                    <th>Tên khách hàng</th>
                                                    <th>Ngày đặt hàng</th>
													<th>Số lượng</th>
													<th>Tổng tiền</th>
													<th>Tình trạng</th>
													<th>Xem chi tiết HD</th>
                                                </tr>
											</thead>
											<tbody>";
							while($row=mysqli_fetch_array($result))
							{
								$s=$s. "<tr>"
										."<td>".$i."</td>"
										."<td>".$row['MaHD']."</td>"
										."<td>".$row['MaKH']."</td>"
										."<td>".$row['HoTen']."</td>"
										."<td>".$row['NgayDatHang']."</td>"
										."<td>".$row['TongSoLuong']."</td>"
										."<td>".$row['TongTien']."</td>"
										."<td>".$row['TinhTrang']."</td>"
										."<td><a href='ChiTietDonHang.php?MaHD=".$row['MaHD']."&MaKH=".$row['MaKH']."'><i class='fa fa-table fa-fw'></i> Xem</a></td>"
										."</tr>";
								$i++;
							}
							
							$s=$s.			"</tbody>"
										."</table>"
									."</div>";
												
							
							echo $s;
							//  In phân trang
							echo "<center>
											<div id='phantrang' style='clear:both'>
												<ul class='pagination'>".$first.$prev.$nav.$next.$last."</ul>
											</div>
								</center>";
									
					}
					//---------------------------------------------------------------------------------------------------//
					
					
	}
	//---------------------------------------------------------------------------------------------------//
	
	public static function showDetailUserBill()
	{
		//require('DataProvider.php');
		
					if(isset($_GET['MaHD']) && isset($_GET['MaKH']))
					{		//  Đếm số lượng hóa đơn 
							$sql="select COUNT(*) as numRows from chitiethoadon where MaHD='".$_SESSION['login']['MaKH']."'";
							$result=DataProvider::executeQuery($sql);
							$row=mysqli_fetch_array($result);
							$numRows=$row['numRows'];
							
							//  Xác định số hóa đơn tối đa hiện lên trong 1 trang
							$rowsPerPage=10;
							
							//  Lấy số trang hiện hành
							$pageNum=1;
							if(isset($_GET['page']))
							{
								$pageNum=$_GET['page'];
							}
							
							//  Lấy sản phẩm trong 1 trang
							$offset=($pageNum-1)*$rowsPerPage;
							$sql="select * from hoadon hd, khachhang kh,chitiethoadon ct,sach s where hd.MaKH=kh.MaKH and hd.MaHD=ct.MaHD and ct.MaSach=s.MaSach and ct.MaHD='".$_GET['MaHD']."' LIMIT ".$offset.",".$rowsPerPage;
							
							//  Tính tổng số trang sẽ hiện thị
							$maxPage=ceil($numRows/$rowsPerPage);
							
							//  Lấy link của trang
							$sefl="ChiTietDonHang.php?MaHD=".$_GET['MaHD']."&MaKH=".$_GET['MaHD']."&page=";
							$nav="";
							
							for($page=1;$page<=$maxPage;$page++)
							{
								if($maxPage>=10 && $page>=$pageNum-2 && $page<=$pageNum+2)
								{
									if($page==$pageNum-2 && $page>1)
										$nav=$nav."<li><span>...</span></li>";
									if($page==$pageNum)
										$nav=$nav."<li class='active'><span>". $page."</span></li>";
									else
										$nav=$nav."<li><a href='".$sefl.$page."'>". $page."</a></li>";
									if($page==$pageNum+2 && $page<$maxPage)
										$nav=$nav."<li><span>...</span></li>";
								}
								else if($maxPage<10)
								{
									if($page==$pageNum)
										$nav=$nav."<li class='active'><span>". $page."</span></li>";
									else
										$nav=$nav."<li><a href='".$sefl.$page."'>". $page."</a></li>";
								}
							}
							
							if($pageNum>1)
							{
								$page=$pageNum-1;
								$prev="<li><a href='".$sefl.$page."'><i class='fa fa-angle-left fa-fw'></i></a></li>";
								$first="<li><a href='".$sefl."1'><i class='fa fa-angle-double-left fa-fw'></i></a></li>";
							}
							else
							{
								$prev="";
								$first="";
							}

							if($pageNum<$maxPage)
							{
								$page=$pageNum+1;
								$next="<li><a href='".$sefl.$page."'><i class='fa fa-angle-right fa-fw'></i></a></li>";
								$last="<li><a href='".$sefl.$maxPage."'><i class='fa fa-angle-double-right fa-fw'></i></a></li>";
							}
							else
							{
								$next="";
								$last="";
							}		
							
							//  Hiện sản phẩm
							$result=DataProvider::executeQuery($sql);
							$i=1;
							
							$s="<div class='table-responsive' id='gg'>
										<table class='table table-striped table-bordered table-hover'>
											<thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã_HĐ</th>
                                                    <th>Mã_sách</th>
                                                    <th>Tên_sách</th>
                                                    <th>Ngày_giao_hàng</th>
													<th>Số_lượng</th>
													<th>Tổng_tiền</th>
													<th>Tình_trạng</th>													
													<th>Hủy</th>
                                                </tr>
											</thead>
											<tbody>";
							while($row=mysqli_fetch_array($result))
							{
								$s=$s. "<tr>"
										."<td>".$i."</td>"
										."<td>".$row['MaHD']."</td>"
										."<td>".$row['MaSach']."</td>"
										."<td>".$row['TenSach']."</td>"
										."<td>".$row['NgayGiaoHang']."</td>"
										."<td>".$row['SoLuong']."</td>"
										."<td>".$row['TongTienCT']."</td>";
										if($row['TinhTrangCT']=="Hàng đang nhập từ kho") $s=$s."<td>Hàng đang nhập từ kho</td>";
										else  if($row['TinhTrangCT']=="Đã giao hàng") $s=$s."<td>Đã giao hàng</td>";
										else  if($row['TinhTrangCT']=="Đang giao hàng") $s=$s."<td>Đang giao hàng</td>";
										else if($row['TinhTrangCT']=="Đã hủy hàng") $s=$s."<td>Đã hủy hàng</td>";
										
										if($row['TinhTrangCT']=="Hàng đang nhập từ kho")
											$s=$s."<td><font style='color:#337ab7;cursor:pointer' onclick='huychitiethoadon(\"".$row['MaHD']."\",\"".$row['MaSach']."\")'><i class='fa fa-trash fa-fw'></i> Hủy</font></td>";
										else
											$s=$s."<td> </td>";
										$s=$s."</tr>";
								$i++;
							}
							
							$s=$s.			"</tbody>"
										."</table>"
									."</div>";
												
							
							echo $s;
							//  In phân trang
							echo "<center>
											<div id='phantrang' style='clear:both'>
												<ul class='pagination'>".$first.$prev.$nav.$next.$last."</ul>
											</div>
								</center>";
									
					}		
	}//--------	------------------------------------------------------------------------------------------//
}		
?>