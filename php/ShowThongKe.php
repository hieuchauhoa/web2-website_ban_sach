<?php
function thongkesanpham(){
		//require('DataProvider.php');
		if(isset($_GET['theloai']))
			$matheloai=addslashes($_GET['theloai']);
		else $matheloai="";
		if(isset($_GET['ngaytu']))
			$nt=addslashes($_GET['ngaytu']);
		else
			$nt="";
		if(isset($_GET['ngayden']))
			$nd=addslashes($_GET['ngayden']);
		else
			$nd="";
					if(isset($_GET['giatu']))
						$giatu=addslashes($_GET['giatu']);
					else
						$giatu="";
					if(isset($_GET['giaden']))
						$giaden=addslashes($_GET['giaden']);
					else
						$giaden="";
					
					if($matheloai=="" && $nt=="" && $nd=="" && $giatu=="" && $giaden=="")
					{		//  Đếm số lượng hóa đơn 
							$sql="select COUNT(*) as numRows from chitiethoadon where TinhTrangCT='Đã giao hàng'";
							$result=DataProvider::executeQuery($sql);
							$row=mysqli_fetch_array($result);
							$numRows=$row['numRows'];
							
							//  Xác định số hóa đơn tối đa hiện lên trong 1 trang
							$rowsPerPage=6;
							
							//  Lấy số trang hiện hành
							$pageNum=1;
							if(isset($_GET['page']))
							{
								$pageNum=$_GET['page'];
							}
							
							//  Lấy sản phẩm trong 1 trang
							$offset=($pageNum-1)*$rowsPerPage;
							$sql="select s.MaSach,TenSach,Sum(SoLuong) as SoLuong,Sum(TongTienCT) as TongTienCT from chitiethoadon ct, sach s where TinhTrangCT='Đã giao hàng' and ct.MaSach=s.MaSach group by ct.MaSach LIMIT ".$offset.",".$rowsPerPage;
							
							//  Tính tổng số trang sẽ hiện thị
							$maxPage=ceil($numRows/$rowsPerPage);
							
							//  Lấy link của trang
							$sefl="thongke.php?ngaytu=&ngayden=&theloai=&page=";
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
							$i=$offset;
							
							$s="<div class='table-responsive' id='gg'>
										<table class='table table-striped table-bordered table-hover'>
											<thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã sách</th>
                                                    <th>Tên sách</th>
                                                    <th>Tổng số lượng</th>
                                                    <th>Tổng số tiền</th>
                                                </tr>
											</thead>
											<tbody>";
							while($row=mysqli_fetch_array($result))
							{
								$s=$s. "<tr>"
										."<td>".$i."</td>"
										."<td>".$row['MaSach']."</td>"
										."<td>".$row['TenSach']."</td>"
										."<td>".$row['SoLuong']."</td>"
										."<td>".$row['TongTienCT']."</td>"
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
							$sql="select sum(SoLuong) as 'sl',sum(TongTienCT) as 'tt' from chitiethoadon where TinhTrangCT='Đã giao hàng'";
							$result=DataProvider::executeQuery($sql);
							$row=mysqli_fetch_array($result);
							echo "<script>
									document.getElementById('AllSoLuong').innerHTML='".$row['sl']."'; 
									document.getElementById('AllDoanhThu').innerHTML='".$row['tt']."';
									document.getElementById('SoLuong').innerHTML='".$row['sl']."'; 
									document.getElementById('DoanhThu').innerHTML='".$row['tt']."';
									document.getElementById('ChiemTiLe').innerHTML='".(((double)$row['tt']/$row['tt'])*100)."';
								</script>";
					}
					//---------------------------------------------------------------------------------------------------//
					else
					{
						//  Đếm số lượng hóa đơn
							$sql="select COUNT(*) as numRows from chitiethoadon ct,sach s where TinhTrangCT='Đã giao hàng' and s.MaSach=ct.MaSach ";
							if($nt!="" && $nd!="")
								$sql=$sql." and NgayGiaoHang BETWEEN '".$nt."' and '".$nd."' ";
							else if($nt!="" && $nd=="")
								$sql=$sql." and NgayGiaoHang >= '".$nt."'";
							else if($nt=="" && $nd!="")
								$sql=$sql." and NgayGiaoHang <= '".$nd."'";
							if($matheloai!="")
								$sql=$sql." and s.MaTheLoai='".$matheloai."' ";
							if(is_numeric($giatu) && is_numeric($giaden) && $giatu != "" && $giaden !="")
								$sql=$sql." and Gia BETWEEN '".$giatu."' and '".$giaden."' ";
							else if( is_numeric($giatu) && $giatu != "" && $giaden =="")
								$sql=$sql." and Gia >= ".$giatu;
							else if( is_numeric($giaden) && $giatu == "" && $giaden !="")
								$sql=$sql." and Gia <= ".$giaden;
							$result=DataProvider::executeQuery($sql);
							$row=mysqli_fetch_array($result);
							$numRows=$row['numRows'];
							
							//  Xác định số hóa đơn tối đa hiện lên trong 1 trang
							$rowsPerPage=6;
							
							//  Lấy số trang hiện hành
							$pageNum=1;
							if(isset($_GET['page']))
							{
								$pageNum=$_GET['page'];
							}
							
							//  Lấy sản phẩm trong 1 trang
							$offset=($pageNum-1)*$rowsPerPage;
							$sql="select s.MaSach,TenSach,Sum(SoLuong) as 'SoLuong',Sum(TongTienCT) as 'TongTienCT' from chitiethoadon ct,sach s where TinhTrangCT='Đã giao hàng' and s.MaSach=ct.MaSach ";
							if($nt!="" && $nd!="")
								$sql=$sql."and NgayGiaoHang BETWEEN '".$nt."' and '".$nd."' ";
							else if($nt!="" && $nd=="")
								$sql=$sql." and NgayGiaoHang >= '".$nt."'";
							else if($nt=="" && $nd!="")
								$sql=$sql." and NgayGiaoHang <= '".$nd."'";
							if(is_numeric($giatu) && is_numeric($giaden) && $giatu != "" && $giaden !="")
								$sql=$sql." and Gia BETWEEN '".$giatu."' and '".$giaden."' ";
							else if( is_numeric($giatu) && $giatu != "" && $giaden =="")
								$sql=$sql." and Gia >= ".$giatu;
							else if( is_numeric($giaden) && $giatu == "" && $giaden !="")
								$sql=$sql." and Gia <= ".$giaden;
							if($matheloai!="")
								$sql=$sql." and MaTheLoai='".$matheloai."' ";
							 $sql=$sql." group by ct.MaSach LIMIT ".$offset.",".$rowsPerPage;
							
							
							//  Tính tổng số trang sẽ hiện thị
							$maxPage=ceil($numRows/$rowsPerPage);
							
							//  Lấy link của trang
							$sefl="thongke.php?ngaytu=".$nt."&ngayden=".$nd."&theloai=".$matheloai."&page=";
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
							$i=$offset;
							
							$s="<div class='table-responsive' id='gg'>
										<table class='table table-striped table-bordered table-hover'>
											<thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã sách</th>
                                                    <th>Tên sách</th>
                                                    <th>Tổng số lượng</th>
                                                    <th>Tổng số tiền</th>
                                                </tr>
											</thead>
											<tbody>";
							while($row=mysqli_fetch_array($result))
							{
								$s=$s. "<tr>"
										."<td>".$i."</td>"
										."<td>".$row['MaSach']."</td>"
										."<td>".$row['TenSach']."</td>"
										."<td>".$row['SoLuong']."</td>"
										."<td>".$row['TongTienCT']."</td>"
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
							///-------------------------------------------------//
							
							$sql="select Sum(SoLuong) as 'sl',Sum(TongTienCT) as 'tt' from chitiethoadon ct ,sach s where TinhTrangCT='Đã giao hàng' and ct.MaSach=s.MaSach ";
							if($nt!="" && $nd!="")
								$sql=$sql." and NgayGiaoHang BETWEEN '".$nt."' and '".$nd."' ";
							else if($nt!="" && $nd=="")
								$sql=$sql." and NgayGiaoHang >= '".$nt."'";
							else if($nt=="" && $nd!="")
								$sql=$sql." and NgayGiaoHang <= '".$nd."'";
							if(is_numeric($giatu) && is_numeric($giaden) && $giatu != "" && $giaden !="")
								$sql=$sql." and Gia BETWEEN '".$giatu."' and '".$giaden."' ";
							else if( is_numeric($giatu) && $giatu != "" && $giaden =="")
								$sql=$sql." and Gia >= ".$giatu;
							else if( is_numeric($giaden) && $giatu == "" && $giaden !="")
								$sql=$sql." and Gia <= ".$giaden;
							
							$result=DataProvider::executeQuery($sql);
							$row=mysqli_fetch_array($result);
							$alldt=$row['tt'];
							if($alldt==0 || $alldt=="")
								$alldt=1;
							echo "<script>
									document.getElementById('AllSoLuong').innerHTML='".$row['sl']."'; 
									document.getElementById('AllDoanhThu').innerHTML='".$row['tt']."';
								</script>";
								
							$sql="select Sum(SoLuong) as 'sl',Sum(TongTienCT) as 'tt' from chitiethoadon ct ,sach s where TinhTrangCT='Đã giao hàng' and ct.MaSach=s.MaSach ";
							if($nt!="" && $nd!="")
								$sql=$sql." and NgayGiaoHang BETWEEN '".$nt."' and '".$nd."' ";
							else if($nt!="" && $nd=="")
								$sql=$sql." and NgayGiaoHang >= '".$nt."'";
							else if($nt=="" && $nd!="")
								$sql=$sql." and NgayGiaoHang <= '".$nd."'";
							if($matheloai!="")
								$sql=$sql." and MaTheLoai='".$matheloai."' ";
							if(is_numeric($giatu) && is_numeric($giaden) && $giatu != "" && $giaden !="")
								$sql=$sql." and Gia BETWEEN '".$giatu."' and '".$giaden."' ";
							else if( is_numeric($giatu) && $giatu != "" && $giaden =="")
								$sql=$sql." and Gia >= ".$giatu;
							else if( is_numeric($giaden) && $giatu == "" && $giaden !="")
								$sql=$sql." and Gia <= ".$giaden;
							
							$result=DataProvider::executeQuery($sql);
							$row=mysqli_fetch_array($result);
							echo "<script>
									document.getElementById('SoLuong').innerHTML='".$row['sl']."'; 
									document.getElementById('DoanhThu').innerHTML='".$row['tt']."';
									document.getElementById('ChiemTiLe').innerHTML='".(round(((double)$row['tt']/$alldt)*100,3))." %';
								</script>";
					}
					
}

function topsanphambanchay(){
		//require('DataProvider.php');
		if(isset($_GET['theloai']))
			$matheloai=addslashes($_GET['theloai']);
		else $matheloai="";
		if(isset($_GET['ngaytu']) && isset($_GET['ngayden']))
		{
			$nt=addslashes($_GET['ngaytu']);
			$nd=addslashes($_GET['ngayden']);
		}
		else{
			$nt="";
			$nd="";
		}
		if(isset($_GET['top']))
		{
			if($_GET['top']=="" || (int)$_GET['top']<=0)
				$top="1";
			else
				$top=addslashes($_GET['top']);
		}
		else $top="1";
		
					if(isset($_GET['giatu']))
						$giatu=addslashes($_GET['giatu']);
					else
						$giatu="";
					if(isset($_GET['giaden']))
						$giaden=addslashes($_GET['giaden']);
					else
						$giaden="";
					if($matheloai=="" && $nt=="" && $nd=="" && $top =="1" && $giatu=="" && $giaden=="")
					{		
							$sql="select *,sum(SoLuong) as 'SoLuongg', sum(TongTienCT) as 'TongTienCT' from chitiethoadon ct,sach s where TinhTrangCT='Đã giao hàng' and s.MaSach=ct.MaSach group by ct.MaSach having sum(SoLuong)>=ALL(select sum(soluong) from chitiethoadon where TinhTrangCT='Đã giao hàng' GROUP BY MaSach) ORDER by sum(TongTienCT) DESC LIMIT 1";
							$result=DataProvider::executeQuery($sql);
							$i=1;
							$s="<div class='table-responsive' id='gg'>
										<table class='table table-striped table-bordered table-hover'>
											<thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã sách</th>
                                                    <th>Tên sách</th>
                                                    <th>Tổng số lượng</th>
                                                    <th>Tổng số tiền</th>
                                                </tr>
											</thead>
											<tbody>";
							while($row=mysqli_fetch_array($result))
							{
								$s=$s. "<tr>"
										."<td>".$i."</td>"
										."<td>".$row['MaSach']."</td>"
										."<td>".$row['TenSach']."</td>"
										."<td>".$row['SoLuong']."</td>"
										."<td>".$row['TongTienCT']."</td>"
										."</tr>";
								$i++;
							}
							
							$s=$s.			"</tbody>"
										."</table>"
									."</div>";
												
							
							echo $s;
									
					}
					//---------------------------------------------------------------------------------------------------//
					else
					{
						//  Đếm số lượng hóa đơn
							$sql="select count(*) as 'numRows',sum(SoLuong) as 'SoLuong', sum(TongTienCT) as 'TongTienCT' from chitiethoadon ct,sach s where TinhTrangCT='Đã giao hàng' and s.MaSach=ct.MaSach ";
							if($nt!="" && $nd!="")
								$sql=$sql." and NgayGiaoHang BETWEEN '".$nt."' and '".$nd."' ";
							else if($nt!="" && $nd=="")
								$sql=$sql." and NgayGiaoHang >= '".$nt."'";
							else if($nt=="" && $nd!="")
								$sql=$sql." and NgayGiaoHang <= '".$nd."'";
							if(is_numeric($giatu) && is_numeric($giaden) && $giatu != "" && $giaden !="")
								$sql=$sql." and Gia BETWEEN '".$giatu."' and '".$giaden."' ";
							else if( is_numeric($giatu) && $giatu != "" && $giaden =="")
								$sql=$sql." and Gia >= ".$giatu;
							else if( is_numeric($giaden) && $giatu == "" && $giaden !="")
								$sql=$sql." and Gia <= ".$giaden;
							if($matheloai!="")
								$sql=$sql." and s.MaTheLoai='".$matheloai."' ";
							//$sql=$sql." ORDER by sum(SoLuong) DESC,sum(TongTienCT) DESC LIMIT ".$top;
							
							$result=DataProvider::executeQuery($sql);
							
							$row=mysqli_fetch_array($result);
							$numRows=$row['numRows'];
							//  Xác định số hóa đơn tối đa hiện lên trong 1 trang
							$rowsPerPage=$top;
							
							//  Lấy số trang hiện hành
							$pageNum=1;
							if(isset($_GET['page']))
							{
								$pageNum=$_GET['page'];
							}
							
							//  Lấy sản phẩm trong 1 trang
							$offset=($pageNum-1)*$rowsPerPage;
			
							$sql="select ct.MaSach,TenSach,Sum(SoLuong) as 'SoLuong',Sum(TongTienCT) as 'TongTienCT' from chitiethoadon ct,sach s where TinhTrangCT='Đã giao hàng' and s.MaSach=ct.MaSach ";
							if($nt!="" && $nd!="")
								$sql=$sql." and NgayGiaoHang BETWEEN '".$nt."' and '".$nd."' ";
							else if($nt!="" && $nd=="")
								$sql=$sql." and NgayGiaoHang >= '".$nt."'";
							else if($nt=="" && $nd!="")
								$sql=$sql." and NgayGiaoHang <= '".$nd."'";
							if(is_numeric($giatu) && is_numeric($giaden) && $giatu != "" && $giaden !="")
								$sql=$sql." and Gia BETWEEN '".$giatu."' and '".$giaden."' ";
							else if( is_numeric($giatu) && $giatu != "" && $giaden =="")
								$sql=$sql." and Gia >= ".$giatu;
							else if( is_numeric($giaden) && $giatu == "" && $giaden !="")
								$sql=$sql." and Gia <= ".$giaden;
							if($matheloai!="")
								$sql=$sql." and s.MaTheLoai='".$matheloai."' ";
							 $sql=$sql." group by ct.MaSach,TenSach ";
							$sql=$sql." ORDER BY sum(SoLuong) DESC,sum(TongTienCT) DESC LIMIT ".$offset.",".$rowsPerPage;
							
							//  Tính tổng số trang sẽ hiện thị
							$maxPage=ceil($numRows/$rowsPerPage);
							
							//  Lấy link của trang
							$sefl="thongke.php?ngaytu=".$nt."&ngayden=".$nd."&theloai=".$matheloai."&top=".$top."&page=";
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
							$i=$offset;
							
							$s="<div class='table-responsive' id='gg'>
										<table class='table table-striped table-bordered table-hover'>
											<thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã sách</th>
                                                    <th>Tên sách</th>
                                                    <th>Tổng số lượng</th>
                                                    <th>Tổng số tiền</th>
                                                </tr>
											</thead>
											<tbody>";
							while($row=mysqli_fetch_array($result))
							{
								$s=$s. "<tr>"
										."<td>".$i."</td>"
										."<td>".$row['MaSach']."</td>"
										."<td>".$row['TenSach']."</td>"
										."<td>".$row['SoLuong']."</td>"
										."<td>".$row['TongTienCT']."</td>"
										."</tr>";
								$i++;
								//if($i==$top) break;
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
					
}

function thongketinhtrangsp(){
		//require('DataProvider.php');
		if(isset($_GET['theloai']))
			$matheloai=addslashes($_GET['theloai']);
		else $matheloai="";
		if(isset($_GET['tinhtrangsp']))
			$tinhtrangsp=$_GET['tinhtrangsp'];
		else
			$tinhtrangsp="";		
						//  Đếm số lượng hóa đơn
							$sql="select count(*) as 'numRows' from chitietsach ct,sach s where s.MaSach=ct.MaSach";
							if($matheloai!="")
								$sql=$sql." and s.MaTheLoai='".$matheloai."' ";
							if($tinhtrangsp=="0")
								$sql=$sql." and SoLuongTon=0 ";
							else if($tinhtrangsp=="1")
								$sql=$sql." and SoLuongTon > SLTToiThieu ";
							else if($tinhtrangsp=="2")
								$sql=$sql." and SoLuongTon > 0 and SoLuongTon <= SLTToiThieu ";

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
			
							$sql="select * from chitietsach ct,sach s,theloai tl where s.MaSach=ct.MaSach and s.MaTheLoai=tl.MaTheLoai ";
							if($matheloai!="")
								$sql=$sql." and s.MaTheLoai='".$matheloai."' ";
							if($tinhtrangsp=="0")
								$sql=$sql." and SoLuongTon = 0 ";
							else if($tinhtrangsp=="1")
								$sql=$sql." and SoLuongTon > SLTToiThieu ";
							else if($tinhtrangsp=="2")
								$sql=$sql." and SoLuongTon > 0 and SoLuongTon <= SLTToiThieu ";
							$sql=$sql." LIMIT ".$offset.",".$rowsPerPage;
							//  Tính tổng số trang sẽ hiện thị
							$maxPage=ceil($numRows/$rowsPerPage);
							
							//  Lấy link của trang
							$sefl="thongkesanpham.php?theloai=".$matheloai."&tinhtrangsp=".$tinhtrangsp."&page=";
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
							$i=$offset;
							
							$s="<div class='table-responsive' id='gg'>
										<table class='table table-striped table-bordered table-hover'>
											<thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã sách</th>
                                                    <th>Tên sách</th>
                                                     <th>Thể loại</th>
													 <th>Số lượng tồn tối thiểu</th>
                                                    <th>Số lượng tồn</th>
													<th>Tình trạng</th>
                                                </tr>
											</thead>
											<tbody>";
							while($row=mysqli_fetch_array($result))
							{
								$s=$s. "<tr>"
										."<td>".$i."</td>"
										."<td>".$row['MaSach']."</td>"
										."<td>".$row['TenSach']."</td>"
										."<td>".$row['TenTheLoai']."</td>"
										."<td>10</td>"
										."<td>".$row['SoLuongTon']."</td>";
										if($row['SoLuongTon']==0)
											$s=$s."<td>Hết hàng</td>";
										else if($row['SoLuongTon']>$row['SLTToiThieu'])
											$s=$s."<td>Còn hàng</td>";
										else if($row['SoLuongTon']>0 && $row['SoLuongTon']<$row['SLTToiThieu'])
											$s=$s."<td>Cảnh báo</td>";
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
?>