<?php
class QuanLyUser
{
	public static function QuanLyKhachHang()
	{
		require('DataProvider.php');
		
		
							
							//  Hiện sản phẩm
							if(isset($_GET['makhachhang']))
								$MaKhachHang=addslashes($_GET['makhachhang']);
							else $MaKhachHang="";
								
								if(isset($_GET['timkiemtheothongtin']))
									$loai=addslashes($_GET['timkiemtheothongtin']);
								else $loai="";
								if(isset($_GET['timkiem']))
									$chuoitimkiem=addslashes($_GET['timkiem']);
								else $chuoitimkiem="";
		

								if($loai=="" || $chuoitimkiem=="")


								{		
								
									$sql="select COUNT(*) as numRows from khachhang";
									$result=DataProvider::executeQuery($sql);
									$row=mysqli_fetch_array($result);
									$numRows=$row['numRows'];
									
									//  Xác định số sản phẩm tối đa hiện lên trong 1 trang
									$rowsPerPage=10;
									
									//  Lấy số trang hiện hành
									$pageNum=1;
									if(isset($_GET['page']))
									{
										$pageNum=$_GET['page'];
									}
									
									//  Lấy sản phẩm trong 1 trang
									$offset=($pageNum-1)*$rowsPerPage;
									$sql="select * from khachhang LIMIT " .$offset.",".$rowsPerPage;
									
									//  Tính tổng số trang sẽ hiện thị
									$maxPage=ceil($numRows/$rowsPerPage);
									
									//  Lấy link của trang
									$sefl="quanlykhachhang.php?timkiemtheothongtin=&timkiem=&page=";
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
							
									//Hiện bảng 
									$result=DataProvider::executeQuery($sql);
									$i=1;
									
									$s="<div class='table-responsive' id='gg'>
												<table class='table table-striped table-bordered table-hover'>
													<thead>
														<tr>
															<th>STT</th>
															<th>Mã_khách_hàng</th>
															<th>Họ_Tên</th>										
															<th>Tên_đăng_nhập</th>
															<th>Mật_khẩu</th>
															<th>Email</th>
															<th>SĐT</th>
															<th>Trạng_thái</th>
															<th>Đặt_lại</th>								
															<th>Khóa</th>
														</tr>
														<tbody>
															<div id='data-product'>";
									
									while($row=mysqli_fetch_array($result))
									{
										$s=$s. "<tr>"
												."<td>".$i."</td>"
												."<td>".$row['MaKH']."</td>"
												."<td>".$row['HoTen']."</td>"
												."<td>".$row['TenDangNhap']."</td>"
												."<td>".crypt($row['MatKhau'],100)."</td>"
												."<td>".$row['Email']."</td>"
												."<td>".$row['SĐT']."</td>";
												if($row['TrangThai']=="0")	
													$s=$s."<td><i class='fa fa-check' id='".$row['MaKH']."'></i></td>";
												if($row['TrangThai']=="1")
													$s=$s."<td><i class='fa fa-close' id='".$row['MaKH']."'></i></td>";	
												
												
												
												$s=$s
												. "<td><font style='color:#337ab7;cursor:pointer' onclick='datlaipass(\"MaKH=".$row['MaKH']."\")' data-id=><i class='fa fa-pencil fa-fw'></i> Đặt lại</a></td>";
												if($row['TrangThai']=="0")
												$s=$s."<td><font style='color:#337ab7;cursor:pointer' onclick='khoauser(\"MaKH=".$row['MaKH']."&TrangThai=".$row['TrangThai']."\")' data-id=><i class='fa fa-lock fa-fw'></i> Khóa</font></td>";
												if($row['TrangThai']=="1")
												$s=$s."<td><font style='color:#337ab7;cursor:pointer' onclick='mokhoauser(\"MaKH=".$row['MaKH']."&TrangThai=".$row['TrangThai']."\")' data-id=><i class='fa fa-unlock fa-fw'></i>Mở khóa</font></td>";
											$s=$s."</tr>";
										$i++;
									}
									
									$s=$s					."</div>"
														."</tbody>"
													."</thead>"
												."</table>"
											."</div>";
									
									echo $s;
								
									//  In phân trang
									echo "<center>
													<div id='phantrang' style='clear:both'>
														<ul class='pagination'>".$first.$prev.$nav.$next.$last."</ul>
													</div>
										</center>";
									// Kiểm tra trạng thái 
									
								}
								
								else
								{
								$sql="select COUNT(*) as numRows from khachhang where";
							
								if($loai!="" && $chuoitimkiem!="")
								{
									if($loai=="MaKH")
										$sql=$sql."	MaKH LIKE '%".$chuoitimkiem."%'";
									if($loai=="HoTen")
										$sql=$sql."  HoTen LIKE '%".$chuoitimkiem."%'";
									if($loai=="Email")
										$sql=$sql."  Email LIKE '%".$chuoitimkiem."%'";
								}

										

								
							$result=DataProvider::executeQuery($sql);
							$row=mysqli_fetch_array($result);
							$numRows=$row['numRows'];
							
							//  Xác định số sản phẩm tối đa hiện lên trong 1 trang
							$rowsPerPage=10;
							
							//  Lấy số trang hiện hành
							$pageNum=1;
							if(isset($_GET['page']))
							{
								$pageNum=$_GET['page'];
							}
							//  Lấy sản phẩm trong 1 trang
							$offset=($pageNum-1)*$rowsPerPage;
							$sql="select * from khachhang where ";
							
							if($loai!="" && $chuoitimkiem!="")
							{
								if($loai=="MaKH")
									$sql=$sql." MaKH LIKE '%".$chuoitimkiem."%'";
								if($loai=="HoTen")
									$sql=$sql." HoTen LIKE '%".$chuoitimkiem."%'";
								if($loai=="Email")
									$sql=$sql." Email LIKE '%".$chuoitimkiem."%'";
							}
							$sql=$sql. " LIMIT ".$offset.",".$rowsPerPage;
							
							//  Tính tổng số trang sẽ hiện thị
							$maxPage=ceil($numRows/$rowsPerPage);
							
							//  Lấy link của trang
							$sefl="quanlykhachhang.php?timkiemtheothongtin=".$loai."&timkiem=".$chuoitimkiem."&page=";
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
								//Hiện bảng 
									$result=DataProvider::executeQuery($sql);
									$i=1;
									
									$s="<div class='table-responsive' id='gg'>
												<table class='table table-striped table-bordered table-hover'>
													<thead>
														<tr>
															<th>STT</th>
															<th>Mã_khách_hàng</th>
															<th>Họ_Tên</th>										
															<th>Tên_đăng_nhập</th>
															<th>Mật_khẩu</th>
															<th>Email</th>	
															<th>SĐT</th>
															<th>Trạng_thái</th>
															<th>Xem_đơn_hàng</th>
															<th>Đặt_lại</th>								
															<th>Khóa</th>
														</tr>
														<tbody>
															<div id='data-product'>";
									
									while($row=mysqli_fetch_array($result))
									{
										$s=$s. "<tr>"
												."<td>".$i."</td>"
												."<td>".$row['MaKH']."</td>"
												."<td>".$row['HoTen']."</td>"
												."<td>".$row['TenDangNhap']."</td>"
												."<td>".crypt($row['MatKhau'],100)."</td>"
												."<td>".$row['Email']."</td>"
												."<td>".$row['SĐT']."</td>";
												if($row['TrangThai']=="0")	
													$s=$s."<td><i class='fa fa-check ' id='".$row['MaKH']."'></i></td>";
												if($row['TrangThai']=="1")
													$s=$s."<td><i class='fa fa-close' id='".$row['MaKH']."'></i></td>";	
												
												
												$s=$s
												. "<td><font style='color:#337ab7;cursor:pointer' onclick='datlaipass(\"MaKH=".$row['MaKH']."\")' data-id=><i class='fa fa-pencil fa-fw'></i> Đặt lại</a></td>";
												if($row['TrangThai']=="0")
													$s=$s."<td><font style='color:#337ab7;cursor:pointer' onclick='khoauser(\"MaKH=".$row['MaKH']."&TrangThai=".$row['TrangThai']."\")' data-id=><i class='fa fa-lock fa-fw'></i> Khóa</font></td>";
												if($row['TrangThai']=="1")
													$s=$s."<td><font style='color:#337ab7;cursor:pointer' onclick='mokhoauser(\"MaKH=".$row['MaKH']."&TrangThai=".$row['TrangThai']."\")' data-id=><i class='fa fa-unlock fa-fw'></i>Mở khóa</font></td>";
											$s=$s."</tr>";
										$i++;
									}
									
									$s=$s					."</div>"
														."</tbody>"
													."</thead>"
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
						}
	public static function QuanLyNhanVien()
	{
		require('DataProvider.php');
		
		
							
							//  Hiện sản phẩm
							if(isset($_GET['manhanvien']))
								$MaNhanVien=addslashes($_GET['manhanvien']);
							else $MaNhanVien="";
								
								if(isset($_GET['timkiemtheothongtin']))
									$loai=addslashes($_GET['timkiemtheothongtin']);
								else $loai="";
								if(isset($_GET['timkiem']))
									$chuoitimkiem=addslashes($_GET['timkiem']);
								else $chuoitimkiem="";
		

								if($loai=="" || $chuoitimkiem=="")


								{		
								
									$sql="select COUNT(*) as numRows from nhanvien";
									$result=DataProvider::executeQuery($sql);
									$row=mysqli_fetch_array($result);
									$numRows=$row['numRows'];
									
									//  Xác định số sản phẩm tối đa hiện lên trong 1 trang
									$rowsPerPage=10;
									
									//  Lấy số trang hiện hành
									$pageNum=1;
									if(isset($_GET['page']))
									{
										$pageNum=$_GET['page'];
									}
									
									//  Lấy sản phẩm trong 1 trang
									$offset=($pageNum-1)*$rowsPerPage;
									$sql="select * from nhanvien LIMIT " .$offset.",".$rowsPerPage;
									
									//  Tính tổng số trang sẽ hiện thị
									$maxPage=ceil($numRows/$rowsPerPage);
									
									//  Lấy link của trang
									$sefl="quanlynhanvien.php?timkiemtheothongtin=&timkiem=&page=";
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
							
									//Hiện bảng 
									$result=DataProvider::executeQuery($sql);
									$i=1;
									
									$s="<div class='table-responsive' id='gg'>
												<table class='table table-striped table-bordered table-hover'>
													<thead>
														<tr>
															<th>STT</th>
															<th>Mã_nhân_viên</th>
															<th>Họ_Tên</th>										
															<th>Tên_đăng_nhập</th>
															<th>Mật_khẩu</th>
															<th>Email</th>
															<th>SĐT</th>
															<th>Trạng_thái</th>
															<th>Mã_Quyền</th>
															<th>Đặt_lại</th>								
															<th>Khóa</th>
														</tr>
														<tbody>
															<div id='data-product'>";
									
									while($row=mysqli_fetch_array($result))
									{
										$s=$s. "<tr>"
												."<td>".$i."</td>"
												."<td>".$row['MaNhanVien']."</td>"
												."<td>".$row['HoTen']."</td>"
												."<td>".$row['TenDangNhap']."</td>"
												."<td>".crypt($row['MatKhau'],100)."</td>"
												."<td>".$row['Email']."</td>"
												."<td>".$row['SĐT']."</td>";
												if($row['TrangThai']=="0")	
													$s=$s."<td><i class='fa fa-check '></i></td>";
												if($row['TrangThai']=="1")
													$s=$s."<td><i class='fa fa-close' id='".$row['MaNhanVien']."'></i></td>";	
												$s=$s."<td>".$row['MaQuyen']."</td>";
												
												
												$s=$s. "<td><font style='color:#337ab7;cursor:pointer' onclick='datlaipassnhanvien(\"MaNhanVien=".$row['MaNhanVien']."\")' data-id=><i class='fa fa-pencil fa-fw'></i> Đặt lại</a></td>";
												if($row['TrangThai']=="0")	
													$s=$s."<td><font style='color:#337ab7;cursor:pointer' onclick='khoanhanvien(\"MaNhanVien=".$row['MaNhanVien']."&TrangThai=".$row['TrangThai']."\")' data-id=><i class='fa fa-lock fa-fw'></i> Khóa</font></td>";
												if($row['TrangThai']=="1")
													$s=$s."<td><font style='color:#337ab7;cursor:pointer' onclick='mokhoanhanvien(\"MaNhanVien=".$row['MaNhanVien']."&TrangThai=".$row['TrangThai']."\")' data-id=><i class='fa fa-unlock fa-fw'></i>Mở khóa</font></td>";
											$s=$s."</tr>";
										$i++;
									}
									
									$s=$s					."</div>"
														."</tbody>"
													."</thead>"
												."</table>"
											."</div>";
									
									echo $s;
								
									//  In phân trang
									echo "<center>
													<div id='phantrang' style='clear:both'>
														<ul class='pagination'>".$first.$prev.$nav.$next.$last."</ul>
													</div>
										</center>";
									// Kiểm tra trạng thái 
									
								}
								
								else
								{
								$sql="select COUNT(*) as numRows from nhanvien where";
							
								if($loai!="" && $chuoitimkiem!="")
								{
									if($loai=="MaNhanVien")
										$sql=$sql."	MaNhanVien LIKE '%".$chuoitimkiem."%'";
									if($loai=="HoTen")
										$sql=$sql."  HoTen LIKE '%".$chuoitimkiem."%'";
									if($loai=="Email")
										$sql=$sql."  Email LIKE '%".$chuoitimkiem."%'";
									if($loai=="MaQuyen")
										$sql=$sql."MaQuyen ='".$chuoitimkiem."'";
								}

										

								
							$result=DataProvider::executeQuery($sql);
							$row=mysqli_fetch_array($result);
							$numRows=$row['numRows'];
							
							//  Xác định số sản phẩm tối đa hiện lên trong 1 trang
							$rowsPerPage=10;
							
							//  Lấy số trang hiện hành
							$pageNum=1;
							if(isset($_GET['page']))
							{
								$pageNum=$_GET['page'];
							}
							//  Lấy sản phẩm trong 1 trang
							$offset=($pageNum-1)*$rowsPerPage;
							$sql="select * from nhanvien where ";
							
							if($loai!="" && $chuoitimkiem!="")
							{
								if($loai=="MaNhanVien")
									$sql=$sql." MaNhanVien LIKE '%".$chuoitimkiem."%'";
								if($loai=="HoTen")
									$sql=$sql." HoTen LIKE '%".$chuoitimkiem."%'";
								if($loai=="Email")
									$sql=$sql." Email LIKE '%".$chuoitimkiem."%'";
								if($loai=="MaQuyen")
									$sql=$sql."MaQuyen ='".$chuoitimkiem."'";
							}
							$sql=$sql. " LIMIT ".$offset.",".$rowsPerPage;
							
							//  Tính tổng số trang sẽ hiện thị
							$maxPage=ceil($numRows/$rowsPerPage);
							
							//  Lấy link của trang
							$sefl="quanlynhanvien.php?timkiemtheothongtin=".$loai."&timkiem=".$chuoitimkiem."&page=";
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
								//Hiện bảng 
									$result=DataProvider::executeQuery($sql);
									$i=1;
									
									$s="<div class='table-responsive' id='gg'>
												<table class='table table-striped table-bordered table-hover'>
													<thead>
														<tr>
															<th>STT</th>
															<th>Mã_khách_hàng</th>
															<th>Họ_Tên</th>										
															<th>Tên_đăng_nhập</th>
															<th>Mật_khẩu</th>
															<th>Email</th>	
															<th>SĐT</th>
															<th>Trạng_thái</th>	
															<th>Mã_Quyền</th>
															<th>Đặt_lại</th>								
															<th>Khóa</th>
														</tr>
														<tbody>
															<div id='data-product'>";
									
									while($row=mysqli_fetch_array($result))
									{
										$s=$s. "<tr>"
												."<td>".$i."</td>"
												."<td>".$row['MaNhanVien']."</td>"
												."<td>".$row['HoTen']."</td>"
												."<td>".$row['TenDangNhap']."</td>"
												."<td>".crypt($row['MatKhau'],100)."</td>"
												."<td>".$row['Email']."</td>"
												."<td>".$row['SĐT']."</td>";
												if($row['TrangThai']=="0")	
													$s=$s."<td><i class='fa fa-check '></i></td>";
												if($row['TrangThai']=="1")
													$s=$s."<td><i class='fa fa-close ' id='".$row['MaNhanVien']."'></i></td>";	
												$s=$s."<td>".$row['MaQuyen']."</td>";
												
												$s=$s. "<td><font style='color:#337ab7;cursor:pointer' onclick='datlaipassnhanvien(\"MaNhanVien=".$row['MaNhanVien']."\")' data-id=><i class='fa fa-pencil fa-fw'></i> Đặt lại</a></td>";
												if($row['TrangThai']=="0")	
													$s=$s."<td><font style='color:#337ab7;cursor:pointer' onclick='khoanhanvien(\"MaNhanVien=".$row['MaNhanVien']."&TrangThai=".$row['TrangThai']."\")' data-id=><i class='fa fa-lock fa-fw'></i> Khóa</font></td>";
												if($row['TrangThai']=="1")
													$s=$s."<td><font style='color:#337ab7;cursor:pointer' onclick='mokhoanhanvien(\"MaNhanVien=".$row['MaNhanVien']."&TrangThai=".$row['TrangThai']."\")' data-id=><i class='fa fa-unlock fa-fw'></i>Mở khóa</font></td>";
											$s=$s."</tr>";
										$i++;
									}
									
									$s=$s					."</div>"
														."</tbody>"
													."</thead>"
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
	}		
		
}

?>