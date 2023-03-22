<?php 
	ini_set('session.auto_start',0);
	ini_set('session.cookie_lifetime',0);
	include 'sl.php';
	require('common.php');
	//đã đang nhập
	if(isLogined()==true)
		// kiểm tra đây là khách hàng thì về trang chủ kh
		if($_SESSION['login']['MaQuyen'] == "1" || $_SESSION['login']['MaQuyen'] == "2" )
		{
				header("Location:admin.php");
		}
		
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nhà sách OnePiece</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="../js/showBook.js"></script>
<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<script type="text/javascript" language="javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>

</head>
<body>

                                            <!--------------- header --------------->
<nav class="navbar navbar-inverse " style="border-radius:0px">
  <div class="container">
  
     	 <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
                </button>
                <a class="navbar-brand" href="../index.php" title="Trang chủ"><img src="../images/onepiece.PNG" style="margin:-16px" width="200px" height="52px" alt="logo-trang chủ"></a>
         </div>
 
        <div class="collapse navbar-collapse" id="myNavbar">
			
			<div class="row">    
				<div class="col-md-5 col-md-offset-2">
					<form class="navbar-form navbar-left" action="sanpham.php" name="searchIndex">
						<div class="input-group" >
							<input type="hidden" name="theloai" value="tatca">
							<input type="text" class="form-control" placeholder="Tìm kiếm" name="search" size="44" value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</div>
							
						</div>
					</form>	
				</div>
		
				<ul class="nav navbar-nav navbar-right" >
					<li id="loginn"><a href="DangNhap.php"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a></li>
					<li id="logout" class=""><a href="DangKy.php"><span class="glyphicon glyphicon-log-in"></span> Đăng ký</a></li>
				</ul>
			</div>
			
        </div>
  
   

  </div>
</nav>

                                           <!---------------- slder ----------------->
 <div id="title-background" class="header-page header-shop" style="background:;background-size: cover;margin-top:-20px">
<div class="theme">
	<div class="title-page tieude"></div>
</div>
</div>


                                    <!------------- navbar menu ---------------->
<nav class="navbar navbar-inverse" style="margin-top:0px;border-radius:0px">
  <div class="container">
     	 <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar2">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
                </button>
         </div>
			<div class="collapse navbar-collapse" id="myNavbar2">
				
				<ul class="nav navbar-nav">
					<li class="active"><a href="../index.php">Trang chủ</a></li>
					<li><a href="About.php">Về chúng tôi</a></li>
					<li><a href="Contact.php">Liên hệ</a></li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Thể loại <span class="caret"></span></a>
					  <ul class="dropdown-menu">
							<li><a href="sanpham.php?theloai=ngoaingu&page=1" >Học ngoại ngữ</a></li>
							<li><a href="sanpham.php?theloai=kinhte&page=1" >Kinh tế</a></li>
							<li><a href="sanpham.php?theloai=kynangsong&page=1" >Kỹ năng sống</a></li>
							<li><a href="sanpham.php?theloai=lichsu&page=1" >Lịch sử</a></li>
							<li><a href="sanpham.php?theloai=chuyennganh&page=1" >Sách chuyên ngành</a></li>
							<li><a href="sanpham.php?theloai=thieunhi&page=1" >Sách thiếu nhi</a></li>
							<li><a href="sanpham.php?theloai=tuoiteen&page=1" >Sách tuổi teen</a></li>
							<li><a href="sanpham.php?theloai=vanhoc&page=1" >Sách văn học</a></li>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header"></li>
						<li><a href="sanpham.php?theloai=tatca&page=1">Tất cả</a></li>
					  </ul>
					</li>
				</ul>
				
				
			  <ul class="nav navbar-nav navbar-right">
				<li>
					<a href="giohang.php"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng<span class="badge badge-secondary " style="margin-bottom: 2px;"><?php echo $soluongsp ?></span></a>
				</li>
			  </ul>
			</div>
	

    </div>
</nav>
                                          <!---------------------content sach ----------------------->
