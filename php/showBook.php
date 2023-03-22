
<?php

class ShowBook
{
	public static function showBookk()
			{
					require('DataProvider.php');
					if(isset($_GET['theloai']))
						$tenTheLoai=addslashes($_GET['theloai']);
					else $tenTheLoai="tatca";
					if($tenTheLoai=="")
						$tenTheLoai="tatca";
					if(isset($_GET['search']))
						$timkiem=addslashes($_GET['search']);
					else $timkiem="";
					if(isset($_GET['giatu']))
						$giatu=addslashes($_GET['giatu']);
					else
						$giatu="";
					if(isset($_GET['giaden']))
						$giaden=addslashes($_GET['giaden']);
					else
						$giaden="";
					if(isset($_GET['sapxep']))
						$sapxep=addslashes($_GET['sapxep']);
					else
						$sapxep="";
					if(isset($tenTheLoai) && $tenTheLoai=="tatca" && isset($_GET['timkiemnangcao'])==false)
					{						
						// -------------Tất cả sách---------------------------------------------------------------------//			
							//  Đếm số lượng sách 
							$sql="select COUNT(*) as numRows from sach ";
							$sql=$sql."where  TenSach LIKE '%".$timkiem."%' OR TenTacGia LIKE '%".$timkiem."%' ";
							$result=DataProvider::executeQuery($sql);
							$row=mysqli_fetch_array($result);
							$numRows=$row['numRows'];
							
							//  Xác định số sản phẩm tối đa hiện lên trong 1 trang
							$rowsPerPage=8;
							
							//  Lấy số trang hiện hành
							$pageNum=1;
							if(isset($_GET['page']))
							{
								$pageNum=$_GET['page'];
							}
							
							//  Lấy sản phẩm trong 1 trang
							$offset=($pageNum-1)*$rowsPerPage;
							$sql="select * from sach ";
							$sql=$sql." where TenSach LIKE '%".$timkiem."%' OR TenTacGia LIKE '%".$timkiem."%' ";
							$sql=$sql." LIMIT " .$offset.",".$rowsPerPage;
							
							//  Tính tổng số trang sẽ hiện thị
							$maxPage=ceil($numRows/$rowsPerPage);
							
							//  Lấy link của trang
							$sefl="sanpham.php?theloai=tatca&search=".$timkiem."&page=";
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
							$s="<div style='padding-left:10px'>";
							while($row=mysqli_fetch_array($result))
							{
									$s=$s. "<div class='sach'>"
											."<a href='chitietsach.php?";
										if($row['MaTheLoai']=="NN")
										{
											$s=$s."theloai=ngoaingu&masach=" . $row['MaSach'] ."'>"
												 ."<img src='../images/ngoaingu/" . $row['HinhAnh']  ."'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="KT")
										{
											$s=$s."theloai=kinhte&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/kinhte/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="KNS")
										{
											$s=$s."theloai=kynangsong&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/kynangsong/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="LS")
										{
											$s=$s."theloai=lichsu&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/lichsu/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="CN")
										{
											$s=$s."theloai=chuyennganh&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/chuyennganh/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="TN")
										{
											$s=$s."theloai=thieunhi&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/thieunhi/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="TT")
										{
											$s=$s."theloai=tuoiteen&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/tuoiteen/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="VH")
										{
											$s=$s."theloai=vanhoc&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/vanhoc/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
											
										$s=$s."</div>";
										
							}
							$s=$s."</div>";
							echo $s;
							
							//  In phân trang
							echo "<center>
											<div id='phantrang' style='clear:both'>
												<ul class='pagination'>".$first.$prev.$nav.$next.$last."</ul>
											</div>
								</center>";
									
							
						}//----------------------------------------------------------------------------------------------//
						else if(isset($tenTheLoai) && $tenTheLoai!="")
						{
							//  Đếm số lượng sách 
							$sql="select COUNT(*) as numRows from sach ";
							$sql=$sql."where ( TenSach LIKE '%".$timkiem."%' OR TenTacGia LIKE '%".$timkiem."%' ) ";
							if($tenTheLoai=="kinhte") $sql=$sql." and MaTheLoai='KT' ";
							else if($tenTheLoai=="kynangsong") $sql=$sql." and MaTheLoai='KNS' ";
							else if($tenTheLoai=="ngoaingu") $sql=$sql." and MaTheLoai='NN' ";
							else if($tenTheLoai=="lichsu") $sql=$sql." and MaTheLoai='LS' ";
							else if($tenTheLoai=="chuyennganh") $sql=$sql." and MaTheLoai='CN' ";
							else if($tenTheLoai=="thieunhi") $sql=$sql." and MaTheLoai='TN' ";
							else if($tenTheLoai=="tuoiteen") $sql=$sql." and MaTheLoai='TT' ";
							else if($tenTheLoai=="vanhoc") $sql=$sql." and MaTheLoai='VH' ";
							
							if(is_numeric($giatu) && is_numeric($giaden) && $giatu != "" && $giaden !="")
								$sql=$sql." and Gia BETWEEN '".$giatu."' and '".$giaden."' ";
							else if( is_numeric($giatu) && $giatu != "" && $giaden =="")
								$sql=$sql." and Gia >= ".$giatu;
							else if( is_numeric($giaden) && $giatu == "" && $giaden !="")
								$sql=$sql." and Gia <= ".$giaden;
							$result=DataProvider::executeQuery($sql);
							$row=mysqli_fetch_array($result);
							$numRows=$row['numRows'];
						
							//  Xác định số sản phẩm tối đa hiện lên trong 1 trang
							$rowsPerPage=8;
							
							//  Lấy số trang hiện hành
							$pageNum=1;
							if(isset($_GET['page']))
							{
								$pageNum=$_GET['page'];
							}
							
							//  Lấy sản phẩm trong 1 trang
							$offset=($pageNum-1)*$rowsPerPage;
							$sql="select * from sach ";
							$sql=$sql." where ( TenSach LIKE '%".$timkiem."%' OR TenTacGia LIKE '%".$timkiem."%' ) ";
							
							if($tenTheLoai=="kinhte") $sql=$sql." and MaTheLoai='KT' ";
							else if($tenTheLoai=="kynangsong") $sql=$sql." and MaTheLoai='KNS' ";
							else if($tenTheLoai=="ngoaingu") $sql=$sql." and MaTheLoai='NN' ";
							else if($tenTheLoai=="lichsu") $sql=$sql." and MaTheLoai='LS' ";
							else if($tenTheLoai=="chuyennganh") $sql=$sql." and MaTheLoai='CN' ";
							else if($tenTheLoai=="thieunhi") $sql=$sql." and MaTheLoai='TN' ";
							else if($tenTheLoai=="tuoiteen") $sql=$sql." and MaTheLoai='TT' ";
							else if($tenTheLoai=="vanhoc") $sql=$sql." and MaTheLoai='VH' ";
							
							if(is_numeric($giatu) && is_numeric($giaden) && $giatu != "" && $giaden !="")
							{
								$sql=$sql." and Gia BETWEEN '".$giatu."' and '".$giaden."' ";
							}
							else if(is_numeric($giatu) && $giatu != "" && $giaden =="")
								$sql=$sql." and Gia >= ".$giatu;
							else if( is_numeric($giaden) && $giatu == "" && $giaden !="")
								$sql=$sql." and Gia <= ".$giaden;
							if(isset($_GET['sapxep']) && $_GET['sapxep']!="")
							{
								if($_GET['sapxep']=="giatangdan") $sql=$sql." order by Gia ASC ";
								if($_GET['sapxep']=="giagiamdan") $sql=$sql." order by Gia DESC ";
								if($_GET['sapxep']=="tentangdan") $sql=$sql." order by TenSach ASC,TenTacGia ASC ";
								if($_GET['sapxep']=="tengiamdan") $sql=$sql." order by TenSach DESC,TenTacGia DESC ";
							}
							$sql=$sql." LIMIT " .$offset.",".$rowsPerPage;
						
							//  Tính tổng số trang sẽ hiện thị
							$maxPage=ceil($numRows/$rowsPerPage);
							
							//  Lấy link của trang
							$sefl="sanpham.php?theloai=".$tenTheLoai."&giatu=".$giatu."&giaden=".$giaden."&sapxep=".$sapxep."&search=".$timkiem."&timkiemnangcao=1&page=";
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
							$s="<div style='padding-left:10px'>";
							while($row=mysqli_fetch_array($result))
							{
									$s=$s. "<div class='sach'>"
											."<a href='chitietsach.php?";
										if($row['MaTheLoai']=="NN")
										{
											$s=$s."theloai=ngoaingu&masach=" . $row['MaSach'] ."'>"
												 ."<img src='../images/ngoaingu/" . $row['HinhAnh']  ."'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="KT")
										{
											$s=$s."theloai=kinhte&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/kinhte/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="KNS")
										{
											$s=$s."theloai=kynangsong&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/kynangsong/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="LS")
										{
											$s=$s."theloai=lichsu&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/lichsu/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="CN")
										{
											$s=$s."theloai=chuyennganh&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/chuyennganh/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="TN")
										{
											$s=$s."theloai=thieunhi&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/thieunhi/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="TT")
										{
											$s=$s."theloai=tuoiteen&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/tuoiteen/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
										else if($row['MaTheLoai']=="VH")
										{
											$s=$s."theloai=vanhoc&masach=" . $row['MaSach'] ."'>"
												."<img src='../images/vanhoc/" . $row['HinhAnh'] . "'>"
												 ."</a>"
												 ."<div class='tensach'>" . $row['TenSach'] . "</div>"
												 ."<div class='tacgia'>" . $row['TenTacGia'] . "</div>"
												 ."<div class='gia'>" .  $row['Gia'] . "<sup>đ</sup></div>";
										}
											
										$s=$s."</div>";
										
							}
							$s=$s."</div>";
							echo $s;
							
							//  In phân trang
							echo "<center>
											<div id='phantrang' style='clear:both'>
												<ul class='pagination'>".$first.$prev.$nav.$next.$last."</ul>
											</div>
								</center>";
						}
							
	
			}
//------------------------------------////////////////////////////////////----------------------------------------------------------//
	public static function showBookInAdmin()
	{
		require('DataProvider.php');
		
		if(isset($_GET['theloai']))
			$matheloai=addslashes($_GET['theloai']);
		else $matheloai="";
		if(isset($_GET['timkiemtheoloai']))
			$loai=addslashes($_GET['timkiemtheoloai']);
		else $loai="";
		if(isset($_GET['timkiem']))
			$chuoitimkiem=addslashes($_GET['timkiem']);
		else $chuoitimkiem="";
		$loaiSapXep="";
		if(isset($_GET['sort']) && str_word_count($_GET['sort'])==1)
			$loaiSapXep="asc";
		if(isset($_GET['sort']) && str_word_count($_GET['sort'])>1)
		{
			$sort=addslashes($_GET['sort']);
			if($sort!="")
			{
				$a=explode(" ",$sort);
				if($a[1]=="asc" || $a[1]=="ASC")
				{
					$loaiSapXep="desc";
				}
				else if($a[1]=="desc" || $a[1]=="DESC")
				{
					$loaiSapXep="asc";
				}
			}
			
		}
		else
			$sort="";
		
						if($matheloai=="" && $loai=="" && $chuoitimkiem=="" && $sort=="")
						{		
							//  Đếm số lượng sách 
							$sql="select COUNT(*) as numRows from sach s,chitietsach ct where s.MaSach=ct.MaSach";
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
							$sql="select s.MaSach,s.MaTheLoai,TenSach,TenTheLoai,TenTacGia,Gia,HinhAnh from sach s,chitietsach ct, theloai tl where s.MaSach=ct.MaSach and s.MaTheLoai=tl.MaTheLoai LIMIT ".$offset.",".$rowsPerPage;
							
							//  Tính tổng số trang sẽ hiện thị
							$maxPage=ceil($numRows/$rowsPerPage);
							
							//  Lấy link của trang
							$sefl="quanlysanpham.php?theloai=&loai=&timkiem=&sort=&page=";
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
							
							$s="<div class='table-responsive' >
										<table class='table table-striped table-bordered table-hover' id='gg'>
											<thead>
                                                <tr>
                                                    <th >STT</th>
                                                    <th onclick='showBookAjax(\"s.MaSach asc\")' style='cursor:pointer;'>Mã_sách</th>
                                                    <th onclick='showBookAjax(\"TenSach asc\")' style='cursor:pointer;'>Tên_sách</th>
                                                    <th onclick='showBookAjax(\"TenTheLoai asc\")' style='cursor:pointer;'>Thể_loại</th>
                                                    <th onclick='showBookAjax(\"TenTacGia asc\")' style='cursor:pointer;'>Tên_tác_giả</th>
													<th onclick='showBookAjax(\"Gia asc\")' style='cursor:pointer;'>Giá</th>
													<th >Hình_ảnh</th>
													<th >Sửa</th>
													<th >Xóa</th>
                                                </tr>
											</thead>
												<tbody>
													<div id='data-product'>";
							while($row=mysqli_fetch_array($result))
							{
								$s=$s. "<tr>"
										."<td>".$i."</td>"
										."<td>".$row['MaSach']."</td>"
										."<td>".$row['TenSach']."</td>"
										."<td>".$row['TenTheLoai']."</td>"
										."<td>".$row['TenTacGia']."</td>"
										."<td>".$row['Gia']."</td>";
										
										if($row['MaTheLoai']=="NN")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/ngoaingu/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="KT")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/kinhte/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="KNS")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/kynangsong/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="LS")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/lichsu/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="CN")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/chuyennganh/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="TN")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/thieunhi/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="TT")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/tuoiteen/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="VH")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/vanhoc/" . $row['HinhAnh'] . "'></td>";
										
										$s=$s. "<td><a href='editBook.php?masach=".$row['MaSach']."'><i class='fa fa-pencil fa-fw'></i> Sửa</a></td>"
										."<td><font style='color:#337ab7;cursor:pointer' onclick='xoasanpham(".'"'.$row['MaSach'].'"'.")' data-id=><i class='fa fa-trash fa-fw'></i> Xóa</font></td>"
									."</tr>";
								$i++;
							}
							
							$s=$s					."</div>"
												."</tbody>"
										."</table>"
									."</div>";
							
							echo $s;
							//  In phân trang
							echo "<center>
											<div id='phantrang' style='clear:both'>
												<ul class='pagination'>".$first.$prev.$nav.$next.$last."</ul>
											</div>
								</center>";
									
							
						}//--------	------------------------------------------------------------------------------------------//
						else
						{
							//  Đếm số lượng sách 
							$sql="select COUNT(*) as numRows from sach s,chitietsach ct where s.MaSach=ct.MaSach";
							if($matheloai!="")
								$sql=$sql . " and s.MaTheLoai='".$matheloai."'";
							if($loai!="" && $chuoitimkiem!="")
							{
								if($loai=="MaSach")
									$sql=$sql." and s.MaSach LIKE '%".$chuoitimkiem."%'";
								if($loai=="TenSach")
									$sql=$sql." and s.TenSach LIKE '%".$chuoitimkiem."%'";
								if($loai=="TenTacGia")
									$sql=$sql." and TenTacGia LIKE '%".$chuoitimkiem."%'";
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
							$sql="select s.MaSach,s.MaTheLoai,TenSach,TenTheLoai,TenTacGia,Gia,HinhAnh from sach s,chitietsach ct, theloai tl where s.MaSach=ct.MaSach and s.MaTheLoai=tl.MaTheLoai ";
							if($matheloai!="")
								$sql=$sql . " and s.MaTheLoai='".$matheloai."'";
							if($loai!="" && $chuoitimkiem!="")
							{
								if($loai=="MaSach")
									$sql=$sql." and s.MaSach LIKE '%".$chuoitimkiem."%' ";
								if($loai=="TenSach")
									$sql=$sql." and s.TenSach LIKE '%".$chuoitimkiem."%' ";
								if($loai=="TenTacGia")
									$sql=$sql." and TenTacGia LIKE '%".$chuoitimkiem."%' ";
							}
							if($sort!="")
								$sql=$sql."order by ".$sort;
							$sql=$sql. " LIMIT ".$offset.",".$rowsPerPage;
							
							//  Tính tổng số trang sẽ hiện thị
							$maxPage=ceil($numRows/$rowsPerPage);
							
							//  Lấy link của trang
							$sefl="quanlysanpham.php?theloai=". $matheloai."&loai=".$loai."&timkiem=".$chuoitimkiem."&sort=".$sort."&page=";
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
							
							$s="<div class='table-responsive'>
										<table class='table table-striped table-bordered table-hover' id='gg'>
											<thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th onclick='showBookAjax(\"MaSach ".$loaiSapXep."\")' style='cursor:pointer;'>Mã_sách</th>
                                                    <th onclick='showBookAjax(\"TenSach ".$loaiSapXep."\")' style='cursor:pointer;'>Tên_sách</th>
                                                    <th onclick='showBookAjax(\"TenTheLoai ".$loaiSapXep."\")' style='cursor:pointer;'>Thể_loại</th>
                                                    <th onclick='showBookAjax(\"TenTacGia ".$loaiSapXep."\")' style='cursor:pointer;'>Tên_tác_giả</th>
													<th onclick='showBookAjax(\"Gia ".$loaiSapXep."\")' style='cursor:pointer;'>Giá</th>
													<th>Hình_ảnh</th>
													<th>Sửa</th>
													<th>Xóa</th>
                                                </tr>
											</thead>
												<tbody>
													<div id='data-product'>";
							while($row=mysqli_fetch_array($result))
							{
								$s=$s. "<tr>"
										."<td>".$i."</td>"
										."<td>".$row['MaSach']."</td>"
										."<td>".$row['TenSach']."</td>"
										."<td>".$row['TenTheLoai']."</td>"
										."<td>".$row['TenTacGia']."</td>"
										."<td>".$row['Gia']."</td>";
										
										if($row['MaTheLoai']=="NN")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/ngoaingu/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="KT")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/kinhte/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="KNS")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/kynangsong/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="LS")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/lichsu/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="CN")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/chuyennganh/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="TN")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/thieunhi/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="TT")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/tuoiteen/" . $row['HinhAnh'] . "'></td>";
										if($row['MaTheLoai']=="VH")
											$s=$s. "<td><img style='width:100px;height:150px' src='../images/vanhoc/" . $row['HinhAnh'] . "'></td>";
										
										$s=$s. "<td><a href='editBook.php?masach=".$row['MaSach']."'><i class='fa fa-pencil fa-fw'></i> Sửa</a></td>"
										."<td><font style='color:#337ab7;cursor:pointer' onclick='xoasanpham(".'"'.$row['MaSach'].'"'.")' data-id=><i class='fa fa-trash fa-fw'></i> Xóa</font></td>"
									."</tr>";
								$i++;
							}
							
							$s=$s					."</div>"
												."</tbody>"
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