<div class="container" >
			<div class="row">
			
				<div class="col-md-2">
					<div class="list-group" style="margin-top:20px">
						<a href="sanpham.php?theloai=ngoaingu&page=1" class="list-group-item" >Học ngoại ngữ</a>
						<a href="sanpham.php?theloai=kinhte&page=1" class="list-group-item" >Kinh tế</a>
						<a href="sanpham.php?theloai=kynangsong&page=1" class="list-group-item" >Kỹ năng sống</a>
						<a href="sanpham.php?theloai=lichsu&page=1" class="list-group-item" >Lịch sử</a>
						<a href="sanpham.php?theloai=chuyennganh&page=1" class="list-group-item" >Sách chuyên ngành</a>
						<a href="sanpham.php?theloai=thieunhi&page=1" class="list-group-item" >Sách thiếu nhi</a>
						<a href="sanpham.php?theloai=tuoiteen&page=1" class="list-group-item" >Sách tuổi teen</a>
						<a href="sanpham.php?theloai=vanhoc&page=1" class="list-group-item" >Sách văn học</a>
					</div>
					
					<form name="timkiemnangcao">
						<fieldset>
							<legend style="font-size:1.33em">Tìm kiếm nâng cao</legend>
							
								<legend style="font-size:1.2em;padding-left:10px">Thể loại</legend>
									<select name ="theloai" style="padding:5px  10px;margin-left:3px" onchange="showBookAjaxIndex()">
										<option value="tatca"  <?php if(isset($_GET['theloai']) && $_GET['theloai']=="tatca") echo "selected"; ?> >Tất cả thể loại</option>
										<option value="kinhte"  <?php if(isset($_GET['theloai']) && $_GET['theloai']=="kinhte") echo "selected"; ?> >Kinh tế</option>
										<option value="kynangsong" <?php if(isset($_GET['theloai']) && $_GET['theloai']=="kynangsong") echo "selected"; ?> >Kỹ năng sống</option>
										<option value="thieunhi"  <?php if(isset($_GET['theloai']) && $_GET['theloai']=="thieunhi") echo "selected"; ?> >Sách thiếu nhi</option>
										<option value="tuoiteen"  <?php if(isset($_GET['theloai']) && $_GET['theloai']=="tuoiteen") echo "selected"; ?> >Sách tuổi teen</option>
										<option value="vanhoc"  <?php if(isset($_GET['theloai']) && $_GET['theloai']=="vanhoc") echo "selected"; ?> >Sách văn học</option>
										<option value="ngoaingu"  <?php if(isset($_GET['theloai']) && $_GET['theloai']=="ngoaingu") echo "selected"; ?> >Học ngoại ngữ</option>
										<option value="chuyennganh"  <?php if(isset($_GET['theloai']) && $_GET['theloai']=="chuyennganh") echo "selected"; ?> >Sách chuyên ngành</option>
										<option value="lichsu"  <?php if(isset($_GET['theloai']) && $_GET['theloai']=="lichsu") echo "selected"; ?> >Sách lịch sử</option>
									</select>
									
								<legend style="font-size:1.2em;padding-left:10px;margin-top:20px">Nhập giá</legend>
								Từ <input type="text" name="giatu" style="padding:5px  10px;margin-left:18px;width:125px;" value="<?php if(isset($_GET['giatu'])) echo $_GET['giatu']; ?>" onkeyup="showBookAjaxIndex()"><br>
								Đến <input type="text" name="giaden" style="padding:5px  10px;margin-left:10px;margin-top:10px;width:125px;" value="<?php if(isset($_GET['giaden'])) echo $_GET['giaden']; ?>" onkeyup="showBookAjaxIndex()"><br>
								<i id="loigia" style="color:red"></i>
								
								<legend style="font-size:1.2em;padding-left:10px;margin-top:20px">Sắp xếp</legend>
								<select name="sapxep"style="padding:5px  10px" onchange="showBookAjaxIndex()">
									<option value="">--Chọn--</option>
									<option value="giatangdan" <?php if(isset($_GET['sapxep']) && $_GET['sapxep']=="giatangdan") echo "selected"; ?> >Giá từ thấp tới cao</option>
									<option value="giagiamdan" <?php if(isset($_GET['sapxep']) && $_GET['sapxep']=="giagiamdan") echo "selected"; ?> >Giá từ cao đến thấp</option>
									<option value="tentangdan" <?php if(isset($_GET['sapxep']) && $_GET['sapxep']=="tentangdan") echo "selected"; ?> >Theo tên từ A đến Z</option>
									<option value="tengiamdan" <?php if(isset($_GET['sapxep']) && $_GET['sapxep']=="tengiamdan") echo "selected"; ?> >Theo tên từ Z đến A</option>
								</select>
							
						</fieldset>
					</form>
					
				</div>
				
				<div class="col-md-10">
				
					<div class="bar" > 
						<div class="tieude"></div>	
					</div>
					<div id="sanpham">
						<?php 
							include('showbook.php');
							ShowBook::showBookk();
						?>
					</div>
				</div>

</div>
									<script>
									
									function showBookAjaxIndex() {
										var xhttp;
										var matheloai=document.forms['timkiemnangcao']['theloai'].value;
										var giatu=document.forms['timkiemnangcao']['giatu'].value;
										var giaden=document.forms['timkiemnangcao']['giaden'].value;
										var sapxep=document.forms['timkiemnangcao']['sapxep'].value;
										
										var ptnGia=/^[0-9]*$/;
										if(ptnGia.test(giatu)==false || ptnGia.test(giaden)==false)
											document.getElementById('loigia').innerHTML="Bạn phải nhập số.";
										else document.getElementById('loigia').innerHTML="";
										if( ptnGia.test(giatu)==true && ptnGia.test(giaden)==true && giatu!="" && giaden !="" )
											if(Number(giatu)>Number(giaden))
												document.getElementById('loigia').innerHTML="Khoảng giá nhập không hợp lê.";
											else document.getElementById('loigia').innerHTML=""
											
										var url="showBookAjax.php?";
										if (matheloai == "") 
											url=url+"theloai=&";
										else 
											url=url+"theloai="+matheloai+"&";
										if(giatu=="" && giaden=="")
											url=url+"giatu=&giaden=&";
										else 
											url=url+"giatu="+giatu+"&giaden="+giaden+"&";
										if (sapxep == "") 
											url=url+"sapxep=&";
										else 
											url=url+"sapxep="+sapxep+"&";
										url=url+"timkiemnangcao=1";
										xhttp = new XMLHttpRequest();
										xhttp.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
											document.getElementById("sanpham").innerHTML = this.responseText;	
											}
										  };
										  xhttp.open("GET",url, true);
										  xhttp.send();
									//		window.location.href=url;
		if(matheloai=="ngoaingu")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH HỌC NGOẠI NGỮ';
			x[1].innerHTML='Sách học ngoại ngữ';
			document.getElementById("title-background").style.background=" url('../images/theme/HocNgoaiNgu.png') no-repeat center center";
		}
		if(matheloai=="kinhte")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH KINH TẾ';
			x[1].innerHTML='Sách kinh tế';
			document.getElementById("title-background").style.background=" url('../images/theme/KinhTe.jpg') no-repeat center center";
		}
		if(matheloai=="kynangsong")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH KỸ NĂNG SỐNG';
			x[1].innerHTML='Sách kỹ năng sống';
			document.getElementById("title-background").style.background=" url('../images/theme/KyNangSong.jpg') no-repeat center center";
		}
		if(matheloai=="tuoiteen")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH TUỐI TEEN';
			x[1].innerHTML='Sách tuổi teen';
			document.getElementById("title-background").style.background=" url('../images/theme/TuoiTeen.jpg') no-repeat center center";
		}
		if(matheloai=="vanhoc")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH VĂN HỌC';
			x[1].innerHTML='Sách văn học';
			document.getElementById("title-background").style.background=" url('../images/theme/VanHoc.jpg') no-repeat center center";
		}
		if(matheloai=="thieunhi")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH THIẾU NHI';
			x[1].innerHTML='Sách thiếu nhi';
			document.getElementById("title-background").style.background=" url('../images/theme/ThieuNhi.jpg') no-repeat center center";
		}
		if(matheloai=="chuyennganh")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH CHUYÊN NGÀNH';
			x[1].innerHTML='Sách chuyên ngành';
			document.getElementById("title-background").style.background=" url('../images/theme/ChuyenNganh.jpg') no-repeat center center";
		}
		if(matheloai=="lichsu")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH LỊCH SỬ';
			x[1].innerHTML='Sách lịch sử';
			document.getElementById("title-background").style.background=" url('../images/theme/LichSu.jpg') no-repeat center center";
		}
		if(matheloai=="tatca")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='TẤT CẢ THỂ LOẠI SÁCH';
			x[1].innerHTML='Tất cả các sách';
			document.getElementById("title-background").style.background=" url('../images/theme/TatCa.png') no-repeat center center";
		}
										}
									</script>
									
<script>
	showBook();
</script>                               <!---------------------- footer ----------------------->
<div class="container">
	<hr style="border:1px solid black;">
		<div class="gioithieu">
			<h4>Mua Sách Online Tại Onepiece.Vn</h4><br>
            <p>- Ra đời từ năm 2011, đến nay Onepiece.vn đã trở thành địa chỉ mua sách online quen thuộc của hàng ngàn độc giả trên cả nước. Với đầu sách phong phú, thuộc các thể loại: Văn học nước ngoại, Văn học trong nước, Kinh tế, Kỹ năng sống, Thiếu nhi, Sách học ngoại ngữ, Sách chuyên ngành,... được cập nhật liên tục từ các nhà xuất bản uy tín trong nước. </p><br>
            <p>- Khi mua sách online tại Onepiece.vn, Quý khách được Bọc plastic miễn phí đến 99% (trừ sách bìa cứng, sách dạng hộp - dạng đặc biệt, sách khổ quá to, ...)</p><br>
            <p>- Ngoài ra, với hình thức Giao hàng thu tiền tận nơi và Đổi hàng trong vòng 7 ngày nếu sách có bất kỳ lỗi nào trong quá trình in ấn sẽ giúp Quý khách yên tâm hơn khi mua sắm tại Onepiece.vn</p>
            
		</div>
	<hr style="border:1px solid black;">
	<div class="chitietfooter">
					<h4>HỖ TRỢ KHÁCH HÀNG</h4><br>
					Email: admin@onepiece.vn<br>
					Hotline: 0938 424 289
				</div>
				<div class="chitietfooter">
					<h4>Giới Thiệu</h4><br>
					Về Onepiece<br>
					Tuyển dụng
				</div>
				<div class="chitietfooter">
					<h4>Tài Khoản</h4><br>
					Tài khoản<br>
					Danh sách đơn hàng<br>
					Thông báo
				</div>
				<div class="chitietfooter">
					<h4>Hướng Dẫn</h4><br>
					Hướng dẫn mua hàng<br>
					Phương thức thanh toán<br>
					Câu hỏi thường gặp<br>
					Phương thức vận chuyển
				</div>
		</div>
</div>

<?php
	if(isLogined()==true)
	{
		echo "<script>
		document.getElementById('loginn').innerHTML=''; 
		</script>";
		 	$s="<a class=\'dropdown-toggle\' data-toggle=\'dropdown\' href=\'#\'>"
                .    "<i class=\'glyphicon glyphicon-user\'></i> ".$_SESSION['login']['TenDangNhap']." <b class=\'caret\'></b>"
                ."</a>"
                ."<ul class=\'dropdown-menu\'>"
                .    "<li><a href=\'thongtincanhanUser.php\'><i class=\'glyphicon glyphicon-user\'></i> Thông tin tài khoản </a>"
                .    "</li>"
				.    "<li><a href=\'DonHang.php\'><i class=\'glyphicon glyphicon-list-alt\'></i> Xem đơn hàng </a>"
                .    "</li>"
                .    "<li class=\'divider\'></li>"
                .    "<li><a href=\'xulydangnhapUser.php?dangxuat=1\'><i class=\'glyphicon glyphicon-log-out\'></i> Đăng xuất </a>"
                .    "</li>"
                ."</ul>";
		echo "<script>"
		."document.getElementById('logout').setAttribute('class','dropdown'); "
		."document.getElementById('logout').innerHTML='".$s."';"
		."</script>";
	}
?>
</body>
</html>

